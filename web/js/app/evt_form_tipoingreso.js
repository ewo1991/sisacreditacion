$(function() {
    $( "#CodigoModalidad" ).focus();   
    
    $( "#save" ).click(function(){
        bval = true;        
         bval = bval && $( "#CodigoModalidad" ).required();
        bval = bval && $( "#DescripcionTipoIngreso" ).required();
        
        
        
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});