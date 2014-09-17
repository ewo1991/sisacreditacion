<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/modalidadingreso.php';

class ModalidadIngresoController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="DescripcionModalidad";}
        $obj = new modalidadingreso();
        $data = array();             
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=modalidadingreso&action=index','query'=>$_GET['q']));                
        $cols = array("Codigo Modalidad","Descripcion Modalidad");               
        
        $opt = array("DescripcionModalidad"=>"Nombre Modalidad");
        $data['grilla'] = $this->grilla("modalidadingreso",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/modalidadingreso/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function edit() {
        $obj = new modalidadingreso();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['modalidadingresoPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_modalidadingreso','code'=>$obj->idpadre));
        $view->setData($data);
        $view->setTemplate( '../view/modalidadingreso/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new modalidadingreso();
        if ($_POST['CodigoModalidad']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=modalidadingreso');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=modalidadingreso';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=modalidadingreso');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=modalidadingreso';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new modalidadingreso();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=modalidadingreso');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=modalidadingreso';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }
    public function create() {
        $data = array();
        $view = new View();
        $data['modalidadingresoPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_modalidadingreso'));
        $view->setData($data);
        $view->setTemplate( '../view/modalidadingreso/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
   
}
?>
