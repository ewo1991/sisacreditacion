<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/alumno.php';

//ande avisar malditos 
class alumnocursoController extends Controller {

    public function index() {

        $data = array();
$data['semestreacademico'] = $this->Select1(array('id' => 'semestreacademico', 'name' =>'semestreacademico','filtro'=>$_SESSION['idusuario']));
         
        
// die($_SESSION['idusuario']);
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/alumnocurso/_Index.php');
        $view->setLayout('../template/Layout.php');
        $view->render();
    }

    
    
    public function getCursos ()
       {
        $envio=$this->lista_recibir(array('filtro1' => 'CodigoSemestre','filtro' =>'CodigoAlumno','criterio1' => $_POST['CodigoSemestre'],'criterio' => $_SESSION['idusuario']));      
        echo $envio ;

       }
        
       
    public function getSilabus ()
       {
        $codcurso=$_POST["Codigo"];
        $codsemestre= $_POST["idSemestre"];
        
        $envio=$this->silabus_recibir(array('filtro' => 'CodigoCurso','filtro1' =>'CodigoSemestre','criterio' => $codcurso,'criterio1' => $codsemestre));      
//        echo $codcurso;
//        echo $codsemestre;
      echo $envio;
        
       }
       
       
       public function getUnidad ()
       {
        $codcurso=$_POST["CodigoCurso"];
        $codsemestre= $_POST["idSemestre"];
        
       $opt=$_POST['sin'];
        
        $envio=$this->unidad_recibir(array('filtro' => 'CodigoCurso','filtro1' =>'CodigoSemestre','criterio' => $codcurso,'criterio1' => $codsemestre,'option' => $opt));      
       
        echo $envio;
        
       }
       
       
       public function getUnidadF ()
       {
        $codcurso=$_POST["CodigoCurso"];
        $codsemestre= $_POST["idSemestre"];
        
       $opt="A";
        
        $envio=$this->unidad_recibir(array('filtro' => 'CodigoCurso','filtro1' =>'CodigoSemestre','criterio' => $codcurso,'criterio1' => $codsemestre,'option' => $opt));      
       
        echo $envio;
        
       }
       
       public function getUnidadid ()
       {
        $codcurso=$_POST["CodigoCurso"];
        $codsemestre= $_POST["idSemestre"];
        
       
        
        $envio=$this->unidad_recibirid(array('filtro' => 'CodigoCurso','filtro1' =>'CodigoSemestre','criterio' => $codcurso,'criterio1' => $codsemestre));      
       
        echo $envio;
        
       }
//        public function getSilabusid ()
//       {
//        $codcurso=$_POST["CodigoCurso"];
//        $codsemestre= $_POST["idSemestre"];
//        
//       
//        
//        $envio=$this->silabus_recibirid(array('filtro' => 'CodigoCurso','filtro1' =>'CodigoSemestre','criterio' => $codcurso,'criterio1' => $codsemestre));      
//       
//        echo $envio;
//        
//       }
       
       public function getTema()
       {
        $unidad=$_POST["Codigo"];
       
        
        $envio=$this->tema_recibir(array('filtro' => 'idunidad','criterio' => $unidad));      
       
        echo $envio;
        
       }
       
       
       public function getTemaF()
       {
        $unidad=$_POST["Codigo"];
       
        
        $envio=$this->tema_recibirF(array('filtro' => 'idunidad','criterio' => $unidad));      
       
        echo $envio;
        
       }
       
       
       
       public function getNotas()
       {
        $alumno=$_POST["CodigoAlumno"];
       $semestre=$_POST["idsemestre"];
       $curso=$_POST["idcurso"];
        
        $envio=$this->notas_alumno(array('filtro2' => 'CodigoAlumno','criterio2' => $alumno,'filtro' => 'CodigoSemestre','criterio' => $semestre,'filtro1' => 'CodigoCurso','criterio1' => $curso));      
       
        echo $envio;
//        echo $semestre;
//        echo $curso;
//        
       }
}
?>