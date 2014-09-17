<?php
include_once("../lib/dbfactory.php");
class tipobibliografia extends Main{   
    
    public $opt;
    function index($query,$p,$c) {        
        $sql = "SELECT
                    idtipo_bibliografia,
                    descripcion_tipobibliografia
                    FROM
                    tipo_bibliografia
                where ".$c." like :query";         
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] = $this->getRow($sql, $param , $p );        
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );        
        return $data;
    }       
    function edit($id ) {
        $stmt = $this->db->prepare("SELECT * FROM tipo_bibliografia WHERE idtipo_bibliografia = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    
    function insert($_P ) {
           
        $sentencia=$this->db->query("SELECT COUNT(idtipo_bibliografia) as cant from tipo_bibliografia");         
        $ct=$sentencia->fetch();      
        $xd=1+ (int)$ct['cant'];
        $sql = $this->Query("sp_tipobiblio_iu(0,:p1,:p2)");
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':p1',$xd , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['descripcion_tipobibliografia'] , PDO::PARAM_STR);
       
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    
    
    
    function update($_P ) {
        
        $sql = $this->Query("sp_tipobiblio_iu(1,:p1,:p2)");
        $stmt = $this->db->prepare($sql);
        
        if($_P['idpadre']==""){$_P['idpadre']=null;}
        $stmt->bindValue(':p1', $_P['idtipo_bibliografia'] , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['descripcion_tipobibliografia'] , PDO::PARAM_STR);
       
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function delete($p) {
        $sql = $this->Query("sp_tipobiblio_sd(1,:p1)");
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':p1', $p, PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>
