<?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_tipo_evento.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
<h6 class="ui-widget-header">Registro de Tipo Evento</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="tipo_evento" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 450px; ">
            <fieldset class="ui-corner-all" >
                <legend>Datos</legend>            
                <label for="idtipo_evento" class="labels" style="width: 45px">Codigo:</label>
                <input id="idtipo_evento" name="idtipo_evento" class="text ui-widget-content ui-corner-all" style=" width: 100px; text-align: left;" value="<?php echo $obj->idtipo_evento; ?>" readonly />                
                <br>
                <label for="descripcion" class="labels" style="width: 95px" >Descripcion:</label>
                <input id="descripcion" maxlength="100" name="descripcion" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->descripcion; ?>" />
                <br/>
                <br/>
             </fieldset> 
            <fieldset>
                <legend>Accion</legend>
                 <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="save" class="button">GRABAR</a>
                    <a href="index.php?controller=tipo_evento" class="button">ATRAS</a>
                </div>
            </fieldset>
        </div>
    </div>
</form>
</div>