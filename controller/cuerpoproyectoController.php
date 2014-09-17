<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/cuerpoproyecto.php';
class cuerpoproyectoController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="descripcion";}
        $obj = new cuerpoproyecto();
        $data = array();             
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=cuerpoproyecto&action=index','query'=>$_GET['q']));                
        $cols = array("Codigo","INDICE","CUERPO PROYECTO","PADRE INDICE");        
       
        $opt = array("idcuerpo_proyecto"=>"CODIGO","idindice"=>"INDICE",
            "descripcion"=>"DESC CUERPO PROYEC","idindice_padre"=>"PADRE INDICE");
        $data['grilla'] = $this->grilla("cuerpoproyecto",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/cuerpoproyecto/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function edit() {
        $obj = new cuerpoproyecto();
        $data = array();
        $view = new View();
        
        $obj = $obj->edit($_GET['id']); 
       
        $data['obj'] = $obj;
        $data['indicepadre'] = $this->Select(array('id'=>'indicepadre','name'=>'indicepadre','table'=>'cuerpo_proyecto','code'=>$obj->idcuerpo_proyecto));
        
        $view->setData($data);
        $view->setTemplate( '../view/cuerpoproyecto/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        
        $obj = new cuerpoproyecto();
      
        if ($_POST['idcuerpo_proyecto']=='') {
            
            $p = $obj->insert($_POST);
            
            if ($p[0]){
                header('Location: index.php?controller=cuerpoproyecto');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] ='index.php?controller=cuerpoproyecto';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
          
            $p = $obj->update($_POST);            
            if ($p[0]){
                header('Location: index.php?controller=cuerpoproyecto');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=cuerpoproyecto';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new cuerpoproyecto();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=cuerpoproyecto');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=cuerpoproyecto';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }
    public function create() {
        $data = array();
        $view = new View();
       $data['indicepadre'] = $this->Select(array('id'=>'indicepadre','name'=>'indicepadre','table'=>'cuerpo_proyecto','code'=>$obj->idcuerpo_proyecto)); 
        $view->setData($data);
        $view->setTemplate( '../view/cuerpoproyecto/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
	
    public function getProfesores()
    {
        $ofic = $this->Select_ajax(array('id'=>'idcriterio','name'=>'idcriterio','table'=>'vista_profesores','filtro'=>'CodigoCondicion','criterio'=>$_POST['CodigoCondicion']));
        echo $ofic;
    }
	
      
}
?>