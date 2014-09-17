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
<script>
    $(function() {
        $("#tabs").tabs();
    });
</script>
<script>
    function verMas(nombre, tema, periodo, jefe, escuela, estado, fecha, viabilidad, presupuesto, impactos,
            sinergias, tipoproy, facultad, lineain, ejetem, grupo, distrito, provincia, departamento, id) {
        $('#nombre').text(nombre);
        $('#tema').text(tema);
        $('#periodo').text(periodo);
        $('#jefe').text(jefe);
        $('#escuela').text(escuela);
        $('#estado').text(estado);
        $('#fecha').text(fecha);
        $('#viabilidad').text(viabilidad);
        $('#presupuesto').text(presupuesto);
        $('#impactos').text(impactos);
        $('#sinergias').text(sinergias);
        $('#tipoproy').text(tipoproy);
        $('#facultad').text(facultad);
        $('#lineain').text(lineain);
        $('#ejetem').text(ejetem);
        $('#grupo').text(grupo);
        $('#distrito').text(distrito);
        $('#provincia').text(provincia);
        $('#departamento').text(departamento);
        $('#id').text(id);

        $('#dialogo').dialog('open');
    }
    function Unirse(id2,idalumno) {
        $('#id2').text(id2);
        $('#idalumno').text(idalumno);
        $('#dialogo2').dialog('open');
    }
    
    function Unirse2(id3,idalumno3) {
        $('#id3').text(id3);
        $('#idalumno3').text(idalumno3);
        $('#dialogo3').dialog('open');
    }
</script>

<script>
    $(document).ready(function() {
        $("#dialogo").dialog({autoOpen: false});

        $('#dialogo').dialog({
            modal: true,
            show: 'explode',
            hide: 'explode'
        });
        $("#abrir").click(function(event) {
            $("#dialogo").dialog('open');
        });

    });
</script>

<script>
    $(document).ready(function() {
        $("#dialogo2").dialog({autoOpen: false});

        $('#dialogo2').dialog({
            modal: true,
            show: 'explode',
            hide: 'explode'

        });

        $("#abrir2").click(function(event) {
            $("#dialogo2").dialog('open');
        });
        $(".cerrar2").click(function(event) {
            $("#dialogo2").dialog('close');
        });
        
        $("#dialogo3").dialog({autoOpen: false});

        $('#dialogo3').dialog({
            modal: true,
            show: 'explode',
            hide: 'explode'

        });

        $("#abrir3").click(function(event) {
            $("#dialogo3").dialog('open');
        });
        $(".cerrar3").click(function(event) {
            $("#dialogo3").dialog('close');
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


<div id="dialogo2" style="" title="ACEPTAR">
        <form action="index.php" id="frm" method="POST">
            <input type="hidden" name="controller" value="solicitudes" />
            <input type="hidden" name="action" value="save" />
            <h2>DESEA ACEPTAR AL ALUMNO?</h2>
            <input type="hidden" name="estado" value="1">
            <textarea name="idproyecto" class="hidden"  id="id2"></textarea>
            <textarea name="idalumno" class="hidden" id="idalumno"></textarea>
            <br>
            
            <button type="submit" class="btn btn-success cerrar2">Aceptar</button>
            <button type="button" class="btn btn-danger cerrar2">Cancelar</button>
        </form>
    </div>
    <div id="dialogo3" style="" title="ACEPTAR">
        <form action="index.php" id="frm" method="POST">
            <input type="hidden" name="controller" value="solicitudes" />
            <input type="hidden" name="action" value="save" />
            <h2>DESEA RECHAZAR AL ALUMNO?</h2>
            <input type="hidden" name="estado" value="2">
            <textarea name="idproyecto" class="hidden"  id="id3"></textarea>
            <textarea name="idalumno" class="hidden" id="idalumno3"></textarea>
            <br>
            
            <button type="submit" class="btn btn-success cerrar3">Rechazar</button>
            <button type="button" class="btn btn-danger cerrar3">Cancelar</button>
        </form>
    </div>

<div id="solicitudes" style=" margin-left: 20px;">
    <?php if(count($rows)!=0){?>
    <table id="datatables" class="display">
        <thead>
            <tr>
                <th >ID PROYECTO</th>
                <th>NOMBRE  ALUMNO</th>
                <th>NOMBRE PROYECTO</th>
                <th>MENSAJE</th>
                <th>FECHA</th>
                <th >ID ALUMNO</th>
                <th>ACEPTAR</th>
                <th>RECHAZAR</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $key => $value) { ?>
                <tr>    
                    <td > 
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
                            <div id="abrir2" style="margin-left: 20px;">
                                <li style="margin: 2px;position: relative;padding: 4px 0;cursor: pointer;float: left;list-style: none; font-family: Calibri;" class="ui-state-default ui-corner-all" title=".ui-icon-circle-plus">
                                    <span style="float: left; margin: 0 4px; background-image: url(css/images/ui-icons_2e83ff_256x240.png);"class="ui-icon ui-icon-circle-check"
                                          onclick="Unirse('<?= strtoupper(utf8_encode($value[0])) ?>','<?= strtoupper(utf8_encode($value[5])) ?>')">
                                    </span>
                                </li>
                            </div> 
                            </div> 
                        </td>
                        <td>
                            <div id="abrir3" style="margin-left: 20px;">
                                <li style="margin: 2px;position: relative;padding: 4px 0;cursor: pointer;float: left;list-style: none; font-family: Calibri;" class="ui-state-default ui-corner-all" title="ui-icon-circle-close">
                                    <span style="float: left; margin: 0 4px; background-image: url(css/images/ui-icons_2e83ff_256x240.png);"class="ui-icon ui-icon-circle-close"
                                          onclick="Unirse2('<?= strtoupper(utf8_encode($value[0])) ?>','<?= strtoupper(utf8_encode($value[5])) ?>')">
                                    </span>
                                </li>
                            </div> 
                            
                        </td>

                </tr>  
            <?php } ?>
        </tbody>
    </table>
    <?php } else{echo 'NO TIENE NUEVAS SOLICITUDES';} ?>
</div>