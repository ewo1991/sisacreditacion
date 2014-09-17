<!--Partes del  silabo-->
<style>

    .nav a{
        color:#428bca; 
    }
</style>
<br>

<!--ALUMNO Comienza-->

<?php if (isset($_SESSION["perfil"]) && ($_SESSION["perfil"] == 'PROFESOR')) { ?>
    <script type="text/javascript" src="js/app/evt_form_cursosemestre.js" ></script>
    <!--INICIO foreach-->
    <div id="ampliar">
    <ul class="nav nav-tabs" id="myTab" >



        <li class="active"><a href="#competencia" data-toggle="tab" class="ecp" >Competencia</a></li>
        <li><a  href="#metodologia" data-toggle="tab" class="ecp">Metodologia</a></li>
        <li><a href="#objetivo" data-toggle="tab" class="ecp">Objetivo</a></li>
        <li><a href="#sumilla" data-toggle="tab" class="ecp">Sumilla</a></li>
        <li><a href="#unidad" data-toggle="tab" class="unidad" class="ecp">Unidad</a></li>
        <li><a href="#bibliografia" data-toggle="tab" class="ecp">Bibliografia</a></li>
        <li><a href="#editar" data-toggle="tab" class="editar" class="ecp">Editar</a></li>
        <li><a href="#regresar" data-toggle="tab" class="regresar" class="ecp">Regresar</a></li>
        

    </ul> 
    <?php foreach ($rows as $key => $value) { ?>
        <div class="tab-content col-md-11">
            <div class="tab-pane active" id="competencia" align="justify"><?php echo $value[0] ?></div>
            <div class="tab-pane" id="metodologia" align="justify"><?php echo $value[1] ?></div>
            <div class="tab-pane" id="objetivo" align="justify"><?php echo $value[2] ?></div>
            <div class="tab-pane" id="sumilla" align="justify"><?php echo $value[3] ?></div>

        <input type="hidden" id="semestre" value="<?php echo $value[4] ?>"/>
        <input type="hidden" id="curso" value="<?php echo $value[5] ?>"/>
<!--        unidad inicio-->
        <div class="tab-pane"  id="unidad" align="justify">

            <div id="unidades">

            </div>

        </div>
<!--        unidad fin-->

        <div class="tab-pane" id="bibliografia">
            <input  type="hidden" id="curs" value="<?php echo $value[5] ;?>"/>
            <input type="hidden" id="semes" value="<?php echo $value[4] ; ?>">
            <?php foreach ($rows4 as $key => $value) {?>
                    <?php echo $value[0];?>
                <?php }?>
    
        </div>
        
<!--        edit inicio-->
        <div class="tab-pane" id="editar">

<!--            <
                        <input type="hidden" id="idunida" value="<?php echo $value[1]?>">
                        <

                
                        
            </div>-->
<br>
<br>
                    <div id="boton">
                        
                        <button  class="btn btn-primary btn-sm"  type="button"  id="editsy" onclick="editSylabus(<?php echo $value[6]?>)">Editar Silabus</button>
                        <button class="btn btn-primary btn-sm" type="button"  value="Unidades" id="unid" >Unidades</button><br>
            
                    </div>
                        <div id="uni">
                                 
                             </div>

                    <div id="editarsilabus">

                    </div>

                    <br>





        </div>
<div class="tab-pane" id="regresar">
    
</div>
<!--        edit fin-->

        </div>
        </div>
    <iframe class="recibS col-md-offset-1"src="" width="990" height="650"  style="display: none;" marginwidth="0" marginheight="0" frameborder="0" scrolling="no"> 
          
          </iframe>


        <?php } ?> 

    <?php } ?>
