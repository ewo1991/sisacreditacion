<script type="text/javascript">
    $(document).ready(function(){
        $("#q").focus();
    })
</script>
<div class="div_container">
<h6 class="ui-widget-header">Viajes Registrados</h6>
<div style="width: 20px; height: 20px; float: left; background: #4CB849; margin-left: 10px; margin-top: 10px;">&nbsp;</div> <div style=" margin-left: 5px; margin-top: 10px; float: left; padding-left: 2px;">Disponible para Venta</div>
<div style="width: 20px; height: 20px; float: left; background: #FCD209; margin-left: 10px; margin-top: 10px;">&nbsp;</div> <div style=" margin-left: 5px; margin-top: 10px; float: left; padding-left: 2px;">Viaje en curso</div>
<div style="width: 20px; height: 20px; float: left; background: #2E79BA; margin-left: 10px; margin-top: 10px;">&nbsp;</div> <div style=" margin-left: 5px; margin-top: 10px; float: left; padding-left: 2px;">Viaje Concluido (Llegado al Destino)</div>
<div style="width: 20px; height: 20px; float: left; background: #CCCCCC; margin-left: 10px; margin-top: 10px;">&nbsp;</div> <div style=" margin-left: 5px; margin-top: 10px; float: left; padding-left: 2px;">Viaje vencido</div>
<div style="clear: both"></div>
<div class="contain">
<div style="margin: 0 auto; width: 800px; margin-bottom: 10px;">
    <form action="" method="GET">
        <input type="hidden" name="controller" value="viaje" />
        <input type="hidden" name="action" value="index" />
        <input type="hidden" name="p" value="1" />        
        <select name="criterio">
            <option value="cronograma.origen" <?php if($_GET['criterio']=='cronograma.origen'){echo 'selected';} ?> >ORIGEN</option>
            <option value="cronograma.destino" <?php if($_GET['criterio']=='cronograma.destino'){echo 'selected';} ?> >DESTINO</option>
            <option value="viaje.fecha" <?php if($_GET['criterio']=='viaje.fecha'){echo 'selected';} ?> >FECHA</option>
            <option value="cronograma.horasalida" <?php if($_GET['criterio']=='cronograma.horasalida'){echo 'selected';} ?> >HORA SALIDA</option>
        </select>
        <input type="text" name="q" id="q" class="input_text ui-widget-content " value="<?php echo $query; ?>" style="width: 360px; margin-left: 3px; margin-top: 5px; margin-bottom: 3px; " />
        <input type="submit" value="Buscar" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-state-hover"   />
        <a href="index.php?controller=carga_academica&action=create" class="button" style="width: 5%" > Nuevo </a>
    </form>
</div>
<table class="ui-widget ui-widget-content" style="width: 800px; margin: 0 auto; " >
    <thead class="ui-widget ui-widget-content" >
        <tr class="ui-widget-header ">      
            <th >CODIGO</th>
            <th >ORIGEN</th>
            <th >DESTINO</th>
            <th >HORA SALIDA</th>
            <th >HORA LLEGADA</th>
            <th >BUSS</th>
            <th >FECHA</th>
            <th >ESTADO</th>
            <th >&nbsp;</th>
            <th >&nbsp;</th>
        </tr>
    </thead>
    <tbody >
        <?php foreach ($data['rows'] as $key => $value) { ?>
        <tr >
            <td align="center" ><?php  echo $value[0]; ?></td>
            <td ><?php  echo $value[1]; ?></td>
            <td ><?php  echo $value[2]; ?></td>
            <td align="center" ><?php  echo $value[3]; ?></td>
            <td align="center" ><?php  echo $value[4]; ?></td>
            <td><?php  echo $value[5]; ?></td>
            <td><?php  echo $value[6]; ?></td>            
            <td align="center"><div style="width: 20px; height: 20px; background: <?php  echo $value[7]; ?>"></div></td>            
            <?php if($value[8]=='1') {
                  if($value[7]!="#CCCCCC"){
             ?>
                <td align="center" width="5%" ><a href="index.php?controller=viaje&action=edit&id=<?php  echo $value[0]; ?>" title="Editar"><img alt="" src="images/edit.png" /></a></td>
                <td align="center" width="5%"  ><a href="javascript:delete_reg('viaje','<?php  echo $value[0]; ?>')" title="Eliminar"><img alt="" src="images/delete.png" /></a></td>
            <?php }
            else {
                ?>
                <td colspan="2">&nbsp;</td>
                <?php
            }
            } else { ?>            
            <td colspan="2" ><a target="_blank" href="index.php?controller=reportes&action=manifiesto_pasajeros&idviaje=<?php echo $value[0]; ?>" title="Ver manifiesto de pasajeros"><img alt="" src="images/page.png" />Manifiesto</a></td>
            
            <?php } ?>
        </tr>
        <?php  } ?>
    </tbody>
</table>
</div>
<?php echo $pag; ?>
</div>
