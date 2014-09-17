<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/solicitaproyectos.php';
//require_once '../model/alumno.php';

class solicitaproyectosController extends Controller {

    public function index() {
            
        $data['tabla4']=  $this->grilla_solicitaproyecto();
          
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/solicitaproyectos/_Index.php');
        $view->setLayout('../template/Layout.php');
        $view->render();
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
       
        public function getListaAlumno1 ()
       {
        $codproyecto=$_POST['idproyecto'];
        $envio=$this->ListaAlumno1_P(array('criterio' => $codproyecto));     
      echo $envio;
       }
       
   public function getListaDocente ()
       {
        $codproyecto=$_POST['idproyecto'];
        $envio=$this->ListaDocente_P(array('criterio' => $codproyecto));
      echo $envio;  
       }
         public function getDetallePdf ()
       {
        $codproyecto=$_POST['idproyecto'];
        $envio=$this->ListaPdf_P(array('criterio' => $codproyecto));
      echo $envio;  
       }
       
       public function save(){echo "<script>alert('Se ha enviado la solicitud');</script>";
                      echo header("Location: index.php?controller=solicitaproyectos");
       
        $obj = new listaproyecto();
        
            $p = $obj->insert($_POST);
            if ($p[0]){
                die("<script>alert()</script>");
              
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=solicitaproyectos';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        
	}
       
    

}

 
?>