$(function() {
    $( "#nombre_anexo" ).focus();   
    
    
    $( "#save" ).click(function(){
        bval = true;   
        bval = bval && $( "#idproyecto" ).required();
        bval = bval && $( "#nombre_anexo" ).required();
        
        
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});