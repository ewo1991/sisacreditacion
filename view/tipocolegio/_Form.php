<?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_tipocolegio.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
<h6 class="ui-widget-header">Registro de Tipo Colegio</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="tipocolegio" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 450px; ">
            <fieldset class="ui-corner-all" >
                <legend>Datos</legend>            
                <label for="CodigoTipoColegio" class="labels" style="width:40px" >Codigo:</label>
                <input id="CodigoTipoColegio" name="CodigoTipoColegio" class="text ui-widget-content ui-corner-all" style=" width: 100px; text-align: left;" value="<?php echo $obj->CodigoTipoColegio; ?>" readonly />                
                <br/>
                <label for="DescripcionTipoColegio" class="labels" style="width: 160px" >Descripcion:</label>
                <input id="DescripcionTipoColegio" maxlength="100" name="DescripcionTipoColegio" class="text ui-widget-content ui-corner-all" style=" width: 220px; text-align: left;" value="<?php echo $obj->DescripcionTipoColegio; ?>" />
          
             </fieldset> 
            <fieldset>
                <legend>Accion</legend>
            <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="save" class="button">GRABAR</a>
                    <a href="index.php?controller=tipocolegio" class="button">ATRAS</a>
                </div>
                </fieldset>
        </div>
    </div>
</form>
</div>