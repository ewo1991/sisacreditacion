$(function() {
    $( "#nombre_funcion" ).focus(); 
     
    $("#save").click(function(){
        bval = true;        
        bval = bval && $( "#nombre_funcion" ).required();     
          
       
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});