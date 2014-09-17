$(function() {
    $( "#DescripcionCondicion" ).focus(); 
     
    $("#save").click(function(){
        bval = true;        
        bval = bval && $( "#DescripcionCondicion" ).required();     
          
       
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});