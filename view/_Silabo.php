<style>

    .nav a{
        color:#428bca; 
    }
</style>
<br>



<?php if (isset($_SESSION["perfil"]) && ($_SESSION["perfil"] == 'ALUMNO')) { ?>
    <script type="text/javascript" src="js/app/evt_form_alumnocurso.js" ></script>
    <!--INICIO foreach-->
            
    <ul class="nav nav-tabs" id="myTab">



        <li class="active"><a href="#competencia" data-toggle="tab">Competencia</a></li>
        <li><a  href="#metodologia" data-toggle="tab">Metodologia</a></li>
        <li><a href="#objetivo" data-toggle="tab">Objetivo</a></li>
        <li><a href="#sumilla" data-toggle="tab">Sumilla</a></li>
        <li><a href="#unidad" data-toggle="tab" class="unidad">Unidad</a></li>
        <li><a href="#bibliografia" data-toggle="tab">Bibliografia</a></li>
        <li><a href="#regresar" data-toggle="tab" id="regresar">Regresar</a></li>

    </ul> 
    
    <input type="hidden" id="idsilabus" value="<?php echo $value[7]?>"/>
    
    <?php foreach ($rows as $key => $value) {
    ?>
                 <input type="hidden" id="codigosemestre" value="<?php echo $value[4]?>"/>
                 <input type="hidden" id="codigocurso" value="<?php echo $value[5]?>"/>
        <div class="tab-content col-md-11">
            <div class="tab-pane active" id="competencia" align="justify"><?php echo strtoupper(utf8_encode($value[0]));?></div>
            <div class="tab-pane" id="metodologia" align="justify"><?php echo strtoupper(utf8_encode($value[1]));?></div>
            <div class="tab-pane" id="objetivo" align="justify"><?php echo strtoupper(utf8_encode($value[2]));?></div>
            <div class="tab-pane" id="sumilla" align="justify"><?php echo strtoupper(utf8_encode($value[3]));?></div>

       
                
                   
 <?php } ?> 
        <div class="tab-pane" id="unidad" >

            
            
         


        </div>
 <div class="tab-pane" id="bibliografia"><?php echo strtoupper(utf8_encode($value[5]));?></div>
            
             <div class="tab-pane" id="regresar"></div>
    </div>
                 
                  
                 <div id="unidadid">
                  
                 </div>
                            <div id="silabusid">
                  
                 </div>    
                  <div id="temas">
                  
                 </div>
                 
                 
                 


                

<?php } ?>
<!--ALUMNO FIN-->

<!--DOCENTE INICIO-->

<!-- inicio Evaluacionesss-->

<?php if (isset($_SESSION["perfil"]) && ($_SESSION["perfil"] == 'PROFESOR')) { ?>
    <script type="text/javascript" src="js/app/evt_form_cursosemestre.js" ></script>
    
    <div class="col-md-11">        
        <div id="borrarb">
                
            <b>NOMBRE CURSO:
            <?php foreach ($rows2 as $key => $value){echo $value[0];} ?> 
            
            </b>&nbsp;&nbsp;<?php echo $value[6]?> <button class="btn btn-primary btn-xs" style="margin-bottom:5px; " type="button" id="regresar" value="Regresar">Regresar</button>
            </div>

 
 
    <table id="tablaevaluaciones" class="table table-bordered">
        <thead style="font-size:16px;background-color:#eaf8fc;">
        <td><strong>Descripcion</strong></td>
            <td ><strong>Fecha</strong></td>
            <td><strong>Ponderado</strong></td>
            <td ><strong>Accion</strong></td>
        </thead>
        <?php $conta=1;foreach ($rows as $key => $value) { ?>     
        <tr class="evaluacion<?php echo $conta;?> oa" id="<?php echo $value[3]?>"> 
            <td>
                <input type="hidden"  class="codevaluacion" value="<?php echo $value[3]?>"/>
                <?php echo $value[0];?>
            </td>
        <td> <?php echo strtoupper(utf8_encode($value[1]));?> </td>
        <td><?php echo strtoupper(utf8_encode($value[2]));?>%</td>
        <td> <?php $fechaE=$value[1];?>
          <?php date_default_timezone_set('UTC');
          $fechaA= date("Y-m-d");
//          echo $fechaA;?>
          <?php if ($fechaE > $fechaA){?>
          <button class="btn btn-primary btn-xs" type="button" onclick="filtro('<?php echo $value[3]?>')" value="Insertar">Insertar</button>
          <?php }else {?>
          <button class="btn btn-primary btn-xs" type="button"  value="Inactivo" style="background-color: red;">Inactivo</button>
              <?php }?>
          <input type="hidden" class="codcurso"  value="<?php echo $value[4]?>" />
          <input type="hidden" class="codsemestre"   value="<?php echo $value[5]?>" />
        </td>
        </tr>   
      
        <?php $conta=$conta+1;}?>
            <?php }?>
          <tr>        <td colspan="4"> <a class="btn btn-info btn-sm" href="curso.pdf" target="_blanc">Generar Sylabu</a>   </td>
</tr>
    </table>     

  
</div>

   
