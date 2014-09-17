$(function() {
    $( "#nombre_concepto" ).focus(); 
    $( "#peso_promedial" ).focus(); 
    $( "#save" ).click(function(){
        bval = true;        
        bval = bval && $( "#nombre_concepto" ).required();  
        bval = bval && $( "#peso_promedial" ).required();  
         
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});