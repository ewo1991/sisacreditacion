<?php
//header("Location: index.php?controller=listaproyecto");
mysql_connect($server='localhost', $username="root", $password="");
$coneccion=mysql_select_db('sisacreditacion');
$codigoalumno=$_POST['codigoalumno'];
$idproyecto=$_POST['idproyecto'];
echo $codigoalumno."<br>";
echo $idproyecto."<br>";

for($i=0;$i<=$_POST["contador"];$i++){
    $ii=$i+1;
    $query="INSERT INTO detalle_concepto_detproyecto (idconcepto,nota,idproyecto,CodigoAlumno,CodigoSemestre)
             VALUES (".$ii.",".$_POST["nota".$i].",".$idproyecto.",'".$codigoalumno."','20132')";
    mysql_query($query);
    echo $_POST["nota".$i]."<br>";
}


