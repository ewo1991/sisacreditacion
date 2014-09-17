$(function() {
    $( "#idunidad" ).focus();  
    $( "#semana" ).focus();  
    $( "#contenido" ).focus();  
    $( "#conceptual" ).focus();  
    $( "#procedimental" ).focus();  
    $( "#actitudinal" ).focus();  
    $( "#competencia" ).focus();  
    
    
    $( "#save" ).click(function(){
        bval = true;        
        bval = bval && $( "#idunidad" ).required();
        bval = bval && $( "#semana" ).required();
        bval = bval && $( "#contenido" ).required();
        bval = bval && $( "#conceptual" ).required();
        bval = bval && $( "#procedimental" ).required();
        bval = bval && $( "#actitudinal" ).required();
        bval = bval && $( "#competencia" ).required();
        
        
        
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});