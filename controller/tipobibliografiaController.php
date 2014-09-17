<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/tipobibliografia.php';

class tipobibliografiaController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="descripcion_tipobibliografia";}
        $obj = new tipobibliografia();
        $data = array();             
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=tipobibliografia&action=index','query'=>$_GET['q']));                
        $cols = array("idtipo_bibliografia","descripcion_tipobibliografia");               
        
        $opt = array("descripcion_tipobibliografia"=>"Nombre tipobibliografia");
        $data['grilla'] = $this->grilla("tipobibliografia",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/tipobibliografia/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function edit() {
        $obj = new tipobibliografia();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['tipobibliografiaPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_tipobibliografia','code'=>$obj->idpadre));
        $view->setData($data);
        $view->setTemplate( '../view/tipobibliografia/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new tipobibliografia();
        if ($_POST['idtipo_bibliografia']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=tipobibliografia');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=tipobibliografia';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=tipobibliografia');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=tipobibliografia';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new tipobibliografia();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=tipobibliografia');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=tipobibliografia';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }
    public function create() {
        $data = array();
        $view = new View();
        $data['tipobibliografiasPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_tipobibliografia'));
        $view->setData($data);
        $view->setTemplate( '../view/tipobibliografia/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
   
}
?>
