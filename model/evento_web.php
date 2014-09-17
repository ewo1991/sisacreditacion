<?php
include_once("../lib/dbfactory.php");
class evento_web extends Main{    
    function index($query,$p,$c) 
    {
        $sql = "SELECT
                evento_web.id_eventoweb,
                evento_web.titulo,
                evento_web.descripcion,
                evento_web.fecha
                FROM
                evento_web where ".$c." like :query";         
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );        
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );        
        return $data;
    }       
    function edit($id ) 
    {
        $stmt = $this->db->prepare("SELECT * FROM evento_web WHERE id_eventoweb = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function insert($_P ) {
         $sentencia=$this->db->query("SELECT MAX(id_eventoweb) as cant from evento_web");         
         $ct=$sentencia->fetch();      
          $xd=1+ (int)$ct['cant'];
          //$xd="F".$xd;
        $sql = $this->Query("sp_evento_web_iu(0,:p1,:p2,:p3,:p4)");
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':p1', $xd , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['titulo'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['descripcion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['fecha'] , PDO::PARAM_STR);
      
       
             
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function update($_P ) {
        $sql = $this->Query("sp_evento_web_iu(1,:p1,:p2,:p3,:p4)");
        $stmt = $this->db->prepare($sql);
        if($_P['idpadre']==""){$_P['idpadre']=null;}
        $stmt->bindValue(':p1', $_P['id_eventoweb'] , PDO::PARAM_INT);
       $stmt->bindValue(':p2', $_P['titulo'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['descripcion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['fecha'] , PDO::PARAM_STR);

        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function delete($p) {
        $stmt = $this->db->prepare("DELETE FROM evento_web WHERE id_eventoweb = :p1");
        $stmt->bindValue(':p1', $p, PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>
