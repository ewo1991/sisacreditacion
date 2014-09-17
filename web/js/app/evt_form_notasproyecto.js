$(function() {
    $( "#idproyecto" ).focus(); 
     
    $("#save").click(function(){
        bval = true;        
        bval = bval && $( "#idproyecto" ).required();     
        bval = bval && $( "#nota" ).required();
        bval = bval && $( "#idconcepto" ).required();
        bval = bval && $( "#CodigoAlumno" ).required();
        bval = bval && $( "#CodigoSemestre" ).required();
       
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});