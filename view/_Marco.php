
<style>#tabladetalle td{height: 35px; padding-left: 5px;}</style>
        <div class="col-md-12">
                    <br>
                    <table id="tabladetalle" border="0" cellpadding="3" cellspacing="1" style="background-color: #F7F7F7;">
                        <tbody style=" font-size: 14px;">
                         <?php foreach ($rows as $key => $value) { ?>
                            <tr class="fil">
                                <td><span><strong>ANTECEDENTES DE LA INVESTIGACIÓN : </strong></span></td>
                                <td> <?php echo strtoupper(utf8_encode($value[23])); ?></td>
                            </tr>
                            <tr class="fil">
                                <td><span><strong>DEFINICIÓN DE TERMINOS : </strong></span></td>
                                <td> <?php echo strtoupper(utf8_encode($value[24])); ?></td>
                            </tr>
                            <tr class="fil">
                                    <td><span><strong>BASES TEORICAS : </strong></span></td>
                                    <td><?php echo strtoupper(utf8_encode($value[25])); ?></td>
                                </tr>
                                <tr class="fil">
                                    <td><span><strong>HIPOTESIS : </strong></span> </td>
                                    <td><?php echo strtoupper(utf8_encode($value[26])); ?></td>
                                </tr>
                                <tr class="fil">
                                    <td><span><strong>SISTEMAS VARIABLES : </strong></span> </td>
                                    <td><?php echo strtoupper(utf8_encode($value[27])); ?></td>
                                </tr>
                                 <tr class="fil">
                                    <td><span><strong>ESCALA DE MEDICIÓN : </strong></span> </td>
                                    <td><?php echo strtoupper(utf8_encode($value[28])); ?></td>
                                </tr>
                                
                             <?php } ?>
                        </tbody></table>
     </div> 





