<?php

require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/asistenciaalumno.php';

class asistenciaalumnoController extends Controller {

    public function index() {
        if (!isset($_GET['p'])) {
            $_GET['p'] = 1;
        }
        if (!isset($_GET['q'])) {
            $_GET['q'] = "";
        }
        if (!isset($_GET['criterio'])) {
            $_GET['criterio'] = "evento.tema";
        }

        $obj = new asistenciaalumno();
        $semestre_ultimo = $this->mostrar_semestre_ultimo();
        $data = array();
        $data['data'] = $obj->index($_GET['q'], $_GET['p'], $_GET['criterio'], $semestre_ultimo,$_SESSION['idusuario']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination2(array('rows' => $data['data']['rowspag'], 'url' => 'index.php?controller=asistenciaalumno&action=index', 'query' => $_GET['q']));
        $cols = array("CODIGO", "TEMA", "TIPO EVENTO", "Fecha");

        $data['grilla'] = $this->grilla("asistenciaalumno", $cols, $data['data']['rows'], $opt, $data['pag'], false, false, false, false, true);


        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/asistenciaalumno/_Index.php');
        $view->setLayout('../template/Layout.php');
        $view->render();
    }
    public function nota_de_tutoria(){
       $codigo_alumno="201010701016";//solo este es para ingresar
       $semestre_ultimo = $this->mostrar_semestre_ultimo();
       $nota = $this->mostrar_nota_tutoria(array('codigo_alumno' => $codigo_alumno,'semestre'=>$semestre_ultimo));
        echo "Tu Nota Es : ".$nota;
    }

    public function save() {
        $obj = new asistenciaalumno();
        
        if ($_POST['identificador_editar'] == true) { 
            $p = $obj->update($_POST);
            if ($p[0]) {
				die("<script> window.location='index.php?controller=asistenciaalumno'; </script>");
              
            } else {
                $data = array();
                $view = new View();
                $data['msg'] = $p[1];
                $data['url'] = 'index.php?controller=asistenciaalumno';
                $view->setData($data);
                $view->setTemplate('../view/_Error_App.php');
                $view->setLayout('../template/Layout.php');
                $view->render();
            }
            
        } else {
            $p = $obj->insert($_POST);
            
            if ($p[0]) {

                header('Location:index.php?controller=asistenciaalumno');
            } else {
                $data = array();
                $view = new View();
                $data['msg'] = $p[1];
                $data['url'] = 'index.php?controller=asistenciaalumno';
                $view->setData($data);
                $view->setTemplate('../view/_Error_App.php');
                $view->setLayout('../template/Layout.php');
                $view->render();
            }
        }
    }

}

?>