<?php
include_once("../lib/dbfactory.php");
class tipoingreso extends Main{    
    function index($query,$p,$c) 
    {
        $sql = "SELECT
                    tipoingreso.CodigoTipoIngreso,
                    tipoingreso.DescripcionTipoIngreso,
                    modalidadingreso.DescripcionModalidad
                    FROM
                    modalidadingreso
                    Inner Join tipoingreso ON modalidadingreso.CodigoModalidad = tipoingreso.CodigoModalidad
                        where ".$c." like :query  ORDER BY tipoingreso.CodigoTipoIngreso asc";         
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );        
        $data['rowspag'] = $this->getRowPag($data['total'], $p );        
        return $data;
    }       
    function edit($id ) 
    {
        $stmt = $this->db->prepare("SELECT * FROM tipoingreso WHERE CodigoTipoIngreso = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function insert($_P ) {
        
        $sentencia=$this->db->query("SELECT MAX(CodigoTipoIngreso) as cant from tipoingreso");         
        $ct=$sentencia->fetch();      
        $xd=1+(int)$ct['cant'];
           
        $sql = $this->Query("sp_tipoingre_iu(0,:p1,:p2,:p3)");
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':p1', $xd , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['CodigoModalidad'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['DescripcionTipoIngreso'] , PDO::PARAM_STR);
      
            
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function update($_P ) {
        
        $sql = $this->Query("sp_tipoingre_iu(1,:p1,:p2,:p3)");
        $stmt = $this->db->prepare($sql);
        if($_P['idpadre']==""){$_P['idpadre']=null;}
        
        $stmt->bindValue(':p1', $_P['CodigoTipoIngreso']  , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['CodigoModalidad'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['DescripcionTipoIngreso'] , PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function delete($p) {
        $stmt = $this->db->prepare("DELETE FROM tipoingreso WHERE CodigoTipoIngreso = :p1");
        $stmt->bindValue(':p1', $p, PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>
