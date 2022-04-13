// This example just provide basic function test;
// For more informations, please vist www.heltec.cn or mail to support@heltec.cn

#include <Wire.h>  // Only needed for Arduino 1.6.5 and earlier
#include "heltec.h" // alias for `#include "SSD1306Wire.h"`
#include "images.h"


#define DEMO_DURATION 3000
typedef void (*Demo)(void);

int demoMode = 0;
int contador = 0;
int incomingByte = 0;

void setup() {
  Heltec.begin(true /*DisplayEnable Enable*/, true /*Serial Enable*/);
  Heltec.display->flipScreenVertically();
  Heltec.display->setFont(ArialMT_Plain_10);
  Heltec.display->clear();
  Heltec.display->drawXbm(0, 0, WiFi_Logo_width, WiFi_Logo_height, gato_1);
  Heltec.display->setTextAlignment(TEXT_ALIGN_CENTER);
  Heltec.display->drawString(20, 52, "Letras: ");
  Heltec.display->drawString(60, 52, String(contador));
  Heltec.display->display();


}

void drawFontFaceDemo() {
  // Font Demo1
  // create more fonts at http://oledHeltec.display->squix.ch/
  Heltec.display->setTextAlignment(TEXT_ALIGN_LEFT);
  Heltec.display->setFont(ArialMT_Plain_10);
  Heltec.display->drawString(0, 0, "Hello world");
  Heltec.display->setFont(ArialMT_Plain_16);
  Heltec.display->drawString(0, 10, "Hello world");

}

void drawTextFlowDemo() {
  Heltec.display->setFont(ArialMT_Plain_10);
  Heltec.display->setTextAlignment(TEXT_ALIGN_LEFT);
  Heltec.display->drawStringMaxWidth(0, 0, 128,
                                     "Lorem ipsum\n dolor sit amet, consetetur sadipscing elitr" );
}

void drawTextAlignmentDemo() {
  // Text alignment demo
  Heltec.display->setFont(ArialMT_Plain_10);

  // The coordinates define the left starting point of the text
  Heltec.display->setTextAlignment(TEXT_ALIGN_LEFT);
  Heltec.display->drawString(0, 0, "Left aligned (0,10)");

  // The coordinates define the center of the text
  Heltec.display->setTextAlignment(TEXT_ALIGN_CENTER);
  Heltec.display->drawString(64, 10, "Center aligned (64,10)");

  // The coordinates define the right end of the text
  Heltec.display->setTextAlignment(TEXT_ALIGN_RIGHT);
  Heltec.display->drawString(128, 20, "Right aligned (128,20)");
}



void drawImageDemo() {
  // see http://blog.squix.org/2015/05/esp8266-nodemcu-how-to-create-xbm.html
  // on how to create xbm files
  Heltec.display->drawXbm(0, 0, WiFi_Logo_width, WiFi_Logo_height, gato_1);
}
void drawImageDemo2() {
  // see http://blog.squix.org/2015/05/esp8266-nodemcu-how-to-create-xbm.html
  // on how to create xbm files
  Heltec.display->drawXbm(0, 0, WiFi_Logo_width, WiFi_Logo_height, gato_2);
}

//Demo demos[] = {drawFontFaceDemo, drawTextFlowDemo, drawTextAlignmentDemo, drawRectDemo, drawCircleDemo, drawProgressBarDemo, drawImageDemo};
Demo demos[] = {drawImageDemo, drawImageDemo2, drawTextAlignmentDemo};
int demoLength = (sizeof(demos) / sizeof(Demo));
long timeSinceLastModeSwitch = 0;

void loop() {
  int incomingByte = 0;
  // send data only when you receive data:
  if (Serial.available() > 0) {
    // read the incoming byte:
    incomingByte = Serial.read();
    Heltec.display->clear();
    demos[0]();
    Heltec.display->setTextAlignment(TEXT_ALIGN_CENTER);
    Heltec.display->drawString(20, 52, "Letras: ");
    Heltec.display->drawString(60, 52, String(contador));
    Heltec.display->display();
    delay(100);
    Heltec.display->clear();
    demos[1]();
    Heltec.display->setTextAlignment(TEXT_ALIGN_CENTER);
    Heltec.display->drawString(20, 52, "Letras: ");
    Heltec.display->drawString(60, 52, String(contador));
    Heltec.display->display();
    contador++;
    delay(100);
    Serial.print("Hola");
  }
  //Serial.print("Hola");
}





/*
  Heltec.display->clear();
  demos[0]();
  Heltec.display->setTextAlignment(TEXT_ALIGN_CENTER);
  Heltec.display->drawString(20, 52, "words: ");
  Heltec.display->drawString(60, 52, String(contador));
  Heltec.display->display();
  delay(100);
  Heltec.display->clear();
  demos[1]();
  Heltec.display->setTextAlignment(TEXT_ALIGN_CENTER);
  Heltec.display->drawString(20, 52, "words: ");
  Heltec.display->drawString(60, 52, String(contador));
  Heltec.display->display();
  contador++;
  delay(100);
  /*
  Heltec.display->clear();
  demos[1]();
  Heltec.display->display();
  Heltec.display->setTextAlignment(TEXT_ALIGN_CENTER);
  Heltec.display->drawString(20, 52, "words: ");
  Heltec.display->drawString(40, 52, "13");
  delay(100);
*/
