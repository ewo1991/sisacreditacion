<?php
include_once("../lib/dbfactory.php");
class linea_investigacion extends Main{    
    function index($query,$p,$c) 
    {
        $sql = "SELECT
                         linea_investigacion.idlinea_investigacion,
                         eje_tematico.idejetematico,            
                         linea_investigacion.nombre_linea,
                         eje_tematico.nombre_ejetematico
                         FROM
                         linea_investigacion
                         Inner Join eje_tematico ON linea_investigacion.idejetematico = eje_tematico.idejetematico
                         WHERE ".$c." like :query ORDER BY linea_investigacion.idlinea_investigacion asc" ;         
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );        
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );        
        return $data;
    }       
    function edit($id ) 
    {
        $stmt = $this->db->prepare("SELECT * FROM linea_investigacion WHERE idlinea_investigacion = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function insert($_P ) {
         $sentencia=$this->db->query("SELECT MAX(idlinea_investigacion) as cant from linea_investigacion");         
         $ct=$sentencia->fetch();      
          $xd=1+ (int)$ct['cant'];
          
        $sql = $this->Query("sp_lininvest_iu(0,:p1,:p2,:p3)");
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':p1', $xd , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['nombre_linea'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['idejetematico'] , PDO::PARAM_INT);                  
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function update($_P ) {
        $sql = $this->Query("sp_lininvest_iu(1,:p1,:p2,:p3)");
        $stmt = $this->db->prepare($sql);
        if($_P['idpadre']==""){$_P['idpadre']=null;}
        $stmt->bindValue(':p1', $_P['idlinea_investigacion'] , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['nombre_linea'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['idejetematico'] , PDO::PARAM_INT); 
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function delete($p) {
        $stmt = $this->db->prepare("DELETE FROM linea_investigacion WHERE idlinea_investigacion = :p1");
        $stmt->bindValue(':p1', $p, PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>
