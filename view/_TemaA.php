
<table class="table table-striped " align="justify">
    <thead>
        <tr>
            <td rowspan="2" vertical-align="middle"><b>Semana</b></td>
            <td rowspan="2" vertical-align="middle"><b>Contenido</b></td>
            
            
        </tr> 
        
    </thead>
    <?php foreach ($rows as $key => $value) { ?>
        <tr >
            <td><?php echo strtoupper(utf8_encode($value[0]));?></td>
            <td><?php echo strtoupper(utf8_encode($value[1]));?></td>
            <td>
               
                <input type="hidden" class="idunidadT" value="<?php echo $value[7]?>"/>
                 <input type="hidden" class="fechaC" value="<?php echo $value[8]?>"/>
                <input type="hidden" class="idtemaC" value="<?php echo $value[9]?>"/>
                <input type="hidden" id="idclaseC" value="<?php echo $value[10]?>"/>

                     <?php date_default_timezone_set('UTC');
          $fechaA= date("Y-m-d");$fechaAsis=$value[8];
//          echo $fechaA;?>
            <?php if(isset($fechaAsis)){?>
                    <?php if ($fechaA==$fechaAsis){?>
                <input type="button" value="Asistencia" onclick="TemasClase(<?php echo $value[6];?>,<?php echo $value[10];?>)" class="idtemas" style="background: #008000;"/>
                    <?php }else{?>
                        <?php if ($fechaAsis>$fechaA){?>
                <input type="button" value="Asistencia" onclick="TemasClase('todavia')" class="idtemas" style="background: #DBFF70;"/>
                        <?php }else{if($fechaAsis<$fechaA){?>
                                            <input type="button" value="Asistencia" onclick="TemasClase('paso')" class="idtemas" style="background: #0063DC;"/>

                            <?php }?>
                    <?php }}?>
            <?php }else{?>
                       
                             <input type="button" value="Asistencia" class="idtemas" style="background: #900000;"/><br>
                             <div>No tiene fecha la clase</div>
                <?php }?>
            </td>
        </tr> 
                       
        <?php } ?>
<br>
</table>

<div id="verclase">
    
</div>





  
