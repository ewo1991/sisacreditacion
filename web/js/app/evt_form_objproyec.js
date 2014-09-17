$(function() {
    $( "#descripcion" ).focus();   
    
    $( "#save" ).click(function(){
        bval = true;        
        bval = bval && $( "#descripcion" ).required();
        bval = bval && $( "#idproyecto" ).required();
        
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});