$(function() {
    $( "#DescripcionCategoria" ).focus(); 
     
    $("#save").click(function(){
        bval = true;        
        bval = bval && $( "#DescripcionCategoria" ).required();     
          
       
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});