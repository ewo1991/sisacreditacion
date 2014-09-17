<?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_profesores.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
<h6 class="ui-widget-header">Registro de Profesores</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="profesores" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 750px; " align="center">
               
            <fieldset class="ui-corner-all" >
                    <legend>Datos</legend>
                <table border="0" cellpadding="3" cellspacing="1" style="background-color:#fff;margin-left:8%" >
                <tr class="fil">
                      <td width="20%" align="left">
                      <label for="CodigoProfesor">Codigo:</label>
                      </td>
                      <td width="30%">
                      <input id="CodigoProfesor" name="CodigoProfesor" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->CodigoProfesor; ?>" readonly />
                      </td>
                      <td width="20%" align="left">
                      <label for="CodigoProfesorJefe">Codigo ProfesorJefe:</label>
                      </td>  
                      <td width="30%" >
                      <?php echo $profesoress; ?>
                       </td>
                    </tr>
                   <tr class="fil">
                    <td width="20%" align="left">
                    <label for="ApellidoPaterno">Apellido Paterno:</label>
                      </td>
                    <td width="30%">
                    <input id="ApellidoPaterno" maxlength="100" name="ApellidoPaterno" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->ApellidoPaterno; ?>" />
                    </td>
                    <td width="20%" align="left">
                    <label for="ApellidoMaterno">Apellido Materno:</label>
                    </td>  
                    <td width="30%" >
                   <input id="ApellidoMaterno" maxlength="100" name="ApellidoMaterno" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->ApellidoMaterno; ?>" />
                    </td>
                    </tr>
                    <tr class="fil">
                    <td width="20%" align="left">
                    <label for="NombreProfesor">Nombre Profesor:</label>
                      </td>
                    <td width="30%">
                    <input id="NombreProfesor" maxlength="100" name="NombreProfesor" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->NombreProfesor; ?>" />
                    </td>
                    <td width="20%" align="left">
                    <label for="FechaNacimiento">Fecha Nacimiento:</label>
                    </td>  
                    <td width="30%" >
                   <input id="FechaNacimiento" name="FechaNacimiento" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo ffecha($obj->FechaNacimiento); ?>"  />
                    </td>
                    </tr>
                    <tr class="fil">
                    <td width="20%" align="left">
                    <label for="Direccion">Direccion:</label>
                    </td>
                    <td width="30%">
                    <input id="Direccion" maxlength="100" name="Direccion" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->Direccion; ?>" />
                    </td>
                    <td width="20%" align="left">
                    <label for="Email">Email:</label>
                    </td>  
                    <td width="30%" >
                    <input id="Email" maxlength="100" name="Email" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->Email; ?>" />
                    </td>
                    </tr>
                    <tr class="fil">
                    <td width="20%" align="left">
                    <label for="NumDocumento">N° Documento:</label>
                    </td>
                    <td width="30%">
       		    <input id="NumDocumento" name="NumDocumento" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->NumDocumento; ?>"  />
                    </td>
                    <td width="20%" align="left">
                    <label for="TipoDocumento">Tipo Documento:</label>
                    </td>  
                    <td width="30%" >
                        <select name="TipoDocumento" id="TipoDocumento" style="width:150px">
                                        <option value="0">-------</option>
                                         <option value="L.E./D.N.I."<?php if($obj->TipoDocumento=="L.E./D.N.I."){echo "selected";} ?> >DNI</option>
                                         <option value="pasaporte"<?php if($obj->TipoDocumento=="pasaporte"){echo "selected";} ?> >PASAPORTE</option>
                                         <option value="carnetextranjeria" <?php if($obj->TipoDocumento=="carnetextranjeria"){echo "selected";} ?>>Carnet Extranjeria</option>
                                         </select>                    </td>
                    </tr>
                    <tr class="fil">
                    <td width="20%" align="left">
                        <label for="$iddepartamento">Departamento:</label>
                    </td>
                    <td width="30%">
                    <?php echo $departamento;?>
                    </td>
                    <td width="20%" align="left">
                        <label for="provincia" style="width:150px">Provincia:</label>
                    </td>  
                    <td width="30%" >
                    <?php if($readonly==""){ ?>
                                                <select id="provincia" name="provincia" class="ui-corner-all text ui-widget-content" style="width: 161px;">
                                                  <option value="">...</option>
                                           echo $provincia;
                                                }
                                                ?>
                                    </select>
                                                <?php } 
                                                else {
                                                    echo $provincia;
                                                }
                                                ?>              
                    </td>
                    </tr>
                    <tr class="fil">
                    <td width="20%" align="left">
                    <label for="distrito">Distrito:</label>
                    </td>
                    <td width="30%">
                    <?php if($readonly==""){ ?>
                                                <select id="distrito" name="distrito" class="ui-corner-all text ui-widget-content" style="width: 161px;">
                                                  <option value="">...</option>
                                                </select>
                                                <?php } 
                                                else {
                                                    echo $distrito;
                                                }
                                                ?>
                    </td>
                    <td width="20%" align="left">
                    <label for="Sexo">Sexo:</label>
                    </td>  
                    <td width="30%" >
                        <select name="Sexo" id="sexo" style="width:150px">
                                <option value="">...</option>
                                <option value="M" <?php if($obj->Sexo=="M"){echo "selected";} ?> >MASCULINO</option>
                                <option value="F" <?php if($obj->Sexo=="N"){echo "selected";} ?> >FEMENINO</option>
                            </select>                    </td>
                    </tr>
                    <tr class="fil">
                    <td width="20%" align="left">
                    <label for="EstadoCivil">Estado Civil:</label>
                    </td>
                    <td width="30%">
                        <select id="EstadoCivil" name="EstadoCivil" style="width:150px">
                                    <option value="0">-----</option>
                                    <option value="S" <?php if($obj->EstadoCivil=="S"){echo "selected";} ?>>Soltero</option>
                                    <option value="C" <?php if($obj->EstadoCivil=="C"){echo "selected";} ?>>Casado</option>
                                    <option value="D" <?php if($obj->EstadoCivil=="D"){echo "selected";} ?>>Diborciado</option>
                                    <option value="V" <?php if($obj->EstadoCivil=="V"){echo "selected";} ?>>Viudo</option>
                                </select>
                    </td>
                    <td width="20%" align="left">
                    <label for="RegimenPensionario">Regimen Pensionario:</label>
                    </td>  
                    <td width="30%" >
                    <input id="RegimenPensionario" name="RegimenPensionario" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->RegimenPensionario; ?>"  />
          
                    </td>
                    </tr>
                    <tr class="fil">
                    <td width="20%" align="left">
                    <label for="FechaIngreso">Fecha Ingreso:</label>
                    </td>
                    <td width="30%">
        	    <input id="FechaIngreso" name="FechaIngreso" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo ffecha($obj->FechaIngreso); ?>"  />
                    </td>
                    <td width="20%" align="left">
                    <label for="Telefono">Telefono:</label>
                    </td>  
                    <td width="30%" >
             	    <input id="Telefono" name="Telefono" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->Telefono; ?>" onkeypress="return permite(event,'num')"  />
                    </td>
                    </tr>
                    <tr class="fil">
                    <td width="20%" align="left">
                    <label for="NumeroCarnetEssalud">N° Carnet Essalud:</label>
                    </td>
                    <td width="30%">
   		    <input id="NumeroCarnetEssalud" name="NumeroCarnetEssalud" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->NumeroCarnetEssalud; ?>"  />
                    </td>
                    <td width="20%" align="left">
                    <label for="CodigoDecretoLey">Codigo DecretoLey:</label>
                    </td>  
                    <td width="30%" >
        	    <input id="CodigoDecretoLey" name="CodigoDecretoLey" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->CodigoDecretoLey; ?>"  />
                    </td>
                    </tr>
                    <tr class="fil">
                    <td width="20%" align="left">
                    <label for="CodProfesorSira">Codigo Sira:</label>
                    </td>
                    <td width="30%">
      		    <input id="CodProfesorSira" name="CodProfesorSira" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->CodProfesorSira; ?>"  />
                    </td>
                    <td width="20%" align="left">
                    <label for="EstadoProfesor">Estado:</label>
                    </td>  
                    <td width="30%" >
     		    <input id="EstadoProfesor" name="EstadoProfesor" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->EstadoProfesor; ?>" />
                    </td>
                    </tr>
                    <tr class="fil">
                    <td width="20%" align="left">
                    <label for="DescripcionCondicion">Condicion:</label>
                    </td>
                    <td width="30%">
                    <?php echo $condicion; ?>
                    </td>
                    <td width="20%" align="left">
                    <label for="DescripcionCategoria">Categoria:</label>
                    </td>  
                    <td width="30%" >
                    <?php echo $categoria; ?>
                    </td>
                    </tr>
                    <tr class="fil">
                    <td width="20%" align="left">
                    <label for="DescripcionDedicacion">Dedicacion:</label>
                    </td>
                    <td width="30%">
                    <?php echo $dedicacion; ?>
                    </td>
                    <td width="20%" align="left">
                    <label for="DescripcionDptoAcad">Dpto Academico:</label>
                    </td>  
                    <td width="30%" >
                    <?php echo $departamentoacademico; ?> 
                    </td>
                    </tr>
                    <tr class="fil">
                    <td width="20%" align="left">
                    <label for="Marcador">Marcador:</label>
                    </td>
                    <td width="30%" colspan="3">
        	    <input id="Marcador" name="Marcador" class="text ui-widget-content ui-corner-all" style=" width:150px; text-align: left;" value="<?php echo $obj->Marcador; ?>"  />
                    </td>
                    </tr>
                </table>

       </fieldset>
            <div style="margin:0 auto; width: 660px; height: 70px;">
            <fieldset class="ui-corner-all" >
            <legend>Accion</legend>
                <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                     <a href="#" id="save" class="button">GRABAR</a>
                    <a href="index.php?controller=profesores" class="button">ATRAS</a>
                </div>
            </fieldset>
            </div>
        </div>
</form>
</div>



