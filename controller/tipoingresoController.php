<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/tipoingreso.php';

class tipoingresoController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="DescripcionTipoIngreso";}
        $obj = new tipoingreso();
        $data = array();             
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=tipoingreso&action=index','query'=>$_GET['q']));                
        $cols = array("CODIGO","Tipo Ingreso","Tipo Modalidad");        
        $opt = array("DescripcionTipoIngreso"=>"Tipo Ingreso","DescripcionModalidad"=>"Tipo Modalidad");
        
        $data['grilla'] = $this->grilla("tipoingreso",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/tipoingreso/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function edit() {
        $obj = new tipoingreso();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['modalidadingreso'] = $this->Select(array('id'=>'CodigoModalidad','name'=>'CodigoModalidad','table'=>'modalidadingreso','code'=>$obj->CodigoModalidad));
       
        $view->setData($data);
        $view->setTemplate( '../view/tipoingreso/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new tipoingreso();
        if ($_POST['CodigoTipoIngreso']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location:index.php?controller=tipoingreso');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] ='index.php?controller=tipoingreso';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=tipoingreso');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] = 'index.php?controller=tipoingreso';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new tipoingreso();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=tipoingreso');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=tipoingreso';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }
    public function create() {
        $data = array();
        $view = new View();
        $data['modalidadingreso'] = $this->Select(array('id'=>'CodigoModalidad','name'=>'CodigoModalidad','table'=>'modalidadingreso','code'=>$obj->CodigoModalidad));
        $view->setData($data);
        $view->setTemplate( '../view/tipoingreso/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function getModalidadIngreso()
    {
        $ofic = $this->Select_ajax(array('id'=>'idcriterio','name'=>'idcriterio','table'=>'vista_tipoingreso','filtro'=>'CodigoModalidad','criterio'=>$_POST['CodigoModalidad']));
        echo $ofic;
    }
}
?>