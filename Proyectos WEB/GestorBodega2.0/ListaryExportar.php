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
        <!-- DATA TABLES*****************************************************-->
        <script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="DataTables-1.10.12/media/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <link href="DataTables-1.10.12/media/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="DataTables-1.10.12/media/js/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- VALIDADOR RUT *****************************************************-->
        <script src="js/validarRUT.js" type="text/javascript"></script>
        <!-- SWEET ALERT *****************************************************-->
        <script src="bootstrap-sweetalert-master/dist/sweetalert.min.js" type="text/javascript"></script>
        <link href="bootstrap-sweetalert-master/dist/sweetalert.css" rel="stylesheet" type="text/css"/>
        <!-- BOTONES PARA EXPORTAR DOCUMENTO *****************************************************-->
        <script src="DataTables-1.10.12/extensions/Buttons/js/dataTables.buttons.min.js" type="text/javascript"></script>
        <script src="DataTables-1.10.12/extensions/Buttons/js/buttons.bootstrap.min.js" type="text/javascript"></script>
        <script src="Stuk-jszip-887dcd8/dist/jszip.min.js" type="text/javascript"></script>
        <script src="pdfmake-master/build/pdfmake.min.js" type="text/javascript"></script>
        <script src="pdfmake-master/build/vfs_fonts.js" type="text/javascript"></script>
        <script src="DataTables-1.10.12/extensions/Buttons/js/buttons.html5.min.js" type="text/javascript"></script>
        <script src="DataTables-1.10.12/extensions/Buttons/js/buttons.print.min.js" type="text/javascript"></script>
        <script src="DataTables-1.10.12/extensions/Buttons/js/buttons.colVis.min.js" type="text/javascript"></script>
        <link href="DataTables-1.10.12/extensions/Buttons/css/buttons.bootstrap.css" rel="stylesheet" type="text/css"/>

    </head>

    <body>
        <?php
        if ($_SESSION['cargo'] != 'Administrador') {
            header("Location:index.php");
        }
        ?>

        <div class = "navbar navbar-default navbar-fixed-top" role = "navigation">
            <div class = "container-fluid">
                <div class = "navbar-header">
                    <button type = "button" class = "navbar-toggle" data-toggle = "collapse" data-target = ".navbar-collapse">
                        <span class = "sr-only">Toggle navigation</span>
                        <span class = "icon-bar"></span>
                        <span class = "icon-bar"></span>
                        <span class = "icon-bar"></span>
                    </button>
                    <a class = "navbar-brand" href = "MenuPrincipalAdmin.php">GESTIÓN DE BODEGA</a>
                </div>
                <div class="navbar-collapse collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="MenuPrincipalAdmin.php">Menu principal</a></li>
                        <li><a><?php echo $_SESSION['usuario'] . "» Administrador"; ?></a></li>
                        <li><a href="modelo/salir.php?sal=si">Cerrar sesión</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
        </br></br></br></br>

        <div class = "container-fluid">
            <div class = "row">
                <div class = "col-sm-8 col-md-offset-2">
                    <div>
                        <img style = "display:flex; margin:0 auto;"src = "imagenes/adp.png" class = "img-rounded">
                    </div>
                    <form action="" method="POST" role="form" class="form-horizontal">  

                        <div class = "form-group">
                            <label for = "pwd">Codigo:</label>
                            <input type = "text" name="codigo" class = "form-control" placeholder = "" required>
                        </div>

                        <div class = "form-group">
                            <label for = "pwd">Descripción:</label>
                            <input type = "text" name="descripcion" class = "form-control" placeholder = "" required>
                        </div>

                        <div class = "form-group">
                            <label for = "pwd">Stock:</label>
                            <input type = "number" name="stock" class = "form-control" min = "1" placeholder = "" required>
                        </div>

                        <div class = "form-group">
                            <label for = "pwd">Proveedor:</label>
                            <input type = "text" name="proveedor" class = "form-control" placeholder = "" required>
                        </div>

                        <div class = "form-group">
                            <label for = "pwd">Fecha de ingreso:</label>
                            <input type = "date" name="fecha" class = "form-control" placeholder = "" required>
                        </div>

                        <div class = "col-sm-12 form-group">
                            <button type = "submit"  name='agregarproducto' class = "btn btn-primary center-block">Enviar</button>
                        </div>
                    </form>

                    <?php
                    require_once "modelo/modelo.php";
                    $db = new BaseDatos();
                    $db->conectar();
                    $db->listaryExportar();
                    if (isset($_POST['agregarproducto'])) {
                    $db->agregarProducto();
                    $db->desconectar();
                    }
                    $db->desconectar();
                    ?>

                </div>
            </div>
        </div>


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="menuplantilla/js/bootstrap.min.js"></script>
        <script src="menuplantilla/js/retina-1.1.0.js"></script>
        <script src="menuplantilla/js/jquery.hoverdir.js"></script>
        <script src="menuplantilla/js/jquery.hoverex.min.js"></script>
        <script src="menuplantilla/js/jquery.prettyPhoto.js"></script>
        <script src="menuplantilla/js/jquery.isotope.min.js"></script>
        <script src="menuplantilla/js/custom.js"></script>



        <script>
            // Portfolio
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
            //************DATA TABLES ********************************//
            $(document).ready(function () {
                $('#Personas').dataTable({
                    dom: 'lBfrtip',
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                    language: {
                        "lengthMenu": "Desplegar _MENU_ filas por pagina",
                        "zeroRecords": "No se han encontrado registros",
                        "info": "Mostrando pagina _PAGE_ of _PAGES_",
                        "search": "Buscar:",
                        "infoEmpty": "No hay filas disponibles",
                        "paginate": {
                            "first": "Primera",
                            "last": "Ultima",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        },
                        "infoFiltered": "(filtered from _MAX_ total records)"
                    }
                });
            });

        </script>
    </body>
</html>
