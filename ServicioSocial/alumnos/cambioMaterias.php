




<?php

//include './plantilla.php'; 
include './plantilla.php';

include '../clases/materias.php';
include '../Dao/dao.php';
include './validacionseSessionAlumnos.php';
$validar=new validacionseSessionAlumnos();
$validar->verificacionDeLogueAlumnos();
$usuario = $_SESSION["UsuarioAlumno"];
$matricula = $usuario;
$dao = new dao();

?>




<div >

    <?php
    $arreglo2D = $dao->consultatablaObligadas($matricula);
    echo "<form name=\"materias\" method=\"post\" action=\"GuardarMaterias.php\">";


    echo '<table border="1" class="table table-bordered table-striped">';
    echo '<tr>';
    $renglon = $arreglo2D[0];


    foreach ($renglon as $campo => $valor) {
        if($campo !== "obligatoria"){
            if($campo !== "idMateria"){
        echo "<th> $campo </th>";
            }
        }
    }
    echo"<th>cambio</th>";
    echo '<tr>';

    foreach ($arreglo2D as $renglon) {
        echo "<tr>";

        foreach ($renglon as $campo => $valor) {
         if($campo !== "obligatoria"){
            if($campo !== "idMateria"){


                echo "<td> $valor </td>";
         }}
            
         if($campo =="idMateria"){
                $idMateria=$valor;
            }

            if ($campo == "obligatoria") {
                $obligatoria = $valor;
            }
            if ($campo == "materias") {
                $prr = $valor;
            }
            if ($campo == "semestre") {
                $plop = $valor;
            }
        }
        if ( $obligatoria != 1) {
            echo" <td><a  href=\"proceso.php?algo=$prr&semestre=$plop&aceptar=cancelar&obligatoria=$obligatoria&idMateria=$idMateria\" > algo </a></td>";
        
        }
        echo "</tr>";
    }
    echo "</table>";
    echo "<input type=\"submit\" class=\"btn btn-primary\"  name=\"guardar\" value=\"Guardar\">";

    echo "</form>";
    ?>


</div>
<div style="background: #72e487">

    <?php
    $arreglo2D = $dao->consultatablaseleccionar($matricula);



    echo '<table border="1" class="table table-bordered table-striped">';
    echo '<tr>';
    $renglon = $arreglo2D[0];


    foreach ($renglon as $campo => $valor) {
         if($campo !== "obligatoria"){
            if($campo !== "idMateria"){
        echo "<th> $campo </th>";
    }}}
    echo '<tr>';

    foreach ($arreglo2D as $renglon) {
        echo "<tr>";

        foreach ($renglon as $campo => $valor) {
             if($campo !== "obligatoria"){
            if($campo !== "idMateria"){
            echo "<td> $valor </td>";
             }}
            if ($campo == "materias") {
                $prr = $valor;
            }
            if ($campo == "semestre") {
                $plop = $valor;
            }
            if ($campo == "obligatoria") {
                $obligatoria = $valor;
            }
            if ($campo == "idMateria") {
                $idMateria = $valor;
            }
            
        }

      echo"<td><a  href=\"proceso.php?algo=$prr&semestre=$plop&aceptar=aceptar&obligatoria=$obligatoria&idMateria=$idMateria\" > aceptar </a> </td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>


</div>


<?php include './plantillaFooter.php'; ?>
