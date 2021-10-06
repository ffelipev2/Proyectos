//............................................................................
//..Es obligatorio seguir el orden indicado en la inclusion de las librerias..
//............................................................................
//............................   ESP 8266   ..................................
#include "FirebaseESP8266.h"
#include <ESP8266WiFi.h>
//............................    ESP 32    ..................................
//#include <WiFi.h>
//#include <FirebaseESP32.h>

#define FIREBASE_HOST "pruebas-appinventor-cee09.firebaseio.com" //Sin http:// o https:// 
#define FIREBASE_AUTH "f8cBY7L67UqglRBBxa0o1mVE24GvVeu6yofQTla5"
#define WIFI_SSID "Mi_casa"
#define WIFI_PASSWORD "ramses123"

String path = "/Ejemplo";
//Define un objeto de Firebase
FirebaseData firebaseData;

void printResult(FirebaseData &data);
void CausaError(void);


void setup()
{
  Serial.begin(115200);
  pinMode(D1, OUTPUT);
  pinMode(D0, OUTPUT);
  WiFi.begin(WIFI_SSID, WIFI_PASSWORD);
  Serial.print("Conectando a ....");
  while (WiFi.status() != WL_CONNECTED)
  {
    digitalWrite(D0, HIGH);
    Serial.print(".");
    delay(150);
    digitalWrite(D0, LOW);
    delay(150);
  }
  digitalWrite(D0, HIGH);
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
  if (Firebase.setString(firebaseData, path + "/Sensor_1", "0")) {
    InforSetLuzSensor();
  } else {
    CausaError();
  }
  //if (Firebase.setString(firebaseData, path + "/Luz_2", "1")){InforSetLuzSensor();}else{CausaError();}
  //if (Firebase.setString(firebaseData, path + "/Luz_3", "1")){InforSetLuzSensor();}else{CausaError();}


  Serial.println("------------------------------------");
  Serial.println("  LEER  EL  ESTADO  DE  LAS  LUCES  ");
  if (Firebase.getString(firebaseData, path + "/Luz_1" )) {
    InforGetLuzSensor();
  } else {
    CausaError();
  }
  //if (Firebase.getString(firebaseData, path + "/Luz_2" )){InforGetLuzSensor(); }else{CausaError(); }
  //if (Firebase.getString(firebaseData, path + "/Luz_3" )){InforGetLuzSensor(); }else{CausaError(); }


}

void loop() {
  if (Firebase.getString(firebaseData, path + "/Luz_1" )) {
    if (firebaseData.stringData() == "1") { //  if(firebaseData.intData() == "1"){
      digitalWrite(D1, HIGH);
    } else {
      digitalWrite(D1, LOW);
    }
  } else
  { CausaError();
  }
  String var = String(analogRead(A0));
  Serial.println(var);
  if (Firebase.setString(firebaseData, path + "/Sensor_1", var)) {
    datosSensor_1();
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

void datosSensor_1(void)
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
