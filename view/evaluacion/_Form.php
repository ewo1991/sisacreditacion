<?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_evaluacion.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
<h6 class="ui-widget-header">Registro De Evaluaciones</h6>

<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="evaluacion" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 700px; "align="center">
            <fieldset class="ui-corner-all" >
                <legend>Datos</legend>   
                <table border="0" cellpadding="3" cellspacing="1" style="background-color:#fff;">
                    <tr class="fil">
                        <td width="15%">
                            <label for="idevaluacion" >Codigo:</label>
                        </td>  
                        <td>
                            <input id="idevaluacion" name="idevaluacion" class="text ui-widget-content ui-corner-all"  style=" width: 150px; text-align: left;" value="<?php echo $obj->idevaluacion; ?>" readonly />                
                        </td>  
                        <td>
                            <label for="idunidad"   >Unidad:</label>
                        </td>
                        <td>
                            <?php echo $unidad; ?>
                        </td>
                    </tr>
                    <tr class="fil">
                        <td>
                        
                            <label for="idtipo_evaluacion"  >Tipo Evaluacion:</label>
                        </td>
                        <td>
                            <?php echo $tipo_evaluacion; ?>
                        </td>
                        <td>
                        
                            <label for="descripcionevaluacion"  style="width: 120px" >Evaluacion:</label>
                        </td>
                        <td>
                            <input id="descripcionevaluacion" name="descripcionevaluacion" class="text ui-widget-content ui-corner-all"  style=" width: 150px; text-align: left;" value="<?php echo $obj->descripcionevaluacion; ?>" />                
                        </td>
                    </tr>
                    <tr class="fil">
                        <td>
                            <label for="fecha"  style="width: 120px" >Fecha:</label>
                        </td>
                        <td>
                            <input id="fecha" maxlength="100" name="fecha" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->fecha; ?>" />
                        </td>
                        <td>
                            <label for="ponderado"  style="width: 120px" >Ponderado:</label>
                        </td>
                        <td>
                            <input id="ponderado" maxlength="100" name="ponderado" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->ponderado; ?>" />
                        </td>
                    </tr>
                    
                 </table>
                
             </fieldset> 
             <fieldset class="ui-corner-all" >
               <legend>Accion</legend> 
                 <a href="#" id="save" class="button">GRABAR</a>
               <a href="index.php?controller=evaluacion" class="button">ATRAS</a>
                    </div>
             </fieldset> 
        </div>
    </div>
</form>
</div>