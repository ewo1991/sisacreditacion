<?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_tema.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
<h6 class="ui-widget-header">Registro de Temas</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="tema" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 550px; ">
               
            <fieldset class="ui-corner-all" >
                <legend>Datos</legend>
                <label for="idtema" class="labels" style=" width: 70px; text-align: left;">Codigo:</label>
                <input id="idtema" name="idtema" class="text ui-widget-content ui-corner-all" style=" width: 50px; text-align: left;" value="<?php echo $obj->idtema; ?>" readonly />
                 
                             
                <label for="nombreunidad" class="labels" style="width: 180px;">Unidad:</label>
                <?php echo $unidad; ?>
                
                <br>
                
                <label for="semana" class="labels" style="width: 65px;">Semana:</label>
                <input id="semana" name="semana" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->semana; ?>" />
               
                <label for="contenido" class="labels" style="width: 85px;">Contenido:</label>
                <input id="contenido" name="contenido" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->contenido; ?>" />
            
                <label for="conceptual" class="labels" style="width: 65px;">Conceptual:</label>
                <input id="conceptual" name="conceptual" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->conceptual; ?>" />
                
                <label for="procedimental" class="labels" style="width: 85px;">Procedimental:</label>
                <input id="procedimental" name="procedimental" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->procedimental; ?>" />
                
                <label for="actitudinal" class="labels" style="width: 65px;">Actitudinal:</label>
                <input id="actitudinal" name="actitudinal" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->actitudinal; ?>" />
                
                <label for="competencia" class="labels" style="width: 85px;">Competencia:</label>
                <input id="competencia" name="competencia" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->competencia; ?>" />
                    
                
        </div>
       </fieldset>
            <div style="margin:0 auto; width: 450px; height: 70px;">
            <fieldset class="ui-corner-all" >
            <legend>Accion</legend>
            <?php if (isset($_SESSION["perfil"]) && ($_SESSION["perfil"] == 'PROFESOR')) { ?>
                <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="save" class="button">GRABAR</a>
            <?php }else{?>
                    <a href="#" id="save" class="button">GRABAR</a>
                    <a href="index.php?controller=tema" class="button">ATRAS</a>
                <?php }?>
                </div>
                </fieldset>
                </div>
        </div>
</form>
</div>