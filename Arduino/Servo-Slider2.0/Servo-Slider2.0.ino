#include <Servo.h> 
#include <SoftwareSerial.h>
SoftwareSerial BT1(4,2); // RX, TX

Servo myservo1;  // create servo object to control a servo
Servo myservo2;  // create servo object to control a servo
Servo myservo3;  // create servo object to control a servo

char unChar;
String readString; //Asignamos la palabra readString a una variable tipo cadena

void setup() {
  myservo1.attach(7);  //the pin for the servo1 control
  myservo2.attach(8);  //the pin for the servo2 control
  myservo3.attach(9);  //the pin for the servo3 control
  Serial.begin(9600); //initialize serial comunication
  BT1.begin(115200);
}

void loop() {
  if (BT1.available()) {  //verify firs character in serial port
    unChar = BT1.read();
    
    if(unChar=='A'){ //if A go to motor1 function
      motor1();
    }
    
    if(unChar=='B'){ //if B go to motor2 function
      motor2();
    }
    
    if(unChar=='C'){ //if C go to motor3 function
      motor3();
    }
  }  
}
  
void motor1(){
        delayMicroseconds(300);   
        while (BT1.available()) { //Now the numerical data of the angle of the servomotor is received
          //delayMicroseconds(100);                  
          char c = BT1.read();  // Se leen los caracteres que ingresan por el puerto
          readString += c;         //each character builds in a string
        }
        if (readString.length() >0) {   //the length of the string is verified
          Serial.println(readString.toInt());  //Now we send data to serial and servos
          myservo1.write(readString.toInt());
          readString=""; // Clear string
        }
}

void motor2(){
        delayMicroseconds(300); 
        while (BT1.available()) { 
          //delayMicroseconds(100);                  
          char c = BT1.read();  
          readString += c;         
        }
        if (readString.length() >0) { 
          Serial.println(readString.toInt());  
          myservo2.write(readString.toInt());
          readString=""; 
        } 
}

void motor3(){
        delayMicroseconds(300); 
        while (BT1.available()) { 
          //delayMicroseconds(100);                  
          char c = BT1.read();  
          readString += c;        
        }
        if (readString.length() >0) { 
          Serial.println(readString.toInt());  
          myservo3.write(readString.toInt());
          readString=""; 
        } 
}
