<?php foreach ($rows as $key => $value) { ?>
   <?php if ($code != $value[0] ) { ?>
    <li value="<?php echo $value[0];?>"> <?php echo strtoupper($value[1]) ?> <li/>
 <?php } ?>
 <?php } ?>

