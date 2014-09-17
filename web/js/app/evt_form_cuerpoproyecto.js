$(function() {
   
    $( "#idindice" ).focus();    
    $( "#save" ).click(function(){
        bval = true;        
        bval = bval && $( "#descripcion" ).required();
        bval = bval && $( "#idindice" ).required(); 
        bval = bval && $( "#indicepadre" ).required();        
        
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});