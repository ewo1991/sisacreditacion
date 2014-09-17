<script>
    $(function() {
        $(".wrapper-search").html('');
         
    })
</script>
<div class="div_container"  align="center">
<?php if(!empty($control['rows'])){  ?> 
    <script>document.getElementById("identificador_editar").value = true;  </script>
 <?php
// echo "<div align='left'><pre>";print_r($control['rows']);echo "//////////<br>";print_r($lista['rows']);echo "</div>";
// print_r($lista['rows'][3]['CodigoAlumno']); echo"<br>";print_r($control['rows'][2]['CodigoAlumno']);echo "<br>";
        }?>
<?php echo $grilla; 
//print_r( $control['rows'][0]['asistencia_alumno']);
?>
</div>