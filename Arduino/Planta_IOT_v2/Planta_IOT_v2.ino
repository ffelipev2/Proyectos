#include <Arduino.h>
#if defined(ESP32)
#include <WiFi.h>
#elif defined(ESP8266)
#include <ESP8266WiFi.h>
#endif
#include <Firebase_ESP_Client.h>
#define DHTTYPE DHT11
//Provide the token generation process info.
#include "addons/TokenHelper.h"
//Provide the RTDB payload printing info and other helper functions.
#include "addons/RTDBHelper.h"
#include <DHT.h>
// Insert your network credentials
#define WIFI_SSID "Mi_casa"
#define WIFI_PASSWORD "ramses123"

// Insert Firebase project API Key
#define API_KEY "AIzaSyDu4-HdtJe-sfGgDcJKHtQmMQMBxDLzjuY"

// Insert RTDB URLefine the RTDB URL */
#define DATABASE_URL "https://proyectosiot-22583-default-rtdb.firebaseio.com/"

//Define Firebase Data object
FirebaseData fbdo;

FirebaseAuth auth;
FirebaseConfig config;

unsigned long sendDataPrevMillis = 0;
int count = 0;
bool signupOK = false;



const int DHTin = 22;
int temp = 0;
int hum = 0;
int hum2 = 0;
int luz = 0;

float asoilmoist;
String luminocidad;
String humedad2;

DHT dht(DHTin, DHTTYPE);



void setup() {
  Serial.begin(115200);
  dht.begin();
  WiFi.begin(WIFI_SSID, WIFI_PASSWORD);
  Serial.print("Connecting to Wi-Fi");
  while (WiFi.status() != WL_CONNECTED) {
    Serial.print(".");
    delay(300);
  }
  Serial.println();
  Serial.print("Connected with IP: ");
  Serial.println(WiFi.localIP());
  Serial.println();

  /* Assign the api key (required) */
  config.api_key = API_KEY;

  /* Assign the RTDB URL (required) */
  config.database_url = DATABASE_URL;

  /* Sign up */
  if (Firebase.signUp(&config, &auth, "", "")) {
    Serial.println("ok");
    signupOK = true;
  }
  else {
    Serial.printf("%s\n", config.signer.signupError.message.c_str());
  }

  /* Assign the callback function for the long running token generation task */
  config.token_status_callback = tokenStatusCallback; //see addons/TokenHelper.h

  Firebase.begin(&config, &auth);
  Firebase.reconnectWiFi(true);
}

void loop() {

  temp = int(dht.readTemperature());
  hum = int(dht.readHumidity());

  asoilmoist = 0.95 * asoilmoist + 0.05 * analogRead(32);
  luz = map(analogRead(34), 0, 4095, 0, 1023);


  if (Firebase.ready() && signupOK && (millis() - sendDataPrevMillis > 1000 || sendDataPrevMillis == 0)) {
    sendDataPrevMillis = millis();
    // Write an Int number on the database path test/int
    if (temp < 100) {
      if (Firebase.RTDB.setInt(&fbdo, "PlantaIOT/temperatura", temp)) {
        Serial.println("PASSED");
        Serial.println("PATH: " + fbdo.dataPath());
        Serial.println("TYPE: " + fbdo.dataType());
        Serial.print("Valor: ");
        Serial.println(temp);
      }
      else {
        Serial.println("FAILED");
        Serial.println("REASON: " + fbdo.errorReason());
      }
    }
    // setInt , setFloat
    if (hum <= 100) {
      if (Firebase.RTDB.setInt(&fbdo, "PlantaIOT/humedad", hum)) {
        Serial.println("PASSED");
        Serial.println("PATH: " + fbdo.dataPath());
        Serial.println("TYPE: " + fbdo.dataType());
        Serial.print("Valor: ");
        Serial.println(hum);

      }
      else {
        Serial.println("FAILED");
        Serial.println("REASON: " + fbdo.errorReason());
      }
    }
    // Write an Float number on the database path test/float
    if (Firebase.RTDB.setInt(&fbdo, "PlantaIOT/humedadS", int(asoilmoist))) {
      Serial.println("PASSED");
      Serial.println("PATH: " + fbdo.dataPath());
      Serial.println("TYPE: " + fbdo.dataType());
      Serial.print("Valor: ");
      Serial.println(asoilmoist);
    }
    else {
      Serial.println("FAILED");
      Serial.println("REASON: " + fbdo.errorReason());
    }

    // Write an Float number on the database path test/float
    if (Firebase.RTDB.setInt(&fbdo, "PlantaIOT/luminocidad", luz)) {
      Serial.println("PASSED");
      Serial.println("PATH: " + fbdo.dataPath());
      Serial.println("TYPE: " + fbdo.dataType());
      Serial.print("Valor: ");
      Serial.println(luz);
    }
    else {
      Serial.println("FAILED");
      Serial.println("REASON: " + fbdo.errorReason());
    }
  }
}
