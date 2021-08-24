<!DOCTYPE html>
<?php
include ('sesion.php');
?>
<html>
    <head>
        <title>Resultados</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
        <!-- data tables export -->
        <link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css"/>


    </head>
    <body>
        </br></br>
        <div class="container">
            <div class="page-header">
                <div class="card" style =" background-color: #DCDE4B;">
                    <div class="card-body">
                        <div class="align text-center">
                            <h1> Respuestas de los participantes </h1>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </br></br>
        <div class="container">
            <div class="form-group">
                <form role="form" action="" method="post">
                    <label for="sel1">Selecciona la actividad:</label>
                    <select class="form-control" id="sel1" name="actividad" required="">
                        <option value="">Selecciona</option>
                        <option value="primero_basico_actividad_fisica">1° Básico - Actividad Física</option>
                        <option value="segundo_basico_actividad_fisica">2° Básico - Actividad Física</option>
                        <option value="tercero_basico_actividad_fisica">3° Básico - Actividad Física</option>
                        <option value="cuarto_basico_actividad_fisica">4° Básico - Actividad Física</option>
                        <option value="quinto_basico_actividad_fisica">5° Básico - Actividad Física</option>
                        <option value="Sexto_basico_actividad_fisica">6° Básico - Actividad Física</option>

                        <option value="primero_segundo_basico_alimentacion_saludable">1°-2° Básico - Alimentacion Saludable</option>
                        <option value="primero_segundo_basico_alimentacion_no_saludable">1°-2° Básico - Alimentacion No Saludable</option>
                        <option value="primero_segundo_basico_lavado_de_manos">1°-2° Básico - Lavado de Manos</option>
                        <option value="primero_segundo_basico_bp_manipulacion_de_alimentos">1°-2° Básico - BP Manipulacion de Alimentos</option>

                        <option value="tercero_quinto_basico_alimentacion_saludable">3°-5° Básico - Alimentacion Saludable</option>
                        <option value="tercero_quinto_basico_alimentacion_no_saludable">3°-5° Básico - Alimentacion No Saludable</option>
                        <option value="tercero_quinto_basico_lavado_de_manos">3°-5° Básico - Lavado de Manos</option>
                        <option value="tercero_quinto_basico_bp_manipulacion_de_alimentos">3°-5° Básico - BP Manipulacion de Alimentos</option>

                        <option value="sexto_octavo_alimentacion_saludable">6°-8° Básico - Alimentacion Saludable</option>
                        <option value="sexto_octavo_alimentacion_no_saludable">6°-8° Básico - Alimentacion No Saludable</option>
                        <option value="sexto_octavo_lavado_de_manos">6°-8° Básico - Lavado de Manos</option>
                        <option value="sexto_octavo_bp_manipulacion_de_alimentoss">6°-8° Básico - BP Manipulacion de Alimentos</option>
                        <option value="sexto_octavo_basico_tca">6°-8° Básico - Prevención TCA</option>

                        <option value="primero_cuarto_basico_primeros_auxilios_autocuidado">1°-4° Básico - Primeros auxilios</option>
                        <option value="primero_cuarto_basico_habitos_de_higiene_autocuidado">1°-4° Básico - Hábitos de Higiene</option>
                        <option value="primero_cuarto_basico_habitos_de_estudio_autocuidado">1°-4° Básico - Hábitos de Estudio</option>
                        <option value="primero_cuarto_basico_manejo_de_residuos_autocuidado">1°-4° Básico - Manejo de Residuos</option>

                        <option value="quinto_octavo_basico_reanimacion_cardiopulmonar_autocuidado">5°-8° Básico - Reanimación Cardiopulmonar</option>
                        <option value="quinto_octavo_basico_primeros_auxilios_autocuidado">5°-8° Básico - Primeros Auxilios</option>
                        <option value="quinto_octavo_basico_habitos_de_higiene_autocuidado">5°-8° Básico - Hábitos de Higiene</option>
                        <option value="quinto_octavo_basico_prevencion_coronavirus_autocuidado">5°-8° Básico - Prevención Coronavirus</option>

                    
                        <option value="salud_mental_familias_estudiates">Salud Mental - Familias y Estudiantes</option>
                        <option value="salud_mental_docentes">Salud Mental - Docentes</option>  
                    </select>

                    </br> </br>
                    <button type="submit" name ="enviar" class="btn btn-outline-primary">Enviar</button>
                </form>
            </div>
        </div>

        </br> </br>
        <div class="container">
            <?php
            require_once "funciones.php";
            $conn = new ConneccionMySQL();
            $conn->Crearconexion();
            if (isset($_POST['enviar'])) {
                $tabla = $_POST['actividad'];
                error_reporting(0);
                $conn->mostrarDatos($tabla);
            }
            $conn->Cerrarconexion();
            ?>
        </div>
        </br></br>
    </body>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>


    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
</html>








