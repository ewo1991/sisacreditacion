<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/categoria.php';

class categoriaController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="DescripcionCategoria";}
        $obj = new categoria();
        $data = array();             
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=categoria&action=index','query'=>$_GET['q']));                
        $cols = array("Codigo Categoria","Descripcion Categoria");               
        
        $opt = array("DescripcionCategoria"=>"Nombre Categoria");
        $data['grilla'] = $this->grilla("categoria",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/categoria/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function edit() {
        $obj = new categoria();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['categoriaPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_categoria','code'=>$obj->idpadre));
        $view->setData($data);
        $view->setTemplate( '../view/categoria/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new categoria();
        if ($_POST['CodigoCategoria']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=categoria');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=categoria';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=categoria');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=categoria';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new categoria();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=categoria');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=categoria';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }
    public function create() {
        $data = array();
        $view = new View();
        $data['categoriasPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_categoria'));
        $view->setData($data);
        $view->setTemplate( '../view/categoria/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
   
}
?>
