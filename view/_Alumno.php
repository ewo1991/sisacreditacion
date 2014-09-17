<script>
    
    
    $(".ver").click(function() {
                 cadena = $(this).val();
                 var pedazo = cadena.split(",");
                 CodigoAlumno= pedazo[0];
                 idproyecto = pedazo[1];
                 NombreAlumno= pedazo[2];
                 NombreProyecto= pedazo[3];
                 
        popup('index.php?controller=notasproyecto&codalum='+CodigoAlumno+'&idproy='+idproyecto+'&nomalum='+NombreAlumno+'&nomproy='+NombreProyecto+'',900,200);
        $.post('index.php?controller=notasproyecto&action=mostrar_alumnos_asignados&codalum='+CodigoAlumno+'&idproy='+idproyecto+'&nomalum='+NombreAlumno+'',function (){
            
            
        });
      
    });</script>                
<table id="datatables" class="display" >
                    <thead >
                        <tr>
                           
                                
                            <th>ALUMNOS EN EL PROYECTO</th>
                            <?php  if($_SESSION['perfil'] == 'PROFESOR'){?>
                            <th>CALIFICAR</th>
                            <?php  }?>

                        </tr>
                    </thead>
                    <tbody>
                                <?php foreach ($rows as $key => $value) { ?>
                            <tr>    
                                
                                <td> 
                                    <?php echo strtoupper(utf8_encode($value[3])); ?>
                                </td>
                                <?php  if($_SESSION['perfil'] == 'PROFESOR'){?>
                                <td>
                                    <style>
                                       #alumslecc{ border-color: white; padding: 4px; background-color: #DA2949 ;} 
                                       #alumslecc:hover{ background-color: #CB26BD;} 
                                       #alumslecc:active{ background-color: #CB26BD;} 
                                    </style>
                                    <button type="button" title="Ver Alumnos" class="ver btn btn-success" name="ver"  id="alumslecc" value="<?php echo strtoupper(utf8_encode($value[4])); ?>,<?php echo $value[0]; ?>,<?php echo strtoupper(utf8_encode($value[3])); ?>,<?php echo strtoupper(utf8_encode($value[1])); ?>"><span class="glyphicon glyphicon-pencil"></span></button>
                                    
                                    
                                </td>
                                <?php  }?>
                            </tr>  
<?php } ?>
                    </tbody>
                </table>