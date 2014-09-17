<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/desarrolladores_web.php';
class desarrolladores_webController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="desarrolladores_web.descripcion";}
        $obj = new desarrolladores_web();
        $data = array();             
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=desarrolladores_web&action=index','query'=>$_GET['q']));                
        $cols = array("Id","Descripcion","Imagen");        
        $opt = array("desarrolladores_web.descripcion"=>"Descripcion");
        $data['grilla'] = $this->grilla("desarrolladores_web",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/desarrolladores_web/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function edit() {
        $obj = new desarrolladores_web();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['desarrolladores_web'] = $this->Select(array('id'=>'id_desarrolladoresweb','name'=>'id_desarrolladoresweb','table'=>'desarrolladores_web','code'=>$obj->id_desarrolladoresweb));
        $view->setData($data);
        $view->setTemplate( '../view/desarrolladores_web/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new desarrolladores_web();
        if ($_POST['id_desarrolladoresweb']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=desarrolladores_web');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=desarrolladores_web';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=desarrolladores_web');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=desarrolladores_web';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new desarrolladores_web();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=desarrolladores_web');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=desarrolladores_web';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }
    public function create() {
        $data = array();
        $view = new View();
        $data['desarrolladores_web'] = $this->Select(array('id'=>'id_desarrolladoresweb','name'=>'id_desarrolladoresweb','table'=>'desarrolladores_web','code'=>$obj->id_desarrolladoresweb));
        $view->setData($data);
        $view->setTemplate( '../view/desarrolladores_web/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function getAnexo()
    {
        $ofic = $this->Select_ajax(array('id'=>'idcriterio','name'=>'idcriterio','table'=>'vista_desarrolladores_web','filtro'=>'id_desarrolladoresweb','criterio'=>$_POST['id_desarrolladoresweb']));
        echo $ofic;
    }
}
?>