$(function() {
    $( "#idsucursal" ).focus();    
    $( "#save" ).click(function(){
        bval = true;        
        bval = bval && $( "#descripcion" ).required();
        bval = bval && $( "#direccion" ).required();        
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});