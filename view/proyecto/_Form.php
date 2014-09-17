<?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_proyecto.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<link href="css/formproyecto.css" rel="stylesheet" type="text/css" />

<div class="div_container">
    <h6 class="ui-widget-header"><?php if($_GET['id']==''){     echo 'niger';
}else{
        echo 'white';}?>Registro de proyecto</h6>
    
<form id="frm" action="index.php" method="POST">
    
    <input type="hidden" name="controller" value="proyecto" />
    <input type="hidden" name="action" value="save" />
    
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido col-md-12"  align="center">
            <fieldset class="ui-corner-all" >
                <style>
                    .nav-tabs>li>a{
                        padding-left: 10px;
                        padding-right: 10px;
                    }
                </style>
<ul class="nav nav-tabs" style="font-size: 11px; font-family: Calibri">
  <li class="active"><a href="#1" data-toggle="tab">I. DATOS GENERALES</a></li>
    <li ><a href="#2" data-toggle="tab">II. PLANTEAMIENTO DE PROBLEMAS</a></li>
    <li><a href="#3" data-toggle="tab">III.OBJETIVOS</a></li>
  <li><a href="#4" data-toggle="tab">IV. MARCO TEORICO CONCEPTUAL</a></li>
  <li><a href="#5" data-toggle="tab">V. METODOLOGIA DE LA INVESTIGACION</a></li>
    <li><a href="#6" data-toggle="tab">VI. ASPECTOS ADINISTRATIVOS</a></li>
</ul>
                <div style="height: 20px; background-color: #F7F7F7; border-right: 1px solid #ddd; border-left: 1px solid #ddd;">
                    
                </div>
                <div class="tab-content col-md-12" style="height: auto;background-color: #F7F7F7; margin-bottom: 15px;font-family: Calibri;text-align: left;padding-left: 0; padding-right: 0; border-bottom:1px solid #ddd ; border-left: 1px solid #ddd;border-right:1px solid #ddd; border-bottom-left-radius: 4px;  border-bottom-right-radius: 4px;">
                <div class="tab-pane active" id="1">
                   <div id="tituloo"><p><strong>1. NOMBRE DEL PROYECTO:</strong></p></div>
                   <div class="col-md-12">
				   
					<div class="col-md-2">
                    <div class="form-group">
					<div class="col-md-12 colpad">
					<span class="input-group-addon"><strong for="idproyecto" >CODIGO</strong></span>
					</div>
					<div class="col-md-12 colpad">
                    <input  id="idproyecto" name="idproyecto" type="text" class="form-control" style="background-color: white;" placeholder="Codigo proyecto" value="<?php echo $obj->idproyecto; ?>" readonly  />
                    </div>
					</div>
                    </div>
					
					<div class="col-md-10">
                    <div class="form-group">
					<div class="col-md-12 colpad">
					<span class="input-group-addon"><label class="control-label"><strong for="nombre_proyecto">NOMBRE DE PROYECTO:</strong></label></span>
					</div>
					<div class="col-md-12 colpad">
                    <input id="nombre_proyecto" name="nombre_proyecto" type="text" class="form-control" placeholder="Nombre proyecto" value="<?php echo $obj->nombre_proyecto; ?>" />
                    </div>
					</div>
                    </div>
					
                    </div> 
                    
                    <div id="tituloo"><p><strong>2. UBICACION GEOGRAFICA DEL PROYECTO:</strong></p></div>
                    <div class="col-md-12">
                    <div class="col-md-4">
                        <span class="input-group-addon"><strong for="$iddepartamento">DEPARTAMENTO:</strong></span>
                        <?php echo $departamento;?>
                    </div>
                    <div class="col-md-4">
                        <span class="input-group-addon"><strong for="provincia"  style="width: 80px">PROVINCIA:</strong></span>
                        <?php if(!isset($provincia)){ ?>
                        <select id="provincia" name="provincia" class="form-control" style="width: 100%;">
                            <option value="">...</option>
                        </select>
                    <?php } 
                          else {
                                echo $provincia;
                                }?>
                    </div>
                    <div class="col-md-4">
                        <span class="input-group-addon"><strong for="distrito">DISTRITO:</strong></span>
                        <?php if(!isset($distrito)){ ?>
                        <select id="distrito" name="distrito" class="form-control" style="width: 100%;">
                            <option value="">...</option>
                        </select>
                    <?php } 
                          else {
                                echo $distrito;
                                }?>
                    </div>
                          
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-4">
                           <div id="tituloo"><p><strong>3. PERIODO DE EJECUCION:</strong></p></div> 
                        </div>
                        <div class="col-md-8">
                           <div id="tituloo"><p><strong>4. FACULTAD QUE REPRESENTA EL PROYETO:</strong></p></div> 
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-4">
                    <span class="input-group-addon"><strong for="periodo_ejecucion"  >3. PERIODO DE EJECUCION:</strong></span>
                    <input  id="periodo_ejecucion" name="periodo_ejecucion" type="text" class="form-control" placeholder="Periodo de ejecucion"  value="<?php echo $obj->periodo_ejecucion; ?>"  />
                    </div>
                    <div  class="col-md-4">
                    <span class="input-group-addon"><strong for="CodigoFacultad" class="labels" >FACULTAD:</strong></span>
                    <?php echo $facultad; ?>
                    </div>
                    <div class="col-md-4">
                    <span class="input-group-addon"><strong for="CodigoEscuela" class="labels"  >ESCUELA:</strong></span>
                    <?php if((!isset($escuela))){ ?>
                                        <select id="CodigoEscuela" name="CodigoEscuela" style="width:100%;" class="form-control">
                                                    <option value="">...</option>
                                        </select>
                                    <?php } 
                                           else {
                                                echo $escuela;
                                                }?>
                    </div>
                    </div>
                    
                    <div id="tituloo"><p><strong>5.EJE TEMATICO PRIORITARIOS Y LINEA DE INVESTIGACION:</strong></p></div>
                <div class="col-md-12">
                    <div class="col-md-1"></div>
<!--                    <div class="col-md-4">
                        <span class="input-group-addon"><strong for="$grupo">GRUPO</strong></span>
                        <select  class = "form-control" > 
                            <option  value = "one" >.....</option> 
                            <option  value = "two" >LORETO</option> 
                            <option  value = "three" >LIMA</option> 
                        </select>
                    </div>-->
                    <div class="col-md-5">
                    <span class="input-group-addon"><strong for="idejetematico" class="labels"  >EJE TEMATICO:</strong></span>
                    <?php echo $eje_tematico;?>
                    </div>
                    <div class="col-md-5">
                        <span class="input-group-addon"><strong for="$idlinea_investigacion">LINEA DE INVESTIGACION:</strong></span>
                        <?php if((!isset($linea_investigacion))){ ?>
                                        <select id="idlinea_ivestigacion" name="idlinea_ivestigacion" style="width:100%;" class="form-control">
                                                    <option value="">...</option>
                                        </select>
                                    <?php } 
                                           else {
                                                echo $linea_investigacion;
                                           }?>
                    </div>
                    <div class="col-md-1"></div>
                </div> 
                </div>  
                    
                <div class="tab-pane" id="2"> 
                    <div class="col-md-12">
                        <div  class="col-md-6">
                    <span class="input-group-addon"><strong for="antecedentes" align="right" >ANTECEDENTES DEL PROBLEMA: </strong></span>
                    <textarea id="descripcion" name="descripcion" class="form-control" rows="4"></textarea>
                    </div>
                        <div class="col-md-6">
                    <span class="input-group-addon"><strong for="dada" align="right" >DEFINICION DEL PROBLEMA: </strong></span>
                    <textarea id="descripcion" name="descripcion" class="form-control" rows="4"></textarea>
                    </div>
                    </div>
                    <div class="col-md-12">
                        <div  class="col-md-6">
                    <span class="input-group-addon"><strong for="dada" align="right" >FORMULACION DE PROBLEMA: </strong></span>
                    <textarea id="descripcion" name="descripcion" class="form-control" rows="4"></textarea>
                    </div>
                        <div  class="col-md-6">
                    <span class="input-group-addon"><strong for="dada" align="right" >JUSTIFICACION: </strong></span>
                    <textarea id="descripcion" name="descripcion" class="form-control" rows="4"></textarea>
                    </div>
                    </div>
                    <div class="col-md-12">
                        <div  class="col-md-6">
                    <span class="input-group-addon"><strong for="dada" align="right" >IMPORTANCIA: </strong></span>
                    <textarea id="descripcion" name="descripcion" class="form-control" rows="4"></textarea>
                    </div>
                        <div class="col-md-6">
                    <span class="input-group-addon"><strong for="dada" align="right" >LIMITACIONES: </strong></span>
                    <textarea id="descripcion" name="descripcion" class="form-control" rows="4"></textarea>
                    </div>
                    </div>
                </div>
                    
                <div class="tab-pane" id="3">
                    <div class="col-md-12">
                        <div  class="col-md-6">
                    <span class="input-group-addon"><strong for="dada" align="right" >OBJETIVO GENERAL: </strong></span>
                    <textarea id="descripcion" name="descripcion" class="form-control" rows="5"></textarea>
                    </div>
                        <div  class="col-md-6">
                    <span class="input-group-addon"><strong for="dada" align="right" >OBJETIVOS ESPECIFICOS: </strong></span>
                    <textarea id="descripcion" name="descripcion" class="form-control" rows="5"></textarea>
                    </div>
                    </div>
                        
                </div>
                
                <div class="tab-pane" id="4">
                    <div class="col-md-12">
                        <div  class="col-md-6">
                    <span class="input-group-addon"><strong for="dada" align="right" >ANTECEDENTES DE LA INVESTIGACION: </strong></span>
                    <textarea id="descripcion" name="descripcion" class="form-control" rows="4"></textarea>
                    </div>
                        <div  class="col-md-6">
                    <span class="input-group-addon"><strong for="dada" align="right" >DEFINICION DE TERMINOS: </strong></span>
                    <textarea id="descripcion" name="descripcion" class="form-control" rows="4"></textarea>
                    </div>
                    </div>
                    <div class="col-md-12">
                        <div  class="col-md-6">
                    <span class="input-group-addon"><strong for="dada" align="right" >BASES TEORICAS: </strong></span>
                    <textarea id="descripcion" name="descripcion" class="form-control" rows="4"></textarea>
                    </div>
                        <div  class="col-md-6">
                    <span class="input-group-addon"><strong for="dada" align="right" >HIPOTESIS: </strong></span>
                    <textarea id="descripcion" name="descripcion" class="form-control" rows="4"></textarea>
                    </div>
                    </div>
                    <div class="col-md-12">
                        <div  class="col-md-6">
                            <span class="input-group-addon"><strong for="dada" align="right" >SISTEMA DE VARIABLES: </strong></span>
                    <textarea id="descripcion" name="descripcion" class="form-control" rows="4"></textarea>
                    </div>
                        <div  class="col-md-6">
                    <span class="input-group-addon"><strong for="dada" align="right" >ESCALA DE MEDICION: </strong></span>
                    <textarea id="descripcion" name="descripcion" class="form-control" rows="4"></textarea>
                    </div>
                    </div>
                </div>
                    
                <div class="tab-pane" id="5">
                   <div class="col-md-12">
                        <div  class="col-md-6">
                    <span class="input-group-addon"><strong for="dada" align="right" >TIPO DE INVESTIGACION: </strong></span>
                    <textarea id="descripcion" name="descripcion" class="form-control" rows="4"></textarea>
                    </div>
                        <div  class="col-md-6">
                    <span class="input-group-addon"><strong for="dada" align="right" >NIVEL DE INVESTIGACION: </strong></span>
                    <textarea id="descripcion" name="descripcion" class="form-control" rows="4"></textarea>
                    </div>
                    </div>
                    <div class="col-md-12">
                        <div  class="col-md-6">
                    <span class="input-group-addon"><strong for="dada" align="right" >DISEÑO DE INVESTIGACION: </strong></span>
                    <textarea id="descripcion" name="descripcion" class="form-control" rows="4"></textarea>
                    </div>
                        <div  class="col-md-6">
                    <span class="input-group-addon"><strong for="dada" align="right" >COBERTURA DE INVESTIGACION: </strong></span>
                    <textarea id="descripcion" name="descripcion" class="form-control" rows="4"></textarea>
                    </div>
                    </div>
                    <div class="col-md-12">
                        <div  class="col-md-6">
                            <span class="input-group-addon"><strong for="dada" align="right" >FUENTES, TECNICAS E INSTRUMENTOS DE INVESTIGACION: </strong></span>
                    <textarea id="descripcion" name="descripcion" class="form-control" rows="4"></textarea>
                    </div>
                        <div  class="col-md-6">
                    <span class="input-group-addon"><strong for="dada" align="right" >PROCEDIMIENTO Y PRESENTACION DE DATOS: </strong></span>
                    <textarea id="descripcion" name="descripcion" class="form-control" rows="4"></textarea>
                    </div>
                    </div>
                    <div class="col-md-12">
                        <div  class="col-md-3"></div>   
                    <div  class="col-md-6">
                            <span class="input-group-addon"><strong for="dada" align="right" >ANALISIS E INTERPRETACION DE DATOS: </strong></span>
                    <textarea id="descripcion" name="descripcion" class="form-control" rows="4"></textarea>
                    </div>
                        <div  class="col-md-3"></div> 
                    </div>
                </div>
                    
                <div class="tab-pane" id="6">
                    <div class="col-md-12">
                        <div  class="col-md-6">
                    <span class="input-group-addon"><strong for="dada" align="right" >TIPO DE INVESTIGACION: </strong></span>
                    <textarea id="descripcion" name="descripcion" class="form-control" rows="4"></textarea>
                    </div>
                        <div  class="col-md-6">
                    <span class="input-group-addon"><strong for="nivel" align="right" >NIVEL DE INVESTIGACION: </strong></span>
                    <textarea id="descripcion" name="descripcion" class="form-control" placeholder="Nivel de Invetigacion del Proyecto" rows="4"></textarea>
                    </div>
                    </div>
                    <div style="margin-bottom: 20px;" class="col-md-12">
                    <div class="col-md-6">
                    <span class="input-group-addon"><strong for="presupuesto" class="labels" >PRESUPUESTO:</strong></span>
                    <input id="presupuestoo" name="presupuestoo" type="text" class="form-control" placeholder="Presupuesto de proyecto"  value=""  />
                    </div>                     
                    <div  class="col-md-6">
                    <span class="input-group-addon"><strong for="financiamiento" class="labels" >FINANCIAMIENTO:</strong></span>
                    <input id="financiamiento" name="financiamiento" type="text" class="form-control" placeholder="Financiamiento"  value=""   />
                    </div>
                    <div style="margin-bottom: 20px;" class="col-md-12">
                        <div class="col-md-6"><div id="tituloo"><p><strong>12. PRESUPUESTO DETALLADO:</strong></p></div> </div>  
                        <div class="col-md-6"><div id="tituloo"><p><strong>13. BIBLIOGRAFIA:</strong></p></div></div> 
                       
                    <div class="col-md-6">
                    <span class="input-group-addon"><strong for="presupuesto" class="labels" >PRESUPUESTO:</strong></span>
                    <textarea id="presupuesto" name="presupuesto" class="form-control" placeholder="Presupuesto del proyecto" rows="4"><?php echo $obj->presupuesto; ?></textarea>
                    </div>   
                    
                    <div  class="col-md-6"><span class="input-group-addon"><strong for="bibliografia" class="labels" >BIBLIOGRAFIA:</strong></span>
                    <textarea id="bibliografia" name="bibliografia" class="form-control" placeholder="Bibliografia del proyecto" rows="4"  value=""></textarea>
                    </div>
                    </div>   
                    <div class="col-md-12">
                    <div style="margin-bottom:20px;" class="col-md-6">
                    <span class="input-group-addon"><strong for="idtipo_proyecto" align="right" >idtipo_proyecto:</strong></span>
                    <input id="idtipo_proyecto" name="idtipo_proyecto" type="text" class="form-control" placeholder="idtipo_proyecto"  value="<?php echo $obj->idtipo_proyecto; ?>"  />
                    </div>
                        <div class="col-md-12">
                    <div style="margin-bottom:20px;" class="col-md-6">
                    <span class="input-group-addon"><strong for="tema_proyecto" align="right" >TEMA DEL PROYECTO:</strong></span>
                    <input id="tema_proyecto" name="tema_proyecto" type="text" class="form-control" placeholder="Tema proyecto"  value="<?php echo $obj->tema_proyecto; ?>"  />
                    </div>
                </div>
                        <div class="col-md-12">
                    <div style="margin-bottom:20px;" class="col-md-6">
                    <span class="input-group-addon"><strong for="impactos" align="right" >IMPACTO:</strong></span>
                    <input id="impactos" name="impactos" type="text" class="form-control" placeholder="Impacto"  value="<?php echo $obj->impactos; ?>"  />
                    </div>
                    <div style="margin-bottom:20px;" class="col-md-6">
                    <span class="input-group-addon"><strong for="sinergias" class="labels" >SINERGIAS:</strong></span>
                    <input id="sinergias" name="sinergias" type="text" class="form-control" placeholder="Sinergias"  value="<?php echo $obj->sinergias; ?>"  />
                    </div>
                            <div id="tituloo"><p><strong>8. VIABILIDAD TECNICA DEL PROYECTO(MATRIZ DE MARCO LOGICO):</strong></p></div>
                    <div class="col-md-12">
                        <div class="col-md-2"></div>
                    <div  class="col-md-8">
                    <span class="input-group-addon"><strong for="viabilidad_tecnica" align="right" >VIABILDAD TECNICA: </strong></span>
                    <textarea id="viabilidad_tecnica" name="viabilidad_tecnica" class="form-control" rows="4" placeholder="Viabilidad Tecnica del Proyecto"><?php echo $obj->viabilidad_tecnica; ?></textarea>
                    </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>                   
                </div> 
                    
                </div>
                    
<!--                    <div class="tab-pane" id="6">
                    <div class="col-md-12">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <span class="input-group-addon"><strong for="$idtipo_proyecto">TIPO DE PROYECTO:</strong></span>
                        <?php echo $tipo_proyecto;?> 
                    </div>
                    <div class="col-md-4"></div>                                       
                </div>   
                    <div class="col-md-12">
                    <div style="margin-bottom:20px;" class="col-md-6">
                    <span class="input-group-addon"><strong for="tema_proyecto" align="right" >TEMA DEL PROYECTO:</strong></span>
                    <input id="tema_proyecto" name="tema_proyecto" type="text" class="form-control" placeholder="Tema proyecto"  value="<?php echo $obj->tema_proyecto; ?>"  />
                    </div>
                    
                </div>
                 <div class="col-md-12">
                    <div style="margin-bottom:20px;" class="col-md-6">
                    <span class="input-group-addon"><strong for="impactos" align="right" >IMPACTO:</strong></span>
                    <input id="impactos" name="impactos" type="text" class="form-control" placeholder="Impacto"  value="<?php echo $obj->impactos; ?>"  />
                    </div>
                    <div style="margin-bottom:20px;" class="col-md-6">
                    <span class="input-group-addon"><strong for="sinergias" class="labels" >SINERGIAS:</strong></span>
                    <input id="sinergias" name="sinergias" type="text" class="form-control" placeholder="Sinergias"  value="<?php echo $obj->sinergias; ?>"  />
                    </div>
                </div>
                   <div class="col-md-12">
                    <div style="margin-bottom:20px;" class="col-md-6">
                    <span class="input-group-addon"><strong for="viabilidad_tecnica" class="labels" >VIABILIDAD TECNICA:</strong></span>
                    <input id="viabilidad_tecnica" name="viabilidad_tecnica" type="text" class="form-control" placeholder="Viabilidad Tecnica"  value="<?php echo $obj->viabilidad_tecnica; ?>"   />
                    </div>
                    <div style="margin-bottom:20px;" class="col-md-6">
                    <span class="input-group-addon"><strong for="presupuesto" class="labels" >PRESUPUESTO:</strong></span>
                    <input id="presupuesto" name="presupuesto" type="text" class="form-control" placeholder="Presupuesto de proyecto"  value="<?php echo $obj->presupuesto; ?>"  />
                    </div>                    
                </div>     
                </div>-->
                    
                    
            </div>
             </fieldset>
             <div class="contenido" style="margin:0 auto; width: 750px; " align="center">
             <fieldset class="ui-corner-all" >
                    <a href="index.php?controller=proyecto"  class="button"><<</a>
                    <button id="save" style="font-size: 10px;padding: 4px; background-color: #0078BB ;" type="submit" class="btn btn-success" >GRABAR</button>
    <!--                 <button onclick="window.location.href='index.php?controller=proyecto'" style="font-size: 10px;padding: 4px; background-color: #0078BB ;" class="btn btn-success">ATRAS</button>
                   <button style="font-size: 10px;padding: 4px; background-color: #0078BB ;" type="button" onclick="document.getElementById('pregunta').style.display='',document.getElementById('propuesta2').style.display='none'" class="btn btn-success" ><span class="glyphicon glyphicon-fast-backward"></span> GO BACK</button>-->
                 </div>   
              </fieldset>
              </div>
        </div>
        </form>
    </div>

    </div>

