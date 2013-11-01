<?php
include '../DaoConnection/coneccion.php';
$coneccion = new coneccion();
//session_start();
?>
<html>
    <head>
        <!--<meta http-equiv="conten-type" content="text/html; charset=UTF-8" />-->
        <script type="text/javascript" src="../bootsTrap2/js/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../bootsTrap2/css/bootstrap.css"/>
        <script src="../bootsTrap2/js/bootstrap.min.js"></script>
        <script>
function quitarEspacion(cadena) {
        var palabra = cadena.replace(/\s/g, "%20");
        return palabra;
    }

            $(document).ready(function() {
                $('#maestrosMateria').hide();
                $('#Buscar').click(function() {
                   var materia = $('#materiaBuscar').val();
                 var busqueda =  quitarEspacion(materia);
                    if (materia !== "") {
                         $('#maestrosMateria').load('xxxxxx.php?materia=' + busqueda);
                        $('#maestrosMateria').show('slow');
                    }
                    else {

                        $('#maestrosMateria').hide('slow');
                    }


                });
            });

        </script>

    </head>
    <body>

        <div class="input-append" style="float: left; margin-left: 40px">
            <input  id="materiaBuscar" type="text" placeholder="asignatura...." list="listaAlumnos" style=" height: 30px" maxlength="30"/>
            <datalist id="listaAlumnos">
                <?php
                $sql = "Select  materia from materias ";
                $datos = mysql_query($sql, $coneccion->Conectarse());
                While ($rs = mysql_fetch_array($datos)) {
                    ?>
                <option value="<?php echo $valor= $rs["materia"]; ?>"> <?php echo $rs["materia"];?>   </option>
                    <?php
                }
                ?>

            </datalist>
            <input type="submit" class="btn btn-primary" value="Buscar" id="Buscar"/>
        </div >

        <div id="maestroSelect">
            <select id="maestrosMateria" style="margin-right: 250px; width: 250px">
                
                <option value="0">Seleccione un maestro</option>
            </select>
            <!--            SELECT m.maestro FROM historial h, maestros m where h.idMateria = 2  and h.idMaestro =  m.id-->
        </div>
    </body>
</html>