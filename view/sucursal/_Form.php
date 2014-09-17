<?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_sucursal.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
<h6 class="ui-widget-header">Registro de sucursal</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="sucursal" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 550px; ">
            <fieldset class="ui-corner-all" >
                <legend>Datos</legend>            
                <label for="idsucursal" class="labels">Codigo:</label>
                <input id="idsucursal" name="idsucursal" class="text ui-widget-content ui-corner-all" style=" width: 100px; text-align: left;" value="<?php echo $obj->idsucursal; ?>" readonly />                
                <label for="descripcion" class="labels" style="width: 100px" >Descripcion:</label>
                <input id="descripcion" maxlength="100" name="descripcion" class="text ui-widget-content ui-corner-all" style=" width: 220px; text-align: left;" value="<?php echo $obj->descripcion; ?>" />
                <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="save" class="button">GRABAR</a>
                    <a href="index.php?controller=sucursal" class="button">ATRAS</a>
                </div>
             </fieldset> 
        </div>
    </div>
</form>
</div>