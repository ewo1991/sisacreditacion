<?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_sedes.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
<h6 class="ui-widget-header">Registro de Sedes</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="sedes" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 750px; " align="center">
            
            <fieldset class="ui-corner-all" >
                <legend>Datos</legend>            
                 <table border="0" cellpadding="1" cellspacing="1"  style="background-color:#fff;margin-left:8%" >
                    
                     <tr class="fil">
                      <td width="20%" align="left">
                      <label for="CodigoSede" >Codigo:</label>
                      </td>
                      <td width="30%" >
                       <input id="CodigoSede" name="CodigoSede" class="text ui-widget-content ui-corner-all" style=" width: 100px; text-align: left;" value="<?php echo $obj->CodigoSede; ?>"  readonly/>
                      </td>
                      <td width="20%" align="left" >
                       <label for="DescripcionSede"  >Descripcion:</label>
                      </td>  
                      <td width="80%" >
                      <input id="DescripcionSede" maxlength="100" name="DescripcionSede" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->DescripcionSede; ?>" />
                      </td>
                     </tr>
                    <tr class="fil">
                      <td width="20%" align="left">
                      <label for="EstadoSede" >Estado:</label>  
                      </td>
                      <td width="30%" colspan="3">
                      <input  id="EstadoSede" maxlength="100" name="EstadoSede" class="text ui-widget-content ui-corner-all" style=" width: 100px; text-align: left;" value="<?php echo $obj->EstadoSede; ?>" /> 
                      </td>
                  </tr>
                </table>
               </fieldset> 
            
            <fieldset>
                <legend>Accion</legend>
                <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="save" class="button">GRABAR</a>
                    <a href="index.php?controller=sedes" class="button">ATRAS</a>
                </div>
            </fieldset>
        </div>
    </div>
</form>
</div>