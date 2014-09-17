<?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_areacurricular.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
<h6 class="ui-widget-header">Registro de area curricular</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="areacurricular" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 750px; " align="center">
            
            <fieldset class="ui-corner-all" >
                <legend>Datos</legend>   
                
                <table border="0" cellpadding="3" cellspacing="1" style="background-color:#fff;margin-left:8%" >
                <tr class="fil">
                      <td width="20%" align="left">
                      <label for="CodigoAreaCurricular">Codigo:</label>
                      </td>
                      <td width="30%">
                      <input id="CodigoAreaCurricular" name="CodigoAreaCurricular" class="text ui-widget-content ui-corner-all" style=" width: 100px; text-align: left;" value="<?php echo $obj->CodigoAreaCurricular; ?>" readonly />
                      </td>
                      <td width="20%" align="left">
                       <label for="DescripcionArea" >Descripcion:</label>
                      </td>  
                      <td width="30%" >
                      <input id="DescripcionArea" maxlength="100" name="DescripcionArea" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->DescripcionArea; ?>" />
                       </td>
                    </tr>
                    
                    <tr class="fil">
                      <td width="20%" align="left">
                       <label for="TotalCursos"  >Total de Cursos:</label>
                      </td>
                      <td width="30%">
                       <input id="TotalCursos" maxlength="20" name="TotalCursos" class="text ui-widget-content ui-corner-all" style=" width: 100px; text-align: left;" value="<?php echo $obj->TotalCursos; ?>" />
                       </td>
                      <td width="20%" align="left">
                      <label for="TotalCreditos" >Total de Creditos:</label>
                      </td>  
                      <td width="30%" >
                      <input id="TotalCreditos" maxlength="20" name="TotalCreditos" class="text ui-widget-content ui-corner-all" style=" width: 100px; text-align: left;" value="<?php echo $obj->TotalCreditos; ?>" />
                      </td>
                    </tr>
                
                </table>                            
             </fieldset> 
           
            <fieldset>
                
                <legend><br>Accion</legend>
                <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="save" class="button">GRABAR</a>
                    <a href="index.php?controller=areacurricular" class="button">ATRAS</a>
                </div>
            </fieldset>
            
        </div>
    </div>
</form>
</div>