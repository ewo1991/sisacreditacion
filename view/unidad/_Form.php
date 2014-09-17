
    <?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_unidad.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
<h6 class="ui-widget-header">Registro de Unidad</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="unidad" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 800px; ">
               
            <fieldset class="ui-corner-all" >
                    <legend>Datos</legend>
                     <table border="0" cellpadding="3" cellspacing="1" style="background-color:#fff;">
                        <tr class="fil" align="left">
                            <td>
                                 <label for="idunidad" class="labels" >Codigo:</label>
                            </td>
                            <td align="left">
                                 <input id="idunidad" name="idunidad" class="text ui-widget-content ui-corner-all" style=" width: 30px; text-align: left;" value="<?php echo $obj->idunidad; ?>" readonly />
                            </td>
                            <td>
                                 <label for="sumilla" class="labels" style="width: 105px;">Silabo:</label>
                            </td>   
                            <td>
                                  <?php echo $silabus; ?>
                            </td>
                        </tr>
                        <tr class="fil" >
                            <td align="right">
                                <label for="nombreunidad" class="labels"style="width: 75px;">Nombre:</label>
                            </td>
                            <td>
                                <textarea id="nombreunidad" maxlength="150" name="nombreunidad" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" ><?php echo $obj->nombreunidad; ?></textarea>
                            </td>
                            <td align="right">
                                 <label for="descripcionunidad" class="labels">Descripcion:</label>
                            </td>
                            <td>
                                 <textarea id="descripcionunidad" maxlength="300" name="descripcionunidad" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" ><?php echo $obj->descripcionunidad; ?></textarea>
                            </td>     
                                
                        </tr>
                        <tr class="fil">
                            <td align="right">
                                <label for="duracion" class="labels">Duracion:</label>
                            </td>
                            <td>
                                <input id="duracion" maxlength="100" name="duracion" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->duracion; ?>" />
                            </td>
                            <td align="right">
                                 <label for="competencia" class="labels">Competencia:</label>
                            </td>
                            <td>
                                 <input id="competencia" maxlength="255" name="competencia" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->competencia; ?>" />
                            </td>

                    </table>
             </fieldset>
        </div>
       
        <div style="margin:0 auto; width: 800px; height: 70px;">
                <fieldset class="ui-corner-all" >
                    <legend>Accion</legend>
                    <div  style="clear: both; padding: 4px; width: auto;text-align: center">
                        <?php if (isset($_SESSION["perfil"]) && ($_SESSION["perfil"] == 'PROFESOR')) { ?>
                       <a href="#" id="save" class="button">GRABAR</a>
                                 <?php }else{?>
                        
                        <a href="#" id="save" class="button">GRABAR</a>
                        <a href="index.php?controller=unidad" class="button">ATRAS</a>
                                 <?php }?>
                        
                    </div>
                </fieldset>
        </div>
    </div>
</form>
</div>