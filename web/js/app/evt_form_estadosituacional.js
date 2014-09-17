$(function() {
    $( "#DescripcionEstadoestacionario" ).focus(); 
    $( "#save" ).click(function(){
        bval = true;        
        bval = bval && $( "#DescripcionEstadoestacionario" ).required();  
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});