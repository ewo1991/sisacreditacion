<?php
include_once("../lib/dbfactory.php");
class solicitaproyectos extends Main{    
    function index($query,$p,$c) 
    {       
        
            $sql = "   SELECT 
                        proyecto.nombre_proyecto,
                        proyecto.periodo_ejecucion,
                        CONCAT(profesores.ApellidoPaterno,' ',profesores.ApellidoMaterno,' ',profesores.NombreProfesor) AS Responsable,
                        estado_proyecto.descripcion,
                        MAX(DISTINCT(control_proyecto.fecha)) as Fecha_Inicio
                        FROM
                        proyecto
                        INNER JOIN detalle_profesor_proy_fun ON proyecto.idproyecto = detalle_profesor_proy_fun.idproyecto
                        INNER JOIN profesores ON profesores.CodigoProfesor = detalle_profesor_proy_fun.CodigoProfesor
                        INNER JOIN control_proyecto ON proyecto.idproyecto = control_proyecto.idproyecto
                        INNER JOIN estado_proyecto ON control_proyecto.idestado_proyecto = estado_proyecto.idestado_proyecto
                        where detalle_profesor_proy_fun.idfuncion=2 AND ((proyecto.nombre_proyecto LIKE'%a%')or (proyecto.tema_proyecto LIKE'%a%')or (profesores.NombreProfesor 

                        LIKE'%a%') or (profesores.ApellidoPaterno LIKE'%a%') or (profesores.ApellidoMaterno LIKE'%a%'))
                        GROUP BY proyecto.idproyecto";
     
        
        
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ),
                        array('key'=>':query1' , 'value'=>"%$query1%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );        
        $data['rowspag'] = $this->getRowPag($data['total'], $p );        
        return $data;
    }
    
    function insert($_P ) {                 
        $sql2 = $this->Query("sp_det_proy_alum_iu(0,:p1,:p2,:p3,:p4,:p5,:p6)");     
        $stmt2 = $this->db->prepare($sql2);
        $fecha=date("Y-m-d");
        $estado=0;            
        $semestre="20132";    
              
              $stmt2->bindValue(':p1', $_P["idproyecto"] , PDO::PARAM_STR);
              $stmt2->bindValue(':p2', $fecha, PDO::PARAM_STR);
              $stmt2->bindValue(':p3', $estado , PDO::PARAM_STR);       
              $stmt2->bindValue(':p4', $_P['idalumno'] , PDO::PARAM_STR); 
              $stmt2->bindValue(':p5', $semestre, PDO::PARAM_STR);               
              $stmt2->bindValue(':p6', $_P['mensaje'], PDO::PARAM_STR);
              $stmt2->execute();          
               
            
            $this->db->commit();            
            $p1 = true;
            $p2[2] = "";     
                            
        return array($p1 , $p2[2]);
    }
    
    
    
}
?>