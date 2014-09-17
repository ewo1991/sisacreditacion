<?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_modalidadingreso.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
<h6 class="ui-widget-header">Registro de Modalidad Ingreso</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="modalidadingreso" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 550px; ">
            <fieldset class="ui-corner-all" >
                <legend>Datos</legend>            
                <label for="CodigoModalidad" class="labels"style="width: 50px">Codigo:</label>
                <input id="CodigoModalidad" name="CodigoModalidad" class="text ui-widget-content ui-corner-all" style=" width: 100px; text-align: left;" value="<?php echo $obj->CodigoModalidad; ?>" readonly />                
                <br/>
                <label for="DescripcionModalidad" class="labels" style="width: 100px" >Descripcion:</label>
                <input id="descripcion" maxlength="100" name="DescripcionModalidad" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->DescripcionModalidad; ?>" />
                
             </fieldset> 
            <fieldset>
                <legend>Accion</legend>
            
                <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="save" class="button">GRABAR</a>
                    <a href="index.php?controller=modalidadingreso" class="button">ATRAS</a>
                </div>
                
            </fieldset>
        </div>
    </div>
</form>
</div>