
<table class="table table-striped " align="justify">
    <thead>
        <tr>
            <td rowspan="2" vertical-align="middle"><b>Semana</b></td>
            <td rowspan="2" vertical-align="middle"><b>Contenido</b></td>
            <td rowspan="2" vertical-align="middle"><b>Concepto</b></td>
            <td rowspan="2" vertical-align="middle"><b>Procedimiento</b></td>
              <td rowspan="2" vertical-align="middle"><b>Actitudinal</b></td>
            
            <td rowspan="2" vertical-align="middle"><b>Competencia</b></td>
        </tr> 
        <tr>
            
          
        </tr>
    </thead>
    <?php foreach ($rows as $key => $value) { ?>
        <tr >
            <td><?php echo strtoupper(utf8_encode($value[0]));?></td>
            <td><?php echo strtoupper(utf8_encode($value[1]));?></td>
            <td><?php echo strtoupper(utf8_encode($value[2]));?></td>
            <td><?php echo strtoupper(utf8_encode($value[3]));?></td>
            <td><?php echo strtoupper(utf8_encode($value[4]));?></td>
            <td><?php echo strtoupper(utf8_encode($value[5]));?></td>
        </tr> 
        <?php } ?>
<br>
</table>





  
