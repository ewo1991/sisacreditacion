<?php

include_once("../lib/dbfactory.php");

class asistenciadocente extends Main {

    function index($query, $p, $c,$semestre_ultimo) {
        $sql = "        SELECT
                        evento.idevento,
                        evento.tema,
                        tipo_evento.descripcion,
                        evento.fecha
                        FROM
                        tipo_evento
                        Inner Join evento ON evento.idevento = tipo_evento.idtipo_evento
                        where    evento.CodigoSemestre='".$semestre_ultimo."'and " . $c . " like :query";
        $param = array(array('key' => ':query', 'value' => "%$query%", 'type' => 'STR'));
        $data['total'] = $this->getTotal($sql, $param);
        $data['rows'] = $this->getRow($sql, $param, $p);
        $data['rowspag'] = $this->getRowPag($data['total'], $p);
        return $data;
    }
     function mostrar_Facultad_idUsusario($idusuario){
       
        $facultad=$this->db->query("SELECT
        profesores.CodigoDptoAcad as depfac
        FROM
        profesores
        where profesores.CodigoProfesor='".$idusuario."'");         
        $ct=$facultad->fetch();      
        $facultad=$ct['depfac'];return $facultad;
    } 
     function docentes_asignados($query,$p,$idfacultad,$sem,$idevento) 
    {       
            $sql = "  select    DISTINCT

                        profesores.CodigoProfesor,
                        concat(profesores.NombreProfesor,' ',profesores.ApellidoPaterno,' ',profesores.ApellidoMaterno) as Docente,
			profesores.sexo,
			profesores.FechaIngreso,
                         profesores.CodigoDptoAcad,
			case when( detalle_asistencia_docente_tutoria.asistencia_docente =1 and detalle_asistencia_docente_tutoria.idevento=".$idevento."  ) then 'Asistio' else 'Falta' end Asistencias,
			detalle_asistencia_docente_tutoria.idevento
                        FROM
                        detalle_matricula
                        Inner Join semestreacademico ON detalle_matricula.CodigoSemestre = semestreacademico.CodigoSemestre
                        Inner Join profesores ON profesores.CodigoProfesor = detalle_matricula.CodigoProfesor
                        Left Join detalle_asistencia_docente_tutoria ON detalle_asistencia_docente_tutoria.CodigoProfesor = profesores.CodigoProfesor and detalle_asistencia_docente_tutoria.idevento=".$idevento."
                        Inner Join departamentoacademico ON profesores.CodigoDptoAcad = departamentoacademico.CodigoDptoAcad
                        where
                        departamentoacademico.CodigoDptoAcad='".$idfacultad."' and semestreacademico.CodigoSemestre= '".$sem."'
                       ";
        
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );        
        $data['rowspag'] = $this->getRowPag($data['total'], $p );        
        return $data;
    }
    function devolver_asistencias($query,$p,$idevento){ 
        $sql="SELECT
            detalle_asistencia_docente_tutoria.asistencia_docente,
            detalle_asistencia_docente_tutoria.CodigoProfesor,
            detalle_asistencia_docente_tutoria.fecha
            FROM
            detalle_asistencia_docente_tutoria
            WHERE detalle_asistencia_docente_tutoria.idevento= '".$idevento."'";
            
         $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );        
        $data['rowspag'] = $this->getRowPag($data['total'], $p );        
        return $data;
    }
    function insert($_P) {
        $sql2 = $this->Query("sp_detalle_asistencia_docente_tutoria_iu(0,:p1,:p2,:p3,:p4)");     
        $stmt2 = $this->db->prepare($sql2);
       $fecha=date("Y-m-d");$idevento=$_P['idevento'];
        try{
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->beginTransaction();
            $estado = false;$n=0;
            foreach($_P['codigo_primera_columna'] as $key => $r) 
            {    $n=$n+1;
                $stmt2->bindValue(':p1', $_P['codigo_primera_columna'][$key] , PDO::PARAM_STR);
                $stmt2->bindValue(':p2', $idevento , PDO::PARAM_STR);          
                $stmt2->bindValue(':p3', $fecha, PDO::PARAM_STR); 
                $stmt2->bindValue(':p4', $_P['chek'][$key+1], PDO::PARAM_STR); 
//                echo  $_P['codigo_primera_columna'][$key]."/".$idevento."/".$fecha."/".$_P['chek'][$key+1]; exit;
               
                $stmt2->execute();          
            }  
            
            $this->db->commit();            
            $p1 = true;
            $p2[2] = "";     
            
        }
        catch(PDOException $e) 
        {
            $this->db->rollBack();
            $p1 = false;
            $p2[2] = $e->getMessage();           
        }
        
        return array($p1 , $p2[2]);
        
    }
  function update($_P) {
        
        $sql2 = $this->Query("sp_detalle_asistencia_docente_tutoria_iu(1,:p1,:p2,:p3,:p4)");     
        $stmt2 = $this->db->prepare($sql2);
        $fecha=date("Y-m-d");$idevento=$_P['idevento'];
        try{
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->beginTransaction();
            $estado = false;$n=0;
            foreach($_P['codigo_primera_columna'] as $key => $r) 
            {    $n=$n+1;
                $stmt2->bindValue(':p1', $_P['codigo_primera_columna'][$key] , PDO::PARAM_STR);
                $stmt2->bindValue(':p2', $idevento , PDO::PARAM_STR);          
                $stmt2->bindValue(':p3', $fecha, PDO::PARAM_STR); 
                $stmt2->bindValue(':p4', $_P['chek'][$key+1], PDO::PARAM_STR); 
//                echo  $_P['codigo_primera_columna'][$key]."/".$idevento."/".$fecha."/".$_P['chek'][$key+1]; exit;
               
                $stmt2->execute();          
            }  
            
            $this->db->commit();            
            $p1 = true;
            $p2[2] = "";     
            
        }
        catch(PDOException $e) 
        {
            $this->db->rollBack();
            $p1 = false;
            $p2[2] = $e->getMessage();           
        }
        
        return array($p1 , $p2[2]);
        
    }



}

?>
