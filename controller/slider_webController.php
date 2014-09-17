<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/slider_web.php';
class slider_webController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="slider_web.descripcion";}
        $obj = new slider_web();
        $data = array();             
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=slider_web&action=index','query'=>$_GET['q']));                
        $cols = array("Id","Descripcion","Imagen");        
        $opt = array("slider_web.descripcion"=>"Descripcion");
        $data['grilla'] = $this->grilla("slider_web",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/slider_web/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function edit() {
        $obj = new slider_web();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['slider_web'] = $this->Select(array('id'=>'id_sliderweb','name'=>'id_sliderweb','table'=>'slider_web','code'=>$obj->id_sliderweb));
        $view->setData($data);
        $view->setTemplate( '../view/slider_web/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new slider_web();
        if ($_POST['id_sliderweb']=="") {            
             if(isset($_FILES["imagen_slider"]["name"]))
            {
                 $out_dir='../web/images/slider/';
                  if(move_uploaded_file($_FILES['imagen_slider']['tmp_name'],$out_dir.$_POST["id_sliderweb"].$_FILES["imagen_slider"]["name"]))
                          
                    {
                     $p = $obj->insert($_POST,$_FILES);
                    }
            }
            if ($p[0]){
                header('Location: index.php?controller=slider_web');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=slider_web';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            if(isset($_FILES["imagen_slider"]["name"]))
            {
                 $out_dir='../web/images/slider/';
                  if(move_uploaded_file($_FILES["imagen_slider"]['tmp_name'],$out_dir.$_POST["id_sliderweb"].$_FILES["imagen_slider"]["name"]))
                    {
                     $p = $obj->update($_POST,$_FILES);
                    }
            }
            if ($p[0]){
                header('Location: index.php?controller=slider_web');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=slider_web';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new slider_web();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=slider_web');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=slider_web';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }
    public function create() {
        $data = array();
        $view = new View();
        $data['slider_web'] = $this->Select(array('id'=>'id_sliderweb','name'=>'id_sliderweb','table'=>'slider_web','code'=>$obj->id_sliderweb));
        $view->setData($data);
        $view->setTemplate( '../view/slider_web/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function getAnexo()
    {
        $ofic = $this->Select_ajax(array('id'=>'idcriterio','name'=>'idcriterio','table'=>'vista_slider_web','filtro'=>'id_sliderweb','criterio'=>$_POST['id_sliderweb']));
        echo $ofic;
    }
}
?>