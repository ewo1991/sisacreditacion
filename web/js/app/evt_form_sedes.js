$(function() {
    
    $( "#DescripcionSede" ).focus();
    $( "#EstadoSede" ).focus(); 
    $( "#save" ).click(function(){
        bval = true;        
       
        bval = bval && $( "#EstadoSede" ).required(); 
        bval = bval && $( "#DescripcionSede" ).required(); 
          
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});