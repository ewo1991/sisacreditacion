<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/especialidadprofesional.php';
class especialidadprofesionalController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="especialidadprofesional.CodigoEspecialidad";}
        $obj = new especialidadprofesional();
        $data = array();             
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=especialidadprofesional&action=index','query'=>$_GET['q']));                
        $cols = array("Codigo de Especialidad","Descripcion","Codigo de Escuela","Codigo de Facultad");        
        $opt = array("especialidadprofesional.CodigoEspecialidad"=>"Codigo de Especialidad","especialidadprofesional.Descripcion"=>"Descripcion");
        $data['grilla'] = $this->grilla("especialidadprofesional",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/especialidadprofesional/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function edit() {
        $obj = new especialidadprofesional();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['escuelaprofesional'] = $this->Select(array('id'=>'CodigoEscuela','name'=>'CodigoEscuela','table'=>'escuelaprofesional','code'=>$obj->CodigoEscuela));
        $data['facultades'] = $this->Select(array('id'=>'CodigoFacultad','name'=>'CodigoFacultad','table'=>'facultades','code'=>$obj->CodigoFacultad));
        $view->setData($data);
        $view->setTemplate( '../view/especialidadprofesional/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new especialidadprofesional();
        if ($_POST['CodigoEspecialidad']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=especialidadprofesional');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] ='index.php?controller=especialidadprofesional';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=especialidadprofesional');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=especialidadprofesional';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new especialidadprofesional();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=especialidadprofesional');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=especialidadprofesional';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }
    public function create() {
        $data = array();
        $view = new View();
        $data['escuelaprofesional'] = $this->Select(array('id'=>'CodigoEscuela','name'=>'CodigoEscuela','table'=>'escuelaprofesional','code'=>$obj->CodigoEscuela));
        $data['facultades'] = $this->Select(array('id'=>'CodigoFacultad','name'=>'CodigoFacultad','table'=>'facultades','code'=>$obj->CodigoFacultad));
        $view->setData($data);
        $view->setTemplate( '../view/especialidadprofesional/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
   /* public function getEspecialidadProfesional()
    {
        $ofic = $this->Select_ajax(array('id'=>'idcriterio','name'=>'idcriterio','table'=>'vista_especialidadprofesional','filtro'=>'CodigoEscuela','criterio'=>$_POST['CodigoEscuela']));
        $ofic = $this->Select_ajax(array('id'=>'idcriterio','name'=>'idcriterio','table'=>'vista_especialidadprofesional','filtro'=>'CodigoFacultad','criterio'=>$_POST['CodigoFacultad']));
        echo $ofic;
    }*/
}
?>