<?php
include_once("../lib/dbfactory.php");
class parametros extends Main
{
   function index($query , $p ) {
        
    }
    function getParametros()
    {
        $stmt = $this->db->prepare("select * from parametros");
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function edit($id ) {
        $stmt = $this->db->prepare("SELECT * FROM parametros WHERE idparametros = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function insert($_P ) {
        $stmt = $this->db->prepare("select func_inseactu_parametros(0,:p1,:p2,0)");
        $stmt->bindValue(':p1', $_P['descripcion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['activo'] , PDO::PARAM_BOOL);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function update($_P ) {
        $stmt = $this->db->prepare("select func_inseactu_parametros(:idparametros,:p1,:p2,1)");
        $stmt->bindValue(':p1', $_P['descripcion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['activo'] , PDO::PARAM_BOOL);
        $stmt->bindValue(':idparametros', $_P['idparametros'] , PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
 
}
?>