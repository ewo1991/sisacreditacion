<br>
<div class="row">
                    

    <div class=" col-md-10  ">
<br>
 <div class='container-fluid' style="overflow-y: auto; height:270px; width: 650px">

 
        <table class="table table-hover table-bordered" >
           
            <tr>
                 <td>Practica Calificada 1</td> <td>Examen Parcial</td> <td>Practica Calificada 2</td> <td>Examen Final</td><td>Tutoria</td><td>Proyecto I.</td> <td>Promedio</td> 
            </tr>
           
            

                    
                <?php foreach ($rows as $key => $value) {  ?>
            <tr>
                 <td> <?php if ($_SESSION["idusuario"]=="201120701041"){
                     echo $nota=12;
                 }else{
                     if ($_SESSION["idusuario"]=="201110701033"){
                     echo $nota=13;
                 }else{
                     if ($_SESSION["idusuario"]=="201120701062"){
                     echo $nota=12;
                 }else {
                       if ($_SESSION["idusuario"]=="201110701003"){
                     echo $nota=13;
                     
                 }
                 }
                     
                 }}?>
                     </td> <td><?php echo $value[3];?></td> <td><?php echo $value[4];?></td> <td><?php echo $value[5]?></td> <td><?php if ($_SESSION["idusuario"]=="201120701041"){
                     echo $nota2=14;
                 }else{
                     if ($_SESSION["idusuario"]=="201110701033"){
                     echo $nota2=16.6;
                 }else{
                     if ($_SESSION["idusuario"]=="201120701062"){
                     echo $nota2=12.3;
                 }else {
                       if ($_SESSION["idusuario"]=="201110701003"){
                     echo $nota2=15;
                     
                 }
                 }
                     
                 }}?></td><td><?php if ($_SESSION["idusuario"]=="201120701041"){
                     echo $nota3=15;
                 }else{
                     if ($_SESSION["idusuario"]=="201110701033"){
                     echo $nota3=20;
                 }else{
                     if ($_SESSION["idusuario"]=="201120701062"){
                     echo $nota3=10;
                 }else {
                       if ($_SESSION["idusuario"]=="201110701003"){
                     echo $nota3=20;
                     
                 }
                 }
                     
                 }}?></td><td><?php echo ($nota2+$nota3)*0.1+$value[12]?></td>
            </tr>
                <?php }?>
</table>
         
      </div>
      </div>             
</div>