<?php
include_once("../lib/dbfactory.php");
class cuerpoproyecto extends Main{    
    function index($query,$p,$c) 
    {
        $sql = "SELECT
                cuerpo_proyecto.idcuerpo_proyecto,
                cuerpo_proyecto.idindice,
                cuerpo_proyecto.descripcion,
                cuerpo_proyecto.idindice_padre
                FROM
                cuerpo_proyecto

                where ".$c." like :query";         
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );        
        $data['rowspag'] = $this->getRowPag($data['total'], $p );        
        return $data;
    }       
    function edit($id ) 
    { 
        $stmt = $this->db->prepare("SELECT * FROM cuerpo_proyecto WHERE idcuerpo_proyecto = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function insert($_P ) {
        $sentencia=$this->db->query("SELECT MAX(idcuerpo_proyecto) as cant from cuerpo_proyecto");         
        $ct=$sentencia->fetch();      
        $xd=1+(int)$ct['cant'];
        $sql = $this->Query("sp_cuerproyec_iu(0,:p1,:p2,:p3,:p4)");
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':p1', $xd , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['idindice'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['descripcion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['idindice_padre'] , PDO::PARAM_INT);
   
      
        
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function update($_P ) {
        $sql = $this->Query("sp_cuerproyec_iu(1,:p1,:p2,:p3,:p4)");
        $stmt = $this->db->prepare($sql);
        if($_P['idpadre']==""){$_P['idpadre']=null;}
        
        $stmt->bindValue(':p1', $_P['idcuerpo_proyecto'] , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['idindice'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['descripcion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['idindice_padre'] , PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function delete($p) {
        $stmt = $this->db->prepare("DELETE FROM cuerpo_proyecto WHERE idcuerpo_proyecto = :p1");
        $stmt->bindValue(':p1', $p, PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]); 
    }
}
?>

