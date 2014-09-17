<?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_cuerpoproyecto.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
<h6 class="ui-widget-header">Registro De Cuerpos Proyectos</h6>

<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="cuerpoproyecto" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 700px; "align="center">
            <fieldset class="ui-corner-all" >
                <legend>Datos</legend>   
                <table border="0" cellpadding="3" cellspacing="1" style="background-color:#fff;">
                    <tr class="fil">
                        <td width="15%">
                            <label for="idcuerpo_proyecto" >Codigo:</label>
                        </td>  
                        <td>
                            <input id="idcuerpo_proyecto" name="idcuerpo_proyecto" class="text ui-widget-content ui-corner-all"  style=" width: 150px; text-align: left;" value="<?php echo $obj->idcuerpo_proyecto; ?>" readonly />                
                        </td>  
                        <td>
                            <label for="idindice"   >Indice:</label>
                        </td>
                        <td>
                            <input id="idindice" name="idindice" class="text ui-widget-content ui-corner-all"  style=" width: 150px; text-align: left;" value="<?php echo $obj->idindice; ?>"  >                
                        </td>
                    </tr>
                    <tr class="fil">
                        <td>
                        
                            <label for="descripcion"  >Cuerpo Proyecto:</label>
                        </td>
                        <td>
                             <input id="descripcion" name="descripcion" class="text ui-widget-content ui-corner-all"  style=" width: 150px; text-align: left;" value="<?php echo $obj->descripcion; ?>"  >                        
                        </td>
                        <td>
                        
                            <label for="idindice_padre"  style="width: 120px" >Padre Indice:</label>
                        </td>
                        <td>
                           <?php echo $indicepadre; ?>
                        </td>
                    </tr>
                   
                  
                 </table>
                
             </fieldset> 
             <fieldset class="ui-corner-all" >
               <legend>Accion</legend> 
                 <a href="#" id="save" class="button">GRABAR</a>
               <a href="index.php?controller=cuerpoproyecto" class="button">ATRAS</a>
                   
             </fieldset>
             </div>
    </div>
</form>
</div>