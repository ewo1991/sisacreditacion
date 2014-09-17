
 $("#semestreacademico").live("change",function() {
        $("#silabus").css("display","none");
        $("#ola").css("display","none");
 
     var ids = $(this).val();

        $.post('index.php','controller=alumnocurso&action=getCursos&CodigoSemestre=' + ids, function(data) {
            console.log(data);
            $("#cursoalumno").empty().append(data);
            
            
        });

    });
    

//metodo 1
$("#hola").live("click", function() {
    
    var id = $(".tema").attr("name");
        $("#ola").css("display","none");
 
  $.post('index.php', 'controller=alumnocurso&action=getTema&Codigo=' + id, function(data) {
        $(".temas").empty().append(data);
    });

});

function Ver(id) {

    var idsemestre = $("#semestreacademico").attr("value");

//    console.log(id);
$("#silabus").css("display","");
$("#cursos").css("display","none");
 $("#datos").css("display","");
 
 $("#notas").css("display","none");



$("#datos").attr({
    
    'class':'col-md-10 col-md-offset-2'
});
  $("#regresar").css("display","");
  
 
    $.post('index.php', 'controller=alumnocurso&action=getSilabus&Codigo=' + id+'&idSemestre='+idsemestre, function(data) {
        $("#silabus").css("display","inline");
        $("#silabus").empty().append(data);
    });
    

    
    $("#ola").css("display","");

    
    //unidad
       var sin='N';
    $.post('index.php', 'controller=alumnocurso&action=getUnidad&CodigoCurso=' + id+'&idSemestre='+idsemestre+ '&sin='+sin, function(data) {
     $("#unidad").empty().append(data);
     });
     
     $.post('index.php', 'controller=alumnocurso&action=getUnidadid&CodigoCurso=' + id+'&idSemestre='+idsemestre+ '&sin='+sin, function(data) {
     $("#unidadid").append(data); 
     });
     
//     $.post('index.php', 'controller=alumnocurso&action=getSilabusid&CodigoCurso=' + id+'&idSemestre='+idsemestre, function(data) {
//     $("#silabusid").empty().append(data); 
//     });
     
     
     
     
     $.post('index.php', 'controller=alumnocurso&action=getUnidadF&CodigoCurso=' + id+'&idSemestre='+idsemestre+ '&sin='+sin, function(data) {

     $("#cap").empty().append(data);
     });
 //fin unidad    

}
//$(".unidad").live("click",function(){
//    
//    var idcurso =$("#codigocurso").attr("value");
//    var idsemestre =$("#codigosemestre").attr("value"); 
//   var sin='N';
//    $.post('index.php', 'controller=alumnocurso&action=getUnidad&CodigoCurso=' + idcurso+'&idSemestre='+idsemestre+ '&sin='+sin, function(data) {
//     $("#unidad").empty().append(data);
//     $("#cap").empty().append(data);
//     });
//});


    
$("#regresar").live("click",function(){
  
    $("#datos").attr({'class':'col-md-8'});
      $("#cursos").css("display","");
      $("#datos").css("display","none");
  $("#regresar").css("display","none");
});



function VerSyllabus(idalumno,idcurso){
    
    var idsemestre=$(".semestre").attr("value");
    

    $("#notas").css("display","");
     $("#datos").css("display","");
     $("#datos").css("display","");
      $("#silabus").css("display","none");
      
     
  $.post('index.php', 'controller=alumnocurso&action=getNotas&CodigoAlumno='+idalumno+'&idsemestre='+idsemestre+'&idcurso='+idcurso, function(data) {
            
      $("#notas").empty().append(data);
     });
    
    
    
}
