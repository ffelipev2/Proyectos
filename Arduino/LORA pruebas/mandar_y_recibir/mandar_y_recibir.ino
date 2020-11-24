#include "heltec.h"
#define BAND    433E6  //you can set band here directly,e.g. 868E6,915E6
String readString;


void setup() {
    //WIFI Kit series V1 not support Vext control
  Heltec.begin(true /*DisplayEnable Enable*/, true /*Heltec.LoRa Disable*/, true /*Serial Enable*/, true /*PABOOST Enable*/, BAND /*long BAND*/);

}

void loop() {

  while (Serial.available()) {
    delay(3);
    char c = Serial.read();
    readString += c;
  }
  readString.trim();
  if (readString.length() > 0) {
      LoRa.beginPacket();
      LoRa.print(readString);
      LoRa.endPacket();
      Serial.print("Tu : ");
      Serial.println(readString);
  } 
  readString = "";
  int packetSize = LoRa.parsePacket();
  if (packetSize) {
    Serial.print("Otra Persona : ");
    while (LoRa.available()) {
      Serial.print((char)LoRa.read());
    }
      Serial.println("");
  }
}
