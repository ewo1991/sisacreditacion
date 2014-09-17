<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="expires" content="0" />
<title>ACREDITACION</title>
<link type="text/css" href="css/jquery-ui-1.8.13.custom.css" rel="stylesheet" />
<link type="text/css" href="css/layout.css" rel="stylesheet" />
<link href="css/cssmenu.css" rel="stylesheet" type="text/css" />
<link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.13.custom.min.js"></script>    
<script type="text/javascript" src="js/menus.js"></script>
<script type="text/javascript" src="js/session.js"></script>
<script type="text/javascript" src="js/required.js"></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<script type="text/javascript" src="js/utiles.js"></script>
</head>
<body>

<div id="templatemo_wrapper_outer">
	<div id="templatemo_wrapper">
		<div id="templatemo_content_wrapper_top">
		</div>
		<div id="templatemo_content_wrapper">
			<div id="content">
				<div class="full_width">            
					<div id="wrapp-cont" >
						                    
						<div class="cleaner">
						</div>            
						<div class="wrapper-login">
							<ul class="item-top">
								<li>
									<a href="#">Usuario: <?php echo $_SESSION['name']; ?></a>
								</li>
								<li>
									<a href="#">Perfil: <?php echo $_SESSION['perfil']; ?></a>
								</li>
								<li>
									<a href="#">Fecha: <?php echo date('d/m/Y'); ?></a>
								</li>
								<li>
									<a href="#">Sucursal Usuario: <?php echo $_SESSION['sucursal']; ?></a>
								</li>
							</ul>
							<div style="float:right">
								<a style="color:#000 !important;" href="index.php?controller=User&action=logout">Cerrar Session</a>
							</div>
						</div>
						<div style="height: 1px; background: #8CA6BA; border:1px solid #63737E; border-bottom: 0; border-top: 0;">
						</div>
						<div style="margin: 20px auto; padding-bottom: 10px; border: 1px solid #666; width: 400px;" class="ui-corner-all">
							<form name="frm" id="frm" action="process.php" method="post">
								<h4 class="ui-widget-header" style="margin-top: 0;">APERTURA DE CAJA DEL DIA DE HOY</h4>
                        		<input type="submit" name="ir" id="ir" value="Entrar" />
							</form>
						</div>
					</div>  
				</div>
			</div>
            <div class="cleaner">
			</div>            
         </div>            
         <div class="full_width">            
			<div style="height: 1px">
			</div>
            <div class="cleaner">
			 </div>            
         </div>            
     </div>        
</div>
</body>
</html>