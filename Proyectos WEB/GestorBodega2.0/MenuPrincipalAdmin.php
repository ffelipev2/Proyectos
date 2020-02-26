<?php
include ('modelo/sesion.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="menuplantilla/ico/favicon.ico">
        <title>Gestión de bodega</title>
        <link href="menuplantilla/css/bootstrap.css" rel="stylesheet">
        <link href="menuplantilla/css/style.css" rel="stylesheet">
        <link href="menuplantilla/css/font-awesome.min.css" rel="stylesheet">
        <script src="menuplantilla/js/modernizr.js"></script>
    </head>

    <body>
        <?php
        if ($_SESSION['cargo'] != 'Administrador') {
            header("Location:index.php");
        }
        ?>
        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="./vistas/menuPrincipalA.php">GESTIÓN DE BODEGA</a>
                </div>
                <div class="navbar-collapse collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="./vistas/menuPrincipalA.php">Menu principal</a></li>
                        <li><a><?php echo $_SESSION['usuario'] . "» Administrador"; ?></a></li>
                        <li><a href="modelo/salir.php?sal=si">Cerrar sesión</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>


        <div id="headerwrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <h1>Control de producto</h1>				
                    </div>
                </div><!-- /row -->
            </div> <!-- /container -->
        </div><!-- /headerwrap -->
        <!-- *****************************************************************************************************************
         CONTROL DE PRODUCTO
         ***************************************************************************************************************** -->
        <div id="service">
            <div class="container">
                <div class="row centered">
                    <div class="col-md-4">
                        <a href="ListaryExportar.php">
                            <img src="imagenes/adp.png" ></a>
                        <h4>Agregar productos</h4>
                        <p>Esta opción permite al administrador gestionar los productos </p>
                        <p><br/><a href="ListaryExportar.php" class="btn btn-theme">Ingresar</a></p>
                    </div>
                    <div class="col-md-4">
                        <a href="ModificarProducto.php">
                            <img src="imagenes/modp.png" ></a>
                        <h4>Modificar Stock</h4>
                        <p>Esta opción permite al administrador modificar el stock de un producto</p>
                        <p><br/><a href="ModificarProducto.php" class="btn btn-theme">Ingresar</a></p>
                    </div>
                    <div class="col-md-4">              
                        <a href="EliminarProducto.php">
                            <img src="imagenes/elp.png" ></a>
                        <h4>Eliminar Productos</h4>
                        <p>Esta opción permite al administrador eliminar a un usuario del sistema</p>
                        <p><br/><a href="Eliminarproducto.php" class="btn btn-theme">Ingresar</a></p>
                    </div>
                </div>
            </div><! --/container -->
        </div><! --/service -->

        <!-- *****************************************************************************************************************
        CONTROL DE PERSONAL 
        ***************************************************************************************************************** -->


        <div id="headerwrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <h1>Control de personal</h1>				
                    </div>
                </div><!-- /row -->
            </div> <!-- /container -->
        </div><!-- /headerwrap -->

        <div id="service">
            <div class="container">
                <div class="row centered">
                    <div class="col-md-4">
                        <a href="AgregarPersonal.php">
                            <img src="imagenes/ad.png" ></a>
                        <h4>Agregar Usuario</h4> 
                        <p>Esta opción permite al administrador agregar a un nuevo usuario al sistema</p>
                        <p><br/><a href="AgregarPersonal.php" class="btn btn-theme">Ingresar</a></p>
                    </div>
                    <div class="col-md-4">
                        <a href="ModificarPersonal.php">
                            <img src="imagenes/mod.png" ></a>
                        <h4>Modificar Usuario</h4>
                        <p>Esta opción permite al administrador modificar los atributos de un usuario</p>
                        <p><br/><a href="ModificarPersonal.php" class="btn btn-theme">Ingresar</a></p>
                    </div>
                    <div class="col-md-4">
                        <a href="EliminarPersonal.php">
                            <img src="imagenes/el.png" ></a>
                        <h4>Eliminar Usuario</h4>
                        <p>Esta opción permite al administrador eliminar a un usuario del sistema</p>
                        <p><br/><a href="EliminarPersonal.php" class="btn btn-theme">Ingresar</a></p>
                    </div>
                </div>
            </div><! --/container -->
        </div><! --/service -->




        <!-- *****************************************************************************************************************
         FOOTER
         ***************************************************************************************************************** -->
        <div id="footerwrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <h4>About</h4>
                        <div class="hline-w"></div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                    </div>
                    <div class="col-lg-4">
                        <h4>Social Links</h4>
                        <div class="hline-w"></div>
                        <p>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-tumblr"></i></a>
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <h4>Our Bunker</h4>
                        <div class="hline-w"></div>
                        <p>
                            Some Ave, 987,<br/>
                            23890, New York,<br/>
                            United States.<br/>
                        </p>
                    </div>

                </div><! --/row -->
            </div><! --/container -->
        </div><! --/footerwrap -->

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="menuplantilla/js/bootstrap.min.js"></script>
        <script src="menuplantilla/js/retina-1.1.0.js"></script>
        <script src="menuplantilla/js/jquery.hoverdir.js"></script>
        <script src="menuplantilla/js/jquery.hoverex.min.js"></script>
        <script src="menuplantilla/js/jquery.prettyPhoto.js"></script>
        <script src="menuplantilla/js/jquery.isotope.min.js"></script>
        <script src="menuplantilla/js/custom.js"></script>


        <script>
            // Portafolio
            (function ($) {
                "use strict";
                var $container = $('.portfolio'),
                        $items = $container.find('.portfolio-item'),
                        portfolioLayout = 'fitRows';

                if ($container.hasClass('portfolio-centered')) {
                    portfolioLayout = 'masonry';
                }

                $container.isotope({
                    filter: '*',
                    animationEngine: 'best-available',
                    layoutMode: portfolioLayout,
                    animationOptions: {
                        duration: 750,
                        easing: 'linear',
                        queue: false
                    },
                    masonry: {
                    }
                }, refreshWaypoints());

                function refreshWaypoints() {
                    setTimeout(function () {
                    }, 1000);
                }

                $('nav.portfolio-filter ul a').on('click', function () {
                    var selector = $(this).attr('data-filter');
                    $container.isotope({filter: selector}, refreshWaypoints());
                    $('nav.portfolio-filter ul a').removeClass('active');
                    $(this).addClass('active');
                    return false;
                });

                function getColumnNumber() {
                    var winWidth = $(window).width(),
                            columnNumber = 1;

                    if (winWidth > 1200) {
                        columnNumber = 5;
                    } else if (winWidth > 950) {
                        columnNumber = 4;
                    } else if (winWidth > 600) {
                        columnNumber = 3;
                    } else if (winWidth > 400) {
                        columnNumber = 2;
                    } else if (winWidth > 250) {
                        columnNumber = 1;
                    }
                    return columnNumber;
                }

                function setColumns() {
                    var winWidth = $(window).width(),
                            columnNumber = getColumnNumber(),
                            itemWidth = Math.floor(winWidth / columnNumber);

                    $container.find('.portfolio-item').each(function () {
                        $(this).css({
                            width: itemWidth + 'px'
                        });
                    });
                }

                function setPortfolio() {
                    setColumns();
                    $container.isotope('reLayout');
                }

                $container.imagesLoaded(function () {
                    setPortfolio();
                });

                $(window).on('resize', function () {
                    setPortfolio();
                });
            })(jQuery);
        </script>
    </body>
</html>
