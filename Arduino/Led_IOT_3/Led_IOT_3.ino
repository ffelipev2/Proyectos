#include <ESP8266WiFi.h>
#include <WiFiClient.h>
#include <ESP8266WebServer.h>
#include <ESP8266mDNS.h>

const char* ssid = "Makeit_Lab";
const char* password = "arduino1234";

int led = 13;
int relay = 12;
boolean estado = true;

ESP8266WebServer server(80);

void setup() {
  Serial.begin(115200);
  delay(1500);
  pinMode(led, OUTPUT);
  pinMode(relay, OUTPUT);
  wifi_connect();
  digitalWrite(led, HIGH);
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
    server.send(200, "text/html", "Make it Lab: 2 <br> MAC: "+ WiFi.macAddress());
  });
  server.on("/onled", []() {
    estado = false;
    digitalWrite(led, LOW);
    digitalWrite(relay, HIGH);
    server.send(200, "text/html", String(estado));
    delay(1000);
  });
  server.on("/offled", []() {
    estado = true;
    server.send(200, "text/html", String(estado));
    digitalWrite(led, HIGH);
    digitalWrite(relay, LOW);

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
  IPAddress ip(192, 168, 0, 52);
  IPAddress router(192, 168, 0, 1);
  IPAddress mascara(255, 255, 255, 0);
  WiFi.config(ip,router,mascara);
  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    digitalWrite(led, HIGH);
    delay(250);
    digitalWrite(led, LOW);
    delay(250);
    Serial.println(".");
  }
  Serial.println("");
  Serial.println("WiFi connected");

  //WiFi.config(ip, router, mascara);
  server.begin();
  Serial.println("Server started");
  Serial.println(WiFi.localIP());
  Serial.print("MAC: ");
  Serial.println(WiFi.macAddress());
}
