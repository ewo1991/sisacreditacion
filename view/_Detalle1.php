


<style>#tabladetalle td{height: 35px; padding-left: 5px;}</style>
<div class="col-md-12">
    <table id="tabladetalle" border="0" cellpadding="3" cellspacing="1" style="background-color: #F7F7F7;">
        <tbody style=" font-size: 14px;">
            <?php foreach ($rows as $key => $value) { ?>
                <tr class="fil">
                    <td><span><strong>ANTECEDENTES DEL PROBLEMA : </strong></span></td>
                    <td><?php echo strtoupper(utf8_encode($value[16])); ?></td>
                </tr>
                <tr class="fil">
                    <td><span><strong>DEFINICIÓN DEL PROBLEMA : </strong></span> </td>
                    <td><?php echo strtoupper(utf8_encode($value[17])); ?></td>
                </tr>
                <tr class="fil">
                    <td><span><strong>FORMULACIÓN DEL PROBLEMA : </strong></span> </td>
                    <td><?php echo strtoupper(utf8_encode($value[18])); ?></td>
                </tr>
                <tr class="fil">
                    <td><span><strong>JUSTIFICACIÓN DEL PROBLEMA : </strong></span> </td>
                    <td><?php echo strtoupper(utf8_encode($value[19])); ?></td>
                </tr>
                <tr class="fil">
                    <td><span><strong>IMPORTANCIA DEL PROBLEMA : </strong></span> </td>
                    <td><?php echo strtoupper(utf8_encode($value[20])); ?></td>
                </tr>
                <tr class="fil">
                    <td><span><strong>LIMITACIONES : </strong></span> </td>
                    <td><?php echo strtoupper(utf8_encode($value[21])); ?></td>
                </tr>
            </tbody>
        <?php } ?>
    </table>
</div>