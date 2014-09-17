$(function() {
    $( "#titulo" ).focus();
    $( "#descripcion" ).focus();
    $( "#fecha" ).focus();
    $("#fecha").datepicker({'dateFormat':'yy/mm/dd'});    
    
    $( "#save" ).click(function(){
        bval = true;   
        
        bval = bval && $( "#titulo" ).required();
        bval = bval && $( "#descripcion" ).required();
        bval = bval && $( "#fecha" ).required();
        
        
               
       
        
        
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});