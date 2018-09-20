#include <DHT11.h>
int led = 13;
int sensor=2;
DHT11 dht11(sensor);

unsigned long previousMillis = 0;
const long interval = 1000;
int cont = 0;


void setup() {
  Serial.begin(57600);
  pinMode(led, OUTPUT);
  pinMode(sensor,INPUT);

}

void loop() {
  if(tiempo()==1){
  float  temp, humi;
  dht11.read(humi, temp);
  Serial.print((int)temp);
  Serial.print(',');
  Serial.print((int)humi);
  Serial.println(',');
  }

   
  if(Serial.available()>0){
    char comando = Serial.read();
    if(comando == 'a'){
      digitalWrite(led,HIGH);
    }
    if(comando == 'b'){
      digitalWrite(led,LOW);
    }
  }
}

int tiempo() {
  unsigned long currentMillis = millis();
  if (currentMillis - previousMillis >= interval) {
    previousMillis = currentMillis;
     cont++;
  }
  if (cont == 3) {
    cont = 0;
    return 1;
  }
}
