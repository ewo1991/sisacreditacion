<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/sedes.php';

class sedesController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="DescripcionSede";}
        $obj = new sedes();
        $data = array();             
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=sedes&action=index','query'=>$_GET['q']));                
        $cols = array("Codigo Sede","Descripcion Sede","Estado Sede");               
        
        $opt = array("DescripcionSede"=>"Nombre Sede","EstadoSede"=>"Estado Sede");
        $data['grilla'] = $this->grilla("sedes",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/sedes/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function edit() {
        $obj = new sedes();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['sedesPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_sedes','code'=>$obj->idpadre));
        $view->setData($data);
        $view->setTemplate( '../view/sedes/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new sedes();
        if ($_POST['CodigoSede']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=sedes');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=sedes';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=sedes');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=sedes';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new sedes();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=sedes');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=sedes';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }
    public function create() {
        $data = array();
        $view = new View();
        $data['sedessPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_sedes'));
        $view->setData($data);
        $view->setTemplate( '../view/sedes/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
   
}
?>
