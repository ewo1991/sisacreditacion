<?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_facultad.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
<h6 class="ui-widget-header">Registro de facultad</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="facultad" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 750px; " align="center">
            <fieldset class="ui-corner-all" >
                <legend>Datos</legend>     
                <table border="0" cellpadding="3" cellspacing="1" style="background-color:#fff;margin-left:10%" >
                       <tr class="fil">
                      <td width="20%" align="left">
                       <label for="CodigoFacultad">Codigo:</label>
                      </td>
                      <td width="30%">
                      <input id="CodigoFacultad" name="CodigoFacultad" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->CodigoFacultad; ?>" readonly />            
                      </td>
                      <td width="20%" align="left">
                      <label for="DescripcionFacultad">Descripcion:</label>
                      </td>  
                      <td width="30%" >
                      <input id="DescripcionFacultad" maxlength="90" name="DescripcionFacultad" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->DescripcionFacultad; ?>" /><br>
                       </td>
                    </tr>
                    <tr class="fil">
                       <td>
                       <label for="EstadoFacultad">Estado Facultad:</label>
                       </td> 
                       <td>
                       <input id="EstadoFacultad" maxlength="20" name="EstadoFacultad" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->EstadoFacultad; ?>" />
                       </td>
                       <td align="left">
                       <label for="CodFacultadSira">CodfacultadSira:</label>
                        </td>
                       <td>
                       <input id="CodFacultadSira" maxlength="100" name="CodFacultadSira" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->CodFacultadSira; ?>" />
                       </td>
                     </tr> 
                     <tr class="fil">
                       <td> 
                       <label for="Abreviatura">Abreviatura: </label>
                       </td> 
                       <td>
                       <input id="Abreviatura" maxlength="100" name="Abreviatura" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->Abreviatura; ?>" /><br>
                       </td>
                       <td align="left">
                       <label for="DescripcionFacultadIngles">Descripcion Facultad Ingles:</label>
                        </td>
                       <td>
                       <input id="DescripcionFacultadIngles" maxlength="100" name="DescripcionFacultadIngles" class="text ui-widget-content ui-corner-all" style=" width: 150px;margin-top: 2px; text-align: left;" value="<?php echo $obj->DescripcionFacultadIngles; ?>" />
                       </td>
                     </tr>
                     <tr class="fil">
                       <td> 
                     <label for="Decano">Decano:</label>
                       </td> 
                       <td>
                      <input id="Decano" maxlength="100" name="Decano" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->Decano; ?>" />
                       </td>
                       <td align="left">
                     <label for="DecanoIngles">Decano Ingles:</label>
                        </td>
                       <td>
                    <input id="DecanoIngles" maxlength="100" name="DecanoIngles" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->DecanoIngles; ?>" />
                       </td>
                     </tr>
                     <tr class="fil">
                       <td> 
                    <label for="DirectorOCRA">Director OCRA:</label>
                       </td> 
                       <td>
                    <input id="DirectorOCRA" maxlength="100" name="DirectorOCRA" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->DirectorOCRA; ?>" />
                       </td>
                       <td align="left">
                    <label for="DirectorOCRAIngles">Director OCRA Ingles:</label>
                        </td>
                       <td>
                    <input id="DirectorOCRAIngles" maxlength="100" name="DirectorOCRAIngles" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->DirectorOCRAIngles; ?>" />
                       </td>
                     </tr>
                     <tr class="fil">
                       <td> 
                    <label for="SecretarioAcademico">Secretario Academico:</label>
                       </td> 
                       <td>
                    <input id="SecretarioAcademico" maxlength="90" name="SecretarioAcademico" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->SecretarioAcademico; ?>" /><br>
                       </td>
                       <td align="left">
                    <label for="SecretarioAcademicoIngles">Secretario Academico Ingles:</label>
                        </td>
                       <td>
                    <input id="SecretarioAcademicoIngles" maxlength="100" name="SecretarioAcademicoIngles" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->SecretarioAcademicoIngles; ?>" /><br>
                       </td>
                     </tr>
                </table>
                              
             </fieldset> 
             <fieldset class="ui-corner-all" >
                    <legend>Accion</legend> 
                    <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                            <a href="#" id="save" class="button">GRABAR</a>
                            <a href="index.php?controller=facultad" class="button">ATRAS</a>
                    </div>
             </fieldset>     
        </div>
    </div>
</form>
</div>