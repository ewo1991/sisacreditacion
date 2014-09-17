<?php

require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/asistenciadocente.php';

class asistenciadocenteController extends Controller {

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

        $obj = new asistenciadocente();
        $semestre_ultimo = $this->mostrar_semestre_ultimo();
        $data = array();
        $data['data'] = $obj->index($_GET['q'], $_GET['p'], $_GET['criterio'],$semestre_ultimo);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows' => $data['data']['rowspag'], 'url' => 'index.php?controller=asistenciadocente&action=index', 'query' => $_GET['q']));
        $cols = array("CODIGO", "TEMA", "TIPO EVENTO", "Fecha");

        $data['grilla'] = $this->grilla("asistenciadocente", $cols, $data['data']['rows'], $opt, $data['pag'], false,false,false,false,true);
        
      
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/asistenciadocente/_Index.php');
        $view->setLayout('../template/Layout.php');
        $view->render();
        
     
    }
    public function mostrar_lista_docentes_tutoria() {
        
        if (!isset($_GET['p'])) {
            $_GET['p'] = 1;
        }
        if (!isset($_GET['q'])) {
            $_GET['q'] = "";
        }
        
        $idevento=$_POST['idevento'];
        $obj = new asistenciadocente();
        $idfacultad = $obj->mostrar_Facultad_idUsusario($_SESSION['idusuario']);
        $sem = $obj->mostrar_semestre_ultimo();
        $chekeos=array();
        $chekeos = $obj->devolver_asistencias($_GET['q'], $_GET['p'],$idevento);
        $data = array();
        $lista=$data['data'] = $obj->docentes_asignados($_GET['q'], $_GET['p'],$idfacultad,$sem,$idevento);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination2(array('rows' => $data['data']['rowspag'], 'url' => 'index.php?controller=asistenciadocente&action=mostrar_lista_docentes_tutoria', 'query' => $_GET['q']));
        $cols = array("CODIGO", "Nombre y Apellidos","Sexo","Fecha Ingreso");
        $data['grilla'] = $this->grilla("alumno", $cols, $data['data']['rows'], $opt, $data['pag'], false, false, false, false,false,true);

        $data['semestre']=$sem;
        $data['control']=$chekeos;
        $data['lista']=$lista;
        $view = new View();
        $view->setData($data);
        if($_GET['p']>=2){$view->setTemplate('../view/asistenciadocente/_Lista2.php');
         $view->setLayout('../template/Layout.php');
        $view->render();}
        else{
        $view->setTemplate('../view/asistenciadocente/_Lista2.php');
        $view->setLayout('../template/Vacia.php');
        $view->render();}
    }
     public function save() {
        $obj = new asistenciadocente();
            if($_POST['identificador_editar']==true){
            $p = $obj->update($_POST);
        
        if ($p[0]) {
                 die("<script> window.location='index.php?controller=asistenciadocente'; </script>");
        } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] = 'index.php?controller=asistenciadocente';
            $view->setData($data);
            $view->setTemplate('../view/_Error_App.php');
            $view->setLayout('../template/Layout.php');
            $view->render();
        }
        }
        else{ 
        $p = $obj->insert($_POST);
        
        if ($p[0]) {
                
            die("<script> window.location='index.php?controller=asistenciadocente'; </script>");
        } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] = 'index.php?controller=asistenciadocente';
            $view->setData($data);
            $view->setTemplate('../view/_Error_App.php');
            $view->setLayout('../template/Layout.php');
            $view->render();
        }
        }
    }

  
  
           
            

}

?>