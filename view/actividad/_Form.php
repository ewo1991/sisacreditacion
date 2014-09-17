<?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_actividad.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
<h6 class="ui-widget-header">Registro de Actividades</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="actividad" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 440px; ">
               
            <fieldset class="ui-corner-all" >
                    <legend>Datos</legend>
                <label for="idactividad" class="labels" style="width: 50px">Codigo:</label>
                <input id="idactividad" name="idactividad" class="text ui-widget-content ui-corner-all" style=" width: 50px; text-align: left;" value="<?php echo $obj->idactividad; ?>" readonly />
              <br>
                <label for="nombre_proyecto" class="labels" style="width: 150px;">Proyecto:</label>
                <?php echo $proyecto; ?>
                
                <br>
                
                <label for="nombre_actividad" class="labels" style="width: 150px;">Actividad:</label>
                <input id="nombre_actividad" name="nombre_actividad" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->nombre_actividad; ?>" />
                
                <label for="fecha_inicio" class="labels" style="width: 150px;">Fecha de inicio:</label>
                <input id="fecha_inicio" name="fecha_inicio" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->fecha_inicio; ?>" />
                
                <label for="fecha_fin" class="labels" style="width: 150px;">Fecha de fin:</label>
                <input id="fecha_fin" name="fecha_fin" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->fecha_fin; ?>" />
                
                    
                
        </div>
       </fieldset>
            <div style="margin:0 auto; width: 440px; height: 70px;">
            <fieldset class="ui-corner-all" >
            <legend>Accion</legend>
                <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="save" class="button">GRABAR</a>
                    <a href="index.php?controller=actividad" class="button">ATRAS</a>
                </div>
                </fieldset>
                </div>
        </div>
</form>
</div>