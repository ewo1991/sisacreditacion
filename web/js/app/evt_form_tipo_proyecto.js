$(function() {
    $( "#nombre_tipo_proyecto" ).focus(); 
     
    $("#save").click(function(){
        bval = true;        
        bval = bval && $( "#nombre_tipo_proyecto" ).required();     
          
       
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});