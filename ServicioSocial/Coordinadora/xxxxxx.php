<meta http-equiv="conten-type" content="text/html; charset=UTF-8" />
<?php
include '../DaoConnection/coneccion.php';
$cn = new coneccion();
$materia = utf8_encode($_GET["materia"]);
//utf8_decode($materia);
//$sql = "SELECT * from materias WHERE materia = 'Taller de Herramientas Intelectuales'";
$sql = "SELECT id from materias WHERE materia like  '%$materia%'";
$datos = mysql_query($sql, $cn->Conectarse());
//$dato = "";
while ($fila = mysql_fetch_array($datos)) {
echo    $fila[0];
}
?>
