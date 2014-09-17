<?php
/**
 * 
 *
 * @author Andres
 */
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/panelConfig.php';

class BaseDatosController extends Controller {
    public function orror()
    {
        $data = array();
        $data['str'] = $_GET['str'];
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/_ErrorConexion.php');
        $view->setLayout('../template/Layout.php');
        $view->render();
    }

    public function config()
    {
        $view = new View();        
        $view->setTemplate('../view/_PanelConfig.php');
        $view->setLayout('../template/Layout.php');
        $view->render();        
    }

    public function saveConfig()
    {
        $obj = new configuracion();        
        print_r(json_encode($obj->saveConfiguracion($_GET)));
    }
    
}
?>
