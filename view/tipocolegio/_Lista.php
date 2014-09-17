<script type="text/javascript">
    $(function(){
        $( "#q" ).focus();
    });    
    function get(p1,p2)
    {
        opener.document.getElementById('CodigoTipoColegio').value=p1;
        opener.document.getElementById('DescripcionTipoColegio').value=p2;
        
        window.close();
    }
</script>
<div class="div_container">
<h6 class="ui-widget-header">Tipo de Colegios Registrados</h6>
<?php echo $grilla; ?>
</div>