<div class="container-fluid" style="overflow-y: auto; height: 390px">
<table class="table">
    <?php foreach ($rows as $key => $value) { ?>
    <tr>
            <td><?php echo $value[1]?></td>
            <td><button class="btn btn-primary btn-xs" type="button" value="Editar Tema" onclick="edidTema(<?php echo $value[6]?>)">Editar Tema</button></td>
            
     </tr>   
        <?php } ?>


</table>
</div>

<iframe class="recibT" src="" width="940" height="690"  style="display: none;" marginwidth="0" marginheight="0" frameborder="0" scrolling="no"> 
          
          </iframe>


  
