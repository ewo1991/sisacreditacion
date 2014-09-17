<?php
include_once("../lib/dbfactory.php");
class especialidadprofesional extends Main{    
    function index($query,$p,$c) 
    {
        $sql = "SELECT
        especialidadprofesional.CodigoEspecialidad,
        especialidadprofesional.Descripcion,
        escuelaprofesional.DescripcionEscuela,
        facultades.DescripcionFacultad,
        especialidadprofesional.Estado,
        especialidadprofesional.DescripcionIngles
        FROM
        especialidadprofesional
        INNER JOIN escuelaprofesional ON especialidadprofesional.CodigoEscuela = escuelaprofesional.CodigoEscuela
        INNER JOIN facultades ON especialidadprofesional.CodigoFacultad = facultades.CodigoFacultad AND escuelaprofesional.CodigoFacultad = facultades.CodigoFacultad

        WHERE ".$c." like :query";         
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );        
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );        
        return $data;
    }       
    function edit($id ) 
    {
        $stmt = $this->db->prepare("SELECT * FROM  especialidadprofesional WHERE CodigoEspecialidad = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function insert($_P ) {
         $sentencia=$this->db->query("SELECT COUNT(CodigoEspecialidad) as cant from especialidadprofesional");         
         $ct=$sentencia->fetch();      
          $xd=1+ (int)$ct['cant'];
          $xd="F".$xd;
        $sql = $this->Query("sp_espeprofes_iu(0,:p1,:p2,:p3,:p4,:p5,:p6)");
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':p1', $xd , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['Descripcion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['CodigoEscuela'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['CodigoFacultad'] , PDO::PARAM_STR);
        $stmt->bindValue(':p5', $_P['Estado'] , PDO::PARAM_STR);
        $stmt->bindValue(':p6', $_P['DescripcionIngles'] , PDO::PARAM_STR);
       
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function delete($p) {
        $stmt = $this->db->prepare("DELETE FROM especialidadprofesional WHERE CodigoEspecialidad = :p1");
        $stmt->bindValue(':p1', $p, PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>
