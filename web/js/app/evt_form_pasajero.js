$(function() {
    $( "#idtipo_doc" ).focus();    
    $("#fnacimiento").datepicker({'dateFormat':'dd/mm/yy','changeMonth':true,'changeYear':true});
    $( "#save" ).click(function(){
        bval = true;        
        bval = bval && $( "#idtipo_doc" ).required();
        bval = bval && $( "#nrodocumento" ).required();
        bval = bval && $( "#nombres" ).required();
        bval = bval && $( "#apellidos" ).required();
        
        if (bval) 
        {
            $("#frm").submit();
        }
        return false;
    });   
});