$(function() {
    $( "#nombre_grupo" ).focus();    
    $( "#save" ).click(function(){
        bval = true;        
        bval = bval && $( "#nombre_grupo" ).required();        
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});