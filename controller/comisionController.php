<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/comision.php';
class comisionController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="comision.decripcioncomision";}
        $obj = new comision();
        $data = array();             
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=comision&action=index','query'=>$_GET['q']));                
        $cols = array("Codigo Comision","Descripcion","Departamento Academico","Resolucion","Fecha Inicio","Fecha Termino");        
        $opt = array("comision.descripcioncomision"=>"Comision","departamentoacademico.DescripcionDepartamento"=>"Departamento Academico");
        $data['grilla'] = $this->grilla("comision",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/comision/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function edit() {
        $obj = new comision();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['departamentoacademico'] = $this->Select(array('id'=>'CodigoDptoAcad','name'=>'CodigoDptoAcad','table'=>'departamentoacademico','code'=>$obj->CodigoDptoAcad));
        $view->setData($data);
        $view->setTemplate( '../view/comision/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new comision();
        if ($_POST['idcomision']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=comision');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] ='index.php?controller=comision';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=comision');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=comision';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new comision();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=comision');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=comision';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }
    public function create() {
        $data = array();
        $view = new View();
        $data['departamentoacademico'] = $this->Select(array('id'=>'CodigoDptoAcad','name'=>'CodigoDptoAcad','table'=>'departamentoacademico','code'=>$obj->CodigoDptoAcad));
        $view->setData($data);
        $view->setTemplate( '../view/comision/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function getDepartamentoAcademico()
    {
        $ofic = $this->Select_ajax(array('id'=>'idcriterio','name'=>'idcriterio','table'=>'vista_departamentoacademico','filtro'=>'CodigoDptoAcad','criterio'=>$_POST['CodigoDptoAcad']));
        echo $ofic;
    }
    
}
?>