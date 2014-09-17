<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/estadosituacional.php';

class estadosituacionalController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="DescripcionEstadoestacionario";}
        $obj = new estadosituacional();
        $data = array();             
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=estadosituacional&action=index','query'=>$_GET['q']));                
       
        $cols = array("CODIGO","ESTADO ESTACIONARIO");               
        
        $opt = array("estadosituacional.DescripcionEstadoestacionario"=>"Nombre Estado Estacionario");
        $data['grilla'] = $this->grilla("estadosituacional",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/estadosituacional/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function edit() {
        $obj = new estadosituacional();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['estadosituacionalPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_estadosituacional','code'=>$obj->idpadre));
        $view->setData($data);
        $view->setTemplate( '../view/estadosituacional/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new estadosituacional();
        if ($_POST['CodigoEstadoSituacional']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=estadosituacional');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=estadosituacional';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=estadosituacional');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=estadosituacional';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new estadosituacional();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=estadosituacional');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] = 'index.php?controller=estadosituacional';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }
    public function create() {
        $data = array();
        $view = new View();
        $data['estadositucionalPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_estadosituacional'));
        $view->setData($data);
        $view->setTemplate( '../view/estadosituacional/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
   
}
?>