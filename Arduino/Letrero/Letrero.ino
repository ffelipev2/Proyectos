
#include <SPI.h>
#include <Adafruit_GFX.h>
#include <Max72xxPanel.h>
String readString;

const int pinCS = 10;
const int numberOfHorizontalDisplays = 9;
const int numberOfVerticalDisplays = 1;

Max72xxPanel matrix = Max72xxPanel(pinCS, numberOfHorizontalDisplays, numberOfVerticalDisplays);

String tape ;  //text 


int wait = 20; // In milliseconds 100

const int spacer = 1;
const int width = 5 + spacer; // The font width is 5 pixel

void setup() {
  tape.reserve(50);
  matrix.setIntensity(7); // Use a value between 0 and 15 for brightness
  matrix.setPosition(0, 0, 0); // The first display is at <0, 0>
  matrix.setPosition(1, 1, 0); // The second display is at <1, 0>
  matrix.setPosition(2, 2, 0); // The third display is at <2, 0>
  matrix.setPosition(3, 3, 0); // And the last display is at <3, 0>
  matrix.setPosition(4, 4, 0); // And the last display is at <3, 0>
  matrix.setPosition(5, 5, 0); // And the last display is at <3, 0>
  matrix.setPosition(6, 6, 0); // And the last display is at <3, 0>
  matrix.setPosition(7, 7, 0); // And the last display is at <3, 0>
  matrix.setPosition(8, 8, 0); // And the last display is at <3, 0>
  matrix.setPosition(9, 9, 0); // And the last display is at <3, 0>

  matrix.setRotation(0, 1);    // Display is position upside down
  matrix.setRotation(1, 1);    // Display is position upside down
  matrix.setRotation(2, 1);    // Display is position upside down
  matrix.setRotation(3, 1);    // Display is position upside down
  matrix.setRotation(4, 1);    // Display is position upside down
  matrix.setRotation(5, 1);    // Display is position upside down
  matrix.setRotation(6, 1);    // Display is position upside down
  matrix.setRotation(7, 1);    // Display is position upside down
  matrix.setRotation(8, 1);    // Display is position upside down
  matrix.setRotation(9, 1);    // Display is position upside down
  Serial.begin(9600);

}

void loop() {
  while (Serial.available()) {
    delay(3);
    char c = Serial.read();
    readString += c;
  }
  readString.trim();

  if (readString.length() > 0) {
    if (readString.indexOf("Pantalla_1") >= 0) {
      readString.replace("Pantalla_1", "");
      readString.replace("\n", "");
      Serial.println(readString);
      tape = readString;
     // Serial.println(tape);
    }
  }
  if (readString.length() > 0) {
    if (readString.indexOf("Velo*") >= 0) {
      readString.replace("Velo*", "");
      readString.replace("\n", "");
      wait = readString.toInt();
      //Serial.println(wait);
    }
  }
  readString = "";

  for (int i = 0; i < width * tape.length() + matrix.width() - 1 - spacer; i++) {

    matrix.fillScreen(LOW);

    int letter = i / width;
    int x = (matrix.width() - 1) - i % width;
    int y = (matrix.height() - 8) / 2; // center the text vertically

    while (x + width - spacer >= 0 && letter >= 0) {
      if (letter < tape.length()) {
        matrix.drawChar(x, y, tape[letter], HIGH, LOW, 1);
      }
      letter--;
      x -= width;
    }
    matrix.write(); // Send bitmap to display
    delay(wait);
  }
}

