<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/funcion.php';

class funcionController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="nombre_funcion";}
        $obj = new Funcion();
        $data = array();             
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['p11ag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=funcion&action=index','query'=>$_GET['q']));                
       
        $cols = array("idfuncion","nombre_funcion");               
        
        $opt = array("funcion.nombre_funcion"=>"Nombre Funcion");
        $data['grilla'] = $this->grilla("Funcion",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/funcion/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function edit() {
        $obj = new funcion();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['funcionPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_funcion','code'=>$obj->idpadre));
        $view->setData($data);
        $view->setTemplate( '../view/funcion/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new funcion();
        if ($_POST['idfuncion']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=funcion');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=funcion';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=funcion');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=funcion';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new funcion();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=funcion');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] = 'index.php?controller=funcion';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }
    public function create() {
        $data = array();
        $view = new View();
        $data['funcionPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_funcion'));
        $view->setData($data);
        $view->setTemplate( '../view/funcion/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
   
}
?>