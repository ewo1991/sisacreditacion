<?php
include_once("../lib/dbfactory.php");
class profesores extends Main{
    static $otrosql;
    function index($query,$p,$c) 
    {
        $sql = "SELECT
					profesores.CodigoProfesor,
					concat(profesores.ApellidoPaterno,' ',profesores.ApellidoMaterno)As Apellidos,
					profesores.NombreProfesor,
					profesores.EstadoProfesor,
					condicion.DescripcionCondicion,
					categoria.DescripcionCategoria,
					dedicacion.DescripcionDedicacion,
					departamentoacademico.DescripcionDepartamento
                FROM profesores
					Inner Join categoria ON  profesores.CodigoCategoria = categoria.CodigoCategoria
					Inner Join condicion ON  profesores.CodigoCondicion = condicion.CodigoCondicion 
					Inner Join departamentoacademico ON profesores.CodigoDptoAcad = departamentoacademico.CodigoDptoAcad
					Inner Join dedicacion ON profesores.CodigoDedicacion = dedicacion.CodigoDedicacion 
                WHERE ".$c." like :query ORDER BY profesores.CodigoProfesor asc";   
        
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );        
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );        
        return $data;
    }       
    function edit($id ) 
    {
        $stmt = $this->db->prepare("SELECT * FROM profesores WHERE CodigoProfesor = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function insert($_P ) {
        $sentencia=$this->db->query("SELECT MAX(CodigoProfesor) as cant from profesores");         
        $ct=$sentencia->fetch();      
        $xd=1+ (int)$ct['cant'];
        $xd=(string)$xd;
        $sql = $this->Query("sp_profesores_iu(0,:p1,:p2,:p3,:p4,:p5,:p6,:p7,:p8,:p9,:p10,:p11,:p12,:p13,:p14,:p15,:p16,:p17,:p18,:p19,:p20,:p21,:p22,:p23,:p24,:p25)");
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':p1', $xd , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['ApellidoPaterno'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['ApellidoMaterno'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['NombreProfesor'] , PDO::PARAM_STR);
        $stmt->bindValue(':p5', $_P['Direccion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p6', $_P['Email'] , PDO::PARAM_STR);
        $stmt->bindValue(':p7', $_P['RegimenPensionario'] , PDO::PARAM_STR);
		if($_P['FechaNacimiento']!=""){$stmt->bindValue(':p8', $this->en_fecha($_P['FechaNacimiento']) , PDO::PARAM_STR);}
            else {$stmt->bindValue(':p8','NULL', PDO::PARAM_NULL);}
	   if($_P['FechaIngreso']!=""){$stmt->bindValue(':p9', $this->en_fecha($_P['FechaIngreso']) , PDO::PARAM_STR);}
            else {$stmt->bindValue(':p9','NULL', PDO::PARAM_NULL);}
        $stmt->bindValue(':p10', $_P['Telefono'] , PDO::PARAM_STR);
        $stmt->bindValue(':p11', $_P['TipoDocumento'] , PDO::PARAM_STR);
        $stmt->bindValue(':p12', $_P['NumDocumento'] , PDO::PARAM_STR);   
        $stmt->bindValue(':p13', $_P['NumeroCarnetEssalud'] , PDO::PARAM_STR);
        $stmt->bindValue(':p14', $_P['CodigoDecretoLey'] , PDO::PARAM_STR);
        $stmt->bindValue(':p15', $_P['Sexo'] , PDO::PARAM_STR);
        $stmt->bindValue(':p16', $_P['EstadoCivil'] , PDO::PARAM_STR);
        $stmt->bindValue(':p17', $_P['CodigoCondicion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p18', $_P['CodigoCategoria'] , PDO::PARAM_STR);
        $stmt->bindValue(':p19', $_P['CodigoDedicacion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p20', $_P['CodigoDptoAcad'] , PDO::PARAM_STR);
        $stmt->bindValue(':p21', $_P['EstadoProfesor'] , PDO::PARAM_STR);
        $stmt->bindValue(':p22', $_P['CodProfesorSira'] , PDO::PARAM_STR);
        $stmt->bindValue(':p23', $_P['Marcador'] , PDO::PARAM_STR);
        $stmt->bindValue(':p24', $_P['Ubigeo'] , PDO::PARAM_STR);  
        $stmt->bindValue(':p25', $_P['CodigoProfesors'] , PDO::PARAM_STR);  
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function update($_P ) {
       
        $sql = $this->Query("sp_profesores_iu(1,:p1,:p2,:p3,:p4,:p5,:p6,:p7,:p8,:p9,:p10,:p11,:p12,:p13,:p14,:p15,:p16,:p17,:p18,:p19,:p20,:p21,:p22,:p23,:p24,:p25)");
        $stmt = $this->db->prepare($sql);
        if($_P['idpadre']==""){$_P['idpadre']=null;}
        $stmt->bindValue(':p1', $_P['CodigoProfesor'] , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['ApellidoPaterno'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['ApellidoMaterno'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['NombreProfesor'] , PDO::PARAM_STR);
        $stmt->bindValue(':p5', $_P['Direccion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p6', $_P['Email'] , PDO::PARAM_STR);
        $stmt->bindValue(':p7', $_P['RegimenPensionario'] , PDO::PARAM_STR);
    	$stmt->bindValue(':p8', $this->en_fecha($_P['FechaNacimiento']), PDO::PARAM_STR);
        $stmt->bindValue(':p9', $this->en_fecha($_P['FechaIngreso']), PDO::PARAM_STR);
        $stmt->bindValue(':p10', $_P['Telefono'] , PDO::PARAM_STR);
        $stmt->bindValue(':p11', $_P['TipoDocumento'] , PDO::PARAM_STR);
        $stmt->bindValue(':p12', $_P['NumDocumento'] , PDO::PARAM_STR);   
        $stmt->bindValue(':p13', $_P['NumeroCarnetEssalud'] , PDO::PARAM_STR);
        $stmt->bindValue(':p14', $_P['CodigoDecretoLey'] , PDO::PARAM_STR);
        $stmt->bindValue(':p15', $_P['Sexo'] , PDO::PARAM_STR);
        $stmt->bindValue(':p16', $_P['EstadoCivil'] , PDO::PARAM_STR);
        $stmt->bindValue(':p17', $_P['CodigoCondicion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p18', $_P['CodigoCategoria'] , PDO::PARAM_STR);
        $stmt->bindValue(':p19', $_P['CodigoDedicacion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p20', $_P['CodigoDptoAcad'] , PDO::PARAM_STR);
        $stmt->bindValue(':p21', $_P['EstadoProfesor'] , PDO::PARAM_STR);
        $stmt->bindValue(':p22', $_P['CodProfesorSira'] , PDO::PARAM_STR);
        $stmt->bindValue(':p23', $_P['Marcador'] , PDO::PARAM_STR);
        $stmt->bindValue(':p24', $_P['Ubigeo'] , PDO::PARAM_STR);  
        $stmt->bindValue(':p25', $_P['CodigoProfesorJefe'] , PDO::PARAM_STR); 
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
        return $sql;
    }
    function delete($p) {
        $stmt = $this->db->prepare("DELETE FROM profesores WHERE CodigoProfesor = :p1");
        $stmt->bindValue(':p1', $p, PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
	
	function CalculaEdad( $fecha ) {
        list($Y,$m,$d) = explode("-",$fecha);
        return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
    }

    
    
}
?>
