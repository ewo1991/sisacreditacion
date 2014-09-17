$(function() {
    $( "#idtema" ).focus();
    $( "#fecha" ).focus();
    $("#fecha").datepicker({'dateFormat':'dd/mm/yy'}); 
    
    
    
    $( "#save" ).click(function(){
        bval = true;        
        bval = bval && $( "#idtema" ).required();
        bval = bval && $( "#fecha" ).required();
        
        
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});