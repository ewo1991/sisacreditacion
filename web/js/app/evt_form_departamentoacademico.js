$(function() {
    $( "#DescripcionDepartamento" ).focus();
    $( "#EstadoDpto" ).focus();
    $( "#Abreviatura" ).focus();
    $( "#Orden" ).focus(); 
     
    $("#save").click(function(){
        bval = true;        
        bval = bval && $( "#DescripcionDepartamento" ).required();   
        bval = bval && $( "#EstadoDpto" ).required(); 
        bval = bval && $( "#Abreviatura" ).required();
        bval = bval && $( "#Orden" ).required(); 
          
       
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});