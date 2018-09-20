#include <ESP8266WiFi.h>

const char* ssid = "iot";
const char* password = "arduino123";
int led = 0;
boolean estado = false;
int val = 1;


WiFiServer server(81);

void setup() {
  Serial.begin(115200);
  delay(1500);
  pinMode(led, OUTPUT);
  digitalWrite(led, LOW);
  wifi_connect();

}

void loop() {
  if (WiFi.status() != WL_CONNECTED) {
    wifi_connect();
  } else {
    main_sketch();
  }
}

void wifi_connect() {
  // Connect to WiFi network
  Serial.println();
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
}

void main_sketch() {
  WiFiClient client = server.available();
  if (!client) {
    return;
  }

  // Wait until the client sends some data
  Serial.println("new client");
  while (!client.available()) {
    delay(1);
  }

  // Read the first line of the request
  String req = client.readStringUntil('\r');
  Serial.println(req);
  client.flush();

  // Match the request
  if (req.indexOf("/offled/1") != -1)
    val = 0;
  else if (req.indexOf("/onled/1") != -1)
    val = 1;
  else if (req.indexOf("/estado/1") != -1) {
    String s = "HTTP/1.1 200 OK\r\nContent-Type: text/html\r\n\r\n<!DOCTYPE HTML>\r\n<html>\r\n";
    s += (val);
    s += "</html>\n";
  }
  else {
    Serial.println("invalid request");
    client.stop();
    return;
  }

  // Set GPIO2 according to the request
  digitalWrite(led, val);

  client.flush();

  // Prepare the response
  String s = "HTTP/1.1 200 OK\r\nContent-Type: text/html\r\n\r\n<!DOCTYPE HTML>\r\n<html>\r\n";
  s += (val);
  s += "</html>\n";

  // Send the response to the client
  client.print(s);
  delay(1);
  Serial.println("Client disonnected");

  // The client will actually be disconnected
  // when the function returns and 'client' object is detroyed
}

