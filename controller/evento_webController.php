<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/evento_web.php';
class evento_webController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="evento_web.titulo";}
        $obj = new evento_web();
        $data = array();             
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=evento_web&action=index','query'=>$_GET['q']));                
        $cols = array("Id","Titulo","Descripcion noticia","Fecha");        
        $opt = array("evento_web.titulo"=>"Titulo");
        $data['grilla'] = $this->grilla("evento_web",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/evento_web/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function edit() {
        $obj = new evento_web();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['noticia_web'] = $this->Select(array('id'=>'id_eventoweb','name'=>'id_eventoweb','table'=>'evento_web','code'=>$obj->id_eventoweb));
        $view->setData($data);
        $view->setTemplate( '../view/evento_web/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new evento_web();
        if ($_POST['id_eventoweb']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=evento_web');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=evento_web';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=evento_web');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=evento_web';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new evento_web();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=evento_web');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=evento_web';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }
    public function create() {
        $data = array();
        $view = new View();
        $data['evento_web'] = $this->Select(array('id'=>'id_eventoweb','name'=>'id_eventoweb','table'=>'evento_web','code'=>$obj->id_eventoweb));
        $view->setData($data);
        $view->setTemplate( '../view/evento_web/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function getAnexo()
    {
        $ofic = $this->Select_ajax(array('id'=>'idcriterio','name'=>'idcriterio','table'=>'vista_evento_web','filtro'=>'id_eventoweb','criterio'=>$_POST['id_eventoweb']));
        echo $ofic;
    }
}
?>