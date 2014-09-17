<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="expires" content="0" />
<title>SIS-ACREDITACION</title>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>

<script type="text/javascript" src="js/bootstrap.min.js"></script>


<link type="text/css" href="css/jquery-ui-1.8.13.custom.css" rel="stylesheet" />
<link type="text/css" href="css/layout.css" rel="stylesheet" />
<link href="css/cssmenu.css" rel="stylesheet" type="text/css" />
<link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.13.custom.min.js"></script>    
<script type="text/javascript" src="js/menus.js"></script>
<script type="text/javascript" src="js/session.js"></script>
<link type="text/css" href="css/bootstrap.min.css" rel="stylesheet" />
<script type="text/javascript" src="js/required.js"></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<script type="text/javascript" src="js/utiles.js"></script>
<script language="javascript" type="text/javascript">
$(document).ready(function() {
    $.get('index.php','controller=Index&action=Menu',function(menu){         
            $("#menu").empty();
            var opciones_menu = menu;
            $("#menu").generaMenu(opciones_menu);},'json');
});  
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}


</script>

</head>
    <body style='background-image: url("css/images_eapisi/fondo.gif");'>
 
<div class="container">
            <div class="row">
                <div class="col-md-3" style="background-color: #5086C4; height: 50px;">
                    <div class="col-md-3" style="padding-left:0; padding-right: 0;">
                        <img src="css/images_eapisi/eapisi.png" width="75" height="50">
                    </div>
                    <div class="col-md-9" style="text-align: center; padding-right: 0; padding-top: 6px;font-size: 28px;" >
                        <p style="text-align: center; color: #fff"><strong style="text-align: center;"><?php echo utf8_encode($_SESSION['perfil']); ?></strong></p>
                    </div>
                    
                </div>
                <div class="col-md-9" style="height: 50px; padding-left: 0; padding-right: 0;" >
                    <div style="background-color: #269538; height: 30px;">
                        <p style="text-align: center; color: #fff; font-size: 20px;"><strong>"UNIVERSIDAD NACIONAL DE SAN MARTIN"</strong></p>
                    </div>
                    <div style="background-color: #9F3BAE; height: 20px;">
                       <p style="text-align: center; color: #fff"><strong>"Escuela Academica Profesional de Ingenieria de Sistemas e Informatica"</strong></p> 
                    </div>
                    
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-12" style="background-color: #81AFD0; height: 60px; padding-right: 0; border: 1px solid #B8B8B8;">
                    <div class="col-md-1">
                        <div style="margin-top: 3px;">
                            <img width="60" height="54" style="border-radius:5px;" src="css/images_eapisi/user.jpg"  alt="BOOZ">
                        </div>
                        
                    </div>
                    <div class="col-md-5" style=" height: 50px; margin-top: 5px;">
                        <div style="height: 24px; margin-bottom: 3px; padding-top: 2px;" >
                            <p style="text-align: center; color: #000; font-size: 14px; font-family: Calibri;"><strong>Usuario: <?php echo utf8_encode($_SESSION['name']); ?></strong></p>
                        </div>
                        <div style=" height: 24px; margin-bottom: 3px; padding-top: 2px;" >
                            <p style="text-align: center; color: #000;font-size: 14px; font-family: Calibri;"><strong>Perfil: <?php echo utf8_encode($_SESSION['perfil']); ?></strong></p>
                        </div>
                    </div>
                   
                    <div class="col-md-3" style="padding-top: 15px;">
                        <p href="#" style="font-family: Calibri; color: #fff !important;; text-align: right;"><?php setlocale(LC_ALL,"es_ES");$fechal=strftime("%A %d de %B del %Y"); $fechal=ucwords($fechal); echo $fechal;?></p>
                    </div>
                    
                    
                    <div class="col-md-1" style="padding-top: 10px;">
                        <button type="button"  class="btn btn-primary"><a href="http://localhost/sisacreditacion/">PORTAL</a></button>
                    </div>
                    <div class="col-md-2" style="padding-top: 15px;">
                        <a  style="font-family: Calibri; color: #fff; text-align: right;" href="index.php?controller=User&action=logout">Cerrar Session</a>
                    </div>
                    
                </div>
            </div>
     
               <!--..........-----------------------MENU---------------------.......-->
  
                    <div class="row">
                <div class="col-md-12" style="padding-left: 0; padding-right: 0;">

                <div class="navbar" id="menu2" role="navigation" style="margin-bottom: 0; min-height: 0;">
  <div  class="container-fluid" id="menu2-contenedor">

    <div  class="navbar-header">
      <button style="background-color:#D1C3D5;" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span style="background-color: #6A1981;" class="icon-bar"></span>
        <span style="background-color: #6A1981;" class="icon-bar"></span>
        <span style="background-color: #6A1981;" class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"></a>
    </div>

    <div class="collapse navbar-collapse" style="padding-left: 0;
padding-right: 0;" id="bs-example-navbar-collapse-1">
     <div id="menu"></div>
        
      
    </div>
  </div> 
</div>
 </div>
        </div> 
   
      <!--.............................MENU................................-->  
                       
        </div>
    
                    
                    
    
    
    
 
        <div class="container">
          
          
            <div class="row panel-body" style="padding-left:0; padding-right: 0; background-color: white; min-height: 400px;">
                                   
                    <div style="height: 1px; background: #8CA6BA; border:1px solid #63737E; border-bottom: 0; border-top: 0;"></div>
                    
                        <?php echo $content;?>
               
                </div>              
           
               </div>
        <div class="container" style="background: rgba(142,39,163,1);
background: -moz-linear-gradient(top, rgba(142,39,163,1) 0%, rgba(142,39,163,1) 7%, rgba(177,99,199,1) 36%, rgba(137,13,156,1) 60%, rgba(127,19,168,1) 77%, rgba(120,23,176,1) 88%);
background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(142,39,163,1)), color-stop(7%, rgba(142,39,163,1)), color-stop(36%, rgba(177,99,199,1)), color-stop(60%, rgba(137,13,156,1)), color-stop(77%, rgba(127,19,168,1)), color-stop(88%, rgba(120,23,176,1)));
background: -webkit-linear-gradient(top, rgba(142,39,163,1) 0%, rgba(142,39,163,1) 7%, rgba(177,99,199,1) 36%, rgba(137,13,156,1) 60%, rgba(127,19,168,1) 77%, rgba(120,23,176,1) 88%);
background: -o-linear-gradient(top, rgba(142,39,163,1) 0%, rgba(142,39,163,1) 7%, rgba(177,99,199,1) 36%, rgba(137,13,156,1) 60%, rgba(127,19,168,1) 77%, rgba(120,23,176,1) 88%);
background: -ms-linear-gradient(top, rgba(142,39,163,1) 0%, rgba(142,39,163,1) 7%, rgba(177,99,199,1) 36%, rgba(137,13,156,1) 60%, rgba(127,19,168,1) 77%, rgba(120,23,176,1) 88%);
background: linear-gradient(to bottom, rgba(142,39,163,1) 0%, rgba(142,39,163,1) 7%, rgba(177,99,199,1) 36%, rgba(137,13,156,1) 60%, rgba(127,19,168,1) 77%, rgba(120,23,176,1) 88%);
 height: 40px;" >
    
    
</div>


</body>
</html>