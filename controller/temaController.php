<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/tema.php';
class temaController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="tema.contenido";}
        $obj = new tema();
        $data = array();             
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=tema&action=index','query'=>$_GET['q']));                
        $cols = array("Codigo","Contenido","Competencia","Unidad academica");        
        $opt = array("tema.contenido"=>"Contenido");
        $data['grilla'] = $this->grilla("tema",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/tema/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function edit() {
        $obj = new tema();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['unidad'] = $this->Select(array('id'=>'idunidad','name'=>'idunidad','table'=>'unidad','code'=>$obj->idunidad));
        $view->setData($data);
        $view->setTemplate( '../view/tema/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        if(isset($_SESSION["perfil"]) && ($_SESSION["perfil"] == 'PROFESOR')){
        $obj = new tema();
        if ($_POST['idtema']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=cursosemestre');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=cursosemestre';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=cursosemestre');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=cursosemestre';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    else{
        
        $obj = new tema();
        if ($_POST['idtema']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=tema');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=tema';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=tema');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=tema';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
        
        
        
    }   
    }
    public function delete(){
        $obj = new tema();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=tema');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=tema';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }
    public function create() {
        $data = array();
        $view = new View();
        $data['unidad'] = $this->Select(array('id'=>'idunidad','name'=>'idunidad','table'=>'unidad','code'=>$obj->idunidad));
        $view->setData($data);
        $view->setTemplate( '../view/tema/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function getTema()
    {
        $ofic = $this->Select_ajax(array('id'=>'idcriterio','name'=>'idcriterio','table'=>'vista_tema','filtro'=>'idunidad','criterio'=>$_POST['idunidad']));
        echo $ofic;
    }
}
?>