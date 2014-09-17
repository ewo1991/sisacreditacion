<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/plancurricular.php';
class plancurricularController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="DescripcionPlan";}
        $obj = new plancurricular();
        $data = array();             
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=plancurricular&action=index','query'=>$_GET['q']));                
        $cols = array("Codigo Plan Curricular","Escuela ","Facultad","Plan Curricular","Estado del Plan Curricular","Creditos Obligatorios","Creditos Electivos","Resolucion","Tipo","Vigente");        
        $opt = array("plancurricular.CodigoPlan"=>"Codigo Plan Curricular","plancurricular.CodigoEscuela"=>"Codigo Escuela","plancurricular.CodigoEscuela"=>"Codigo Escuela","plancurricular.CodigoFacultad"=>"Codigo Facultad","plancurricular.DescripcionPlan"=>"Descripcion Plan","plancurricular.EstadoPlanCurricular"=>"Estado del Plan","plancurricular.CreditosObligatorios"=>"Creditos Obligatorios",
                "plancurricular.CreditosElectivos"=>"Creditos Electivos","plancurricular.Resolucion"=>"Resolucion","plancurricular.Tipo"=>"Tipo","plancurricular.Vigente"=>"Vigente");
        $data['grilla'] = $this->grilla("plancurricular",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/plancurricular/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function edit() {
        $obj = new plancurricular();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['facultades'] = $this->Select(array('id'=>'CodigoFacultad','name'=>'CodigoFacultad','table'=>'facultades','code'=>$obj->CodigoFacultad));
        $data['escuelaprofesional'] = $this->Select(array('id'=>'CodigoEscuela','name'=>'CodigoEscuela','table'=>'escuelaprofesional','code'=>$obj->CodigoEscuela));
        $view->setData($data);
        $view->setTemplate( '../view/plancurricular/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new plancurricular();
        if ($_POST['CodigoPlan']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=plancurricular');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] ='index.php?controller=plancurricular';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=plancurricular');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=plancurricular';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new plancurricular();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=plancurricular');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=plancurricular';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }
    public function create() {
        $data = array();
        $view = new View();
       // $data['escuelaprofesional'] = $this->Select(array('id'=>'CodigoEscuela','name'=>'CodigoEscuela','table'=>'escuelaprofesional','code'=>$obj->CodigoEscuela));
        $data['facultades'] = $this->Select(array('id'=>'CodigoFacultad','name'=>'CodigoFacultad','table'=>'facultades','code'=>$obj->CodigoFacultad));      
        $view->setData($data);
        $view->setTemplate( '../view/plancurricular/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function getPlanCurricular()
    {
        $ofic = $this->Select_ajax(array('id'=>'idcriterio','name'=>'idcriterio','table'=>'vista_plancurricular','filtro'=>'CodigoFacultad','criterio'=>$_POST['CodigoFacultad']));
        $ofic = $this->Select_ajax(array('id'=>'idcriterio','name'=>'idcriterio','table'=>'vista_plancurricular','filtro'=>'CodigoEscuela','criterio'=>$_POST['CodigoEscuela']));
        echo $ofic;
    }
}
?>