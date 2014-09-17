<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/actividad.php';
class actividadController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="actividad.nombre_actividad";}
        $obj = new actividad();
        $data = array();             
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=actividad&action=index','query'=>$_GET['q']));                
        $cols = array("Codigo actividad","Codigo proyecto","Descripcion actividad","Descripcion proyecto");        
        $opt = array("actividad.nombre_actividad"=>"Nombre Actividad");
        $data['grilla'] = $this->grilla("actividad",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/actividad/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function edit() {
        $obj = new actividad();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['proyecto'] = $this->Select(array('id'=>'idproyecto','name'=>'idproyecto','table'=>'proyecto','code'=>$obj->idproyecto));
        $view->setData($data);
        $view->setTemplate( '../view/actividad/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new actividad();
        if ($_POST['idactividad']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=actividad');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=actividad';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=actividad');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=actividad';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new actividad();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=actividad');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=actividad';
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
        $view->setTemplate( '../view/actividad/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function getAnexo()
    {
        $ofic = $this->Select_ajax(array('id'=>'idcriterio','name'=>'idcriterio','table'=>'vista_actividad','filtro'=>'idproyecto','criterio'=>$_POST['idproyecto']));
        echo $ofic;
    }
}
?>