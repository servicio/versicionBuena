<?php
include '../../Dao/dao.php';
include '../../DaoConnection/coneccion.php';

$matricula = "E12081126";
$Asignaturas = $_GET["Asignatura"];
$valor = $_GET["valor"];
$cn = new coneccion();

for ($i=0;$i<count($Asignaturas);$i++)    
{
$sql = "INSERT INTO `precarga` (`Matricula`, `IdMateria`, `Horario`) VALUES ( '$matricula', '.$Asignaturas[$i].', '$valor');";
mysql_query($sql, $cn->Conectarse());
       
}
  $cn->cerrarBd();
?>
