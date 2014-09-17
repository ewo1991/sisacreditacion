<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/grupo.php';

class grupoController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="grupo.nombre_grupo";}
        $obj = new grupo();
        $data = array();             
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=grupo&action=index','query'=>$_GET['q']));                
        $cols = array("CODIGO","DESCRIPCION");               
        
        $opt = array("grupo.nombre_grupo"=>"Nombre Grupo");
        $data['grilla'] = $this->grilla("grupo",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/grupo/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function edit() {
        $obj = new grupo();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        //$data['grupoPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_grupo','code'=>$obj->idpadre));
        $view->setData($data);
        $view->setTemplate( '../view/grupo/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new grupo();
        if ($_POST['idgrupo']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=grupo');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=grupo';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=grupo');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=grupo';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new grupo();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=grupo');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=grupo';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }
    public function create() {
        $data = array();
        $view = new View();
        $data['grupoPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_grupo'));
        $view->setData($data);
        $view->setTemplate( '../view/grupo/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
   
}
?>
