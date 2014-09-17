<?php
include_once("../lib/dbfactory.php");
class contenido extends Main{    
    function index($query,$p,$c) 
    {       
        
            $sql = "   SELECT id_sliderweb,descripcion,imagen_slider 
                    FROM slider_web
                    ORDER BY id_sliderweb DESC";
     
        
        
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ),
                        array('key'=>':query1' , 'value'=>"%$query1%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );        
        $data['rowspag'] = $this->getRowPag($data['total'], $p );        
        return $data;
    }
    
    
}
?>
