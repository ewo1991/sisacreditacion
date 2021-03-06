<?php
include_once("../lib/dbfactory.php");
class grupo extends Main{    
    function index($query,$p,$c) {        
        $sql = "SELECT
                    idgrupo,
                     nombre_grupo
                        FROM
                         grupo
                where ".$c." like :query";         
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );        
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );        
        return $data;
    }       
    function edit($id ) {
        $stmt = $this->db->prepare("SELECT * FROM grupo WHERE idgrupo = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function insert($_P ) {
        
       $sentencia=$this->db->query("SELECT MAX(idgrupo) as cant from grupo");         
         $ct=$sentencia->fetch();      
          $xd=1+ (int)$ct['cant'];
          
        $sql = $this->Query("sp_grupo_iu(0,:p1,:p2)");
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':p1', $xd , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['nombre_grupo'] , PDO::PARAM_STR);
        
        
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
        
    }
    function update($_P ) {
        $sql = $this->Query("sp_grupo_iu(1,:p1,:p2)");
        $stmt = $this->db->prepare($sql);
        
        if($_P['idpadre']==""){$_P['idpadre']=null;}
        $stmt->bindValue(':p1', $_P['idgrupo'] , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['nombre_grupo'] , PDO::PARAM_STR);
        
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    
    function delete($p) {
        $stmt = $this->db->prepare("DELETE FROM grupo WHERE idgrupo = :p1");
        $stmt->bindValue(':p1', $p, PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>
