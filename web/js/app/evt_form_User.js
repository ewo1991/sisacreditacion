$(function() {
    $("#div_activo").buttonset();
    $("#idoficina").css("width","161px");
    $("#idsucursal").change(function(){
        ids = $(this).val();
        $.post('index.php','controller=oficina&action=getOficinas&idsucursal='+ids,function(data){
            $("#idoficina").empty().append(data);            
        });
    });
    $( "#save" ).click(function(){
        bval = true;
        bval = bval && $( "#idempleado" ).required();
        bval = bval && $( "#idperfil" ).required();
        bval = bval && $( "#nombres" ).required();
        bval = bval && $( "#apellidos" ).required();
        bval = bval && $( "#login" ).required();
        bval = bval && $( "#password" ).required();
        
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