<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("../lib/dbfactory.php");
class User extends Main {
    function Start($user,$pass) {
        $statement = $this->db->prepare("select * from 
                                        (select CodigoAlumno as Codigo,CodAlumnoSira as usuario, CONCAT(NombreAlumno,' ',ApellidoPaterno,' ',ApellidoMaterno) as  nombres, 2  as idperfil,'ALUMNO'as perfil,CodAlumnoSira as  contrasenia
                                        from alumnos
                                        union all
                                        select CodigoProfesor as Codigo,CodigoProfesor as usuario, CONCAT(NombreProfesor,' ',ApellidoPaterno,' ',ApellidoMaterno) as nombres, 3 as idperfil,'PROFESOR' as perfil,CodigoProfesor as contrasenia
                                         from profesores
                                        union all
                                        select idempleado as Codigo,usuario,concat(nombres,'',apellidos)as nombres,1 as idperfil,'ADMIN'as perfil,clave as contrasenia
                                        from empleado
                                        union all
                                        select 
                                                detalle_profesor_comision.CodigoProfesor as Codigo,
                                                concat('admin', detalle_profesor_comision.CodigoProfesor) as usuario,
                                                Concat(NombreProfesor,' ',ApellidoPaterno,' ',ApellidoMaterno ) as nombres,
                                                
                                                4 as idperfil,
                                                'PRESIDENTE DE LA COMISION DE TUTORIA' as perfil,
                                                detalle_profesor_comision.CodigoProfesor as contrasenia
                                                from 
                                                detalle_profesor_comision
                                                inner join profesores on profesores.CodigoProfesor = detalle_profesor_comision.CodigoProfesor
                                                inner join cargo on cargo.idcargo = detalle_profesor_comision.idcargo
                                                inner join comision on comision.idcomision = detalle_profesor_comision.idcomision
					where comision.idcomision = 12 and cargo.idcargo = 1
                                        union all 
                                        select 
                                                detalle_profesor_comision.CodigoProfesor as Codigo,
                                                concat('admin', detalle_profesor_comision.CodigoProfesor) as usuario,
                                                Concat(NombreProfesor,' ',ApellidoPaterno,' ',ApellidoMaterno ) as nombres,
                                                
                                                5 as idperfil,
                                                'PRESIDENTE DE PROYECTO DE INVESTIGACION' as perfil,
                                                detalle_profesor_comision.CodigoProfesor as contrasenia
                                                from 
                                                detalle_profesor_comision
                                                inner join profesores on profesores.CodigoProfesor = detalle_profesor_comision.CodigoProfesor
                                                inner join cargo on cargo.idcargo = detalle_profesor_comision.idcargo
					inner join comision on comision.idcomision = detalle_profesor_comision.idcomision
					where comision.idcomision = 1 and cargo.idcargo = 1
                                        union all
                                         select CodigoProfesor as Codigo, concat('admin',CodigoProfesor) as usuario, CONCAT(NombreProfesor,' ',ApellidoPaterno,' ',ApellidoMaterno) as nombres, 6 as idperfil,'PRESIDENTE EVALUACION FORMATIVA' as perfil,CodigoProfesor as contrasenia
                                        from profesores
                                        where CodigoProfesor = 0700004
                                        ) Usuarios
                                        WHERE usuario =:user AND contrasenia =:password");
        $statement->bindParam (":user", $user ,PDO::PARAM_STR);
        $statement->bindParam (":password", $pass,PDO::PARAM_STR);
        $statement->execute();                
        $obj = $statement->fetchObject();

        return array('flag'=>$statement->rowCount(),'obj'=>$obj);
    }
    function cargo_profesor($user) {
        $statement = $this->db->prepare("SELECT
                                cargo.descripcion as cargo,
                                comision.decripcioncomision as comicion,
                                detalle_profesor_comision.CodigoProfesor 
                                FROM
                                detalle_profesor_comision
                                Inner Join comision ON comision.idcomision = detalle_profesor_comision.idcomision
                                Inner Join cargo ON cargo.idcargo = detalle_profesor_comision.idcargo
                                WHERE detalle_profesor_comision.CodigoProfesor =".$user." and detalle_profesor_comision.idcargo=1
                                ");
        
        $statement->execute();                               
        $obj = $statement->fetchObject();
        return array('flag'=>$statement->rowCount(),'obj2'=>$obj);
    }
//    function getOficinas()
//    {
//        $stmt = $this->db->prepare("select oficina.idoficina,sucursal.descripcion,oficina.descripcion
//                                    from oficina inner join sucursal on 
//                                    oficina.idsucursal = sucursal.idsucursal");
//        $stmt->execute();
//        return $stmt->fetchAll();
//    }
//    function getCaja($p)
//    {
//        $stmt = $this->db->prepare("select idcaja,fecha,saldo from caja where idoficina = :p1 and estado = 1");
//        $stmt->bindValue(':p1',$_SESSION['idoficina'],PDO::PARAM_INT);
//        $stmt->execute();
//        return $stmt->fetchObject();
//    }
    function index($query,$p,$c) {
        $sql = "select  empleado.idempleado as idempleado,
                        concat(empleado.nombres,' ',empleado.apellidos) as nombres,        
                        empleado.celular,
                        empleado.rpm,
                        sucursal.descripcion as sucursal,
                        perfil.descripcion as perfil
                from empleado inner join oficina on empleado.idoficina = oficina.idoficina
                inner join sucursal on sucursal.idsucursal = oficina.idsucursal inner join perfil on
                perfil.idperfil = empleado.idperfil 
                where ".$c." like :query";        
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );
        return $data;
    }
    function edit($id ) {
        $stmt = $this->db->prepare("SELECT empleado.*,oficina.idsucursal FROM empleado inner join oficina on empleado.idoficina = oficina.idoficina WHERE empleado.idempleado = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function insert($_P ) 
    {
        $stmt = $this->db->prepare('insert into empleado (idempleado,idoficina,idperfil,nombres,apellidos,usuario,clave,celular,rpm,email,estado)
                                    values(:p1,:p2,:p3,:p4,:p5,:p6,:p7,:p8,:p9,:p10,:p11)');
        $stmt->bindValue(':p1', $_P['idempleado'] , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['idoficina'] , PDO::PARAM_INT);
        $stmt->bindValue(':p3', $_P['idperfil'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['nombres'] , PDO::PARAM_STR);
        $stmt->bindValue(':p5', $_P['apellidos'] , PDO::PARAM_STR);
        $stmt->bindValue(':p6', $_P['login'] , PDO::PARAM_STR);
        $stmt->bindValue(':p7', $_P['password'] , PDO::PARAM_STR);
        $stmt->bindValue(':p8', $_P['celular'] , PDO::PARAM_STR);
        $stmt->bindValue(':p9', $_P['rpm'] , PDO::PARAM_STR);
        $stmt->bindValue(':p10', $_P['email'] , PDO::PARAM_STR);
        $stmt->bindValue(':p11', $_P['estado'] , PDO::PARAM_BOOL);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function update($_P ) {
        
         $stmt = $this->db->prepare('update empleado set idoficina = :p2,idperfil = :p3,nombres=:p4,apellidos=:p5,usuario=:p6,clave=:p7,celular=:p8,rpm=:p9,email=:p10,estado=:p11
                                    where idempleado = :p1');
        $stmt->bindValue(':p1', $_P['idempleado'] , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['idoficina'] , PDO::PARAM_INT);
        $stmt->bindValue(':p3', $_P['idperfil'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['nombres'] , PDO::PARAM_STR);
        $stmt->bindValue(':p5', $_P['apellidos'] , PDO::PARAM_STR);
        $stmt->bindValue(':p6', $_P['login'] , PDO::PARAM_STR);
        $stmt->bindValue(':p7', $_P['password'] , PDO::PARAM_STR);
        $stmt->bindValue(':p8', $_P['celular'] , PDO::PARAM_STR);
        $stmt->bindValue(':p9', $_P['rpm'] , PDO::PARAM_STR);
        $stmt->bindValue(':p10', $_P['email'] , PDO::PARAM_STR);
        $stmt->bindValue(':p11', $_P['estado'] , PDO::PARAM_BOOL);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }    
}
?>