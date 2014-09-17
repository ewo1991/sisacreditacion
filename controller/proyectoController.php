<?php

require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/ubigeos.php';
require_once '../model/proyecto.php';

class proyectoController extends Controller {  
    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="proyecto.nombre_proyecto";}
        $obj = new proyecto();
        $data = array();             
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=proyecto&action=index','query'=>$_GET['q']));                
        $cols = array("CODIGO","Nombre Proyecto","Periodo de Ejecucion","Presupuesto");        
        
        $opt = array("nombre_proyecto"=>"Nombre Proyecto","tema"=>"Tema ");
        
        $data['grilla'] = $this->grilla("proyecto",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/proyecto/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    
    
    public function edit() {
        $obj = new proyecto();
        $ubigeo = new ubigeos();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
       
                $data['tipo_proyecto'] = $this->Select(array('id'=>'idtipo_proyecto','name'=>'idtipo_proyecto','table'=>'tipo_proyecto','code'=>$obj->idtipo_proyecto));
                $data['eje_tematico'] = $this->Select(array('id'=>'idejetematico','name'=>'idejetematico','table'=>'eje_tematico','code'=>$obj->idejetematico));
                $data['linea_investigacion'] = $this->Select(array('id'=>'idlinea_investigacion','name'=>'idlinea_investigacion','table'=>'linea_investigacion','code'=>$obj->idlinea_investigacion));
                $data['facultad'] = $this->Select(array('id'=>'CodigoFacultad','name'=>'CodigoFacultad','table'=>'facultades','code'=>$obj->CodigoFacultad));
                $data['escuela'] = $this->Select(array('id'=>'CodigoEscuela','name'=>'CodigoEscuela','table'=>'vista_escuelaprofesional','code'=>$obj->CodigoEscuela));
       
                $ubigeos = $ubigeo->getDatos($obj->Ubigeo);
        $data['departamento'] = $this->Select(array('id' => 'departamento', 'name' => 'departamento', 'table' => 'vista_departamento', 'code' => $ubigeos['DEPARTAM']));
        $data['provincia'] = $this->Select_ajax_string_prov(array('id' => 'provincia', 'name' => 'provincia', 'table' => 'ubigeos$', 'filtro' => 'DEPARTAM', 'criterio' => $ubigeos['DEPARTAM'],  'code' => $ubigeos['PROVINCIA'], 'ajax'=> false));
        $data['distrito'] = $this->Select_ajax_string_dis(array('id' => 'distrito', 'name' => 'distrito', 'table' => 'ubigeos$', 'filtro' => 'PROVINCIA', 'criterio' => $ubigeos['PROVINCIA'],  'code' => $obj->Ubigeo, 'ajax'=> false));
       
                
        $view->setData($data);
        $view->setTemplate( '../view/proyecto/_Form_1.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
   
    
    public function save(){
        $obj = new proyecto();
        if ($_POST['idproyecto'] == '') {
            $p = $obj->insert($_POST);
            for($i=1;$i<=$_POST["conta"];$i++)
            {
            $p = $obj->insert_ob_esp($_POST['objetivos_especificos'.$i]);   
            }
            $p = $obj->insert_det_proy_prof_fun($_POST['codprof']); 
            
            if ($p[0]) {
                header('Location:index.php?controller=proyecto');
            } else {
                $data = array();
                $view = new View();
                $data['msg'] = $p[1];
                $data['url'] = 'index.php?controller=proyecto';
                $view->setData($data);
                $view->setTemplate('../view/_Error_App.php');
                $view->setLayout('../template/Layout.php');
                $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            for($i=1;$i<=$_POST["conta"];$i++)
            {
            $p = $obj->insert_ob_esp($_POST['objetivos_especificos'.$i]);   
            }
            if ($p[0]) {
                header('Location: index.php?controller=proyecto');
            } else {
                $data = array();
                $view = new View();
                $data['msg'] = $p[1];
                $data['url'] = 'index.php?controller=proyecto';
                $view->setData($data);
                $view->setTemplate('../view/_Error_App.php');
                $view->setLayout('../template/Layout.php');
                $view->render();
            }
        }
    }
    public function delete(){
        $obj = new proyecto();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=proyecto');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=proyecto';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
        
        
    }
    public function create() {
        $data = array();
        $view = new View();
        
        
                 $data['tipo_proyecto'] = $this->Select(array('id'=>'idtipo_proyecto','name'=>'idtipo_proyecto','table'=>'tipo_proyecto','code'=>$obj->idtipo_proyecto));
                 $data['eje_tematico'] = $this->Select(array('id'=>'idejetematico','name'=>'idejetematico','table'=>'eje_tematico','code'=>$obj->ideje_tematico));
                $data['linea_investigacion'] = $this->Select(array('id'=>'idlinea_investigacion','name'=>'idlinea_investigacion','table'=>'linea_investigacion','code'=>$obj->idlinea_investigacion));
                 $data['facultad'] = $this->Select(array('id'=>'CodigoFacultad','name'=>'CodigoFacultad','table'=>'facultades','code'=>$obj->CodigoFacultad));
                  $data['escuela'] = $this->Select(array('id'=>'CodigoEscuela','name'=>'CodigoEscuela','table'=>'escuelaprofesional','code'=>$obj->CodigoEscuela));
        
                 $data['departamento'] = $this->Select(array('id' => 'departamento', 'name' => 'departamento', 'table' => 'vista_departamento', 'code' => $obj->DEPARTAM));
      $data['provincia'] = $this->Select(array('id' => 'provincia', 'name' => 'provincia', 'table' => 'vpovincia', 'code' => $obj->PROVINCIA));
      $data['distrito'] = $this->Select(array('id' => 'distrito', 'name' => 'distrito', 'table' => 'ubigeos$', 'code' => $obj->UBIGEO));


        $view->setData($data);
        $view->setTemplate( '../view/proyecto/_Form_1.php' );
       
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
     
   

    public function getListaProvincias() {
        $ofic = $this->Select_ajax_string(array('id' => 'idcriterio', 'name' => 'idcriterio', 'table' => 'ubigeos$', 'filtro' => 'DEPARTAM', 'criterio' => $_POST['departamento']));
        echo $ofic;

        }

   public function getListaDistritos() {
        $ofic = $this->Select_ajax_string_dis(array('id' => 'idcriterio', 'name' => 'idcriterio', 'table' => 'ubigeos$', 'filtro' => 'PROVINCIA', 'criterio' => $_POST['provincia'],'ajax'=> true));
        echo $ofic;
    }
}
?>