<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/User.php';
class UserController extends Controller {
    function login() 
    {        
        $objv = new User();
        $usuario=$_POST['usuario'];
        $password=$_POST['clave'];  
        
        $_p = $objv->Start($usuario,$password);        
        $obj = $_p['obj'];
        
        $_p2 = $objv->cargo_profesor($usuario); 
        $obj2 = $_p2['obj2'];
        
        if ($obj->usuario != '') 
        {   
            $_SESSION['idusuario'] = $obj->Codigo;
            $_SESSION['user'] = $obj->usuario;  
            $_SESSION['name'] = $obj->nombres;
            $_SESSION['idperil'] = $obj->idperfil;
            $_SESSION['perfil'] = $obj->perfil;
            $_SESSION['cargo']= $obj2->cargo;
            $_SESSION['comicion']= $obj2->comicion;
//            $_SESSION['sucursal'] = $obj->sucursal;
            // $_SESSION['oficinas'] = $objv->getOficinas();
            die("<script> window.location='index.php'; </script>");
        }
        else {die("<script> window.location='../index.php?error=1&'; </script>");}
    }
    
    function logout()
    {
        session_destroy();
        die("<script> window.location='index.php'; </script>");
    }    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        $obj = new User();
        $data = array();
        if(!isset($_GET['q'])){$_GET['q']="";}
        if(!isset($_GET['p'])){$_GET['p']="";}
        if(!isset($_GET['criterio'])){$_GET['criterio']="empleado.nombres";}
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=User&action=index','query'=>$_GET['q']));
        $cols = array("DNI","NOMBRES Y APELLIDOS","CELULAR","RPM","SUCURSAL","PERFIL");
        $opt = array("empleado.nombres"=>"nombres","empleado.apellidos"=>"apellidos","perfil.descripcion"=>"perfil");
        $data['grilla'] = $this->grilla("User",$cols, $data['data']['rows'],$opt,$data['pag'],true,false);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/User/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
   
   public function edit() {
        $obj = new User();
        $data = array();
        $view = new View();        
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['perfil'] = $this->Select(array('id'=>'idperfil','name'=>'idperfil','table'=>'perfil','code'=>$obj->idperfil));
        $data['sucursal'] = $this->Select(array('id'=>'idsucursal','name'=>'idsucursal','table'=>'sucursal','code'=>$obj->idsucursal));
        $data['oficina'] = $this->Select(array('id'=>'idoficina','name'=>'idoficina','table'=>'voficinas','code'=>$obj->idoficina));
        $view->setData($data);
        $view->setTemplate( '../view/User/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
//   public function get_ajax_oficinas()
//   {
//       echo $this->Select_ajax(array('table'=>'oficina'));
//   }
   public function save()
   {
        $obj = new User();
        if ($_POST['oper']=='0') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=User');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=User';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=User');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=User';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete()
      {
        $obj = new User();
        $p = $obj->delete($_POST);
        if ($p[0]){
            header('Location: index.php?controller=User');
        } 
        else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=User';
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
        $data['perfil'] = $this->Select(array('id'=>'idperfil','name'=>'idperfil','table'=>'perfil','code'=>$obj->idperfil));
        $data['sucursal'] = $this->Select(array('id'=>'idsucursal','name'=>'idsucursal','table'=>'sucursal'));
        $view->setData($data);
        $view->setTemplate( '../view/User/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function show() {
        $obj = new User();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;   
        $data['perfil'] = $this->Select(array('id'=>'idperfil','name'=>'idperfil','table'=>'perfil','code'=>$obj->idperfil));
        $view->setData($data);
        $view->setTemplate( '../view/User/_Show.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
  public function search()
    {
         if (!isset($_GET['p'])){$_GET['p']=1;}
        $obj = new User();
        $data = array();
        if(!isset($_GET['q'])){$_GET['q']="";}
        if(!isset($_GET['p'])){$_GET['p']="";}
        if(!isset($_GET['criterio'])){$_GET['criterio']="";}
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=User&action=search','query'=>$_GET['q']));
        $cols = array("DNI","NOMBRES Y APELLIDOS","PERFIL","TELEFONO");               
        $opt = array("empleado.nombres"=>"nombres","empleado.apellidos"=>"apellidos","perfil.descripcion"=>"perfil");
        $data['grilla'] = $this->grilla("User",$cols, $data['data']['rows'],$opt,$data['pag'],false,false,true,false);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/User/_Lista.php' );
        $view->setLayout('../template/List.php');
        $view->render();
    }
   
}
?>