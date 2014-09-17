 
<?php $semestres=$_GET["semestre"];?>
            <?php echo "<script>alert('$semestres');</script>"?>
<option value="">......</option>
    <?php foreach ($rows as $key => $value) { ?>
        <?php if ($code != $value[0] ) { ?>
    <option value="<?php echo $value[0]; ?>"> <?php echo strtoupper($value[1]) ?> </option>
        <?php } else { ?>
            <option selected="selected" value="<?php echo $value[0]; ?>"> <?php echo $value[1]; ?> </option>
        <?php }  ?>
    <?php }?>


