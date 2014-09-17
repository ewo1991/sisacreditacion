$(function() {
    $(".asig").click(function() {
        cadena=$(this).val();
        var pedazo = cadena.split(",");
        idevento=pedazo[0];
        evento=pedazo[1];evento = evento.toUpperCase();
         $("#evento").html(evento);
         document.getElementById("idevento").value = idevento;
         $("#lista_eventos").css("display","none");
         $("#lista").css("display","");
         $.post('index.php', 'controller=asistenciadocente&action=mostrar_lista_docentes_tutoria&idevento='+idevento, function(data) {
            console.log(data);
            $("#lista_alumnos").empty().append(data);
        });
       
    })
    $("#lista").css("display","none");

    $("#save").click(function() {
        bval = true;
        
        if (bval) {
            $("#frm").submit();
        }
        return false;
    });
});

