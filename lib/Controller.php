<?php

require_once '../model/Main.php';

class ControllerException extends Exception {
    
}

class Controller {

    public function __call($name, $arguments) {
        throw new ControllerException("Error! El método {$name}  no está definido.");
    }

    public function Select($p) {
    
        $obj = new Main();
        $obj->table = $p['table'];
        $data = array();

        $data['rows'] = $obj->getList();
        $data['name'] = $p['name'];
        $data['id'] = $p['id'];
        $data['code'] = $p['code'];
        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/_Select.php');
        return $view->renderPartial();
    }
	public function Select_ajax_string_prov($p) {
        $obj = new Main();
        $obj->table = $p['table'];
        $obj->filtro = $p['filtro'];
        $obj->criterio = $p['criterio'];
        $data = array();
        $data['rows'] = $obj->getList_ajax_string();
        $data['name'] = $p['name'];
        $data['id'] = $p['id'];
        $data['code'] = $p['code'];
        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
        if($p['ajax']){
            $view->setTemplate('../view/_Select_ajax.php');
        }else{
            $view->setTemplate('../view/_Select.php');
        }
        return $view->renderPartial();
    }
	
	
    
    public function SelectActual($p) {
        $obj = new Main();
//        $obj->table = $p['table'];
        $data = array();

        $data['rows'] = $obj->getSemestreActual();
        $data['name'] = $p['name'];
        $data['id'] = $p['id'];
        $data['code'] = $p['code'];
        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/_Select.php');
        return $view->renderPartial();
    }
    public function cinco_ultimos_semestres($p) {
        $obj = new Main();
//        $obj->table = $p['table'];
        $data = array();

        $data['rows'] = $obj->cinco_ultimos_semestres();
        $data['name'] = $p['name'];
        $data['id'] = $p['id'];
        $data['code'] = $p['code'];
        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/_Select.php');
        return $view->renderPartial();
    }
     public function Datos_grilla($p) {
        $obj = new Main();
//        $obj->table = $p['table'];
//        $obj->criterio = $p['criterio1'];
        $obj->criterio = $p['criterio'];
        $obj->filtro = $p['filtro'];
//        $obj->filtro1 = $p['filtro1'];
        $data = array();

        $data['rows'] = $obj->getDatos_grilla();
        
        $data['name'] = $p['name'];
        $data['id'] = $p['id'];
        $data['code'] = $p['code'];
        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/_tabla.php');
        return $view->renderPartial();
    }

    
  
     public function mostrar_semestre_ultimo(){
        $obj = new Main();
        $semestre_ultimo= $obj->mostrar_semestre_ultimo();
        return  $semestre_ultimo;
    }
    public function Datos_grilla_facultad($p) {
        $obj = new Main();
        $obj->criterio = $p['criterio'];
        $obj->filtro = $p['filtro'];
        $obj->criterio2 = $p['criterio2'];
        $obj->filtro2 = $p['filtro2'];
        $data = array();
        
        $data['rows'] = $obj->getDatos_grilla_facultad();
        
        $data['name'] = $p['name'];
        $data['id'] = $p['id'];
        $data['code'] = $p['code'];
        $data['disabled'] = $p['disabled'];
        $data['modovista']=$p['modovista'];
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/_tabla.php');    
        return $view->renderPartial();
    }
    
   
     public function mostrar_mis_asistencias_eventos_tutoria_alumno($p) {
        
        $obj = new Main();

        $obj->criterio = $p['criterio'];
        $obj->criterio2 = $p['criterio2'];
        $data = array();
        
        $data['rows'] = $obj->get_mostrar_mis_asistencias_eventos_tutoria_alumno();
        
        $data['name'] = $p['name'];
        $data['id'] = $p['id'];
        $data['code'] = $p['code'];
        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/_tabla_mis_asistencias_alumno.php');    
        return $view->renderPartial();
    }
     public function Pagination2($p) {
        $data = array();
        $data['rows'] = $p['rows'];
        $data['query'] = $p['query'];
        $data['url'] = $p['url'];
        $data['fac'] = $p['fac'];
        $data['criterio'] = $p['criterio'];
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/_Pagination2.php');
        return $view->renderPartial();
    }
    
     public function Lista($p) {
        $obj = new Main();
//        $obj->table = $p['table'] no uso tabla;
        $data = array();

        $data['rows'] = $obj->getList();
        $data['name'] = $p['name'];
        $data['id'] = $p['id'];
        $data['code'] = $p['code'];
        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/_Lista.php');
        return $view->renderPartial();
    }
     public function grilla($name, $columns, $rows, $options, $pag, $edit, $view, $select = false, $new = true,$asig,$chek,$presidente) {
        $obj = new Main();
        $data = array();
        $data['nr'] = $obj->getnr();
        $data['cols'] = $columns;
        $data['rows'] = $rows;
        $data['edit'] = $edit;
        $data['view'] = $view;
        $data['select'] = $select;
        $data['name'] = $name;
        $data['pag'] = $pag;
        $data['new'] = $new;
        $data['asig'] = $asig;
        $data['chek'] = $chek;
        $data['presidente'] = $presidente;
        $data['combo_search'] = $this->Combo_Search($options);
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/_grilla.php');
        $view->setLayout('../template/Layout.php');
        return $view->renderPartial();
    }
    public function Select1($p) {
        $obj = new Main();
//        $obj->table = $p['table'];
        $obj->filtro = $p['filtro'];
        $data = array();
        $data['rows'] = $obj->getSemestre();
        $data['name'] = $p['name'];
        
        $data['id'] = $p['id'];
        $data['code'] = $p['code'];
        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/_Select.php');
        return $view->renderPartial();
    }
    
     public function SelectD($p) {
        $obj = new Main();
//        $obj->table = $p['table'];
        $obj->filtro = $p['filtro'];
        $data = array();
        $data['rows'] = $obj->getSemestreD();
        $data['name'] = $p['name'];
        
        $data['id'] = $p['id'];
        $data['code'] = $p['code'];
        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/_Select.php');
        return $view->renderPartial();
    }
    
   public function Select_ajax($p) {
        $obj = new Main();
        $obj->table = $p['table'];
        $obj->filtro = $p['filtro'];
        $obj->criterio = $p['criterio'];
        $data = array();
        $data['rows'] = $obj->getList_ajax();
        $data['name'] = $p['name'];
        $data['id'] = $p['id'];
        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/_Select_ajax.php');
        return $view->renderPartial();
    }
    
    

    public function Select_ajax_string($p) {
        $obj = new Main();
        $obj->table = $p['table'];
        $obj->filtro = $p['filtro'];
        $obj->criterio = $p['criterio'];
        $data = array();
        $data['rows'] = $obj->getList_ajax_string();
        $data['name'] = $p['name'];
        $data['id'] = $p['id'];
        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/_Select_ajax.php');
        return $view->renderPartial();
    }

         public function lista_recibir($p) {
        $obj = new Main();
//        $obj->table = $p['table'];
        $obj->filtro = $p['filtro'];
        $obj->criterio = $p['criterio'];
         $obj->filtro1 = $p['filtro1'];
        $obj->criterio1 = $p['criterio1'];
        $data = array();
        $data['rows'] = $obj->getLista();
//        $data['name'] = $p['name'];
//        $data['id'] = $p['id'];
        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/_Lista_ajax.php');
        return $view->renderPartial();
    }
    //lista de alumnos del curso seleccionado x el docente
    
     public function grilla_notasproyecto($p) {
        $obj = new Main();
//        $obj->table = $p['table'];
////        $obj->criterio = $p['criterio1'];
//        $obj->criterio = $p['criterio'];
//        $obj->filtro = $p['filtro'];
//        $obj->filtro1 = $p['filtro1'];
        $data = array();

        $data['rows'] = $obj->getDatos_grilla_notasproyecto();
        $data['name'] = $p['name'];
        $data['id'] = $p['id'];
        $data['code'] = $p['code'];
        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/notasproyecto.php');
        return $view->renderPartial();
    }
    
     public function Lista_recibir_A($p) {
        $obj = new Main();
//        $obj->table = $p['table'];
        $obj->filtro = $p['filtro'];
        $obj->criterio = $p['criterio'];
         $obj->filtro1 = $p['filtro1'];
        $obj->criterio1 = $p['criterio1'];
           $obj->opt=$p['opcion'];
        $data = array();
        if ($obj->opt=="A"){
             $data['opcion']="normal";
        }else{
            $data['opcion']="asistencia";
        }
        $data['rows'] = $obj->getListaA();
//        $data['name'] = $p['name'];
//        $data['id'] = $p['id'];
        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
        
       $view->setTemplate('../view/_tablaA.php');
        return $view->renderPartial();
    }
          public function FiltroEditar_P($p) {
        $obj = new Main();
        $obj->criterio = $p['criterio'];
        $data = array();
        $data['rows'] = $obj->getDatos_FiltroEditar();
        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/_filtroEditar.php');
        return $view->renderPartial();
    }
    
    
//    public function Nombre_curso($p) {
//        
//        $obj = new Main();
////        $obj->table = $p['table'];
//        $obj->filtro = $p['filtro'];
//        $obj->criterio = $p['criterio'];
//         
//        $data = array();
//        $data['rows'] = $obj->getNombre();
////        $data['name'] = $p['name'];
////        $data['id'] = $p['id'];
//        $data['disabled'] = $p['disabled'];
//        $view = new View();
//        $view->setData($data);
//       $view->setTemplate('../view/_Silabo.php');
//        return $view->renderPartial();
//    }
    
    
    public function Lista_recibir_A2($p) {
        $obj = new Main();
//        $obj->table = $p['table'];
        $obj->filtro = $p['filtro'];
        $obj->criterio = $p['criterio'];
         $obj->filtro1 = $p['filtro1'];
        $obj->criterio1 = $p['criterio1'];
        $data = array();
        $data['rows'] = $obj->getListaA();
        $data['rows2'] = $obj->getSyllabus_P();
        
//        $data['name'] = $p['name'];
//        $data['id'] = $p['id'];
        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
       $view->setTemplate('../view/_tablaN.php');
        return $view->renderPartial();
    }
    
    public function Syllabus_P($p) {
        $obj = new Main();
//        $obj->table = $p['table'];
        $obj->filtro = $p['filtro'];
        $obj->criterio = $p['criterio'];
         $obj->filtro1 = $p['filtro1'];
        $obj->criterio1 = $p['criterio1'];
        $data = array();
        $data['rows'] = $obj->getSyllabus_P();
        $data['rows2'] = $obj->getNombre();
        
//        $data['name'] = $p['name'];
//        $data['id'] = $p['id'];
        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
       $view->setTemplate('../view/_Silabo.php');
        return $view->renderPartial();
    }
    public function Lista_notas($p) {
        $obj = new Main();
//        $obj->table = $p['table'];
        
        $obj->criterio = $p['criterio'];
        $obj->criterio1 = $p['criterio1'];
        $data = array();
        $data['rows3'] = $obj->getRetornoN();
        
        
//        $data['name'] = $p['name'];
//        $data['id'] = $p['id'];
        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
       $view->setTemplate('../view/_tablaN.php');
        return $view->renderPartial();
    }
    //holaaaaaaaaaa
// mando la lista de los cursos del docente x la carga academica segun el semestre seleccionado
    public function lista_recibir_D($p) {
        $obj = new Main();
//        $obj->table = $p['table'];
        $obj->filtro = $p['filtro'];
        $obj->criterio = $p['criterio'];
         $obj->filtro1 = $p['filtro1']; 
        $obj->criterio1 = $p['criterio1'];
        $data = array();
        $data['rows'] = $obj->getListaD();
//        $data['name'] = $p['name'];
//        $data['id'] = $p['id'];
        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/_Lista_ajax.php');
        return $view->renderPartial();
    }
    
    
     public function silabus_recibir($p) {
        $obj = new Main();
//        $obj->table = $p['table'];
        $obj->filtro = $p['filtro'];
        $obj->criterio = $p['criterio'];
         $obj->filtro1 = $p['filtro1'];
        $obj->criterio1 = $p['criterio1'];
        
        $data = array();
        $data['rows'] = $obj->getSilabu();

        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/_Silabo.php');
        return $view->renderPartial();
    }
    
     public function detalle_silabus($p) {
        $obj = new Main();
//        $obj->table = $p['table'];
        $obj->filtro = $p['filtro'];
        $obj->criterio = $p['criterio'];
         $obj->filtro1 = $p['filtro1'];
        $obj->criterio1 = $p['criterio1'];
        
        $data = array();
        $data['rows'] = $obj->getdatos_Silabu();

        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/_Edit_Silabo.php');
        return $view->renderPartial();
    }
    
     public function unidad_recibir($p) {
        $obj = new Main();
//        $obj->table = $p['table'];
        $obj->filtro = $p['filtro'];
        $obj->criterio = $p['criterio'];
         $obj->filtro1 = $p['filtro1'];
        $obj->criterio1 = $p['criterio1'];
        $obj->opt = $p['option'];
        
        
        $data = array();
        $data['rows'] = $obj->getUnidad();
        if($obj->opt=='dsa'){
            $data['rows2']="boton";
        }else{
            $data['rows2']="";
            
        }
        
        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
        
       if ($obj->opt=='S'){
        $view->setTemplate('../view/_SinUnidad.php');
        
       }else{
           
           $view->setTemplate('../view/_Unidad.php');
           
           
       }
        return $view->renderPartial();
        
        }
        
        public function unidad_recibirid($p) {
        $obj = new Main();
//        $obj->table = $p['table'];
        $obj->filtro = $p['filtro'];
        $obj->criterio = $p['criterio'];
         $obj->filtro1 = $p['filtro1'];
        $obj->criterio1 = $p['criterio1'];
       
        
        
        $data = array();
        $data['rows'] = $obj->getUnidadid();

        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
       
        $view->setTemplate('../view/_Sipdf.php');
        
       
        return $view->renderPartial();
        
        }
//         public function silabus_recibirid($p) {
//        $obj = new Main();
////        $obj->table = $p['table'];
//        $obj->filtro = $p['filtro'];
//        $obj->criterio = $p['criterio'];
//         $obj->filtro1 = $p['filtro1'];
//        $obj->criterio1 = $p['criterio1'];
//       
//       
//        $data = array();
//        $data['rows2'] = $obj->getSilabusid();
//
//        $data['disabled'] = $p['disabled'];
//        $view = new View();
//        $view->setData($data);
//       
//        $view->setTemplate('../view/_Sipdf.php');
//        
//       
//        return $view->renderPartial();
//        
//        }
        
    
    public function notas_alumno($p) {
        $obj = new Main();
//        $obj->table = $p['table'];
        $obj->filtro2= $p['filtro2'];
        $obj->criterio2= $p['criterio2'];
        $obj->criterio1= $p['criterio1'];
        $obj->criterio = $p['criterio'];
        $obj->filtro= $p['filtro'];
        $obj->filtro1= $p['filtro1'];
        
        $obj->opcion = $p['opcion'];
        $data = array();
        $data['rows2'] = $obj->getSyllabus_P2();

        $data['rows'] = $obj->getNota();

        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
        
            $view->setTemplate('../view/_tablaM.php');
            
      
        
        return $view->renderPartial();
    }
    
    public function tema_recibir($p) {
        $obj = new Main();
//        $obj->table = $p['table'];
        $obj->filtro = $p['filtro'];
        $obj->criterio = $p['criterio'];
        
        $obj->opcion = $p['opcion'];
        $data = array();
        $data['rows'] = $obj->getTema();

        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
        if ($obj->opcion =='A'){
        $view->setTemplate('../view/_SinTema.php');
        }else{
            
             if ($obj->opcion =='B'){
        $view->setTemplate('../view/_TemaA.php');
        }else{
            $view->setTemplate('../view/_Tema.php');
        }
        }
        
        return $view->renderPartial();
    }
    
    
     public function tema_recibirF($p) {
        $obj = new Main();
//        $obj->table = $p['table'];
        $obj->filtro = $p['filtro'];
        $obj->criterio = $p['criterio'];
        
        $obj->opcion = $p['opcion'];
        $data = array();
        $data['rows2'] = $obj->getTema();

        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
       
        $view->setTemplate('../view/_Sipdf.php');
        
        
        return $view->renderPartial();
    }
    
    
    
//     public function Clase_recibir($p) {
//        $obj = new Main();
////        $obj->table = $p['table'];
//        $obj->filtro = $p['filtro'];
//        $obj->criterio = $p['criterio'];
//        
//        
//        $data = array();
//        $data['rows2'] = $obj->getClase();
//
//        $data['disabled'] = $p['disabled'];
//        $view = new View();
//        $view->setData($data);
//        
//        $view->setTemplate('../view/_TemaA.php');
//        
//        
//        return $view->renderPartial();
//    }
    
    
    
    
    public function bibliografia_recibir($p) {
        $obj = new Main();
//        $obj->table = $p['table'];
        $obj->filtro = $p['filtro'];
        $obj->criterio = $p['criterio'];
        
        $obj->opcion = $p['opcion'];
        $data = array();
        $data['rows4'] = $obj->getBiblio();

        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
        
        
        $view->setTemplate('../view/_Edit_Silabo.php');
        
        
        return $view->renderPartial();
    }
        
    
    
    
    
    
    
//     public function Datos_grilla($p) {
//        $obj = new Main();
////        $obj->table = $p['table'];
//        $obj->filtro = $p['filtro'];
//        $obj->criterio = $p['criterio'];
//         $obj->filtro1 = $p['filtro1'];
//        $obj->criterio1 = $p['criterio1'];
//       
//        $data = array();
//        $data['rows'] = $obj->getSilabu();
//
//        $data['disabled'] = $p['disabled'];
//        $view = new View();
//        $view->setData($data);
//        $view->setTemplate('../view/_Silabo.php');
//        return $view->renderPartial();
//    }
 
    public function Select_ajax_string_dis($p) {
        $obj = new Main();
        $obj->table = $p['table'];
        $obj->filtro = $p['filtro'];
        $obj->criterio = $p['criterio'];
        $data = array();
        $data['rows'] = $obj->getList_ajax_string_dis();
        $data['name'] = $p['name'];
        $data['id'] = $p['id'];
        $data['code'] = $p['code'];
        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
        if($p['ajax']){
            $view->setTemplate('../view/_Select_ajax.php');
        }else{
            $view->setTemplate('../view/_Select.php');
        }
        return $view->renderPartial();
    }

    public function Pagination($p) {
        $data = array();
        $data['rows'] = $p['rows'];
        $data['query'] = $p['query'];
        $data['url'] = $p['url'];
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/_Pagination.php');
        return $view->renderPartial();
    }

    public function Combo_Search($options) {
        $data = array();
        $data['options'] = $options;
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/_Combo_Search.php');
        return $view->renderPartial();
    }

  
    
    public function grilla_proyecto($p) {
        $obj = new Main();
//        $obj->table = $p['table'];
////        $obj->criterio = $p['criterio1'];
//        $obj->criterio = $p['criterio'];
//        $obj->filtro = $p['filtro'];
//        $obj->filtro1 = $p['filtro1'];
        $data = array();

        $data['rows'] = $obj->getDatos_grilla_proyecto();
        $data['rows2'] = $obj->getDatos_grilla_objetivos();
        $data['rows3'] = $obj->getDatos_grilla_docentes();
        $data['rows4'] = $obj->getDatos_grilla_alumnos();
        $data['name'] = $p['name'];
        $data['id'] = $p['id'];
        $data['code'] = $p['code'];
        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/_tabla2.php');
        return $view->renderPartial();
    }
    
    public function grilla_solicitaproyecto($p) {
        $obj = new Main();
//        $obj->table = $p['table'];
////        $obj->criterio = $p['criterio1'];
//        $obj->criterio = $p['criterio'];
//        $obj->filtro = $p['filtro'];
//        $obj->filtro1 = $p['filtro1'];
        $data = array();

        $data['rows'] = $obj->getDatos_grilla_solicitaproyectos();
        
        $data['name'] = $p['name'];
        $data['id'] = $p['id'];
        $data['code'] = $p['code'];
        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/_tabla4.php');
        return $view->renderPartial();
    }
    
    
    public function grilla_miproyecto($p) {
        $obj = new Main();
//        $obj->table = $p['table'];
////        $obj->criterio = $p['criterio1'];
//        $obj->criterio = $p['criterio'];
//        $obj->filtro = $p['filtro'];
//        $obj->filtro1 = $p['filtro1'];
        $data = array();

        $data['rows'] = $obj->getDatos_grilla_miproyecto();
        
        $data['name'] = $p['name'];
        $data['id'] = $p['id'];
        $data['code'] = $p['code'];
        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/_tabla3.php');
        return $view->renderPartial();
    }
    
    
    public function pdf_proyecto($p) {
        $obj = new Main();
//        $obj->table = $p['table'];
////        $obj->criterio = $p['criterio1'];
//        $obj->criterio = $p['criterio'];
//        $obj->filtro = $p['filtro'];
//        $obj->filtro1 = $p['filtro1'];
        $data = array();

        $data['rows'] = $obj->getDetalle_proyecto();
        $data['rows2'] =  $obj->getDatos_grilla_objetivos();
        $data['rows3'] = $obj->getDatos_grilla_docentes();
        $data['rows4'] = $obj->getDatos_grilla_alumnos();
        $data['name'] = $p['name'];
        $data['id'] = $p['id'];
        $data['code'] = $p['code'];
        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/_Pdf.php');
        return $view->renderPartial();
    }
    
    public function Detalle_Proyecto_P($p) {
        $obj = new Main();
        $obj->criterio = $p['criterio'];
        $data = array();
        $data['rows'] = $obj->getDetalle_proyecto();
        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/_Detalle.php');
        return $view->renderPartial();
        
    } 
    
    public function Detalle_Proyecto1_P($p) {
        $obj = new Main();
        $obj->criterio = $p['criterio'];
        $data = array();
        $data['rows'] = $obj->getDetalle_proyecto();
        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);

        $view->setTemplate('../view/_Detalle1.php');
        return $view->renderPartial();
    }
    
     public function Calificaiones($p) {
        $obj = new Main();
//        $obj->table = $p['table'];
        $obj->alumno = $p['alumno'];
        $obj->nota=$p['notas'];
         $obj->evaluacion = $p['evaluacion'];
       
        
//         var_dump($obj->nota);
//         exit();
         
        $data = array();
        $data['rows'] = $obj->Insertar();

        $data['disabled'] = $p['disabled'];
        $mensaje='Se inserto correctamente';
        
        return $mensaje;
    }
    
     public function Asistencia($p) {
        $obj = new Main();
//        $obj->table = $p['table'];
        $obj->alumno = $p['alumno'];
        
        $obj->asistencia=$p['asistencia'];
        
         $obj->clase = $p['clase'];
       
        
//         var_dump($obj->asistencia);
//         exit();
         
        $data = array();
        $data['rows'] = $obj->InsertarA();

        $data['disabled'] = $p['disabled'];
        $mensaje='Se inserto correctamente';
        
        return $data;
    }

     public function grilla_informativo($p) {
        $obj = new Main();
//        $obj->table = $p['table'];
////        $obj->criterio = $p['criterio1'];
//        $obj->criterio = $p['criterio'];
//        $obj->filtro = $p['filtro'];
//        $obj->filtro1 = $p['filtro1'];
        $data = array();

        $data['rows'] = $obj->getDatos_web_informativo();
        $data['rows2'] =  $obj->getDatos_web_evento();
        $data['rows3'] = $obj->getDatos_web_noticias();
        $data['rows4'] = $obj->getDatos_web_contenido();
        $data['rows5'] = $obj->getDatos_web_desarrolladores();
        $data['name'] = $p['name'];
        $data['id'] = $p['id'];
        $data['code'] = $p['code'];
        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../contenido.php');
        return $view->renderPartial();
    }
    
public function ListaProyecto_P($p) {
        $obj = new Main();
        $obj->criterio = $p['criterio'];
        $data = array();
        $data['rows'] = $obj->getDetalle_proyecto();
        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/_Proyecto.php');
        return $view->renderPartial();
    }
    
     public function Marco_P($p) {
        $obj = new Main();
        $obj->criterio = $p['criterio'];
        $data = array();
        $data['rows'] = $obj->getDetalle_proyecto();
        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/_Marco.php');
        return $view->renderPartial();
    }
    public function Metodologia_P($p) {
        $obj = new Main();
        $obj->criterio = $p['criterio'];
        $data = array();
        $data['rows'] = $obj->getDetalle_proyecto();
        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/_Metodologia.php');
        return $view->renderPartial();
    }
    public function Aspectos_P($p) {
        $obj = new Main();
        $obj->criterio = $p['criterio'];
        $data = array();
        $data['rows'] = $obj->getDetalle_proyecto();
        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/_Aspectos.php');
        return $view->renderPartial();
    }
         public function ListaAlumno_P($p) {
        $obj = new Main();
        $obj->criterio = $p['criterio'];
        $data = array();
        $data['rows'] = $obj->getDatos_grilla_alumnos();
        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/_Alumno.php');
        return $view->renderPartial();
    }
    
    public function ListaAlumno1_P($p) {
        $obj = new Main();
        $obj->criterio = $p['criterio'];
        $data = array();
        $data['rows'] = $obj->getDatos_grilla_alumnos();
        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/_Alumno1.php');
        return $view->renderPartial();
    }
          public function ListaDocente_P($p) {
        $obj = new Main();
        $obj->criterio = $p['criterio'];
        $data = array();
        $data['rows'] = $obj->getDatos_grilla_docentes();
        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/_Docente.php');
        return $view->renderPartial();
    }
    
    public function ListaPdf_P($p) {
        $obj = new Main();
        $obj->criterio = $p['criterio'];
        $data = array();
        $data['rows'] = $obj->getDetalle_proyecto();
        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/_Pdf.php');
        return $view->renderPartial();
    }

        public function Actividad_P($p) {
        $obj = new Main();
        $obj->criterio = $p['criterio'];
        $data = array();
        $data['rows'] = $obj->getDatos_Actividades();
        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/_Actividad.php');
        return $view->renderPartial();
    }
    
    public function Notas_P($p) {
        $obj = new Main();
        $obj->criterio = $p['criterio'];
        $data = array();
        $data['rows'] = $obj->getVerNotasProyecto();
        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/_Notas.php');
        return $view->renderPartial();
    }
	
	
	
	public function grilla_solicitudes($p) {
        $obj = new Main();
//        $obj->table = $p['table'];
////        $obj->criterio = $p['criterio1'];
//        $obj->criterio = $p['criterio'];
//        $obj->filtro = $p['filtro'];
//        $obj->filtro1 = $p['filtro1'];
        $data = array();

        $data['rows'] = $obj->getDatos_grilla_solicitudes();
        $data['name'] = $p['name'];
        $data['id'] = $p['id'];
        $data['code'] = $p['code'];
        $data['disabled'] = $p['disabled'];
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/solicitudes.php');
        return $view->renderPartial();
    }
}



?>
