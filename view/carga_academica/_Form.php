<?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_carga_academica.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
<h6 class="ui-widget-header">Registro De carga academica</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="viaje" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 800px; ">
            <fieldset class="ui-corner-all" >
                <legend>Datos</legend>            
                <label for="idviaje" class="labels">Codigo:</label>
                <input id="idviaje" name="idviaje" class="text ui-widget-content ui-corner-all" style=" width: 100px; text-align: left;" value="<?php echo $obj->idviaje; ?>" readonly />
                <label for="idviaje" class="labels">Fecha:</label>
                <input id="fecha" name="fecha" class="text ui-widget-content ui-corner-all" style=" width: 100px; text-align: left;" value="<?php if($obj->fecha!=""){ echo ffecha($obj->fecha);} else {echo date('d/m/Y');} ?>" readonly=""  />                
                <label for="cronograma" class="labels" >Cronog:</label>                
                <input id="idcronograma" name="idcronograma" class="text ui-widget-content ui-corner-all" style=" width: 77px; text-align: left;" value="<?php echo $obj->idcronograma; ?>" readonly />                
                <a title="Buscar Cronograma" href="javascript:popup('index.php?controller=cronograma&action=search',860,400);"><img src="images/lupa.gif"/></a>
                <label for="origen" class="labels" >Origen:</label>
                <input id="origen" name="origen" class="text ui-widget-content ui-corner-all" style=" width: 100px; text-align: left;" value="<?php echo $obj->origen; ?>" readonly="" />                
                <br/>
                
                <label for="destino" class="labels" >Destino:</label>
                <input id="destino" name="destino" class="text ui-widget-content ui-corner-all" style=" width: 100px; text-align: left;" value="<?php echo $obj->destino; ?>" readonly=""  />
                <label for="horasalida" class="labels" >Hora Salida:</label>
                <input id="horasalida" name="horasalida" class="text ui-widget-content ui-corner-all" style=" width: 100px; text-align: left;" value="<?php echo $obj->horasalida; ?>" readonly=""  />
                <label for="horallegada" class="labels" >Hora LLegada:</label>
                <input id="horallegada" name="horallegada" class="text ui-widget-content ui-corner-all" style=" width: 77px; text-align: left;" value="<?php echo $obj->horallegada; ?>" readonly=""  />
                <br/>
                <label for="vehiculo" class="labels">Vehiculo:</label>
                <input id="idvehiculo" name="idvehiculo" type="hidden" value="<?php echo $obj->idvehiculo; ?>" />
                <input id="vehiculo" name="vehiculo" class="text ui-widget-content ui-corner-all" style=" width: 442px; text-align: left;" value="<?php echo $obj->vehiculo; ?>" readonly />                
                <a title="Buscar Vehiculo" href="#" id="busca_vehiculo"><img src="images/lupa.gif"/></a>
                <br/>
             </fieldset>
              <fieldset class="ui-corner-all" >
                <legend>Asignación de Pilotos</legend>
                <label for="idpiloto" class="labels" >Cargo:</label>
                <?php echo $cargo; ?>
                <label for="chofer" class="labels" >Chofer:</label>
                <input id="idchofer" name="idchofer" type="hidden" value="<?php echo $obj->chofer; ?>" />
                <input id="chofer" name="chofer" class="text ui-widget-content ui-corner-all" style=" width: 400px; text-align: left;" value="<?php echo $obj->chofer; ?>" readonly="" />
                <a title="Buscar Chofer" href="javascript:popup('index.php?controller=chofer&action=search',860,400);"><img src="images/lupa.gif"/></a>
                <a title="Asginar responsabilidad" href="javascript:" id="btnadd"><img src="images/add.png"/></a>
                <br/>
                <div class="contain">
                <table id="detalle" class="ui-widget ui-widget-content" style="width: 785px; margin: 0 auto; " >
                    <thead class="ui-widget ui-widget-content">
                        <tr class="ui-widget-header" style="height: 20px">                            
                            <th width="200px" >CARGO</th>
                            <th>CHOFER</th>            
                            <th width="20px">&nbsp;</th>
                         </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach($cargos as $r)
                            {
                                ?>
                                <tr>                            
                                    <td width="200px" >
                                        <input type="hidden" name="id_cargo[]" value="<?php echo $r[0]; ?>" />
                                        <?php echo strtoupper($r[1]); ?>
                                    </td>
                                    <td>
                                        <input type="hidden" name="id_chofer[]" value="<?php echo $r[2]; ?>" />
                                        <?php echo strtoupper($r[3]); ?>
                                    </td>            
                                    <td width="20px"><a class="delete" title="Eliminar item" href="javascript:"><img src="images/delete.png"/></a></td>
                                 </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
                </div>
              </fieldset>
                <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="save" class="button">GRABAR</a>
                    <a href="index.php?controller=carga_academica" class="button">ATRAS</a>
                </div>
             
        </div>
    </div>
</form>
</div>