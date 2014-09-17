$(function() {
    $("#CodigoProfesor" ).focus();   
     $("#FechaNacimiento").datepicker({'dateFormat':'dd/mm/yy'}); 
     $("#FechaIngreso").datepicker({'dateFormat':'dd/mm/yy'}); 
     
      var iddepartamento=$("#departamento");
       iddepartamento.change(function(){
        var ids = $(this).val();
        $.post('index.php','controller=alumno&action=getListaProvincias&departamento='+ids,function(data){
            console.log(data);
            //provincia
            $("#provincia").empty().append(data);
        });
    });
    
    
    $("#provincia").change(function(){
        var ids = $(this).val();
        $.post('index.php','controller=alumno&action=getListaDistritos&provincia='+ids,function(data){
            console.log(data);
            //distrito
            $("#distrito").empty().append(data);
        });
    });
     
     
     
     
	$( "#save" ).click(function(){
        
        bval = true;
        bval = bval && $( "#CodigoProfesors" ).required();        
        bval = bval && $( "#ApellidoPaterno" ).required();
        bval = bval && $( "#ApellidoMaterno" ).required();
        bval = bval && $( "#NombreProfesor" ).required();
        bval = bval && $( "#Direccion" ).required();
        bval = bval && $( "#Email" ).required();
        bval = bval && $( "#RegimenPensionario" ).required();
        
        bval = bval && $( "#FechaNacimiento" ).required();
        bval = bval && $( "#FechaIngreso" ).required();
        
        bval = bval && $( "#Telefono" ).required();
        
         bval = bval && $( "#TipoDocumento" ).required();
         bval = bval && $( "#NumDocumento" ).required();
         bval = bval && $( "#NumeroCarnetEssalud" ).required();
         bval = bval && $( "#CodigoDecretoLey" ).required();
         bval = bval && $( "#Sexo" ).required();
         
         bval = bval && $( "#EstadoCivil" ).required();
         
        
        
        bval = bval && $( "#CodigoCondicion" ).required();
        bval = bval && $( "#CodigoCategoria" ).required();
        bval = bval && $( "#CodicoDedicacion" ).required();
        
        bval = bval && $( "#CodProfesorSira" ).required();
        bval = bval && $( "#CodigoDptoAcad" ).required();
      
     
        
        
        bval = bval && $( "#EstadoProfesor" ).required();
        
         bval = bval && $( "#Marcador" ).required();
       
        
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});