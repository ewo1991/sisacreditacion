<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/estadoproyecto.php';

class estadoproyectoController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="descripcion";}
        $obj = new estadoproyecto();
        $data = array();             
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=estadoproyecto&action=index','query'=>$_GET['q']));                
        $cols = array("Codigo estado proyecto","Descripcion Estado Proyecto");               
        
        $opt = array("descripcion"=>"Nombre Estado proyecto");
        $data['grilla'] = $this->grilla("estadoproyecto",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/estadoproyecto/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function edit() {
        $obj = new estadoproyecto();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['estadoproyectoPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_estadoproyecto','code'=>$obj->idpadre));
        $view->setData($data);
        $view->setTemplate( '../view/estadoproyecto/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new estadoproyecto();
        if ($_POST['idestado_proyecto']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=estadoproyecto');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=estadoproyecto';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=estadoproyecto');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=estadoproyecto';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new estadoproyecto();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=estadoproyecto');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=estadoproyecto';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }
    public function create() {
        $data = array();
        $view = new View();
        $data['estadoproyectosPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_estadoproyecto'));
        $view->setData($data);
        $view->setTemplate( '../view/estadoproyecto/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
   
}
?>
