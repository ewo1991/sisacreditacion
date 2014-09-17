<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/venta.php';
require_once '../model/viaje.php';
require_once '../model/parametros.php';
require_once '../model/caja.php';
class ventaController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="descripcion";}
        $obj = new venta();
        $objc = new caja();
        $data = array();           
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=venta&action=index','query'=>$_GET['q']));                
        $cols = array("CODIGO","DESCRIPCION");  
        $opt = array("descripcion"=>"Nombre venta");
        $data['grilla'] = $this->grilla("venta",$cols, $data['data']['rows'],$opt,$data['pag'],true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/venta/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function viajes_now()
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="cronograma.origen";}
        $obj = new viaje();
        $objc = new caja();
        $data = array();           
        $data['verif'] = $objc->verificar_caja();
        $data['data'] = $obj->viajes_now($_GET['q'],$_GET['p'],$_GET['criterio']); //Recupero los viajes del dia de HOY
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=venta&action=viajes_now','query'=>$_GET['q']));                
        $cols = array("CODIGO","ORIGEN","DESTINO","H.SALIDA","H.LLEGADA","BUSS","FECHA");        
        $opt = array("cronograma.origen"=>"ORIGEN","cronograma.destino"=>"destino","cronograma.horasalida"=>"Hora Salida");
        $data['grilla'] = $this->grilla("viaje",$cols, $data['data']['rows'],$opt,$data['pag'],false,false,false,false);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/venta/_viajes.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function edit() {
        $obj = new venta();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['ventasPadres'] = $this->Select(array('id'=>'idpadre','name'=>'idpadre','table'=>'vista_venta','code'=>$obj->idpadre));
        $view->setData($data);
        $view->setTemplate( '../view/venta/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save()
    {
        $obj = new venta();       
        $p = $obj->insert($_POST);
        if ($p[0]){
           print_r(json_encode(array(true,$p[1])));
        } else {
        print_r(json_encode(array(false,$p[1])));
        }             
    }
    public function pay()
    {
        $obj = new venta();
        $p = $obj->pay($_GET['idventa']);
        print_r(json_encode(array($p[0],$p[1])));
    }
    public function delete(){
        $obj = new venta();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=venta');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=venta';
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
        $objviaje = new viaje();
        $objp = new parametros();
        $data['param'] = $objp->getParametros(); //Recupero los parametros como igv, tiempo de reservado maximo
        $rviaje = $objviaje->get_datos_viaje_now($_GET['idviaje']);  //Recupero los datos viaje seleccionado
        $data['idvehiculo'] = $rviaje->idvehiculo;
        $rcargos = $objviaje->getCargos($_GET['idviaje']); //Recupero choferes
        $data['cabecera'] = $this->cebecera($rviaje,$rcargos);
        $data['precio'] = $rviaje->precio;
        $asientos = $objviaje->fullbus($rviaje->idvehiculo, $rviaje->idviaje);
        $data['bus'] = $this->view_buss($rviaje->nropasajeros,$asientos);
        $data['tipo_doc_venta'] = $this->Select(array('id'=>'idtipo_documento_venta','name'=>'idtipo_documento_venta','table'=>'tipo_documento_venta'));
        $data['tipo_doc'] = $this->Select(array('id'=>'idtipo_doc','name'=>'idtipo_doc','table'=>'tipo_documento'));
        $view->setData($data);
        $view->setTemplate( '../view/venta/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function cebecera($r,$c)
    {
        $data = array();
        $view = new View();        
        $data['obj'] = $r;
        $data['c'] = $c;
        $view->setData($data);
        $view->setTemplate( '../view/venta/_cabecera.php' );
        $view->setLayout( '../template/Layout.php' );
        return $view->renderPartial();
    }
    public function view_buss($n,$a)
    {        
        $data = array();
        $view = new View();        
        $data['asientos'] = $a;
        $view->setData($data);
        $view->setTemplate( '../view/vehiculo/_v'.$n.'.php' );
        $view->setLayout( '../template/Layout.php' );
        return $view->renderPartial();
    }
    public function get_info()
    {
       $obj = new venta();
       print_r(json_encode($obj->get_info($_POST['idventa'])));
    }    
    public function liberar_asiento()
    {
        $obj = new venta();
        print_r(json_encode($obj->liberar_asiento($_POST['idventa'])));
    }
    public function verif_asiento()
    {
        $obj = new venta();        
        print_r(json_encode($obj->verif_asiento($_POST)));
    }
}
?>