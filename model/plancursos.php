<?php
include_once("../lib/dbfactory.php");
class plancursos extends Main{    
    function index($query,$p,$c) 
    {
        $sql = "SELECT
                cursos.CodigoCurso,
                cursos.DescripcionCurso,
                cursos.HorasPractica,
                cursos.HorasTeoria,
                (cursos.HorasPractica+ cursos.HorasTeoria) AS Totalhoras,
                cursos.Creditos,
                cursos.Ciclo,
                escuelaprofesional.DescripcionEscuela
                FROM
                plancurricular
                Inner Join cursos ON plancurricular.CodigoPlan = cursos.CodigoPlan
                Inner Join escuelaprofesional ON cursos.CodigoEscuela = escuelaprofesional.CodigoEscuela

                where ".$c." like :query";         
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );        
        $data['rowspag'] = $this->getRowPag($data['total'], $p );        
        return $data;
    }       
   
    
   
  
}
?>

