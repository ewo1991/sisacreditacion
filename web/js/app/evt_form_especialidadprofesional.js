$(function() {
    $( "#Descripcion" ).focus(); 
    
    
      var codigofacultad=$("#CodigoFacultad"); 
      
       codigofacultad.change(function(){
        var ids = $(this).val();
        
        $.post('index.php','controller=escuelaprofesional&action=getEscuelaProfesional&CodigoFacultad='+ids,function(data){
            $("#CodigoEscuela").empty().append(data);            
        });
    }); 
    
    
    
    $( "#save" ).click(function(){
        bval = true;        
        bval = bval && $( "#Descripcion" ).required();
        bval = bval && $( "#CodigoEscuela" ).required();
        bval = bval && $( "#CodigoFacultad" ).required();
        bval = bval && $( "#Estado" ).required();
       
        
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});