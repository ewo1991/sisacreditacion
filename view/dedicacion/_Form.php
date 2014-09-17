<?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_dedicacion.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
<h6 class="ui-widget-header">Registro de Dedicaciones</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="dedicacion" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 550px; ">
            <fieldset class="ui-corner-all" >
                <legend>Datos</legend>            
                <label for="CodigoDedicacion" class="labels">Codigo:</label>
                <input id="CodigoDedicacion" name="CodigoDedicacion" class="text ui-widget-content ui-corner-all" style=" width: 220px; text-align: left;" value="<?php echo $obj->CodigoDedicacion; ?>" readonly />                
                <br>
                <label for="DescripcionDedicacion" class="labels" style="width: 100px" >Descripcion:</label>
                <input id="DescripcionDedicacion" maxlength="100" name="DescripcionDedicacion" class="text ui-widget-content ui-corner-all" style=" width: 220px; text-align: left;" value="<?php echo $obj->DescripcionDedicacion; ?>" />
                
             </fieldset> 
            <fieldset>
                <legend>Accion</legend>
                <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="save" class="button">GRABAR</a>
                    <a href="index.php?controller=dedicacion" class="button">ATRAS</a>
                </div>
            </fieldset>
        </div>
    </div>
</form>
</div>