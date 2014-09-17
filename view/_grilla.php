<script type="text/javascript" src="js/jquery.dataTables.js"></script>
<link href="css/demo_table.css" rel="stylesheet" type="text/css" />
<link href="css/demo_table_jui.css" rel="stylesheet" type="text/css" />
<link href="css/demo_page.css" rel="stylesheet" type="text/css" />
<link href="css/jquery.dataTables_themeroller.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-ui-1.10.3.custom.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.3.custom.min.js"></script>
<script type="text/javascript" charset="utf-8">
            $(document).ready(function(){
                $('#datatables').dataTable({
                    "sPaginationType":"full_numbers",
                    "aaSorting":[[0, "desc"]],
                    "bJQueryUI":true
                });
            });            
</script> 



<script type="text/javascript">
    $(function(){
        $( "#q" ).focus();
        
    });
    function delete_reg(controller,id)
    {
       if(confirm("Realmente deseas eliminar este registro"))
                {
                    href = "index.php?controller="+controller+"&action=delete&id="+id;
                    window.location = href;
                } 
    }
</script>
<style>.dataTables_paginate{display: none;}
.dataTables_filter{display: none;}
.dataTables_info{display: none;}</style>
<?php 
//    $action = "index";
//    if($edit==false && $view==false) {$action = "search";}
    $action = $_GET['action'];
    $controller = $_GET['controller'];
?>
<div class="contain">
<div class="wrapper-search" style="margin: 0 auto; width: 83%; margin-bottom: 10px;">
    <form action="" method="GET">
        <input type="hidden" name="controller" value="<?php echo $controller; ?>" />
        <input type="hidden" name="action" value="<?php echo $action; ?>" />
        <input type="hidden" name="fac" value="<?php echo $_GET['fac']; ?>" />
        <input type="hidden" name="p" value="1" />
        <?php // if($combo_search !=''){?>
        <div style="font-size: 12px;"><?php echo $combo_search; ?>
            
        <input type="text" name="q" id="q" class="text ui-widget-content ui-corner-all " value="<?php echo $_GET['q']; ?>" style="width: 50%; margin-left: 3px; margin-top: 5px; margin-bottom: 3px; " />
<!--        <input type="submit" value="Buscar" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-state-hover"   />-->
        <input type="submit" value="Buscar" class="btn btn-info" style="border:1px solid #1D4B73;"/>
       
     <?php if($new) { ?>
        <a href="index.php?controller=<?php echo $name; ?>&action=create" class="button"  > Nuevo </a>
        <?php } ?>
        <?php // } ?>
                
        </div>       
    </form>
</div>
  <div class="col-md-12">
<table id="datatables" class="display" style="width: 100%;">
    <thead>
        <tr>
            <?php foreach($cols as $c) { ?>
            <th ><?php echo strtoupper($c); ?></th>
             <?php } 
            if($edit) {echo '<th >&nbsp;</th>';}
            if($view) {echo '<th >&nbsp;</th>';}
            if($select) {echo '<th >&nbsp;</th>';}
            if($asig) {echo '<th >&nbsp;</th>';}
            if($chek) {echo '<th >&nbsp</th>';}
            ?>           
            </tr>
        </thead>
        <tbody >
        <?php 
        $n = 0;
         foreach ($rows as $value) { 
          $n ++;
           echo '<tr>';
            if($value['Estado']=='Falta'){
           $myselect = "<td align='center' width='5%'><a title='Seleccionar' href='javascript:get(";}
           else{$myselect = "<td align='center' width='5%' ><a  title='Ya Asignado' onclick=alert('Ya&nbsp;Asignado'); ";}
           $cont = count($cols);
              foreach($cols as $key => $c)
              { 
                  if($key==0){echo "<td class='td-".($key+1)."' align=center width=5%>".$value[$key]."</td>";}
                  else {echo "<td class='td-".($key+1)."'>".utf8_encode($value[$key])."</td>";}
                  if($cont==($key+1)) {$myselect .= '"'.trim($value[$key]).'"';}
                    else {$myselect .= '"'.trim($value[$key]).'",';}
              }
           if($value['Estado']=='Falta'){  $myselect .= ")'><img src='images/front.png' /></a></td>";}
            else {$myselect .= ")'><img src='images/error.png' /></a></td>";}
             
            if($edit) 
              {  if($presidente){echo "<td align='center' width='5%'><a href='index.php?controller=$name&action=edit&id=$value[0]' title='Editar'><img alt='' src='images/edit.png' /></a> </td>";}
                  else{
                            if($value['estado_modo_vista']==false){
                          ?>
                              <td align="center" width="5%" ><a href="index.php?controller=<?php echo $name; ?>&action=edit&id=<?php  echo $value[0]; ?>" title="Editar"><img alt="" src="images/edit.png" /></a></td>
                          <?php
                        }
                        else{echo "<td><img  src='images/error.png' title='No Editable' /></td>";}
                    }
              }
              
              if($view) {
                  if($presidente){echo"<td align='center' width='5%'><a href=javascript:delete_reg('$name','$value[0]') title='Eliminar'><img alt='' src='images/delete.png' /> </a></td>";}
                  else{
                            if($value['estado_modo_vista']==false){
                                    ?>
                                     <td align="center" width="5%"  ><a href="javascript:delete_reg('<?php echo $name; ?>','<?php  echo $value[0]; ?>')" title="Eliminar"><img alt="" src="images/delete.png" /></a></td>
                                    <?php 
                              }else{echo "<td></td>";}
                        }
                  }
              if($select) {
                  echo $myselect;
              }
              if($asig) 
              { 
                ?>
                   <td align="center" width="5%" ><button class="asig"name="asig" value="<?php  echo $value[0]; ?>,<?php  echo $value[1]; ?>"><img alt="" src="images/accept.png" /></button></td>
                <?php
              }
              if($chek) 
              { 
                if($value['Asistencias']=='Asistio'){$chekeds='checked';}else{$chekeds='';}
                ?>
                   <td align="center" width="5%" >
                       <input  type="checkbox" class="chek" name="chek[<?php echo $n; ?>]"id="chek[<?php echo $n; ?>]" style="cursor:pointer" value="1" <?php echo $chekeds;?> >
                       <input type="hidden" name="codigo_primera_columna[]" id="codigo_primera_columna[]" value="<?php  echo $value[0]; ?>" >
                   </td>
                <?php
              }
              echo '</tr>';
          } 
          
          for($i=0;$i<($nr-$n);$i++)
          {
            echo "<tr>";                    
            foreach($cols as $c) { ?>
              <th >&nbsp;</th>
            <?php } 
            if($edit) {echo '<th >&nbsp;</th>';}
            if($view) {echo '<th >&nbsp;</th>';}
            if($select) {echo '<th >&nbsp;</th>';}
            if($asig) {echo '<th >&nbsp;</th>';}
            if($check) {echo '<th >&nbsp;</th>';}
            if($chek) {echo '<th >&nbsp;</th>';}
            if($chek) {echo '<th >&nbsp;</th>';}
            echo "</tr>";
          }          
       ?>        
    </tbody>    
</table> 
</div>   
</div>
<?php echo $pag; ?>
