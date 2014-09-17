<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/tipo_proyecto.php';

class tipo_proyectoController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="nombre_tipo_proyecto";}
        $obj = new tipo_proyecto();
        $data = array();             
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=tipo_proyecto&action=index','query'=>$_GET['q']));                
        $cols = array("Codigo Tipo Proyecto","Descripcion Tipo Proyecto"
            . "");               
        
        $opt = array("idtipo_proyecto"=>"Codigo Proyecto","nombre_tipo_proyecto"=>"Tipo Proyecto");
        $data['grilla'] = $this->grilla("tipo_proyecto",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/tipo_proyecto/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function edit() {
        $obj = new tipo_proyecto();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['tipo_proyectoPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_tipo_proyecto','code'=>$obj->idpadre));
        $view->setData($data);
        $view->setTemplate( '../view/tipo_proyecto/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new tipo_proyecto();
        if ($_POST['idtipo_proyecto']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=tipo_proyecto');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=tipo_proyecto';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=tipo_proyecto');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=tipo_proyecto';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new tipo_proyecto();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=tipo_proyecto');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=tipo_proyecto';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }
    public function create() {
        $data = array();
        $view = new View();
        $data['tipo_proyectoPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_tipo_proyecto'));
        $view->setData($data);
        $view->setTemplate( '../view/tipo_proyecto/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
   
}
?>
