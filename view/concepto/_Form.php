<?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_concepto.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
<h6 class="ui-widget-header">Registro de Conceptos</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="concepto" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 600px; ">
            <fieldset class="ui-corner-all" >
                <legend>Datos</legend>            
                <label for="idconcepto" class="labels" style="width: 135px">Codigo:</label>
                <input id="idconcepto" name="idconcepto" class="text ui-widget-content ui-corner-all" style=" width: 100px; text-align: left;" value="<?php echo $obj->idconcepto; ?>" readonly />                
                <br>
                <label for="peso_promedial" class="labels" style="width: 100px" >Peso Promedial:</label>
                <input id="peso_promedial" maxlength="20" name="peso_promedial" class="text ui-widget-content ui-corner-all" style=" width: 60px; text-align: left;" value="<?php echo $obj->peso_promedial; ?>" />
                
                <br>
                
                <label for="nombre_concepto" class="labels" style="width: 295px" >Descripcion:</label>
                <input id="nombre_concepto" maxlength="100" name="nombre_concepto" class="text ui-widget-content ui-corner-all" style=" width: 258px; text-align: left;" value="<?php echo $obj->nombre_concepto; ?>" />
                
            <br>    
                
            </fieldset>
                <div class="contenido" style="margin:0 auto; width: 400px; ">
                <fieldset class="ui-corner-all" >
                <legend>Accion</legend>   
                <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="save" class="button">GRABAR</a>
                    <a href="index.php?controller=concepto" class="button">ATRAS</a>
                </div>
                </fieldset>
                </div>    
        </div>
    </div>
</form>
</div>