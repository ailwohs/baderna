#include <ArduinoJson.h>
void setup() {
  // put your setup code here, to run once:
  Serial.begin(9600);
}

void loop() {

  //certo = "{\"pinRele1\": \"High\", \"pinRele2\": \"LOW\"}";
  StaticJsonDocument<256> doc;
  if(deserializeJson(doc, "{\"method\":\"ola\",\"params\": {\"pinRele1\": \"High\", \"pinRele2\": \"LOW\"} } ")){
    //Serial.print("Teste funcionou.\n");
  }

  String metodo = doc["method"];
  Serial.print("\nMetodo: ");
  Serial.print(metodo);

  Serial.print("\nTeste:");
  String parametros = doc["params"];
  Serial.print(parametros);

  Serial.print("\nPinRele:");
  String teste = doc["params"]["pinRele1"];
  Serial.print(teste);

  
  //String rele1 = doc["params"]["pinRele1"];
  //Serial.print("\nRele1: ");
  //Serial.print(rele1);
  
  /*String rele1 = doc["pinRele1"];
  Serial.print("\nRele1: ");
  Serial.print(rele1);

  String rele2 = doc["pinRele2"];
  Serial.print("\nRele2: ");
  Serial.print(rele2);
  */
  delay(1000);
}
