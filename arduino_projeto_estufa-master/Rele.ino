#define pinSensorRele1 31
#define pinSensorRele2 32
#define pinSensorRele3 33
#define pinSensorRele4 34
#define pinSensorRele5 35
#define pinSensorRele6 36
#define pinSensorRele7 37
#define pinSensorRele8 38

void setup() {
  Serial.begin(9600);
  pinMode(pinSensorRele1,OUTPUT);
  pinMode(pinSensorRele2,OUTPUT);
  pinMode(pinSensorRele3,OUTPUT);
  pinMode(pinSensorRele4,OUTPUT);
  pinMode(pinSensorRele5,OUTPUT);
  pinMode(pinSensorRele6,OUTPUT);
  pinMode(pinSensorRele7,OUTPUT);
  pinMode(pinSensorRele8,OUTPUT);


}

void loop() {
  digitalWrite(pinSensorRele1,1);
  delay(500);
  digitalWrite(pinSensorRele2,1);
  delay(500);
  digitalWrite(pinSensorRele3,1);
  delay(500);
  digitalWrite(pinSensorRele4,1);
  delay(500);
  digitalWrite(pinSensorRele5,1);
  delay(500);
  digitalWrite(pinSensorRele6,1);
  delay(500);
  digitalWrite(pinSensorRele7,1);
  delay(500);
  digitalWrite(pinSensorRele8,1);
  delay(500);
  
  digitalWrite(pinSensorRele1,0);
  digitalWrite(pinSensorRele2,0);
  digitalWrite(pinSensorRele3,0);
  digitalWrite(pinSensorRele4,0);
  digitalWrite(pinSensorRele5,0);
  digitalWrite(pinSensorRele6,HIGH);
  digitalWrite(pinSensorRele7,0);
  digitalWrite(pinSensorRele8,0);
}
