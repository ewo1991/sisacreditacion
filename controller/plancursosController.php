<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/plancursos.php';

class plancursosController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="descripcion";}
        $obj = new plancursos();
        $data = array(); 
        
                    
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);//SI EXISTE CRITERIO QUE BUSQUE
        
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=plancursos&action=index','query'=>$_GET['q']));                
        $cols = array("CODIGO","Curso","HP","HT","ESCUELA","FACULTAD");  //CABECERA DE LOS CAMPOS DE GRILLA      
        $opt = array("idplan"=>"CODIGO PLAN");//BUSQUEDA DE CAMPOS
       
        $data['plancurricular'] = $this->Select(array('id' => 'CodigoPlan', 'name' => 'CodigoPlan', 'table' => 'v_plan', 'code' => $obj->CodigoPlan));
   
        $data['grilla'] = $this->grilla("plancursos",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/plancursos/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();

        
        
      }
  
}
?>