<?php
include_once("../lib/dbfactory.php");
class prueba extends Main{    
    function index($query,$p,$c) 
    {
        $sql = "    SELECT
                        alumnos.CodigoAlumno,
                        alumnos.NombreAlumno,
                        concat(alumnos.ApellidoPaterno,' ',alumnos.ApellidoMaterno) AS Apellidos,
                        concat(alumnos.TipoDocumento,' ',alumnos.NumDocumento) as Documento,
                        alumnos.FechaIngreso,
                        alumnos.CodAlumnoSira
                        FROM
                        alumnos
                        where ".$c." like :query";         
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );        
        $data['rowspag'] = $this->getRowPag($data['total'], $p );        
        return $data;
    }
    
    
    function edit($id ) 
    {
        $stmt = $this->db->prepare("SELECT * FROM alumnos WHERE CodigoAlumno = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function insert($_P ) {
        
        $sentencia=$this->db->query("SELECT MAX(CodigoAlumno) as cant from alumnos");         
        $ct=$sentencia->fetch();      
        $xd=1+(int)$ct['cant'];
               
        $sql = $this->Query("sp_alum_iu(0,:p1,:p2,:p3,:p4,:p5,:p6,:p7,:p8,:p9,:p10,:p11,:p12,:p13,:p14,:p15,:p16,:p17,:p18,:p19,:p20,:p21,:p22,:p23,:p24,:p25)");
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':p1', $xd , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['ApellidoPaterno'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['ApellidoMaterno'] , PDO::PARAM_INT);
        $stmt->bindValue(':p4', $_P['NombreAlumno'] , PDO::PARAM_STR);
        $stmt->bindValue(':p5', $_P['Direccion'] , PDO::PARAM_INT);
        $stmt->bindValue(':p6', $_P['Email'] , PDO::PARAM_STR);
        $stmt->bindValue(':p7', $_P['FechaNacimiento'] , PDO::PARAM_INT);
        $stmt->bindValue(':p8', $_P['Telefono'] , PDO::PARAM_STR);
        $stmt->bindValue(':p9', $_P['TipoDocumento'] , PDO::PARAM_STR);
        $stmt->bindValue(':p10', $_P['NumDocumento'] , PDO::PARAM_STR);
        $stmt->bindValue(':p11', $_P['FechaIngreso'] , PDO::PARAM_INT);
        $stmt->bindValue(':p12', $_P['GrupoSangre'] , PDO::PARAM_STR);
        $stmt->bindValue(':p13', $_P['provincia'] , PDO::PARAM_INT);
        $stmt->bindValue(':p14', $_P['Sexo'] , PDO::PARAM_STR);
        $stmt->bindValue(':p15', $_P['EstadoCivil'] , PDO::PARAM_INT);
        $stmt->bindValue(':p16', $_P['HijoTrabajador'] , PDO::PARAM_STR);
        $stmt->bindValue(':p17', $_P['CodigoTipoColegio'] , PDO::PARAM_INT);
        $stmt->bindValue(':p18', $_P['CodigoRegimen'] , PDO::PARAM_STR);
        $stmt->bindValue(':p19', $_P['CodigoModalidad'] , PDO::PARAM_INT);
        $stmt->bindValue(':p20', $_P['CodigoTipoIngreso'] , PDO::PARAM_STR);
        $stmt->bindValue(':p21', $_P['CodigoEstadoSituacional'] , PDO::PARAM_INT);
        $stmt->bindValue(':p22', $_P['EstadoAlumno'] , PDO::PARAM_STR);
        $stmt->bindValue(':p23', $_P['CodAlumnoSira'] , PDO::PARAM_INT);
        $stmt->bindValue(':p24', $_P['CodigoSemestreIngreso'] , PDO::PARAM_STR);
        $stmt->bindValue(':p25', $_P['FechaEgreso'] , PDO::PARAM_INT);
        $stmt->bindValue(':p26', $_P['CodigoSemestreEgreso'] , PDO::PARAM_INT);
        $stmt->bindValue(':p27', $_P['CodigoSedeEscuela'] , PDO::PARAM_INT);
        $stmt->bindValue(':p28', $_P['Foto'] , PDO::PARAM_INT);
        $stmt->bindValue(':p29', $_P['Puesto'] , PDO::PARAM_INT);
        $stmt->bindValue(':p30', $_P['Puntaje'] , PDO::PARAM_INT);
        $stmt->bindValue(':p31', $_P['FechaEstadoSituacional'] , PDO::PARAM_INT);
        $stmt->bindValue(':p32', $_P['CodigoFacultad'] , PDO::PARAM_INT);
        $stmt->bindValue(':p33', $_P['CodigoEscuela'] , PDO::PARAM_INT);
        $stmt->bindValue(':p34', $_P['CodNacionalidad'] , PDO::PARAM_INT);
        $stmt->bindValue(':p35', $_P['Cobertura'] , PDO::PARAM_INT);
        
        
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function update($_P ) {
        
        $sql = $this->Query("sp_alum_iu(1,:p1,:p2,:p3,:p4,:p5,:p6,:p7,:p8,:p9,:p10,:p11,:p12,:p13,:p14,:p15,:p16,:p17,:p18,:p19,:p20,:p21,:p22,:p23,:p24,:p25)");
        $stmt = $this->db->prepare($sql);
        if($_P['idpadre']==""){$_P['idpadre']=null;}
        
       $stmt->bindValue(':p1', $xd , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['ApellidoPaterno'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['ApellidoMaterno'] , PDO::PARAM_INT);
        $stmt->bindValue(':p4', $_P['NombreAlumno'] , PDO::PARAM_STR);
        $stmt->bindValue(':p5', $_P['Direccion'] , PDO::PARAM_INT);
        $stmt->bindValue(':p6', $_P['Email'] , PDO::PARAM_STR);
        $stmt->bindValue(':p7', $_P['FechaNacimiento'] , PDO::PARAM_INT);
        $stmt->bindValue(':p8', $_P['Telefono'] , PDO::PARAM_STR);
        $stmt->bindValue(':p9', $_P['TipoDocumento'] , PDO::PARAM_STR);
        $stmt->bindValue(':p10', $_P['NumDocumento'] , PDO::PARAM_STR);
        $stmt->bindValue(':p11', $_P['FechaIngreso'] , PDO::PARAM_INT);
        $stmt->bindValue(':p12', $_P['GrupoSangre'] , PDO::PARAM_STR);
        $stmt->bindValue(':p13', $_P['Ubigeo'] , PDO::PARAM_INT);
        $stmt->bindValue(':p14', $_P['Sexo'] , PDO::PARAM_STR);
        $stmt->bindValue(':p15', $_P['EstadoCivil'] , PDO::PARAM_INT);
        $stmt->bindValue(':p16', $_P['HijoTrabajador'] , PDO::PARAM_STR);
        $stmt->bindValue(':p17', $_P['CodigoTipoColegio'] , PDO::PARAM_INT);
        $stmt->bindValue(':p18', $_P['CodigoRegimen'] , PDO::PARAM_STR);
        $stmt->bindValue(':p19', $_P['CodigoModalidad'] , PDO::PARAM_INT);
        $stmt->bindValue(':p20', $_P['CodigoTipoIngreso'] , PDO::PARAM_STR);
        $stmt->bindValue(':p21', $_P['CodigoEstadoSituacional'] , PDO::PARAM_INT);
        $stmt->bindValue(':p22', $_P['EstadoAlumno'] , PDO::PARAM_STR);
        $stmt->bindValue(':p23', $_P['CodAlumnoSira'] , PDO::PARAM_INT);
        $stmt->bindValue(':p24', $_P['CodigoSemestreIngreso'] , PDO::PARAM_STR);
        $stmt->bindValue(':p25', $_P['FechaEgreso'] , PDO::PARAM_INT);
        $stmt->bindValue(':p26', $_P['CodigoSemestreEgreso'] , PDO::PARAM_INT);
        $stmt->bindValue(':p27', $_P['CodigoSedeEscuela'] , PDO::PARAM_INT);
        $stmt->bindValue(':p28', $_P['Foto'] , PDO::PARAM_INT);
        $stmt->bindValue(':p29', $_P['Puesto'] , PDO::PARAM_INT);
        $stmt->bindValue(':p30', $_P['Puntaje'] , PDO::PARAM_INT);
        $stmt->bindValue(':p31', $_P['FechaEstadoSituacional'] , PDO::PARAM_INT);
        $stmt->bindValue(':p32', $_P['CodigoFacultad'] , PDO::PARAM_INT);
        $stmt->bindValue(':p33', $_P['CodigoEscuela'] , PDO::PARAM_INT);
        $stmt->bindValue(':p34', $_P['CodNacionalidad'] , PDO::PARAM_INT);
        $stmt->bindValue(':p35', $_P['Cobertura'] , PDO::PARAM_INT); 
        
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function delete($p) {
        $stmt = $this->db->prepare("DELETE FROM alumno WHERE CodigoAlumno = :p1");
        $stmt->bindValue(':p1', $p, PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>
