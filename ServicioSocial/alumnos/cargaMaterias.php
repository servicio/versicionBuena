
<link rel="stylesheet" type="text/css" href="../css/css.css">
<link rel="stylesheet" type="text/css" href="../bootsTrap2/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="../bootsTrap2/css/bootstrap-responsive.css"/>

<script src="../bootsTrap2/js/jquery.min.js"></script>
<script src="../bootsTrap2/js/bootstrap.js"></script>
<?php
include './plantilla.php';
include './validacionseSessionAlumnos.php';
include '../clases/materias.php';
include '../Dao/dao.php';
$validar = new validacionseSessionAlumnos();
$validar->verificacionDeLogueAlumnos();
$usuario = $_SESSION["UsuarioAlumno"];
$dao = new dao();
$algo = "$usuario";
$materias = new materias();



$arreglo2D = $dao->consultaMateriasObligatorias($algo);

$dao->tablatemporalcargadas($arreglo2D, $algo);

$arreglox = $dao->consultaMateriasSeleccionadas($algo);

$dao->tablatemporalSeleccionar($arreglox, $algo);
?><script>
    location.href = 'cambioMaterias.php';
</script><?php
// Lo dejas entrar a la pagina 
include './plantillaFooter.php';
////} 
//else 
//{   
//       // Usuario que no se ha logueado 
//       echo "No tienes permiso para entrar a esta pagina"; 
//       exit(); 
//    
//}  
?>
