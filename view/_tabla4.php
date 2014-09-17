<script type="text/javascript" src="js/jquery.dataTables.js"></script>
<link href="css/demo_table.css" rel="stylesheet" type="text/css" />
<link href="css/demo_table_jui.css" rel="stylesheet" type="text/css" />
<link href="css/demo_page.css" rel="stylesheet" type="text/css" />
<link href="css/jquery.dataTables_themeroller.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-ui-1.10.3.custom.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.3.custom.min.js"></script>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $('#datatables').dataTable({
            "sPaginationType": "full_numbers",
            "aaSorting": [[0, "asc"]],
            "bJQueryUI": true

        });
    });
</script> 


<style>
    #dialogo table{
        background-color: #408B40;  
        font-family: Calibri;
    }
    #dialogo table thead tr th{
        text-align: center;
        color: white;

        font-size: 13px;
        border: 1px solid black;
    }
    #dialogo table tbody tr{
        background-color: #C6F2C6;
    }
    #dialogo table tbody tr td{
        border: 1px solid black;

        font-size: 13px;
    }
    #myTab a{
        color: #428bca;
    }

</style> 


<div id="dialogo2" title="UNIRSE">
    <form action="index.php" id="frm" method="POST">
        <input type="hidden" name="controller" value="listaproyecto" />
        <input type="hidden" name="action" value="save" />
        <h2>DESEAS UNIRTE?</h2><textarea name="idproyecto" class="hidden" id="id2"></textarea>
        <input type="hidden" name="idalumno" value="<?php echo $_SESSION['idusuario'] ?>">
        <textarea name="mensaje" class="form-control"></textarea>
        <span style="font-size: 10px; color: red">*Mensaje no es obligatorio</span>
        <br>
        <button type="submit" class="btn btn-success cerrar2">Aceptar</button>
        <button type="button" class="btn btn-danger cerrar2">Cancelar</button>
    </form>
</div>


<div id="solicitaproyectos" style=" margin-left: 20px;">
    <table id="datatables" class="display">
        <thead>
            <tr>
                <th class="hidden">ID</th>
                <th>NOMBRE</th>
                <th>TEMA</th>
                <th>PERIODO DE EJECUCION</th>
                <th>JEFE DEL PROYECTO</th>
                <th>ESCUELA</th>
                <th>ESTADO</th>
                <th >VER MAS</th>
                <?php if (isset($_SESSION["perfil"]) && ($_SESSION["perfil"] == 'ALUMNO')) { ?>
                    <th >UNIRSE</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $key => $value) { ?>

                <tr>  

                    <td class="hidden"> 
                        <?php echo strtoupper(utf8_encode($value[0])); ?>

                    </td>

                    <td> 
                        <?php echo strtoupper(utf8_encode($value[1])); ?>
                    </td>
                    <td>
                        <?php echo strtoupper(utf8_encode($value[2])); ?>
                    </td>
                    <td>
                        <?php echo strtoupper(utf8_encode($value[3])); ?>
                    </td>
                    <td>
                        <?php echo strtoupper(utf8_encode($value[4])); ?>
                    </td>
                    <td>
                        <?php echo strtoupper(utf8_encode($value[5])); ?>
                    </td>

                    <td>
                        <?php echo strtoupper(utf8_encode($value[6])); ?>
                    </td>

                    <td>

                        <div id="abrir" style="margin-left: 20px;">
                            <a><li id="<?= strtoupper(utf8_encode($value[0]))?>" style="margin: 2px;position: relative;padding: 4px 0;cursor: pointer;float: left;list-style: none; font-family: Calibri;" class="ui-state-default ui-corner-all" title=".ui-icon-circle-plus" >
                                    <span style="float: left; margin: 0 4px; background-image: url(css/images/ui-icons_2e83ff_256x240.png);"class="ui-icon ui-icon-circle-plus"
                                          onclick="verMas( '<?= strtoupper(utf8_encode($value[0])) ?>',
                                                          document.getElementById('detalleproyecto').style.display = '', document.getElementById('listaproyecto').style.display = 'none')"></span></li></a>
                        </div> 

                    </td>
                    <?php if (isset($_SESSION["perfil"]) && ($_SESSION["perfil"] == 'ALUMNO')) { ?>
                        <td>
                            <?php if(strtoupper(utf8_encode($value[16]))==1){; ?>
                            <div id="abrir2" style="margin-left: 20px;">
                                <li style="margin: 2px;position: relative;padding: 4px 0;cursor: pointer;float: left;list-style: none; font-family: Calibri;" class="ui-state-default ui-corner-all" title=".ui-icon-circle-plus">
                                    <span style="float: left; margin: 0 4px; background-image: url(css/images/ui-icons_2e83ff_256x240.png);"class="ui-icon ui-icon-circle-check"
                                          onclick="Unirse('<?= strtoupper(utf8_encode($value[0])) ?>')">
                                    </span>

                                </li>
                            </div> 
                            <?php }else {?>
                            <div style="margin-left: 20px;">
                                <a><li id="<?= strtoupper(utf8_encode($value[0]))?>" style="margin: 2px;position: relative;padding: 4px 0;cursor: pointer;float: left;list-style: none; font-family: Calibri;" class="ui-state-default ui-corner-all" title=".ui-icon-circle-plus" >
                                        <span style="float: left; margin: 0 4px; background-image: url(css/images/ui-icons_2e83ff_256x240.png);"class="ui-icon ui-icon-circle-check"
                                              onclick="alert('No puede unirse a un proyecto en marcha')"></span></li></a>
                            </div>
                        <?php }?>
                        </td>
                    <?php } ?>

                </tr>  
            <?php } ?>
        </tbody>
    </table>
</div>


<div id="detalleproyecto" style="display:none;">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <ul class="nav nav-tabs" id="myTab" style="font-family: Calibri; font-size: 12px">
            <li class="active"><a href="#generales" data-toggle="tab">DATOS GENERALES</a></li>
            <li><a  href="#planteamiento" data-toggle="tab">PLANTEAMIENTO DEL PROBLEMA</a></li>
            <li><a href="#objetivos" data-toggle="tab">OBJETIVOS</a></li>
            <li><a href="#marco" data-toggle="tab">MARCO TEORICO</a></li>
            <li><a href="#metodologia" data-toggle="tab">METODOLOGIA</a></li>
            <li><a href="#aspectos" data-toggle="tab">ASPECTOS ADMISTRATIVOS</a></li>
            <li><a href="#docentes" data-toggle="tab">DOCENTES</a></li>
            <li><a href="#alumnos" data-toggle="tab">ALUMNOS</a></li>
        </ul> 

        <div class="tab-content col-md-12" style="height: 300px;background-color: #F7F7F7; margin-bottom: 15px;font-family: Calibri;text-align: left;padding-left: 0; padding-right: 0; border-bottom:1px solid #ddd ; border-left: 1px solid #ddd;border-right:1px solid #ddd; border-radius: 4px;">
            <!---detalles generales--->
            <div class="tab-pane active" style="overflow-y: scroll; height: 300px;" id="generales">

            </div>
            <!---detalles generales--->

            <!---detalles ubigeo empieza----->
            <div class="tab-pane" id="planteamiento">

            </div>
            <!---detalles ubigeo termina----->


            <!---detalles objetivo empieza----->
            <div class="tab-pane" id="objetivos">

            </div>
            <!---detalles objetivo termina----->
            <!---detalles MARCO empieza----->
            <div class="tab-pane" id="marco">

            </div>
            <!---detalles MARCO termina----->

            <!---detalles metodologia empieza----->
            <div class="tab-pane" id="metodologia">

            </div>
            <!---detalles metodologia termina----->

            <!---detalles aspectos empieza----->
            <div class="tab-pane" id="aspectos">

            </div>
            <!---detalles aspectos termina----->

            <!---detalles profesor empieza----->
            <div class="tab-pane" id="docentes">

            </div>
            <!---detalles profesor termina----->

            <!---detalles alumnos empiesa----->
            <div class="tab-pane" id="alumnos" >

            </div>  
            <!---detalles alumnos fin----->

        </div>
        <div id='pdf'>

        </div>
        <div> 
            <button type="button" onclick="document.getElementById('detalleproyecto').style.display = 'none', document.getElementById('listaproyecto').style.display = ''" class="btn btn-success">Regresar</button>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a style="color: #ffffff; " class="btn btn-primary btn-sm" href="proyecto.pdf" TARGET="_blanc">PDF PROYECTO</a> 
        </div>

    </div>
</div>