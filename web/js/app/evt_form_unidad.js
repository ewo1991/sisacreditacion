$(function() {
    $( "#nombreunidad" ).focus();   
    
    
    
    $( "#save" ).click(function(){
        bval = true;        
        bval = bval && $( "#nombreunidad" ).required();
        bval = bval && $( "#descripcionunidad" ).required();
        bval = bval && $( "#duracion" ).required();
        bval = bval && $( "#competencia" ).required();
        bval = bval && $( "#idsilabus" ).required();
        
        
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});