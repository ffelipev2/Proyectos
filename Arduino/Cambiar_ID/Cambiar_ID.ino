#include <SPI.h>
#include <MFRC522.h>

/* Set your new UID here! */
// 145 66 233 43

//#define NEW_UID {238, 123, 176, 143}
#define NEW_UID {145, 66, 233, 43}
#define SS_PIN 10
#define RST_PIN 9

byte copiaNueva[10];
byte newUid[10];
boolean estadoCopiar = false;
boolean estadoLeer = false;
boolean estadoClonar = false;
boolean estadoCambiar = false;


MFRC522 mfrc522(SS_PIN, RST_PIN);        // Create MFRC522 instance.
MFRC522::MIFARE_Key key;

void setup() {
  Serial.begin(9600);
  while (!Serial);
  SPI.begin();
  mfrc522.PCD_Init();
  Serial.println(F("Precaución, este programa cambiara el ID de tu tarjeta"));
  Serial.println("");

  // Prepare key - all keys are set to FFFFFFFFFFFFh at chip delivery from the factory.
  for (byte i = 0; i < 6; i++) {
    key.keyByte[i] = 0xFF;
  }
  menu();
}


void loop() {
  if (estadoLeer) {
    leer_id();
  }
  if (estadoCopiar) {
    copiar_id_tarjeta();
  }
  if (estadoClonar) {
    clonar_id_tarjeta();
  }
  if (estadoCambiar) {
    //cambiar_id_manual();
  }
  if (Serial.available() > 0) {
    char dato = Serial.read();
    if (dato == '1') {
      estadoLeer = true;
      estadoCopiar = false;
      estadoClonar = false;
      Serial.println("Acerque la tarjeta para leer");
    }
    if (dato == '2') {
      estadoCopiar = true;
      estadoLeer = false;
      estadoClonar = false;
      Serial.println("Acerque la tarjeta que quiere copiar");
    }
    if (dato == '3') {
      Serial.println("Acerque su tarjeta en la cual va a escribir el ID :");
      estadoLeer = false;
      estadoCopiar = false;
      estadoClonar = true;
    }
    if (dato == '4') {
      estadoCambiar = true;
    }
  }
}



void copiar_id_tarjeta() {

  if ( ! mfrc522.PICC_IsNewCardPresent() || ! mfrc522.PICC_ReadCardSerial() ) {
    delay(50);
    return;
  }
  Serial.println("");
  Serial.print(F("Card UID:"));
  for (byte i = 0; i < mfrc522.uid.size; i++) {
    Serial.print(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " ");
    Serial.print(mfrc522.uid.uidByte[i]);
    copiaNueva[i] = mfrc522.uid.uidByte[i];
  }
  memcpy(&newUid, &copiaNueva, sizeof(copiaNueva));
  Serial.println();
  delay(1000);
  Serial.println("ID copiado");
  mfrc522.PICC_HaltA();
  estadoCopiar = false;
}

void clonar_id_tarjeta() {
  if ( ! mfrc522.PICC_IsNewCardPresent() || ! mfrc522.PICC_ReadCardSerial() ) {
    delay(50);
    return;
  }
  if ( mfrc522.MIFARE_SetUid(newUid, (byte)4, true) ) {
    Serial.println(F("Escribiendo en la tarjeta"));
  }

  mfrc522.PICC_HaltA();
  if ( ! mfrc522.PICC_IsNewCardPresent() || ! mfrc522.PICC_ReadCardSerial() ) {
    return;
  }

  Serial.println(F("El nuevo ID es:"));
  for (byte i = 0; i < mfrc522.uid.size; i++) {
    Serial.print(newUid[i] < 0x10 ? " 0" : " ");
    Serial.print(newUid[i]);
  }
  delay(2000);
  estadoClonar = false;
  //Serial.println(F("New UID and contents:"));
  //mfrc522.PICC_DumpToSerial(&(mfrc522.uid));
}

void leer_id() {
  if ( ! mfrc522.PICC_IsNewCardPresent() || ! mfrc522.PICC_ReadCardSerial() ) {
    delay(50);
    return;
  }
  Serial.println("");
  Serial.print(F("Card ID:"));
  for (byte i = 0; i < mfrc522.uid.size; i++) {
    Serial.print(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " ");
    Serial.print(mfrc522.uid.uidByte[i]);
    copiaNueva[i] = mfrc522.uid.uidByte[i];
  }
  Serial.println();
  mfrc522.PICC_HaltA();
  delay(1000);
}



void menu() {
  Serial.println(" MENU CLONAR ID");
  Serial.println("==============");
  Serial.println("1- Leer ID ");
  Serial.println("2- Capturar ID ");
  Serial.println("3- Clonar ID");
  Serial.println("4- Cambiar manual ID");

}

