<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/evento.php';

class eventoController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="evento.tema";}
        $obj = new evento();
        $data = array();  
        $semestre_ultimo = $this->mostrar_semestre_ultimo();
         if($_SESSION['cargo']=='Presidente' && $_SESSION['comicion']=='COMISION ESPECIAL DE TUTORIA'){$presidente=true;}
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio'],$semestre_ultimo,$_SESSION['idusuario']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=evento&action=index','query'=>$_GET['q']));                
       
        $cols = array("CODIGO","Tema","Tipo Evento","Fecha");        
        $opt = array("tipo_evento.descripcion"=>"Tema","evento.fecha"=>"Fecha ");
        
        $data['grilla'] = $this->grilla("evento",$cols, $data['data']['rows'],$opt,$data['pag'],true,true,false,true,false,false,$presidente);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/evento/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function edit() {
        $obj = new evento();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        
        $data['tipo_evento'] = $this->Select(array('id'=>'idtipo_evento','name'=>'idtipo_evento','table'=>'tipo_evento','code'=>$obj->idtipo_evento));
        $view->setData($data);
        $view->setTemplate( '../view/evento/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){ 
        $obj = new evento();
        if ($_POST['idevento']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location:index.php?controller=evento');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] ='index.php?controller=evento';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=evento');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] = 'index.php?controller=evento';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new evento();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=evento');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=evento';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }
    public function create() {
        $data = array();
        $view = new View();
        $data['tipo_evento'] = $this->Select(array('id'=>'idtipo_evento','name'=>'idtipo_evento','table'=>'tipo_evento','code'=>$obj->idtipo_evento));
        $view->setData($data);
        $view->setTemplate( '../view/evento/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function getTipoEvento()
    {
        $ofic = $this->Select_ajax(array('id'=>'idcriterio','name'=>'idcriterio','table'=>'evento','filtro'=>'idtipo_evento','criterio'=>$_POST['idtipo_evento']));
        echo $ofic;
    }
}
?>