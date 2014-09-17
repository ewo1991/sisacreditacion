<?php

include_once("../lib/dbfactory.php");

class asistenciaalumno extends Main {

    function index($query, $p, $c,$semestre_ultimo,$cod_profesor) {
        $sql = "        SELECT
                        evento.idevento,
                        evento.tema,
                        tipo_evento.descripcion,
                        evento.fecha,
                        evento.CodigoProfesor
                        FROM
                        evento
                        Inner Join tipo_evento ON tipo_evento.idtipo_evento = evento.idtipo_evento
                        where  evento.CodigoSemestre='".$semestre_ultimo."'and evento.CodigoProfesor is null or evento.CodigoProfesor=".$cod_profesor."
                        and " . $c . " like :query";
        $param = array(array('key' => ':query', 'value' => "%$query%", 'type' => 'STR'));
        $data['total'] = $this->getTotal($sql, $param);
        $data['rows'] = $this->getRow($sql, $param, $p);
        $data['rowspag'] = $this->getRowPag($data['total'], $p);
        return $data;
    }
    

    function insert($_P) {
        $sql2 = $this->Query("sp_detalle_asistencia_alumno_tutoria_iu(0,:p1,:p2,:p3,:p4,:p5,:p6)");     
        $stmt2 = $this->db->prepare($sql2);
        $CodigoProfesor= $_SESSION['idusuario'];$fecha=date("Y-m-d");$idevento=$_P['idevento'];
        try{
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->beginTransaction();
            $estado = false;
            foreach($_P['codigo_primera_columna'] as $key => $r) 
            {   
                $stmt2->bindValue(':p1', $CodigoProfesor , PDO::PARAM_STR);
                $stmt2->bindValue(':p2', $_P['codigo_primera_columna'][$key] , PDO::PARAM_STR);
                $stmt2->bindValue(':p3', $idevento , PDO::PARAM_STR);          
                $stmt2->bindValue(':p4', $fecha, PDO::PARAM_STR); 
                $stmt2->bindValue(':p5', $_P['chek'][$key+1], PDO::PARAM_STR); 
                $stmt2->bindValue(':p6', "holis", PDO::PARAM_STR); 
                
             
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
        
        $sql2 = $this->Query("sp_detalle_asistencia_alumno_tutoria_iu(1,:p1,:p2,:p3,:p4,:p5,:p6)");     
        $stmt2 = $this->db->prepare($sql2);
        $CodigoProfesor= $_SESSION['idusuario'];$fecha=date("Y-m-d");$idevento=$_P['idevento'];
        try{
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->beginTransaction();
            $estado = false;
            foreach($_P['codigo_primera_columna'] as $key => $r) 
            { 
                $stmt2->bindValue(':p1', $CodigoProfesor , PDO::PARAM_STR);
                $stmt2->bindValue(':p2', $_P['codigo_primera_columna'][$key] , PDO::PARAM_STR);
                $stmt2->bindValue(':p3', $idevento , PDO::PARAM_STR);          
                $stmt2->bindValue(':p4', $fecha, PDO::PARAM_STR); 
                $stmt2->bindValue(':p5', $_P['chek'][$key+1], PDO::PARAM_STR); 
                $stmt2->bindValue(':p6', "holis", PDO::PARAM_STR); 
                
             
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
