<?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_objproyec.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
<h6 class="ui-widget-header">Registro de Objetivos</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="objetivo_proyecto" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width:500px;">
               
        <fieldset class="ui-corner-all" >
                    <legend>Datos</legend>
                    <label for="idobjetivo_proyecto" class="labels" style="width: 80px;">Codigo:</label>
                <input id="idobjetivo_proyecto" name="idobjetivo_proyecto" class="text ui-widget-content ui-corner-all" style=" width: 80px; text-align: left;" value="<?php echo $obj->idobjetivo_proyecto; ?>" readonly />
                
                 <label for="nombre_proyecto" class="labels" style="width: 80px;">Proyecto:</label>
                <?php echo $proyecto; ?>
                <br/>
                <br/>
                
                <label for="objetivos_especificos" class="labels" style="width: 105px;">Descripcion:</label>
                <input id="objetivos_especificos" name="objetivos_especificos" class="text ui-widget-content ui-corner-all" style=" width: 300px; text-align: left;" value="<?php echo $obj->objetivos_especificos; ?>" />
              
        
       </fieldset>
            </div>
            <div style="margin:0 auto; width:500px; height: 70px;">
            <fieldset class="ui-corner-all" >
            <legend>Accion</legend>
                <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="save" class="button">GRABAR</a>
                    <a href="index.php?controller=objetivo_proyecto" class="button">ATRAS</a>
                </div>
                </fieldset>
                </div>
        </div>
</form>
</div>