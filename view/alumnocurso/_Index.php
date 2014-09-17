<?php include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_alumnocurso.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>


<div class="div_container">
    <div class="row">
        
        <div  class="col-md-4" id="cursos">
         
        <div class=" panel-body" >
            
            <div> Semestre: <?php echo $semestreacademico; ?></div>
            <br>
            <div class="container-fluid" style="overflow-y: auto; height:356px;">
            <ul id="cursoalumno" style="padding-left:0px;">
                <?php echo $cursoalumno; ?>
            </br>
            </ul>  
        </div>       
        </div>
            </div>
        
        <div class="col-md-8" id="datos" >
            <div id="silabus">
                
            </div>
            
            <div id="notas">
                
            </div>
                   
        </div>
    
</div>
</div>
