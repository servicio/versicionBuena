<?php
include './DaoConnection/coneccion.php';
include './alumnos/plantilla.php';
$cn = new coneccion();
$matricula = "E12081126";
//session_start();
?>
<html>
    <head>
        <style>
            .stlconten{
                background-color: white;
                -webkit-background-size: cover; 
                -moz-background-size: cover; 
                -o-background-size: cover; 
                background-size: cover;
                margin-top: -20px
            }
        </style>
        <script>
            $(document).ready(function() {



                $('#bien').hide();
                $('#mal').hide();
                $('#malo').hide();
                $('#botonazo').click(function() {

                    var busqueda = $("#origen option").length;
                    var valor = $('#horario').val();
                    if (valor != 0) {

                        if (busqueda <= 6 && busqueda > 4) {
                            $('#origen option').prop('disabled', false);
                            $('#origen option').prop('selected', 'selected');
                            var datos = 'Asignatura=' + $('#origen').val() +
                                    '&valor=' + valor;
                            $.get('GuardarCarga.php', datos, function() {
                                $('#bien').show('slow');
                                $('#bien').hide('slow');
                            })
                        } else {
                            $('#mal').show('slow');
                            $('#mal').hide('slow');
                        }

                    }
                    else {
                        $('#malo').show('slow');
                        $('#malo').hide('slow');
                    }
                });

                $().ready(function()
                {
                    $('.pasar').click(function() {
                        return !$('#origen option:selected').remove().appendTo('#destino');
                    });
                    $('.quitar').click(function() {
                        return !$('#destino option:selected').remove().appendTo('#origen');
                    });
                    $('.pasartodos').click(function() {
                        $('#origen option').each(function() {
                            $(this).remove().appendTo('#destino');
                        });
                    });
                    $('.quitartodos').click(function() {
                        $('#destino option').each(function() {
                            $(this).remove().appendTo('#origen');
                        });
                    });
                    $('.submit').click(function() {
                        $('#destino option').prop('selected', 'selected');
                    });
                });
            });
        </script>
    </head> 
    <body>
        <div class="container stlconten">

            <div class="span12"> 

                <div id="bien" class="alert alert-success">
                    <strong>Se han Guardado las materias satisfactoriamente</strong>
                </div>
                <div id="mal" class="alert alert-error">
                    <strong> Deben ser 5 ó 6 materias seleccionadas</strong>
                </div>

                <div id="malo" class="alert alert-error">
                    <strong> Debes seleccionar el turno </strong>
                </div>
                <div >
                    <!--<h1>maerias cargadas</h1>-->
                    <select name="origen[]" id="origen" multiple="multiple" size="8">
                        <?php
                        $cn = new coneccion();
                        $sql = "SELECT concat_ws('-_- ', m.semestre, m.materia) as fusion, m.materia, m.semestre, m.id FROM historial h, materias m where h.usuario = '$matricula' and h.idAcreditacion <=2 and h.calificacion < 70 and m.id = h.idMateria ";

                        $datos2 = mysql_query($sql, $cn->Conectarse());
                        While ($rs2 = mysql_fetch_array($datos2)) {
                            ?>
                            <option value="<?php echo $rs2["materia"] ?>" disabled="true"><?php echo $rs2["fusion"] ?></option>
                            <?php
                        }
                        ?>

                    </select>
                </div>
                <div>
                    <input type="button" class="pasar izq" value="Flecha abajo"><input type="button" class="quitar der" value="flecha arriba"><br />
                    <!--<input type="button" class="pasartodos izq" value="Todos"><input type="button" class="quitartodos der" value="Todos">-->
                </div>
                <!--<h1>maerias por seleccionar</h1>-->
                <div>
                    <select name="destino[]" id="destino" multiple="multiple" size="8">
                        <?php
                        $cn = new coneccion();
                        $sql = "SELECT distinct concat_ws('-_- ', m.semestre, m.materia) as fusion,  m.materia, m.semestre, m.id FROM materias m,historial h WHERE idAcreditacion <=2 and h.calificacion > 70 and m.id NOT IN (SELECT idMateria FROM historial where usuario='$matricula' )LIMIT 0 , 10";

                        $datos = mysql_query($sql, $cn->Conectarse());
                        While ($rs = mysql_fetch_array($datos)) {
                            ?>
                            <option value="<?php echo $rs["materia"] ?>" ><?php echo $rs["fusion"] ?></option>
                            <?php
                        }
                        ?>

                    </select>

                </div>
                <div>
                    <select id="horario" style="width: 250px; margin-right: 250px; ">
                        <option value="0">En que horario?</option>
                        <option value="Matutino">Matutino</option>
                        <option value="Vespertino">Vespertino</option>
                        <
                    </select> 
                </div>
                <input id="botonazo" type="button" title="" value="Aceptar" >
            </div>
        </div>
    </body>
</html>
<?php include '../plantillaFooter.php'; ?>
