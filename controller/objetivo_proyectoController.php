<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/objetivo_proyecto.php';
class objetivo_proyectoController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="objetivo_proyecto.objetivos_especificos";}
        $obj = new objetivo_proyecto();
        $data = array();             
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=objetivo_proyecto&action=index','query'=>$_GET['q']));                
        $cols = array("Codigo objetivo","Codigo proyecto","Descripcion objetivo","Descripcion proyecto");        
        $opt = array("objetivo_proyecto.objetivos_especificos"=>"Nombre Objetivo");
        $data['grilla'] = $this->grilla("objetivo_proyecto",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/objetivo_proyecto/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function edit() {
        $obj = new objetivo_proyecto();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['proyecto'] = $this->Select(array('id'=>'idproyecto','name'=>'idproyecto','table'=>'proyecto','code'=>$obj->idproyecto));
        $view->setData($data);
        $view->setTemplate( '../view/objetivo_proyecto/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new objetivo_proyecto();
        if ($_POST['idobjetivo_proyecto']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=objetivo_proyecto');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=objetivo_proyecto';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=objetivo_proyecto');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=objetivo_proyecto';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new objetivo_proyecto();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=objetivo_proyecto');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=objetivo_proyecto';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }
    public function create() {
        $data = array();
        $view = new View();
        $data['proyecto'] = $this->Select(array('id'=>'idproyecto','name'=>'idproyecto','table'=>'proyecto','code'=>$obj->idproyecto));
        $view->setData($data);
        $view->setTemplate( '../view/objetivo_proyecto/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function getobjetivo_proyecto()
    {
        $ofic = $this->Select_ajax(array('id'=>'idcriterio','name'=>'idcriterio','table'=>'vista_objetivo_proyecto','filtro'=>'idproyecto','criterio'=>$_POST['idproyecto']));
        echo $ofic;
    }
}
?>