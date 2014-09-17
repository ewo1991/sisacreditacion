<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/condicion.php';

class condicionController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="DescripcionCondicion";}
        $obj = new condicion();
        $data = array();             
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=condicion&action=index','query'=>$_GET['q']));                
        $cols = array("Codigo Condicion","Descripcion Condicion");               
        
    
        $opt = array("CodigoCondicion"=>"Codigo Condicion","DescripcionCondicion"=>"Nombre condicion");
        $data['grilla'] = $this->grilla("condicion",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/condicion/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function edit() {
        $obj = new condicion();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        //$data['condicionPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_condicion','code'=>$obj->idpadre));
        $view->setData($data);
        $view->setTemplate( '../view/condicion/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new condicion();
        if ($_POST['CodigoCondicion']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=condicion');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=condicion';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=condicion');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=condicion';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new condicion();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=condicion');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=condicion';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }
    public function create() {
        $data = array();
        $view = new View();
        $data['condicionPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_condicion'));
        $view->setData($data);
        $view->setTemplate( '../view/condicion/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
   
}
?>
