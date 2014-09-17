<?php $semestres=$_GET["semestre"];?>
<?php if(isset($semestres)){?>       
<select name="<?php echo $name; ?>" id="<?php echo $id; ?>" <?php echo $disabled; ?>  class="form-control" style="width: 100%;" >
    <option value="">......</option>
    <?php foreach ($rows as $key => $value) { ?>
        <?php if ($semestres != $value[0] ) { ?>
    <option value="<?php echo $value[0]; ?>"> <?php echo strtoupper(utf8_encode($value[1])) ?> </option>
        <?php } else { ?>
            <option selected="selected" value="<?php echo $value[0]; ?>"> <?php echo utf8_encode($value[1]); ?> </option>
        <?php }  ?>
    <?php } ?>
</select>
<?php }else{?>


<select name="<?php echo $name; ?>" id="<?php echo $id; ?>" <?php echo $disabled; ?>  class="form-control" style="width: 100%;" >
    <option value="">......</option>
    <?php foreach ($rows as $key => $value) { ?>
        <?php if ($code != $value[0] ) { ?>
    <option value="<?php echo $value[0]; ?>"> <?php echo strtoupper(utf8_encode($value[1])) ?> </option>
        <?php } else { ?>
            <option selected="selected" value="<?php echo $value[0]; ?>"> <?php echo utf8_encode($value[1]); ?> </option>
        <?php }  ?>
    <?php } ?>
</select>

<?php } ?>

