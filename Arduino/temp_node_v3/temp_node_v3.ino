#include <ArduinoJson.h>
#include <StreamString.h>
#include <Arduino.h>
#include <ESP8266WiFi.h>
#include <ESP8266WiFiMulti.h>
#include <WebSocketsClient.h>
#include <Hash.h>
#include <DHT.h>
#define DHTTYPE DHT11
#define DHTPIN D2
#define USE_SERIAL Serial
#define MESSAGE_INTERVAL 600000

String page;


ESP8266WiFiMulti WiFiMulti;
WebSocketsClient webSocket;
DHT dht(DHTPIN, DHTTYPE, 11);

long previousMillis = 0;
float humidity, temperature;
String temp = "";
String hum = "";
String hum2 ="";
String sensor_id = "";
String mac = "";


uint64_t messageTimestamp = 0;
uint64_t heartbeatTimestamp = 0;
bool isConnected = false;

void webSocketEvent(WStype_t type, uint8_t * payload, size_t length) {

  switch (type) {
    case WStype_DISCONNECTED:
      USE_SERIAL.printf("[WSc] Disconnected!\n");
      isConnected = false;
      break;
    case WStype_CONNECTED: {
        USE_SERIAL.printf("[WSc] Connected to url: %s\n", payload);
        isConnected = true;

        // send message to server when Connected
        //webSocket.sendTXT("Connected");
      }
      break;
    case WStype_TEXT:
      USE_SERIAL.printf("[WSc] get text: %s\n", payload);

      // send message to server
      // webSocket.sendTXT("message here");
      break;
    case WStype_BIN:
      USE_SERIAL.printf("[WSc] get binary length: %u\n", length);
      hexdump(payload, length);

      // send data to server
      // webSocket.sendBIN(payload, length);
      break;
  }

}

void setup() {

  USE_SERIAL.begin(115200);
  USE_SERIAL.setDebugOutput(true);
  USE_SERIAL.println();
  USE_SERIAL.println();
  USE_SERIAL.println();

  for (uint8_t t = 4; t > 0; t--) {
    USE_SERIAL.printf("[SETUP] BOOT WAIT %d...\n", t);
    USE_SERIAL.flush();
    delay(1000);
  }
  WiFiMulti.addAP("iot", "arduino123");
  //WiFiMulti.addAP("ARRIS-01B2", "BNX6A1302732");
  //WiFiMulti.addAP("VTR-0515431", "Ms2vzssfgHwk");
  while (WiFiMulti.run() != WL_CONNECTED) {
    delay(100);
  }

  //server aerialsd.cl
  webSocket.begin("40.87.121.203", 80, "/measures/");
  webSocket.onEvent(webSocketEvent);
  webSocket.setReconnectInterval(5000);

}

void getData() {
  humidity = dht.readHumidity();
  //Serial.print("Humedad : ");
  //Serial.println(humidity);
  temperature = dht.readTemperature();
  //Serial.print("Temperatura :");
  //Serial.println(temperature);

  if (isnan(humidity) || isnan(temperature)) {
    Serial.println("Failed to read from DHT sensor!");
    return ;
  }
  temp = String((int)temperature);
  hum = String((int)humidity);
  Serial.println(analogRead(A0));
  hum2 = String (analogRead(A0));
  mac = WiFi.macAddress();
  //USE_SERIAL.println(WiFi.macAddress()); // la mac impresa
  WiFiClient client;
  //String host = "www.plantas-prueba.ga/get_prueba/insert_get.php?password=123&mac=" + mac+ "&temperatura=" + temp + "&humedad1="+ hum +"&humedad2=" +hum2;
  send_data();

  StaticJsonBuffer<200> jsonBuffer;
  JsonObject& root = jsonBuffer.createObject();
  root["sensor_id"] = sensor_id;
  //JsonObject& data = root.createNestedObject("data");
  root.set("ambient_temperature", temp);
  root.set("ambient_humidity", hum);
  root.set("ground_humidity", hum2);
  StreamString databuf;
  root.printTo(databuf);
  webSocket.sendTXT(databuf);

}

void loop() {
  webSocket.loop();

  if (isConnected) {

    unsigned long currentMillis = millis();

    if (currentMillis - previousMillis > MESSAGE_INTERVAL) {

      previousMillis = currentMillis;

      sensor_id = String(WiFi.macAddress());

      getData();

    }
  }
}

void send_data() {
  WiFiClient client;
  const char* host = "www.plantas-prueba.ga";

  Serial.printf("\n[Connecting to %s ... ", host);
  if (client.connect(host, 80))
  {
    Serial.println("connected]");

    Serial.println("[Sending a request]");
    client.print(String("GET /get_prueba/insert_get.php?password=123&mac=" + mac+ "&temperatura=" + temp + "&humedad1="+ hum +"&humedad2=" +hum2) + " HTTP/1.1\r\n" +
                 "Host: " + host + "\r\n" +
                 "Connection: close\r\n" +
                 "\r\n"
                );

    Serial.println("[Response:]");
    while (client.connected() || client.available())
    {
      if (client.available())
      {
        String line = client.readStringUntil('\n');
        //Serial.println(line);
      }
    }
    client.stop();
    Serial.println("\n[Disconnected]");
  }
  else
  {
    Serial.println("connection failed!]");
    client.stop();
  }
  delay(2000);
}




