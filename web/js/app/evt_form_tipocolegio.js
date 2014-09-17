$(function() {
    $( "#DescripcionTipoColegio" ).focus(); 
    $( "#save" ).click(function(){
        bval = true;        
        bval = bval && $( "#DescripcionTipoColegio" ).required(); 
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});