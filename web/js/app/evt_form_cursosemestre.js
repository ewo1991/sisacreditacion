//cursos q enseña el docente
$(function() {
    
    //var vars = 0;
    //carga(vars);
    
    if($("#semestreacademico").val() === "" )
    {
        //alert("sd");
    }
    else
    {
        var vars = $("#semestreacademico").val();
        //carga(vars);  
    }
    
    
    
    $("#semestreacademico").change(function() {
       
      vars = $(this).val();
      carga(vars);  
    });
    
    
// fin cursos q enseña el docente
    $('#myTab a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });

});

function carga(vars){
     $("#silabus").css("display", "none");
               
        //var ids = $(this).val();
        //console.log(ids);
        $("#tablaevaluaciones").css("display", "none");
        $("#borrarb").css("display", "none");
        $.post('index.php', 'controller=cursosemestre&action=getCursosD&CodigoSemestre=' + vars, function(data) {
            console.log(data);
//           $("#boton").css("display", "none");
            $("#lista").css("display", "none");
//            $("#boton").css("display", "none");
            
             $("#silaedit").css("display", "none");
            $("#cursodocente").empty().append(data);
            $("#accordion").css("display", "none");
        });
}

// lista de alumnos de cursos q enseña el docente  ->>>boton lista
function Ver(id) {
    var idsemestre = $("#semestreacademico").attr("value");
    var opt="A";
    console.log(id);
    $(".olassss").css("display", "none");
    $("#tablaevaluaciones").css("display", "none");
    $("#borrarb").css("display", "none");
    $.post('index.php', 'controller=cursosemestre&action=getListaA&idcurso='+id+'&idSemestre=' + idsemestre+'&opcion='+opt, function(data) {
        
        $("#sillabus").css("display", "none");
//        $("#boton").css("display", "none");

        $("#accordion").css("display", "none");
        $("#silaedit").css("display", "none");
        $("#lista").css("display", "inline");
        $("#lista").empty().append(data);
    });
}

//  fin lista de alumnos de cursos q enseña el docente--->>boton registro  notas de cada envento
function VerRegistro(id) {
    var idsemestre = $("#semestreacademico").attr("value");
$("#tablaevaluaciones").css("display", "");
$("#borrarb").css("display", "");
    $.post('index.php', 'controller=cursosemestre&action=getSillabysD&Codigo=' + id + '&idSemestre=' + idsemestre, function(data) {
        $("#accordion").css("display", "none");
        $("#lista").css("display", "none");
        $("#evaluaciones").css("display", "inline");
        $("#silaedit").css("display", "none");
         $("#boton").css("display", "none");
        $("#evaluaciones").empty().append(data);
        $("#regresar").css("display", "none");
      
    });
      $.post('index.php', 'controller=cursosemestre&action=getListaA2&Codigo=' + id + '&idSemestre=' + idsemestre, function(data) {
            $(".olassss").empty().append(data);
     });
     $(".olassss").css("display", "");
     
//      $.post('index.php', 'controller=cursosemestre&action=getNcurso&Codigo=' + id , function(data) {
//           
//          $(".ncurso").empty().append(data);
//     });
        
}



$("#regresar").live("click", function() {
    $("#chau").css("display", "");
    $("#boton").css("display", "none");
    $("#agrandar").attr({
        'class': 'col-md-8'
    });
     
        
         $("#ola").css({
            'width':'273px'
        });
        
        $("#ola").css({
            'height':'600px'
        });
        
         $("#grande").css({
            'height':'270px'
        });
         $("#grande").css({
            'width':'635px'
        });
        
        $(".nota").remove();
        
    $("#borrarb").css("display", "none");
});


//boton del mostrar el siabus  y editar


function VerSi(id) {
    var idsemestre = $("#semestreacademico").attr("value");
//    
//    alert (id+' '+idsemestre);
$("#silaedit").css("display","");
   $("#boton").css("display", "none");
//olassss
$("#borrarb").css("display", "none");
$(".olassss").css("display", "none");
$("#tablaevaluaciones").css("display", "none");

    $.post('index.php', 'controller=cursosemestre&action=getEdiSillabus&Codigo=' + id + '&idSemestre=' + idsemestre, function(data) {
//       
//       
//        $("#evaluaciones").css("display", "inline");
 $("#accordion").css("display", "none");
       $("#boton").css("display", "none");
        $("#lista").css("display", "none");    
        $("#silaedit").css("display", "");
             
        $("#silaedit").empty().append(data);
        $(".regresar").css("display", "none");
    });
}

$(".unidad").live("click", function() {
    var semestre = $("#semestre").attr("value");
    var curso = $("#curso").attr("value");
    var opt="asd";
//        
//        var d=semestre+' '+curso;
//        alert (d);
            $("#boton").css("display", "none");
                
    $.post('index.php', 'controller=cursosemestre&action=getUnidad&CodigoCurso=' + curso + '&idSemestre=' + semestre+'&sin='+opt, function(data) {
$("#boton").css("display", "none");
        $("#unidades").empty().append(data);
        
    });

});

function temasdUnidad(id){
    
    var codunidad=$("#idunidad").attr("value");
    //    console.log(codunidad);
var opt='B';
$.post('index.php', 'controller=cursosemestre&action=getTema&Codigo=' +id+'&option='+opt, function(data) {
$("#boton").css("display", "none");
        $(".tema").empty().append(data);
    });
};





$("#unid").live("click", function() {
    var semestre = $("#semestre").attr("value");
    var curso = $("#curso").attr("value");
    var sin='S';
      
$(".recibS").css("display","none");
$(".recibU").css("display","none");
$(".recibT").css("display","none");
$("#chau").css("display","none");
$(".regresar").css("display","");

    $.post('index.php', 'controller=cursosemestre&action=getUnidad&CodigoCurso=' + curso + '&idSemestre=' + semestre+ '&sin='+sin, function(data) {
//$("#boton").css("display", "none");
        $("#uni").empty().append(data);
    });

});



$("#vertema").live("click",function(){
    var codunidad=$("#codunidad").attr("value");
    var opt='A';
    
$(".regresar").css("display","");

$.post('index.php', 'controller=cursosemestre&action=getTema&Codigo=' + codunidad+'&option='+opt , function(data) {

        $("#tema").empty().append(data);
    });
});



$(".editar").live("click",function(){
            $("#boton").css("display", "");

});



function filtro (id){
   
     var alumno=$(".codalumno").attr("value");
     var enviar2=".enviar"+id;
     var td=".campotext"+id;
    var idcampo=$(td).attr("name");
    var evento='.campo'+id;
    var editarnota =".editarnota"+id;

     $("#accordion").css("display", "");
        $("#chau").css("display", "none");
        $("#borrarb").css("display", "");
        $("#regresar").css("display", "");
            $("#boton").css("display", "none");
        $("#agrandar").attr({
            'class': 'col-md-11 col-md-offset-1'
        });
        
        $("#ola").css({
            'width':'1000px'
        });
        $("#aumentar").css({
            'class':'col-md-12'  
        });
        
         $("#ola").css({
            'height':'300px'
        });
         $("#grande").css({
            'height':'300px'
        });
         $("#grande").css({
            'width':'850px'
        });
        $(editarnota).css("display","none");
        $("#lista").css("display", "none");
        $(".insertar").css("display", "");
    if(id !== idcampo || id === idcampo ){
//        $(evento).css("display","");

             $(evento).html("<input  type='text'  size='7px' class='nota' name='notas[]' pattern='{0-9}+'/><br>\n\
                                ");
              $(enviar2).css("display","");
}
else{
$(evento).css("display","none");
 
}
    
}




  $("#enviarn").live("click",function(){
    
    var alumno =$('input[name="idalumno[]"]').serialize();
    var nota=$('input[name="notas[]"]').serialize();
    var evaluacion=$(".codevento").attr("value");
//    var codalumno=$(".codalumno").val();
        var campo=".campotext"+evaluacion;
    var editarnota=".editarnota"+evaluacion;
    var notita=".notita"+evaluacion;
    
    var codcurso=$(".codcurso").attr("value");
        var codsemestre=$(".codsemestre").attr("value");

//    alert (alumno+nota);
//    alert($("#formnotas").serialize());
    $.post('index.php','controller=cursosemestre&action=getEditN&idalumno='+alumno+'&idevaluacion='+evaluacion+'&notas='+nota,function(data) {

//        alert("okis");
        $("#pachas").empty().append(data);
    });
    
         alert("Se inserto la Evaluacion");
          $.post('_tablaN.php','controller=cursosemestre&action=getCalificaiones&idsemestre='+codsemestre+'&idcurso='+codcurso,function(data) {

        $(".oli").empty().append(data);
    });
         $(campo).css("background","#008000");
          $(editarnota).css("display","");
     $(".nota").css("display","none");
    
    $(editarnota).html("<a><img  src='../web/images/edit.png' class='edit"+evaluacion+"'></a>");
  });

$(".ecp").live("click",function(){
    
//ys11    var curso=$("#curs").attr("value");
    var semestre=$("#semes").attr("value");
    $post('index.php','controller=cursosemestre&action=getBibliografia&curso='+curso+'&semestre='+semestre,function(data){
        
        $("#biblio").empty().append(data);
    });
});




//function inicio(){
//    var x =$("#unid");
//    x.click(mostrar);
//    $("#editsy").css("dispaly","none");
//    
//}
//
//function mostrar (){
//    
//    var x =$(".table");
//    x.live("toggler");
//}



function VerAsistencia(id) {
    var idsemestre = $("#semestreacademico").attr("value");
var opt='dsa';

//        $("#ola").css("display","none");
//        $("#agrandar").css("display","none");
$("#silaedit").css("display","none");

    $("#lista").css("display","none");
        $("#evaluaciones").css("display","none");
        $(".olassss").css("display","none");
    $.post('index.php', 'controller=cursosemestre&action=getUnidad&CodigoCurso=' + id + '&idSemestre=' + idsemestre+'&sin='+opt, function(data) {

        $("#unidadesA").empty().append(data);
       
        
    });
  


}

function TemasClase(idtema,idclase){
    

var semestre = $(".semestre").attr("value");
var curso = $(".curso").attr("value");
      var unidad =$("#idunidad").val();
      var esunidad=".codunidad"+unidad;
//      var idclase=$("#idclaseC").attr("value");
      var cerrar="codunidad"+unidad+" collapsed";
       
   
      $(esunidad).attr({
          'class':cerrar
      });
      
      $(".tema").attr({
          
          'class':'tema panel-collapse collapse',
          'style':'height: 0px'
          
      });
      
      $("#chau").css("display","none");
      $("#agrandar").attr({
         'class':'col-md-11'
     });
     if (idtema==="todavia"){
                      $("#Bregresar").html("<a href='index.php?controller=cursosemestre' class='button' id='regreS'>Regresar</a>");

         $("#agrandar").attr({
            
            'class':'col-md-11 col-md-offset-2'
            
        });
        
         alert("NO ES LA FECHA ESTALBECIDA");
         $(".tablaAsis").css("visibility","hidden");
     }else{
         if(idtema==="paso"){
                          $("#Bregresar").html("<a href='index.php?controller=cursosemestre' class='button' id='regreS'>Regresar</a>");

             $("#agrandar").attr({
            
            'class':'col-md-11 col-md-offset-2'
            
        });
        
             alert("El limite de tiempo caduco");
         $(".tablaAsis").css("visibility","hidden");

         }
         else{
             $("#Bregresar").html("<a href='index.php?controller=cursosemestre' class='button' id='regreS'>Regresar</a>");
         var opt="B";
                  $(".tablaAsis").css("visibility","");

    $.post('index.php', 'controller=cursosemestre&action=getListaA&idcurso='+curso + '&idSemestre=' + semestre+'&opcion='+opt, function(data) {
        
        $("#sillabus").css("display", "none");
//        $("#boton").css("display", "none");

       
        $(".tablaAsis").empty().append(data);
        $(".daridclase").html("<input type='hidden' class='idclase' value='"+idclase+"' />");
    });
        $("#agrandar").attr({
            
            'class':'col-md-11 col-md-offset-1'
            
        });
     }
 }
  
    
}

$("#enviarA").live("click",function(){
    var alumno =$('input[name="alumno[]"]').serialize();
    var asistencia =$('input[name="asisten[]"]').serialize();
    var clase =$(".idclase").attr("value");
    
   $.post('index.php','controller=cursosemestre&action=getAsistencia&idalumno='+alumno+'&idclase='+clase+'&asistencia='+asistencia,function(data) {

        $("#asisss").empty().append(data);
    });
    
    alert ("se inserto la asistencia");
    $("#ola").css("display","none");
    
});


function editSylabus(id){
     $(".recibS").css("display","");
    var vali="Sl";
                 $(".regresar").css("display","");
                 $(".ecp").attr({
                     
                     'style':'font-size: 12px;'
                 });
                 
                  $("#ampliar").attr({
                      'class':'col-md-onset-1' 
                 });

    $(".recibS").attr({
        
        'src':'index.php?controller=silabus&action=edit&id='+id+'&variable='+vali
    });
    $(".recibS").css("display","");
    
    $("#chau").css("display","none");
}


function edidUnidad(id){
    var vali="Sl";
                 $(".regresar").css("display","");
 $(".ecp").attr({
                     
                     'style':'font-size: 12px;'
                 });
    $(".recibS").remove();
    $(".recibU").css("display","");
    $(".recibU").attr({
        
        'src':'index.php?controller=unidad&action=edit&id='+id+'&variable='+vali
    });
    $(".recibU").css("display","");
        $("#chau").css("display","none");
    
   
}

//index.php?controller=tema&action=edit&id=

function edidTema(id){
     $(".ecp").attr({
                     
                     'style':'font-size: 12px;'
                 });
                  $("#ampliar").attr({
                      'class':'col-md-offset-3' 
                 });
                
    var vali="Sl";
    $(".recibS").remove();
    $(".recibU").remove();
    $(".recibT").css("display","");
    $(".recibT").attr({
        
        'src':'index.php?controller=tema&action=edit&id='+id+'&variable='+vali
    });
    $(".recibT").css("display","");
        $("#chau").css("display","none");
    
   
}

$(".regresar").live("click",function(){
      $("#chau").css("display","");
            $(".regresar").css("display","none");
    $(".recibS").remove();
    $(".recibU").remove();
    $(".recibT").remove();
 $(".ecp").attr({
                     
                     'style':''
                 });
                 
                  $("#ampliar").attr({
                      'class':'' 
                 });
    
});

$(".codunidad").live("click",function(){
    var unidad=$(".idunidad").attr("value");
    
    var opt='C';
$.post('index.php', 'controller=cursosemestre&action=getTema&Codigo=' +unidad+'&option='+opt, function(data) {
//$("#boton").css("display", "none");
        $(".temas").empty().append(data);
    });
});