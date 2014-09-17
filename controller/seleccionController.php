<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/sucursal.php';
require_once '../model/oficina.php';

class seleccionController extends Controller {    
    public function index() 
    {
        $data = array();                     
        $data['sucursal'] = $this->Select(array('id'=>'idsucursal','name'=>'idsucursal','table'=>'sucursal'));
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/_seleccion.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
}
?>