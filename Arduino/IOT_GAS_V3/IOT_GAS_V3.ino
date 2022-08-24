#include "FirebaseESP8266.h"
#include <ESP8266WiFi.h>
//............................    ESP 32    ..................................
//#include <WiFi.h>
//#include <FirebaseESP32.h>

#define FIREBASE_HOST "proyectosiot-22583-default-rtdb.firebaseio.com/" //Sin http:// o https:// 
#define FIREBASE_AUTH "LLZIwSnJ3cCUCwfAfYiWalwXf2Zm0SCfQ7kH7pFj"
#define WIFI_SSID "Mi_casa"
#define WIFI_PASSWORD "ramses123"
#define RZERO 8459

#include "MQ135.h"
MQ135 gasSensor = MQ135(A0);

String path = "/DispositivosIOT";
//Define un objeto de Firebase
FirebaseData firebaseData;

void printResult(FirebaseData &data);
void CausaError(void);
void InforSetLuzSensor(void);
void InforGetLuzSensor(void);
int sensorPin = A0;
// leds
int rled = D1;
int gled = D2;
int bled = D3;


void setup()
{
  Serial.begin(115200);
  pinMode(rled , OUTPUT);
  pinMode(bled, OUTPUT);
  pinMode(gled, OUTPUT);
  analogWrite(rled, 0);
  analogWrite(bled, 0);
  analogWrite(gled, 0);
  pinMode(sensorPin, INPUT);
  WiFi.begin(WIFI_SSID, WIFI_PASSWORD);
  Serial.print("Conectando a ....");
  while (WiFi.status() != WL_CONNECTED)
  {
    Serial.print(".");
    delay(300);
  }
  Serial.println();
  Serial.print("Conectado con la IP: ");
  Serial.println(WiFi.localIP());
  Serial.println();

  Firebase.begin(FIREBASE_HOST, FIREBASE_AUTH);
  Firebase.reconnectWiFi(true);

  //Establezca el tiempo de espera de lectura de la base de datos en 1 minuto (máximo 15 minutos)
  Firebase.setReadTimeout(firebaseData, 1000 * 60);

  //Tamaño y  tiempo de espera de escritura, tiny (1s), small (10s), medium (30s) and large (60s).
  //tiny, small, medium, large and unlimited.
  Firebase.setwriteSizeLimit(firebaseData, "tiny");

  Serial.println("------------------------------------");
  Serial.println("  ACTUALIZAR EL ESTADO DE LAS LUCES ");
  //Also can use Firebase.set instead of Firebase.setDouble
  if (Firebase.setString(firebaseData, path + "/Luz_1", "0")) {
    InforSetLuzSensor();
  } else {
    CausaError();
  }
  if (Firebase.setString(firebaseData, path + "/Luz_2", "0")) {
    InforSetLuzSensor();
  } else {
    CausaError();
  }
  if (Firebase.setString(firebaseData, path + "/Luz_3", "0")) {
    InforSetLuzSensor();
  } else {
    CausaError();
  }


  Serial.println("------------------------------------");
  Serial.println("  LEER  EL  ESTADO  DE  LAS  LUCES  ");
  if (Firebase.getString(firebaseData, path + "/Luz_1" )) {
    InforGetLuzSensor();
  } else {
    CausaError();
  }
  if (Firebase.getString(firebaseData, path + "/Luz_2" )) {
    InforGetLuzSensor();
  } else {
    CausaError();
  }
  if (Firebase.getString(firebaseData, path + "/Luz_3" )) {
    InforGetLuzSensor();
  } else {
    CausaError();
  }


}

void loop() {

  int ppm = gasSensor.getPPM();
  int zero = gasSensor.getRZero();
  if (ppm >= 0 && ppm < 700) {
    analogWrite(rled, 0);
    analogWrite(gled, 255);
    analogWrite(bled, 0);
  } else if ( ppm >= 700 && ppm < 1200) {
    analogWrite(rled, 240);
    analogWrite(gled, 240);
    analogWrite(bled, 16);
  } else if ( ppm >= 1200) {
    analogWrite(rled, 255);
    analogWrite(gled, 0);
    analogWrite(bled, 0);
  }
  Serial.print("El valor Zero : ");
  Serial.println(zero);
  String var = String(ppm);
  Serial.print("El valor de PPM es de : ");
  Serial.println(var);

  if (Firebase.setString(firebaseData, path + "/Sensor_2", var)) {
    datosSensor();
  } else {
    CausaError();
  }
  delay(1000);
}

void InforGetLuzSensor(void)
{
  Serial.println("Aprobado");
  Serial.println("Ruta: " + firebaseData.dataPath());
  Serial.println("Tipo: " + firebaseData.dataType());
  Serial.println("ETag: " + firebaseData.ETag());
  Serial.print("Valor: ");
  printResult(firebaseData);
  Serial.println("------------------------------------");
  Serial.println();
}

void InforSetLuzSensor(void)
{
  Serial.println("Aprobado");
  Serial.println("Ruta: " + firebaseData.dataPath());
  Serial.println("Tipo: " + firebaseData.dataType());
  Serial.println("ETag: " + firebaseData.ETag());
  Serial.print("Valor: ");
  printResult(firebaseData);
  Serial.println("------------------------------------");
  Serial.println();
}

void datosSensor(void)
{
  Serial.println("Aprobado");
  Serial.println("Ruta: " + firebaseData.dataPath());
  Serial.println("Tipo: " + firebaseData.dataType());
  Serial.println("ETag: " + firebaseData.ETag());
  Serial.print("Valor: ");
  printResult(firebaseData);
  Serial.println("------------------------------------");
  Serial.println();
}

void CausaError(void)
{
  Serial.println("ERROR");
  Serial.println("RAZON: " + firebaseData.errorReason());
  Serial.println("------------------------------------");
  Serial.println();
}

void printResult(FirebaseData &data)
{
  if (data.dataType() == "int")
    Serial.println(data.intData());
  else if (data.dataType() == "float")
    Serial.println(data.floatData(), 5);
  else if (data.dataType() == "double")
    printf("%.9lf\n", data.doubleData());
  else if (data.dataType() == "boolean")
    Serial.println(data.boolData() == 1 ? "true" : "false");
  else if (data.dataType() == "string")
    Serial.println(data.stringData());
}
