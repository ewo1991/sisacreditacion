<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/regimencolegio.php';

class regimencolegioController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="DescripcionRegimen";}
        $obj = new regimencolegio();
        $data = array();             
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=regimencolegio&action=index','query'=>$_GET['q']));                
        $cols = array("Codigo Regimen","Descripcion Regimen");               
        
        $opt = array("DescripcionRegimen"=>"Nombre Regimen");
        $data['grilla'] = $this->grilla("regimencolegio",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/regimencolegio/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function edit() {
        $obj = new regimencolegio();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['regimencolegiosPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_regimencolegio','code'=>$obj->idpadre));
        $view->setData($data);
        $view->setTemplate( '../view/regimencolegio/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new regimencolegio();
        if ($_POST['CodigoRegimen']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=regimencolegio');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=regimencolegio';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=regimencolegio');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=regimencolegio';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new regimencolegio();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=regimencolegio');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=regimencolegio';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }
    public function create() {
        $data = array();
        $view = new View();
        $data['regimencolegiosPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_regimencolegio'));
        $view->setData($data);
        $view->setTemplate( '../view/regimencolegio/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
   
}
?>
