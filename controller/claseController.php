<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/clase.php';
class claseController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="tema.contenido";}
        $obj = new clase();
        $data = array();             
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=clase&action=index','query'=>$_GET['q']));                
        $cols = array("Codigo clase","Fecha","Tema");        
        $opt = array("clase.idclase"=>"Codigo Tema","tema.contenido"=>"Tema");
        $data['grilla'] = $this->grilla("clase",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/clase/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function edit() {
        $obj = new clase();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['tema'] = $this->Select(array('id'=>'idtema','name'=>'idtema','table'=>'tema','code'=>$obj->idtema));
        $view->setData($data);
        $view->setTemplate( '../view/clase/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new clase();
        if ($_POST['idclase']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=clase');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=clase';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=clase');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=clase';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new clase();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=clase');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=clase';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }
    public function create() {
        $data = array();
        $view = new View();
        $data['tema'] = $this->Select(array('id'=>'idtema','name'=>'idtema','table'=>'tema','code'=>$obj->idtema));
        $view->setData($data);
        $view->setTemplate( '../view/clase/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function getClase()
    {
        $ofic = $this->Select_ajax(array('id'=>'idcriterio','name'=>'idcriterio','table'=>'tema','filtro'=>'idtema','criterio'=>$_POST['idtema']));
        echo $ofic;
    }
}
?>