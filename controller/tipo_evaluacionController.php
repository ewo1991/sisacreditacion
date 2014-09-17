<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/tipo_evaluacion.php';

class tipo_evaluacionController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="descripcion";}
        $obj = new tipo_evaluacion();
        $data = array();             
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=tipo_evaluacion&action=index','query'=>$_GET['q']));                
       
        $cols = array("CODIGO","DESCRIPCION");               
        
        $opt = array("tipo_evaluacion.descripcion"=>"Nombre de Evaluacion");
        $data['grilla'] = $this->grilla("tipo_evaluacion",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/tipo_evaluacion/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function edit() {
        $obj = new tipo_evaluacion();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['tipo_evaluacionPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_tipo_evaluacion','code'=>$obj->idpadre));
        $view->setData($data);
        $view->setTemplate( '../view/tipo_evaluacion/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new tipo_evaluacion();
        if ($_POST['idtipo_evaluacion']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=tipo_evaluacion');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=tipo_evaluacion';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=tipo_evaluacion');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=tipo_evaluacion';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new tipo_evaluacion();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=tipo_evaluacion');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] = 'index.php?controller=tipo_evaluacion';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }
    public function create() {
        $data = array();
        $view = new View();
        $data['tipo_evaluacionPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_tipo_evaluacion'));
        $view->setData($data);
        $view->setTemplate( '../view/tipo_evaluacion/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
   
}
?>