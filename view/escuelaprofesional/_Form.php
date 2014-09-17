<?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_escuelaprofesional.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
<h6 class="ui-widget-header">Registro de Escuelas Profesionales</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="escuelaprofesional" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 750px; " align="center">
             <fieldset class="ui-corner-all" >
             <legend>Datos</legend>
             <table border="0" cellpadding="3" cellspacing="1" style="background-color:#fff;margin-left:8%" >
                <tr class="fil">
                      <td width="20%" align="left">
                      <label for="CodigoEscuela">Codigo:</label>
                      </td>
                      <td width="30%">
                     <input id="CodigoEscuela" name="CodigoEscuela" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->CodigoEscuela; ?>"readonly />
                      </td>
                      <td width="20%" align="left">
                      <label for="DescripcionEscuela">Escuela:</label>
                      </td>  
                      <td width="30%" >
                      <input id="DescripcionEscuela" name="DescripcionEscuela" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->DescripcionEscuela; ?>" />
                       </td>
                    </tr>
                    <tr class="fil">
                      <td width="20%" align="left">
                      <label for="CodEscuelaSira">Codigo Sira:</label>
                      </td>
                      <td width="30%">
         	     <input id="CodEscuelaSira" name="CodEscuelaSira" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->CodEscuelaSira; ?>"  />           
                      </td>
                      <td width="20%" align="left">
                      <label for="EstadoEscuela">Estado:</label>
                      </td>  
                      <td width="30%" >
                     <input id="EstadoEscuela" maxlength="100" name="EstadoEscuela" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->EstadoEscuela; ?>" />
                       </td>
                    </tr>
                    <tr class="fil">
                      <td width="20%" align="left">
                      <label for="CodigoTipoPeriodoAcademico">Periodo Academico:</label>
                      </td>
                      <td width="30%">
         	      <input id="CodigoTipoPeriodoAcademico" name="CodigoTipoPeriodoAcademico" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->CodigoTipoPeriodoAcademico; ?>" />
                      </td>
                      <td width="20%" align="left">
                      <label for="PeriodoReglamentario">Periodo Reglamentario:</label>
                      </td>  
                      <td width="30%" >
                      <input id="PeriodoReglamentario" maxlength="100" name="PeriodoReglamentario" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->PeriodoReglamentario; ?>" />
                       </td>
                    </tr>
                    <tr class="fil">
                      <td width="20%" align="left">
                      <label for="DescripcionFacultad">Facultad:</label>
                      </td>  
                      <td width="30%" >
                      <?php echo $facultades; ?>
                       </td>
                      <td width="20%" align="left">
                     <label for="Abreviatura">Abreviatura:</label>
                      </td>
                      <td width="30%">
   		      <input id="Abreviatura" name="Abreviatura" class="text ui-widget-content ui-corner-all" style=" width:150px; text-align: left;" value="<?php echo $obj->Abreviatura; ?>"  />
                      </td>
                    </tr>
             </table>
           
        </div>
       </fieldset>
            <div style="margin:0 auto; width: 660px; height: 70px;">
            <fieldset class="ui-corner-all" >
            <legend>Accion</legend>
                <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="save" class="button">GRABAR</a>
                    <a href="index.php?controller=escuelaprofesional" class="button">ATRAS</a>
                </div>
                </fieldset>
                </div>
        </div>
</form>
</div>