<?php
include_once("../lib/dbfactory.php");
class Modulo extends Main{    
    function index($query,$p,$c) {        
        $sql = "select m.idmodulo,
                       m.descripcion,
                       mm.descripcion,
                       m.url,
                       case m.estado when true then 'ACTIVO' else 'INCANTIVO' end,
                       m.orden,
                       m.icono
                from modulo as m left outer join modulo as mm on mm.idmodulo=m.idpadre
                where ".$c." like :query"; 
        
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );        
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );        
        return $data;
    }       
    function edit($id ) {
        $stmt = $this->db->prepare("SELECT * FROM modulo WHERE idmodulo = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function insert($_P ) {
        $sql = $this->Query("func_inseactu_modulo(0,:p1,:p2,:p3,:p5,:p6,:p7,0)");
        $stmt = $this->db->prepare($sql);
        if($_P['idpadre']==""){$_P['idpadre']=null;}
        $stmt->bindValue(':p1', $_P['idpadre'] , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['descripcion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['url'] , PDO::PARAM_STR);        
        $stmt->bindValue(':p5', $_P['activo'] , PDO::PARAM_BOOL);
        $stmt->bindValue(':p6', $_P['orden'] , PDO::PARAM_INT);
        $stmt->bindValue(':p7', $_P['icono'] , PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function update($_P ) {
        $sql = $this->Query("func_inseactu_modulo(:idmodulo,:p1,:p2,:p3,:p5,:p6,:p7,1)");
        $stmt = $this->db->prepare($sql);
        if($_P['idpadre']==""){$_P['idpadre']=null;}
        $stmt->bindValue(':p1', $_P['idpadre'] , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['descripcion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['url'] , PDO::PARAM_STR);        
        $stmt->bindValue(':p5', $_P['activo'] , PDO::PARAM_BOOL);
        $stmt->bindValue(':p6', $_P['orden'] , PDO::PARAM_INT);        
        $stmt->bindValue(':p7', $_P['icono'] , PDO::PARAM_INT);
        $stmt->bindValue(':idmodulo', $_P['idmodulo'] , PDO::PARAM_INT);

        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function delete($p) {
        $stmt = $this->db->prepare("DELETE FROM modulo WHERE idmodulo = :p1");
        $stmt->bindValue(':p1', $p, PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>