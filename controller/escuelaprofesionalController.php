<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/escuelaprofesional.php';
class escuelaprofesionalController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="escuelaprofesional.DescripcionEscuela";}
        $obj = new escuelaprofesional();
        $data = array();             
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=escuelaprofesional&action=index','query'=>$_GET['q']));                
        $cols = array("Codigo Escuela","Codigo Facultad","Descripcion Escuela","Descripcion Facultad","Estado","Codigo Sira","Periodo Academico","Periodo Reglamentario","Abreviatura");        
        $opt = array("escuelaprofesional.DescripcionEscuela"=>"Nombre Escuela","facultades.DescripcionFacultad"=>"Nombre Facultad",
            "escuelaprofesional.EstadoEscuela"=>"Estado Escuela","escuelaprofesional.CodEscuelaSira"=>"Codigo Sira",
            "escuelaprofesional.CodigoTipoPeriodoAcademico"=>"Periodo Academico",
            "escuelaprofesional.PeriodoReglamentario"=>"Periodo Reglamentario","escuelaprofesional.Abreviatura"=>"Abreviatura");
        $data['grilla'] = $this->grilla("escuelaprofesional",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/escuelaprofesional/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function edit() {
        $obj = new escuelaprofesional();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['facultades'] = $this->Select(array('id'=>'CodigoFacultad','name'=>'CodigoFacultad','table'=>'facultades','code'=>$obj->CodigoFacultad));
        $view->setData($data);
        $view->setTemplate( '../view/escuelaprofesional/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new escuelaprofesional();
        if ($_POST['CodigoEscuela']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=escuelaprofesional');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] ='index.php?controller=escuelaprofesional';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=escuelaprofesional');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=escuelaprofesional';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new escuelaprofesional();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=escuelaprofesional');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=escuelaprofesional';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }
    public function create() {
        $data = array();
        $view = new View();
        $data['facultades'] = $this->Select(array('id'=>'CodigoFacultad','name'=>'CodigoFacultad','table'=>'facultades','code'=>$obj->CodigoFacultad));
        $view->setData($data);
        $view->setTemplate( '../view/escuelaprofesional/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function getEscuelaProfesional()
    {
        $ofic = $this->Select_ajax(array('id'=>'idcriterio','name'=>'idcriterio','table'=>'vista_escuelaprofesional','filtro'=>'CodigoFacultad','criterio'=>$_POST['CodigoFacultad']));
        echo $ofic;
    }
    
}
?>