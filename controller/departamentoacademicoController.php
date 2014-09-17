<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/departamentoacademico.php';

class departamentoacademicoController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="DescripcionDepartamento";}
        $obj = new departamentoAcademico();
        $data = array();             
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=departamentoacademico&action=index','query'=>$_GET['q']));                
       
        $cols = array("CODIGO","DescripcionDepartamento","EstadoDpto","Abreviatura");               
        
        $opt = array("departamentoacademico.DescripcionDepartamento"=>"Nombre Departamento Academico","departamentoacademico.EstadoDpto"=>"Estado Departamento","departamentoacademico.Abreviatura"=>"Abreviatura");
        $data['grilla'] = $this->grilla("departamentoacademico",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/departamentoacademico/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function edit() {
        $obj = new departamentoAcademico();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['departamentoacademicoPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_departamentoacademico','code'=>$obj->idpadre));
        $view->setData($data);
        $view->setTemplate( '../view/departamentoacademico/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new departamentoacademico();
        if ($_POST['CodigoDptoAcad']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=departamentoacademico');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=departamentoacademico';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=departamentoacademico');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=departamentoacademico';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new departamentoacademico();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=departamentoacademico');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] = 'index.php?controller=departamentoacademico';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }
    public function create() {
        $data = array();
        $view = new View();
        $data['departamentoacademicoPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_departamentoacademico'));
        $view->setData($data);
        $view->setTemplate( '../view/departamentoacademico/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
   
}
?>