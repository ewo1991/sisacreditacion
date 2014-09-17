<?php

require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/alumno.php';

class alumnoproyectosController extends Controller {

    public function index() {

        $data = array();
        $data['semestreacademico'] = $this->Select1(array('id' => 'semestreacademico', 'name' => 'semestreacademico', 'filtro' => $_SESSION['idusuario']));



        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/alumnoproyecto/_Index.php');
        $view->setLayout('../template/Layout.php');
        $view->render();
    }

}

?>