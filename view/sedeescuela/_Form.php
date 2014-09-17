    <?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_sedeescuela.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
<h6 class="ui-widget-header">Registro de Sede de Escuelas Profesionales</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="sedeescuela" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 560px; ">
               
            <fieldset class="ui-corner-all" >
                    <legend>Datos</legend>
                    <label for="CodigoSedeEscuela" class="labels" style="width: 100px;">Codigo Sede:</label>
                <input id="CodigoSedeEscuela" name="CodigoSedeEscuela" class="text ui-widget-content ui-corner-all" style=" width: 50px; text-align: left;" value="<?php echo $obj->CodigoSedeEscuela; ?>" readonly />
                 
                <label for="DescripcionFacultad" class="labels" style="width: 150px;">Facultad:</label>
                <?php echo $facultades; ?>
                <br>
                <label for="EstadoEscuela" class="labels"style="width: 100px;">Codigo Siga</label>
                <input id="CodigoSiga" maxlength="100" name="CodigoSiga" class="text ui-widget-content ui-corner-all" style=" width: 50px; text-align: left;" value="<?php echo $obj->CodigoSiga; ?>" />
                
                <label for="DescripcionEscuela" class="labels" style="width: 150px;">Escuela:</label>
                
                 <?php if($readonly==""){ ?>
                     <select id="CodigoEscuela" name="CodigoEscuela" class="ui-corner-all text ui-widget-content">
                          <option value="">...</option>
                             </select>
                                 <?php } 
                                    else {
                                        echo $escuelaprofesional;
                                       }
                                        ?>
                
                
                
                <br>
                <label for="CodigoSira" class="labels" style="width: 100px;">Codigo Sira:</label>
   		<input id="CodigoSira" name="CodSira" class="text ui-widget-content ui-corner-all" style=" width: 100px; text-align: left;" value="<?php echo $obj->CodigoSira; ?>"  />
                            
                <label for="DescripcionSede" class="labels" style="width: 100px;">Sede:</label>
                <?php echo $sedes; ?>
                 <br/>
            </div>
       </fieldset>
            <div class="contenido" style="margin:0 auto; width: 660px; ">
            <fieldset>
                
            <legend>Accion</legend>
                <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="save" class="button">GRABAR</a>
                    <a href="index.php?controller=sedeescuela" class="button">ATRAS</a>
                </div>
                </fieldset>
                </div>
        </div>
</form>
</div>