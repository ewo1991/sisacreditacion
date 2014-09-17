<?php
function printRadios($n,$items,$select="")
{
  $radios =  '<div style="display:inline" id="div_'.$n.'" >';
  $check = "";  
  foreach($items as $key => $val)
  {
      if(($key+1)==(int)$select){$check="checked";}
        else {$check="";}
      $radios .= '<input type="radio" id="r'.$n.($key+1).'" name="'.$n.'" value="'.($key+1).'" '.$check.' /><label for="r'.$n.($key+1).'">'.$val.'</label>';
  }
  $radios .= '</div>';
  echo $radios;
}

function activo($n,$select="")
{  
  $check = ""; 
  $items = array("Si","No");
  $radios =  '<div style="display:inline" id="div_'.$n.'" >';
  foreach($items as $key => $val)
  {
      if((1-$key)==$select){$check="checked";}
        else {$check="";}
      $radios .= '<input type="radio" id="r'.$n.(1-$key).'" name="'.$n.'" value="'.(1-$key).'" '.$check.' /><label for="r'.$n.(1-$key).'">'.$val.'</label>';
  }
  $radios .= '</div>';
  echo $radios;
}

function combo($n,$items,$select="",$d=false)
{
    $disabled = "";
    if($d){$disabled="disabled";}
        else {$disabled="";}
    if(strlen($n)==4){$zero = "00";}
    else {$zero="0";}
    $combo = '<select name="'.$zero.$n.'" id="'.$zero.$n.'" class="input_text" '.$disabled.' >';
    $combo .= '<option value="">::Seleccione::</option>';
   
    foreach($items as $key => $val)
    {
        if(($key+1)==$select){$combo .= '<option value="'.$val.'" selected="selected">'.$val.'</option>';}
           // else {$combo .= '<option value="'.$val.'">'.$val.'</option>';}
            else {$combo .= '<option value="'.($key+1).'">'.$val.'</option>';}
    }
    $combo .= '</select>';
    echo $combo;
}


function ffecha($fecha)
{
    if(strlen($fecha)>0){
    $nfecha = explode("-",$fecha);
    return $nfecha[2]."/".$nfecha[1]."/".$nfecha[0];
    }
    return "";
}
?>
