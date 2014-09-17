<?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_funcion.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
<h6 class="ui-widget-header">Registro de Funcion</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="funcion" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 550px; ">
            <fieldset class="ui-corner-all" >
                <legend>Datos</legend>            
                <label for="idfuncion" class="labels" style="width: 50px" >Codigo:</label>
                <input id="idfuncion" name="idfuncion" class="text ui-widget-content ui-corner-all" style=" width: 100px; text-align: right;" value="<?php echo $obj->idfuncion; ?>" readonly />                
                <br>
                <label for="nombre_funcion" class="labels" style="width: 100px" >Nombre:</label>
                <input id="nombre_funcion" maxlength="100" name="nombre_funcion" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->nombre_funcion; ?>" />
                               
              
             </fieldset> 
            
            <fieldset>
                <legend>Accion</legend>
                  <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="save" class="button">GRABAR</a>
                    <a href="index.php?controller=funcion" class="button">ATRAS</a>
                </div>
            </fieldset>
        </div>
    </div>
</form>
</div>
