<script type="text/javascript">
    $(function(){
        $( "#q" ).focus();
         
    });    
    function get(p1,p2,p3,p4,p5,p6)
    {   
         parent.document.getElementById('CodigoAlumno').value=p1;
         parent.document.getElementById('NombreAlumno').value=p2+" "+p3;     
        var ifr = parent.document.getElementById("iframe_buscar_alumno");
//            ifr.parentNode.removeChild(ifr);
//            parent.googlewin.hide();
ifr.style.display = 'none'; 

    }
    
</script>
<div class="div_container"><?php if($sinCab=false){ ?>
<h6 class="ui-widget-header">Alumnos Por Asignar</h6>
<div id="grilla_alumnos">
<?php } echo $grilla; ?>
</div>

</div>