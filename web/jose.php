<?php
header("Location: index.php?controller=solicitudes");
$idproyecto=$_GET["idproyecto"];
$idalumno=$_GET["idalumno"];

echo $idproyecto."<br>";
echo $idalumno."<br>";
$idsemestre='20132';
$fecha=date("Y-m-d");
echo $fecha;
mysql_connect($server='localhost', $username="root", $password="");
$coneccion=mysql_select_db('sisacreditacion');
$query="UPDATE detalleproyecto_matrixalumno set estado=1
        WHERE idproyecto=".$idproyecto." and CodigoAlumno='".$idalumno."' ";

mysql_query($query);
?>
<script language="JavaScript" type="text/javascript">
    
alert('Su solicitud fue enviada');

</script>
           

