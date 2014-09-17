<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/semestre.php';

class semestreController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="Descripcion";}
        $obj = new semestre();
        $data = array();             
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=semestre&action=index','query'=>$_GET['q']));                
        $cols = array("Codigo semestre","Descripcion","Concepto","Abreviatura","FechaInicio","FechaTermino");               
        
        $opt = array("CodigoSemestre","Descripcion","ConceptoCarnet","Abreviatura","FechaInicio","FechaTermino");
        $data['grilla'] = $this->grilla("semestre",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/semestre/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function edit() {
        $obj = new semestre();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['semestrePadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_semestre','code'=>$obj->idpadre));
        $view->setData($data);
        $view->setTemplate( '../view/semestre/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new semestre();
        if ($_POST['CodigoSemestre']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=semestre');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=semestre';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=semestre');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=semestre';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new semestre();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=semestre');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=semestre';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }
    public function create() {
        $data = array();
        $view = new View();
        $data['semestrePadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_semestre'));
        $view->setData($data);
        $view->setTemplate( '../view/semestre/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
   
}
?>
