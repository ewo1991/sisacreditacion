$(function() {
    $( "#nombre_linea" ).focus();   
    
    
    
    $( "#save" ).click(function(){
        bval = true;        
        bval = bval && $( "#nombre_linea" ).required();
        bval = bval && $( "#nombre_ejetematico" ).required();
        bval = bval && $( "#idejetematico" ).required();
        
        
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});