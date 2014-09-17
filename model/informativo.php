<?php
include_once("../lib/dbfactory.php");
class informativo extends Main{    
    function index($query,$p,$c) 
    {
        $sql = "SELECT
                noticia_web.id_noticiaweb,
                noticia_web.titulo,
                noticia_web.descripcion,
                noticia_web.imagen,
                noticia_web.fecha
                FROM
                noticia_web where ".$c." like :query";         
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );        
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );        
        return $data;
    }       
    function edit($id ) 
    {
        $stmt = $this->db->prepare("SELECT * FROM noticia_web WHERE id_noticiaweb = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function insert($_P,$_F) {
         $sentencia=$this->db->query("SELECT MAX(id_noticiaweb) as cant from noticia_web");         
         $ct=$sentencia->fetch();      
          $xd=1+ (int)$ct['cant'];
          //$xd="F".$xd;
        $sql = $this->Query("sp_informativo_iu(0,:p1,:p2,:p3,:p4,:p5)");
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':p1', $xd , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['titulo'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['descripcion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_F['imagen']["name"] , PDO::PARAM_STR);
        $stmt->bindValue(':p5', $_P['fecha'] , PDO::PARAM_STR);
      
       
             
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function update($_P,$_F) {
        $sql = $this->Query("sp_informativo_iu(1,:p1,:p2,:p3,:p4,:p5)");
        $stmt = $this->db->prepare($sql);
        if($_P['idpadre']==""){$_P['idpadre']=null;}
        $stmt->bindValue(':p1', $_P['id_noticiaweb'] , PDO::PARAM_INT);
       $stmt->bindValue(':p2', $_P['titulo'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['descripcion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P["id_noticiaweb"].$_F['imagen']["name"] , PDO::PARAM_STR);
        $stmt->bindValue(':p5', $_P['fecha'] , PDO::PARAM_STR);

        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function delete($p) {
        $stmt = $this->db->prepare("DELETE FROM noticia_web WHERE id_noticiaweb = :p1");
        $stmt->bindValue(':p1', $p, PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>
