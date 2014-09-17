<?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_tipo_evaluacion.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
<h6 class="ui-widget-header">Registro de tipo evaluacion</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="tipo_evaluacion" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 450px; ">
            <fieldset class="ui-corner-all" >
                <legend>Datos</legend>            
                <label for="idtipo_evaluacion" class="labels" style="width: 40px"  >Codigo:</label>
                <input id="idtipo_evaluacion" name="idtipo_evaluacion" class="text ui-widget-content ui-corner-all" style=" width: 100px; " value="<?php echo $obj->idtipo_evaluacion; ?>" readonly />                
                <br>
                <label for="descripcion" class="labels" style="width: 160px" >Descripcion:</label>
                <input id="descripcion" maxlength="100" name="descripcion" class="text ui-widget-content ui-corner-all" style=" width: 220px; text-align: left;" value="<?php echo $obj->descripcion; ?>" />
                
             </fieldset> 
            <fieldset>
                <legend>Accion</legend>
                <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="save" class="button">GRABAR</a>
                    <a href="index.php?controller=tipo_evaluacion" class="button">ATRAS</a>
                </div>
            </fieldset>
        </div>
    </div>
</form>
</div>