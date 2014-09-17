<script type="text/javascript">
    $(function(){
        $( "#q" ).focus();
    });    
    function get(p1,p2,p3,p4)
    {
        opener.document.getElementById('CodigoDptoAcad').value=p1;
        opener.document.getElementById('DescripcionDepartamento').value=p2;
        opener.document.getElementById('EstadoDpto').value=p3;
        opener.document.getElementById('Abreviatura').value=p4;
        window.close();
    }
</script>
<div class="div_container">
<h6 class="ui-widget-header">Departamentos Academicos Registrados</h6>
<?php echo $grilla; ?>
</div>