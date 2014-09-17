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
    function Unirse(id2) {
        $('#id2').text(id2);
        $('#dialogo2').dialog('open');
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
        
        $(".nota").blur(function (){
            if($(this).val()==''){
                alert('no deje un campo libre');
                $(this).focus();
            }
            if($(this).val()>20){
                alert('Ingrese notas entre 0 y 20');
                $(this).focus();
            }
        });
        $(".nota").change(function() {
//                 
                 notafinal=0;
                 contador=$("#contador").val();
                 for(var i=0;i<contador;i++){
                     ip=i+1;
                     nota=$("#nota"+i).val();
                     peso=$("#peso"+ip).val();
                     
                     notaprom=parseInt(nota)*parseInt(peso)/100;
                     notafinal=notafinal+notaprom;
                 }
                 
                 
                 $("#notafinal").empty().append(notafinal);
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
<form action="index.php" id="frm" method="POST">
    <input type="hidden" name="controller" value="notasproyecto" />
    <input type="hidden" name="action" value="save" />
    <h6>NOTAS DEL ALUMNO: <?php echo $_GET['nomalum']; ?><br>
        EN EL PROYECTO : <?php echo $_GET['nomproy'];?></h6>  
    <input type="hidden" name="codalum" value="<?php echo $_GET['codalum'];?>">
    <input type="hidden" name="idproy" value="<?php echo $_GET['idproy'];?>">
<div id="notasproyecto" style=" margin-left: 20px;">
<table id="datatables" class="display">
        <thead>
            <tr>
               
                    <?php foreach ($rows as $key => $value) { ?>
                    
                    <td> 
                        <?php echo strtoupper(utf8_encode($value[1])); ?>
                        <input type="hidden" id="peso<?php echo strtoupper(utf8_encode($value[0])); ?>" value="<?php echo strtoupper(utf8_encode($value[2])); ?>">
                    </td>
                    
                    <?php  }?>
                    <td> 
                        Nota Final
                    </td>
                    <td> 
                        Accion
                    </td>
                
            </tr> 
                  
        </thead>
        <tbody>
            <tr>
            <?php for($i=0;$i<count($rows);$i++){?>
                <td>
                    <input type="text" name="nota<?php echo $i?>" id="nota<?php echo $i?>" class="nota" value="0" onkeypress="return permite(event,'num')">
                </td>
            <?php  }?>
                
                <td>
                    <input type="hidden" value="<?php echo $i?>" name="contador" id="contador">
                    <div  id="notafinal" >
                        
                    </div>
                </td>
                <td>
                    <a href="index.php?controller=notasproyecto" id="save"  class="button">Enviar nota</a>
                </td>
            </tr>
            
        </tbody>
    </table>
</div>
</form>