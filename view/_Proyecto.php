<style>#tabladetalle td{height: 35px; padding-left: 5px;}</style>
<div class="col-md-12">
    <table id="datatables" border="0" cellpadding="3" cellspacing="1" style="background-color: #F7F7F7;">
        <tbody style=" font-size: 14px;">
            <?php foreach ($rows as $key => $value) { ?>
            <tr class="fil" >
                    <td><span><strong>DEFINICIÓN DEL PROBLEMA : </strong></span> </td>
                    <td><?php echo strtoupper(utf8_encode($value[22])); ?></td>
                </tr> 
            <?php } ?>
        </tbody>
    </table>
</div>

