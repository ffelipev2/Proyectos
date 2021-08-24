<!doctype html>
<html class="" lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>1°-4° Básico | Hábitos de Estudio</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <link href="../images/apple-touch-icon.png" type="images/x-icon" rel="shortcut icon">
    <!-- All css files are included here. -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> -->
    <link href="../../css/estrellas.css" rel="stylesheet" type="text/css"/>
    <link href="../../css/miestiloNavbar.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/core.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/responsive.css">
    <link rel="stylesheet" href="../../css/estilos.css">
    <!-- customizer style css -->
    <link href="#" data-style="styles" rel="stylesheet">
    <!-- Modernizr JS -->
    <script src="../../js/vendor/modernizr-2.8.3.min.js"></script>
    <style>
            .bs-example{
                margin: 20px;
            }
            .accordion .fa{
                margin-right: 0.5rem;
            }
            .accordion .card-header:after {
                font-family: 'FontAwesome';  
                content: "\f068";
                float: right; 
            }
            .accordion .card-header.collapsed:after {
                /* symbol for "collapsed" panels */
                content: "\f067"; 
            }
        </style>
</head>

<body>   
<!-- Star Google analytics-->  
<?php include_once("../../resources/google_analytics.php") ?>
<!-- end Google analytics-->
  
    <div class="wrapper white-bg">
        <!--header section start-->
        <?php
        include '../../menu/menu_principal_paginas.php'; //Se carga un codigo que contiene el menu de todas las sub-paginas del sitio
        ?>
        <!-- Star button titulo-->
        <div class="row text-center">
            <div class="col-12">
                <button class="btn btn-modulos btn-lg mx-auto btn-">1°-4° Básico</button>
            </div>
        </div>
        <!-- End button titulo-->
        <!--header section end-->
        <!--Breadcrumbs start-->
       <!--  <div class="text-center">
            <div class="contenedor">
            <img src="../../images/header_pages/actividad_fisica_final.jpg"/>
            <div class="centrado breadcrumbs-title"><h2>4° Básico </h2></div>
            </div>
        </div> -->
        <!--Breadcrumbs end-->
        
        <!--elements start-->
        <!--apartado 1-->
        <div class="container border p-0">
            <div class="card-header collapsed border border-light" data-toggle="collapse" data-parent="#accordion" href="#collapseCuatro"  style ="background-color: #6bc513;">
                <a class="card-title"><img src="../../images/icono_lecciones/icono1_leccion1.png" class="img-fluid" width="70px" alt="70px"> Módulo Educativo: Hábitos de Estudio</a> <!--cambiar en caso de ser necesario-->
            </div>
        </div>



        <div class="container border p-0">
            <div style="width: 100%;">
                <div style="position: relative; padding-bottom: 56.25%; padding-top: 0; height: 0;">
                    <iframe frameborder="0" width="1200px" height="675px" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" src="https://view.genial.ly/60b5386de8b47d0d7f0e9934" type="text/html" allowscriptaccess="always" allowfullscreen="true" scrolling="yes" allownetworking="all">
                    </iframe> 
                </div> 
            </div>
        </div>
        <!--end apartado 1-->


        <div class="container border p-0">
            <div id="accordion" class="accordion">
                <div class="card mb-0">

                    <!-- <div class="card-header collapsed border border-light" data-toggle="collapse"  href="#collapseSimucolor"  style ="background-color: #DCDE4B;">
                        <a class="card-title"><img src="../images/icono_lecciones/icono3_preguntas.png" class="img-fluid" width="70px" alt="70px"> Simulación colores </a>
                    </div> -->

                    <!--apartado 2 (simulador)-->
                    <!-- <div id="collapseSimucolor" class="collapse">
                        <div class="card-body">
                            <p> Juega con las luz, explora... !Mira lo que sucede!</br>
                                Podrás escoger linterna simple o linterna RGB(Rojo, Verde, Azul).                      
                                En el simulador podrás ver como percibimos los colores y sus diversas combinaciones.
                                Determina qué color ve la persona para diversas combinaciones de rojo, verde y azul.
                                Describe el color de la luz que es capaz de pasar a través de filtros de diferentes colores.</p>
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe src="https://phet.colorado.edu/sims/html/color-vision/latest/color-vision_es.html"></iframe>
                            </div>
                        </div>
                    </div> -->
                    <!--end apartado 2 (simulador)-->

                    <!--apartado 3 (juego)-->
                    <div  class="card-header collapsed border border-light " data-toggle="collapse" data-parent="#accordion" href="#collapseUno"  style =" background-color: #6bc513; ">
                        <a class="card-title"><img src="../../images/icono_lecciones/icono2_simulacion.png" class="img-fluid" width="70px" alt="70px">  Aprende jugando </a>
                    </div>
                    <div id="collapseUno" class="collapse" data-parent="#accordion">
                        <div class="embed-responsive embed-responsive-16by9">
                        <iframe frameborder="0" width="1200px" height="675px" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" src="https://view.genial.ly/60b2a3e2fafa9d0d8314aa52" type="text/html" allowscriptaccess="always" allowfullscreen="true" scrolling="yes" allownetworking="all"></iframe>
                        </div> 
                    </div>
                    <!--end apartado 3 (juego)-->


                    <!--apartado preguntas--> 
                    <div class="card-header collapsed border border-light " data-toggle="collapse" data-parent="#accordion" href="#collapseTres"  style ="background-color: #6bc513;">
                        <a class="card-title"><img src="../../images/icono_lecciones/icono3_preguntas.png" class="img-fluid" width="70px" alt="70px">  ¡Responde! &nbsp;</a>
                    </div>
                    <div id="collapseTres" class="collapse" data-parent="#accordion">
                        <div class="card-body"> 
                            <form role="form" action="" method="post">
                            <div class="card">
                                <div class="card-body">
                                    <h5>1. ¿A qué distancia se debe encontrar la pantalla del computador de tu rostro?</h5>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pregunta1" id="exampleRadios1" value="A" required>
                                        <label class="form-check-label" for="exampleRadios1">
                                            a) A 1 brazo de distancia 
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pregunta1" id="exampleRadios2" value="B">
                                        <label class="form-check-label" for="exampleRadios2">
                                            b) A medio brazo de distancia
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="pregunta1" id="exampleRadios3" value="C">
                                        <label class="form-check-label" for="exampleRadios3">
                                            c) A 1 mano de distancia
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pregunta1" id="exampleRadios3" value="D">
                                        <label class="form-check-label" for="exampleRadios3">
                                            d) A 2 brazos de distancia
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5>2. ¿Cuánto tiempo deberías tomar de descanso para jugar, distraerte y moverte?</h5>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pregunta2" id="exampleRadios1" value="A" required>
                                        <label class="form-check-label" for="exampleRadios1">
                                            a) 1 hora
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pregunta2" id="exampleRadios2" value="B">
                                        <label class="form-check-label" for="exampleRadios2">
                                            b) 5 minutos
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="pregunta2" id="exampleRadios3" value="C">
                                        <label class="form-check-label" for="exampleRadios3">
                                            c) 30 minutos 
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pregunta2" id="exampleRadios3" value="D">
                                        <label class="form-check-label" for="exampleRadios3">
                                            d) 2 horas
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5>3. ¿Qué acción demuestra tener un buen hábito de estudio?</h5>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pregunta3" id="exampleRadios1" value="A" required>
                                        <label class="form-check-label" for="exampleRadios1">
                                            a) Estudiar sobre la cama
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pregunta3" id="exampleRadios2" value="B">
                                        <label class="form-check-label" for="exampleRadios2">
                                            b) Descansar cada 30 minutos
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="pregunta3" id="exampleRadios3" value="C">
                                        <label class="form-check-label" for="exampleRadios3">
                                            c) Hacer todas las tareas al mismo tiempo cuando se acumulan
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pregunta3" id="exampleRadios3" value="D">
                                        <label class="form-check-label" for="exampleRadios3">
                                            d) Estudiar con hambre
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5>4. ¿Qué acción cuidará la salud de tu cuerpo físico mientras estudias? </h5>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pregunta4" id="exampleRadios1" value="A" required>
                                        <label class="form-check-label" for="exampleRadios1">
                                            a) Tener la espalda derecha pero no apoyada en la silla
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pregunta4" id="exampleRadios2" value="B">
                                        <label class="form-check-label" for="exampleRadios2">
                                            b) Tener ambos pies bien apoyados en el piso o en una cajita
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="pregunta4" id="exampleRadios3" value="C">
                                        <label class="form-check-label" for="exampleRadios3">
                                            c) Tener los brazos colgando
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pregunta4" id="exampleRadios3" value="D">
                                        <label class="form-check-label" for="exampleRadios3">
                                            d) Tener las piernas cruzadas  
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5>5.- Califica los materiales didácticos</h5>
                                   </br>
                                    <div class="rating">
                                        <input type="radio" id="star5" name="pregunta5" value="5"  required /><label for="star5" title="Genial" value="5">5 estrellas</label>
                                        <input type="radio" id="star4" name="pregunta5" value="4" /><label for="star4" title="Bien" value="4">4 estrellas</label>
                                        <input type="radio" id="star3" name="pregunta5" value="3" /><label for="star3" title="Mas o menos" value="3">3 estrellas</label>
                                        <input type="radio" id="star2" name="pregunta5" value="2" /><label for="star2" title="Mal" value="2">2 estrellas</label>
                                        <input type="radio" id="star1" name="pregunta5" value="1" /><label for="star1" title="Pésimo" value="1">1 estrellas</label>
                                    </div>
                                </div>
                            </div>

                                </br></br></br>
                                <div class="form-group">
                                    <div class="card" style ="background-color: #6bc513;">
                                        <div align="center" class="card-body">
                                            <h5>Completa con tus datos &nbsp;</h5>
                                        </div>
                                    </div>
                                </div>
                                </br>
                                <div class="form-group">
                                    <label for="nombre">Nombres</label>
                                    <input type="text" class="form-control" id="nombre" name ="nombre" placeholder="Ingresa tu nombre" required>
                                </div>
                                <div class="form-group">
                                    <label for="apellido">Apellido Paterno</label>
                                    <input type="text" class="form-control" id="apellido" name= "apellidoPaterno" placeholder="Ingresa tu apellido Paterno" required>
                                </div>
                                <div class="form-group">
                                    <label for="apellido">Apellido Materno</label>
                                    <input type="text" class="form-control" id="apellido" name= "apellidoMaterno" placeholder="Ingresa tu apellido Materno" required>
                                </div>

                                <div class="form-group">
                                    <label for="sel1">Género</label>
                                    <select class="form-control" id="sel1" name="genero" required="">
                                        <option value="">Selecciona</option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sel1">Nacionalidad</label>
                                    <select class="form-control" id="sel1" name="nacionalidad" required="">
                                        <option value="">Selecciona</option>
                                        <option value="Chilena">Chilena</option>
                                        <option value="Haitiana">Haitiana</option>
                                        <option value="Dominicana">Dominicana</option>
                                        <option value="Colombiana">Colombiana</option>
                                        <option value="Venezolana">Venezolana</option>
                                        <option value="Peruana">Peruana</option>
                                        <option value="Boliviana">Boliviana</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Ecuatoriana">Ecuatoriana</option>
                                        <option value="Brasilena">Brasileña</option>
                                        <option value="Otra">Otra</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sel1">Selecciona tu Colegio</label>
                                    <select class="form-control" id="sel1" name="colegio" required="">
                                        <option value="">Selecciona</option>
                                        <option value="LICEO DARIO SALAS">LICEO DARIO SALAS</option>
                                        <option value="REPUBLICA DE BRASIL">REPUBLICA DE BRASIL</option>
                                        <option value="CADETE ARTURO PRAT CHACON">CADETE ARTURO PRAT CHACON</option>
                                        <option value="REPUBLICA DEL URUGUAY">REPUBLICA DEL URUGUAY</option>
                                        <option value="IRENE FREI DE CID">IRENE FREI DE CID</option>
                                        <option value="LIBERTADORES DE CHILE">LIBERTADORES DE CHILE</option>
                                        <option value="LICEO MIGUEL DE CERVANTES ANEXO">LICEO MIGUEL DE CERVANTES ANEXO</option>
                                        <option value="REPUBLICA DEL LIBANO">REPUBLICA DEL LIBANO</option>
                                        <option value="BENJAMIN VICUNA MACKENNA">BENJAMIN VICUNA MACKENNA</option>
                                        <option value="REPUBLICA DE HAITI">REPUBLICA DE HAITI</option>
                                        <option value="PROVINCIA DE CHILOE">PROVINCIA DE CHILOE</option>
                                        <option value="REYES CATOLICOS">REYES CATOLICOS</option>
                                        <option value="REPUBLICA DE ISRAEL">REPUBLICA DE ISRAEL</option>
                                        <option value="REPUBLICA DE COLOMBIA">REPUBLICA DE COLOMBIA</option>
                                        <option value="PILOTO PARDO">PILOTO PARDO</option>
                                        <option value="REPUBLICA DE ALEMANIA">REPUBLICA DE ALEMANIA</option>
                                        <option value="DOCTOR LUIS CALVO MACKENNA">DOCTOR LUIS CALVO MACKENNA</option>
                                        <option value="REPUBLICA DE PANAMA">REPUBLICA DE PANAMA</option>
                                        <option value="SANTIAGO DE CHILE">SANTIAGO DE CHILE</option>
                                        <option value="REPUBLICA DE MEXICO">REPUBLICA DE MEXICO</option>
                                        <option value="REPUBLICA DEL ECUADOR">REPUBLICA DEL ECUADOR</option>
                                        <option value="SALVADOR SANFUENTES">SALVADOR SANFUENTES</option>
                                        
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sel1">Selecciona tu curso:</label>
                                    <select class="form-control" id="sel1" name="curso" required="">
                                        <option value="">Selecciona</option>
                                        <option value="1 Basico">1°</option>
                                        <option value="2 Basico">2°</option>
                                        <option value="3 Basico">3°</option>
                                        <option value="4 Basico">4°</option>
                                        <option value="5 Basico">5°</option>
                                        <option value="6 Basico">6°</option>
                                        <option value="7 Basico">7°</option>
                                        <option value="8 Basico">8°</option>
                                    </select>
                                </div>
                                
                                </br> </br>
                                <button type="submit" name ="enviar" value= "primero_cuarto_basico_habitos_de_estudio_autocuidado" class="btn btn-primary btn-outline-primary">Enviar</button><!--cambiar valor de value-->
                            </form>
                        </div>
                    </div>                 
                    <!--end apartado preguntas-->
                </div>
            </div>
        </div>
        </br></br>

        <?php
        /*require_once "../../resources/funciones.php";
        $conn = new ConneccionMySQL();
        $conn->Crearconexion();
        if (isset($_POST['enviar'])) {
            if ($_POST['enviar'] == 'primero_cuarto_basico_habitos_de_estudio_autocuidado') { //cambiar 
                error_reporting(0);
                $conn->insertar_datos_actividad($_POST['enviar']);
            }
        }
        $conn->Cerrarconexion();*/
        ?>   
        <!--elements end-->
        <!--footer start-->
        <div class="footer">
            <div class="footer-bottom text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="copyright">
                                <p>
                                    Copyright 2020 ©Diseñado y desarrollado por 
                                    <a target="_blank" href="https://titanx.cl/" style ="color: #6bc513;">Make it Lab USS</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--footer end-->
       
    </div>
         
   <!-- Placed js at the end of the document so the pages load faster -->

    
    <!-- All js plugins included in this file. -->
    <script src="../../js/vendor/jquery-1.12.0.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/jquery.nivo.slider.pack.js"></script>
    <script src="../../js/owl.carousel.min.js"></script>
    <script src="../../js/ajax-mail.js"></script>
    <script src="../../js/jquery.magnific-popup.js"></script>
    <script src="../../js/jquery.counterup.min.js"></script>
    <script src="../../js/waypoints.min.js"></script>
    <script src="../../js/plugins.js"></script>
    <script src="../../js/main.js"></script>
    <script src="../../js/scripts.js" type="text/javascript"></script>
    <script src="../../js/codigoNavbar.js" type="text/javascript"></script>

</body>

</html>