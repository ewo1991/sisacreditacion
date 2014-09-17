<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/areacurricular.php';

class areacurricularController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="DescripcionArea";}
        $obj = new AreaCurricular();
        $data = array();             
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=areacurricular&action=index','query'=>$_GET['q']));                
       
        $cols = array("CODIGO","AREA","TOTAL CURSOS","TOTAL CREDITOS");               
        
        $opt = array("areacurricular.DescripcionArea"=>"Nombre Area Curricular","areacurricular.TotalCursos"=>"Total cursos","areacurricular.TotalCreditos"=>"Total creditos");
        $data['grilla'] = $this->grilla("areacurricular",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/areacurricular/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function edit() {
        $obj = new AreaCurricular();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['areacurricularPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_areacurricular','code'=>$obj->idpadre));
        $view->setData($data);
        $view->setTemplate( '../view/areacurricular/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new areacurricular();
        if ($_POST['CodigoAreaCurricular']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=areacurricular');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=areacurricular';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=areacurricular');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=areacurricular';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new areacurricular();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=areacurricular');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] = 'index.php?controller=areacurricular';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }
    public function create() {
        $data = array();
        $view = new View();
        $data['areacurricularPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_areacurricular'));
        $view->setData($data);
        $view->setTemplate( '../view/areacurricular/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
   
}
?>