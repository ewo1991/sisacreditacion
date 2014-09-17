<script>
    
        notasum=0;
        for($i=1;$i<=4;$i++){
        peso=$("#peso"+$i).val();
        peso=parseInt(peso);
        nota=$("#nota"+$i).val();
        nota=parseInt(nota);
        pro=peso*nota;
            notasum=notasum+pro;
        }
        notaprom=notasum/100;
        
        $("#promfin").append(notaprom);
        
        
    
</script>
<div class="container-fluid" id="not">
                    <div > 
                        
                        <br>
                        <br>
                        <table class="table table-hover table-bordered" id="ola" >
                                <thead>
                                    <tr   style="background-color:#eaf8fc;" > 
                                       
                                        <td padding="25px 20px" rowspan="2">CONCEPTO</td>
                                        <td padding="25px 20px" rowspan="2">NOTA</td>
                                        <td padding="25px 20px" class="hidden" rowspan="2">PESO</td>
                                        
                                        
                                    </tr>
                                </thead>
                                <?php foreach ($rows as $key => $value) { ?>
                                    <tr>    
                                        
                                        <td>
                                            <?php echo strtoupper(utf8_encode($value[0])); ?>
                                        </td>
                                        <td>
                                            <?php echo strtoupper(utf8_encode($value[1])); ?>
                                            <input type="hidden" id="nota<?php echo strtoupper(utf8_encode($value[5]));?>" value="<?php echo strtoupper(utf8_encode($value[1])); ?>">
                                        </td>
                                        <td class="hidden">
                                            <input type="hidden" id="peso<?php echo strtoupper(utf8_encode($value[5]));?>" value="<?php echo strtoupper(utf8_encode($value[4])); ?>">
                                        </td>
                                        
                                        
                                    </tr>  
                                <?php } ?>
                                    <tr   style="background-color:#eaf8fc;" >
                                        <td padding="25px 20px" rowspan="2">NOTA FINAL</td>
                                        <td padding="25px 20px" rowspan="2"><div id="promfin"></div></td>
                                        <td class="hidden" padding="25px 20px" rowspan="2">NADA</td>
                                        
                                    </tr>


                            </table>
    
                    </div>
                            </DIV>

        <div class="tab-pane" id="notas">
            <button type="button" 
                    onclick="document.getElementById('notas').style.display = 'none', 
                            document.getElementById('listaproyecto').style.display = ''" 
                            class="btn btn-success">Regresar</button>
        </div>