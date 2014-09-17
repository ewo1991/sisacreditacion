$(function() {
    $( "#DescripcionActividad" ).focus(); 
	$( "#Orden" ).focus();

    $("#save").click(function(){
        bval = true;        
        bval = bval && $( "#DescripcionActividad" ).required();   
        bval = bval && $( "#Orden" ).required(); 
          
       
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});