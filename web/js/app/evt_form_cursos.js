$(function() {
     var codigofacultad = $("#CodigoFacultad");
     codigofacultad.change(function(){
        var ids = $(this).val();
        
   $.post('index.php','controller=escuelaprofesional&action=getEscuelaProfesional&CodigoFacultad='+ids,function(data){
            $("#CodigoEscuela").empty().append(data);            
        });
    });
    
    $( "#CodigoPlan" ).focus();    
    $( "#save" ).click(function(){
        bval = true;        
        bval = bval && $( "#CodigoPlan" ).required();  
        bval = bval && $( "#CodigoFacultad" ).required(); 
        bval = bval && $( "#CodigoEscuela" ).required(); 
        bval = bval && $( "#DescripcionCurso" ).required(); 
        bval = bval && $( "#Creditos" ).required(); 
        bval = bval && $( "#TipoCurso" ).required(); 
        bval = bval && $( "#Ciclo" ).required(); 
        bval = bval && $( "#CodCursoSira" ).required(); 
        bval = bval && $( "#OrdenSegunPlan" ).required(); 
        bval = bval && $( "#EstadoCursoPlan" ).required(); 
        bval = bval && $( "#RequisitoCreditos" ).required(); 
        bval = bval && $( "#OrdenSegunPlanAlterno" ).required(); 
        bval = bval && $( "#DescripcionCursoIngles" ).required(); 
        bval = bval && $( "#CodigoEspecialidad" ).required(); 
        bval = bval && $( "#CodigoAreaCurricular" ).required(); 
        bval = bval && $( "#HorasTeoria" ).required(); 
        bval = bval && $( "#HorasPractica" ).required(); 
        bval = bval && $( "#RequisitoCertificado" ).required(); 
               
        
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});