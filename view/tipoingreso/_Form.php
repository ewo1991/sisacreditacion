<?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_tipoingreso.js" ></script>
<!--cambiar en el archivoo evt_form_tipoingreso.js  -->
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
<h6 class="ui-widget-header">Registro de Tipo Ingreso</h6>

<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="tipoingreso" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 750px; " align="center">
            <fieldset class="ui-corner-all" >
                <legend>Datos</legend>     
                <table border="0" cellpadding="3" cellspacing="1" style="background-color:#fff;margin-left:8%" >
                   <tr class="fil">
                      <td width="20%" align="left">
                      <label for="CodigoTipoIngreso">Codigo:</label>
                      </td>
                      <td width="30%">
                      <input id="CodigoTipoIngreso" name="CodigoTipoIngreso" class="text ui-widget-content ui-corner-all" style=" width: 100px; text-align: left;" value="<?php echo $obj->CodigoTipoIngreso; ?>" readonly />                
                      </td>
                      <td width="16%" align="left">
                     <label for="CodigoModalidad">Modalidad Ingreso:</label>
                      </td>  
                      <td width="30%" >
                      <?php echo $modalidadingreso;?>
                       </td>
                    </tr> 
                      <tr class="fil">
                      <td width="20%" align="left">
                      <label for="DescripcionTipoIngreso">Tipo ingreso:</label>
                      </td>
                      <td width="30%" colspan="3">
                      <input id="DescripcionTipoIngreso" maxlength="100" name="DescripcionTipoIngreso" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->DescripcionTipoIngreso; ?>" />
                      </td>
                    </tr>  
                </table>
             </fieldset> 
             <fieldset class="ui-corner-all" >
               <legend>Accion</legend> 
                 <a href="#" id="save" class="button">GRABAR</a>
               <a href="index.php?controller=tipoingreso" class="button">ATRAS</a>
                    </div>
             </fieldset> 
        </div>
    </div>
</form>
</div>