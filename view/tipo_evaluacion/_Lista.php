<script type="text/javascript">
    $(function(){
        $( "#q" ).focus();
    });    
    function get(p1,p2)
    {
        opener.document.getElementById('idtipo_evaluacion').value=p1;
        opener.document.getElementById('descripcion').value=p2;
       
        window.close();
    }
</script>
<div class="div_container">
<h6 class="ui-widget-header"> Tipo de Evaluaciones Registradas</h6>
<?php echo $grilla; ?>
</div>