<?php
include_once("../lib/dbfactory.php");
class areacurricular extends Main{   
    
    public $opt;
    function index($query,$p,$c) {        
        $sql = "SELECT
                    CodigoAreaCurricular,
                    DescripcionArea,
                    TotalCursos,
                    TotalCreditos
                    FROM
                    areacurricular
                where ".$c." like :query";         
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );        
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );        
        return $data;
    }       
    function edit($id ) {
        $stmt = $this->db->prepare("SELECT * FROM areacurricular WHERE CodigoAreaCurricular = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    
    function insert($_P ) {
           
            $sentencia=$this->db->query("SELECT MAX(CodigoAreaCurricular) as cant from areacurricular");         
         $ct=$sentencia->fetch();      
          $xd=1+ (int)$ct['cant'];
          $xd="0".$xd;
        $sql = $this->Query("sp_areacurric_iu(0,:p1,:p2,:p3,:p4)");
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':p1',$xd , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['DescripcionArea'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['TotalCursos'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['TotalCreditos'] , PDO::PARAM_STR);
       
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    
    
    
    function update($_P ) {
        
        $sql = $this->Query("sp_areacurric_iu(1,:p1,:p2,:p3,:p4)");
        $stmt = $this->db->prepare($sql);
        
        if($_P['idpadre']==""){$_P['idpadre']=null;}
        $stmt->bindValue(':p1', $_P['CodigoAreaCurricular'] , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['DescripcionArea'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['TotalCursos'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['TotalCreditos'] , PDO::PARAM_STR);
       
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function delete($p) {
        $sql = $this->Query("sp_areacurric_sd(1,:p1)");
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':p1', $p, PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>
