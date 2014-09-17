$(function() {
    $( "#idtipo_bibliografia" ).focus();   
    
    
    $( "#save" ).click(function(){
        bval = true;        
        bval = bval && $( "#idtipo_bibliografia" ).required();
        bval = bval && $( "#referencia" ).required();
        bval = bval && $( "#identificador" ).required();
        bval = bval && $( "#descripcion" ).required();
   
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});