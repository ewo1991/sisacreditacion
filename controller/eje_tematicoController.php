<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/eje_tematico.php';
class eje_tematicoController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="eje_tematico.nombre_ejetematico";}
        $obj = new eje_tematico();
        $data = array();             
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=eje_tematico&action=index','query'=>$_GET['q']));                
        $cols = array("Codigo Eje Tematico","Codigo Grupo","Descripcion Eje Tematico","Descripcion Grupo");        
        $opt = array("eje_tematico.nombre_ejetematico"=>"Nombre Eje Tematico","grupo.nombre_grupo"=>"Nombre Grupo");
        $data['grilla'] = $this->grilla("eje_tematico",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/eje_tematico/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function edit() {
        $obj = new eje_tematico();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['grupo'] = $this->Select(array('id'=>'idgrupo','name'=>'idgrupo','table'=>'grupo','code'=>$obj->idgrupo));
        $view->setData($data);
        $view->setTemplate( '../view/eje_tematico/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new eje_tematico();
        if ($_POST['idejetematico']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=eje_tematico');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] ='index.php?controller=eje_tematico';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=eje_tematico');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=eje_tematico';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new eje_tematico();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=eje_tematico');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=eje_tematico';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }
    public function create() {
        $data = array();
        $view = new View();
        $data['grupo'] = $this->Select(array('id'=>'idgrupo','name'=>'idgrupo','table'=>'grupo','code'=>$obj->idgrupo));
        $view->setData($data);
        $view->setTemplate( '../view/eje_tematico/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function getEje_tematico()
    {
        $ofic = $this->Select_ajax(array('id'=>'idcriterio','name'=>'idcriterio','table'=>'vista_ejetematico','filtro'=>'idgrupo','criterio'=>$_POST['idgrupo']));
        echo $ofic;
    }
}
?>