/* Proyecto desarrollado por Felipe Flores
    para Proyectos Ardudino, correo: ffelipev2@gmail.com
    https://www.facebook.com/arduinoproyectos
*/

#include <EnableInterrupt.h>
#include <Servo.h>


#define SERIAL_PORT_SPEED 57600
#define RC_NUM_CHANNELS  6

#define RC_CH1  0
#define RC_CH2  1
#define RC_CH3  2
#define RC_CH4  3
#define RC_CH5  4
#define RC_CH6  5
// PARA ARDUINO MEGA A8-A15
#define RC_CH1_INPUT  A8
#define RC_CH2_INPUT  A9
#define RC_CH3_INPUT  A10
#define RC_CH4_INPUT  A11
#define RC_CH5_INPUT  A12
//#define RC_CH6_INPUT  A13

uint16_t rc_values[RC_NUM_CHANNELS];
uint32_t rc_start[RC_NUM_CHANNELS];
volatile uint16_t rc_shared[RC_NUM_CHANNELS];
int CH1, CH2, CH3, CH4, CH5, CH6;

int IN1 = 24;
int IN2 = 25;
int IN3 = 22;
int IN4 = 23;
int INA = 3;
int INB = 4;
int velocidadGiro = 150; // con este parametro se puede modificar la velocidad de giro del vehículo.

boolean estado = false;
boolean estado2 = false;

Servo myservo;
int pos = 88;

void rc_read_values() {
  noInterrupts();
  memcpy(rc_values, (const void *)rc_shared, sizeof(rc_shared));
  interrupts();
}

void calc_input(uint8_t channel, uint8_t input_pin) {
  if (digitalRead(input_pin) == HIGH) {
    rc_start[channel] = micros();
  } else {
    uint16_t rc_compare = (uint16_t)(micros() - rc_start[channel]);
    rc_shared[channel] = rc_compare;
  }
}

void calc_ch1() {
  calc_input(RC_CH1, RC_CH1_INPUT);
}
void calc_ch2() {
  calc_input(RC_CH2, RC_CH2_INPUT);
}
void calc_ch3() {
  calc_input(RC_CH3, RC_CH3_INPUT);
}
void calc_ch4() {
  calc_input(RC_CH4, RC_CH4_INPUT);
}
void calc_ch5() {
  calc_input(RC_CH5, RC_CH5_INPUT);
}
//void calc_ch6() { calc_input(RC_CH6, RC_CH6_INPUT); }

void setup() {

  Serial.begin(SERIAL_PORT_SPEED);
  pinMode(RC_CH1_INPUT, INPUT);
  pinMode(RC_CH2_INPUT, INPUT);
  pinMode(RC_CH3_INPUT, INPUT);
  pinMode(RC_CH4_INPUT, INPUT);
  pinMode(RC_CH5_INPUT, INPUT);
  //pinMode(RC_CH6_INPUT, INPUT);
  myservo.attach(5);
  myservo.write(pos);

  pinMode (IN4, OUTPUT);
  pinMode (IN3, OUTPUT);
  pinMode (IN1, OUTPUT);
  pinMode (IN2, OUTPUT);
  pinMode (INA, OUTPUT);
  pinMode (INB, OUTPUT);
  pinMode (26, OUTPUT);

  enableInterrupt(RC_CH1_INPUT, calc_ch1, CHANGE);
  enableInterrupt(RC_CH2_INPUT, calc_ch2, CHANGE);
  enableInterrupt(RC_CH3_INPUT, calc_ch3, CHANGE);
  enableInterrupt(RC_CH4_INPUT, calc_ch4, CHANGE);
  enableInterrupt(RC_CH5_INPUT, calc_ch5, CHANGE);
  //enableInterrupt(RC_CH6_INPUT, calc_ch6, CHANGE);
}

void loop() {
  rc_read_values();
  CH1 = map(rc_values[RC_CH1], 1000, 2020, 0, 100);
  CH2 = map(rc_values[RC_CH2], 1000, 2020, 0, 100);
  CH3 = map(rc_values[RC_CH3], 1000, 2020, 0, 100);
  CH4 = map(rc_values[RC_CH4], 1000, 2020, 0, 100);
  CH5 = map(rc_values[RC_CH5], 1000, 2020, 0, 100);

  // CH1 = 50 CH2 = 52 CH3 = 53 CH4 = 50
  //

  //  if (CH2 >= 53 && CH2 <= 100) {
  //    Serial.println("Adelante");
  //    adelante();
  //  } else if (CH2 >= 0 && CH2 <= 47) {
  //    Serial.println("Atras");
  //    atras();
  //  } else if (CH1 >= 0 && CH1 <= 40) {
  //    Serial.println("izquierda");
  //    derecha();
  //  } else if (CH1 >= 60 && CH1 <= 100) {
  //    Serial.println("Derecha");
  //    izquierda();
  //  } else {
  //    Serial.println("detenido");
  //    detener();
  //  }


  if ((CH2 >= 55 && CH2 <= 100) && (CH1 >= 0 && CH1 <= 45)) {
    Serial.println("Adelante Derecha");
    adelanteDerecha();
  } else  if ((CH2 >= 55 && CH2 <= 100) && (CH1 >= 55 && CH1 <= 100)) {
    Serial.println("Adelante izquierda");
    adelanteIzquierda();
  } else if ((CH2 >= 0 && CH2 <= 45) && (CH1 >= 0 && CH1 <= 45)) {
    Serial.println("Atras Derecha");
    atrasDerecha();
  } else   if ((CH2 >= 0 && CH2 <= 45) && (CH1 >= 55 && CH1 <= 100)) {
    Serial.println("Atras izquierda");
    atrasIzquierda();
  } else if (CH2 >= 53 && CH2 <= 100) {
    Serial.println("Adelante");
    adelante();
  } else if (CH2 >= 0 && CH2 <= 47) {
    Serial.println("Atras");
    atras();
  } else if (CH1 >= 0 && CH1 <= 10) {
    Serial.println("izquierda");
    derecha();
  } else if (CH1 >= 90 && CH1 <= 100) {
    Serial.println("Derecha");
    izquierda();
  } else {
    Serial.println("detenido");
    detener();
  }




  //  if (CH2 >= 53 && CH2 <= 100) { //bien
  //    Serial.println("Adelante");
  //    adelante();
  //    estado = true;
  //  }
  //  if (CH2 >= 0 && CH2 <= 47) { // bien
  //    Serial.println("Atras");
  //    atras();
  //    estado = true;
  //  }
  //  if (CH1 >= 0 && CH1 <= 10) { //rotar izquierda
  //    Serial.println("izquierda");
  //    izquierda();
  //    estado = true;
  //  }
  //  if (CH1 >= 90 && CH1 <= 100) { // rotar derecha
  //    Serial.println("Derecha");
  //    derecha();
  //    estado = true;
  //  }
  //  if ((CH2 >= 55 && CH2 <= 100) && (CH1 >= 65 && CH1 <= 100)) { //
  //    Serial.println("Adelante izquierda");
  //    adelanteIzquierda();
  //    estado = true;
  //  }
  //  if ((CH2 >= 0 && CH2 <= 45) && (CH1 >= 0 && CH1 <= 35)) {
  //    Serial.println("Atras Derecha");
  //    atrasDerecha();
  //    estado = true;
  //  }
  //  if ((CH2 >= 0 && CH2 <= 45) && (CH1 >= 65 && CH1 <= 100)) {
  //    Serial.println("Atras izquierda");
  //    atrasIzquierda();
  //    estado = true;
  //  }
  //====================== servo y luz =============================
  if (CH4 >= 0 && CH4 < 50) {
    int var = map(CH4, 50, 0, 88, 180);
    myservo.write(var);
  }
  if (CH4 > 51 && CH4 < 100) {
    int var = map(CH4, 50, 98, 88, 0);
    myservo.write(var);
  }
  if (CH5 <= 5) {
    digitalWrite(26, LOW);
  } else if (CH5 > 5) {
    digitalWrite(26, HIGH);
  }
  //  if (estado == false) {
  //    detener();
  //  } else {
  //    estado = false;
  //  }

  Serial.print("CH1:");
  Serial.println(CH1);
  Serial.print("CH2:");
  Serial.println(CH2);
  Serial.print("CH3:");
  Serial.println(CH3);
  Serial.print("CH4:");
  Serial.println(CH4);
  Serial.print("CH5:");
  Serial.println(CH5);
  Serial.print("CH6:");
  Serial.println(CH6);
  Serial.println("");


  //delay(300);
}

void atras() {
  analogWrite(INA, 255);
  analogWrite(INB, 190);
  digitalWrite (IN2, LOW);
  digitalWrite (IN4, LOW);
  digitalWrite (IN1, HIGH);
  digitalWrite (IN3, HIGH);
}

void adelante() {
  analogWrite(INA, 255);
  analogWrite(INB, 200);
  digitalWrite (IN1, LOW);
  digitalWrite (IN3, LOW);
  digitalWrite (IN2, HIGH);
  digitalWrite (IN4, HIGH);
}

void atrasDerecha() {
  analogWrite(INA, 255);
  analogWrite(INB, 100);
  digitalWrite (IN1, HIGH);
  digitalWrite (IN2, LOW);
  digitalWrite (IN4, LOW);
  digitalWrite (IN3, HIGH);
}
void atrasIzquierda() {
  analogWrite(INA, 100);
  analogWrite(INB, 255);
  digitalWrite (IN1, HIGH);
  digitalWrite (IN2, LOW);
  digitalWrite (IN4, LOW);
  digitalWrite (IN3, HIGH);
}


void adelanteDerecha() {
  analogWrite(INA, 255);
  analogWrite(INB, 100);
  digitalWrite (IN1, LOW);
  digitalWrite (IN3, LOW);
  digitalWrite (IN2, HIGH);
  digitalWrite (IN4, HIGH);
}

void adelanteIzquierda() {
  analogWrite(INA, 100);
  analogWrite(INB, 255);
  digitalWrite (IN1, LOW);
  digitalWrite (IN2, HIGH);
  digitalWrite (IN4, HIGH);
  digitalWrite (IN3, LOW);
}

void izquierda() {
  analogWrite(INA, velocidadGiro);
  analogWrite(INB, velocidadGiro);
  digitalWrite (IN1, LOW);
  digitalWrite (IN2, HIGH);
  digitalWrite (IN4, LOW);
  digitalWrite (IN3, HIGH);
}

void derecha() {
  analogWrite(INA, velocidadGiro);
  analogWrite(INB, velocidadGiro);
  digitalWrite (IN1, HIGH);
  digitalWrite (IN2, LOW);
  digitalWrite (IN4, HIGH);
  digitalWrite (IN3, LOW);
}

void detener() {
  digitalWrite (IN4, LOW);
  digitalWrite (IN3, LOW);
  digitalWrite (IN1, LOW);
  digitalWrite (IN2, LOW);
}

