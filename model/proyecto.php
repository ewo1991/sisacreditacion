<?php
include_once("../lib/dbfactory.php");
class proyecto extends Main{    
    function index($query,$p,$c) 
    {
        $sql = "    SELECT
                        proyecto.idproyecto,
                        proyecto.nombre_proyecto,
                        proyecto.periodo_ejecucion,
                        proyecto.presupuesto
                        FROM
                        proyecto
                        where ".$c." like :query";         
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );        
        $data['rowspag'] = $this->getRowPag($data['total'], $p );        
        return $data;
    }
    
    
    function edit($id ) 
    {
        $stmt = $this->db->prepare("SELECT * FROM proyecto WHERE idproyecto = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function insert($_P ) {
        
        $sentencia=$this->db->query("SELECT MAX(idproyecto) as cant from proyecto");         
        $ct=$sentencia->fetch();      
        $xd=1+(int)$ct['cant'];
               
        $sql = $this->Query("sp_proyec_iu(0,:p1,:p2,:p3,:p4,:p5,:p6,:p7,:p8,:p9,:p10,:p11,:p12,:p13,:p14,:p15,:p16,:p17,:p18,:p19,:p20,:p21,:p22,:p23,:p24,:p25,:p26,:p27,:p28,:p29,:p30,:p31,:p32,:p33,:p34)");
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':p1', $xd , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['nombre_proyecto'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['periodo_ejecucion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['idtipo_proyecto'] , PDO::PARAM_INT);
        $stmt->bindValue(':p5', $_P['distrito'] , PDO::PARAM_INT);
        $stmt->bindValue(':p6', $_P['idlinea_investigacion'] , PDO::PARAM_INT);
        $stmt->bindValue(':p7', $_P['antecedentes_problema'] , PDO::PARAM_STR);
        $stmt->bindValue(':p8', $_P['definicion_problema'] , PDO::PARAM_STR);
        $stmt->bindValue(':p9', $_P['formulacion_problema'] , PDO::PARAM_STR);
        $stmt->bindValue(':p10', $_P['justificacion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p11', $_P['importancia'] , PDO::PARAM_STR);
        $stmt->bindValue(':p12', $_P['limitaciones'] , PDO::PARAM_STR);
        $stmt->bindValue(':p13', $_P['objetivo_general'] , PDO::PARAM_STR);
        $stmt->bindValue(':p14', $_P['antecedentes_investigacion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p15', $_P['definicion_terminos'] , PDO::PARAM_STR);
        $stmt->bindValue(':p16', $_P['bases_teoricas'] , PDO::PARAM_STR);
        $stmt->bindValue(':p17', $_P['hipotesis'] , PDO::PARAM_STR);
        $stmt->bindValue(':p18', $_P['sistema_variables'] , PDO::PARAM_STR);
        $stmt->bindValue(':p19', $_P['escala_medicion'] , PDO::PARAM_INT);
        $stmt->bindValue(':p20', $_P['tipo_investigacion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p21', $_P['nivel_investigacion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p22', $_P['disenio_investigacion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p23', $_P['cobertura_investigacion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p24', $_P['fuente_investigacion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p25', $_P['tecnicas_investigacion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p26', $_P['instrumentos_invesitgacion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p27', $_P['presentacion_datos'] , PDO::PARAM_STR);
        $stmt->bindValue(':p28', $_P['analisis_datos'], PDO::PARAM_STR);
        $stmt->bindValue(':p29', $_P['interpretacion_datos'] , PDO::PARAM_STR);
        $stmt->bindValue(':p30', $_P['presupuesto'] , PDO::PARAM_INT);
        $stmt->bindValue(':p31', $_P['asignacion_recursos'] , PDO::PARAM_STR);
        $stmt->bindValue(':p32', $_P['financiamiento'] , PDO::PARAM_INT);
        $stmt->bindValue(':p33', $_P['CodigoEscuela'] , PDO::PARAM_INT);
        $stmt->bindValue(':p34', 1, PDO::PARAM_INT);

        
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
        
    }
    function insert_ob_esp($_P ) {
        
        $sentencia=$this->db->query("SELECT MAX(idobjetivo_proyecto) as cant from objetivo_proyecto");         
        $ct=$sentencia->fetch();      
        $xd=1+(int)$ct['cant'];
        
        $sentencia1=$this->db->query("SELECT MAX(idproyecto) as cant from proyecto");         
        $ct1=$sentencia1->fetch();      
        $xd1=(int)$ct1['cant'];
        
           
        $sql = $this->Query("sp_objproyec_iu(0,:p1,:p2,:p3)");
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':p1', $xd , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $xd1 , PDO::PARAM_INT);
        
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
         return array($p1 , $p2[2]); 
       
    }
    function insert_det_proy_prof_fun($_P ) {
        
        
        $sentencia1=$this->db->query("SELECT MAX(idproyecto) as cant from proyecto");         
        $ct1=$sentencia1->fetch();      
        $xd1=(int)$ct1['cant'];
        
           
        $sql = $this->Query("sp_det_prof_insert(:p1,:p2,:p3)");
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':p1', $_SESSION['idusuario'] , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $xd1 , PDO::PARAM_STR);
        $stmt->bindValue(':p3', 2 , PDO::PARAM_INT);
        
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
         return array($p1 , $p2[2]); 
       
    }
    
    
//    function update_ob_esp($_P ) {
//        
//        $sql = $this->Query("sp_objproyec_iu(1,:p1,:p2,:p3)");
//        $stmt = $this->db->prepare($sql);
//        if($_P['idpadre']==""){$_P['idpadre']=null;}
////        El idobjetivo_proyecto no me trae del form
//        $stmt->bindValue(':p1', $xd , PDO::PARAM_INT);
//        $stmt->bindValue(':p2', $_P , PDO::PARAM_STR);
//        $stmt->bindValue(':p3', $_P['idproyecto'] , PDO::PARAM_INT);
//        
//        $p1 = $stmt->execute();
//        $p2 = $stmt->errorInfo();
//         return array($p1 , $p2[2]); 
//       
//        
//        
//    }
    function update($_P ) {
        
        $sql = $this->Query("sp_proyec_iu(1,:p1,:p2,:p3,:p4,:p5,:p6,:p7,:p8,:p9,:p10,:p11,:p12,:p13,:p14,:p15,:p16,:p17,:p18,:p19,:p20,:p21,:p22,:p23,:p24,:p25,:p26,:p27,:p28,:p29,:p30,:p31,:p32,:p33,:p34))");
        $stmt = $this->db->prepare($sql);
        if($_P['idpadre']==""){$_P['idpadre']=null;}
        $stmt->bindValue(':p1', $_P['idproyecto'] , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['nombre_proyecto'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['periodo_ejecucion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['idtipo_proyecto'] , PDO::PARAM_INT);
        $stmt->bindValue(':p5', $_P['distrito'] , PDO::PARAM_INT);
        $stmt->bindValue(':p6', $_P['idlinea_investigacion'] , PDO::PARAM_INT);
        $stmt->bindValue(':p7', $_P['antecedentes_problema'] , PDO::PARAM_STR);
        $stmt->bindValue(':p8', $_P['definicion_problema'] , PDO::PARAM_STR);
        $stmt->bindValue(':p9', $_P['formulacion_problema'] , PDO::PARAM_STR);
        $stmt->bindValue(':p10', $_P['justificacion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p11', $_P['importancia'] , PDO::PARAM_STR);
        $stmt->bindValue(':p12', $_P['limitaciones'] , PDO::PARAM_STR);
        $stmt->bindValue(':p13', $_P['objetivo_general'] , PDO::PARAM_STR);
        $stmt->bindValue(':p14', $_P['antecedentes_investigacion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p15', $_P['definicion_terminos'] , PDO::PARAM_STR);
        $stmt->bindValue(':p16', $_P['bases_teoricas'] , PDO::PARAM_STR);
        $stmt->bindValue(':p17', $_P['hipotesis'] , PDO::PARAM_STR);
        $stmt->bindValue(':p18', $_P['sistema_variables'] , PDO::PARAM_STR);
        $stmt->bindValue(':p19', $_P['escala_medicion'] , PDO::PARAM_INT);
        $stmt->bindValue(':p20', $_P['tipo_investigacion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p21', $_P['nivel_investigacion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p22', $_P['disenio_investigacion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p23', $_P['cobertura_investigacion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p24', $_P['fuente_investigacion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p25', $_P['tecnicas_investigacion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p26', $_P['instrumentos_invesitgacion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p27', $_P['presentacion_datos'] , PDO::PARAM_STR);
        $stmt->bindValue(':p28', $_P['analisis_datos'], PDO::PARAM_STR);
        $stmt->bindValue(':p29', $_P['interpretacion_datos'] , PDO::PARAM_STR);
        $stmt->bindValue(':p30', $_P['presupuesto'] , PDO::PARAM_INT);
        $stmt->bindValue(':p31', $_P['asignacion_recursos'] , PDO::PARAM_STR);
        $stmt->bindValue(':p32', $_P['financiamiento'] , PDO::PARAM_INT);
        $stmt->bindValue(':p33', $_P['CodigoEscuela'] , PDO::PARAM_INT);

        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function delete($p) { 	
        $stmt1 = $this->db->prepare("DELETE FROM objetivo_proyecto WHERE idproyecto = :p1");
        $stmt1->bindValue(':p1', $p, PDO::PARAM_INT);
        $p1 = $stmt1->execute();
        $p2 = $stmt1->errorInfo();
        
        $stmt = $this->db->prepare("DELETE FROM proyecto WHERE idproyecto = :p1");
        $stmt->bindValue(':p1', $p, PDO::PARAM_INT);
        $p3 = $stmt->execute();
        $p4 = $stmt->errorInfo();
        return array($p1 , $p2[2], $p3 , $p4[2]);
    }
}
?>
