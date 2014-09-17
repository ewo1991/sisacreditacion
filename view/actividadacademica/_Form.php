<?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_actividadacademica.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
<h6 class="ui-widget-header">Registro de Actividad Academica</h6>
<form id="frm" action="index.php" method="POST"> 
    <input type="hidden" name="controller" value="actividadacademica" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
         <div class="contenido" style="margin:0 auto; width: 750px; " align="center">
            <fieldset class="ui-corner-all" >
                <legend>Datos</legend>     
                <table border="0" cellpadding="3" cellspacing="1" style="background-color:#fff;margin-left:10%" >
                <tr class="fil">
                      <td width="20%" align="left">
                      <label for="CodigoActividad">Codigo:</label>
                      </td>
                      <td width="30%">
                      <input id="CodigoActividad" name="CodigoActividad" class="text ui-widget-content ui-corner-all" style=" width: 100px; text-align: left;" value="<?php echo $obj->CodigoActividad; ?>" readonly />                
                      </td>
                      <td width="20%" align="left">
                      <label for="DescripcionActividad">Descripcion:</label>
                      </td>  
                      <td width="30%" >
                      <input id="DescripcionActividad" maxlength="100" name="DescripcionActividad" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->DescripcionActividad; ?>" />
                       </td>
                    </tr>
                    <tr class="fil">
                        <td width="20%" align="left">
                     <label for="Orden">Orden:</label>
                      </td>
                    <td width="30%" colspan="3">
                     <input id="Orden" maxlength="100" name="Orden" class="text ui-widget-content ui-corner-all" style=" width: 100px; text-align: left;" value="<?php echo $obj->Orden; ?>" />
                      </td>
                     </tr>
                    
                </table>
             </fieldset> 
            <fieldset>
                <legend>Acciones</legend>
                <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="save" class="button">GRABAR</a>
                    <a href="index.php?controller=actividadacademica" class="button">ATRAS</a>
                </div>
                </fieldset>
        </div>
    </div>
</form>
</div>