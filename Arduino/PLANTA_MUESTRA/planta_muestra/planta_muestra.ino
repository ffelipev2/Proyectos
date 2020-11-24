#include <WiFi.h>
#include <WiFiClient.h>
#include <WebServer.h>
#include <DHT.h>
#define DHTTYPE DHT11
const int DHTin = 22;

DHT dht(DHTin, DHTTYPE);


const char* ssid     = "USS_PLANTAS_0";
const char* password = "arduino123";
int temp = 0;
int hum = 0;
int hum2 = 0;
int luz = 0;

float asoilmoist;
String luminocidad;
String humedad2;



WebServer server(80);

void setup() {
  
  Serial.begin(115200);
  dht.begin();
  WiFi.mode(WIFI_AP);
  
  while(!WiFi.softAP(ssid, password))
  {
   Serial.println(".");
    delay(100);
  }
  
  IPAddress local_ip(192, 168, 0, 10);                           
  IPAddress gateway(192, 168, 0, 1);   
  IPAddress subnet(255, 255, 255, 0);
  WiFi.softAPConfig(local_ip, gateway, subnet);
  
  IPAddress myIP = WiFi.softAPIP();
  Serial.print("AP IP address: ");
  Serial.println(myIP);
  
  
  server.on("/", [](){
  server.send(200, "text/plain", "Hola Mundo!!");
  });
 
  server.on("/datos", [](){
    while (isnan(dht.readTemperature()) || isnan(dht.readHumidity())) {
    Serial.println("Error");
    delay(200);
  }

  
  temp = int(dht.readTemperature());
  String temperatura = (String)temp;
  hum = int(dht.readHumidity());
  String humedad = (String)hum;
  
  asoilmoist=0.95*asoilmoist+0.05*analogRead(32);
  if (asoilmoist >= 2100){
     humedad2 = "Seco";
  }
  if(asoilmoist > 1700 && asoilmoist<2100){
     humedad2 = "Semi Humedo";
  }
  if(asoilmoist > 0 && asoilmoist<=1699){
     humedad2 = "Humedo";
  }

  luz = map(analogRead(34), 0, 4095, 0, 1023);
  if (luz >=1000){
    luminocidad = "Muy Baja";
  }
  if (luz >=400 && luz <1000){
    luminocidad = "Baja";
  }
  if (luz >=120 && luz < 400){
    luminocidad = "Media";
  }
  if (luz < 120){
    luminocidad = "Muy Alta";
  }
  
  String datos = temperatura+","+humedad+","+humedad2+","+luminocidad;

  
  server.send(200, "text/plain",datos);
  });


  server.begin();
  Serial.println("Server started");
  Serial.print("MAC: ");
  Serial.println(WiFi.macAddress());
  

}

void loop() {
    asoilmoist=0.95*asoilmoist+0.05*analogRead(32);
    server.handleClient();
}
