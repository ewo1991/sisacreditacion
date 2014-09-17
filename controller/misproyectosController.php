
<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/misproyectos.php';
//require_once '../model/alumno.php';

class misproyectosController extends Controller {

    public function index() {
        $data = array();
        $data['proyecto'] = $this->Select1(array('id' => 'proyecto', 'name' =>'proyecto','filtro'=>$_SESSION['idusuario']));  
        $data['tabla3']=  $this->grilla_miproyecto(); 
        
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/misproyectos/_Index.php');
        $view->setLayout('../template/Layout.php');
        $view->render();

         }
               public function edit() {
        $obj = new misproyectos();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['proyecto'] = $this->Select(array('id'=>'idproyecto','name'=>'idproyecto','table'=>'proyecto','code'=>$obj->idproyecto));
        $view->setData($data);
        $view->setTemplate( '../view/misproyectos/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new misproyectos();
        if ($_POST['idactividad']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=misproyectos');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=misproyectos';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=misproyectos');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=misproyectos';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new misproyectos();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=misproyectos');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=misproyectos';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }
    public function create() {
        $data = array();
        $view = new View();
        $data['proyecto'] = $this->Select(array('id'=>'idproyecto','name'=>'idproyecto','table'=>'proyecto','code'=>$obj->idproyecto));
        $view->setData($data);
        $view->setTemplate( '../view/misproyectos/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function getAnexo()
    {
        $ofic = $this->Select_ajax(array('id'=>'idcriterio','name'=>'idcriterio','table'=>'vista_actividad','filtro'=>'idproyecto','criterio'=>$_POST['idproyecto']));
        echo $ofic;
    }
         
    public function getDetalleProyecto ()
       {
        $codproyecto=$_POST['idproyecto'];
        $envio=$this->Detalle_Proyecto_P(array('criterio' => $codproyecto));
      echo $envio; 
       } 
         public function getDetalleProyecto1 ()
       {
        $codproyecto=$_POST['idproyecto'];
        $envio=$this->Detalle_Proyecto1_P(array('criterio' => $codproyecto));
      echo $envio; 
       }
         
     public function getListaProyecto ()
       {
        $codproyecto=$_POST['idproyecto'];
        $envio=$this->ListaProyecto_P(array('criterio' => $codproyecto));
      echo $envio; 
       }
       
        public function getMarco ()
       {
        $codproyecto=$_POST['idproyecto'];
        $envio=$this->Marco_P(array('criterio' => $codproyecto));
      echo $envio; 
       }
         public function getMetodologia ()
       {
        $codproyecto=$_POST['idproyecto'];
        $envio=$this->Metodologia_P(array('criterio' => $codproyecto));
      echo $envio; 
       }
          public function getAspectos()
       {
        $codproyecto=$_POST['idproyecto'];
        $envio=$this->Aspectos_P(array('criterio' => $codproyecto));
      echo $envio; 
       }     
    
    public function getListaAlumno() {
        $codproyecto = $_POST['idproyecto'];
        $envio = $this->ListaAlumno_P(array('criterio' => $codproyecto));
        echo $envio;
    }

    public function getListaDocente() {
        $codproyecto = $_POST['idproyecto'];
        $envio = $this->ListaDocente_P(array('criterio' => $codproyecto));
        echo $envio;
    }

       public function getActividad() {
        $codproyecto = $_POST['idproyecto'];
      
        $envio = $this->Actividad_P(array('criterio' => $codproyecto));
        echo $envio;
    }
   
         public function getFiltroEditar() {
        $codactividad = $_POST['idactividad'];
       
        $envio = $this->FiltroEditar_P(array('criterio' => $codactividad));
        echo $envio;
    }
    
    public function getNotas() {
        $codproyecto = $_POST['idproyecto'];
      
        $envio = $this->Notas_P(array('criterio' => $codproyecto));
        echo $envio;
    }
    
}

?>