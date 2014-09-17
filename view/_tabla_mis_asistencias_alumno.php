<style type="text/css">
    .asignar{background: blue;border: 1px solid #fff;border-radius: 5px;color:#fff;height: 23px;font-weight:bold;font-size:12px; }
</style>
<?php $tamano=count($rows);$n=0;?>
<br>
<div class="row">
    <div align="center" >
       
        
        <table  class="table table-hover table-bordered" style="width:80%;" >
            <thead >
                <tr class="ui-widget-header tr-head"id="lista_profesores">
                    <th>CODIGO</th>
                    <th>TEMA</th>
                    <th>TIPO EVENTO</th>
                    <th>FECHA</th>
                    <th>ASISTENCIA</th>

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
                    <td>
                        <?php echo strtoupper(utf8_encode($value[2])); ?>
                    </td>
                    <td>
                        <?php echo strtoupper(utf8_encode($value[3])); ?>
                    </td>
                    <td>
                        <?php echo strtoupper(utf8_encode($value[4])); ?>
                    </td>                 

                </tr>  
            <?php }
                
            
                for($i=0;$i<(9-$tamano);$i++)
                {
                echo "<tr>";
                    for($a=0;$a<5;$a++)
                    {echo "<td>&nbsp;</td>";}
                echo "</tr>";
                }
            ?>
                  
                
        </table>
    </div>
</div>