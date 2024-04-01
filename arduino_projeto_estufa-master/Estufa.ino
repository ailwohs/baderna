//#include <ESP8266WiFi.h>
#include <PubSubClient.h>
#include <ArduinoJson.h>
//#include <Adafruit_Sensor.h>
//#include <DHT.h>
//#include <Wire.h>
//#include <BH1750.h>  //Inclui a biblioteca do BH1750
#include <SoftwareSerial.h>


#define TINY_GSM_MODEM_SIM800
#include <TinyGsmClient.h>

//#define pinRaiosUV A0
#define pinUmidadeSolo A0

//GSM
const char apn[]  = "gprs.oi.com.br";
const char user[] = "oi";
const char pass[] = "oi";



//SoftwareSerial serialGSM(D3, D4);

TinyGsm modem(Serial1);//Portas tx e rx utilizadas foram 19(RX), 18(TX)
TinyGsmClient client(modem);


// WiFi
/*
  const char* ssid = "Hidoi-WPAN";
  const char* password = "qwert123";*/


const char* ssid = "Hidoi-WLAN";
const char* password = "saifuGAIN200";


//MQTT Server
const char* BROKER_MQTT = "pesquisa02.lages.ifsc.edu.br";
int BROKER_PORT = 1883;

#define ID_MQTT  "044d3be0-bd4e-11e9-9e0b-1973df4ba63a"
#define TOKEN_MQTT "dYcW6tIrw0K3E7T4v4O3"

//WiFiClient wifiClient;
PubSubClient MQTT(client);

boolean validacaoEnvio;


//JSON
StaticJsonDocument<256> JsonPack;
char buffer[256];


//  DHT11
/*#define DHTPIN D1
  #define DHTTYPE DHT22
  DHT dht(DHTPIN, DHTTYPE);

  //BH1750
  BH1750 lightMeter(0x23);
  float lumino;

  //Led
  const int pino_led = 2;
*/




//Funcoes
void conectaWiFi();   //faz conecao com wifi
void conectaMQTT();   //faz conecao com broker
void enviaPacote();   //envia pacote JSON via MQTT
void leituraDHT22();  //mede temperatura ambiente e umidade
void leituraGY30();   //mede luminosidade
void leituraUVM30A();  //mede os raios UV
void leituraUmiSolo(); //mede a umidade do slo


void setup(void)
{
  Serial.begin(9600);

  //conectaWiFi();



  Serial1.begin(9600); //RX TX (0,1)

  MQTT.setServer(BROKER_MQTT, BROKER_PORT);
  conectaMQTT();

  //dht.begin();

  //Wire.begin(D5, D6); // (SDA, SLC)
  //lightMeter.begin();

  //pinMode(pino_led, OUTPUT);



}


void loop() {

  //leituraDHT22();
  //leituraGY30();
  //leituraUVM30A();
  //leituraUmiSolo();

  /*if (WiFi.status() != WL_CONNECTED) {
    conectaWiFi();
    }*/


  JsonPack["Teste"] = "Elfo mais legal ainda do que antes";

  enviaPacote();
  delay(600000);
}



/*void conectaWiFi() {



//  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {

    delay(500);
    Serial.print(".");
  }
  if (WiFi.status() == WL_CONNECTED)
  { Serial.println("");
    Serial.println("WiFi connectado");
    Serial.println(WiFi.localIP());
    return;
  }
}*/

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


    /*Unlock your SIM card with a PIN
    modem.simUnlock("1234");*/
    


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

    /*digitalWrite(pino_led, 0);
      delay(100);
      digitalWrite(pino_led, 1);*/

  } else {
    Serial.println("Error sending message");
    conectaMQTT();
    enviaPacote();
  }
}

/*void leituraDHT22() {

  JsonPack["UmidAmb"] = dht.readHumidity();
  JsonPack["TempAmb"] = dht.readTemperature();

  }

  void leituraGY30() {

  float lux = lightMeter.readLightLevel();
    String lux_2;
    lux_2 += String(lux, 2);

  JsonPack["Luminosidade"] = lightMeter.readLightLevel();

  }

  void leituraUVM30A() {

  float lux, uv = (analogRead(pinRaiosUV) * (5.0 / 1023.0)) * 1000;
    String uv_2;
    uv_2 += String(uv, 2);

  JsonPack["RaiosUV"] = "Not Ready";//(analogRead(pinRaiosUV) * (5.0 / 1023.0)) * 1000;

  }


  void leituraUmiSolo() {

  //JsonPack["UmidSolo"] =  digitalRead(pinUmidadeSolo);  //"Not Ready"
  JsonPack["UmidSolo"] =  analogRead(pinUmidadeSolo);

  }*/
