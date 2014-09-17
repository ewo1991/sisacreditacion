    $(function() {
        $("#tabs").tabs();
    });

    function verMas(id) {
            
         $.post('index.php', 'controller=listaproyecto&action=getDetalleProyecto&idproyecto=' + id, function(data) {
            console.log(data);
            $("#generales").empty().append(data);
        });   
         $.post('index.php', 'controller=listaproyecto&action=getDetalleProyecto1&idproyecto=' + id, function(data) {
            console.log(data);
            $("#planteamiento").empty().append(data);
        }); 
        
        $.post('index.php', 'controller=listaproyecto&action=getListaProyecto&idproyecto=' + id, function(data) {
            console.log(data);
            $("#objetivos").empty().append(data);
        });
         $.post('index.php', 'controller=listaproyecto&action=getMarco&idproyecto=' + id, function(data) {
            console.log(data);
            $("#marco").empty().append(data);
        });
         $.post('index.php', 'controller=listaproyecto&action=getMetodologia&idproyecto=' + id, function(data) {
            console.log(data);
            $("#metodologia").empty().append(data);
        });
        
         $.post('index.php', 'controller=listaproyecto&action=getAspectos&idproyecto=' + id, function(data) {
            console.log(data);
            $("#aspectos").empty().append(data);
        });
        
        
         $.post('index.php', 'controller=listaproyecto&action=getListaAlumno1&idproyecto=' + id, function(data) {
            console.log(data);
            $("#alumnos").empty().append(data);
        });
        
            $.post('index.php', 'controller=listaproyecto&action=getListaDocente&idproyecto=' + id, function(data) {
            console.log(data);
            $("#docentes").empty().append(data);
        });
            $.post('index.php', 'controller=listaproyecto&action=getDetallePdf&idproyecto=' + id, function(data) {
            console.log(data);
            $("#pdf").empty().append(data);
        }); 
      
        
    }
    function Unirse(id2) {
        $('#id2').text(id2);
        $('#dialogo2').dialog('open');
    }

    $(document).ready(function() {
        $("#dialogo").dialog({autoOpen: false});

        $('#dialogo').dialog({
            modal: true,
            show: 'explode',
            hide: 'explode'
        });
        $("#abrir").click(function(event) {
            $("#dialogo").dialog('open');
        });

    });

    $(document).ready(function() {
        $("#dialogo2").dialog({autoOpen: false});

        $('#dialogo2').dialog({
            modal: true,
            show: 'explode',
            hide: 'explode'

        });

        $("#abrir2").click(function(event) {
            $("#dialogo2").dialog('open');
        });
        $(".cerrar2").click(function(event) {
            $("#dialogo2").dialog('close');
        });
        

    });
  
