<?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_estadosituacional.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
<h6 class="ui-widget-header">Registro de estado situacional </h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="estadosituacional" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 450px; ">
            <fieldset class="ui-corner-all" >
                <legend>Datos</legend>            
                <label for="CodigoEstadoSituacional" class="labels" style="width: 40px">Codigo:</label>
                <input id="CodigoEstadoSituacional" name="CodigoEstadoSituacional" class="text ui-widget-content ui-corner-all" style=" width: 100px; text-align: left;" value="<?php echo $obj->CodigoEstadoSituacional; ?>" readonly />                
             <br>   
                <label for="DescripcionEstadoestacionario" class="labels" style="width: 160px" >Descripcion:</label>
                <input id="DescripcionEstadoestacionario" maxlength="100" name="DescripcionEstadoestacionario" class="text ui-widget-content ui-corner-all" style=" width: 220px; text-align: left;" value="<?php echo $obj->DescripcionEstadoestacionario; ?>" />
                
             </fieldset> 
                <div class="contenido" style="margin:0 auto; width: 450px; ">
                <fieldset class="ui-corner-all" >
                    <legend>Accion</legend>  
                        <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                            <a href="#" id="save" class="button">GRABAR</a>
                            <a href="index.php?controller=estadosituacional" class="button">ATRAS</a>
                        </div>
                </fieldset> 
                </div>
        </div>
    </div>
</form>
</div>