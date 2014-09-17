<?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_clase.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
<h6 class="ui-widget-header">Registro de Clases</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="clase" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 350px; ">
               
            <fieldset class="ui-corner-all" >
                <legend>Datos</legend>
                <label for="idclase" class="labels" style=" width: 40px; text-align: left;">Codigo:</label>
                <input id="idclase" name="idclase" class="text ui-widget-content ui-corner-all" style=" width: 50px; text-align: left;" value="<?php echo $obj->idclase; ?>" readonly />
                 
                 <br>
                <label for="contenido" class="labels" style="width: 140px;">Tema:</label>
                <?php echo $tema; ?>
                
                <br>
                
                <label for="fecha" class="labels" style="width: 140px;">Fecha:</label>
                <input id="fecha" name="fecha" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->fecha; ?>" />
               
            
                    
                
        </div>
       </fieldset>
            <div style="margin:0 auto; width: 350px; height: 70px;">
            <fieldset class="ui-corner-all" >
            <legend>Accion</legend>
                <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="save" class="button">GRABAR</a>
                    <a href="index.php?controller=clase" class="button">ATRAS</a>
                </div>
                </fieldset>
                </div>
        </div>
</form>
</div>