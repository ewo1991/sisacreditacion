$(function() {
    $( "#idchofer" ).focus();    
    $("#fnacimiento").datepicker({'dateFormat':'dd/mm/yy','changeMonth':true,'changeYear':true});
    $( "#save" ).click(function(){
        bval = true; 
        bval = bval && $("#idchofer").required();
        bval = bval && $("#fnacimiento").required();
        bval = bval && $( "#licencia" ).required();
        bval = bval && $( "#nombres" ).required();
        bval = bval && $( "#apellidos" ).required();
        
        if (bval) 
        {
            $("#frm").submit();
        }
        return false;
    });   
});