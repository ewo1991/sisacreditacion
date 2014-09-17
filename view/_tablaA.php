<?php if ($opcion=="normal"){?>
<br>
<div class="row">
<div class=" col-md-11 " >
    <div class="container-fluid" style="overflow-y: auto; max-height: 520px; ">
        <table class="table table-hover table-bordered" id="ola" >
            <thead>
   
      <tr   style="background-color:#eaf8fc;" > 
          <td padding="25px 20px" rowspan="2">CODIGO</td>
          <td padding="25px 20px" rowspan="2">NOMBRE</td>

         <!-- <td padding="25px 20px" colspan="17" >SEMANAS</td>--> 
            
      </tr>
       
          
            

       

  </thead>
   <?php foreach ($rows as $key => $value) { ?>
    <tr>    
        <td> 
            <?php echo $value[0];?>
        </td>
        <td align="left">
            <?php echo strtoupper(utf8_encode($value[1]));?>
        </td>
        
        
    </tr>  
  <?php } ?>


</table>
<?php }else {
    if($opcion=="asistencia"){?>
        <br>
<div class="row">
<div class=" col-md-11 " >
    <div class="container-fluid" style="overflow-y: auto; max-height: 520px; ">
        <form id="formasis" method="post">
        <table class="table table-hover table-bordered" id="ola" align="center">
            <thead>
   
      <tr   style="background-color:#eaf8fc;" > 
          <td padding="25px 20px" rowspan="2">CODIGO</td>
          <td padding="25px 20px" rowspan="2">NOMBRE</td>
          <td padding="25px 20px" rowspan="2">ASISTENCIA</td>
          
          
            
    </tr>
       
  </thead>
   <?php foreach ($rows as $key => $value) { ?>
    <tr>    
        <td> 
            <?php echo $value[0];?>
            <input type="hidden" class="alumnos" id="<?php echo $value[0];?>" name="alumno[]" value="<?php echo $value[0];?>"/>
        </td>
        <td align="left">
            <?php echo strtoupper(utf8_encode($value[1]));?>
            <div class="daridclase">
                
            </div>
        </td>
 
        <td>
            Llego <input type="checkbox" id="asistio" class="asistencia" name="asisten[]" value="L" /> &nbsp; Llego tarde<input type="checkbox"id="llegoT" class="asistencia" name="asisten[]" value="LT"/>&nbsp; No llego <input type="checkbox" id="Nollego" class="asistencia" name="asisten[]" value="NT"/>
        </td>
        
    </tr>  
  <?php } ?>
    <tr><td colspan="3"><input type="button" value="Enviar" id="enviarA"/></td></tr>

</table>
            </form>
        <br>
        
<?php }}?>

<div id="asisss">
            
        </div>
