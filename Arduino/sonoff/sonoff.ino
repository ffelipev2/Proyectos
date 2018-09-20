#include <ESP8266WiFi.h>
#include <WiFiClient.h>
#include <ESP8266WebServer.h>
#include <ESP8266mDNS.h>

MDNSResponder mdns;
const char* ssid = "iot";
const char* password = "arduino123";

int gpio13Led = 13;
int gpio12Relay = 12;

ESP8266WebServer server(81);

void setup() {
  Serial.begin(115200);
  delay(1500);
  pinMode(gpio13Led, OUTPUT);
  digitalWrite(gpio13Led, HIGH);
  pinMode(gpio12Relay, OUTPUT);
  digitalWrite(gpio12Relay, LOW);
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
    server.send(200, "text/html", "Ampolleta 4");
  });
  server.on("/onled/4", []() {
    server.send(200, "text/html", "1");
    digitalWrite(gpio13Led, LOW);
    digitalWrite(gpio12Relay, HIGH);
    delay(1000);
  });
  server.on("/offled/4", []() {
    server.send(200, "text/html", "0");
    digitalWrite(gpio13Led, HIGH);
    digitalWrite(gpio12Relay, LOW);
    delay(1000);
  });
    server.on("/estado/4", []() {
    server.send(200, "text/html", "0");
    digitalWrite(gpio13Led, HIGH);
    digitalWrite(gpio12Relay, LOW);
    delay(1000);
  });
  server.begin();
  Serial.println("HTTP server started");
  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);
  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);
  IPAddress ip(192, 168, 0, 80);
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
