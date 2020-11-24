#include <ESP8266WiFi.h>
#include <ESP8266WebServer.h>
const char *ssid_AP = "Nodo_central";
const char *password_AP = "12345678";

const char *ssid_STA = "MakeItLab";
const char *password_STA = "Arduino123456";

// ip fija AP
IPAddress local_ipAP(192, 168, 0, 16);
IPAddress gatewayAP(192, 168, 0, 1);
IPAddress subnetAP(255, 255, 255, 0);
// ip fija para el router
IPAddress local_ipSTA(192, 168, 0, 50);
IPAddress gatewaySTA(192, 168, 0, 1);
IPAddress subnetSTA(255, 255, 255, 0);

int temp = 30;

ESP8266WebServer server(80);

void setup() {
  
  Serial.begin(115200);
  delay(10);
  Serial.println();
  
  WiFi.mode(WIFI_AP_STA);
  
  WiFi.softAPConfig(local_ipAP, gatewayAP, subnetAP);
  WiFi.config(local_ipSTA,gatewaySTA,subnetSTA);
  
  WiFi.softAP(ssid_AP, password_AP);
  WiFi.begin(ssid_STA, password_STA);
  
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
}
  WiFi.setAutoReconnect(true);
  Serial.println("WiFi conectada.");
  Serial.println();
  WiFi.printDiag(Serial);
  Serial.println();
  Serial.print("AP dirección IP: ");
  Serial.println(WiFi.softAPIP());
  Serial.print("STA dirección IP: ");
  Serial.println(WiFi.localIP());
  server.on("/datosPlanta1", [](){
  //server.send(200, "text/plain", "Hola Mundo!!");
 });
  server.begin();
  Serial.println("Servidor inicializado.");
}
void loop() {
server.handleClient();
} 
