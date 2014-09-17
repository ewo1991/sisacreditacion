<?php
include_once("../lib/dbfactory.php");
class plancurricular extends Main{    
    function index($query,$p,$c) 
    {
        $sql = "SELECT
                escuelaprofesional.DescripcionEscuela,
                plancurricular.CodigoPlan,
                plancurricular.DescripcionPlan,
                plancurricular.EstadoPlanCurricular,
                plancurricular.CreditosObligatorios,
                plancurricular.CreditosElectivos,
                plancurricular.Resolucion,
                plancurricular.Tipo,
                plancurricular.Vigente,
                facultades.DescripcionFacultad
                FROM
                plancurricular
                Inner Join facultades ON plancurricular.CodigoFacultad = facultades.CodigoFacultad
                Inner Join escuelaprofesional ON plancurricular.CodigoEscuela = escuelaprofesional.CodigoEscuela

                WHERE ".$c." like :query";         
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );        
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );        
        return $data;
    }   
    
    /*
    function getEscuelaProfesional()
    {
        $stmt = $this->db->prepare("
                                    select 
                                    escuelaprofesional.CodigoEscuela,facultades.DescripcionFacultad,escuelaprofesional.DescripcionEscuela
                                    from escuelaprofesional inner join facultades on 
                                    escuelaprofesional.CodigoFacultad = facultades.CodigoFacultad ");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    */
    function edit($id ) 
    {
        $stmt = $this->db->prepare("SELECT * FROM   plancurricular WHERE CodigoPlan = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function insert($_P ) {
         $sentencia=$this->db->query("SELECT COUNT(CodigoPlan) as cant from plancurricular");         
         $ct=$sentencia->fetch();      
          $xd=1+ (int)$ct['cant'];
          $xd="F".$xd;
        $sql = $this->Query("sp_plan_iu(0,:p1,:p2,:p3,:p4,:p5,:p6,:p7,:p8,:p9,:p10)");
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':p1', $xd , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['CodigoEscuela'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['CodigoFacultad'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['DescripcionPlan'] , PDO::PARAM_STR);
        $stmt->bindValue(':p5', $_P['EstadoPlanCurricular'] , PDO::PARAM_STR);
        $stmt->bindValue(':p6', $_P['CreditosObligatorios'] , PDO::PARAM_STR);
        $stmt->bindValue(':p7', $_P['CreditosElectivos'] , PDO::PARAM_STR);
        $stmt->bindValue(':p8', $_P['Resolucion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p9', $_P['Tipo'] , PDO::PARAM_STR);
        $stmt->bindValue(':p10', $_P['Vigente'] , PDO::PARAM_STR);
        
       
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function delete($p) {
        $stmt = $this->db->prepare("DELETE FROM plancurricular WHERE CodigoPlan = :p1");
        $stmt->bindValue(':p1', $p, PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>
