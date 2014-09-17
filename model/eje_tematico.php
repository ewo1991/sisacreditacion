<?php
include_once("../lib/dbfactory.php");
class eje_tematico extends Main{    
    function index($query,$p,$c) 
    {
        $sql = "SELECT
                eje_tematico.idejetematico,
                grupo.idgrupo,
                eje_tematico.nombre_ejetematico,
                grupo.nombre_grupo
                FROM
                eje_tematico
                Inner Join grupo ON  eje_tematico.idgrupo = grupo.idgrupo 
                WHERE ".$c." like :query ORDER BY eje_tematico.idejetematico asc";         
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );        
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );        
        return $data;
    }       
    function edit($id ) 
    {
        $stmt = $this->db->prepare("SELECT * FROM eje_tematico WHERE idejetematico = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function insert($_P ) {
         $sentencia=$this->db->query("SELECT MAX(idejetematico) as cant from eje_tematico");         
         $ct=$sentencia->fetch();      
          $xd=1+ (int)$ct['cant'];
          
        $sql = $this->Query("sp_ejetemat_iu(0,:p1,:p2,:p3)");
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':p1', $xd , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['nombre_ejetematico'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['idgrupo'] , PDO::PARAM_INT);                  
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function update($_P ) {
        $sql = $this->Query("sp_ejetemat_iu(1,:p1,:p2,:p3)");
        $stmt = $this->db->prepare($sql);
        if($_P['idpadre']==""){$_P['idpadre']=null;}
        $stmt->bindValue(':p1', $_P['idejetematico'] , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['nombre_ejetematico'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['idgrupo'] , PDO::PARAM_INT); 
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function delete($p) {
        $stmt = $this->db->prepare("DELETE FROM eje_tematico WHERE idejetematico = :p1");
        $stmt->bindValue(':p1', $p, PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>
