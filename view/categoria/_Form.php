<?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_categoria.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
<h6 class="ui-widget-header">Registro de Categoria</h6>
<form id="frm" action="index.php" method="POST">
    
    <input type="hidden" name="controller" value="categoria" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 550px; ">
            <fieldset class="ui-corner-all" >
                <legend>Datos</legend>            
                <label for="CodigoCategoria" class="labels">Codigo:</label>
                <input id="CodigoCategoria" name="CodigoCategoria" class="text ui-widget-content ui-corner-all" style=" width: 100px; text-align: right;" value="<?php echo $obj->CodigoCategoria; ?>" readonly />                
                
                <label for="DescripcionCategoria" class="labels" style="width:100px" >Descripcion:</label>
                <input id="DescripcionCategoria" maxlength="100" name="DescripcionCategoria" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->DescripcionCategoria; ?>" />
                
               
               
             </fieldset> 
             <fieldset class="ui-corner-all" >
                <legend>Accion</legend> 
                 <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="save" class="button">GRABAR</a>
                    <a href="index.php?controller=categoria" class="button">ATRAS</a>
                </div>
              </fieldset>
        </div>
    </div>
</form>
</div>