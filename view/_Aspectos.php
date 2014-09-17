<style>#tabladetalle td{height: 35px; padding-left: 5px;}</style>
<div class="col-md-12">
    <table id="tabladetalle" border="0" cellpadding="3" cellspacing="1" style="background-color: #F7F7F7;">
        <tbody style=" font-size: 14px;">
            <?php foreach ($rows as $key => $value) { ?>
                <tr class="fil">
                    <td><span><strong>ASIGNACIÓN DE RECURSOS : </strong></span></td>
                    <td><?php echo strtoupper(utf8_encode($value[40])); ?></td>
                </tr>
                <tr class="fil">
                    <td><span><strong>PRESUPUESTO DEL PROYECTO : </strong></span> </td>
                    <td><?php echo strtoupper(utf8_encode($value[39])); ?></td>
                </tr>
                <tr class="fil">
                    <td><span><strong>FINANCIAMIENTO : </strong></span> </td>
                    <td><?php echo strtoupper(utf8_encode($value[41])); ?></td>
                </tr>
            </tbody>
        <?php } ?>
    </table>
</div>