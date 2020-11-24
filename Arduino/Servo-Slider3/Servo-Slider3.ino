#include <Servo.h>

Servo myservo1;
Servo myservo2;
Servo myservo3;
Servo myservo4;

char unChar;
String readString;

void setup() {
  myservo1.attach(3);
  myservo2.attach(5);
  myservo3.attach(6);
  myservo4.attach(9);
  // posición central
  myservo1.write(90);
  myservo2.write(90);
  myservo3.write(90);
  myservo4.write(90);
  Serial.begin(115200);

}

void loop() {
  if (Serial.available()) {
    unChar = Serial.read();
    if (unChar == 'A') {
      motor1();
    }
    if (unChar == 'B') {
      motor2();
    }
    if (unChar == 'C') {
      motor3();
    }
    if (unChar == 'D') {
      motor4();
    }
  }
}

void motor1() {
  delayMicroseconds(300);
  while (Serial.available()) {
    //delayMicroseconds(100);                  
    char c = Serial.read();
    readString += c;
  }
  if (readString.length() > 0) {
    Serial.println(readString.toInt());
    myservo1.write(readString.toInt());
    readString = "";
  }
}

void motor2() {
  delayMicroseconds(300);
  while (Serial.available()) {
    //delayMicroseconds(100);                  
    char c = Serial.read();
    readString += c;
  }
  if (readString.length() > 0) {
    Serial.println(readString.toInt());
    myservo2.write(readString.toInt());
    readString = "";
  }
}

void motor3() {
  delayMicroseconds(300);
  while (Serial.available()) {
    //delayMicroseconds(100);                  
    char c = Serial.read();
    readString += c;
  }
  if (readString.length() > 0) {
    Serial.println(readString.toInt());
    myservo3.write(readString.toInt());
    readString = "";
  }
}

void motor4() {
  delayMicroseconds(300);
  while (Serial.available()) {
    //delayMicroseconds(100);                  
    char c = Serial.read();
    readString += c;
  }
  if (readString.length() > 0) {
    Serial.println(readString.toInt());
    myservo4.write(readString.toInt());
    readString = "";
  }
}
