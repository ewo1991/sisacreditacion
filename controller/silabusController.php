<?php

require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/silabus.php';

class silabusController extends Controller {

    public function index() {
        if (!isset($_GET['p'])) {
            $_GET['p'] = 1;
        }
        if (!isset($_GET['q'])) {
            $_GET['q'] = "";
        }
        if (!isset($_GET['criterio'])) {
            $_GET['criterio'] = "sumilla";
        }//SI EXISTE EL CAMPO SUMILLA QUE INGRESE
        $obj = new silabus();
        $data = array();
        $data['data'] = $obj->index($_GET['q'], $_GET['p'], $_GET['criterio']); //SI EXISTE CRITERIO QUE BUSQUE
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows' => $data['data']['rowspag'], 'url' => 'index.php?controller=silabus&action=index', 'query' => $_GET['q']));
        $cols = array("CODIGO", "CODIGO CARGA ACADEM", "SUMILLA", "METODOLOGIA", "PROFESOR", "CURSO", "FECHA INI", "DURACION", "SEMESTRE");  //CABECERA DE LOS CAMPOS DE GRILLA      
        $opt = array("idsilabus" => "CODIGO", "idcargaacademica" => "CARGA ACADEMICA", "SUMILLA" => "sumilla"); //BUSQUEDA DE CAMPOS

        $data['grilla'] = $this->grilla("silabus", $cols, $data['data']['rows'], $opt, $data['pag'], true, true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/silabus/_Index.php');
        $view->setLayout('../template/Layout.php');
        $view->render();
    }

    public function edit() {
        $obj = new silabus();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['cargaacademica'] = $this->Select(array('id' => 'idcargaacademica', 'name' => 'idcargaacademica', 'table' => 'carga_academica', 'code' => $obj->idcargaacademica));
        $data['profesores'] = $this->Select(array('id' => 'CodigoProfesor', 'name' => 'CodigoProfesor', 'table' => 'profesores', 'code' => $obj->CodigoProfesor));
        $data['cursos'] = $this->Select(array('id' => 'CodigoCurso', 'name' => 'CodigoCurso', 'table' => 'v_cursos', 'code' => $obj->CodigoCurso));
        $data['semestre'] = $this->Select(array('id' => 'CodigoSemestre', 'name' => 'CodigoSemestre', 'table' => 'semestreacademico', 'code' => $obj->CodigoSemestre));


        $view->setData($data);
        $view->setTemplate('../view/silabus/_Form.php');
        $view->setLayout('../template/Layout.php');
        $view->render();
    }

    public function save() {
        if (isset($_SESSION["perfil"]) && ($_SESSION["perfil"] == 'PROFESOR')) {
            $obj = new silabus();
            if ($_POST['idsilabus'] == '') {
                $p = $obj->insert($_POST);
                if ($p[0]) {
                    header('Location:index.php?controller=cursosemestre');
                } else {
                    $data = array();
                    $view = new View();
                    $data['msg'] = $p[1];
                    $data['url'] = 'index.php?controller=cursosemestre';
                    $view->setData($data);
                    $view->setTemplate('../view/_Error_App.php');
                    $view->setLayout('../template/Layout.php');
                    $view->render();
                }
            } else {
                $p = $obj->update($_POST);
                if ($p[0]) {
                    header('Location: index.php?controller=cursosemestre');
                } else {
                    $data = array();
                    $view = new View();
                    $data['msg'] = $p[1];
                    $data['url'] = 'index.php?controller=cursosemestre';
                    $view->setData($data);
                    $view->setTemplate('../view/_Error_App.php');
                    $view->setLayout('../template/Layout.php');
                    $view->render();
                }
            }
        } else {


            $obj = new silabus();
            if ($_POST['idsilabus'] == '') {
                $p = $obj->insert($_POST);
                if ($p[0]) {
                    header('Location:index.php?controller=silabus');
                } else {
                    $data = array();
                    $view = new View();
                    $data['msg'] = $p[1];
                    $data['url'] = 'index.php?controller=silabus';
                    $view->setData($data);
                    $view->setTemplate('../view/_Error_App.php');
                    $view->setLayout('../template/Layout.php');
                    $view->render();
                }
            } else {
                $p = $obj->update($_POST);
                if ($p[0]) {
                    header('Location: index.php?controller=silabus');
                } else {
                    $data = array();
                    $view = new View();
                    $data['msg'] = $p[1];
                    $data['url'] = 'index.php?controller=silabus';
                    $view->setData($data);
                    $view->setTemplate('../view/_Error_App.php');
                    $view->setLayout('../template/Layout.php');
                    $view->render();
                }
            }
        }
    }

    public function delete() {
        $obj = new silabus();
        $p = $obj->delete($_GET['id']);
        if ($p[0]) {
            header('Location: index.php?controller=silabus');
        } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] = 'index.php?controller=silabus';
            $view->setData($data);
            $view->setTemplate('../view/_Error_App.php');
            $view->setLayout('../template/Layout.php');
            $view->render();
        }
    }

    public function create() {

        $data = array();
        $view = new View();
        $data['cargaacademica'] = $this->Select(array('id' => 'idcargaacademica', 'name' => 'idcargaacademica', 'table' => 'carga_academica', 'code' => $obj->idcargaacademica));
        $data['profesores'] = $this->Select(array('id' => 'CodigoProfesor', 'name' => 'CodigoProfesor', 'table' => 'profesores', 'code' => $obj->CodigoProfesor));
        $data['cursos'] = $this->Select(array('id' => 'CodigoCurso', 'name' => 'CodigoCurso', 'table' => 'v_cursos', 'code' => $obj->CodigoCurso));
        $data['semestre'] = $this->Select(array('id' => 'CodigoSemestre', 'name' => 'CodigoSemestre', 'table' => 'semestreacademico ', 'code' => $obj->CodigoSemestre));

        $view->setData($data);
        $view->setTemplate('../view/silabus/_Form.php');
        $view->setLayout('../template/Layout.php');
        $view->render();
    }

    public function getCargaAcademica() {
        $ofic = $this->Select_ajax(array('id' => 'idcriterio', 'name' => 'idcriterio', 'table' => 'vista_cargaacademica', 'filtro' => 'carga_academica', 'criterio' => $_POST['idcargaacademica']));
        echo $ofic;
    }



}

?>