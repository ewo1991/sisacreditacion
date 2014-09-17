<?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_bibliografia.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
<h6 class="ui-widget-header">Registro de Bibliografia</h6>

<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="bibliografia" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 500px; ">
            <fieldset class="ui-corner-all" >
                <legend>Datos</legend>            
                <label for="idbibliografia" class="labels" style="width: 110px">Codigo:</label>
                <input id="idbibliografia" name="idbibliografia" class="text ui-widget-content ui-corner-all" style=" width: 50px; text-align: left;" value="<?php echo $obj->idbibliografia; ?>" readonly />                
               
                <label for="tipo_bibliografia" class="labels" style="width: 100px" >Tipo Bibliografia:</label>
                <?php echo $tipo_bibliografia; ?>  
                
                <br/>
                
                <label for="referencia" class="labels" style="width: 110px" >Referencia:</label>
                <input id="referencia" maxlength="100" name="referencia" class="text ui-widget-content ui-corner-all" style=" width: 320px; text-align: left;" value="<?php echo $obj->referencia; ?>" />
               
                <br/>
                
                <label for="identificador" class="labels" style="width: 110px" >Identificador:</label>
                <input id="identificador" maxlength="100" name="identificador" class="text ui-widget-content ui-corner-all" style=" width: 320px; text-align: left;" value="<?php echo $obj->identificador; ?>" />
                
                <br/>
                
                <label for="descripcion" class="labels" style="width: 110px" >Descripcion:</label>
                <input id="descripcion" maxlength="100" name="descripcion" class="text ui-widget-content ui-corner-all" style=" width: 320px; text-align: left;" value="<?php echo $obj->descripcion; ?>" />
                 
                <br/>
            
             </fieldset> 
             <fieldset class="ui-corner-all" >
                <legend>Accion</legend>    
                <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="save" class="button">GRABAR</a>
                    <a href="index.php?controller=bibliografia" class="button">ATRAS</a>
                </div>
             </fieldset> 
        </div>
    </div>
</form>
</div>