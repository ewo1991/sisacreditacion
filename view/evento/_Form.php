<?php include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_evento.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
    <h6 class="ui-widget-header">Registro de Evento</h6>
<<<<<<< HEAD
<!--
<<<<<<< HEAD
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="evento" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 450px; ">
            <fieldset class="ui-corner-all" >
                <legend>Datos</legend>   
                <table border="0" cellpadding="3" cellspacing="1" style="background-color:#fff;margin-left:2%" >
                    <tr class="fil">
                        <td>
                <label for="idevento" class="labels" style="width: 100px">Codigo:</label>
                        </td>
                        <td>
                <input id="idevento" name="idevento" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->idevento; ?>" readonly />                
                        </td>
                    </tr>
                    <tr class="fil">
                        <td>
                <label for="tema" class="labels" style="width: 190px" >Tema:</label>
                        </td>
                        <td>
                <input id="tema" maxlength="100" name="tema" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->tema; ?>" />
                        </td>
                 
                <br/>
                
                <label for="tipo_evento" class="labels" style="width: 140px" >Tipo Evento:</label>
                <?php echo $tipo_evento; ?>  
            </tr>
                <br/>
                <label for="CodigoSemestre" class="labels" style="width: 110px" >CodigoSemestre:</label>
                <input id="CodigoSemestre" name="CodigoSemestre" class="text ui-widget-content ui-corner-all" style=" width: 120px; text-align: left;" value="<?php echo $obj->CodigoSemestre; ?>" />
               
                <br>
                    
                 <label for="CodigoSemestre" class="labels" style="width: 100px" >Semestres:</label>
                // echo $semestreacademico; ?>  
                <br/>
                
                <label for="fecha" class="labels" style="width: 140px" >Fecha:</label>
                <input id="fecha" maxlength="100" name="fecha" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->fecha; ?>" />
                 
                <br/>
                
                </table>
            
             </fieldset> 
             <fieldset class="ui-corner-all" >
                <legend>Accion</legend>    
                <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="save" class="button">GRABAR</a>
                    <a href="index.php?controller=evento" class="button">ATRAS</a>
                </div>
             </fieldset> 
=======-->
=======

>>>>>>> bb33a6fe3ea143af587055879b590549025120a8
    <form id="frm" action="index.php" method="POST">
        <input type="hidden" name="controller" value="evento" />
        <input type="hidden" name="action" value="save" />
        <div class="contFrm ui-corner-all" style="background: #fff;">
            <div class="contenido" style="margin:0 auto; width: 700px; ">
                <fieldset class="ui-corner-all" >
                   <?php if(isset($_GET['modo_sin_cargo'])){?> <input type="hidden" id="crear_modo_sin_cargo" name="crear_modo_sin_cargo" value="<?php echo $_GET['modo_sin_cargo'];?>"><?php } ?>
                   <legend style="text-align: left;">Datos</legend>     
                    <table border="0" style="width:100%;text-align: left;font-size: 16px;">
                        <tr>
                            <td width="25%">
                                <strong> Codigo:</strong>
                            </td>
                            <td width="25%">

                                <input id="idevento" name="idevento" class="text ui-widget-content ui-corner-all" style=" width: 80%; text-align: left;" value="<?php echo $obj->idevento; ?>" readonly />                
                            </td>
                            <td width="25%">
                                <strong>Tema:</strong>
                            </td>
                            <td width="25%">
                                <input id="tema" maxlength="100" name="tema" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->tema; ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Tipo Evento:</strong>
                            </td>
                            <td><div style="width: 80%;">
                                <?php echo $tipo_evento; ?>  
                                 </div>
                            </td>
                            <td>
                                <strong>Fecha:</strong>
                            </td>
                            <td>
                                <input id="fecha" maxlength="100" name="fecha" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->fecha; ?>" />
                            </td>
                        </tr>
                    </table>

                </fieldset> 
                <fieldset class="ui-corner-all" >
                    <legend style="text-align: left;">Accion</legend>    
                    <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                        <a href="#" id="save" class="button">GRABAR</a>
                        <a href="index.php?controller=evento" class="button">ATRAS</a>
                    </div>
                </fieldset> 
            </div>
<<<<<<< HEAD
=======

>>>>>>> bb33a6fe3ea143af587055879b590549025120a8
        </div>
    </form>
</div>