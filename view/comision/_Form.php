<?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_comision.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
<h6 class="ui-widget-header">Registro de comisiones</h6>

<form id="frm" action="index.php" method="POST" accept-charset="UTF-8">
    <input type="hidden" name="controller" value="comision" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;" >
        <div class="contenido" style="margin:0 auto; width: 750px; " align="center">
           
            <fieldset class="ui-corner-all" >
                <legend>Datos</legend>
                 <table border="0" cellpadding="3" cellspacing="1" style="background-color:#fff;margin-left:8%" >
                 <tr class="fil">
                     <td>
                     <label for="idcomision">Codigo:</label>
                     </td>
                     <td>
                     <input id="idcomision" name="idcomision" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->idcomision; ?>"readonly />
                     </td>
                     <td width="20%" align="left">
                     <label for="decripcioncomision" >Nombre Comision:</label>
                     </td>
                    <td>
                    <input id="decripcioncomision" name="decripcioncomision" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->decripcioncomision; ?>" />
                    </td>
                </tr>
                <tr class="fil">
                    <td width="20%" align="left">
                    <label for="CodigoDptoAcad">Departamento Academico:</label>
                    </td>
                    <td width="30%">
                    <?php echo $departamentoacademico; ?>
                    </td>
                    <td width="20%" align="left">
                    <label for="resolucion">Resolucion:</label>
                    </td>  
                    <td width="30%" >
                   <input id="resolucion" name="resolucion" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->resolucion; ?>"  />
                    </td>
                    </tr>
                    
                    <tr class="fil">
                    <td width="20%" align="left">
                    <label for="fecha_inicio">Fecha de inicio:</label>
                    </td>
                    <td width="30%">
                    <input id="fecha_inicio" name="fecha_inicio" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->fecha_inicio; ?>" />                  
                    </td>
                    <td width="20%" align="left">
                    <label for="fecha_termino">Fecha de fin:</label>
                    </td>  
                    <td width="30%" >
                    <input id="fecha_termino" name="fecha_termino" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->fecha_termino; ?>" />   
                    </td>
                    </tr> 
                 
                </table>
       </fieldset>
      </div>

            <div style="margin:0 auto; width: 660px; height: 70px;">
            <fieldset class="ui-corner-all" >
            <legend>Accion</legend>
                <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="save" class="button">GRABAR</a>
                    <a href="index.php?controller=comision" class="button">ATRAS</a>
                </div>
                </fieldset>
                </div>
        </div>
    </form>
</div>