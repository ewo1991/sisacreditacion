<?php
include_once("../lib/dbfactory.php");
class Perfil extends Main
{
   function index($query , $p ) {
        $sql = "select idperfil,
                       descripcion,
                       case estado when true then 'ACTIVO' else 'INCANTIVO' end
                       from perfil  where descripcion like :query";
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );
        return $data;
    }
    function edit($id ) {
        $stmt = $this->db->prepare("SELECT * FROM perfil WHERE idperfil = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function insert($_P ) {
        $stmt = $this->db->prepare("CALL func_inseactu_perfil(0,:p1,:p2,0)");
        $stmt->bindValue(':p1', $_P['descripcion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['activo'] , PDO::PARAM_BOOL);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function update($_P ) {
        $stmt = $this->db->prepare("CALL func_inseactu_perfil(:idperfil,:p1,:p2,1)");
        $stmt->bindValue(':p1', $_P['descripcion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['activo'] , PDO::PARAM_BOOL);
        $stmt->bindValue(':idperfil', $_P['idperfil'] , PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function delete($_P ) {
        $stmt = $this->db->prepare("DELETE FROM perfil WHERE idperfil = :p1");
        $stmt->bindValue(':p1', $_P['idperfil'] , PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>