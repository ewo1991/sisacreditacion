<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/carga_academica.php';

class carga_academicaController extends Controller {    
   public function index() 
    {
       echo "hola clemente";
       /* if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="bibliografia.descripcion";}
        $obj = new carga_academica();
        $data = array();             
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=carga_academica&action=index','query'=>$_GET['q']));                
       
        $cols = array("CODIGO","Referencia","Identificador","Descripcion","Tipo Bibliografia");        
        $opt = array("bibliografia.descripcion"=>"Nombre bibliografia","bibliografia.identificador"=>"Identificador ");
        
        $data['grilla'] = $this->grilla("bibliografia",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/carga_academica/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();*/
    }
    
    public function edit() {
        $obj = new carga_academica();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        
        $data['tipo_bibliografia'] = $this->Select(array('id'=>'idtipo_bibliografia','name'=>'idtipo_bibliografia','table'=>'tipo_bibliografia','code'=>$obj->idtipo_bibliografia));
        $view->setData($data);
        $view->setTemplate( '../view/carga_academica/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new carga_academica();
        if ($_POST['idbibliografia']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location:index.php?controller=carga_academica');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] ='index.php?controller=carga_academica';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=carga_academica');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] = 'index.php?controller=carga_academica';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new carga_academica();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=carga_academica');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=carga_academica';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }
    public function create() {
        $data = array();
        $view = new View();
        $data['tipo_bibliografia'] = $this->Select(array('id'=>'idtipo_bibliografia','name'=>'idtipo_bibliografia','table'=>'tipo_bibliografia','code'=>$obj->idtipo_bibliografia));
        $view->setData($data);
        $view->setTemplate( '../view/carga_academica/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function getcarga_academica()
    {
        $ofic = $this->Select_ajax(array('id'=>'idcriterio','name'=>'idcriterio','table'=>'vista_bibliografia','filtro'=>'idtipo_bibliografia','criterio'=>$_POST['idtipo_bibliografia']));
        echo $ofic;
    }
}
?>