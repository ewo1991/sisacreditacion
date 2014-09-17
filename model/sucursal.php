<?php
include_once("../lib/dbfactory.php");
class sucursal extends Main{    
    function index($query,$p,$c) {        
        $sql = "select idsucursal,descripcion
                from sucursal
                where ".$c." like :query";         
        echo $sql;
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );        
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );        
        return $data;
    }       
    function edit($id ) {
        $stmt = $this->db->prepare("SELECT * FROM sucursal WHERE idsucursal = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function insert($_P ) {
        $sql = $this->Query("p_sucursal(0,:p2,0)");
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':p2', $_P['descripcion'] , PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function update($_P ) {
        $sql = $this->Query("p_sucursal(:p1,:p2,1)");
        $stmt = $this->db->prepare($sql);
        if($_P['idpadre']==""){$_P['idpadre']=null;}
        $stmt->bindValue(':p1', $_P['idsucursal'] , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['descripcion'] , PDO::PARAM_STR);   
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function delete($p) {
        $stmt = $this->db->prepare("DELETE FROM sucursal WHERE idsucursal = :p1");
        $stmt->bindValue(':p1', $p, PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>
