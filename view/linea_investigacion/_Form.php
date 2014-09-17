    <?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_linea_investigacion.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
<h6 class="ui-widget-header">Registro de Linea de Investigacion</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="linea_investigacion" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 450px; ">
               
            <fieldset class="ui-corner-all" >
                    <legend>Datos</legend>
                     <label for="idlinea_investigacion" class="labels" style="width: 40px;">Codigo:</label>
                     <input id="idlinea_investigacion" name="idlinea_investigacion" class="text ui-widget-content ui-corner-all" style=" width: 50px; text-align: left;" value="<?php echo $obj->idlinea_investigacion; ?>" readonly />
                 <br/>
                     <label for="nombre_linea" class="labels"style="width: 190px;">Linea Investigacion:</label>
                     <input id="nombre_linea" maxlength="100" name="nombre_linea" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->nombre_linea; ?>" />
                     <br/>
                     <label for="nombre_ejetematico" class="labels" style="width: 135px;">Eje tematico:</label>
                     <?php echo $eje_tematico; ?>
                      <br/>
                        <br/>
                 </fieldset>
                
          </div>
       
            <div style="margin:0 auto; width: 450px; height: 70px;">
                    <fieldset class="ui-corner-all" >
                            <legend>Accion</legend>
                            <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                            <a href="#" id="save" class="button">GRABAR</a>
                            <a href="index.php?controller=linea_investigacion" class="button">ATRAS</a>
                            </div>
                        </fieldset>
                </div>
        </div>
</form>
</div>