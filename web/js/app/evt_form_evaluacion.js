$(function() {
    
    $( "#idunidad" ).focus();    
    $("#fecha").datepicker({'dateFormat':'yy/mm/dd'});  
    $( "#save" ).click(function(){
        bval = true;        
        bval = bval && $( "#idunidad" ).required();  
        bval = bval && $( "#idtipo_evaluacion" ).required(); 
        bval = bval && $( "#descripcionevaluacion" ).required(); 
        bval = bval && $( "#fecha" ).required(); 
        bval = bval && $( "#ponderado" ).required(); 
     
               
        
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});