$(function() {
    $( "#DescripcionRegimen" ).focus(); 
     
    $("#save").click(function(){
        bval = true;        
        bval = bval && $( "#DescripcionRegimen" ).required();     
          
       
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});