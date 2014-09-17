$(function() {
    $( "#DescripcionArea" ).focus(); 
    $( "#TotalCursos" ).focus(); 
    $( "#TotalCreditos" ).focus(); 
    $( "#save" ).click(function(){
        bval = true;        
        bval = bval && $( "#DescripcionArea" ).required();  
        bval = bval && $( "#TotalCursos" ).required();  
        bval = bval && $( "#TotalCreditos" ).required(); 
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});