#include <ESP8266WiFi.h>
#include <ESP8266WebServer.h>
#include <ESP8266HTTPClient.h>

const char *ssid_AP = "Nodo Central";
const char *password_AP = "plantas1234";

const char *ssid_STA = "iot";
const char *password_STA = "arduino123";
ESP8266WebServer server(80);

void setup() {
  Serial.begin(115200);
  delay(10);
  Serial.println();
  WiFi.mode(WIFI_AP_STA);
  WiFi.softAP(ssid_AP, password_AP);
  WiFi.begin(ssid_STA, password_STA);
  while (WiFi.status() != WL_CONNECTED) {
    delay(200);
    Serial.print(".");
  }
  WiFi.setAutoReconnect(true);
  Serial.println("WiFi conectada.");
  Serial.println();
  WiFi.printDiag(Serial);
  Serial.println();
  
  IPAddress local_ip(192, 168, 0, 10);                           //Modifica la dirección IP 
  IPAddress gateway(192, 168, 0, 1);   
  IPAddress subnet(255, 255, 255, 0);
  WiFi.softAPConfig(local_ip, gateway, subnet);
  Serial.println();
  Serial.print("Access Point - Nueva direccion IP: ");
  Serial.println(WiFi.softAPIP());
  
  /*
  Serial.print("AP dirección IP: ");
  Serial.println(WiFi.softAPIP());
  Serial.print("STA dirección IP: ");
  Serial.println(WiFi.localIP());
  */
  
  server.on("/", [](){
  server.send(200, "text/plain", "Hola Mundo!!");
  });
  server.begin();
  Serial.println("Servidor inicializado.");
}

void loop() {
  
  server.handleClient();
  
} 
