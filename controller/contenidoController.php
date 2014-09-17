<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/contenido.php';
//require_once '../model/alumno.php';

class contenidoController extends Controller {

    public function index() {
//        if (!isset($_GET['p'])) {
//            $_GET['p'] = 1;
//        }
//        if (!isset($_GET['q'])) {
//            $_GET['q'] = "";
//        }
//        if (!isset($_GET['criterio'])) {
//            $_GET['criterio'] = "detalle_asignacion_tutoria.CodigoSemestre";
//        }
//         $obj = new asignaciontutoria();
//        $data = array();
//        $data['data'] = $obj->index($_GET['q'], $_GET['p'], $_GET['criterio']);
//        $data['query'] = $_GET['q'];
//        $data['pag'] = $this->Pagination(array('rows' => $data['data']['rowspag'], 'url' => 'index.php?controller=alumno&action=index', 'query' => $_GET['q']));
//        $cols = array("CODIGO", "Docente");
//         $opt = array("" => "------","CodigoSemestre" => "Semestre");
//          
//         $data['facultades'] = $this->Select(array('id' => 'CodigoFacultad', 'name' => 'CodigoFacultad', 'table' => 'facultades', 'code' => $obj->CodigoFacultad));
//         $data['semestreacademico'] = $this->SelectActual(array('id' => 'CodigoSemestre', 'name' => 'CodigoSemestre', 'table' => 'semestreacademico', 'code' => $obj->CodigoSemestre));
          $data['contenido']=  $this->grilla_informativo();  
//        $data['grilla'] = $this->grilla("asignaciontutoria", $cols, $data['data']['rows'], $data['pag'], false, false);
         
         $view = new View();
         
        $view->setData($data);
       
       
        
        
        $view->setTemplate('../view/contenido/_Index.php');
       
        $view->setLayout('../template/LayoutInformativo.php');
        
        $view->render();
         
        
         }
         public  function Parametros ()
         {
           $envio=$this->Datos_grilla(array('filtro' => 'CodigoSemestre','criterio' => $_POST['CodigoSemestre']));      
                echo $envio ;
            
             
         }

            public  function Parametros_facultad ()
         {
           $envio=$this->Datos_grilla_facultad(array('filtro' => 'CodigoFacultad','criterio' => $_POST['CodigoFacultad']));      
                echo $envio ;
            
             
         }


//    public function edit() {
//        $obj = new alumno();
//        $data = array();
//        $view = new View();
//        $obj = $obj->edit($_GET['id']);
//        $data['obj'] = $obj;
//
//        $data['tipocolegio'] = $this->Select(array('id' => 'CodigoTipoColegio', 'name' => 'CodigoTipoColegio', 'table' => 'tipocolegio', 'code' => $obj->CodigoTipoColegio));
//        $data['regimencolegio'] = $this->Select(array('id' => 'CodigoRegimen', 'name' => 'CodigoRegimen', 'table' => 'regimencolegio', 'code' => $obj->CodigoRegimen));
//        $data['estadosituacional'] = $this->Select(array('id' => 'CodigoEstadoSituacional', 'name' => 'CodigoEstadoSituacional', 'table' => 'estadosituacional', 'code' => $obj->CodigoEstadoSituacional));
//        $data['modalidadingreso'] = $this->Select(array('id' => 'CodigoModalidad', 'name' => 'CodigoModalidad', 'table' => 'modalidadingreso', 'code' => $obj->CodigoModalidad));
//        $data['tipoingreso'] = $this->Select(array('id' => 'CodigoTipoIngreso', 'name' => 'CodigoTipoIngreso', 'table' => 'tipoingreso', 'code' => $obj->CodigoTipoIngreso));
//        $data['facultades'] = $this->Select(array('id' => 'CodigoFacultad', 'name' => 'CodigoFacultad', 'table' => 'facultades', 'code' => $obj->CodigoFacultad));
//        $data['escuelaprofesional'] = $this->Select(array('id' => 'CodigoEscuela', 'name' => 'CodigoEscuela', 'table' => 'vista_escuelaprofesional', 'code' => $obj->CodigoEscuela));
//        $data['semestreacademico'] = $this->Select(array('id' => 'CodigoSemestre', 'name' => 'CodigoSemestre', 'table' => 'semestreacademico', 'code' => $obj->CodigoSemestre));
//        $data['departamento'] = $this->Select(array('id' => 'departamento', 'name' => 'departamento', 'table' => 'vista_departamento', 'code' => $obj->departamento));
//        $data['provincia'] = $this->Select(array('id' => 'provincia', 'name' => 'provincia', 'table' => 'vprovincia', 'code' => $obj->provincia));
//
//
//        $view->setData($data);
//        $view->setTemplate('../view/alumno/_Form.php');
//        $view->setLayout('../template/Layout.php');
//        $view->render();
//    }
//
//    public function save() {
//        $obj = new alumno();
//        if ($_POST['CodigoAlumno'] == '') {
//            $p = $obj->insert($_POST);
//
//            if ($p[0]) {
//                header('Location:index.php?controller=alumno');
//            } else {
//                $data = array();
//                $view = new View();
//                $data['msg'] = $p[1];
//                $data['url'] = 'index.php?controller=alumno';
//                $view->setData($data);
//                $view->setTemplate('../view/_Error_App.php');
//                $view->setLayout('../template/Layout.php');
//                $view->render();
//            }
//        } else {
//            $p = $obj->update($_POST);
//            if ($p[0]) {
//                header('Location: index.php?controller=alumno');
//            } else {
//                $data = array();
//                $view = new View();
//                $data['msg'] = $p[1];
//                $data['url'] = 'index.php?controller=alumno';
//                $view->setData($data);
//                $view->setTemplate('../view/_Error_App.php');
//                $view->setLayout('../template/Layout.php');
//                $view->render();
//            }
//        }
//    }
//
//    public function delete() {
//        $obj = new alumno();
//        $p = $obj->delete($_GET['id']);
//        if ($p[0]) {
//            header('Location: index.php?controller=alumno');
//        } else {
//            $data = array();
//            $view = new View();
//            $data['msg'] = $p[1];
//            $data['url'] = 'index.php?controller=alumno';
//            $view->setData($data);
//            $view->setTemplate('../view/_Error_App.php');
//            $view->setLayout('../template/Layout.php');
//            $view->render();
//        }
//    }
//
//    public function create() {
//        $data = array();
//        $view = new View();
//
//
//        $data['tipocolegio'] = $this->Select(array('id' => 'CodigoTipoColegio', 'name' => 'CodigoTipoColegio', 'table' => 'tipocolegio', 'code' => $obj->CodigoTipoColegio));
//        $data['regimencolegio'] = $this->Select(array('id' => 'CodigoRegimen', 'name' => 'CodigoRegimen', 'table' => 'regimencolegio', 'code' => $obj->CodigoRegimen));
//        $data['estadosituacional'] = $this->Select(array('id' => 'CodigoEstadoSituacional', 'name' => 'CodigoEstadoSituacional', 'table' => 'estadosituacional', 'code' => $obj->CodigoEstadoSituacional));
//        $data['modalidadingreso'] = $this->Select(array('id' => 'CodigoModalidad', 'name' => 'CodigoModalidad', 'table' => 'modalidadingreso', 'code' => $obj->CodigoModalidad));
//        $data['tipoingreso'] = $this->Select(array('id' => 'CodigoTipoIngreso', 'name' => 'CodigoTipoIngreso', 'table' => 'tipoingreso', 'code' => $obj->CodigoTipoIngreso));
//        $data['facultades'] = $this->Select(array('id' => 'CodigoFacultad', 'name' => 'CodigoFacultad', 'table' => 'facultades', 'code' => $obj->CodigoFacultad));
//        $data['semestreacademico'] = $this->Select(array('id' => 'CodigoSemestre', 'name' => 'CodigoSemestre', 'table' => 'semestreacademico', 'code' => $obj->CodigoSemestre));
//        $data['departamento'] = $this->Select(array('id' => 'departamento', 'name' => 'departamento', 'table' => 'vista_departamento', 'code' => $obj->departamento));
//        //$data['provincia'] = $this->Select(array('id'=>'provincia','name'=>'provincia','table'=>'ubigeos$','code'=>$obj->provincia));
//
//        $view->setData($data);
//        $view->setTemplate('../view/alumno/_Form.php');
//
//        $view->setLayout('../template/Layout.php');
//        $view->render();
//    }
//
//    public function getListaProvincias() {
//        $ofic = $this->Select_ajax_string(array('id' => 'idcriterio', 'name' => 'idcriterio', 'table' => 'ubigeos$', 'filtro' => 'DEPARTAM', 'criterio' => $_POST['departamento']));
//        echo $ofic;
//
//        }
//
//    public function getListaDistritos() {
//        $ofic = $this->Select_ajax_string_dis(array('id' => 'idcriterio', 'name' => 'idcriterio', 'table' => 'ubigeos$', 'filtro' => 'PROVINCIA', 'criterio' => $_POST['provincia']));
//        echo $ofic;
//    }
//    
//    
//    public function search()
//    {
//           if (!isset($_GET['p'])) {
//            $_GET['p'] = 1;
//        }
//        if (!isset($_GET['q'])) {
//            $_GET['q'] = "";
//        }
//        if (!isset($_GET['criterio'])) {
//            $_GET['criterio'] = "alumnos.NombreAlumno";
//        }
//
//        $obj = new alumno();
//        $data = array();
//        $data['data'] = $obj->index($_GET['q'], $_GET['p'], $_GET['criterio']);
//        $data['query'] = $_GET['q'];
//        $data['pag'] = $this->Pagination(array('rows' => $data['data']['rowspag'], 'url' => 'index.php?controller=alumno&action=index', 'query' => $_GET['q']));
//        $cols = array("CODIGO", "Nombre", "Apellidos", "Documentos", "Fecha Ingreso", "CodAlumnoSira");
//
//        $opt = array("NombreAlumno" => "Nombre Alumno", "CodAlumnoSira" => "Codigo Sira ");
//
//        $data['grilla'] = $this->grilla("alumno", $cols, $data['data']['rows'], $opt, $data['pag'], true, true);
//        $view = new View();
//        $view->setData($data);
//        $view->setTemplate( '../view/chofer/_Lista.php' );
//        $view->setLayout('../template/List.php');
//        $view->render();
//    }

}

?>
