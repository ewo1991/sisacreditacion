
<div class="table ">
<table >
<br>
<?php foreach ($rows as $key => $value) { ?> 
    
    <tr>
         
        <td><?php echo $value[0]?></td>
        <td><button class="btn btn-primary btn-xs" type="button" id="boton<?php echo $conta?>" value="Editar Unidad" onclick="edidUnidad(<?php echo $value[1]?>)">Editar Unidad</button></td>   
        <td><button class="btn btn-primary btn-xs" type="button"  value="Temas" id="vertema"> Ver Temas</button></td>
        <br>  
    </tr>
    
    
         <input type="hidden" id="codunidad" value="<?php echo $value[1]?>"/>
         

    
<?php }?>
</table>
    <br>
    <div id="tema">
             
         </div>
    
    
    </div>
<iframe class="recibU" src="" width="940" height="690"  style="display: none;" marginwidth="0" marginheight="0" frameborder="0" scrolling="no"> 
          
          </iframe>