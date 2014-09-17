<?php
include_once("../lib/dbfactory.php");
class cursos extends Main{    
    function index($query,$p,$c) 
    {
        $sql = "SELECT
                cursos.CodigoCurso,
                cursos.DescripcionCurso,
                cursos.Ciclo,
                cursos.Creditos,
                escuelaprofesional.DescripcionEscuela,
                facultades.DescripcionFacultad,
                facultades.CodFacultadSira,
                facultades.EstadoFacultad,
                facultades.Decano,
                plancurricular.DescripcionPlan          
                
                FROM
                sisacreditacion.cursos
                Inner Join sisacreditacion.plancurricular ON sisacreditacion.cursos.CodigoPlan = sisacreditacion.plancurricular.CodigoPlan
                Inner Join sisacreditacion.escuelaprofesional ON sisacreditacion.cursos.CodigoEscuela = sisacreditacion.escuelaprofesional.CodigoEscuela
                Inner Join sisacreditacion.facultades ON sisacreditacion.cursos.CodigoFacultad = sisacreditacion.facultades.CodigoFacultad

                where ".$c." like :query";         
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );        
        $data['rowspag'] = $this->getRowPag($data['total'], $p );        
        return $data;
    }       
    function edit($id ) 
    {
        $stmt = $this->db->prepare("SELECT * FROM cursos WHERE CodigoCurso = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function insert($_P ) {
        $sentencia=$this->db->query("SELECT MAX(CodigoCurso) as cant from cursos");         
        $ct=$sentencia->fetch();      
        $xd=1+(int)$ct['cant'];
        $sql = $this->Query("sp_cursos_iu(0,:p1,:p2,:p3,:p4,:p5,:p6,:p7,:p8,:p9,:p10,:p11,:p12,:p13,:p14,:p15,:p16,:p17,:p18,:p19)");
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':p1', $xd , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['CodigoPlan'] , PDO::PARAM_INT);
        $stmt->bindValue(':p3', $_P['CodigoEscuela'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['CodigoFacultad'] , PDO::PARAM_STR);
        $stmt->bindValue(':p5', $_P['DescripcionCurso'] , PDO::PARAM_STR);
        $stmt->bindValue(':p6', $_P['Creditos'] , PDO::PARAM_STR);
        $stmt->bindValue(':p7', $_P['TipoCurso'] , PDO::PARAM_STR);
        $stmt->bindValue(':p8', $_P['Ciclo'] , PDO::PARAM_STR);
        $stmt->bindValue(':p9', $_P['CodCursoSira'] , PDO::PARAM_STR);
        $stmt->bindValue(':p10', $_P['OrdenSegunPlan'] , PDO::PARAM_STR);
        $stmt->bindValue(':p11', $_P['EstadoCursoPlan'] , PDO::PARAM_STR);
        $stmt->bindValue(':p12', $_P['RequisitoCreditos'] , PDO::PARAM_STR);
        $stmt->bindValue(':p13', $_P['OrdenSegunPlanAlterno'] , PDO::PARAM_STR);
        $stmt->bindValue(':p14', $_P['DescripcionCursoIngles'] , PDO::PARAM_STR);
        $stmt->bindValue(':p15', $_P['CodigoEspecialidad'] , PDO::PARAM_STR);
        $stmt->bindValue(':p16', $_P['CodigoAreaCurricular'] , PDO::PARAM_STR);
        $stmt->bindValue(':p17', $_P['HorasTeoria'] , PDO::PARAM_STR);
        $stmt->bindValue(':p18', $_P['HorasPractica'] , PDO::PARAM_STR);
        $stmt->bindValue(':p19', $_P['RequisitoCertificado'] , PDO::PARAM_STR);
        
      
        
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function update($_P ) {
        
        $sql = $this->Query("sp_cursos_iu(1,:p1,:p2,:p3,:p4,:p5,:p6,:p7,:p8,:p9,:p10,:p11,:p12,:p13,:p14,:p15,:p16,:p17,:p18,:p19)");
        $stmt = $this->db->prepare($sql);
        if($_P['idpadre']==""){$_P['idpadre']=null;}
        
        $stmt->bindValue(':p1', $_P['CodigoCurso']  , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['CodigoPlan'] ,  PDO::PARAM_INT);
        $stmt->bindValue(':p3', $_P['CodigoEscuela'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['CodigoFacultad'] , PDO::PARAM_STR);
        $stmt->bindValue(':p5', $_P['DescripcionCurso'] , PDO::PARAM_STR);
        $stmt->bindValue(':p6', $_P['Creditos'] , PDO::PARAM_STR);
        $stmt->bindValue(':p7', $_P['TipoCurso'] , PDO::PARAM_STR);
        $stmt->bindValue(':p8', $_P['Ciclo'], PDO::PARAM_STR);
        $stmt->bindValue(':p9', $_P['CodCursoSira'] , PDO::PARAM_STR);
        $stmt->bindValue(':p10', $_P['OrdenSegunPlan'] , PDO::PARAM_STR);
        $stmt->bindValue(':p11', $_P['EstadoCursoPlan'] , PDO::PARAM_STR);
        $stmt->bindValue(':p12', $_P['RequisitoCreditos'] , PDO::PARAM_STR);
        $stmt->bindValue(':p13', $_P['OrdenSegunPlanAlterno'] , PDO::PARAM_STR);
        $stmt->bindValue(':p14', $_P['DescripcionCursoIngles'] , PDO::PARAM_STR);
        $stmt->bindValue(':p15', $_P['CodigoEspecialidad'] , PDO::PARAM_STR);
        $stmt->bindValue(':p16', $_P['CodigoAreaCurricular'] , PDO::PARAM_STR);
        $stmt->bindValue(':p17', $_P['HorasTeoria'] , PDO::PARAM_STR);
        $stmt->bindValue(':p18', $_P['HorasPractica'] , PDO::PARAM_STR);
        $stmt->bindValue(':p19', $_P['RequisitoCertificado'] , PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function delete($p) {
        $stmt = $this->db->prepare("DELETE FROM cursos WHERE CodigoCurso = :p1");
        $stmt->bindValue(':p1', $p, PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]); 
    }
}
?>

