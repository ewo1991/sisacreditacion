$(function() {
    $( "#idcargaacademica" ).focus();   
    $("#fecha_inicio").datepicker({'dateFormat':'yy/mm/dd','changeMonth':true,'changeYear':true});    
    $("#fecha_termino").datepicker({'dateFormat':'yy/mm/dd','changeMonth':true,'changeYear':true});  
    
    
    $( "#save" ).click(function(){
        bval = true;        
        bval = bval && $( "#idcargaacademica" ).required();
        bval = bval && $( "#sumilla" ).required();
        bval = bval && $( "#metodologia" ).required();
        bval = bval && $( "#competencia" ).required();
        bval = bval && $( "#fecha_inicio" ).required();
        bval = bval && $( "#fecha_termino" ).required();
        bval = bval && $( "#duracion" ).required();
        bval = bval && $( "#objetivo" ).required();
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});