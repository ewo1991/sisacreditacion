
<style>#tabladetalle td{height: 35px; padding-left: 5px;}</style>
        <div class="col-md-12">
                    <br>
                    <table id="tabladetalle" border="0" cellpadding="3" cellspacing="1" style="background-color: #F7F7F7;">
                        <tbody style=" font-size: 14px;">
                         <?php foreach ($rows as $key => $value) { ?>
                            <tr class="fil">
                                <td><span><strong>NOMBRE PROYECTO : </strong></span></td>
                                <td> <?php echo strtoupper(utf8_encode($value[1])); ?></td>
                            </tr>
                            <tr class="fil">
                                <td><span><strong>PERIODO EJECUCION : </strong></span></td>
                                <td> <?php echo strtoupper(utf8_encode($value[2])); ?></td>
                            </tr>
                            <tr class="fil">
                                    <td><span><strong>DEPARTAMENTO : </strong></span></td>
                                    <td><?php echo strtoupper(utf8_encode($value[15])); ?></td>
                                </tr>
                                <tr class="fil">
                                    <td><span><strong>PROVINCIA : </strong></span> </td>
                                    <td><?php echo strtoupper(utf8_encode($value[14])); ?></td>
                                </tr>
                                <tr class="fil">
                                    <td><span><strong>DISTRITO : </strong></span> </td>
                                    <td><?php echo strtoupper(utf8_encode($value[13])); ?></td>
                                </tr>
                                 <tr class="fil">
                                    <td><span><strong>FACULTAD : </strong></span> </td>
                                    <td><?php echo strtoupper(utf8_encode($value[9])); ?></td>
                                </tr>
                                <tr class="fil">
                                    <td><span><strong>LINEA INVESTIGACION : </strong></span> </td>
                                    <td><?php echo strtoupper(utf8_encode($value[10])); ?></td>
                                </tr>
                           
                             <?php } ?>
                        </tbody></table>
     </div> 


