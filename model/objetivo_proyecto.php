<?php
include_once("../lib/dbfactory.php");
class objetivo_proyecto extends Main{    
    function index($query,$p,$c) 
    {
        $sql = "SELECT
                objetivo_proyecto.idobjetivo_proyecto,
                proyecto.idproyecto,
                objetivo_proyecto.objetivos_especificos,
                proyecto.nombre_proyecto
                FROM
                objetivo_proyecto
                Inner Join proyecto ON objetivo_proyecto.idproyecto = proyecto.idproyecto
                WHERE ".$c." like :query";         
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );        
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );        
        return $data;
    }       
    function edit($id ) 
    {
        $stmt = $this->db->prepare("SELECT * FROM objetivo_proyecto WHERE idobjetivo_proyecto = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function insert($_P ) {
         $sentencia=$this->db->query("SELECT MAX(idobjetivo_proyecto) as cant from objetivo_proyecto");         
         $ct=$sentencia->fetch();      
          $xd=1+ (int)$ct['cant'];
          //$xd="F".$xd;
        $sql = $this->Query("sp_objproyec_iu(:p1,:p2,:p3,0)");
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':p1', $xd , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['objetivos_especificos'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['idproyecto'] , PDO::PARAM_INT);
      
       //faltaaa chinguelllllllllllllllllllllllllllllll
             
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function update($_P ) {
        $sql = $this->Query("sp_objproyec_iu(:p1,:p2,:p3,1)");
        $stmt = $this->db->prepare($sql);
        if($_P['idpadre']==""){$_P['idpadre']=null;}
        $stmt->bindValue(':p1', $_P['idobjetivo_proyecto'] , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['objetivos_especificos'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['idproyecto'] , PDO::PARAM_INT);

        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function delete($p) {
        $stmt = $this->db->prepare("DELETE FROM objetivo_proyecto WHERE idobjetivo_proyecto = :p1");
        $stmt->bindValue(':p1', $p, PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>
