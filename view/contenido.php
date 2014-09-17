<div class="row">
		<div class="col-md-8 panel-body" style="background-color:#75289A;">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  			<!-- Indicators -->
  				<ol class="carousel-indicators">
    				<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    				<li data-target="#carousel-example-generic" data-slide-to="1"></li>
    				<li data-target="#carousel-example-generic" data-slide-to="2"></li>
  				</ol>

  			<!-- Wrapper for slides -->
  	<div class="carousel-inner">
  		<?php 
  		$cont=1;
foreach ($rows as $key => $value) {
	if($cont==1){
echo '<div class="item active">
      				<img style="width: 800px; height:200px;" src="../web/images/'.$value[2].'" alt="...">
      				<div class="carousel-caption" style="text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">
                                    <b>'.$value[1].'</b>
      				</div>
   			 	</div>';
	}else{
		echo '<div class="item">
      				<img style="width: 800px; height:200px;" src="../web/images/'.$value[2].'" alt="...">
      				<div class="carousel-caption" style="text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">
                                    <b>'.$value[1].'</b>
      				</div>
   			 	</div>';
	}
	;

	$cont=$cont+1;
}
  		?>

    			
   			 	
   			 	
  			</div>
  			


  			<!-- Controls -->
  				<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
    				<span class="glyphicon glyphicon-chevron-left"></span>
 				 </a>
  				<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
   					<span class="glyphicon glyphicon-chevron-right"></span>
  				</a>
			</div>
		</div>
		<div class="col-md-4" style="background-color:#611c82;">
			<div style="">
            
            	<div style="clear: both;
	font-size: 18px;
	color: #fff;
	font-weight: bold;	
	padding: 0 0 10px 0;
	margin: 10px 0 15px 0; border-bottom:2px solid #2B0635;">NUESTROS PROYECTOS</div>
                
                <p style="font-size: 14px;
	line-height: 20px;
	color: #ffffff;
	margin-bottom: 20px; text-align:justify;">En la Universidad Nacional de San Martin emprende rigurosamente el rumbo hacia la acreditación,lo
				   en el cual presentan sus divesos proyectos n la Universidad Nacional de San Martin emprende rigurosamente</p>
                
              <div><button type="button" style="background-color:#CEACD7;color:#2B0635; font-weight: bold; border:2px solid #2B0635; margin-bottom: 15px;" class="btn btn-primary" data-toggle="button">Leer más</button></div>
            
            </div>
	</div>
	</div> 
    
 	<div class="row" style="background-color:#E9E9E9;">
           <!--noticias-->

            
         <?php
         
            		$i=1;
 echo '<div class="col-md-5">
                        <div class="col-md-6" style=" padding-right: 3px; padding-left: 10px; ">';
            	 $con=1; foreach ($rows3 as $key => $value) { 
                       if($con<=2){
 echo     '<div>
                    <div id="bloque_3_titgen" class="col-md-12">
                           
						<div id="bloque_2_tit" class="col-md-12" style=" padding-left: 0; padding-right: 0;">
						
						<h3 style="font-family:Calibri; font-size: 15px; color:white; text-align:left; margin-top:5px;">
								<a class="" href="">
								<b>'.utf8_encode(substr($value[1],0,49)).'...</b></a>
	                                            
						</h3>
						</div>
					</div>
					<div class="view view-first">
                                                        <IMG style="width:100%; height:110px;" src="../web/images/noticias/'.$value[3].'" ALT="">
							<div class="mask">
							<p>'.utf8_encode(substr($value[2],0,100)).' ...</p>
								<a href="#" class="info">LEER MAS</a>
							</div>
						</div>
					
                                                </div>';
       } $con=$con+1;}

 echo '</div>
       <div class="col-md-6" style=" padding-right: 3px; padding-left: 10px; ">';
 $con=1; foreach ($rows3 as $key => $value) { 
                       if($con>=3 && $con <=4){
                         echo     '<div>
                    <div id="bloque_3_titgen" class="col-md-12">
                           
						<div id="bloque_2_tit" class="col-md-12" style=" padding-left: 0; padding-right: 0;">
						
						<h3 style="font-family:Calibri; font-size: 15px; color:white; text-align:left; margin-top:5px;">
								<a class="" href="">
								<b>'.utf8_encode(substr($value[1],0,49)).'...</b></a>
	                                            
						</h3>
						</div>
					</div>
					<div class="view view-first">
							<img style="width:100%; height:110px;" src="../web/images/noticias/'.$value[3].'" alt="" />
							<div class="mask">
							<p>'.utf8_encode(substr($value[2],0,100)).' ...</p>
								<a href="#" class="info">LEER MAS</a>
							</div>
						</div>
					
                                                </div>';   
                       } $con=$con+1;}
      echo '</div></div>';
echo '
		<div class="col-md-5" style=" height:390px; padding-left: 3px;">';
$con=1; foreach ($rows3 as $key => $value) { 
                       if($con==5){
			 echo'<div><div id="bloque_2_titgen" class="col-md-12">
                           
					<div id="bloque_2_tit" class="col-md-12">
					
					<h3 style="font-family:Calibri; font-size: 22px; color:white; text-align:left; margin-top:5px;">
							<a class="" href="">
							<b>'.utf8_encode(substr($value[1],0,100)).'...</b></a>
					</h3>
					<h4 style="text-align : justify; font-family:Calibri; font-size: 12px; color:#CECFCF;">
						'.utf8_encode(substr($value[2],0,225)).'...
					</h4>
					</div>
					</div>
					
						<img style="width:100%; height:210px;" src="../web/images/noticias/'.$value[3].'"alt="">
					
                       </div>';}
$con=$con+1;}
		echo '</div> ';
 echo '<div class="col-md-2" style="height:390px; padding-left: 0; padding-right: 3px;" >';
$con=1; foreach ($rows3 as $key => $value) { 
                       if($con>=6 && $con <=7){

echo '
			
			    <div><div id="bloque_3_titgene" class="col-md-12">
                           
					<div id="bloque_2_tit" class="col-md-12" style=" padding-left: 0; padding-right: 0;">
					
					<h3 style="font-family:Calibri; font-size: 15px; color:white; text-align:left; margin-top:5px;">
							<a class="" href="">
							<b>'.utf8_encode(substr($value[1],0,48)).'...</b></a> 
					</h3>
					</div>
					</div>
					
						<div class="view2 view-first">
							<img style="width:100%; height:110px;" src="../web/images/noticias/'.$value[3].'" alt="" />
							<div class="mask">
							<p>'.utf8_encode(substr($value[2],0,120)).' ...</p>
								<a href="#" class="info">LEER MAS</a>
							</div>
						</div>
					
				</div>';

	   } $con=$con+1;}	
echo '</div>';
   ?>  
            
<!--noticias-->


	</div>
    <div class="row">
        <div class="col-md-12" style="background-color: #fff; padding-right: 3px; margin-top: 8px;">
            <div class="col-md-8" style="padding-left: 0; height: 680px; margin-top: 8px; margin-bottom: 8px; ">
                <div class="col-md-12" style="background-color: #FFF; height: 510px;">
                    <?php
                       foreach ($rows4 as $key => $value){
                    echo ' <div class="header_01">'.utf8_encode($value[1]).'</div>
                <p style="text-align: justify; font-family: Calibri; font-size: 13px;">'.utf8_encode($value[2]).'</p>
                <center><div class="section_01" style="background-color: #CFCFCF;">
                    <p style="text-align: center; font-style:italic;; font-size: 12px;">
					<strong>Misión </strong><br>
					
					<br>
'.utf8_encode($value[3]).'
					<BR><br>
					<strong>Visión </strong><br><br>
					'.utf8_encode($value[4]).'
					</p>               
                </div></center>
                <ul class="list_with_icon">
                	<li style="font-family: Calibri; font-size:12px;">Integer tempor, libero quis laoreet dapibus, quam mauris hendrerit  urna, vel feugiat dolor lectus non velit. Fusce at nisl libero, ac  fringilla risus.</li>
                    <li style="font-family: Calibri; font-size:12px;">Proin non velit nec enim volutpat euismod. Phasellus lorem velit, porttitor non iaculis in, euismod a metus. Nullam orci odio, dignissim a egestas ac.</li>
              </ul>';
						

                       }?>
               
            
                </div>
                
            </div>
           
            <div class="col-md-4" style="background-color: #E2E2E2; border: 1px solid #666666; padding-right: 0; padding-left: 0; height: 460px; margin-top: 8px; margin-bottom: 8px;">
                <div style="background: rgba(177,99,199,1);
background: -moz-linear-gradient(top, rgba(177,99,199,1) 0%, rgba(142,39,163,1) 0%, rgba(139,23,159,1) 36%, rgba(137,13,156,1) 60%, rgba(120,23,176,1) 99%);
background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(177,99,199,1)), color-stop(0%, rgba(142,39,163,1)), color-stop(36%, rgba(139,23,159,1)), color-stop(60%, rgba(137,13,156,1)), color-stop(99%, rgba(120,23,176,1)));
background: -webkit-linear-gradient(top, rgba(177,99,199,1) 0%, rgba(142,39,163,1) 0%, rgba(139,23,159,1) 36%, rgba(137,13,156,1) 60%, rgba(120,23,176,1) 99%);
background: -o-linear-gradient(top, rgba(177,99,199,1) 0%, rgba(142,39,163,1) 0%, rgba(139,23,159,1) 36%, rgba(137,13,156,1) 60%, rgba(120,23,176,1) 99%);
background: -ms-linear-gradient(top, rgba(177,99,199,1) 0%, rgba(142,39,163,1) 0%, rgba(139,23,159,1) 36%, rgba(137,13,156,1) 60%, rgba(120,23,176,1) 99%);
background: linear-gradient(to bottom, rgba(177,99,199,1) 0%, rgba(142,39,163,1) 0%, rgba(139,23,159,1) 36%, rgba(137,13,156,1) 60%, rgba(120,23,176,1) 99%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b163c7', endColorstr='#7817b0', GradientType=0 ); height: 40px;">
                 <p style="font:1.48em calibri, Arial; color: #fff;"><strong>NOTICIAS Y EVENTOS</strong></p>   
                </div>
                <!!--eventos-->
                <div style="height: 400px;width: 320px; overflow-y: auto; margin-top: 5px;">
                	
              
                	<?php
						foreach ($rows2 as $key => $value) 
						{

						?>
						<div class="news_section_2">
                    	<div class="news_date_2">
                        	<span><?php 
                        	$fecha = new DateTime($value[3]);
							echo $fecha->format("d");?></span> <span><?php  echo  strtoupper($fecha->format("M")); ?></span> 
                        	                        </div>
                        <div class="news_content_2">
                        	<div class="header_05_2"><a href="#"><?php echo utf8_encode($value[1]); ?></a></div>
                            <p style="font-size:12px; font-family: Calibri;"><?php echo utf8_encode(substr($value[2],0,100))."..."; ?></p>
                        </div>
                        
                        <div class="cleaner"></div>
                       
                        
                        </div>
                    <?php
						};

						?>
                    
					</div>
                 <!!--eventos-->
               <!--<?php if(!isset($_SESSION['user'])) { ?>
                <div class="section_w280 w280_bg" style="margin-bottom: 0px">                
                   <h2 class="portfolio" >Intranet</h2>                    
                    <form id="frmlogin" method="post"  action="web/process.php" >
                        <?php if($_GET['error']) {echo "<div style='color:red; text-align:center;'>MSG: Al parecer olvidÃ³ sus datos!</div>";} ?>
                        <label class="labels">Usuario :</label><input type="text" value="Ingresa Usuario" class="text ui-widget-content ui-corner-all" name="usuario" size="10" id="usuario" title="usuario" onfocus="clearText(this)" onblur="clearText(this)" /> <br/>
                        <label class="labels">Clave :</label><input type="password" value="" class="text ui-widget-content ui-corner-all" name="clave" size="10" id="clave" title="clave"  />                        
                        <br/><br/>
                        <input type="submit" id="ingresar" value="Ingresar" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" style="width: 90px; height: 23px; margin-left: 80px"   tabindex="3" />
                    </form>     
                </div>
                <?php } ?>-->
                
                <div style=" width: 320px; height: 190px; margin-top: 30px; padding-left: 45px;">
                    <p style="font:1.48em calibri, Arial; color: #530D61; margin-right: 45px;"><strong>INTRANET</strong></p>
                   
              <?php if(!isset($_SESSION['user'])) { ?>
                    <form id="frmlogin" method="post"  action="web/process.php">
                        <?php if($_GET['error']) {echo "<div style='color:red; text-align:center;'>MSG: Al parecer olvidÃ³ sus datos!</div>";} ?>
	<div id="block">
		<label id="user" for="name">p</label>
		<input type="text"  class="text ui-widget-content ui-corner-all" name="usuario" size="10" id="usuario" title="usuario" onfocus="clearText(this)" onblur="clearText(this)" placeholder="Usuario" required/>
		<label id="pass" for="password">k</label>
		<input type="password"value="" class="text ui-widget-content ui-corner-all" name="clave" size="10" id="clave" title="clave" placeholder="Password" required />
		<input type="submit" id="ingresar" value="a"/>
	</div>
</form>
                     <?php } ?>

                    <style>
/*                        @import url('http://fonts.googleapis.com/css?family=Open+Sans');*/
@font-face{
	src:url("http://dl.dropbox.com/u/94346812/cssdeck/fonts/pictos-regular-webfont.ttf") format("truetype"),
		url("http://dl.dropbox.com/u/94346812/cssdeck/fonts/pictos-regular-webfont.otf") format("opentype"),
		url("http://dl.dropbox.com/u/94346812/cssdeck/fonts/pictos-regular-webfont.svg") format("svg");
	font-family:icon;
}


label{
	font-family:icon;
	text-shadow:0 -1px 0 #666;
	-webkit-font-smoothing: antialiased; 
        
}
#block,#option{
	width:230px;
	height:113px;	
}
#block{
	background:#423143;
}
#block:before{
	content:'';
	display:block;
	width:230px;
	height:3px;
		/* The rainbow*/
	background:linear-gradient(left, rgba(173,107,173,1) 0%, rgba(173,107,173,1) 1%, rgba(181,121,168,1) 1%, rgba(181,126,181,1) 2%, rgba(181,126,181,1) 2%, rgba(189,136,187,1) 3%, rgba(189,136,187,1) 3%, rgba(197,151,181,1) 4%, rgba(197,151,181,1) 5%, rgba(206,165,194,1) 5%, rgba(206,165,194,1) 6%, rgba(214,178,194,1) 6%, rgba(214,178,194,1) 7%, rgba(222,189,189,1) 7%, rgba(222,189,189,1) 8%, rgba(222,197,197,1) 8%, rgba(222,197,197,1) 9%, rgba(229,210,200,1) 9%, rgba(229,210,200,1) 10%, rgba(241,230,197,1) 11%, rgba(241,230,197,1) 12%, rgba(247,247,197,1) 12%, rgba(247,247,197,1) 15%, rgba(236,247,194,1) 15%, rgba(236,247,194,1) 16%, rgba(230,239,189,1) 17%, rgba(230,239,189,1) 18%, rgba(222,239,183,1) 19%, rgba(222,239,183,1) 20%, rgba(212,239,176,1) 20%, rgba(212,239,176,1) 22%, rgba(201,230,165,1) 22%, rgba(201,230,165,1) 25%, rgba(186,230,158,1) 26%, rgba(186,230,158,1) 27%, rgba(182,225,147,1) 27%, rgba(182,225,147,1) 30%, rgba(169,222,140,1) 30%, rgba(169,222,140,1) 32%, rgba(160,222,132,1) 32%, rgba(160,222,132,1) 36%, rgba(156,214,147,1) 36%, rgba(156,214,147,1) 39%, rgba(148,214,161,1) 40%, rgba(148,214,161,1) 43%, rgba(148,214,174,1) 43%, rgba(148,214,174,1) 45%, rgba(148,206,186,1) 46%, rgba(148,206,186,1) 48%, rgba(140,206,197,1) 49%, rgba(140,206,197,1) 52%, rgba(140,206,212,1) 52%, rgba(140,206,212,1) 55%, rgba(140,195,221,1) 55%, rgba(140,195,221,1) 58%, rgba(148,179,210,1) 59%, rgba(148,179,210,1) 60%, rgba(156,173,206,1) 61%, rgba(156,167,197,1) 61%, rgba(156,167,197,1) 63%, rgba(165,154,189,1) 63%, rgba(165,154,189,1) 64%, rgba(169,148,181,1) 65%, rgba(169,148,181,1) 66%, rgba(173,134,175,1) 66%, rgba(173,134,175,1) 67%, rgba(181,121,168,1) 67%, rgba(181,121,168,1) 69%, rgba(189,115,156,1) 69%, rgba(189,115,156,1) 70%, rgba(196,102,146,1) 71%, rgba(196,102,146,1) 72%, rgba(200,88,143,1) 73%, rgba(200,88,143,1) 74%, rgba(206,80,132,1) 74%, rgba(206,80,132,1) 76%, rgba(214,64,123,1) 76%, rgba(214,64,123,1) 78%, rgba(220,59,114,1) 78%, rgba(220,59,114,1) 79%, rgba(222,48,110,1) 79%, rgba(222,48,110,1) 80%, rgba(232,42,107,1) 80%, rgba(232,42,107,1) 81%, rgba(230,33,99,1) 81%, rgba(230,33,99,1) 83%, rgba(232,42,107,1) 83%, rgba(232,42,107,1) 84%, rgba(222,48,110,1) 85%, rgba(222,48,110,1) 86%, rgba(220,59,114,1) 87%, rgba(220,59,114,1) 88%, rgba(214,64,123,1) 88%, rgba(214,64,123,1) 89%, rgba(206,66,130,1) 90%, rgba(206,66,130,1) 92%, rgba(199,74,141,1) 92%, rgba(199,74,141,1) 94%, rgba(189,82,148,1) 95%, rgba(189,82,148,1) 96%, rgba(184,90,158,1) 97%, rgba(184,90,158,1) 99%, rgba(181,99,165,1) 99%, rgba(181,99,165,1) 100%);

}
#block:after{
	content:'';
	display:block;
	width:15px;
	height:15px;
	background:#423143;
	transform:rotate(-45deg);
	margin:10px 18px;
	position:absolute;
}
#block label, #ingresar{
	position:absolute;
	width:33px;
	height:34px;
	background:#dedede;
	margin:14px -50px -75px -100px;
	text-align:center;
	line-height:2.2;
	color:#857487;
	border-top-left-radius:2px;
	border-bottom-left-radius:2px;
}
#block label#pass{
	position:absolute;
	width:33px;
	height:34px;
	background:#dedede;
	margin:-5px -50px -75px -100px;
}
#ingresar{
	border:0;
	margin:-28px -50px -75px 62px;
	border-top-left-radius:0px;
	border-bottom-left-radius:0px;
	border-top-right-radius:2px;
	border-bottom-right-radius:2px;
	font-family:icon;
	background:#ae6cac;
	text-shadow:0 -1px 0 #333;
		box-shadow:-1px 0 1px 0px #6c5b6d;
	font-size:12px;
	line-height:2.8;
	padding:0;
}
#ingresar:hover{
	color:#fff;
}
#user, #pass{
	box-shadow:0.1px 0 2px #6c5B6d;
}
#block input[type=text],#block  input[type=password], #option p {
	font-family:'Open Sans';
	font-weight:300;
	-webkit-font-smoothing: antialiased;
}
#block input[type=text],#block  input[type=password]{
	width:156px;
	height:32px;
	margin:15px 15px;
	border:0;
	border-radius:2px;
	outline:0;
	display:block;
	font-size:18px;
}
#block input[type=password]{
	width:156px;
	height:32px;
	margin:-5px 15px;
}
#ingresar{
	color:#fff;font-size:8px;font-weight:bold;
}
#option{
	width:230px;
	height:80px;
	overflow:hidden;
	margin:auto;
}
#option p{
	color:#6c5B6d;
	font-size:24px;
	text-transform:uppercase;
	padding:0px 18px;
	margin-top:15px;
	display:block;
	float:left;
	-webkit-font-smoothing: antialiased;
/*text-shadow:0 -1px 0 #000;*/	
}
#option a{
	-webkit-font-smoothing: antialiased;
	color:#6c5B6d;
	/*text-shadow:0 -1px 0 #000;*/
	font-size:12px;
	display:block;
	float:right;
	margin:26px 15px;
}

input{padding-left:40px;}
#block:active > #block:before{
	background-position:100px 100px;
}

/* placeholder */
::-webkit-input-placeholder {
	-webkit-font-smoothing: antialiased;
	color:#999;
	font-size:16px;
}
:-moz-input-placeholder {  
	color:#999;
	font-size:16px;
}

/* Want to see the magic ? So open a webkit browser then remove the comments below ! 

/!\ YOU NEED TO PLACE THIS IN INPUTS /!\

oninvalid="setCustomValidity('Custom Message')"
*/
/*
input::-webkit-validation-bubble-message {
	color:white;
	background: #e62163;
  border:0;
	border-radius:0;
	padding:0;
	width:55px;
	height:34px;
	position:absolute;
	float:left;
	margin:-33px 208px;
	text-align:center;
	line-height:2.7em;
	box-shadow:0 0 0;
}
input::-webkit-validation-bubble-message:before {
	content:"X";
	display:block;
	font-family:icon;
	color:white;
	background: #e62163;
  border:0;
	border-radius:0;
	padding:0;
	width:34px;
	height:34px;
	position:absolute;
	float:left;
	margin:0px -208px;
	text-align:center;
	line-height:2.7em;
	color: #fff;
	border-top-left-radius:2px;
	border-bottom-left-radius:2px;
	-webkit-font-smoothing: antialiased;

}
input::-webkit-validation-bubble-icon {
	display: none;
}
input::-webkit-validation-bubble-arrow {
	background: #e62163;
	border:0;
	width:10px;
	height:10px;
	position:absolute;
	margin:-23px 178px;
}*/
                    </style>
                </div>
                
                
                
            </div>
            
        </div>
    </div>
    <div class="row" style="margin-top:15px;">
        <p style="font:1.48em calibri, Arial; color: #530D61;"><strong>DESARROLLADORES DEL PROYECTO</strong></p>
    </div>
        <div class="row">
	<div class="col-md-12" style="margin-top: 10px;">
	<div class="mosaicflow" data-item-height-calculation="attribute" >
	<?php 
 foreach ($rows5 as $key => $value) {
 	echo '<div class="mosaicflow__item" >
			<img width="100" height="150" src="'.$value[1].'"  alt="ING VALLES">
			<p>'.$value[2].'</p>
		</div>';
 }
	?>
		
		


		</div>
	</div> 
	
	</div>
	


</html>