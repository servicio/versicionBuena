<?php
session_start();
include './validacionseSessionAlumnos.php';
include './plantilla.php';
$validacion = new validacionseSessionAlumnos();
$validacion->verificacionDeLogueAlumnos();
?>
<link rel="stylesheet" type="text/css" href="jquery.lightbox-0.5.css" media="screen" />
<script type="text/javascript" src="lib/alertify.js"></script>
<link rel="stylesheet" href="themes/alertify.core.css" />
<link rel="stylesheet" href="themes/alertify.default.css" />
<script language="JavaScript">
    $(document).ready(function() {
        $("#prr").click(function() {
            var nombre = $("#nombre").val();
            var app = $("#app").val();
            var apm = $("#apm").val();
            var mail = $("#mail").val();
            var info = "nombre=" + nombre + "&app=" + app + "&apm=" + apm + "&mail=" + mail;
            $.get('actualizaDatosPersonales.php', info, function() {
                alertify.success("Los datos se actualizaron correctamente");
            });
        });
    });
</script>
<div class="container" style="background-image: url(galeria/fondotextofinal.png);-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; margin-top: -20px"> 
    <div class="span12" style="margin: auto">
        <?php
        $usuario = $_SESSION["UsuarioAlumno"];
        include '../DaoConnection/coneccion.php';
        $cn = new coneccion();
        $sql = "SELECT * FROM datosregistrousuario WHERE usuario='$usuario'";
        $datos = mysql_query($sql, $cn->Conectarse());
        while ($rs = mysql_fetch_array($datos)) {
            ?>
            <div style="margin: 3% 3% 3% 3%">
                <h3>Editar Perfil</h3>
                <div class="span2 pagination-centered" style="margin: 1% 1% 1% 1%">
                    <img src="<?php echo $rs[6]; ?>" class="img-polaroid">
                </div>
                <div class="span6" style="margin: 1% 1% 1% 1%">
                    <div class="well well-sm">
                        <div class="input-group">
                            <span class="input-group-addon" style="color: #b3b3b3">Usuario</span>
                            <input type="text" value="<?php echo $rs[1]; ?>" disabled="true" title="Este campo no puede ser editado"/><br>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon" style="color: #b3b3b3">Nombre</span>
                            <input id="nombre" type="text" value="<?php echo $rs[2]; ?>"/><br>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon" style="color: #b3b3b3">Apellido P.</span>
                            <input id="app" type="text" value="<?php echo $rs[3]; ?>"/><br>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon" style="color: #b3b3b3">Apellido M.</span>
                            <input id="apm" type="text" value="<?php echo $rs[4]; ?>"/><br>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon" style="color: #b3b3b3">Correo Electronico</span>
                            <input id="mail" type="text" value="<?php echo $rs[5]; ?>"/>
                        </div>
                    </div>
                    <input id="prr" type="button"  value="Guardar "  name="dato" class="btn btn-primary"/>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
<?php
include './plantillaFooter.php';
?>

