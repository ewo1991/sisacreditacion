<?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_departamentoacademico.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
<h6 class="ui-widget-header">Registro de departamento academico</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="departamentoacademico" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 750px; " align="center">
            <fieldset class="ui-corner-all" >
                <legend>Datos</legend>   
                <table border="0" cellpadding="3" cellspacing="1" style="background-color:#fff;margin-left:8%" >
                 <tr class="fil">
                     <td>
                      <label for="CodigoDptoAcad">Codigo:</label>
                     </td>
                     <td>
                     <input id="CodigoDptoAcad" name="CodigoDptoAcad" class="text ui-widget-content ui-corner-all" style=" width:80px; text-align: left;" value="<?php echo $obj->CodigoDptoAcad; ?>" readonly />                
                     </td>
                     <td width="20%" align="left">
                     <label for="DescripcionDepartamento">Descripcion:</label>
                     </td>
                    <td>
                    <input id="DescripcionDepartamento" maxlength="100" name="DescripcionDepartamento" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->DescripcionDepartamento; ?>" />
                    </td>
                </tr>
                  <tr class="fil">
                     <td>
                     <label for="Abreviatura">Abreviatura:</label>
                     </td>
                     <td>
                     <input id="Abreviatura" maxlength="20" name="Abreviatura" class="text ui-widget-content ui-corner-all" style=" width:150px; text-align: left;" value="<?php echo $obj->Abreviatura; ?>" />
                     </td>
                     <td width="20%" align="left">
                     <label for="EstadoDpto">Estado de departamento:</label>
                     </td>
                    <td>
                    <input id="EstadoDpto" maxlength="20" name="EstadoDpto" class="text ui-widget-content ui-corner-all" style=" width:150px; text-align: left;" value="<?php echo $obj->EstadoDpto; ?>" />
                    </td>
                </tr>
               
                </table>
             </fieldset> 
            <fieldset>
                <legend>Accion</legend>
           
                    <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="save" class="button">GRABAR</a>
                    <a href="index.php?controller=departamentoacademico" class="button">ATRAS</a>
                    </div>
                
            </fieldset>
            
        </div>
    </div>
</form>
</div>