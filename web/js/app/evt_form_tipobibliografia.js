$(function() {
    $( "#descripcion_tipobibliografia" ).focus(); 
     
    $("#save").click(function(){
        bval = true;        
        bval = bval && $( "#descripcion_tipobibliografia" ).required();     
          
       
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});