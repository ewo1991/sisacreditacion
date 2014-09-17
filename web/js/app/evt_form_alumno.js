
$(function() {
    var codigofacultad = $("#CodigoFacultad");
    var iddepartamento=$("#departamento");
    
    codigofacultad.change(function(){
        var ids = $(this).val();
        
   $.post('index.php','controller=escuelaprofesional&action=getEscuelaProfesional&CodigoFacultad='+ids,function(data){
            $("#CodigoEscuela").empty().append(data);            
        });
    });
    
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
    
    
    $("#CodigoEscuela").css("width","161px");
        $( "#ApellidoPaterno" ).focus();   
        $("#FechaIngreso").datepicker({'dateFormat':'dd/mm/yy'});  
        $("#FechaEgreso").datepicker({'dateFormat':'dd/mm/yy'});  
        $("#FechaNacimiento").datepicker({'dateFormat':'dd/mm/yy'}); 
        $("#FechaEstadoSituacional").datepicker({'dateFormat':'dd/mm/yy'}); 
        
        
    $( "#save" ).click(function(){
        bval = true;        
        bval = bval && $( "#ApellidoPaterno" ).required();
        bval = bval && $( "#ApellidoMaterno" ).required();
        bval = bval && $( "#NombreAlumno" ).required();
        bval = bval && $( "#Direccion" ).required();
        
        bval = bval && $( "#FechaNacimiento" ).required();
        bval = bval && $( "#Telefono" ).required();
        bval = bval && $( "#TipoDocumento" ).required();
        bval = bval && $( "#NumDocumento" ).required();
        bval = bval && $( "#FechaIngreso" ).required();
        
        bval = bval && $( "#Sexo" ).required();
        bval = bval && $( "#EstadoCivil" ).required();
        bval = bval && $( "#HijoTrabajador" ).required();
        
        bval = bval && $( "#EstadoAlumno" ).required();
        bval = bval && $( "#CodAlumnoSira" ).required();
        bval = bval && $( "#CodigoSemestreIngreso" ).required();
        bval = bval && $( "#FechaEgreso" ).required();
        bval = bval && $( "#CodigoSemestreEgreso" ).required();
        
        bval = bval && $( "#CodigoSedeEscuela" ).required();
        bval = bval && $( "#Foto" ).required();
        bval = bval && $( "#FechaEstadoSituacional" ).required();
        bval = bval && $( "#CodNacionalidad" ).required();
        bval = bval && $( "#Cobertura" ).required();
        bval = bval && $( "#CodigoTipoColegio" ).required();
        
        bval = bval && $( "#CodigoRegimen" ).required();
        bval = bval && $( "#CodigoModalidad" ).required();
        bval = bval && $( "#CodigoTipoIngreso" ).required();
        bval = bval && $( "#CodigoEstadoSituacional" ).required();
        
        bval = bval && $( "#CodigoFacultad" ).required();
        bval = bval && $( "#CodigoEscuela" ).required();
        
        
      
        
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});

