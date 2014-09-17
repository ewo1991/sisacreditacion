<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';

class portalalumnoController extends Controller {    
    
    public function index() 
    {
        
        ob_start();
        require '../view/portal/index.php';
         $content = ob_get_clean();
        include '../template/Layout.php';
        
    }
    
    
}
   
echo"hola clemente1";
?>