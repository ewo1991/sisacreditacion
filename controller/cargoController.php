<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/cargo.php';

class cargoController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="descripcion";}
        $obj = new cargo();
        $data = array();             
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=cargo&action=index','query'=>$_GET['q']));                
        $cols = array("CODIGO","DESCRIPCION");               
        
        $opt = array("descripcion"=>"Nombre cargo");
        $data['grilla'] = $this->grilla("cargo",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/cargo/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function edit() {
        $obj = new cargo();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['cargosPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_cargo','code'=>$obj->idpadre));
        $view->setData($data);
        $view->setTemplate( '../view/cargo/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new cargo();
        if ($_POST['idcargo']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=cargo');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=cargo';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=cargo');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=cargo';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new cargo();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=cargo');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=cargo';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }
    public function create() {
        $data = array();
        $view = new View();
        $data['cargosPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_cargo'));
        $view->setData($data);
        $view->setTemplate( '../view/cargo/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function show() {
        $obj = new cargo();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['cargosPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_cargo','code'=>$obj->idpadre,'disabled'=>'disabled'));
        $view->setData($data);
        $view->setTemplate( '../view/cargo/_Show.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
       }
}
?>