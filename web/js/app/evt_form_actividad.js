$(function() {
    $( "#nombre_actividad" ).focus();
    $( "#idproyecto" ).focus();
    $( "#fecha_inicio" ).focus();
    $( "#fecha_fin" ).focus();
    $("#fecha_inicio").datepicker({'dateFormat':'yy/mm/dd'}); 
    $("#fecha_fin").datepicker({'dateFormat':'yy/mm/dd'});    
    
    $( "#save" ).click(function(){
        bval = true;   
        bval = bval && $( "#idproyecto" ).required();
        bval = bval && $( "#nombre_actividad" ).required();
        bval = bval && $( "#fecha_inicio" ).required();
        bval = bval && $( "#fecha_fin" ).required();
        
        
               
       
        
        
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});