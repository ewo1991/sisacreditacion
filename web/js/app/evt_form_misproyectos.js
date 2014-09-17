
    $(function() {
        $("#tabs").tabs();
    });
    
function verMas(id) {

        $.post('index.php', 'controller=misproyectos&action=getDetalleProyecto&idproyecto=' + id, function(data) {
            console.log(data);
            $("#generales").empty().append(data);
        }); 
         $.post('index.php', 'controller=misproyectos&action=getDetalleProyecto1&idproyecto=' + id, function(data) {
            console.log(data);
            $("#planteamiento").empty().append(data);
        }); 
        
        $.post('index.php', 'controller=misproyectos&action=getListaProyecto&idproyecto=' + id, function(data) {
            console.log(data);
            $("#objetivos").empty().append(data);
        });
         $.post('index.php', 'controller=misproyectos&action=getMarco&idproyecto=' + id, function(data) {
            console.log(data);
            $("#marco").empty().append(data);
        });
         $.post('index.php', 'controller=misproyectos&action=getMetodologia&idproyecto=' + id, function(data) {
            console.log(data);
            $("#metodologia").empty().append(data);
        });
        
         $.post('index.php', 'controller=misproyectos&action=getAspectos&idproyecto=' + id, function(data) {
            console.log(data);
            $("#aspectos").empty().append(data);
        });
        
        
         $.post('index.php', 'controller=misproyectos&action=getListaAlumno&idproyecto=' + id, function(data) {
            console.log(data);
            $("#alumnos").empty().append(data);
        });
        
            $.post('index.php', 'controller=misproyectos&action=getListaDocente&idproyecto=' + id, function(data) {
            console.log(data);
            $("#docentes").empty().append(data);
        });
        
    }

//    ----------------Actividades------------------
   function verActividad(id) {
       
       $.post('index.php', 'controller=misproyectos&action=getActividad&idproyecto=' + id, function(data) {
            console.log(data);
            $("#actividades").empty().append(data);
        });
       
    }
       function filtroEditar(id) {
       
       $.post('index.php', 'controller=misproyectos&action=getFiltroEditar&idactividad=' + id, function(data) {
            console.log(data);
            $("#dialogo1").empty().append(data);
        });

    }
    
    
    function verNotas(id) {
       
       $.post('index.php', 'controller=misproyectos&action=getNotas&idproyecto=' + id, function(data) {
            console.log(data);
            $("#notas").empty().append(data);
        });
       
    }
    
    
//     $(document).ready(function() {
//        $("#dialogo1").dialog({autoOpen: false});
//
//        $('#dialogo1').dialog({
//            modal: true,
//            show: 'explode',
//            hide: 'explode'
//        });
//        $("#edit").click(function(event) {
//            $("#dialogo1").dialog('open');
//        });
//
//    });
 
$(function() {
    $( "#fecha_inicio" ).focus();

    $("#fecha_inicio").datepicker({'dateFormat':'yy/mm/dd'}); 
    $("#fecha_termino").datepicker({'dateFormat':'yy/mm/dd'});    
    
    $( "#save" ).click(function(){
        bval = true;   
        bval = bval && $( "#fecha_inicio" ).required();
        bval = bval && $( "#fecha_termino" ).required();
        
        
               
       
        
        
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});
  
  

