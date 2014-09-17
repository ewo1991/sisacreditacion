<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/profesores.php';
class profesoresController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="profesores.NombreProfesor";}
        $obj = new profesores();
        $data = array();             
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=profesores&action=index','query'=>$_GET['q']));                
        $cols = array("Codigo","Apellidos","Nombre","Estado","Dedicacion","Condicion","Categoria","Departamento Academico");        
       
        $opt = array("profesores.ApellidoPaterno"=>"Apellido Paterno","profesores.ApellidoMaterno"=>"Apellido Materno",
            "profesores.NombreProfesor"=>"Nombre Profesor","condicion.DescripcionCondicion"=>"Descripcion Condicion",
            "profesores.DescripcionCategoria"=>"Descripcion Categoria");
        $data['grilla'] = $this->grilla('profesores',$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/profesores/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function edit() {
        $obj = new profesores();
        $data = array();
        $view = new View();
        
        $obj = $obj->edit($_GET['id']); 
       
        $data['obj'] = $obj;
        $data['condicion'] = $this->Select(array('id'=>'CodigoCondicion','name'=>'CodigoCondicion','table'=>'condicion','code'=>$obj->CodigoCondicion));
        $data['categoria'] = $this->Select(array('id'=>'CodigoCategoria','name'=>'CodigoCategoria','table'=>'categoria','code'=>$obj->CodigoCategoria));
        $data['dedicacion'] = $this->Select(array('id'=>'CodigoDedicacion','name'=>'CodigoDedicacion','table'=>'dedicacion','code'=>$obj->CodigoDedicacion));
        $data['departamentoacademico'] = $this->Select(array('id'=>'CodigoDptoAcad','name'=>'CodigoDptoAcad','table'=>'departamentoacademico','code'=>$obj->CodigoDptoAcad));
        $data['profesoress'] = $this->Select(array('id'=>'CodigoProfesors','name'=>'CodigoProfesors','table'=>'profesores','code'=>$obj->CodigoProfesor));
         $data['departamento'] = $this->Select(array('id'=>'departamento','name'=>'departamento','table'=>'vista_departamento','code'=>$obj->departamento));
          $data['provincia'] = $this->Select(array('id'=>'provincia','name'=>'provincia','table'=>'vprovincia','code'=>$obj->provincia));
                
        $view->setData($data);
        $view->setTemplate( '../view/profesores/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        
        $obj = new profesores();
      
        if ($_POST['CodigoProfesor']=='') {
            
            $p = $obj->insert($_POST);
            
            if ($p[0]){
                header('Location: index.php?controller=profesores');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] ='index.php?controller=profesores';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
          
            $p = $obj->update($_POST);            
            if ($p[0]){
                header('Location: index.php?controller=profesores');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=profesores';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new profesores();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=profesores');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=profesores';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }
    public function create() {
        $data = array();
        $view = new View();
       
        $data['condicion'] = $this->Select(array('id'=>'CodigoCondicion','name'=>'CodigoCondicion','table'=>'condicion','code'=>$obj->CodigoCondicion));
        $data['categoria'] = $this->Select(array('id'=>'CodigoCategoria','name'=>'CodigoCategoria','table'=>'categoria','code'=>$obj->CodigoCategoria));
        $data['dedicacion'] = $this->Select(array('id'=>'CodigoDedicacion','name'=>'CodigoDedicacion','table'=>'dedicacion','code'=>$obj->CodigoDedicacion));
        $data['departamentoacademico'] = $this->Select(array('id'=>'CodigoDptoAcad','name'=>'CodigoDptoAcad','table'=>'departamentoacademico','code'=>$obj->CodigoDptoAcad));
        $data['profesoress'] = $this->Select(array('id'=>'CodigoProfesors','name'=>'CodigoProfesors','table'=>'profesores','code'=>$obj->CodigoProfesor));
        $data['departamento'] = $this->Select(array('id'=>'departamento','name'=>'departamento','table'=>'vista_departamento','code'=>$obj->departamento));
                 
        $view->setData($data);
        $view->setTemplate( '../view/profesores/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
	
         public function getListaProvincias() {
        $ofic = $this->Select_ajax_string(array('id'=>'idcriterio','name'=>'idcriterio','table'=>'ubigeos$','filtro'=>'DEPARTAM','criterio'=>$_POST['departamento']));
        echo $ofic;
    }
    
    public function getListaDistritos() {
        $ofic = $this->Select_ajax_string_dis(array('id'=>'idcriterio','name'=>'idcriterio','table'=>'ubigeos$','filtro'=>'PROVINCIA','criterio'=>$_POST['provincia']));
        echo $ofic;
    }
   
}
?>