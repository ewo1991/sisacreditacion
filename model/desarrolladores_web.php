<?php
include_once("../lib/dbfactory.php");
class desarrolladores_web extends Main{    
    function index($query,$p,$c) 
    {
        $sql = "SELECT
                desarrolladores_web.id_desarrolladoresweb,
                desarrolladores_web.descripcion,
                desarrolladores_web.imagen FROM 
                desarrolladores_web where ".$c." like :query";        
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );        
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );        
        return $data;
    }       
    function edit($id ) 
    {
        $stmt = $this->db->prepare("SELECT * FROM desarrolladores_web WHERE id_desarrolladoresweb = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function insert($_P ) {
         $sentencia=$this->db->query("SELECT MAX(id_desarrolladoresweb) as cant from desarrolladores_web");         
         $ct=$sentencia->fetch();      
          $xd=1+ (int)$ct['cant'];
          //$xd="F".$xd;
        $sql = $this->Query("sp_desarrolladores_web_iu(0,:p1,:p2,:p3)");
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':p1', $xd , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['descripcion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['imagen_desarrolladores'] , PDO::PARAM_STR);
      
       
             
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function update($_P ) {
        $sql = $this->Query("sp_desarrolladores_web_iu(1,:p1,:p2,:p3)");
        $stmt = $this->db->prepare($sql);
        if($_P['idpadre']==""){$_P['idpadre']=null;}
        $stmt->bindValue(':p1', $_P['id_desarrolladoresweb'] , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['descripcion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['imagen_desarrolladores'] , PDO::PARAM_STR);

        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function delete($p) {
        $stmt = $this->db->prepare("DELETE FROM desarrolladores_web WHERE id_desarrolladoresweb = :p1");
        $stmt->bindValue(':p1', $p, PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>
