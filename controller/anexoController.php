<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/anexo.php';
class anexoController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="anexo.nombre_anexo";}
        $obj = new anexo();
        $data = array();             
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=anexo&action=index','query'=>$_GET['q']));                
        $cols = array("Codigo anexo","Codigo proyecto","Descripcion anexo","Descripcion proyecto");        
        $opt = array("anexo.nombre_anexo"=>"Nombre Anexo");
        $data['grilla'] = $this->grilla("anexo",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/anexo/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function edit() {
        $obj = new anexo();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['proyecto'] = $this->Select(array('id'=>'idproyecto','name'=>'idproyecto','table'=>'proyecto','code'=>$obj->idproyecto));
        $view->setData($data);
        $view->setTemplate( '../view/anexo/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new anexo();
        if ($_POST['idanexo']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=anexo');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=anexo';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=anexo');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=anexo';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new anexo();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=anexo');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=anexo';
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
        $view->setTemplate( '../view/anexo/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function getAnexo()
    {
        $ofic = $this->Select_ajax(array('id'=>'idcriterio','name'=>'idcriterio','table'=>'vista_anexo','filtro'=>'idproyecto','criterio'=>$_POST['idproyecto']));
        echo $ofic;
    }
}
?>