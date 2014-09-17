<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/Permisos.php';
class PermisosController extends Controller {

    public function Index()
    {
        $data = array();
        $view = new View();
        $data['perfiles'] = $this->Select(array('id'=>'idperfil','name'=>'idperfil','table'=>'perfil'));
        $view->setData( $data );
        $view->setTemplate( '../view/Permisos/_Permisos.php' );
        $view->setLayout( '../template/Layout.php');
        $view->render();
    }

    public function Modulos()
    {
        $data = array();
        $objpermisos = new Permisos();
        $data['mod'] = $objpermisos->Modulos($_GET['idperfil']);
        $data['idperfil'] = $_GET['idperfil'];
        $view = new View();
        $view->setData($data);        
        $view->setTemplate( '../view/Permisos/_Modulos.php' );
        echo $view->renderPartial();
    }

    function Save()
    {
        $obj = new Permisos();
        print_r(json_encode($obj->Save($_GET)));
    }
}

?>