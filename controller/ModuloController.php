<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/Modulo.php';

class ModuloController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="m.descripcion";}
        $obj = new Modulo();
        $data = array();             
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=Modulo&action=index','query'=>$_GET['q']));                
        $cols = array("CODIGO","DESCRIPCION","PRINCIPAL","URL","ESTADO","ORDEN","ICONO");  
        $opt = array("m.descripcion"=>"descripcion","mm.descripcion"=>"principal");
        $data['grilla'] = $this->grilla("Modulo",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/Modulo/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function edit() {
        $obj = new Modulo();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['ModulosPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_modulo','code'=>$obj->idpadre));
        $view->setData($data);
        $view->setTemplate( '../view/Modulo/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new Modulo();
        if ($_POST['idmodulo']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=Modulo');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=Modulo';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=Modulo');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=Modulo';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new Modulo();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=Modulo');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=Modulo';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }
    public function create() {
        $data = array();
        $view = new View();
        $data['ModulosPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_modulo'));
        $view->setData($data);
        $view->setTemplate( '../view/Modulo/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function show() {
        $obj = new Modulo();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['ModulosPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_modulo','code'=>$obj->idpadre,'disabled'=>'disabled'));
        $view->setData($data);
        $view->setTemplate( '../view/Modulo/_Show.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
       }
}
?>