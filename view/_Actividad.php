<div class="container-fluid" id="acti">
                    <div > 
                        
                        <br>
                        <br>
                        <table class="table table-hover table-bordered" id="ola" >
                                <thead>
                                    <tr   style="background-color:#eaf8fc;" > 
                                       
                                        <td padding="25px 20px" rowspan="2">NOMBRE</td>
                                        <td padding="25px 20px" rowspan="2">FECHA INICIO</td>
                                        <td padding="25px 20px" rowspan="2">FECHA TERMINO</td>
                                        <?php if (isset($_SESSION["perfil"]) && ($_SESSION["perfil"] == 'PROFESOR')) { ?>
                                        <td padding="25px 20px" rowspan="2">ACCION</td>
                                         <?php } ?>
                                        
                                        <?php if (isset($_SESSION["perfil"]) && ($_SESSION["perfil"] == 'ALUMNO')) { ?>
                                        <td padding="25px 20px" rowspan="2">ACTIVIDAD</td>
                                      <?php } ?>
                                    </tr>
                                </thead>
                                <?php foreach ($rows as $key => $value) { ?>
                                    <tr>    
                                        
                                        <td>
                                            <?php echo strtoupper(utf8_encode($value[1])); ?>
                                        </td>
                                        <td>
                                            <?php echo strtoupper(utf8_encode($value[2])); ?>
                                        </td>
                                        <td>
                                            <?php echo strtoupper(utf8_encode($value[3])); ?>
                                        </td>
                                         <?php if (isset($_SESSION["perfil"]) && ($_SESSION["perfil"] == 'PROFESOR')) { ?>
                                        <td>
                                            <?php $fechaI=$value[2];?>
                                           <?php $fechaT=$value[3];?>
                                           <?php date_default_timezone_set('UTC');
                                           $fechaA= date("Y-m-d");?>   
                                            
                                                 <?php if ($fechaT > $fechaA && $fechaI < $fechaA) { ?>
                                                     <button class="btn btn-primary btn-xs" type="button"  value="Inactivo" style="background-color: red;">Inactivo</button>
                                                    <?php } if ($fechaI > $fechaA) {
                                                        ?>
                                                     <button id="edit" type="button" class="btn btn-primary btn-xs" onclick="window.location='index.php?controller=misproyectos&action=edit&id=<?php echo $value[0]?>'" value="Editar">Editar</button>
                                                    <?php } if ($fechaT < $fechaA) {?>
                                                        <button class="btn btn-primary btn-xs" type="button"  value="Inactivo" style="background-color: red;">Inactivo</button>
                                                    <?php }if ($fechaI == $fechaA) {?>
                                                        <button class="btn btn-primary btn-xs" type="button"  value="Inactivo" style="background-color: red;">Inactivo</button>
                                                 <?php } ?>
                                        </td>
                                         <?php } ?>
                                         <?php if (isset($_SESSION["perfil"]) && ($_SESSION["perfil"] == 'ALUMNO')) { ?>
                                         <td>
                                             <?php $fechaI=$value[2];?>
                                             <?php $fechaT=$value[3];?>
                                             <?php date_default_timezone_set('UTC');
                                                        $fechaA= date("Y-m-d");?>    
                                                  <?php if ($fechaT > $fechaA && $fechaI < $fechaA ) { 
                                                    echo 'En Curso';?>
                                                <?php } if($fechaI > $fechaA ){  echo 'Sin Empezar';?>
                                             <?php } if($fechaT < $fechaA) { echo 'Culminado'; ?>
                                              <?php }if($fechaI == $fechaA){ echo 'Iniciado';?>
                                             <?php }?>
                                        </td>
                                        <?php } ?>
                                    </tr>  
                                <?php } ?>


                            </table>
    
                    </div>
                            </DIV>

        <div class="tab-pane" id="actividades">
            <button type="button" 
                    onclick="document.getElementById('actividades').style.display = 'none', 
                            document.getElementById('listaproyecto').style.display = ''" 
                            class="btn btn-success">Regresar</button>
        </div>