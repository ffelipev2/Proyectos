#include <ESP8266WiFi.h>
#include <WiFiClient.h>
#include <ESP8266WebServer.h>
#include <ESP8266mDNS.h>

MDNSResponder mdns;
const char* ssid = "Felipe";
const char* password = "ramses123";

const unsigned char CLOSE_COMMAND[] = { 0xA0, 0x01, 0x00, 0xA1 };
const unsigned char OPEN_COMMAND[] = { 0xA0, 0x01, 0x01, 0xA2 };
boolean estado = true;

ESP8266WebServer server(80);

void setup() {
  Serial.begin(9600);
  delay(1500);
  wifi_connect();
}

void loop() {
  if (WiFi.status() != WL_CONNECTED) {
    wifi_connect();
  } else {
    server.handleClient();
  }
}

void wifi_connect() {
  server.on("/", []() {
    server.send(200, "text/html", "Ampolleta uno");
  });
  server.on("/onled", []() {
    estado = false;
    Serial.write(OPEN_COMMAND, 4);
    server.send(200, "text/html", String(estado));
    delay(1000);
  });
  server.on("/offled", []() {
    estado = true;
    server.send(200, "text/html", String(estado));
    Serial.write(CLOSE_COMMAND, 4);
    delay(1000);
  });
  server.on("/estado", []() {
    server.send(200, "text/html", String(estado));
    delay(1000);
  });
  server.begin();
  Serial.println("HTTP server started");
  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);
  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);
  IPAddress ip(192, 168, 0, 50);
  IPAddress router(192, 168, 0, 1);
  IPAddress mascara(255, 255, 255, 0);

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.println(".");
  }
  Serial.println("");
  Serial.println("WiFi connected");

  WiFi.config(ip, router, mascara);
  server.begin();
  Serial.println("Server started");
  Serial.println(WiFi.localIP());
  Serial.print("MAC: ");
  Serial.println(WiFi.macAddress());
}
