<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/oficina.php';

class oficinaController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="oficina.descripcion";}
        $obj = new oficina();
        $data = array();             
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=oficina&action=index','query'=>$_GET['q']));                
        $cols = array("CODIGO","DESCRIPCION","direccion","telefono","sucursal");        
        $opt = array("oficina.descripcion"=>"Nombre oficina","sucursal.descripcion"=>"Nombre Sucursal");
        $data['grilla'] = $this->grilla("oficina",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/oficina/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function edit() {
        $obj = new oficina();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['sucursal'] = $this->Select(array('id'=>'idsucursal','name'=>'idsucursal','table'=>'sucursal','code'=>$obj->idsucursal));
        $view->setData($data);
        $view->setTemplate( '../view/oficina/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new oficina();
        if ($_POST['idoficina']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=oficina');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=oficina';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=oficina');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=oficina';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new oficina();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=oficina');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=oficina';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }
    public function create() {
        $data = array();
        $view = new View();
        $data['sucursal'] = $this->Select(array('id'=>'idsucursal','name'=>'idsucursal','table'=>'sucursal','code'=>$obj->idsucursal));
        $view->setData($data);
        $view->setTemplate( '../view/oficina/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function getOficinas()
    {
        $ofic = $this->Select_ajax(array('id'=>'idcriterio','name'=>'idcriterio','table'=>'voficinas','filtro'=>'idsucursal','criterio'=>$_POST['idsucursal']));
        echo $ofic;
    }
}
?>