<?php include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_asistenciadocente.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<script>
    $(function() {
        $(".wrapper-search").html('');

    })
</script>
<div class="div_container">
    <h6 class="ui-widget-header">Asistencia Docente</h6>
    <div id="lista_eventos">
        <div class="col-lg-12">
            <div><span style="color:blue;font-size: 18px;">LISTA DE EVENTOS:</span>
                <div align="left">
                    <span id="tabla">

                        <?php echo $grilla; ?>
                    </span>


                </div>
            </div>
        </div>
    </div>

</div>
<div class="col-lg-12">
    <div id="lista">
        <form id="frm" action="index.php" method="POST">
            <input type="hidden" name="controller" value="asistenciadocente" />
            <input type="hidden" name="action" value="save" />
            <div class="contFrm ui-corner-all" style="background: #fff;">

                <fieldset class="ui-corner-all" >
                    <legend><label>LISTA DE DOCENTES EN EL EVENTO :</label> <label id="evento"></label></legend>  
                    <input type="hidden" id="idevento" name="idevento">
                    <input type="hidden" id="identificador_editar" name="identificador_editar">
                    <div id="lista_alumnos">
                    </div>

                </fieldset>
                <fieldset class="ui-corner-all" >
                    <legend>Accion</legend>
                    <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                        <a href="#" id="save" class="button">GRABAR</a>
                        <a href="index.php?controller=asistenciadocente" class="button">ATRAS</a>
                    </div>
                </fieldset>


            </div>
        </form>
    </div>
</div>
