    <?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_plancurricular.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
<h6 class="ui-widget-header">Registro de Planes Curriculares</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="plancurricular" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 650px; ">
               
            <fieldset class="ui-corner-all" >
                    <legend>Datos</legend>
                <label for="CodigoPlan" class="labels" style="width: 90px;">Codigo Plan:</label>
                <input id="CodigoPlan" name="CodigoPlan" class="text ui-widget-content ui-corner-all" style=" width: 80px; text-align: left;" value="<?php echo $obj->CodigoPlan; ?>" readonly />
                 
                <label for="DescripcionPlan" class="labels"style="width: 185px;">Descripcion Plan</label>
                <input id="DescripcionPlan" maxlength="100" name="DescripcionPlan" class="text ui-widget-content ui-corner-all" style=" width: 100px; text-align: left;" value="<?php echo $obj->DescripcionPlan; ?>" />
                
                <br>
                
                <label for="EstadoPlanCurricular" class="labels" style="width: 90px;">Estado Plan:</label>
   		<input id="EstadoPlanCurricular" name="EstadoPlanCurricular" class="text ui-widget-content ui-corner-all" style=" width: 100px; text-align: left;" value="<?php echo $obj->EstadoPlanCurricular; ?>"  />
               
                <label for="Vigente" class="labels" style="width: 165px;">Vigente:</label>
   		<input id="Vigente" name="Vigente" class="text ui-widget-content ui-corner-all" style=" width: 100px; text-align: left;" value="<?php echo $obj->Vigente; ?>"  />
                                               
                <br>
                
                
                
                <label for="DescripcionFacultad" class="labels" style="width: 120px;">Facultad:</label>
                <?php echo $facultades; ?>
                
                <br/>
                    
                <label for="CodigoEscuela" class="labels" style="width: 140px;">Escuela:</label>
                 <?php if($readonly==""){ ?>
                     <select id="CodigoEscuela" name="CodigoEscuela" class="ui-corner-all text ui-widget-content">
                          <option value="">...</option>
                             </select>
                                 <?php } 
                                    else {
                                        echo $escuelaprofesional;
                                       }
                                        ?>
                
                <br/>
                                
                <label for="CreditosObligatorios" class="labels" style="width: 95px;">Creditos Obligatorios:</label>
   		<input id="CreditosObligatorios" name="CreditosObligatorios" class="text ui-widget-content ui-corner-all" style=" width: 100px; text-align: left;" value="<?php echo $obj->CreditosObligatorios; ?>"  />
                
                <label for="CreditosElectivos" class="labels" style="width: 165px;">Creditos Electivos:</label>
   		<input id="CreditosElectivos" name="CreditosElectivos" class="text ui-widget-content ui-corner-all" style=" width: 100px; text-align: left;" value="<?php echo $obj->CreditosElectivos; ?>"  />
               <br>
                <label for="Resolucion" class="labels" style="width: 95px;">Resolucion:</label>
   		<input id="Resolucion" name="Resolucion" class="text ui-widget-content ui-corner-all" style=" width: 100px; text-align: left;" value="<?php echo $obj->Resolucion; ?>"  />
                
                <label for="Tipo" class="labels" style="width: 165px;">Tipo:</label>
   		<input id="Tipo" name="Tipo" class="text ui-widget-content ui-corner-all" style=" width: 100px; text-align: left;" value="<?php echo $obj->Tipo; ?>"  />
                              
                <br/>      
                
        </div>
       </fieldset>
            <div style="margin:0 auto; width: 570px; height: 70px;">
            <fieldset class="ui-corner-all" >
            <legend>Accion</legend>
                <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="save" class="button">GRABAR</a>
                    <a href="index.php?controller=plancurricular" class="button">ATRAS</a>
                </div>
                </fieldset>
                </div>
        </div>
</form>
</div>