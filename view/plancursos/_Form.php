<?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_cursos.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
<h6 class="ui-widget-header">Registro De Cursos</h6>

<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="plancursos" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 700px; "align="center">
            <fieldset class="ui-corner-all" >
                <legend>Datos</legend>   
                <table border="0" cellpadding="3" cellspacing="1" style="background-color:#fff;">
                    <tr class="fil">
                        <td width="15%">
                            <label for="CodigoCurso" >Codigo:</label>
                        </td>  
                        <td>
                            <input id="CodigoCurso" name="CodigoCurso" class="text ui-widget-content ui-corner-all"  style=" width: 150px; text-align: left;" value="<?php echo $obj->CodigoCurso; ?>" readonly />                
                        </td>  
                        <td>
                            <label for="CodigoPlan"   >Plan:</label>
                        </td>
                        <td>
                            <?php echo $plan; ?>
                        </td>
                    </tr>
                    <tr class="fil">
                        <td>
                        
                            <label for="CodigoFacultad"  >Facultad:</label>
                        </td>
                        <td>
                            <?php echo $facultad; ?>
                        </td>
                        <td>
                        
                            <label for="CodigoEscuela"  style="width: 120px" >Escuela:</label>
                        </td>
                        <td>
                           <?php echo utf8_encode($escuela); ?>
                        </td>
                    </tr>
                    <tr class="fil">
                        <td>
                            <label for="DescripcionCurso"  style="width: 120px" >Curso:</label>
                        </td>
                        <td>
                            <input id="DescripcionCurso" maxlength="100" name="DescripcionCurso" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->DescripcionCurso; ?>" />
                        </td>
                        <td>
                            <label for="Creditos"  style="width: 120px" >Creditos:</label>
                        </td>
                        <td>
                            <input id="Creditos" maxlength="100" name="Creditos" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->Creditos; ?>" />
                        </td>
                    </tr>
                    <tr class="fil">
                        <td>
                            <label for="TipoCurso"  style="width: 120px" >Tipo Curso:</label>
                        </td>
                        <td>
                            <input id="TipoCurso" maxlength="100" name="TipoCurso" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->TipoCurso; ?>" />
                        </td>
                        <td>
                            <label for="Ciclo" style="width: 120px" >Ciclo:</label>
                        </td>
                        <td>
                            <input id="Ciclo" maxlength="100" name="Ciclo" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->Ciclo; ?>" />
                        </td>    
                    </tr>
                    <tr class="fil">
                        <td>
                            <label for="CodCursoSira"  style="width: 120px" >Cod Curso Sira:</label>
                        </td>
                        <td>
                            <input id="CodCursoSira" maxlength="100" name="CodCursoSira" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->CodCursoSira; ?>" />
                        </td>
                        <td>
                            <label for="OrdenSegunPlan" style="width: 120px" >Orden Segun Plan:</label>
                        </td>
                        <td>
                           <input id="OrdenSegunPlan" maxlength="100" name="OrdenSegunPlan" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->OrdenSegunPlan; ?>" />  
                        </td>    
                    </tr>
                    <tr class="fil">
                        <td> <label for="EstadoCursoPlan" style="width: 120px" >Estado Curso Plan:</label></td>
                        <td> 
                            <input id="EstadoCursoPlan" maxlength="100" name="EstadoCursoPlan" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->EstadoCursoPlan; ?>" />  
                        </td>
                        <td> <label for="RequisitoCreditos" style="width: 120px" >Requisito Creditos:</label></td>
                        <td>
                             <input id="RequisitoCreditos" maxlength="100" name="RequisitoCreditos" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->RequisitoCreditos; ?>" />                       
                        </td>
                    </tr>
                    <tr class="fil">
                        <td> <label for="OrdenSegunPlanAlterno" style="width: 120px" >Orden Segun PlanAlterno:</label></td>
                        <td> 
                            <input id="OrdenSegunPlanAlterno" maxlength="100" name="OrdenSegunPlanAlterno" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->OrdenSegunPlanAlterno; ?>" />  
                        </td>
                        <td> <label for="DescripcionCursoIngles" style="width: 120px" >Descripcion Curso Ingles:</label></td>
                        <td>
                             <input id="DescripcionCursoIngles" maxlength="100" name="DescripcionCursoIngles" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->DescripcionCursoIngles; ?>" />                       
                        </td>
                    </tr>
                    <tr class="fil">
                        <td> <label for="CodigoEspecialidad" style="width: 120px" >Especialidad:</label></td>
                        <td> 
                         <?php echo $especialidad; ?>   
                            
                        </td>
                        <td> <label for="CodigoAreaCurricular" style="width: 120px" >CodigoAreaCurricular:</label></td>
                        <td>
                             <input id="CodigoAreaCurricular" maxlength="100" name="CodigoAreaCurricular" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->CodigoAreaCurricular; ?>" />                       
                        </td>
                    </tr>
                    <tr class="fil">
                        <td> <label for="HorasTeoria" style="width: 120px" >HorasTeoria:</label></td>
                        <td> 
                            <input id="HorasTeoria" maxlength="100" name="HorasTeoria" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->HorasTeoria; ?>" />                             
                        </td>
                        <td> 
                            <label for="HorasPractica" style="width: 120px" >Horas Practica:</label></td>
                        <td>
                             <input id="HorasPractica" maxlength="100" name="HorasPractica" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->HorasPractica; ?>" />                       
                        </td>
                    </tr>
                    <tr class="fil">             
                        <td> <label for="RequisitoCertificado" style="width: 120px" >Requisito Certificado:</label></td>
                        <td>
                             <input id="RequisitoCertificado" maxlength="100" name="RequisitoCertificado" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->RequisitoCertificado; ?>" />                       
                        </td>
                    </tr>
                  
                 </table>
                
             </fieldset> 
             <fieldset class="ui-corner-all" >
               <legend>Accion</legend> 
                 <a href="#" id="save" class="button">GRABAR</a>
               <a href="index.php?controller=cursos" class="button">ATRAS</a>
                    </div>
             </fieldset> 
        </div>
    </div>
</form>
</div>