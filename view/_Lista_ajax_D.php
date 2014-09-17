
<div class="container-fluid" style="overflow-y: auto; min-height: 390px">
<?php foreach ($rows as $key => $value) { ?>
<div id="listacurso">
        <div class="list-group">
            <br>
            <a href="#" style="font-size:10px; background-color:#eaf8fc" class="list-group-item "><strong>CURSO:</strong>&nbsp<?php echo utf8_encode(strtoupper($value[2])); ?></a>
            <a href="#" style="font-size:10px;" class="list-group-item"><strong>DOCENTE:</strong>&nbsp<?php echo utf8_encode(strtoupper($value[1])); ?></a>
            <span class="list-inline">
                <a onclick="verLista('<?php echo $value[0];?>')" style="font-size:10px;" id="" name="" class="btn btn-primary btn-xs">Listado</a>
                <!--if con session -->
                <a style="font-size:10px;" class="btn btn-success btn-xs">Listado</a>
                <a style="font-size:10px;" class="btn btn-info btn-xs">Registro</a>
                <a style="font-size:10px;" class="btn btn-info btn-xs">Plan - Clase</a>
                 <?php // if(isset($_SESSION["perfil"]) && ($_SESSION["perfil"] == 'ADMIN')){?>
                <a style="font-size:10px;" class="btn btn-info btn-xs">Info1</a>
                <a style="font-size:10px;" class="btn btn-info btn-xs">Info2</a>
                 <?php // }?>
            </span>
        </div>


    </div>  
<?php } ?>
</div>