    <?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_especialidadprofesional.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
<h6 class="ui-widget-header">Registro de Especialidades Profesionales</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="especialidadprofesional" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 750px; " align="center">
               
            <fieldset class="ui-corner-all" >
                <legend>Datos</legend>
                <table border="0" cellpadding="3" cellspacing="1" style="background-color:#fff;margin-left:8%" >
                 <tr class="fil">
                     <td>
                     <label for="CodigoEspecialidad">Codigo Especialidad:</label>
                     </td>
                     <td>
                     <input id="CodigoEspecialidad" name="CodigoEspecialidad" class="text ui-widget-content ui-corner-all" style=" width: 100px; text-align: left;" value="<?php echo $obj->CodigoEspecialidad; ?>"/>
                     </td>
                     <td width="20%" align="left">
                     <label for="Descripcion">Descripcion:</label>
                     </td>
                    <td>
                    <input id="Descripcion" name="Descripcion" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->Descripcion; ?>"/>
                    </td>
                </tr>
                   <tr class="fil">
                     <td>
                     <label for="DescripcionEscuela">Escuela:</label>
                     </td>
                     <td>
                        <?php if($readonly==""){ ?>
                                             <select id="CodigoEscuela" name="CodigoEscuela" class="ui-corner-all text ui-widget-content">
                                                  <option value="">...</option>
                                                     </select>
                                                         <?php } 
                                                            else {
                                                                echo $escuelaprofesional;
                                                               }
                                                                ?>
                                     </td>
                     <td width="20%" align="left">
                     <label for="DescripcionFacultad">Facultad:</label>
                     </td>
                    <td>
                     <?php echo $facultades; ?>
                    </td>
                </tr>
                   <tr class="fil">
                     <td>
                     <label for="Estado">Estado:</label>
                     </td>
                     <td>
                     <input id="Estado" name="Estado" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->Estado; ?>"  />
                     </td>
                     <td width="20%" align="left">
                     <label for="DescripcionIngles">Descripcion Ingles:</label>
                     </td>
                    <td>
                    <input id="DescripcionIngles" name="DescripcionIngles" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->DescripcionIngles; ?>"  />
                    </td>
                </tr>
                </table>
               
            </div>
       </fieldset>
            <div class="contenido" style="margin:0 auto; width: 400px; ">
            <fieldset>
                
            <legend>Accion</legend>
                <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="save" class="button">GRABAR</a>
                    <a href="index.php?controller=especialidadprofesional" class="button">ATRAS</a>
                </div>
                </fieldset>
                </div>
        </div>
</form>
</div>