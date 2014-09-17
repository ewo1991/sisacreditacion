<?php
include_once("../lib/dbfactory.php");
class facultad extends Main{    
    function index($query,$p,$c) {        
        $sql = "SELECT
                        CodigoFacultad,
			DescripcionFacultad,
                        Decano,
                        SecretarioAcademico,
                        DirectorOCRA,
                        Abreviatura
                        FROM
                    facultades
                where ".$c." like :query";         
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );        
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );        
        return $data;
    }       
    function edit($id ) {
        $stmt = $this->db->prepare("SELECT * FROM facultades WHERE CodigoFacultad = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function insert($_P ) {
        
                $sentencia=$this->db->query("SELECT COUNT(CodigoFacultad) as cant from facultades");         
                $ct=$sentencia->fetch();      
                $xd=1+ (int)$ct['cant'];
                $xd="F".$xd;
                $sql = $this->Query("sp_facu_iu(0,:p1,:p2,:p3,:p4,:p5,:p6,:p7,:p8,:p9,:p10,:p11,:p12)");
                $stmt = $this->db->prepare($sql);
                $stmt->bindValue(':p1', $xd , PDO::PARAM_STR);
                $stmt->bindValue(':p2', $_P['DescripcionFacultad'] , PDO::PARAM_STR);
                $stmt->bindValue(':p3', $_P['EstadoFacultad'] , PDO::PARAM_STR);
                $stmt->bindValue(':p4', $_P['CodFacultadSira'] , PDO::PARAM_STR);
                $stmt->bindValue(':p5', $_P['Decano'] , PDO::PARAM_STR);
                $stmt->bindValue(':p6', $_P['SecretarioAcademico'] , PDO::PARAM_STR);
                $stmt->bindValue(':p7', $_P['DirectorOCRA'] , PDO::PARAM_STR);
                $stmt->bindValue(':p8', $_P['DescripcionFacultadIngles'] , PDO::PARAM_STR);
                $stmt->bindValue(':p9', $_P['DecanoIngles'] , PDO::PARAM_STR);
                $stmt->bindValue(':p10', $_P['SecretarioAcademicoIngles'] , PDO::PARAM_STR);
                $stmt->bindValue(':p11', $_P['DirectorOCRAIngles'] , PDO::PARAM_STR);
                $stmt->bindValue(':p12', $_P['Abreviatura'] , PDO::PARAM_STR);
        
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
        
    }
    
    function update($_P ) {
        
        $sql = $this->Query("sp_facu_iu(1,:p1,:p2,:p3,:p4,:p5,:p6,:p7,:p8,:p9,:p10,:p11,:p12)");
        
        $stmt = $this->db->prepare($sql);
        
        if($_P['idpadre']==""){$_P['idpadre']=null;}
        
            $stmt->bindValue(':p1', $_P['CodigoFacultad'] , PDO::PARAM_STR);
            $stmt->bindValue(':p2', $_P['DescripcionFacultad'] , PDO::PARAM_STR);
            $stmt->bindValue(':p3', $_P['EstadoFacultad'] , PDO::PARAM_STR);
            $stmt->bindValue(':p4', $_P['CodFacultadSira'] , PDO::PARAM_STR);
            $stmt->bindValue(':p5', $_P['Decano'] , PDO::PARAM_STR);
            $stmt->bindValue(':p6', $_P['SecretarioAcademico'] , PDO::PARAM_STR);
            $stmt->bindValue(':p7', $_P['DirectorOCRA'] , PDO::PARAM_STR);
            $stmt->bindValue(':p8', $_P['DescripcionFacultadIngles'] , PDO::PARAM_STR);
            $stmt->bindValue(':p9', $_P['DecanoIngles'] , PDO::PARAM_STR);
            $stmt->bindValue(':p10', $_P['SecretarioAcademicoIngles'] , PDO::PARAM_STR);
            $stmt->bindValue(':p11', $_P['DirectorOCRAIngles'] , PDO::PARAM_STR);
            $stmt->bindValue(':p12', $_P['Abreviatura'] , PDO::PARAM_STR); 
            $p1 = $stmt->execute();
           
            $p2 = $stmt->errorInfo();
            return array($p1 , $p2[2]);
    }
    
    function delete($p) {
        
        $stmt = $this->db->prepare("DELETE FROM facultades WHERE CodigoFacultad = :p1");
        $stmt->bindValue(':p1', $p, PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>
