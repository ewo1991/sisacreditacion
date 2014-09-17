<?php
include_once("../lib/dbfactory.php");
class notasproyecto extends Main{   
    
    public $opt;
    function index($query,$p,$c) {        
        $sql = "SELECT
                    idconcepto,
                    nota,
                    idproyecto,
                    CodigoAlumno,
                    CodigoSemestre
                    FROM
                    detalle_concepto_detproyecto
                where ".$c." like :query";         
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] = $this->getRow($sql, $param , $p );        
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );        
        return $data;
    }
    function alumnos_asignados($query,$p,$CodigoAlumno,$idproyecto,$NombreAlumno) 
    {       
        
            $sql = "   SELECT
                        alumnos.CodigoAlumno,
                        alumnos.NombreAlumno,
                        concat(alumnos.ApellidoPaterno,' ',alumnos.ApellidoMaterno) AS Apellidos,
                        concat(alumnos.TipoDocumento,' ',alumnos.NumDocumento) AS Documento,
                        alumnos.FechaIngreso,
                        alumnos.CodAlumnoSira
                        FROM
                        detalle_asignacion_tutoria
                        Inner Join profesores ON detalle_asignacion_tutoria.CodigoProfesor = profesores.CodigoProfesor
                        Inner Join alumnos ON detalle_asignacion_tutoria.CodigoAlumno = alumnos.CodigoAlumno
                        Inner Join semestreacademico ON detalle_asignacion_tutoria.CodigoSemestre = semestreacademico.CodigoSemestre
                        where detalle_asignacion_tutoria.CodigoProfesor=".$CodigoProfesor." and  detalle_asignacion_tutoria.CodigoSemestre=".$CodigoSemestre."
                       ";
        
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );        
        $data['rowspag'] = $this->getRowPag($data['total'], $p );        
        return $data;
    }
    function edit($id ) {
        $stmt = $this->db->prepare("SELECT * FROM detalle_concepto_detproyecto WHERE idproyecto = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    
    function insert($_P ) {echo "<script>alert('Las notas del alumno se enviaron exitosamente');window.close();</script>";
        
        
        
        $sql2 = $this->Query("sp_det_concep_detproy_iu(0,:p1,:p2,:p3,:p4,:p5)");     
        $stmt2 = $this->db->prepare($sql2);
//        try{
//            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//            $this->db->beginTransaction();
//            for($i=1;$i<=$_P['contador'];$i++){
//                $query="INSERT INTO detalle_concepto_detproyecto(idconcepto,nota,idproyecto,CodigoAlumno,CodigoSemestre)
//                        VALUES (".$i.",".$_P['nota'.$i].",".$_P['idproy'].",'".$_P['codalum']."','20132')";
//                mysql_query($query);
//                $stmt2 = $this->db->prepare($query);    $fecha=date("Y-m-d");
//      
//            }
            
            $semestre="20132";    $estado = false; 
               for ($i=0;$i<=$_P['contador'];$i++){
                   
              $stmt2->bindValue(':p1', ($i+1) , PDO::PARAM_STR);
              $stmt2->bindValue(':p2', $_P["nota$i"], PDO::PARAM_STR);
              $stmt2->bindValue(':p3', $_P['idproy'] , PDO::PARAM_STR);       
              $stmt2->bindValue(':p4', $_P['codalum'] , PDO::PARAM_STR); 
              $stmt2->bindValue(':p5', $semestre, PDO::PARAM_STR); 
              $stmt2->execute();          
               }
            
            $this->db->commit();            
            $p1 = true;
            $p2[2] = "";     
            
            
//        }catch(PDOException $e) 
//        {
//            $this->db->rollBack();
//            $p1 = false;
//            $p2[2] = $e->getMessage();           
//        }
        
        return array($p1 , $p2[2]);
        
        
    }        
        
    
    
    
    
    function update($_P ) {
        
        $sql = $this->Query("sp_det_concep_detproy_iu(0,:p1,:p2,:p3,:p4,:p5)");
        $stmt = $this->db->prepare($sql);
        
        if($_P['idpadre']==""){$_P['idpadre']=null;}
        $stmt->bindValue(':p1', $_P['idconcepto'] , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['nota'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['idproyecto'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['CodigoAlumno'] , PDO::PARAM_STR);
        $stmt->bindValue(':p5', $_P['CodigoSemestre'] , PDO::PARAM_STR);
       
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function delete($p) {
        $stmt = $this->db->prepare("DELETE FROM detalle_concepto_detproyecto WHERE idproyecto = :p1");
        $stmt->bindValue(':p1', $p, PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>