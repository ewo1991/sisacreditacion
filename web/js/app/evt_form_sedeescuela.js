$(function() {
    $( "#CodigoFacultad" ).focus(); 
  
    var codigofacultad=$("#CodigoFacultad"); 
      
       codigofacultad.change(function(){
        var ids = $(this).val();
        
        $.post('index.php','controller=escuelaprofesional&action=getEscuelaProfesional&CodigoFacultad='+ids,function(data){
            $("#CodigoEscuela").empty().append(data);            
        });
    }); 
    
    
    $( "#save" ).click(function(){
        bval = true;        
        bval = bval && $( "#CodigoSiga" ).required();
        bval = bval && $( "#CodigoSira" ).required();
        bval = bval && $( "#CodigoFacultad" ).required();
        bval = bval && $( "#CodigoEscuela" ).required();
        bval = bval && $( "#CodigoSede" ).required();
        
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});