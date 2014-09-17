$(function() {    
    $("#fecha").datepicker({'dateFormat':'dd/mm/yy'});    
    
    $( "#save" ).click(function(){
        bval = true;
        bval = bval && $( "#empleado" ).required();
        bval = bval && $( "#montopago" ).required();        
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });

    $( "#delete" ).click(function(){
          if(confirm("Confirmar Eliminacion de Registro"))
              {
                  $("#frm").submit();
              }
    });
});