<?php
include_once("../lib/dbfactory.php");
class sedeescuela extends Main{    
    function index($query,$p,$c) 
    {
        $sql = "SELECT
                sedeescuela.CodigoSedeEscuela,
                sedeescuela.CodigoSira,
                sedeescuela.CodigoSiga,
                facultades.DescripcionFacultad,
                facultades.CodigoFacultad,
                sedes.DescripcionSede,
                escuelaprofesional.DescripcionEscuela,
                escuelaprofesional.CodigoEscuela
                FROM
                sedeescuela
                Inner Join sedes ON sedes.CodigoSede = sedeescuela.CodigoSede
                Inner Join facultades ON sedeescuela.CodigoFacultad = facultades.CodigoFacultad
                Inner Join escuelaprofesional ON escuelaprofesional.CodigoEscuela = sedeescuela.CodigoEscuela

                WHERE ".$c." like :query";         
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );        
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );        
        return $data;
    }       
    function edit($id ) 
    {
        $stmt = $this->db->prepare("SELECT * FROM  sedeescuela WHERE CodigoSedeEscuela = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function insert($_P ) {
         $sentencia=$this->db->query("SELECT COUNT(CodigoSedeEscuela) as cant from sedeescuela");         
         $ct=$sentencia->fetch();      
          $xd=1+ (int)$ct['cant'];
          $xd="F".$xd;
        $sql = $this->Query("sp_sedeescu_iu(0,:p1,:p2,:p3,:p4,:p5,:p6)");
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':p1', $xd , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['CodigoFacultad'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['CodigoEscuela'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['CodigoSede'] , PDO::PARAM_STR);
        $stmt->bindValue(':p5', $_P['CodigoSiga'] , PDO::PARAM_STR);
        $stmt->bindValue(':p6', $_P['CodigoSira'] , PDO::PARAM_STR);
       
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function delete($p) {
        $stmt = $this->db->prepare("DELETE FROM sedeescuela WHERE CodigoSedeEscuela = :p1");
        $stmt->bindValue(':p1', $p, PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>
