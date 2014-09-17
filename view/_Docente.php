<div class="tab-pane" id="docentes">
    <table id="datatables" class="display">
        <thead>
            <tr>
              
                <th>DOCENTE EN EL PROYECTO</th>
                <th>FUNCION</th>


            </tr>
        </thead>
        <tbody>
              <?php foreach ($rows as $key => $value) { ?>
                            <tr>    
                                
                               
                                <td> 
                                    <?php echo strtoupper(utf8_encode($value[3])); ?>
                                </td>
                                   <td> 
                                    <?php echo strtoupper(utf8_encode($value[2])); ?>
                                </td>
                            </tr>  
<?php } ?>
                    </tbody>
    </table>
</div>