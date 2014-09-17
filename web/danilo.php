<?php
require '';
header("Location: index.php?controller=listaproyecto");
$idproyecto=$_GET["idproyecto"];
$mensaje=$_GET["mensaje"];
$idalumno=$_GET["idalumno"];

echo $idproyecto;
echo $mensaje;
echo $idalumno;
$idsemestre='20132';
$fecha=date("Y-m-d");
//echo $fecha;
//mysql_connect($server='localhost', $username="root", $password="");
//$coneccion=mysql_select_db('sisacreditacion');
$query="INSERT INTO detalleproyecto_matrixalumno (idproyecto,fecha,estado,CodigoAlumno,CodigoSemestre,mensaje)
        VALUES(".$idproyecto.",'".$fecha."','0','".$idalumno."','".$idsemestre."','".$mensaje."') ";

mysql_query($query);
?>
<script language="JavaScript" type="text/javascript">
    
alert('Su solicitud fue enviada');

</script>
           

