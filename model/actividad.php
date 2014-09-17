<?php
include_once("../lib/dbfactory.php");
class actividad extends Main{    
    function index($query,$p,$c) 
    {
        $sql = "SELECT
                actividad.idactividad,
                proyecto.idproyecto,
                actividad.nombre_actividad,
                proyecto.nombre_proyecto,
                actividad.fecha_inicio,
                actividad.fecha_fin
                FROM
                actividad
                Inner Join proyecto ON actividad.idproyecto = proyecto.idproyecto
                WHERE ".$c." like :query";         
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );        
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );        
        return $data;
    }       
    function edit($id ) 
    {
        $stmt = $this->db->prepare("SELECT * FROM actividad WHERE idactividad = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function insert($_P ) {
         $sentencia=$this->db->query("SELECT MAX(idactividad) as cant from actividad");         
         $ct=$sentencia->fetch();      
          $xd=1+ (int)$ct['cant'];
          //$xd="F".$xd;
        $sql = $this->Query("sp_actividad_iu(0,:p1,:p2,:p3,:p4,:p5)");
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':p1', $xd , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['nombre_actividad'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['idproyecto'] , PDO::PARAM_INT);
        $stmt->bindValue(':p4', $_P['fecha_inicio'] , PDO::PARAM_STR);
        $stmt->bindValue(':p5', $_P['fecha_fin'] , PDO::PARAM_STR);
      
       
             
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function update($_P ) {
        $sql = $this->Query("sp_actividad_iu(1,:p1,:p2,:p3,:p4,:p5)");
        $stmt = $this->db->prepare($sql);
        if($_P['idpadre']==""){$_P['idpadre']=null;}
        $stmt->bindValue(':p1', $_P['idactividad'] , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['nombre_actividad'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['idproyecto'] , PDO::PARAM_INT);
        $stmt->bindValue(':p4', $_P['fecha_inicio'] , PDO::PARAM_STR);
        $stmt->bindValue(':p5', $_P['fecha_fin'] , PDO::PARAM_STR);

        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function delete($p) {
        $stmt = $this->db->prepare("DELETE FROM actividad WHERE idactividad = :p1");
        $stmt->bindValue(':p1', $p, PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>
