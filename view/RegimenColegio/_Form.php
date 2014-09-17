<?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_regimencolegio.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
<h6 class="ui-widget-header">Registro de Regimen Colegio</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="regimencolegio" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
       <div class="contenido" style="margin:0 auto; width: 750px; " align="center">
            <fieldset class="ui-corner-all" >
                <legend>Datos</legend>            
                 <table border="0" cellpadding="3" cellspacing="1" style="background-color:#fff;margin-left:8%" >
                    <tr class="fil">
                      <td width="20%" align="left" >
                      <label for="CodigoRegimen"  >Codigo:</label>
                      </td>
                      <td width="30%" >
                      <input id="CodigoRegimen" name="CodigoRegimen" class="text ui-widget-content ui-corner-all" style=" width: 100px; text-align: left;" value="<?php echo $obj->CodigoRegimen; ?>" readonly />                
                      </td>
                      <td width="20%" align="left">
                      <label for="DescripcionRegimen" >Descripcion:</label>
                      </td>  
                      <td width="30%" >
                      <input id="DescripcionRegimen" maxlength="100" name="DescripcionRegimen" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->DescripcionRegimen; ?>" />
                      </td>
                    </tr>
                 </table>    
                
                </fieldset> 
            <fieldset style="height: 90px;">
                <legend><br>Accion</legend>
                <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="save" class="button">GRABAR</a>
                    <a href="index.php?controller=regimencolegio" class="button">ATRAS</a>
                </div>
            </fieldset>
        </div>
    </div>
</form>
</div>