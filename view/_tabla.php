<style type="text/css">
    .asignar{background: blue;border: 1px solid #fff;border-radius: 5px;color:#fff;height: 23px;font-weight:bold;font-size:12px; }
</style>
<br>
<div class="row">
    <div  >
        <script>
            $(".asignar").click(function() {
                //            cod = $("#accion_asignar").find('.CodigoProfesor').val(); alert(cod);
                document.getElementById("grilla").style.visibility = 'visible';
                verificacion = $("#CodigoProfesor").val();
                Codigo_Semestre = $("#CodigoSemestre").val();
                document.getElementById("Codigo_Semestre").value = Codigo_Semestre;
                if (verificacion == "") {

                    cadena = $(this).val();
                    var pedazo = cadena.split(",");
                    profesor = pedazo[0];
                    CodigoProfesor = pedazo[1];
                    document.getElementById("CodigoProfesor").value = CodigoProfesor;
                    $("#prof").html('<label  id=profesor name="profesor" >' + profesor + '</label>');
                }
                else {
                    if (confirm("Esta seguro que desea cambiar el docente a asignar?"))
                    {

                        cadena = $(this).val();
                        var pedazo = cadena.split(",");
                        profesor = pedazo[0];
                        CodigoProfesor = pedazo[1];
                        document.getElementById("CodigoProfesor").value = CodigoProfesor;
                        $("#prof").html('<label  id=profesor name="profesor" >' + profesor + '</label>');
                    }
                }
                
               
            });
             $(".ver").click(function() {
                 cadena = $(this).val();Codigo_Semestre = $("#CodigoSemestre").val();
                 var pedazo = cadena.split(",");
                 profesor= pedazo[0];
                 CodigoProfesor = pedazo[1];
                 
                popup('index.php?controller=asignaciontutoria&action=mostrar_alumnos_asignados&prof='+profesor+'&CodigoProfesor='+CodigoProfesor+'&sem='+Codigo_Semestre,860,500);
        });
                 
             
        </script>
        
        <table  class="table table-hover table-bordered"  >
            <thead >
                <tr class="ui-widget-header tr-head"id="lista_profesores">
                    <th>CODIGO</th>
                    <th>DOCENTE</th>                
                    <th colspan="2">ACCION</th>
                </tr>
            </thead>
            <?php foreach ($rows as $key => $value) { ?>
                <tr>    
                    <td> 
                        <?php echo $value[0]; ?>
                    </td>
                    <td>
                        <?php echo strtoupper(utf8_encode($value[1])); ?>
                    </td>
                    <td><button title="Ver Alumnos" class="ver btn btn-success btn-xs" name="ver"  value="<?php echo strtoupper(utf8_encode($value[1])); ?>,<?php echo $value[0]; ?>" >Ver</button>

                    </td>
                    <?php if($modovista==false){?>
                    <td id="accion_asignar" >
                        <button title="Asignar Alumnos"  name="asignar" class="asignar"  value="<?php echo strtoupper(utf8_encode($value[1])); ?>,<?php echo $value[0]; ?>" >Asignar</button>

                    </td>
                   <?php }?>

                </tr>  
            <?php } ?>
        </table>
    </div>
</div>