<?php
include_once("../lib/dbfactory.php");
class silabus extends Main{    
    function index($query,$p,$c) 
    {
        $sql = "SELECT
                silabus.idsilabus,
                carga_academica.idcargaacademica,
                silabus.sumilla,
                silabus.metodologia,
                CONCAT(trim(profesores.NombreProfesor),' ',trim(profesores.ApellidoPaterno),' ',trim(profesores.ApellidoMaterno)),
                cursos.DescripcionCurso,
                silabus.fecha_inicio,
                silabus.duracion,
                semestreacademico.Descripcion
                FROM
                silabus
                Inner Join carga_academica ON carga_academica.idcargaacademica = silabus.idcargaacademica
                Inner Join profesores ON carga_academica.CodigoProfesor = profesores.CodigoProfesor
                Inner Join cursos ON carga_academica.CodigoCurso = cursos.CodigoCurso
                Inner Join semestreacademico ON semestreacademico.CodigoSemestre = carga_academica.CodigoSemestre
                where ".$c." like :query";         
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );        
        $data['rowspag'] = $this->getRowPag($data['total'], $p );        
        return $data;
    } 
    
    function edit($id ) 
    {
        $stmt = $this->db->prepare("SELECT * FROM silabus WHERE idsilabus = :id");
        $stmt->bindValue(':id', $id ,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject();
        
        $sql = $this->Query("mostrar_carga_academica_poridsilabus(:id)");
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':p1', $id , PDO::PARAM_INT);
        $p1 = $stmt->execute();
       
    }
    function insert($_P ) {
        $sentencia=$this->db->query("SELECT MAX(idsilabus) as cant from silabus");         
        $ct=$sentencia->fetch();      
        $xd=1+(int)$ct['cant'];
        $sql = $this->Query("sp_sila_iu(0,:p1,:p2,:p3,:p4,:p5,:p6,:p7,:p8,:p9)");
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':p1', $xd , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['idcargaacademica'] , PDO::PARAM_INT);
        $stmt->bindValue(':p3', $_P['sumilla'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['metodologia'] , PDO::PARAM_STR);
        $stmt->bindValue(':p5', $_P['competencia'] , PDO::PARAM_STR);
        $stmt->bindValue(':p6', $_P['fecha_inicio'] , PDO::PARAM_STR);
        $stmt->bindValue(':p7', $_P['fecha_termino'] , PDO::PARAM_STR);
        $stmt->bindValue(':p8', $_P['duracion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p9', $_P['objetivo'] , PDO::PARAM_STR);
      
        
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function update($_P ) {
        
        $sql = $this->Query("sp_sila_iu(1,:p1,:p2,:p3,:p4,:p5,:p6,:p7,:p8,:p9)");
        $stmt = $this->db->prepare($sql);
        if($_P['idpadre']==""){$_P['idpadre']=null;}
        
        $stmt->bindValue(':p1', $_P['idsilabus']  , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['idcargaacademica'] , PDO::PARAM_INT);
        $stmt->bindValue(':p3', $_P['sumilla'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['metodologia'] , PDO::PARAM_STR);
        $stmt->bindValue(':p5', $_P['competencia'] , PDO::PARAM_STR);
        $stmt->bindValue(':p6', $_P['fecha_inicio'] , PDO::PARAM_STR);
        $stmt->bindValue(':p7', $_P['fecha_termino'] , PDO::PARAM_STR);
        $stmt->bindValue(':p8', $_P['duracion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p9', $_P['objetivo'] , PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function delete($p) {
        $stmt = $this->db->prepare("DELETE FROM silabus WHERE idsilabus = :p1");
        $stmt->bindValue(':p1', $p, PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]); 
    }
}
?>
