<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/informativo.php';
class informativoController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="noticia_web.titulo";}
        $obj = new informativo();
        $data = array();             
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=informativo&action=index','query'=>$_GET['q']));                
        $cols = array("Noticia","Titulo","Descripcion noticia","Imagen","Fecha");        
        $opt = array("noticia_web.titulo"=>"Titulo");
        $data['grilla'] = $this->grilla("informativo",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/informativo/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function edit() {
        $obj = new informativo();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['noticia_web'] = $this->Select(array('id'=>'id_noticiaweb','name'=>'id_noticiaweb','table'=>'noticia_web','code'=>$obj->id_noticiaweb));
       			
        $view->setData($data);
        $view->setTemplate( '../view/informativo/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new informativo();
        if ($_POST['id_noticiaweb']=="") {
            
             if(isset($_FILES["imagen"]["name"]))
            {
                 $out_dir='../web/images/noticias/';
                  if(move_uploaded_file($_FILES['imagen']['tmp_name'],$out_dir.$_POST["id_noticiaweb"].$_FILES["imagen"]["name"]))
                          
                    {
                     $p = $obj->insert($_POST,$_FILES);
                    }
            }
            if ($p[0]){
                header('Location: index.php?controller=informativo');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=informativo';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
             if(isset($_FILES["imagen"]["name"]))
            {
                 $out_dir='../web/images/noticias/';
                  if(move_uploaded_file($_FILES['imagen']['tmp_name'],$out_dir.$_POST["id_noticiaweb"].$_FILES["imagen"]["name"]))
                    {
                     $p = $obj->update($_POST,$_FILES);
                    }
            }
            if ($p[0]){
                header('Location: index.php?controller=informativo');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=informativo';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new informativo();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=informativo');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=informativo';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }
    public function create() {
        $data = array();
        $view = new View();
        $data['noticia_web'] = $this->Select(array('id'=>'id_noticiaweb','name'=>'id_noticiaweb','table'=>'noticia_web','code'=>$obj->id_noticiaweb));
        $view->setData($data);
        $view->setTemplate( '../view/informativo/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function getAnexo()
    {
        $ofic = $this->Select_ajax(array('id'=>'idcriterio','name'=>'idcriterio','table'=>'vista_informativo','filtro'=>'id_noticiaweb','criterio'=>$_POST['id_noticiaweb']));
        echo $ofic;
    }
}
?>