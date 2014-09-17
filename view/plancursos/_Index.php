<?php  include("../lib/functions.php"); ?>
<style type="text/css">
    #grilla select{visibility: hidden;}
    #grilla input[type="text"]{visibility: hidden;}
    #grilla a{visibility: hidden;} #grilla button{visibility: hidden;}
</style>
<div class="div_container">
<h2 class="ui-widget-header">Planes Por Cursos</h2>
PLAN CURRICULAR :<?php echo $plancurricular; ?>
<div id="grilla">
<?php echo $grilla;?>
</div>
</div>
