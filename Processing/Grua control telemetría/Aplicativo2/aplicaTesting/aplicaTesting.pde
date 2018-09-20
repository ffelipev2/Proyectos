
import processing.serial.Serial;
Serial puerto;
boolean puertodisponible = true;
long lastTime = 0;

//*** variables para hacer los cambios de colores****
int color1 = 1;
int color2 = 1;
int color3 = 1;
int color4 = 1;
int color5 = 1;
int color6 = 1;
int color7 = 1;
int color8 = 1;
int color9 = 1;
int color10 = 1;

int color11 = 1;
int color12 = 1;
int color13 = 1;

// fotitos
PImage img;
PImage bg1;
PImage bg2;
PImage bg3;

PImage flechaizquierda;
PImage flechaderecha;
PImage flechaarriba;
PImage flechaabajo;
PImage flechahorario;
PImage flechaantihorario;
PImage botonrojo;
PImage botonverde;
PImage off;
PImage sus;
// ventanas
boolean windowClose = true;
boolean windowMain = false;
//
int val1 = 1;
int val2 = 1;
int val3 = 1;

void setup() {
  size(1024, 620);
  img = loadImage("imagenes/enlace.png");
  String port = findPort();
  if (port != null) {
    puerto = new Serial(this, port, 57600);
    bg1 = loadImage("imagenes/fondo.jpg");
    bg2 = loadImage("imagenes/fondo3.jpg");
    bg3 = loadImage("imagenes/fondo5.jpg");
    
  } else {
    puertodisponible = false;
    windowMain = true;
    lastTime = millis();
  }
}

void draw() {

  if (puertodisponible && windowClose && windowMain) {
    background(bg1);
// ---------- CUADRO 1 IZQUIERDA BOTON LEFT---------- //
    if (color1 == 1) {
      fill(188, 187, 187);
      rect(40, 260, 80, 60, 10);
      flechaizquierda = loadImage("imagenes/flechaizquierda.png");
      image(flechaizquierda, 50, 265);
    }
    if (color1 == 0) {
      fill(119, 243, 115);
      rect(40, 260, 80, 60, 10);
      flechaizquierda = loadImage("imagenes/flechaizquierda.png");
      image(flechaizquierda, 50, 265);
      // 40 120 260 320
    }
// ---------- CUADRO 2 DERECHA BOTON RIGHT ---------- //
    if (color2 == 1) {
      fill(188, 187, 187);
      rect(215, 260, 80, 60, 10); // 215 295 260 320
      flechaderecha = loadImage("imagenes/flechaderecha.png");
      image(flechaderecha, 235, 265);
    } else {
      fill(119, 243, 115);
      rect(215, 260, 80, 60, 10);
      flechaderecha = loadImage("imagenes/flechaderecha.png");
      image(flechaderecha, 235, 265);
    }
// ---------- CUADRO 3 ARRIBA BOTON UP---------- //
    if (color3 == 1) {
      fill(188, 187, 187);
      rect(125, 180, 80, 60, 10); // 125 205 180 240
      flechaarriba = loadImage("imagenes/flechaarriba.png");
      image(flechaarriba, 140, 185);
    } else {
      fill(119, 243, 115);
      rect(125, 180, 80, 60, 10);
      flechaarriba = loadImage("imagenes/flechaarriba.png");
      image(flechaarriba, 140, 185);
    }
    // ---------- CUADRO 4 ABAJO BOTON DOWN ---------- //
    if (color4 == 1) {
      fill(188, 187, 187);    // relleno del cuadro 4 abajo
      rect(125, 335, 80, 60, 10); // 125 205 335 395
      flechaabajo = loadImage("imagenes/flechaabajo.png");
      image(flechaabajo, 140, 340);
    } else {
      fill(119, 243, 115);
      rect(125, 335, 80, 60, 10);
      flechaabajo = loadImage("imagenes/flechaabajo.png");
      image(flechaabajo, 140, 340);
    }
    // ---------- CUADRO 5 EXTREMO DERECHO  <- 1 ---------- //
    if (color5 == 1) {
      fill(188, 187, 187);
      rect(700, 180, 80, 60, 10); // 700 , 780 , 180 ,240 // 5
      flechaantihorario = loadImage("imagenes/flechaantihorario.png");
      image(flechaantihorario, 720, 185);
    } else {
      fill(119, 243, 115);
      rect(700, 180, 80, 60, 10);
      flechaantihorario = loadImage("imagenes/flechaantihorario.png");
      image(flechaantihorario, 720, 185);
    }
// ---------- CUADRO 6 EXTREMO EXTREMO DERECHO -> 1 ---------- //
    if (color6 == 1) {
      fill(188, 187, 187);
      rect(800, 180, 80, 60, 10); // 800 880 180 240 //6
      flechahorario = loadImage("imagenes/flechahorario.png");
      image(flechahorario, 820, 185);
    } else {
      fill(119, 243, 115);
      rect(800, 180, 80, 60, 10);
      flechahorario = loadImage("imagenes/flechahorario.png");
      image(flechahorario, 820, 185);
    }

// ---------- CUADRO 7 EXTREMO DERECHO  OPEN ---------- //
    if (color7 == 1) {
      fill(188, 187, 187);
      rect(700, 330, 80, 60, 10); // 700 780 330 390 // 7
      botonverde = loadImage("imagenes/botonverde.png");
      image(botonverde, 720, 335);

    } else {
      fill(119, 243, 115);
      rect(700, 330, 80, 60, 10);
      botonverde = loadImage("imagenes/botonverde.png");
      image(botonverde, 720, 335);
    }
// ---------- CUADRO 8 EXTREMO EXTREMO DERECHO CLOSE ---------- //
    if (color8 == 1) {
      fill(188, 187, 187);
      rect(800, 330, 80, 60, 10); // 800 880 330 390
      botonrojo = loadImage("imagenes/botonrojo.png");
      image(botonrojo, 820, 335);
    } else {
      fill(119, 243, 115);
      rect(800, 330, 80, 60, 10);
      botonrojo = loadImage("imagenes/botonrojo.png");
      image(botonrojo, 820, 335);
    }

// ---------- CUADRO 9 ARRIBA(UP) SEGUNDO UP   ---------- //
    if (color9 == 1) {
      fill(188, 187, 187);
      rect(450, 180, 80, 60, 10);  // 450 530 180 240
      flechaarriba = loadImage("imagenes/flechaarriba.png");
      image(flechaarriba, 465, 185);
    } else {
      fill(119, 243, 115);
      rect(450, 180, 80, 60, 10);
      flechaarriba = loadImage("imagenes/flechaarriba.png");
      image(flechaarriba, 465, 185);
    }
// ---------- CUADRO 10 ABAJO (DOWN) SEGUNDO DOWN ---------- //
    if (color10 == 1) {
      fill(188, 187, 187);
      rect(450, 330, 80, 60, 10);  // 450 530 330 390
      flechaabajo = loadImage("imagenes/flechaabajo.png");
      image(flechaabajo, 465, 335);
    } else {
      fill(119, 243, 115);
      rect(450, 330, 80, 60, 10);
      flechaabajo = loadImage("imagenes/flechaabajo.png");
      image(flechaabajo, 465, 335);
    }

    textSize(16);
    fill(0, 0, 0);
    text("Giro de las pinzas", 720, 160);
    fill(0, 0, 0);
    text("Apertura y Cierre de pinzas", 690, 310);
    fill(0, 0, 0);
    text("Subir o bajar pinzas", 420, 160);
    fill(0, 0, 0);
    text("Carro", 145, 160);
    fill(0, 0, 0);
    text("Rodadura", 240, 245);
    //********************************BOTÓN OFF *******************************************//
    //fill(255, 255, 255);
    //rect(400, 517, 63, 63, 10); // 400 463 517 580 // boton off
    off = loadImage("imagenes/off2.png");
    image(off, 380, 500);
    //********************************BOTÓN SUSPENDER *******************************************//
    //fill(255, 255, 255);
    //rect(520, 517, 63, 63, 10); // 520 583 517 580 //
    sus = loadImage("imagenes/sus.png");
    image(sus, 500, 500);

  }

  if (!puertodisponible) {
    background(255, 255, 255);
    fill(0, 0, 0);       // color del texto
    textSize(40);
    textAlign(CENTER, TOP);
    text("Error de conexion", 500, 10); // texto, posición X,Y
    text("", 500, 30);
    text("Verifique el dispositivo", 500, 50); // texto, posición X,Y
    stroke(90);        // línea bordeada
    strokeWeight(2);   // grosor de la línea bordeada}
    image(img, 300, 150);
    if ( millis() - lastTime > 3000 ) {
      lastTime = millis();
      exit();
    }
  }
  if (!windowClose) {
    background(bg2);
    //fill(188, 187, 187);
    //rect(350, 300, 130, 130, 10); // 350 , 480 , 300 ,430 //
    flechahorario = loadImage("imagenes/aceptar.png");
    image(flechahorario, 345, 290);
    //fill(188, 187, 187);
    //rect(550, 300, 130, 130, 10); // 550 680 300 430 //
    flechahorario = loadImage("imagenes/cancelar.png");
    image(flechahorario, 545, 290);
  }
  // **************************** PRIMERA PANTALLA , 3 BOTONES *****************************************
  if (!windowMain) {
    background(bg3);
    //CUADRADO 1
    if (color11 == 1) {
      //fill(188, 187, 187);
      //rect(215, 245, 90, 90, 10); //  215 305 245 335
      flechaarriba = loadImage("imagenes/off.png");
      image(flechaarriba, 210, 240);
    }
    if (color11 == 0) {
      //fill(119, 243, 115);
      //rect(215, 245, 90, 90, 10); // 215 305 245 335
      flechaarriba = loadImage("imagenes/on.png");
      image(flechaarriba, 210, 240);
      val1 = 0;
    }
    //CUADRADO 2
    if (color12 == 1) {
      //fill(188, 187, 187);
      //rect(455, 245, 90, 90, 10); // 455 545 245 335  // 705 795 245 335
      flechaarriba = loadImage("imagenes/off.png");
      image(flechaarriba, 450, 240);
    }
    if (color12 == 0) {
      //fill(119, 243, 115);
      //rect(455, 245, 90, 90, 10); // 455 545 245 335
      flechaarriba = loadImage("imagenes/on.png");
      image(flechaarriba, 450, 240);
      val2 = 0;
    }
    //CUADRADO 3
    if (color13 == 1) {
      //fill(188, 187, 187);
      //rect(705, 245, 90, 90, 10); // 705 795 245 335
      flechaarriba = loadImage("imagenes/off.png");
      image(flechaarriba, 700, 240);
    }
    if (color13 == 0) {
      //fill(119, 243, 115);
      //rect(705, 245, 90, 90, 10); // 705 795 245 335
      flechaarriba = loadImage("imagenes/on.png");
      image(flechaarriba, 700, 240);
      val3 = 0;
    }
    if (val1 == 0 && val2 == 0 && val3 == 0) {
      windowMain = true;
    }
  }
}

void mousePressed()
{
  if (windowClose && windowMain) {
    // IZQUIERDO , DERECHO , ARRIBA , ABAJO , ON 1 , OFF 1 , ON 2, OFF 2, UP 2 , DOWN 2
    // 1 IZQUIERDO
    if ((mouseX > 40 & mouseX < 120) & (mouseY > 260 & mouseY < 320)) { // (mouseX > primero  & mouseX < la suma de primero y el tercero)& (mouseY>segundo & mouseY < la suma del segundo mas el cuarto)
      puerto.write('F');
      println("F"); // 40 120 260 320 1
      color1 = 0;
    }
// 2 DERECHO
    if ((mouseX > 215 & mouseX < 295) & (mouseY > 260 & mouseY < 320)) { // (mouseX > primero  & mouseX < la suma de primero y el tercero)& (mouseY>segundo & mouseY < la suma del segundo mas el cuarto)
      puerto.write('G');
      println("G"); //  215 295 260 320 2
      color2 = 0;
    }
//3 ARRIBA
    if ((mouseX > 125 & mouseX < 205) & (mouseY > 180 & mouseY < 240)) { // (mouseX > primero  & mouseX < la suma de primero y el tercero)& (mouseY>segundo & mouseY < la suma del segundo mas el cuarto)
      puerto.write('A');
      println("A"); // 125 205 180 240 3
      color3 = 0;
    }
//4 ABAJO
    if ((mouseX > 125 & mouseX < 205) & (mouseY > 335 & mouseY < 395)) { // (mouseX > primero  & mouseX < la suma de primero y el tercero)& (mouseY>segundo & mouseY < la suma del segundo mas el cuarto)
      puerto.write('B');
      println("B"); //  125 205 335 395 // 4
      color4 = 0;
    }
    //5 GIRO IZQUIERDA
    if ((mouseX > 700 & mouseX < 780) & (mouseY > 180 & mouseY < 240)) { // (mouseX > primero  & mouseX < la suma de primero y el tercero)& (mouseY>segundo & mouseY < la suma del segundo mas el cuarto)


      puerto.write('I');
      println("I"); // 800 880 180 240 //6

      color5 = 0;
    }
    //6 GIRO DERECHA
    if ((mouseX > 800 & mouseX < 880) & (mouseY > 180 & mouseY < 240)) { // (mouseX > primero  & mouseX < la suma de primero y el tercero)& (mouseY>segundo & mouseY < la suma del segundo mas el cuarto)
      puerto.write('H');
      println("H"); // 700 , 780 , 180 ,240 // 5
      color6 = 0;
    }
    //7 ABRIR PINZAS
    if ((mouseX > 700 & mouseX < 780) & (mouseY > 330 & mouseY < 390)) { // (mouseX > primero  & mouseX < la suma de primero y el tercero)& (mouseY>segundo & mouseY < la suma del segundo mas el cuarto)
      puerto.write('J');
      println("J"); // 700 780 330 390 // 7
      color7 = 0;
    }
    //8 CERRAR PINZAS
    if ((mouseX > 800 & mouseX < 880) & (mouseY > 330 & mouseY < 390)) { // (mouseX > primero  & mouseX < la suma de primero y el tercero)& (mouseY>segundo & mouseY < la suma del segundo mas el cuarto)
      puerto.write('K');
      println("K"); // 800 880 330 390
      color8 = 0;
    }
    //9 SUBIR PINZAS
    if ((mouseX > 450 & mouseX < 530) & (mouseY > 180 & mouseY < 240)) { // (mouseX > primero  & mouseX < la suma de primero y el tercero)& (mouseY>segundo & mouseY < la suma del segundo mas el cuarto)
      puerto.write('D');
      println("D"); // 450 530 180 240 // 9
      color9 = 0;
    }
    //10 BAJAR PINZAS
    if ((mouseX > 450 & mouseX < 530) & (mouseY > 330 & mouseY < 390)) { // (mouseX > primero  & mouseX < la suma de primero y el tercero)& (mouseY>segundo & mouseY < la suma del segundo mas el cuarto)
      puerto.write('E');
      println("E"); // 450 530 330 390 // 10
      color10 = 0;
    }

    if ((mouseX > 400 & mouseX < 463) & (mouseY > 517 & mouseY < 580)) { // (mouseX > primero  & mouseX < la suma de primero y el tercero)& (mouseY>segundo & mouseY < la suma del segundo mas el cuarto)
      windowClose = false;
      //exit(); //  400 463 517 580
      /*try {
        Process child = Runtime.getRuntime().exec("shutdown -h now");
      }
      catch (IOException e) { // BOTON APAGAR  // 400 463 517 580
        e.printStackTrace();
      }
      */
    }
    if ((mouseX > 520 & mouseX < 583) & (mouseY > 517 & mouseY < 580)) { // (mouseX > primero  & mouseX < la suma de primero y el tercero)& (mouseY>segundo & mouseY < la suma del segundo mas el cuarto)
      windowMain = false;
      val3 = 1;
      val2 = 1;
      val1 = 1;
      color11 = 1;
      color12 = 1;
      color13 = 1;

    }

  }


  if (!windowClose) {
    if ((mouseX > 350 & mouseX < 480) & (mouseY > 300 & mouseY < 480)) { // (mouseX > primero  & mouseX < la suma de primero y el tercero)& (mouseY>segundo & mouseY < la suma del segundo mas el cuarto)
      exit();
    }

    if ((mouseX > 550 & mouseX < 680) & (mouseY > 300 & mouseY < 430)) { // (mouseX > primero  & mouseX < la suma de primero y el tercero)& (mouseY>segundo & mouseY < la suma del segundo mas el cuarto)
      windowClose = true;
    }
  }

  if (!windowMain) {
    if ((mouseX > 215 & mouseX < 305) & (mouseY > 245 & mouseY < 335)) { // (mouseX > primero  & mouseX < la suma de primero y el tercero)& (mouseY>segundo & mouseY < la suma del segundo mas el cuarto)
      color11 = 0; //215 305 245 335
    }

    if ((mouseX > 455 & mouseX < 545) & (mouseY > 245 & mouseY < 335)) { // (mouseX > primero  & mouseX < la suma de primero y el tercero)& (mouseY>segundo & mouseY < la suma del segundo mas el cuarto)
      color12 = 0; // 455 545 245 335
    }

    if ((mouseX > 705 & mouseX < 795) & (mouseY > 245 & mouseY < 335)) { // (mouseX > primero  & mouseX < la suma de primero y el tercero)& (mouseY>segundo & mouseY < la suma del segundo mas el cuarto)
      color13 = 0;  // 705 795 245 335
    }
  }
}

void mouseReleased() {
  //1
  if (windowClose && windowMain) {
    if ((mouseX > 40 & mouseX < 120) & (mouseY > 260 & mouseY < 320)) {
      println("C");
      puerto.write('C'); // 40 120 260 320
      color1 = 1;
    }
    //2
    if ((mouseX > 215 & mouseX < 295) & (mouseY > 260 & mouseY < 320)) { // (mouseX > primero  & mouseX < la suma de primero y el tercero)& (mouseY>segundo & mouseY < la suma del segundo mas el cuarto)
      puerto.write('C');
      println("C"); //  215 295 260 320
      color2 = 1;
    }
// 3
    if ((mouseX > 125 & mouseX < 205) & (mouseY > 180 & mouseY < 240)) { // (mouseX > primero  & mouseX < la suma de primero y el tercero)& (mouseY>segundo & mouseY < la suma del segundo mas el cuarto)
      puerto.write('C');
      println("C"); // 125 205 180 240 3
      color3 = 1;
    }
// 4
    if ((mouseX > 125 & mouseX < 205) & (mouseY > 335 & mouseY < 395)) { // (mouseX > primero  & mouseX < la suma de primero y el tercero)& (mouseY>segundo & mouseY < la suma del segundo mas el cuarto)
      puerto.write('C');
      println("C"); //  125 205 335 395 // 4
      color4 = 1;
    }
    // 5
    if ((mouseX > 700 & mouseX < 780) & (mouseY > 180 & mouseY < 240)) { // (mouseX > primero  & mouseX < la suma de primero y el tercero)& (mouseY>segundo & mouseY < la suma del segundo mas el cuarto)
      puerto.write('C');
      println("C"); // 800 880 180 240 //6
      color5 = 1;

    }
    // 6
    if ((mouseX > 800 & mouseX < 880) & (mouseY > 180 & mouseY < 240)) { // (mouseX > primero  & mouseX < la suma de primero y el tercero)& (mouseY>segundo & mouseY < la suma del segundo mas el cuarto)
      puerto.write('C');
      println("C"); // 700 , 780 , 180 ,240 // 5
      color6 = 1;
    }
    //7
    if ((mouseX > 700 & mouseX < 780) & (mouseY > 330 & mouseY < 390)) { // (mouseX > primero  & mouseX < la suma de primero y el tercero)& (mouseY>segundo & mouseY < la suma del segundo mas el cuarto)
      puerto.write('C');
      println("C"); // 700 780 330 390 // 7
      color7 = 1;
    }
    //8
    if ((mouseX > 800 & mouseX < 880) & (mouseY > 330 & mouseY < 390)) { // (mouseX > primero  & mouseX < la suma de primero y el tercero)& (mouseY>segundo & mouseY < la suma del segundo mas el cuarto)
      puerto.write('Z');
      //println("Z"); // 800 880 330 390
      color8 = 1;
    }
    //9
    if ((mouseX > 450 & mouseX < 530) & (mouseY > 180 & mouseY < 240)) { // (mouseX > primero  & mouseX < la suma de primero y el tercero)& (mouseY>segundo & mouseY < la suma del segundo mas el cuarto)
      puerto.write('C');
      println("C");  // 450 530 180 240 // 9
      color9 = 1;
    }
    //10
    if ((mouseX > 450 & mouseX < 530) & (mouseY > 330 & mouseY < 390)) { // (mouseX > primero  & mouseX < la suma de primero y el tercero)& (mouseY>segundo & mouseY < la suma del segundo mas el cuarto)
      puerto.write('C');
      println("C");  // 450 530 330 390 // 10
      color10 = 1;
    }
  }
}

void keyPressed() {
  if (windowClose) {
    if (key == 'w' || key == 'W') {
      puerto.write('A');
      println("A");
      color3 = 0;
    }
    if (key == 'a' || key == 'A') {
      puerto.write('F');
      println("F");
      color1 = 0;
    }
    if (key == 'd' || key == 'D') {
      puerto.write('G');
      println("G");
      color2 = 0;
    }

    if (key == 's' || key == 'S') {
      puerto.write('B');
      println("B");
      color4 = 0;
    }
    if (key == 'u' || key == 'U') {
      puerto.write('D');
      println("D");
      color9 = 0;
    }
    if (key == 'j' || key == 'J') {
      puerto.write('E');
      println("E");
      color10 = 0;
    }
    if (key == 'i' || key == 'I') {

      puerto.write('I');
      println("I");
      color5 = 0;

    }
    if (key == 'o' || key == 'O') {
      puerto.write('H');
      println("H");
      color6 = 0;
    }
    if (key == 'k' || key == 'K') {
      puerto.write('J');
      println("J");
      color7 = 0;
    }
    if (key == 'l' || key == 'L') {
      puerto.write('K');
      println("K");
      color8 = 0;
    }
  }
}

void keyReleased() {
  if (windowClose) {
    if (key == 'w' || key == 'W') {
      puerto.write('C');
      println("C"); // 125 205 180 240 3
      color3 = 1;
    }
    if (key == 'a' || key == 'A') {
      puerto.write('C');
      println("C"); // 40 120 260 320 1
      color1 = 1;
    }
    if (key == 's' || key == 'S') {
      puerto.write('C');
      println("C"); //  125 205 335 395 // 4
      color4 = 1;
    }
    if (key == 'd' || key == 'D') {
      puerto.write('C');
      println("C"); // 125 205 180 240 3
      color2 = 1;
    }
    if (key == 'u' || key == 'U') {
      puerto.write('C');
      println("C"); // 450 530 180 240 // 9
      color9 = 1;
    }
    if (key == 'j' || key == 'J') {
      puerto.write('C');
      println("C"); // 450 530 330 390 // 10
      color10 = 1;
    }
    if (key == 'o' || key == 'O') {
      puerto.write('C');
      println("C");
      color6 = 1;
    }
    if (key == 'i' || key == 'I') {
      puerto.write('C');
      println("C");
      color5 = 1;
    }

    if (key == 'k' || key == 'K') {
      puerto.write('C');
      println("C");
      color7 = 1;
    }
    if (key == 'l' || key == 'L') {
      puerto.write('C');
      println("C");
      color8 = 1;
    }
  }
}



// recorre los puertos COM disponibles y retorna el puerto en donde esta conectado un dispositivo COM.
static final String findPort() {
  String[] ports = Serial.list();
  println(ports.length);
  for (String p : ports)
    for (int i = 0; i <= 100; ++i)
      if (p.equals("COM" + i)) {
        //if (p.equals("/dev/ttyUSB" + i)){
        return p;
      }
  return null;
}