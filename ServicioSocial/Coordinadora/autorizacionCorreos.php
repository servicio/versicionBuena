<?php
include '../DaoConnection/coneccion.php';
include './plantillaEncabezado.php';
?>

<div class="container">
    <center>
        <div    class="span12"  style="overflow-y: scroll; height: 335px;  margin: auto; background-color: white; margin-top: -20px">
            <br />
            <?php
            $cn = new coneccion();
            $sql = "SELECT * FROM `datosregistrousuario` ";
            $datos = mysql_query($sql, $cn->Conectarse());
            echo '<div>';
            while ($rs = mysql_fetch_array($datos)) {
                ?>
                <a href="autorizarOrechazar.php?idusuario=<?php echo $rs[1]; ?>">Contraseña pedida por el usuario: <?php echo $rs[1]; ?></a><br />
                <?php
            }
            echo '</div>'
            ?>


        </div>
    </center>
</div>

<?php
include './plantillaFooter.php';
?>