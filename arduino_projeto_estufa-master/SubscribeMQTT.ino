#include <PubSubClient.h>
#include <ArduinoJson.h>
#include <SoftwareSerial.h>

#define TINY_GSM_MODEM_SIM800
#include <TinyGsmClient.h>

//GSM
const char apn[]  = "gprs.oi.com.br";
const char user[] = "oi";
const char pass[] = "oi";

TinyGsm modem(Serial1);//Portas tx e rx utilizadas foram 19(RX), 18(TX)
TinyGsmClient client(modem);
PubSubClient MQTT(client);

//MQTT Server
const char* BROKER_MQTT = "pesquisa02.lages.ifsc.edu.br";
int BROKER_PORT = 1883;

#define ID_MQTT  "d303f500-def0-11e9-b2ba-d3a07b442bf6"
#define TOKEN_MQTT "CiO0GBJhuFSr4PJpsbK7"

boolean validacaoEnvio;

//JSON
StaticJsonDocument<256> JsonPack;
char buffer[256];

void conectaMQTT();   //faz conecao com broker
void enviaPacote();   //envia pacote JSON via MQTT
void rpc();
void recebePacote(char* topic, byte* payload, unsigned int length);

void setup(void)
{
  Serial.begin(9600);
  Serial1.begin(9600); //RX TX (0,1)

  MQTT.setServer(BROKER_MQTT, BROKER_PORT);  
  conectaMQTT();
  MQTT.setCallback(recebePacote);  
  rpc();

}


void loop() {
  if(!MQTT.connected()){
    conectaMQTT();
    rpc();
  }
 //enviaPacote();
  MQTT.loop();
}

void conectaMQTT() {

  while (!MQTT.connected()) {
    Serial.print("Conectando ao Broker MQTT: ");
    Serial.println(BROKER_MQTT);
    
    //
    Serial.println("Initializing modem...");
    modem.restart();
    String modemInfo = modem.getModemInfo();
    Serial.print("Modem: ");
    Serial.println(modemInfo);


    Serial.print("Waiting for network...");
    while (!modem.waitForNetwork()) {
      Serial.println(" fail");
    }
    Serial.println(" OK");

    Serial.print("Connecting to ");
    Serial.print(apn);
    while (!modem.gprsConnect(apn, user, pass)) {
      Serial.println(" fail");
      Serial.print("Connecting to ");
      Serial.print(apn);
      while (true);
    }
    Serial.println(" OK");
    //
    if (MQTT.connect(ID_MQTT, TOKEN_MQTT, NULL)) {
      Serial.println("Conectado ao Broker com sucesso!");
    }
    else {
      Serial.println("Noo foi possivel se conectar ao broker.");
      Serial.println("Nova tentatica de conexao em 10s");
      delay(10000);
    }
  }
}


void enviaPacote() {

  serializeJson(JsonPack, buffer);


  if (MQTT.publish("v1/devices/me/telemetry", buffer) == true) {
    Serial.println("Success sending message");
    Serial.println(buffer);

  } else {
    Serial.println("Error sending message");
    conectaMQTT();
    enviaPacote();
  }
}

void rpc(){
  const char teste_rpc = MQTT.subscribe("v1/devices/me/rpc/request/+");
  Serial.println("TestandoResposta:");
  Serial.print(teste_rpc);
  
  if (teste_rpc) {
      Serial.println("Sucesso RPC!");
    } else {
      Serial.println("Nao foi possivel enviar comando subscribe.");
      Serial.println("Nova tentativa de conexao em 10s");
      delay(10000);
    }
  /*if (MQTT.subscribe("v1/devices/me/rpc/response/+")) {
      Serial.println("Inscrito no topico com sucesso!");
    } else {
      Serial.println("Nao foi possivel enviar comando subscribe.");
      Serial.println("Nova tentativa de conexao em 10s");
      delay(10000);
    }*/
  //Envia subscribe para o topico v1/devices/me/rpc/response/+, somente uma vez 
  //MQTT.subscribe("v1/devices/me/rpc/response/+");

  //Parte que ainda não entendemos  
  //Vai precisar de um callback \0/
  //int request_id = MQTT.publish("v1/devices/me/rpc/request/$request_id");
  //printf(request_id);
  
  //122 
  
  //Caso queiramos responder alguma coisa:
   //MQTT.publish("v1/devices/me/rpc/response/", request_id, buffer);
}

void recebePacote(char* topic, byte* payload, unsigned int length) 
{
    Serial.println("On message");

    
    char json[length + 1];
    strncpy (json, (char*)payload, length);
    json[length] = '\0';
    
    Serial.println(" Topico: ");
    Serial.print(topic);
    Serial.println( "Mensagem: ");
    Serial.print(json);

    // Decode JSON request
    StaticJsonDocument<256> jsonBuffer;

    DeserializationError err = deserializeJson(jsonBuffer, payload);
    if (err) {
      Serial.print(F("deserializeJson() failed with code "));
      Serial.println(err.c_str());
    }

    String nomeMetodo = jsonBuffer["method"];
    Serial.println(" Nome do metodo: ");
    Serial.print(nomeMetodo);

    /*Possibilidades:
      - 
      - deserializeJson(jsonBuffer,parametros);
      - StaticJsonDocument<250> dados;
        deserializeJson(dados,jsonBuffer["params"])
      - StaticJsonDocument<250> dados;
        deserializeJson(dados,jsonBuffer["method"]["params"])
      - deserializeJson(jsonBuffer,jsonBuffer["method"]["params"]);
    */
      

    String parametros = jsonBuffer["params"];
    Serial.println(" Parametros: ");
    Serial.print(parametros);

    /*String param = jsonBuffer["params"][0];
    Serial.println(" Parametros teste 1: ");
    Serial.print(param);
    
    String rele1 = jsonBuffer["params"][1];
    Serial.println(" Parametros teste 1: ");
    Serial.print(rele1);*/

 

    //String msg;

    //obtem a string do payload recebido
    //for(int i = 0; i < length; i++) 
    //{
    //   char c = (char)payload[i];
    //   msg += c;
    //}

    //Serial.println(msg);
    
}
