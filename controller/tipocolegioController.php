<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/tipocolegio.php';

class tipocolegioController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="DescripcionTipoColegio";}
        $obj = new TipoColegio();
        $data = array();             
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=tipocolegio&action=index','query'=>$_GET['q']));                
       
        $cols = array("CODIGO","DESCRIPCION");               
        
        $opt = array("tipocolegio.DescripcionTipoColegio"=>"Nombre Tipo Colegio");
        $data['grilla'] = $this->grilla("tipocolegio",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/tipocolegio/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function edit() {
        $obj = new TipoColegio();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['tipocolegioPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_tipocolegio','code'=>$obj->idpadre));
        $view->setData($data);
        $view->setTemplate( '../view/tipocolegio/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new tipocolegio();
        if ($_POST['CodigoTipoColegio']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=tipocolegio');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=tipocolegio';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=tipocolegio');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=tipocolegio';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new tipocolegio();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=tipocolegio');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] = 'index.php?controller=tipocolegio';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }
    public function create() {
        $data = array();
        $view = new View();
        $data['tipocolegioPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_tipocolegio'));
        $view->setData($data);
        $view->setTemplate( '../view/tipocolegio/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
   
}
?>