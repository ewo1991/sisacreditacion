<?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_tipo_proyecto.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
<h6 class="ui-widget-header">Registro de Tipo Proyecto</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="tipo_proyecto" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 450px; ">
            <fieldset class="ui-corner-all" >
                <legend>Datos</legend>            
                <label for="idtipo_proyecto" class="labels" style="width: 50px">Codigo:</label>
                <input id="idtipo_proyecto" name="idtipo_proyecto" class="text ui-widget-content ui-corner-all" style=" width: 70px; text-align: right;" value="<?php echo $obj->idtipo_proyecto; ?>" readonly />                
                <label for="nombre_tipo_proyecto" class="labels" style="width:90px" >Descripcion:</label>
                <input id="nombre_tipo_proyecto" maxlength="100" name="nombre_tipo_proyecto" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->nombre_tipo_proyecto; ?>" />
              </fieldset> 
           <div style="margin:0 auto; width: 450px; height: 70px;">
            <fieldset class="ui-corner-all" >
            <legend>Accion</legend>
                <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="save" class="button">GRABAR</a>
                    <a href="index.php?controller=tipo_proyecto" class="button">ATRAS</a>
                </div>
                </fieldset>
                </div>
            
    </div>
        </div>
</form>
