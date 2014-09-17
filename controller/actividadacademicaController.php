<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/actividadacademica.php';

class actividadacademicaController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="DescripcionActividad";}
        $obj = new actividadacademica();
        $data = array();             
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=actividadacademica&action=index','query'=>$_GET['q']));                
        $cols = array("Codigo Actividad","Descripcion Actividad","Orden");               
        
        $opt = array("DescripcionActividad"=>"Nombre Actividad","Orden"=>"Orden");
        $data['grilla'] = $this->grilla("actividadacademica",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/actividadacademica/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function edit() {
        $obj = new actividadacademica();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['actividadacademicasPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_actividadacademica','code'=>$obj->idpadre));
        $view->setData($data);
        $view->setTemplate( '../view/actividadacademica/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new actividadacademica();
        if ($_POST['CodigoActividad']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=actividadacademica');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=actividadacademica';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=actividadacademica');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=actividadacademica';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new actividadacademica();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=actividadacademica');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=actividadacademica';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }
    public function create() {
        $data = array();
        $view = new View();
        $data['actividadacademicasPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_actividadacademica'));
        $view->setData($data);
        $view->setTemplate( '../view/actividadacademica/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
   
}
?>
