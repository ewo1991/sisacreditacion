<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/Perfil.php';
class PerfilController extends Controller
{
   public function index() {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        $obj = new Perfil();
        $data = array();
        $data['data'] = $obj->index($_GET['q'],$_GET['p']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=Perfil&action=index','query'=>$_GET['q']));
        $cols = array("CODIGO","DESCRIPCION","ESTADO"); 
        $opt = array("descripcion"=>"DESCRIPCION");
        $data['grilla'] = $this->grilla("Perfil",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/perfil/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function edit() {
        $obj = new Perfil();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;      
        $view->setData($data);
        $view->setTemplate( '../view/perfil/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
   public function save()
   {
        $obj = new Perfil();
        if ($_POST['idperfil']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=Perfil');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=Perfil';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=Perfil');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=Perfil';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete()
      {
        $obj = new Perfil();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=Perfil');
        } 
        else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=Perfil';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
        }
      }
    
    public function create()
    {
        $data = array();
        $view = new View();        
        $view->setData($data);
        $view->setTemplate( '../view/perfil/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
   
}
?>