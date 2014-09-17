              
<table id="datatables" class="display" >
                    <thead >
                        <tr>
                           
                                
                            <th>ALUMNOS EN EL PROYECTO</th>
                        </tr>
                    </thead>
                    <tbody>
                                <?php foreach ($rows as $key => $value) { ?>
                            <tr>    
                                
                                <td> 
                                    <?php echo strtoupper(utf8_encode($value[3])); ?>
                                </td>
                          
                            </tr>  
<?php } ?>
                    </tbody>
                </table>