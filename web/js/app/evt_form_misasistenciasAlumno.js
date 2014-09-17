$(function() {
    
    $("#CodigoSemestre").change(function() {
         var idsemestre = $(this).val();
      $.post('index.php', 'controller=misasistenciasalumno&action=mostrar_mis_asistencias_eventos&sem='+idsemestre, function(data) {
            console.log(data);
            $("#tabla").empty().append(data);
        });  
        $.post('index.php', 'controller=misasistenciasalumno&action=mi_Tutor&sem='+idsemestre, function(data) {
            console.log(data);
            $("#tutor").empty().append(data);
        });
        
    });
    $("#Mis_companeros_tutoria").css("display","none");$("#atras").css("display","none");
    $(".ver").click(function() {
        $("#grilla_eventos").css("display","none"); document.getElementById("semestres").style.visibility = 'hidden';
        $("#Mis_companeros_tutoria").css("display","");$("#atras").css("display","");
              $.post('index.php', 'controller=asignaciontutoria&action=mostrar_alumnos_asignados&CodigoProfesor=0700015', function(data) {
            console.log(data);
            $("#Mis_companeros_tutoria").empty().append(data);
        });
    });
        
      $.post('index.php', 'controller=misasistenciasalumno&action=mostrar_mis_asistencias_eventos', function(data) {
            console.log(data);
            $("#tabla").empty().append(data);
        });  
        
        $.post('index.php', 'controller=misasistenciasalumno&action=mi_Tutor', function(data) {
            console.log(data);
            $("#tutor").empty().append(data);
        });
     
     
    
    $("#lista").css("display","none");

    $("#save").click(function() {
        bval = true;
        
        if (bval) {
            $("#frm").submit();
        }
        return false;
    });
});

