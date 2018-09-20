
import processing.serial.Serial;
boolean puertodisponible = true;
long lastTime = 0;
Serial puerto; 
int color1 = 1;
int color2 = 1;
int color3 = 1;
int color4 = 1;
PImage img;
 
void setup() {
  size(800,400);
  img = loadImage("enlace.png");
  String port = findPort();
  if (port != null){   
  puerto = new Serial(this,port, 57600); 
  }else{
  puertodisponible = false;
  lastTime = millis();
  }
}
 
void draw() {
   
if(puertodisponible){
background(255,255,255); // fondo en formato RGB = blanco
 // ------------------------------------------------- //
 fill(0,0,0);         // color del texto
 textSize(30);           // tamaño del texto
 textAlign(CENTER, TOP); // alineación del texto
 text("Control RC",170,25); // texto, posición X,Y
 stroke(90);        // línea bordeada
 strokeWeight(2);   // grosor de la línea bordeada
 // ---------- CUADRO 1 IZQUIERDA ---------- //
 if(color1 == 1){
 fill(255,255,255);      
 rect(40,200,80,60,10);  
 }
 if(color1 == 0){
 fill(119,243,115);           
 rect(40,200,80,60,10);      // 40 120 200 260
 }

 // ---------- CUADRO 2 DERECHA ---------- // 
 if(color2 == 1){
 fill(255,255,255);        
 rect(215,200,80,60,10);  // 215 295 200 260
 }
 if(color2 == 0){
 fill(119,243,115); 
 rect(215,200,80,60,10); 
 }
 // ---------- CUADRO 3 ARRIBA ---------- //
 if(color3 == 1){
 fill(255,255,255);      
 rect(125,120,80,60,10); // 125 205 120 180
 }
 if(color3 == 0){
 fill(119,243,115); 
 rect(125,120,80,60,10);
 }
  // ---------- CUADRO 4 ABAJO ---------- //
 if(color4 == 1){
 fill(255,255,255);      // relleno del cuadro 4 abajo
 rect(125,275,80,60,10);   // 125 205 275 335
 }
 if(color4 == 0){
 fill(119,243,115);
 rect(125,275,80,60,10);
 }
 
 textSize(16);
 fill(0,0,0);
 text("DOWN", 165, 295); 
 fill(0,0,0);  
 text("UP", 165, 140);
 fill(0,0,0);
 text("LEFT", 80, 220); 
 fill(0,0,0);  
 text("RIGHT", 260, 220); 
 
}else{
 background(255,255,255);
 fill(0,0,0);         // color del texto
 textSize(30); 
 textAlign(CENTER, TOP); 
 text("Error de conexion",400,10); // texto, posición X,Y
 text("Verifique el dispositivo",400,40); // texto, posición X,Y
 stroke(90);        // línea bordeada
 strokeWeight(2);   // grosor de la línea bordeada}
 image(img, 200, 80);
 if ( millis() - lastTime > 3000 ) {
   lastTime = millis();
   exit();    
  }
}
}
 
 void mousePressed()
{
 if((mouseX>40 & mouseX<120) & (mouseY>200 & mouseY<260)){ // (mouseX > primero  & mouseX < la suma de primero y el tercero)& (mouseY>segundo & mouseY < la suma del segundo mas el cuarto)
 puerto.write('A');
 println("A"); // 40 120 200 260
 color1= 0;
 }
 
 if((mouseX>215 & mouseX<295) & (mouseY>200 & mouseY<260)){ // (mouseX > primero  & mouseX < la suma de primero y el tercero)& (mouseY>segundo & mouseY < la suma del segundo mas el cuarto)
 puerto.write('B');
 println("B"); //  215 295 200 260
color2 = 0;
 }
 
 if((mouseX>125 & mouseX<205) & (mouseY>120 & mouseY<180)){ // (mouseX > primero  & mouseX < la suma de primero y el tercero)& (mouseY>segundo & mouseY < la suma del segundo mas el cuarto)
 puerto.write('C');
 println("C"); // 125 205 120 180
 color3 = 0;
 }

 if((mouseX>125 & mouseX<205) & (mouseY>275 & mouseY<335)){ // (mouseX > primero  & mouseX < la suma de primero y el tercero)& (mouseY>segundo & mouseY < la suma del segundo mas el cuarto)
 puerto.write('D');
 println("D"); //  125 205 275 335
 color4 = 0;
 }
//
}
 
 void mouseReleased(){
 if((mouseX>40 & mouseX<120) & (mouseY>200 & mouseY<260)){ 
   println("Z"); 
   puerto.write('Z');
   color1 = 1;
 }
 
 if((mouseX>215 & mouseX<295) & (mouseY>200 & mouseY<260)){ // (mouseX > primero  & mouseX < la suma de primero y el tercero)& (mouseY>segundo & mouseY < la suma del segundo mas el cuarto)
  puerto.write('Z');
  println("Z"); //  215 295 200 260
  color2 = 1;
 }
 
 if((mouseX>125 & mouseX<205) & (mouseY>120 & mouseY<180)){ // (mouseX > primero  & mouseX < la suma de primero y el tercero)& (mouseY>segundo & mouseY < la suma del segundo mas el cuarto)
  puerto.write('Z');
  println("Z"); // 125 205 120 180
  color3 = 1;
 }
 
 if((mouseX>125 & mouseX<205) & (mouseY>275 & mouseY<335)){ // (mouseX > primero  & mouseX < la suma de primero y el tercero)& (mouseY>segundo & mouseY < la suma del segundo mas el cuarto)
  puerto.write('Z');
  println("Z"); //  125 205 275 335
  color4 = 1;
 }
 
}
 

static final String findPort() {
  String[] ports = Serial.list();
  println(ports.length);
  for (String p : ports)  
  for (int i = 1; i <= 10; ++i)
    if (p.equals("COM" + i)){
    //if (p.equals("/dev/ttyUSB" + i))  
    return p;
    }
  return null;
}