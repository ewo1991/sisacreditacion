$(function() {
    $("#ver_buss").click(function(){
        v = $('#nropasajeros').val();
        popup('index.php?controller=vehiculo&action=view_buss&n='+v,800,370);
    });
    
    $( "#save" ).click(function(){
        bval = true;
        bval = bval && $( "#idestado_vehiculo" ).required();
        bval = bval && $( "#nromatricula" ).required();
        bval = bval && $( "#velocidad" ).required();
        bval = bval && $( "#capacidad" ).required();
        bval = bval && $( "#nropasajeros" ).required();
        bval = bval && $( "#descripcion" ).required();
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