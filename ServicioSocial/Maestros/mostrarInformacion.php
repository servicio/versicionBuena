<?php

include '../DaoConnection/coneccion.php';
$cn = new coneccion();
$busqueda = $_GET["datos"];
$sql = "select * from datospersonales where usuario ='$busqueda'";
$datos = mysql_query($sql, $cn->Conectarse());
while ($rs = mysql_fetch_array($datos)) {
    echo '<a title="Generar Organigrama" target="_blank" href="../organigrama/Dinamicamente.php?usuario='.$busqueda.'"><img src="imagenes/orgaICO.png"/></a>
        <br>';
    echo"<div style=width: 700px; margin-left: 40px;>";
    echo "<div style='float:left'><font size='4' face='Bookman Old Style'>Usuario: $rs[1].</font></div>";
    echo '<br>';
    echo "<div><font size='4' face='Bookman Old Style'>Nombre: $rs[2] &nbsp $rs[3] &nbsp $rs[4].</font></div>";
    echo"</div>";
}
echo"<script>
     $('#Informacion').slideDown('slow');
     </script>";
?>
