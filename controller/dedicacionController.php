<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/dedicacion.php';

class dedicacionController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="DescripcionDedicacion";}
        $obj = new dedicacion();
        $data = array();             
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=dedicacion&action=index','query'=>$_GET['q']));                
        $cols = array("Codigo Dedicacion","Descripcion Dedicacion");               
        
        $opt = array("DescripcionDedicacion"=>"Nombre Dedicacion");
        $data['grilla'] = $this->grilla("dedicacion",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/dedicacion/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function edit() {
        $obj = new dedicacion();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['dedicacionsPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_dedicacion','code'=>$obj->idpadre));
        $view->setData($data);
        $view->setTemplate( '../view/dedicacion/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new dedicacion();
        if ($_POST['CodigoDedicacion']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=dedicacion');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=dedicacion';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=dedicacion');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=dedicacion';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new dedicacion();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=dedicacion');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=dedicacion';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }
    public function create() {
        $data = array();
        $view = new View();
        $data['dedicacionsPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_dedicacion'));
        $view->setData($data);
        $view->setTemplate( '../view/dedicacion/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
   
}
?>
