<?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_anexo.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
<h6 class="ui-widget-header">Registro de Anexos</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="anexo" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 450px; ">
               
            <fieldset class="ui-corner-all" >
                <legend>Datos</legend>
                <label for="idanexo" class="labels" style=" width: 50px; text-align: left;">Codigo:</label>
                <input id="idanexo" name="idanexo" class="text ui-widget-content ui-corner-all" style=" width: 50px; text-align: left;" value="<?php echo $obj->idanexo; ?>" readonly />
                 
              
                
                <label for="nombre_proyecto" class="labels" style="width: 100px;">Proyecto:</label>
                <?php echo $proyecto; ?>
                
                <br>
                
                <label for="nombre_anexo" class="labels" style="width:50px; text-align: left;">Anexo:</label>
                <input id="nombre_anexo" name="nombre_anexo" class="text ui-widget-content ui-corner-all" style=" width: 319px; text-align: left;" value="<?php echo $obj->nombre_anexo; ?>" />
               
            
                    
                
        </div>
       </fieldset>
            <div style="margin:0 auto; width: 450px; height: 70px;">
            <fieldset class="ui-corner-all" >
            <legend>Accion</legend>
                <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="save" class="button">GRABAR</a>
                    <a href="index.php?controller=anexo" class="button">ATRAS</a>
                </div>
                </fieldset>
                </div>
        </div>
</form>
</div>