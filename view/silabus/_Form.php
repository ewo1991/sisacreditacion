<?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_silabus.js" ></script>
<!--cambiar en el archivoo evt_form_tipoingreso.js  -->
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
<h6 class="ui-widget-header">Registro De Silabus</h6>

<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="silabus" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 700px; "align="center">
            <fieldset class="ui-corner-all" >
                <legend>Datos</legend>   
                <table border="0" cellpadding="3" cellspacing="1" style="background-color:#fff;">
                    <br>
                    <tr class="fil">
                        <td width="10%">
                            <label for="idsilabus" >Codigo:</label>
                        </td>  
                        <td>
                            <input id="idsilabus" name="idsilabus" class="text ui-widget-content ui-corner-all"  style=" width: 150px; text-align: left;" value="<?php echo $obj->idsilabus; ?>" readonly />                
                        </td>  
                        <td>
                            <label for="competencia"   >Competencia:</label>
                        </td>
                        <td >
                            <input id="competencia" size="100px" maxlength="100" name="competencia" class="text ui-widget-content ui-corner-all" style=" width: 130px; text-align: left;" value="<?php echo $obj->competencia; ?>" />
                        </td>
                    </tr>
                    <tr class="fil">
                        <td>
                          <label for="metodologia"  >Metodologia:</label>
                        </td>
                        <td  colspan="3">
                            <textarea id="metodologia"  name="metodologia" class="text ui-widget-content ui-corner-all" style=" width: 600px; text-align: left;height:150px; " /><?php echo $obj->metodologia; ?></textarea>
                        </td>
                    </tr>
                    <tr class="fil">
                        <td>
                            <label for="sumilla" >Sumilla:</label>
                        </td>
                        <td  colspan="3">
                            <textarea id='sumilla'  name='sumilla' class="text ui-widget-content ui-corner-all" style=" width: 600px; text-align: left;height:150px;" ><?php echo trim($obj->sumilla); ?></textarea>
                        </td>
                    </tr>
                    <tr class="fil">
                        <td>
                            <label for="fecha_inicio"  style="width: 120px" >Fecha Inicio:</label>
                        </td>
                        <td>
                            
                            <input id="fecha_inicio" maxlength="100" name="fecha_inicio" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->fecha_inicio; ?>" />
                        </td>
                        <td>
                            <label for="fecha_termino"  style="width: 120px" >Fecha Termino:</label>
                        </td>
                        <td>
                            <input id="fecha_termino" maxlength="100" name="fecha_termino" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->fecha_termino; ?>" />
                        </td>
                    </tr>
                    <tr class="fil">
                        <td>
                            <label for="duracion"  style="width: 120px" >Duracion:</label>
                        </td>
                        <td>
                            <input id="duracion" maxlength="100" name="duracion" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->duracion; ?>" />
                        </td>
                        <td>
                            <label for="objetivo" style="width: 120px" >Objetivo:</label>
                        </td>
                        <td>
                            <input id="objetivo" maxlength="100" name="objetivo" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->objetivo; ?>" />
                        </td>    
                    </tr>
                    
                    <tr>
                        
                        <td colspan="1"> <label for="idcargaacademica" style="width: 120px" >Carga Academica:</label></td>
                        <td colspan="3"><?php echo $cargaacademica;?></td>
                    </tr>
                  
                 </table>
                
             </fieldset> 
             <fieldset class="ui-corner-all" >
               <legend>Accion</legend>
                    <?php if (isset($_SESSION["perfil"]) && ($_SESSION["perfil"] == 'PROFESOR')) { ?>
               <?php  $semest=$_GET["semestre"]?>
              
                 <a href="#" id="save" class="button">GRABAR</a>
               
                    <?php }else{?>
               <a href="#" id="save" class="button">GRABAR</a>
               <a href="index.php?controller=silabus" class="button">ATRAS</a>
                        
                        <?php }?>
                    </div>
             </fieldset> 
        </div>
    </div>
</form>
</div>