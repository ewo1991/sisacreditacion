<?php $boton=$rows2;?>  
<?php if ($boton=='boton'){?>
    <div class="panel-group" id="accordion">
        <?php
$conta = 1;
            foreach ($rows as $key => $value) {
    ?>  
        <div class="panel panel-default col-md-9" id="reduc">
            <div class="panel-heading">

                <input type="hidden" id="idunidad" value="<?php echo $value[1]; ?>">
                <input type="hidden" class="semestre" value="<?php echo $value[2]?>"/>
                <input type="hidden" class="curso" value="<?php echo $value[3]?>"/>
                <h4 class="panel-title" id="hola">
<!--                   Boton Asistencia a clases -->
                   <input type="button" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $conta; ?>" class="codunidad<?php echo $value[1];?>" value="<?php echo $value[0] ?>" onclick="temasdUnidad('<?php echo $value[1]; ?>')"/>

                </h4>
               
            </div>
<!--            abre y  cierra el acordeon on  tema panel-collapse collapse (cerrado) al abrirse se combierte en tema panel-collapse collapse in(abierto) -->
<div id="<?php echo $conta; ?>"  class="tema panel-collapse collapse" name="<?php echo $value[1]; ?>">
                <div class="container-fluid" style="overflow-y: auto; height: 390px">
                    <div class="panel-body temas">    

                    </div>
                     
                </div>
               
            </div>
        </div>
        <?php $conta = $conta + 1;
        
    }
    ?>
        

<?php }else{?>
        
        
         <div class="panel-group" id="accordion">
        <?php
$conta = 1;
            foreach ($rows as $key => $value) {
    ?>  
        <div class="panel panel-default col-md-12">
            <div class="panel-heading">

                <input type="hidden" class="idunidad" value="<?php echo $value[1]; ?>">
                <h4 class="panel-title" id="hola">
                    
                    <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $conta; ?>" class="codunidad">
<!--                        idunidad <?php // echo $value[1];?>-->
                    <?php echo $value[0]; ?>
                    </a>
                    
                </h4>

            </div>
            <div id="<?php echo $conta; ?>"  class="tema panel-collapse collapse " name="<?php echo $value[1]; ?>">
                <div class="container-fluid" style="overflow-y: auto; height: 390px">
                    <div class="panel-body temas">    

                    </div>
                     
                </div>
               
            </div>
        </div>
        <?php $conta = $conta + 1;
    }
    ?>
        
<?php } ?>

 
