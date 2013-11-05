<?php //
include '../../DaoConnection/coneccion.php';
$cn = new coneccion();
$matricula = "E12081126";
//session_start();
?>
<style>


</style>

<html>
    <head>
        
<!--        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> -->
<script type="text/javascript" src="../../bootsTrap2/js/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="../../bootsTrap2/css/bootstrap.css"/>
<script src="../../bootsTrap2/js/bootstrap.min.js"></script>
        <script>
    $(document).ready(function() {
        $('#botonazo').click(function() {
             $('#origen option').prop('disabled', false);
            $('#origen option').prop('selected', 'selected');
            var valor = $('#horario').val();
              
          
           
            var datos = 'Asignatura=' + $('#origen').val() +
            '&valor=' + valor;
            $.get('GuardarCarga.php', datos, function(){
                
            })
        });
        
$().ready(function() 
    {
        $('.pasar').click(function() { return !$('#origen option:selected').remove().appendTo('#destino'); });  
        $('.quitar').click(function() { return !$('#destino option:selected').remove().appendTo('#origen'); });
        $('.pasartodos').click(function() { $('#origen option').each(function() { $(this).remove().appendTo('#destino'); }); });
        $('.quitartodos').click(function() { $('#destino option').each(function() { $(this).remove().appendTo('#origen'); }); });
        $('.submit').click(function() { $('#destino option').prop('selected', 'selected'); });
    });
});
</script>
    </head> 

    <body style="background-color:  #e5e5e5">
        <div> 
         
        <div>
            <select name="origen[]" id="origen" multiple="multiple" size="8">
                <?php
                $cn = new coneccion();
                 $sql = "SELECT m.materia, m.semestre, m.id FROM historial h, materias m where h.usuario = '$matricula' and h.idAcreditacion <=2 and h.calificacion < 70 and m.id = h.idMateria";
       
                $datos2 = mysql_query($sql, $cn->Conectarse());
                While ($rs2 = mysql_fetch_array($datos2)) {
                    ?>
                    <option value="<?php echo $rs2["materia"] ?>" disabled="true"><?php echo $rs2["materia"] ?></option>
                    <?php
                }
                ?>
                
            </select>
        </div>
        <div>
            <input type="button" class="pasar izq" value="Pasar"><input type="button" class="quitar der" value="Quitar"><br />
            <!--<input type="button" class="pasartodos izq" value="Todos"><input type="button" class="quitartodos der" value="Todos">-->
        </div>
        <div class="">
            <select name="destino[]" id="destino" multiple="multiple" size="8">
                 <?php
                $cn = new coneccion();
                 $sql = "SELECT m.materia, m.semestre, m.id FROM historial h, materias m where h.usuario = '$matricula' and h.idAcreditacion <=2 and h.calificacion >= 70 and m.id = h.idMateria";
       
                $datos = mysql_query($sql, $cn->Conectarse());
                While ($rs = mysql_fetch_array($datos)) {
                    ?>
                <option value="<?php echo $rs["materia"] ?>" ><?php echo $rs["materia"] ?></option>
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
            <input id="botonazo" type="button" title="" >
            
        </div>
</body> 
</html>
