$(function() {
    $( "#nombre_ejetematico" ).focus();   
    
      
    $( "#save" ).click(function(){
        bval = true;        
        bval = bval && $( "#idgrupo" ).required();
        bval = bval && $( "#nombre_ejetematico" ).required();
        
        
        
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});