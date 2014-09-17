$(function() {
    $( "#DescripcionModalidad" ).focus(); 
     
    $("#save").click(function(){
        bval = true;        
        bval = bval && $( "#DescripcionModalidad" ).required();     
          
       
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});