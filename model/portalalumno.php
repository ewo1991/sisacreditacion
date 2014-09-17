<?php
include_once("../lib/dbfactory.php");
class portalalumno extends Main{    
    function index($query,$p,$c) 
    {
        $sql = "SELECT
                    bibliografia.idbibliografia,
                    bibliografia.referencia,
                    bibliografia.identificador,
                    bibliografia.descripcion,
                    tipo_bibliografia.descripcion_tipobibliografia
                    FROM
                    tipo_bibliografia
                    Inner Join bibliografia ON tipo_bibliografia.idtipo_bibliografia = bibliografia.idtipo_bibliografia
                  where ".$c." like :query";         
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );        
        $data['rowspag'] = $this->getRowPag($data['total'], $p );        
        return $data;
    }  
         public function buscarcursospordnisemestre($semestre,$dni)
     {
         $semestre = htmlspecialchars($semestre);
         $dni = htmlspecialchars($dni);
         

         $sql = "SELECT * FROM portalalumno WHERE portalalumno.NumDocumento='" .$dni. "' and portalalumno.CodigoSemestre='".$semestre."'";

         $result = mysql_query($sql, $this->conexion);

         $cursosalumno = array();
         while ($row = mysql_fetch_assoc($result))
         {
             $cursosalumno[] = $row;
         }

         return $cursosalumno;
     }
    
    function edit($id ) 
    {
        $stmt = $this->db->prepare("SELECT * FROM bibliografia WHERE idbibliografia = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function insert($_P ) {
        
        $sentencia=$this->db->query("SELECT MAX(idbibliografia) as cant from bibliografia");         
        $ct=$sentencia->fetch();      
        $xd=1+(int)$ct['cant'];
               
        $sql = $this->Query("sp_biblio_iu(0,:p1,:p2,:p3,:p4,:p5)");
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':p1', $xd , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['referencia'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['identificador'] , PDO::PARAM_INT);
        $stmt->bindValue(':p4', $_P['descripcion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p5', $_P['idtipo_bibliografia'] , PDO::PARAM_INT);
        
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function update($_P ) {
        
        $sql = $this->Query("sp_biblio_iu(1,:p1,:p2,:p3,:p4,:p5)");
        $stmt = $this->db->prepare($sql);
        if($_P['idpadre']==""){$_P['idpadre']=null;}
        $stmt->bindValue(':p1', $_P['idbibliografia'], PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['referencia'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['identificador'] , PDO::PARAM_INT);
        $stmt->bindValue(':p4', $_P['descripcion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p5', $_P['idtipo_bibliografia'] , PDO::PARAM_INT); 
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function delete($p) {
        $sql = $this->Query("sp_biblio_sd(1,:p1)");
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':p1', $p, PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>
