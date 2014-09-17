 <!--<a href="javascript:window.print()">imprimir</a>-->
<style type="text/css">
    #criterio{visibility: hidden;} #q{visibility: hidden;} input{visibility: hidden;}
</style>
<div class="div_container"  align="center">
  <?php if($List_sin_cabecera==false){?>  <h2 class="ui-widget-header">ALUMNOS ASIGNADOS AL DOCENTE: <?php echo $_GET['prof']; ?><br> EN EL SEMESTRE : <?php echo $semestre; ?> - CANTIDAD DE ALUMNOS : <?php echo $catidadalumnos;?></h2>
  <?php } echo $grilla; ?>
</div>