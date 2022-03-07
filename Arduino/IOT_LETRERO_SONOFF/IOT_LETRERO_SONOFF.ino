#include "FirebaseESP8266.h"
#include <ESP8266WiFi.h>

//............................    ESP 32    ..................................
//#include <WiFi.h>
//#include <FirebaseESP32.h>

#define FIREBASE_HOST "proyectosmakeit-400fc-default-rtdb.firebaseio.com" //Sin http:// o https:// 
#define FIREBASE_AUTH "U6ARoGuWTjFQOnLUyP17fSyqYuR9n6teF0TqWh5P"
#define WIFI_SSID "Makeit_Lab"
#define WIFI_PASSWORD "arduino1234"

String path = "/DispositivosIOT";
//Define un objeto de Firebase
FirebaseData firebaseData;

void printResult(FirebaseData &data);
void CausaError(void);
void InforSetLuzSensor(void);
void InforGetLuzSensor(void);
int rele = 12;
int led = 13;

void setup()
{
  Serial.begin(9600);
  pinMode(rele,OUTPUT);
  pinMode(led,OUTPUT);
  WiFi.begin(WIFI_SSID, WIFI_PASSWORD);
  Serial.print("Conectando a ....");
  while (WiFi.status() != WL_CONNECTED)
  {
    digitalWrite(led,HIGH);
    delay(300);
    digitalWrite(led,LOW);
    delay(300);
    Serial.print(".");
  }
  digitalWrite(led,LOW);
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
  if (Firebase.setString(firebaseData, path + "/Luz_letrero", "0")) {
    InforSetLuzSensor();
  } else {
    CausaError();
  }

  Serial.println("------------------------------------");
  Serial.println("  LEER  EL  ESTADO  DE  LAS  LUCES  ");
  if (Firebase.getString(firebaseData, path + "/Luz_letrero" )) {
    InforGetLuzSensor();
  } else {
    CausaError();
  }

}

void loop() {


  if (Firebase.getString(firebaseData, path + "/Luz_letrero" )) {
    if (firebaseData.stringData() == "1") { //  if(firebaseData.intData() == "1"){
      digitalWrite(rele,HIGH);
      digitalWrite(led,LOW);
    } else {
      digitalWrite(rele,LOW);
      digitalWrite(led, HIGH);
    }
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
