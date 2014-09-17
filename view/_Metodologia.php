
<style>#tabladetalle td{height: 35px; padding-left: 5px;}</style>
        <div class="col-md-12">
                    <br>
                    <table id="tabladetalle" border="0" cellpadding="3" cellspacing="1" style="background-color: #F7F7F7; text-align: left;">
                        <tbody style=" font-size: 12px;">
                         <?php foreach ($rows as $key => $value) { ?>
                            <tr class="fil">
                                <td><span><strong>TIPO DE INVESTIGACIÓN : </strong></span></td>
                                <td> <?php echo strtoupper(utf8_encode($value[29])); ?></td>
                                <td><span><strong>NIVEL DE INVESTIGACIÓN : </strong></span></td>
                                <td> <?php echo strtoupper(utf8_encode($value[30])); ?></td>
                            </tr>
                                <tr class="fil">
                                    <td><span><strong>DISEÑO DE INVESTIGACIÓN : </strong></span></td>
                                    <td><?php echo strtoupper(utf8_encode($value[31])); ?></td>
                                     <td><span><strong>COBERTURA DE INVESTIGACIÓN : </strong></span> </td>
                                    <td><?php echo strtoupper(utf8_encode($value[32])); ?></td>
                                </tr>
                              
                                <tr class="fil">
                                    <td><span><strong>FUENTES DE INVESTIGACIÓN : </strong></span> </td>
                                    <td><?php echo strtoupper(utf8_encode($value[33])); ?></td>
                                    <td><span><strong>TECNICAS DE INVESTIGACIÓN : </strong></span> </td>
                                    <td><?php echo strtoupper(utf8_encode($value[34])); ?></td>
                                </tr>
                             
                                 <tr class="fil">
                                    <td><span><strong>INSTRUMENTOS DE INVESTIGACIÓN : </strong></span> </td>
                                    <td><?php echo strtoupper(utf8_encode($value[35])); ?></td>
                                       <td><span><strong>PRESENTACION DE DATOS : </strong></span> </td>
                                    <td><?php echo strtoupper(utf8_encode($value[36])); ?></td>
                                </tr>
                                
                                 <tr class="fil">
                                    <td><span><strong>ANALISIS DE DATOS : </strong></span> </td>
                                    <td><?php echo strtoupper(utf8_encode($value[37])); ?></td>
                                    <td><span><strong>INTERPRETACIÓN DE DATOS : </strong></span> </td>
                                    <td><?php echo strtoupper(utf8_encode($value[38])); ?></td>
                                </tr>                                
                             <?php } ?>
                        </tbody></table>
     </div> 


