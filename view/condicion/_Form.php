<?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_condicion.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
<h6 class="ui-widget-header">Registro de Condicion</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="condicion" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 550px; ">
            <fieldset class="ui-corner-all" >
                <legend>Datos</legend>            
                <label for="CodigoCondicion" class="labels">Codigo:</label>
                <input id="CodigoCondicion" name="CodigoCondicion" class="text ui-widget-content ui-corner-all" style=" width: 220px; text-align: left;" value="<?php echo $obj->CodigoCondicion; ?>" readonly />                
                <br>
                <label for="DescripcionCondicion" class="labels" style="width: 100px" >Descripcion:</label>
                <input id="DescripcionCondicion" maxlength="100" name="DescripcionCondicion" class="text ui-widget-content ui-corner-all" style=" width: 220px; text-align: left;" value="<?php echo $obj->DescripcionCondicion; ?>" />
                <br/>
                <br/>
             </fieldset> 
            <fieldset>
                <legend>Accion</legend>
                 <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="save" class="button">GRABAR</a>
                    <a href="index.php?controller=condicion" class="button">ATRAS</a>
                </div>
            </fieldset>
        </div>
    </div>
</form>
</div>