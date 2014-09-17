<?php
include_once("../lib/dbfactory.php");
class comision extends Main{    
    function index($query,$p,$c) 
    {
        $sql = "SELECT
                        comision.idcomision,
			comision.decripcioncomision,
			departamentoacademico.Abreviatura,
			comision.resolucion,	
			comision.fecha_inicio,
			comision.fecha_termino
			
				FROM
			comision 
			inner join departamentoacademico on departamentoacademico.CodigoDptoAcad = comision.CodigoDptoAcad
                WHERE ".$c." like :query ";         
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );        
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );        
        return $data;
    }       
    function edit($id ) 
    {
        $stmt = $this->db->prepare("SELECT * FROM comision WHERE idcomision = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function insert($_P ) {
         $sentencia=$this->db->query("SELECT COUNT(idcomision) as cant from comision");         
         $ct=$sentencia->fetch();      
          $xd=1+ (int)$ct['cant'];
         
        $sql = $this->Query("sp_comi_iu(0,:p1,:p2,:p3,:p4,:p5,:p6)");
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':p1', $xd , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['descripcioncomision'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['CodigoDptoAcad'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['resolucion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p5', $_P['fecha_inicio'] , PDO::PARAM_INT);
        $stmt->bindValue(':p6', $_P['fecha_termino'] , PDO::PARAM_INT);
               
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();   
        return array($p1 , $p2[2]);
    }
    function update($_P ) {
        $sql = $this->Query("sp_comi_iu(1,:p1,:p2,:p3,:p4,:p5,:p6)");
        $stmt = $this->db->prepare($sql);
        if($_P['idpadre']==""){$_P['idpadre']=null;}
        $stmt->bindValue(':p2', $_P['descripcioncomision'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['CodigoDptoAcad'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['resolucion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p5', $_P['fecha_inicio'] , PDO::PARAM_INT);
        $stmt->bindValue(':p6', $_P['fecha_termino'] , PDO::PARAM_INT);
               
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function delete($p) {
        $stmt = $this->db->prepare("DELETE FROM comision WHERE idcomision = :p1");
        $stmt->bindValue(':p1', $p, PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>
