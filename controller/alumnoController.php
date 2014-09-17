<?php

require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/ubigeos.php';
require_once '../model/alumno.php';

class alumnoController extends Controller {

    public function index() {
        if (!isset($_GET['p'])) {
            $_GET['p'] = 1;
        }
        if (!isset($_GET['q'])) {
            $_GET['q'] = "";
        }
        if (!isset($_GET['criterio'])) {
            $_GET['criterio'] = "alumnos.NombreAlumno";
        }

        $obj = new alumno();
        $data = array();
        $data['data'] = $obj->index($_GET['q'], $_GET['p'], $_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows' => $data['data']['rowspag'], 'url' => 'index.php?controller=alumno&action=index', 'query' => $_GET['q']));
        $cols = array("CODIGO", "Nombre", "Apellidos", "Documentos", "Fecha Ingreso", "CodAlumnoSira");

        $opt = array("NombreAlumno" => "Nombre Alumno", "CodAlumnoSira" => "Codigo Sira ");

        $data['grilla'] = $this->grilla("alumno", $cols, $data['data']['rows'], $opt, $data['pag'], true, true);
        
      
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/alumno/_Index.php');
        $view->setLayout('../template/Layout.php');
        $view->render();
    }

   public function edit() {
       $obj = new alumno();
        $ubigeo = new ubigeos();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;

        $data['tipocolegio'] = $this->Select(array('id' => 'CodigoTipoColegio', 'name' => 'CodigoTipoColegio', 'table' => 'tipocolegio', 'code' => $obj->CodigoTipoColegio));
        $data['regimencolegio'] = $this->Select(array('id' => 'CodigoRegimen', 'name' => 'CodigoRegimen', 'table' => 'regimencolegio', 'code' => $obj->CodigoRegimen));
        $data['estadosituacional'] = $this->Select(array('id' => 'CodigoEstadoSituacional', 'name' => 'CodigoEstadoSituacional', 'table' => 'estadosituacional', 'code' => $obj->CodigoEstadoSituacional));
        $data['modalidadingreso'] = $this->Select(array('id' => 'CodigoModalidad', 'name' => 'CodigoModalidad', 'table' => 'modalidadingreso', 'code' => $obj->CodigoModalidad));
        $data['tipoingreso'] = $this->Select(array('id' => 'CodigoTipoIngreso', 'name' => 'CodigoTipoIngreso', 'table' => 'tipoingreso', 'code' => $obj->CodigoTipoIngreso));
        $data['facultad'] = $this->Select(array('id'=>'CodigoFacultad','name'=>'CodigoFacultad','table'=>'facultades','code'=>$obj->CodigoFacultad));
        $data['escuela'] = $this->Select(array('id'=>'CodigoEscuela','name'=>'CodigoEscuela','table'=>'vista_escuelaprofesional','code'=>$obj->CodigoEscuela));
       
        $data['semestreacademicoIngreso'] = $this->Select(array('id' => 'CodigoSemestreIngreso', 'name' => 'CodigoSemestreIngreso', 'table' => 'semestreacademico', 'code' => $obj->CodigoSemestreIngreso));
        $data['semestreacademicoEgreso'] = $this->Select(array('id' => 'CodigoSemestreEgreso', 'name' => 'CodigoSemestreEgreso', 'table' => 'semestreacademico', 'code' => $obj->CodigoSemestreEgreso));

        $ubigeos = $ubigeo->getDatos($obj->Ubigeo);
        $data['departamento'] = $this->Select(array('id' => 'departamento', 'name' => 'departamento', 'table' => 'vista_departamento', 'code' => $ubigeos['DEPARTAM']));
        $data['provincia'] = $this->Select_ajax_string_prov(array('id' => 'provincia', 'name' => 'provincia', 'table' => 'ubigeos$', 'filtro' => 'DEPARTAM', 'criterio' => $ubigeos['DEPARTAM'],  'code' => $ubigeos['PROVINCIA'], 'ajax'=> false));
        $data['distrito'] = $this->Select_ajax_string_dis(array('id' => 'distrito', 'name' => 'distrito', 'table' => 'ubigeos$', 'filtro' => 'PROVINCIA', 'criterio' => $ubigeos['PROVINCIA'],  'code' => $obj->Ubigeo, 'ajax'=> false));
       
        $view->setData($data);
        $view->setTemplate('../view/alumno/_Form.php');
        $view->setLayout('../template/Layout.php');
        $view->render();
    }

    public function save() {
        $obj = new alumno();
        if ($_POST['CodigoAlumno'] == '') {
            $p = $obj->insert($_POST);

            if ($p[0]) {
                header('Location:index.php?controller=alumno');
            } else {
                $data = array();
                $view = new View();
                $data['msg'] = $p[1];
                $data['url'] = 'index.php?controller=alumno';
                $view->setData($data);
                $view->setTemplate('../view/_Error_App.php');
                $view->setLayout('../template/Layout.php');
                $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]) {
                header('Location: index.php?controller=alumno');
            } else {
                $data = array();
                $view = new View();
                $data['msg'] = $p[1];
                $data['url'] = 'index.php?controller=alumno';
                $view->setData($data);
                $view->setTemplate('../view/_Error_App.php');
                $view->setLayout('../template/Layout.php');
                $view->render();
            }
        }
    }

    public function delete() {
        $obj = new alumno();
        $p = $obj->delete($_GET['id']);
        if ($p[0]) {
            header('Location:index.php?controller=alumno');
        } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] = 'index.php?controller=alumno';
            $view->setData($data);
            $view->setTemplate('../view/_Error_App.php');
            $view->setLayout('../template/Layout.php');
            $view->render();
        }
    }

    public function create() {
        $data = array();
        $view = new View();


        $data['tipocolegio'] = $this->Select(array('id' => 'CodigoTipoColegio', 'name' => 'CodigoTipoColegio', 'table' => 'tipocolegio', 'code' => $obj->CodigoTipoColegio));
        $data['regimencolegio'] = $this->Select(array('id' => 'CodigoRegimen', 'name' => 'CodigoRegimen', 'table' => 'regimencolegio', 'code' => $obj->CodigoRegimen));
        $data['estadosituacional'] = $this->Select(array('id' => 'CodigoEstadoSituacional', 'name' => 'CodigoEstadoSituacional', 'table' => 'estadosituacional', 'code' => $obj->CodigoEstadoSituacional));
        $data['modalidadingreso'] = $this->Select(array('id' => 'CodigoModalidad', 'name' => 'CodigoModalidad', 'table' => 'modalidadingreso', 'code' => $obj->CodigoModalidad));
        $data['tipoingreso'] = $this->Select(array('id' => 'CodigoTipoIngreso', 'name' => 'CodigoTipoIngreso', 'table' => 'tipoingreso', 'code' => $obj->CodigoTipoIngreso));
        $data['facultad'] = $this->Select(array('id'=>'CodigoFacultad','name'=>'CodigoFacultad','table'=>'facultades','code'=>$obj->CodigoFacultad));
        $data['escuela'] = $this->Select(array('id'=>'CodigoEscuela','name'=>'CodigoEscuela','table'=>'vista_escuelaprofesional','code'=>$obj->CodigoEscuela));
      
        $data['semestreacademicoIngreso'] = $this->Select(array('id' => 'CodigoSemestreIngreso', 'name' => 'CodigoSemestreIngreso', 'table' => 'semestreacademico', 'code' => $obj->CodigoSemestreIngreso));
        $data['semestreacademicoEgreso'] = $this->Select(array('id' => 'CodigoSemestreEgreso', 'name' => 'CodigoSemestreEgreso', 'table' => 'semestreacademico', 'code' => $obj->CodigoSemestreEgreso));
      
      $data['departamento'] = $this->Select(array('id' => 'departamento', 'name' => 'departamento', 'table' => 'vista_departamento', 'code' => $obj->DEPARTAM));
      $data['provincia'] = $this->Select(array('id' => 'provincia', 'name' => 'provincia', 'table' => 'vpovincia', 'code' => $obj->PROVINCIA));
      $data['distrito'] = $this->Select(array('id' => 'distrito', 'name' => 'distrito', 'table' => 'ubigeos$', 'code' => $obj->UBIGEO));


        $view->setData($data);
        $view->setTemplate('../view/alumno/_Form.php');

        $view->setLayout('../template/Layout.php');
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
    
    
   public function search_por_facultad()
    {  
         if (!isset($_GET['p'])){$_GET['p']=1;}
         $obj = new alumno();
        $data = array();
        if(!isset($_GET['q'])){$_GET['q']="";}
        if(!isset($_GET['p'])){$_GET['p']="";}
       if (!isset($_GET['criterio'])) {
            $_GET['criterio'] = "alumnos.NombreAlumno";
        }
        $fac=$_GET['fac'];if(empty($fac)){$fac=$_POST['fac'];}
        $data['sinCab']=$_POST['sinCab'];
        $data['data'] = $obj->indexBuscarAlumno($_GET['q'],$_GET['p'],$_GET['criterio'],$fac);
        
        $data['query'] = $_GET['q'];
        
        
        $data['pag'] = $this->Pagination2(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=alumno&action=search_por_facultad&criterio='.$_GET['criterio'],'query'=>$_GET['q'],'fac'=>$_GET['fac']));
        $cols = array();
         $cols = array("CODIGO", "Nombre", "Apellidos", "Documentos", "Fecha Ingreso", "CodAlumnoSira","Estado");
        $opt = array("NombreAlumno" => "Nombre Alumno", "CodAlumnoSira" => "Codigo Sira ");
         $data['grilla'] = $this->grilla("alumno", $cols, $data['data']['rows'], $opt, $data['pag'], false, false,true,false);

        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/alumno/_Lista.php' );
        $view->setLayout('../template/List.php');
        $view->render();
    }

}

?>