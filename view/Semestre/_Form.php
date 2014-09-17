<?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_semestre.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
<h6 class="ui-widget-header">Registro de Semestre Academico</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="semestre" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 650px; ">
            <fieldset class="ui-corner-all" >
                <legend>Datos</legend>            
                <label for="CodigoSemestre" class="labels" style="width: 70px;">Codigo:</label>
                <input id="CodigoSemestre" name="CodigoSemestre" class="text ui-widget-content ui-corner-all" style=" width: 90px; text-align: left;" value="<?php echo $obj->CodigoSemestre; ?>" readonly />                
                <label for="EstadoSemestre" class="labels" style="width: 90px" >Estado:</label>
                <input id="EstadoSemestre" maxlength="100" name="EstadoSemestre" class="text ui-widget-content ui-corner-all" style=" width: 100px; text-align: left;" value="<?php echo $obj->EstadoSemestre; ?>" />
             		
                <label for="Abreviatura" class="labels" style="width: 100px" >Abreviatura:</label>
                <input id="Abreviatura" maxlength="100" name="Abreviatura" class="text ui-widget-content ui-corner-all" style=" width: 100px; text-align: left;" value="<?php echo $obj->Abreviatura; ?>" />
                
                
                <br><br>
                
                <label for="Descripcion" class="labels" style="width: 120px" >Descripcion:</label>
                <input id="Descripcion" maxlength="100" name="Descripcion" class="text ui-widget-content ui-corner-all" style=" width: 425px; text-align: left;" value="<?php echo $obj->Descripcion; ?>" />
		
                <br>
                
                <label for="ConceptoCarnet" class="labels" style="width: 120px" >Concepto:</label>
                <input id="ConceptoCarnet" maxlength="100" name="ConceptoCarnet" class="text ui-widget-content ui-corner-all" style=" width: 425px; text-align: left;" value="<?php echo $obj->ConceptoCarnet; ?>" />
                
                <br/><br/>
                
		<label for="FechaInicio" class="labels" style="width: 180px" >Fecha Inicio:</label>
                <input id="FechaInicio" maxlength="100" name="Descripcion" class="text ui-widget-content ui-corner-all" style=" width: 70px; text-align: left;" value="<?php echo $obj->FechaInicio; ?>" />
			
                <label for="FechaTermino" class="labels" style="width: 150px" >Fecha Termino:</label>
		<input id="FechaTermino" maxlength="100" name="FechaTermino" class="text ui-widget-content ui-corner-all" style=" width: 70px; text-align: left;" value="<?php echo $obj->FechaTermino; ?>" />
                
                <br>
                
		<label for="ExamenOrdinario" class="labels" style="width: 180px" >Examen Ordinario:</label>
                <input id="ExamenOrdinario" maxlength="100" name="ExamenOrdinario" class="text ui-widget-content ui-corner-all" style=" width: 70px; text-align: left;" value="<?php echo $obj->ExamenOrdinario; ?>" />
				
                <label for="AcreditacionIngresante" class="labels" style="width: 150px" >Acreditacion Ingresante:</label>
		<input id="AcreditacionIngresante" maxlength="100" name="AcreditacionIngresante" class="text ui-widget-content ui-corner-all" style=" width: 70px; text-align: left;" value="<?php echo $obj->AcreditacionIngresante; ?>" />
               
                <br>
                
		<label for="InicioClase" class="labels" style="width: 180px" >Inicio Clase:</label>
		<input id="InicioClase" maxlength="100" name="InicioClase" class="text ui-widget-content ui-corner-all" style=" width: 70px; text-align: left;" value="<?php echo $obj->InicioClase; ?>" />
                
		<label for="EncuestaEstudiantil" class="labels" style="width: 150px" >Encuesta Estudiantil:</label>
		<input id="EncuestaEstudiantil" maxlength="100" name="EncuestaEstudiantil" class="text ui-widget-content ui-corner-all" style=" width: 70px; text-align: left;" value="<?php echo $obj->EncuestaEstudiantil; ?>" />
                
                <br>
                
		<label for="ExamenParcial" class="labels" style="width: 180px" >Examen Parcial:</label>
                <input id="ExamenParcial" maxlength="100" name="ExamenParcial" class="text ui-widget-content ui-corner-all" style=" width: 70px; text-align: left;" value="<?php echo $obj->ExamenParcial; ?>" />
				
                <label for="RetiroTotal" class="labels" style="width: 150px" >Retiro Total:</label>
                <input id="RetiroTotal" maxlength="100" name="RetiroTotal" class="text ui-widget-content ui-corner-all" style=" width: 70px; text-align: left;" value="<?php echo $obj->RetiroTotal; ?>" />
                
                <br>
                
		<label for="EntregaActa" class="labels" style="width: 180px" >Entrega Acta:</label>
                <input id="EntregaActa" maxlength="100" name="EntregaActa" class="text ui-widget-content ui-corner-all" style=" width: 70px; text-align: left;" value="<?php echo $obj->EntregaActa; ?>" />
               
                <label for="ExamenFinal" class="labels" style="width: 150px" >Examen Final:</label>
                <input id="ExamenFinal" maxlength="100" name="ExamenFinal" class="text ui-widget-content ui-corner-all" style=" width: 70px; text-align: left;" value="<?php echo $obj->ExamenFinal; ?>" />
               
                <br>
                
                <label for="RecepcionActa" class="labels" style="width: 180px" >Recepcion Acta:</label>
                <input id="RecepcionActa" maxlength="100" name="RetiroTotal" class="text ui-widget-content ui-corner-all" style=" width: 70px; text-align: left;" value="<?php echo $obj->RecepcionActa; ?>" />
                
                <label for="MatriculaAplazado" class="labels" style="width: 150px" >Matricula Aplazado:</label>
                <input id="MatriculaAplazado" maxlength="100" name="MatriculaAplazado" class="text ui-widget-content ui-corner-all" style=" width: 70px; text-align: left;" value="<?php echo $obj->MatriculaAplazado; ?>" />
                
                <br>
                
		<label for="ExamenAplazado" class="labels" style="width: 180px" >Examen Aplazado:</label>
                <input id="ExamenAplazado" maxlength="100" name="ExamenAplazado" class="text ui-widget-content ui-corner-all" style=" width: 70px; text-align: left;" value="<?php echo $obj->ExamenAplazado; ?>" />
                
		<label for="EntregaAplazado" class="labels" style="width: 150px" >Entrega Aplazado:</label>
                <input id="EntregaAplazado" maxlength="100" name="EntregaAplazado" class="text ui-widget-content ui-corner-all" style=" width: 70px; text-align: left;" value="<?php echo $obj->EntregaAplazado; ?>" />
               
                <br>
                
		<label for="RecepcionAplazado" class="labels" style="width: 420px" >Recepcion Aplazado:</label>
                <input id="RecepcionAplazado" maxlength="100" name="RecepcionAplazado" class="text ui-widget-content ui-corner-all" style=" width: 70px; text-align: left;" value="<?php echo $obj->RecepcionAplazado; ?>" />
                <br>
               
                
             </fieldset> 
            <fieldset>
                <legend>Acccion</legend>
                    <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="save" class="button">GRABAR</a>
                    <a href="index.php?controller=semestre" class="button">ATRAS</a>
                    </div>
            </fieldset>
                
        </div>
    </div>
</form>
</div>