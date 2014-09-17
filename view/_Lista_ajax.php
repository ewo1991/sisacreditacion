
<div class="container-fluid" style="overflow-y: auto; min-height: 390px" id="byesyllabus">
<?php foreach ($rows as $key => $value) { ?>
<div id="listacurso">
        <div class="list-group">
            
            <br>
            <?php if(isset($_SESSION["perfil"]) && ($_SESSION["perfil"] == 'ALUMNO')){?>
            
            <a href="#" style="font-size:10px; background-color:#eaf8fc; cursor:default;" class="list-group-item "><b>CURSO:</b>&nbsp<?php echo utf8_encode(strtoupper($value[1])); ?></a>
            <a href="#" style="font-size:10px; cursor:default;" class="list-group-item">
             <b>Docente:</b>&nbsp<?php echo (utf8_encode(strtoupper($value[2]))); ?><BR>
            
            </a>
             
            <?PHP }?>
            
            <?php if(isset($_SESSION["perfil"]) && ($_SESSION["perfil"] == 'PROFESOR')){?>
            <a href="#" style="font-size:10px; background-color:#eaf8fc; cursor:default;" class="list-group-item "><b>CURSO:</b>&nbsp<?php echo utf8_encode(strtoupper($value[1])); ?></a>
            <a href="#" style="font-size:10px; cursor:default;" class="list-group-item"><b>CREDITOS:</b>&nbsp<?php $credito =(int)$value[3]; echo $credito; ?><BR>
            <b>Plan Curricular:</b>&nbsp<?php echo utf8_encode(strtoupper($value[4])); ?>
            </a>
             <?php }?>
            
            <span class="list-inline">
                <?php if(isset($_SESSION["perfil"]) && ($_SESSION["perfil"] == 'ALUMNO')){?>
                    
                <input  type="hidden" class="semestre" value="<?php echo $value[4]?>"/> 
                
                <input  type="hidden" class="curso" value="<?php echo $value[3]?>"/> 
                
                <a onclick="Ver('<?php echo $value[0];?>')" style="font-size:10px; align:center; padding:2px 2px ;" id="" name="" class="btn btn-primary btn-xs">syllabus</a>
                 <a onclick="VerSyllabus('<?php echo $_SESSION['idusuario'];?>','<?php echo $value[0];?>')" style="font-size:10px; align:center; padding:2px 2px ;" id="" name="" class="btn btn-primary btn-xs">notas</a>

          

              <?php }?>
            <?php if(isset($_SESSION["perfil"]) && ($_SESSION["perfil"] == 'PROFESOR')){?>

                <a onclick="Ver('<?php echo $value[0];?>')" style="font-size:10px; align:center; padding:2px 2px ;" id="" name="" class="btn btn-primary btn-xs">lista</a>
                <a onclick="VerRegistro('<?php echo $value[0];?>')" style="font-size:10px; align:center; padding:2px 2px ;" id="" name="" class="btn btn-primary btn-xs">registro</a>
                <a onclick="VerSi('<?php echo $value[0];?>')" style="font-size:10px; align:center; padding:2px 2px ;" id="" name="" class="btn btn-primary btn-xs">sylabus</a>
                <a onclick="VerAsistencia('<?php echo $value[0];?>')" style="font-size:10px; align:center; padding:2px 2px ;" id="" name="" class="btn btn-primary btn-xs">asistencia</a>

                 

             <?php }?>
            </span>
        </div>


    </div>  
<?php } ?>
</div>