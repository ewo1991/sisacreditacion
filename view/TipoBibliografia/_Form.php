<?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_tipobibliografia.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
<h6 class="ui-widget-header">Registro de Tipo de Bibliografia</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="tipobibliografia" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 450px; ">
            <fieldset class="ui-corner-all" >
                <legend>Datos</legend>            
               
                <label for="idtipo_bibliografia" class="labels"style="width: 40px" >Codigo:</label>
                <input id="idtipo_bibliografia" name="idtipo_bibliografia" class="text ui-widget-content ui-corner-all" style=" width: 90px; text-align: left;" value="<?php echo $obj->idtipo_bibliografia; ?>" readonly />                
                <br>
                <label for="descripcion_tipobibliografia" class="labels" style="width: 170px" >Descripcion:</label>
                <input id="descripcion_tipobibliografia" maxlength="100" name="descripcion_tipobibliografia" class="text ui-widget-content ui-corner-all" style=" width: 220px; text-align: left;" value="<?php echo $obj->descripcion_tipobibliografia; ?>" />
                
               
                
             </fieldset> 
            <div class="contenido" style="margin:0 auto; width: 550px; ">
            <fieldset class="ui-corner-all" >
                <legend>Accion</legend> 
                <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="save" class="button">GRABAR</a>
                    <a href="index.php?controller=tipobibliografia" class="button">ATRAS</a>
                </div>
            </div>
        </div>
    </div>
</form>
</div>