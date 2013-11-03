<?php
session_start();
include '../Dao/daoServicio.php';
include '../clases/CuestrionarioTutoria.php';

$dao = new daoServicio();
$guardar = new CuestrionarioTutoria();
$usuario=$_SESSION["UsuarioAlumno"];
?>
<script>
var user = "<?php echo $usuario ?>";
alert(user);
</script>
<?php
$guardar->getMatricula($usuario);
$guardar->getPregunta1($_GET["Disposicion"]);
$guardar->getPregunta2($_GET["cordialidad"]);
$guardar->getPregunta3($_GET["respeto"]);
$guardar->getPregunta4($_GET["interes"]);
$guardar->getPregunta5($_GET["capacidad"]);
$guardar->getPregunta6($_GET["disposicion"]);
$guardar->getPregunta7($_GET["resolver"]);
$guardar->getPregunta8($_GET["orientar"]);
$guardar->getPregunta9($_GET["dificultades"]);
$guardar->getPregunta10($_GET["estimular"]);
$guardar->getPregunta11($_GET["formacion"]);
$guardar->getPregunta12($_GET["dominio"]);
$guardar->getPregunta13($_GET["localizar"]);
$guardar->getPregunta14($_GET["normativa"]);
$guardar->getPregunta15($_GET["seleccion"]);
$guardar->getPregunta16($_GET["canaliza"]);
$guardar->getPregunta17($_GET["mejorado"]);
$guardar->getPregunta18($_GET["programa"]);
$guardar->getPregunta19($_GET["satisfactorio"]);
$guardar->getPregunta20($_GET["asignado"]);

$dao->guardarEncuestaTUTO($guardar);
?>
