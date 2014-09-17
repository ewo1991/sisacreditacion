<?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_modulo.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
<h6 class="ui-widget-header">Registro de Modulo</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="Modulo" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 660px; ">
                
                <label for="idmodulo" class="labels">Codigo:</label>
                <input id="idmodulo" name="idmodulo" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->idmodulo; ?>" readonly />
                <label for="idpadre" class="labels">Padre:</label>
                <?php echo $ModulosPadres; ?>
                <br/>
                <label for="descripcion" class="labels">Descripcion:</label>
                <input id="descripcion" maxlength="100" name="descripcion" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->descripcion; ?>" />
                <label for="url" class="labels">URL:</label>
   		<input id="url" name="url" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->url; ?>"  />
                 <br/>
                <label for="orden" class="labels">Orden:</label>
   		<input id="orden" name="orden" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->orden; ?>" />
                <label for="icono" class="labels">Icono:</label>
                <input id="icono" maxlength="100" name="icono" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->icono; ?>" />
                 
               
                <label for="estado" class="labels">Activo:</label>
                <?php                   
                    if($obj->estado==true || $obj->estado==false)
                            {
                             if($obj->estado==true){$rep=1;}
                                else {$rep=0;}
                            }
                     else {$rep = 1;}                    
                     activo('activo',$rep);
                ?>
                    
                <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="save" class="button">GRABAR</a>
                    <a href="index.php?controller=Modulo" class="button">ATRAS</a>
                </div>
        </div>
    </div>
</form>
</div>