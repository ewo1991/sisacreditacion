    <?php  include("../lib/functions.php"); ?>
<link rel="stylesheet"  type="text/css" href="css/bootstrap.min.css">
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/app/evt_form_eje_tematico.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>

<script>//
//    
//$(function(){
//        $('#frm').validate({
//            rules :{
//                
//                nombre_ejetematico: {
//                    required : true,
//                    minlength : 3,
//                    maxlength : 9
//                }
//            },
//            messages : {
//               nombre_ejetematico : {
//                    required : "Ingresa pues",
//                    minlength    : "Pocas letras",
//                    maxlength    : "muchas letras"
//                }
//            }
//        });    
//    });
</script>
<div class="div_container">
<h6 class="ui-widget-header">Registro de Eje Tematico</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="eje_tematico" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 550px; ">
               
            <fieldset class="ui-corner-all" >
                    <legend>Datos</legend>
                    <label for="idejetematico" class="labels" style="width:115px; ">Codigo:</label>
                    <input id="idejetematico" name="idejetematico" class="text ui-widget-content ui-corner-all" style=" width: 30px; text-align: left;" value="<?php echo $obj->idejetematico; ?>" readonly />
                    
                
                    <label for="nombre_grupo" class="labels" style="width: 60px;">Grupo:</label>
                    <?php echo $grupo; ?>
                    
                    <br/>
                    <div class="control-group"> 
                    <label for="nombre_ejetematico" class="labels"style="width: 280px;">Nombre Eje Tematico:</label>
                    <input id="nombre_ejetematico"  name="nombre_ejetematico" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->nombre_ejetematico; ?>" />
</div>      
        </div>
       </fieldset>
            <div style="margin:0 auto; width: 500px; height: 70px;">
            <fieldset class="ui-corner-all" >
            <legend>Accion</legend>
                <div  style="clear: both; padding: 4px; width: auto;text-align: center">
                    <button href="#" id="save" >GRABAR</button>
                    <a href="index.php?controller=eje_tematico" class="button">ATRAS</a>
                </div>
                </fieldset>
                </div>
        </div>
</form>
<script>
$(function(){
        $('#danilo').validate({
            rules :{
                
                danilo2: {
                    required : true,
                    minlength : 3,
                    maxlength : 9
                }
            },
            messages : {
               danilo2 : {
                    required : "Ingresa pues",
                    minlength    : "Pocas letras",
                    maxlength    : "muchas letras"
                }
            },
             highlight: function(element) {$(element).closest('.control-group').removeClass('success').addClass('error');},
	    success: function(element) {element.text('OK!').addClass('valid').closest('.control-group').removeClass('error').addClass('success');}
        });    
    });
</script>
<form class="form" style="font-family: Calibri;"  id="danilo">  
        <fieldset>  
          
          <div class="control-group">  
            <label class="control-label" for="input01">Nombre:</label>  
            <div class="controls">  
              <input type="text" class="input-xlarge" id="nombre" placeholder="Ingrese Nombre" name="danilo2">
            </div>  
          </div> 
          
          <div class="form-actions" >
            <button style="font-family: Calibri;"  class="btn btn-primary">DANILO</button>
          </div>
          
          
          
          
</form>

</div>