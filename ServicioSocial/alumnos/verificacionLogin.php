<?php

session_start();
include '../clases/usuario.php';
include '../Dao/daoServicio.php';
include '../Utilerias/generarPass.php';
$utilierias = new Utilerias();
$usuario = new usuario();
$dServicio = new daoServicio();
$usurioRespaldo = $_GET["usua"];
$usuario->setUsuario($utilierias->genera_md5($_GET["usua"]));
$usuario->setPass($_GET["pass"]);
$valido =  $dServicio->accesoAlumnos($usuario);
if ($valido == false) {
    echo '
<div  id="error" style="height: 35px" class="alert-error">
  Ingrese el <Strong>Usuario y Contraseña</Strong> correcta
</div>';
    echo "
         <script>
         $('#error').slideDown('slow');
         $('#error').delay('1500');
         $('#error').slideUp('slow');
         </script>
            ";
} else {
    $_SESSION["UsuarioAlumno"] = $usurioRespaldo;
    echo "
        <script>
             document.location.href='index.php';
        </script>
         ";
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
