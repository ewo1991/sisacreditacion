<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/linea_investigacion.php';
class linea_investigacionController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="linea_investigacion.nombre_linea";}
        $obj = new linea_investigacion();
        $data = array();             
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=linea_investigacion&action=index','query'=>$_GET['q']));                
        $cols = array("Codigo Linea Investigacion","Codigo Eje tematico","Descripcion Linea Investigacion","Descripcion Eje Tematico");        
        $opt = array("linea_investigacion.nombre_linea"=>"Nombre Linea Investigacion","eje_tematico.nombre_ejetematico"=>"Nombre Eje Tematico");
        $data['grilla'] = $this->grilla("linea_investigacion",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/linea_investigacion/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function edit() {
        $obj = new linea_investigacion();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['eje_tematico'] = $this->Select(array('id'=>'idejetematico','name'=>'idejetematico','table'=>'eje_tematico','code'=>$obj->idejetematico));
        $view->setData($data);
        $view->setTemplate( '../view/linea_investigacion/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new linea_investigacion();
        if ($_POST['idlinea_investigacion']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=linea_investigacion');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] ='index.php?controller=linea_investigacion';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=linea_investigacion');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=linea_investigacion';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new linea_investigacion();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=linea_investigacion');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=linea_investigacion';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }
    public function create() {
        $data = array();
        $view = new View();
        $data['eje_tematico'] = $this->Select(array('id'=>'idejetematico','name'=>'idejetematico','table'=>'eje_tematico','code'=>$obj->idejetematico));
        $view->setData($data);
        $view->setTemplate( '../view/linea_investigacion/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function getLinea_investigacion()
    {
        $ofic = $this->Select_ajax(array('id'=>'idcriterio','name'=>'idcriterio','table'=>'vista_linea_investigacion','filtro'=>'idejetematico','criterio'=>$_POST['idejetematico']));
        echo $ofic;
    }
}
?>