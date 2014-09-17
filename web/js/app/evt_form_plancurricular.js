$(function() {
    
      var codigofacultad=$("#CodigoFacultad"); 
      
       codigofacultad.change(function(){
        var ids = $(this).val();
        
        $.post('index.php','controller=escuelaprofesional&action=getEscuelaProfesional&CodigoFacultad='+ids,function(data){
            $("#CodigoEscuela").empty().append(data);            
        });
    }); 
    
    
           
            
   
	$( "#save" ).click(function(){
        
        bval = true;  
        bval = bval && $( "#EstadoPlanCurricular" ).required();
        bval = bval && $( "#CodigoEscuela" ).required();
        bval = bval && $( "#CodigoFacultad" ).required();
        bval = bval && $( "#DescripcionPlan" ).required();
        bval = bval && $( "#EstadoPlanCurricular" ).required();   
        bval = bval && $( "#CreditosObligatorios" ).required();
        bval = bval && $( "#CreditosElectivos" ).required();
        bval = bval && $( "#Resolucion" ).required();
        bval = bval && $( "#Tipo" ).required();
        bval = bval && $( "#Vigente" ).required();

        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});