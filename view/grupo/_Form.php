<?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_grupo.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
<h6 class="ui-widget-header">Registro de grupo</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="grupo" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 350px; ">
            <fieldset class="ui-corner-all" >
                <legend>Datos</legend>            
                <label for="idgrupo" class="labels" style="width: 50px">Codigo:</label>
                <input id="idgrupo" name="idgrupo" class="text ui-widget-content ui-corner-all" style=" width: 90px; text-align: left;" value="<?php echo $obj->idgrupo; ?>" readonly />                
                <br>
                <label for="nombre_grupo" class="labels" style="width: 110px" >Nombre grupo:</label>
                <input id="nombre_grupo" maxlength="100" name="nombre_grupo" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->nombre_grupo; ?>" />
                                <br>
                
             </fieldset> 
                 <div class="contenido" style="margin:0 auto; width: 350px; ">
                    <fieldset class="ui-corner-all" >
                    <legend>Accion</legend>
                    <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="save" class="button">GRABAR</a>
                    <a href="index.php?controller=grupo" class="button">ATRAS</a>
                    </div>
                    </fieldset>
                 </div>
        </div>
    </div>
</form>
</div>