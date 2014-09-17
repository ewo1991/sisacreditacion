<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/sedeescuela.php';
class sedeescuelaController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="sedeescuela.CodigoSedeEscuela";}
        $obj = new sedeescuela();
        $data = array();             
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=sedeescuela&action=index','query'=>$_GET['q']));                
        $cols = array("Codigo De Sede Escuela","Codigo De Sira","Codigo De Siga","Facultad","Codigo Facultad","Sede","Escuela","Codigo Escuela");        
        $opt = array("sedeescuela.CodigoSedeEscuela"=>"Codigo sede Escuela","sedeescuela.CodigoFacultad"=>"Codigo Facultad","sedeescuela.CodigoEscuela"=>"Codigo Escuela","sedeescuela.CodigoSede"=>"Codigo Sede","sedeescuela.CodigoSiga"=>"Codigon Siga","sedeescuela.CodigoSira"=>"Codigo Sira");
        $data['grilla'] = $this->grilla("sedeescuela",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/sedeescuela/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function edit() {
        $obj = new sedeescuela();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['facultades'] = $this->Select(array('id'=>'CodigoFacultad','name'=>'CodigoFacultad','table'=>'facultades','code'=>$obj->CodigoFacultad));
        $data['escuelaprofesional'] = $this->Select(array('id'=>'CodigoEscuela','name'=>'CodigoEscuela','table'=>'escuelaprofesional','code'=>$obj->CodigoEscuela));
        $data['sedes'] = $this->Select(array('id'=>'CodigoSede','name'=>'CodigoSede','table'=>'sedes','code'=>$obj->CodigoSede));
        $view->setData($data);
        $view->setTemplate( '../view/sedeescuela/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new sedeescuela();
        if ($_POST['CodigoSedeEscuela']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=sedeescuela');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] ='index.php?controller=sedeescuela';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=sedeescuela');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=sedeescuela';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new sedeescuela();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=sedeescuela');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=sedeescuela';
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
       // $data['escuelaprofesional'] = $this->Select(array('id'=>'CodigoEscuela','name'=>'CodigoEscuela','table'=>'escuelaprofesional','code'=>$obj->CodigoEscuela));
        $data['sedes'] = $this->Select(array('id'=>'CodigoSede','name'=>'CodigoSede','table'=>'sedes','code'=>$obj->CodigoSede));
        $view->setData($data);
        $view->setTemplate( '../view/sedeescuela/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function getSedeEscuela()
    {
        $ofic = $this->Select_ajax(array('id'=>'idcriterio','name'=>'idcriterio','table'=>'vista_sedeescuelas','filtro'=>'CodigoFacultad','criterio'=>$_POST['CodigoFacultad']));
        $ofic = $this->Select_ajax(array('id'=>'idcriterio','name'=>'idcriterio','table'=>'vista_sedeescuelas','filtro'=>'CodigoEscuela','criterio'=>$_POST['CodigoEscuela']));
        echo $ofic;
    }
}
?>