<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/sucursal.php';

class sucursalController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="descripcion";}
        $obj = new sucursal();
        $data = array();             
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=sucursal&action=index','query'=>$_GET['q']));                
       
        $cols = array("CODIGO","DESCRIPCION");               
        
        $opt = array("descripcion"=>"Nombre Sucursal");
        $data['grilla'] = $this->grilla("sucursal",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/sucursal/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function edit() {
        $obj = new sucursal();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['sucursalsPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_sucursal','code'=>$obj->idpadre));
        $view->setData($data);
        $view->setTemplate( '../view/sucursal/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new sucursal();
        if ($_POST['idsucursal']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=sucursal');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=sucursal';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=sucursal');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=sucursal';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new sucursal();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=sucursal');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] = 'index.php?controller=sucursal';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }
    public function create() {
        $data = array();
        $view = new View();
        $data['sucursalsPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_sucursal'));
        $view->setData($data);
        $view->setTemplate( '../view/sucursal/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
   
}
?>
