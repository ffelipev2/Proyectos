#include <Wire.h>
#include <LiquidCrystal_I2C.h>
LiquidCrystal_I2C lcd(0x27, 16, 2);

#define PIN_MOTOR 3
//--------acelerometro------
const int ypin1 = 0;
const int zpin1 = 1;
const int ypin2 = 2;
const int zpin2 = 3;

float acely1 = 0.00;
float acelz1 = 0.00;
float acely2 = 0.00;
float acelz2 = 0.00;

int y1 = 0;
int z1 = 0;
int y2 = 0;
int z2 = 0;

float mvADC = 4.8828125; // 5000mV/1024
float mvG = 300; // 300mV/g

//------------------------
unsigned int velocidad = 160;
unsigned long tiempo = 1;
int tiempoE;
int velocidadE;
char unChar;
float acelerometro1 = 0.0;
float acelerometro2 = 0.0;
String readString;

void setup() {
  pinMode(PIN_MOTOR , OUTPUT);
  pinMode(ypin1, INPUT);
  pinMode(ypin2, INPUT);
  lcd.init();
  lcd.backlight();
  lcd.setCursor(0, 0);
  lcd.print("Mini PaintShaker");
  lcd.setCursor(4, 1);
  lcd.print("Ready :)");
  Serial.begin(115200);
  delay(2000);
  menuPrincipal2();
}

void loop() {

  if (Serial.available() > 0) {
    unChar = Serial.read();

    if (unChar == 'A') {
      // comenzar
      ejecutar();
    }

    if (unChar == 'B') {

    }

    if (unChar == 'C') {
      // velocidad
      delayMicroseconds(300);
      while (Serial.available()) {
        //delayMicroseconds(100);
        char c = Serial.read();
        readString += c;
      }
      if (readString.length() > 0) {
        velocidad = readString.toInt();
        Velocidad(velocidad);
        readString = "";
      }
    }
    if (unChar == 'D') {
      // tiempo
      delayMicroseconds(300);
      while (Serial.available()) {
        char c = Serial.read();
        readString += c;
      }
      if (readString.length() > 0) {
        //Serial.print("Tiempo : ");
        unsigned long tiempo = readString.toInt();
        //Serial.println(tiempo);
        //Serial.println(readString.toInt());
        Tiempo(tiempo);
        readString = "";
      }
    }
  }

}

void ejecutar() {
  analogWrite(PIN_MOTOR, velocidad);
  int offset = 0;
  unsigned long t0 = millis();
  while ( millis() - t0 <= tiempo) {

    if (Serial.available() > 0) {
      unChar = Serial.read();

      if (unChar == 'B') {
        limpiar(0);
        y1 = 0.0;
        z1 = 0.0;
        y2 = 0.0;
        z2 = 0.0;
        break;
        //Serial.println("Parar");
      }
    }
    lcd.clear();
    lcd.setCursor(4 + offset, 0);
    lcd.print("Shaking");
    offset = offset == 3 ? -3 : offset + 1;
    // -----------acelerometro------------
    y1 = analogRead(ypin1);
    z1 = analogRead(zpin1);
    y2 = analogRead(ypin2);
    z2 = analogRead(zpin2);
    acely1 = ((y1 - 370) * mvADC) / mvG;
    acelz1 = ((z1 - 380.62) * mvADC) / mvG;
    acely2 = ((y2 - 369) * mvADC) / mvG;
    acelz2 = ((z2 - 407.62) * mvADC) / mvG;
    Serial.print(acely1, 2);
    Serial.print(',');
    Serial.print(acelz1, 2);
    Serial.print(',');
    Serial.print(acely2, 2);
    Serial.print(',');
    Serial.println(acelz2, 2);
    Serial.flush();
    //-------------------------------------------
    int porcentaje = 100 * (millis() - t0) / tiempo;
    int nCuadros = map(porcentaje, 0, 100, 1, 16);
    for (int i = 0; i < nCuadros; i++) {
      lcd.setCursor(i, 1);
      lcd.write(255);
    }
    delay(100);
  }

  analogWrite(PIN_MOTOR, 0);
  lcd.clear();
  menuPrincipal2();

}



void Velocidad(int velo) {
  limpiar(0);
  //Serial.print("Velocidad: ");
  //Serial.println(velocidad);
  velocidad = velo;
  velocidadE = velocidad ;
  lcd.setCursor(0, 0);
  lcd.print("Velocidad: ");
  lcd.setCursor(11, 0);
  lcd.print(velocidad);
  lcd.setCursor(14, 0);
  lcd.print(" %");
  velocidad = map(velocidad, 0, 100, 0, 255);
  Serial.println(velocidad);
}

void Tiempo(int tiem) {
  //limpiar(1);
  tiempo = tiem;
  tiempoE = tiem;
  lcd.setCursor(0, 1);
  lcd.print("Tiempo   :");
  lcd.setCursor(11, 1);
  lcd.print( tiempo); // Conversion a minutos
  lcd.setCursor(13, 1);
  lcd.print("min");
  tiempo =  (tiempo) * (60000);
  //Serial.println(tiempo);
}


void menuPrincipal2() {
  lcd.clear();
  lcd.setCursor(0, 0);
  lcd.print("Velocidad: ");
  lcd.setCursor(11, 0);
  lcd.print(velocidadE);
  lcd.setCursor(14, 0);
  lcd.print(" %");
  lcd.setCursor(0, 1);
  lcd.print("Tiempo   :");
  lcd.setCursor(11, 1);
  lcd.print(tiempoE); // Conversion a minutos
  lcd.setCursor(13, 1);
  lcd.print("min");
}

void limpiar(int pantalla) {
  int i = 0;
  lcd.setCursor(0, pantalla);
  for ( i = 0; i < 16 ; i ++) {
    lcd.print(" ");
  }
}


