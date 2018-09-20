/*se llaman a las librerias que hacen uso de los dispositivos externos,protocolo
de comunicaci�n SPI y otras que permiten trabajar con variables. Las librerias llamadas son para
los siguientes componentes: Pantalla LCD, Modulo de reloj, Shiel Ethernet, Modulo RFID, Modulo SD card.
*/

#include <DHT.h>
#define DHTPIN 31
#define DHTTYPE DHT11
#include <SPI.h>
#include <String.h>
#include <Ethernet.h>
#include <RFID.h>
#include <SD.h>
#include <Wire.h>
#include <LiquidCrystal_I2C.h>
#include <stdlib.h>
#include <virtuabotixRTC.h>

virtuabotixRTC myRTC(28, 29, 30); // se asignan los pines de comunicacion del modulo de reloj

LiquidCrystal_I2C lcd(0x27, 16, 2); // se asigna la direccion de memoria de la pantalla, y el tama�o
DHT dht(DHTPIN, DHTTYPE);
RFID rfid(53, 5); //Pines de comunicacion del  primer modulo RFID, SDA y RST
RFID rfid2(22, 24); // //Pines de comunicacion del segundo modulo RFID, SDA y RST
int numero_serie[5]; // Variable que almacena el ID de la tarjeta
byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED }; // Mac del servidor
byte ip[] = { 192, 168, 1, 34 }; // Ip del servidor
EthernetServer server(80); // Puerto de servicio

int led = 8; // Led de prueba
int opt = 0; //variable opci�n
String readString = ""; // string para recibir datos de la web


void setup() {
	pinMode(26, OUTPUT); // led que permite saber el estado de la tarjeta que registra
	pinMode(27, OUTPUT); // led que permite confirmar cuando el usuario se ha registrado
	pinMode(32, OUTPUT); // permite accionar el pestillo electrico.
	Ethernet.begin(mac, ip); // se inicializa la shield ethernet, recibe la mac y la ip
	pinMode(led, OUTPUT); // permite encender una luz
	SPI.begin(); // se inicializa el bus de comunicaci�n
	rfid.init(); // se inicializa el primer lector de tarjetas
	delay(50); // se deja un peque�o retardo para inicializar el segundo lector
	rfid2.init(); // se inicilaiza la segunda tarjeta
	delay(50);
	dht.begin();
	lcd.init(); // se inicializa la pantalla LCD
	lcd.backlight(); // se enciende la pantalla LCD
	delay(50);
	if (!SD.begin(4)) { // se mostrara por pantalla al usuario que el sistema no esta funcionando.
		lcd.setCursor(0, 0);
		lcd.print("Iniciando...");
		lcd.setCursor(0, 1);
		lcd.print("Estado: Error");
		delay(2500);
		lcd.clear();
		lcd.print("Reinicie sistema");
		return;
	}
	else {
		lcd.setCursor(0, 0);
		lcd.print("Iniciando...");
		lcd.setCursor(0, 1);
		lcd.print("Estado : OK");
		delay(2500);
		mensaje();
	}
}

void loop() {

	/*algoritmo que hace uso del primer modulo RFID para leer las tarjetas , valida que el usuario este en el sistema
	si la persona esta en el sistema, automaticamente tendra acceso al espacio fisico, si no , el sistema arrojara un mensaje de que el usuario
	no esta registrado */

	leer_usuario();

	/* a continuaci�n, el siguiente algoritmo verifica si existe una conexion con el servidor y adem�s, recibe los datos
	que mande la aplicaci�n a traves de peticiones HTTP, el mensaje es almacenado y comparado con cada una de las palabras
	reservadas que se utilizaron, si recibe alguna petici�n en particular el arduino realizara una acci�n.Ejemplo: desde la
	aplicacion apretando el boton "encender" internamente se manda la petici�n http://192.168.1.34/:80/?Onled hacia el arduino
	el arduino lo recibe y busca dentro de la alternaticas la palabra "Onled", cuando la encuentra, para este caso encendera una luz*/
	EthernetClient client = server.available();
	if (client) {
		while (client.connected())
		{
			if (client.available())
			{
				char c = client.read();

				if (readString.length() < 40)
				{
//almacena la petici�n HTTP caracter por caracter en un string
					readString += (c);
				}

				if (c == '\n')
				{
// se verifica que el led este encendido
					if (readString.indexOf("Onled") >= 0)
					{
// Encender Led
						digitalWrite(led, HIGH);
					}
// Led apagado
					if (readString.indexOf("Offled") >= 0)
					{
						digitalWrite(led, LOW);
					}
					if (readString.indexOf("Temp") >= 0) // Encender Led
					{
						client.println("HTTP/1.1 200 OK");
						client.println("Content-Type: text/html");
						client.println();
						int h = dht.readHumidity();// Lee la humedad
						int t = dht.readTemperature();//Lee la temperatura
						client.print("Humedad Relativa: ");
						client.print(h);//Escribe la humedad
						client.println(" %");
						client.print("Temperatura: ");
						client.print(t);//Escribe la temperatura
						client.println(" C'");
					}
					if (readString.indexOf("BorrarRegistros") >= 0) {
						borrar();
					}
					if (readString.indexOf("EliminarIngresos") >= 0) {
						EliminarIngresos();
					}
					if (readString.indexOf("VerRegistros") >= 0) {
						opt = 1;
					}

					if (readString.indexOf("Registrar") >= 0)
					{
						readString.replace("GET /:80/?", "");
						readString.replace(" HTTP/1.1", "");
						readString.replace("Registrar", "");
						readString.replace("\n", "");
						String aux = verificar();
						digitalWrite(26, LOW);
						if (aux == "1") {
							lcd.clear();
							lcd.setCursor(0, 0);
							lcd.print("No se puede");
							lcd.setCursor(4, 1);
							lcd.print("registrar");
							delay(3000);
							readString = "";
							mensaje();
						}
						else {
							readString = readString + "--" + aux + "*";
							readString.replace("\n", "");
							readString.replace(" ", "");
							File myFile;
							myFile = SD.open("test.txt", FILE_WRITE);
							if (myFile) {
								myFile.println(readString);
								lcd.clear();
								lcd.setCursor(0, 0);
								lcd.print("Registrando...");
								lcd.setCursor(0, 1);
								lcd.print("Espere por favor");
								myFile.close();
								digitalWrite(27, HIGH);
								delay(500);
								digitalWrite(27, LOW);
								delay(500);
								digitalWrite(27, HIGH);
								delay(500);
								digitalWrite(27, LOW);
								delay(500);
								digitalWrite(27, HIGH);
								delay(500);
								digitalWrite(27, LOW);
								lcd.clear();
								lcd.setCursor(0, 0);
								lcd.print("Usuario Registrado");
								lcd.setCursor(2, 1);
								lcd.print("Correctamente");
								mensaje();
							}
							else {
							}
						}
						readString = "";
					}

					if (opt == 1) {
						client.println("HTTP/1.1 200 OK");
						client.println("Content-Type: text/html");
						client.println();
						char dato;
						File myFile;
						myFile = SD.open("test2.txt");
						if (myFile) {
							while (myFile.available()) {
								dato = char(myFile.read());
								client.print(dato);
							}
							myFile.close();
						}
						else {
						}
					}
					opt = 0;
					readString = "";
					client.stop();
				}
			}
		}
	}
}

/*Este algoritmo lee el identificador de la tarjeta  y hace un llamado a la funcion leer registro, buscando
al usuario en un archivo de texto, si lo encuentra(significa que esta registrado en el sistema), le da el acceso
correspondiente */

int leer_usuario()
{
	if (rfid.isCard()) // si existen datos
	{
		if (rfid.readCardSerial()) // lee el ID
		{
			for (int i = 0; i < 4; i++)
			{
				numero_serie[i] = rfid.serNum[i];
			}
			String myString = String(rfid.serNum[0]) + String(rfid.serNum[1]) + String(rfid.serNum[2]) + String(rfid.serNum[3]);

			String datos;
			datos = LeerRegistros(myString);

			if (datos.indexOf(myString) >= 0) {
				lcd.clear();
        digitalWrite(27, HIGH);
				lcd.setCursor(0, 0);
				lcd.print("Usuario");
				lcd.setCursor(0, 1);
				lcd.print("Registrado");
				delay(1500);
        digitalWrite(27, LOW);
				lcd.clear();
				lcd.setCursor(0, 0);
				lcd.print("Bienvenido");
        digitalWrite(27, HIGH);
				lcd.setCursor(0, 1);
				datos.replace(myString, "");
				datos.replace("\n", "");
				datos.replace("\r", "");
				datos.replace("--", "");
				lcd.print(datos);
				registroHora(datos);
				digitalWrite(32, HIGH);
				delay(1500);
				digitalWrite(32, LOW);
        digitalWrite(27, LOW);
				mensaje();
				rfid.halt();
				return 1;
			}
			else {
				lcd.clear();
        digitalWrite(26, HIGH);
				lcd.setCursor(0, 0);
				lcd.print("Usuario");
				lcd.setCursor(0, 1);
				lcd.print("No registrado");
				delay(1500);
        digitalWrite(26, LOW);
				mensaje();
				rfid.halt();
				return 0;
			}
		}
	}
	rfid.halt(); // cierra el lector
}

/* Esta funcion permite agregar usuarios con el segundo modulo RFID, el administrador del sistema escribe el nombre de la persona
que desea enrolar en el sistema en la aplicaci�n, al hacer esto se enciende una luz roja indicando que se debe pasar la tarjeta por
el modulo , al cabo de unos segundos otro led comenzara a parpadear indicando que el usuario ha sido registrado en el sistema. El sistema
valida si la persona ya existe en el sistema.*/

String leer_usuario2()
{
	if (rfid2.isCard())
	{

		if (rfid2.readCardSerial())
		{
			for (int i = 0; i < 4; i++)
			{
				numero_serie[i] = rfid2.serNum[i];
			}
			String myString = String(rfid2.serNum[0]) + String(rfid2.serNum[1]) + String(rfid2.serNum[2]) + String(rfid2.serNum[3]);

			String datos;
			datos = LeerRegistros(myString);
			if (datos.indexOf(myString) >= 0) {
				rfid2.halt();
				return "1";
			}
			rfid2.halt();
			return myString;
		}
	}
	rfid2.halt();
	return "2";
}
/* Esta funci�n muestra por la pantalla LCD, que el sistema esta preparado para leer una nueva tarjeta */
void mensaje() {
	lcd.clear();
	lcd.setCursor(0, 0);
	lcd.print("Esperando");
	lcd.setCursor(0, 1);
	lcd.print("Tarjeta...");
}

/*Esta funci�n permite borrar a los usuarios del sistema , siempre quedaran dos usuarios
registrados(un llavero y una tarjeta) en caso de que se necesite acceder al sistema*/
void borrar() {
	SD.remove("test.txt");
	delay(50);
	File myFile;
	myFile = SD.open("test.txt", FILE_WRITE);
	if (myFile) {
		myFile.println("llavero--143107270*");
		myFile.println("tarjeta--2351349469*");
		myFile.close();
		lcd.clear();
		lcd.setCursor(0, 0);
		lcd.print("Usuarios");
		lcd.setCursor(4, 1);
		lcd.print("Eliminados");
		delay(2000);
		mensaje();
	}
	else {
	}

}
/*Esta funcion permite leer linea por linea de un fichero, se identifica el fin de linea con un *,
cuando esta funci�n es llamada , compara la primera linea con el registro de la tarjeta, hasta el fin de archivo*/
String LeerRegistros(String tag) {
	File myFile;
	char dato = ' ';
	String Fila = "";
	myFile = SD.open("test.txt");
	if (myFile) {
		while (myFile.available()) {
			dato = char(myFile.read());
			if (dato != '*') {
				Fila = Fila + dato;
			}
			else {
				if (Fila.indexOf(tag) >= 0) {
					myFile.close();
					return Fila;
				}
				else {
					dato = char(myFile.read());
					Fila = "";
				}
			}
		}
		myFile.close();
		return "0";
	}
	else {
		return "0";
	}
}
/*Esta funci�n permite comprobar si el usuario existe o no en el sistema, ademas de colocar el segundo m�dulo RFID en modo
lectura*/
String verificar() {
	int x = 0;
	digitalWrite(26, HIGH); //led que indica que la tarjeta esta esperando datos
	String variable;
	while (x = !0) {
		variable = leer_usuario2();
		if (variable == "1") {
			return "1";
		}
		if (variable != "1" && variable != "2") {
			return variable;
		}
	}
}

/*Esta funci�n permite escribir sobre un fchero nuevo , los ingresos que ha tenido un usuario al sistema, registrando
la fecha en que lo hizo (dia, mes , a�o) y la hora en que lo hizo, a traves de la aplicaci�n se pueden ver los registros*/
void registroHora(String datos) {
	File myFile;
	myFile = SD.open("test2.txt", FILE_WRITE);
	myRTC.updateTime();
	switch (myRTC.dayofweek) {   // Lee el Dia Semana y escribe el dia correspondiente
	case 1:
		myFile.print("Domingo");
		break;
	case 2:
		myFile.print("Lunes");
		break;
	case 3:
		myFile.print("Martes");
		break;
	case 4:
		myFile.print("Miércoles");
		break;
	case 5:
		myFile.print("Jueves");
		break;
	case 6:
		myFile.print("Viernes");
		break;
	case 7:
		myFile.print("Sabado");
		break;
	}
	if (myFile) {
		myFile.print(" ");
		myFile.print(myRTC.dayofmonth);
		myFile.print("/");
		myFile.print(myRTC.month);
		myFile.print("/");
		myFile.print(myRTC.year);
		myFile.print(" ");
		myFile.print(myRTC.hours);
		myFile.print(":");
		myFile.print(myRTC.minutes);
		myFile.print(":");
		myFile.print(myRTC.seconds);
		myFile.print(" ");
		myFile.println(datos);
		myFile.close();
	}
	else {
	}
}

void EliminarIngresos() {
	if (SD.exists("test2.txt")) {
		SD.remove("test2.txt");
		delay(50);
		lcd.clear();
		lcd.setCursor(0, 0);
		lcd.print("Eliminando");
		lcd.setCursor(4, 1);
		lcd.print("Ingresos");
		delay(2000);
		mensaje();
	}
	File myFile;
	myFile = SD.open("test2.txt", FILE_WRITE);
	myFile.close();
}









