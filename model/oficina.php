<?php
include_once("../lib/dbfactory.php");
class oficina extends Main{    
    function index($query,$p,$c) 
    {
        $sql = "select oficina.idoficina,oficina.descripcion,oficina.direccion,oficina.telefono,sucursal.descripcion
                from oficina inner join sucursal on oficina.idsucursal = sucursal.idsucursal
                where ".$c." like :query";         
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );        
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );        
        return $data;
    }       
    function edit($id ) 
    {
        $stmt = $this->db->prepare("SELECT * FROM oficina WHERE idoficina = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function insert($_P ) {
        $sql = $this->Query("p_oficina(0,:p1,:p2,:p3,:p4,:p5,:p6,:p7,0)");
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':p1', $_P['idsucursal'] , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['descripcion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['direccion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['telefono'] , PDO::PARAM_STR);
        $stmt->bindValue(':p5', $_P['fax'] , PDO::PARAM_STR);
        $stmt->bindValue(':p6', $_P['celular'] , PDO::PARAM_STR);
        $stmt->bindValue(':p7', $_P['rpm'] , PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function update($_P ) {
        $sql = $this->Query("p_oficina(:p0,:p1,:p2,:p3,:p4,:p5,:p6,:p7,1)");
        $stmt = $this->db->prepare($sql);
        if($_P['idpadre']==""){$_P['idpadre']=null;}
        $stmt->bindValue(':p0', $_P['idoficina'] , PDO::PARAM_INT);
        $stmt->bindValue(':p1', $_P['idsucursal'] , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['descripcion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['direccion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['telefono'] , PDO::PARAM_STR);
        $stmt->bindValue(':p5', $_P['fax'] , PDO::PARAM_STR);
        $stmt->bindValue(':p6', $_P['celular'] , PDO::PARAM_STR);
        $stmt->bindValue(':p7', $_P['rpm'] , PDO::PARAM_STR);   
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function delete($p) {
        $stmt = $this->db->prepare("DELETE FROM oficina WHERE idoficina = :p1");
        $stmt->bindValue(':p1', $p, PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>
