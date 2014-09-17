<br>
<div class="row">
                    

    <div class="col-md-10" id="aumentar">
<br>
<br>  
<div class='container-fluid' style="overflow-y: auto; height:270px; width: 635px" id="grande">
     <form id="formnotas" method="post">
         
   

 
        <table class="table table-hover table-bordered" id="ola" >
           
            <thead>
   
      <tr   style="background-color:#eaf8fc;" > 
          <td padding="25px 20px" rowspan="2">CODIGO</td>
          <td padding="25px 20px" rowspan="2">NOMBRE</td>
          <?php $cont=0;foreach ($rows2 as $key => $value) { ?>
          <td padding="25px 20px" rowspan="2"><?php echo $value[7]?></td>
          <?php $cont=$cont+1;}?>
          <td padding="25px 20px" rowspan="2">Promedio</td>
          
          
            
    </tr>
       
  </thead>
   <?php foreach ($rows as $key => $value) { ?>
    <tr>    
        <td> 
            <?php echo $value[0]; $alumI=$value[0];?>
            <input type="hidden" class="codalumno" name="idalumno[]" value="<?php echo $value[0];?>"/>
             
                        
            
        </td>
        <td>
            <?php echo strtoupper(utf8_encode($value[1]));?>
        </td>
        <?php if (isset($rows2)){?>
        
         <?php foreach ($rows2 as $key => $value) { ?>
        <td class="campotext<?php echo $value[3]?>" name="<?php echo $value[3]?>">
            
            <div class="campo<?php echo $value[3]?>">
                
            </div>
               <?php foreach ($rows3 as $key => $value2) { ?>
                    <?php if($alumI==$value[0]){?>
             <?php echo $value2[1]?>
             
                    <?php } } ?>
            <div id="oli"></div>
                
             <input type="hidden" class="codevento" name="idevaluacion"value="<?php echo $value[3];?>" style=""/>
            <input type="hidden" class="codcurso" value="<?php echo $value[4];?>"/>
            <input type="hidden" class="codsemestre" value="<?php echo $value[5];?>"/>
            
            <div class="editarnota<?php echo $value[3];$notita="notita".$value[3];?>"></div>
           
            </td>
            
            
            
         <?php }?>
   <?php }else {?>
            
   <?php }?>
        <td>

            promedio
        </td>
       
    </tr>  
   
  <?php } ?>

 <tr>
        <td colspan="11">

<!--            <input  type="button" class="btn btn-primary btn-sm" class="enviarn" value="Enviar"/>-->
            <div class="button" id="enviarn">
                Enviar
            </div>
        </td>
    </tr>
    
   
</table>
         </form>
      </div>
      </div>             
    </div>
