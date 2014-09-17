 <?php include '../lib/fpdf/html2fpdf.php';?>




<?php ob_start();?>
<page>
    <h2 align="center"><p>UNIVERSIDAD NACIONAL DE SAN MARTIN - T</p></h2>
    <h2 align="center">FACULTAD DE INGENIERIA DE SISTEMAS E INFORMATICA</h2>
    <h4 align="center">ESCUELA ACADEMICA PROFESIONAL DE INGENIERIA DE SISTEMAS E INFORMATICA</h4>
   
</page>
<page>
</page>
        <div class="col-md-12">
                    <br>
                    <table id="tabladetalle" border="0" style="background-color: #F7F7F7;">
                        <tbody style=" font-size: 14px; text-align: left">
                           
                         <?php foreach ($rows as $key => $value) { ?>
                            <tr class="fil">
                                 <td>1.- DATOS GENERALES</td>  
                            </tr>
                            <tr class="fil">
                                 <td>1.1 NOMBRE DE PROYECTO : <?php echo strtoupper(utf8_encode($value[1])); ?> </td>  
                            </tr>
                          
                            <tr class="fil">
                                <td><span>1.2 PERIODO EJECUCION &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:  <?php echo strtoupper(utf8_encode($value[2])); ?></span></td>
                                
                            </tr>
                            <tr class="fil">
                                    <td><span>1.3 UBICACION GEOGRAFICA &nbsp;&nbsp;: </span></td>
                                    
                                </tr>
                                <tr class="fil">
                                    <td> El proyecto se encuentra ubicado en el Departamento de <?php echo strtoupper(utf8_encode($value[15]));?>
                                        , en la Provincia de <?php echo strtoupper(utf8_encode($value[14])); ?> y en el distrito de <?php echo strtoupper(utf8_encode($value[13])); ?>
                                    </td>
                                   
                                </tr>
                                <tr class="fil">
                                    <td><span>1.4 FACULTAD : </span> </td>  
                                </tr>
                                 <tr class="fil">
                                    <td> El Proyecto esta desarrolado por la Facultad de <?php echo strtoupper(utf8_encode($value[9])); ?></td>
                                </tr>
                                <tr class="fil">
                                    <td><span>1.5 LINEA INVESTIGACION : </span> </td>
                                    
                                </tr>
                                <tr class="fil">
                                    <td> El proyecto tiene unalinea de investigacion que es la siguiente <?php echo strtoupper(utf8_encode($value[10])); ?></td>
                                </tr>
                                <tr class="fil">
                                    <td>2.- PLANTEAMIENTO DEL PROBLEMA</td>
                                </tr>
                                 <tr class="fil">
                                   <td><span>2.1 ANTECEDENTES DEL PROBLEMA : <?php echo strtoupper(utf8_encode($value[16])); ?></span></td>
                                      
                                     </tr>
                                     <tr class="fil">
                                         <td><span>2.2 DEFINICION DEL PROBLEMA : <?php echo strtoupper(utf8_encode($value[17])); ?></span> </td>
                                         
                                     </tr>
                                     <tr class="fil">
                                         <td><span>2.3 FORMULACION DEL PROBLEMA : <?php echo strtoupper(utf8_encode($value[18])); ?></span> </td>
                                         
                                     </tr>
                                    
                                     <tr class="fil">
                                         <td><span>2.4 JUSTIFICACION DEL PROBLEMA : <?php echo strtoupper(utf8_encode($value[19])); ?></span> </td>
                                        
                                     </tr>
                                     <tr class="fil">
                                         <td><span>2.5 IMPORTANCIA DEL PROBLEMA : <?php echo strtoupper(utf8_encode($value[20])); ?> </span> </td>
                                        
                                     </tr>
                                     <tr class="fil">
                                         <td><span>2.6 LIMITACIONES : <?php echo strtoupper(utf8_encode($value[21])); ?> </span> </td>
                                         
                                     </tr>
                                     <tr class="fil">
                                         <td><span>3.- MARCO TEORICO CONCEPTUAL</span> </td>
                                         
                                     </tr>
                                       <tr class="fil" >
                                           <td><span>3.1 DEFINICION DEL PROBLEMA : <?php echo strtoupper(utf8_encode($value[22])); ?></span> </td>
                                           
                                        </tr> 
                                        
                                        <tr class="fil">
                                                <td><span>3.2 ANTECEDENTES DE LA INVESTIGACION : <?php echo strtoupper(utf8_encode($value[23])); ?></span></td>
                                              
                                            </tr>
                                            <tr class="fil">
                                                <td><span>3.3 DEFINICION DE TERMINOS : <?php echo strtoupper(utf8_encode($value[24])); ?> </span></td>
                                               
                                            </tr>
                                            <tr class="fil">
                                                <td><span>3.4 BASES TEORICAS : <?php echo strtoupper(utf8_encode($value[25])); ?></span></td>
                                                
                                            </tr>
                                            <tr class="fil">
                                                <td><span>3.5 HIPOTESIS : <?php echo strtoupper(utf8_encode($value[26])); ?> </span> </td>
                                              
                                            </tr>
                                            <tr class="fil">
                                                <td><span>3.6 SISTEMAS VARIABLES : <?php echo strtoupper(utf8_encode($value[27])); ?> </span> </td>
                                               
                                            </tr>
                                            <tr class="fil">
                                                <td><span>3.7 ESCALA DE MEDICION : <?php echo strtoupper(utf8_encode($value[28])); ?> </span> </td>
                                               
                                            </tr>
                                             <tr class="fil">
                                                <td><span>4.- METODOLOGIA DE INVESTIGACION </span> </td>
                                               
                                            </tr>
                                            <tr class="fil">
                                                    <td><span>4.1 TIPO DE INVESTIGACION : <?php echo strtoupper(utf8_encode($value[29])); ?></span></td>
                                                    
                                                </tr>
                                            <tr class="fil">
                                                    <td><span>4.2 NIVEL DE INVESTIGACION : <?php echo strtoupper(utf8_encode($value[30])); ?></span></td>
                                                    
                                                </tr>
                                                <tr class="fil">
                                                    <td><span>4.3 DISEÑO DE INVESTIGACION : <?php echo strtoupper(utf8_encode($value[31])); ?></span></td>
                                                   
                                                 </tr>
                                            <tr class="fil">
                                                    <td><span>4.4 COBERTURA DE INVESTIGACION :<?php echo strtoupper(utf8_encode($value[32])); ?> </span> </td>
                                                    
                                                </tr>

                                                <tr class="fil">
                                                    <td><span>4.5 FUENTES DE INVESTIGACION : <?php echo strtoupper(utf8_encode($value[33])); ?> </span> </td>
                                                    
                                                </tr>
                                                <tr class="fil">
                                                    <td><span>4.6 TECNICAS DE INVESTIGACION : <?php echo strtoupper(utf8_encode($value[34])); ?></span> </td>
                                                  
                                                </tr>

                                                <tr class="fil">
                                                    <td><span>4.7 INSTRUMENTOS DE INVESTIGACIÓN : <?php echo strtoupper(utf8_encode($value[35])); ?></span> </td>
                                                    
                                                <tr>
                                                <tr class="fil">
                                                    <td><span>4.8 PRESENTACION DE DATOS : <?php echo strtoupper(utf8_encode($value[36])); ?></span> </td>
                                                    
                                                </tr>

                                                <tr class="fil">
                                                    <td><span>4.9 ANALISIS DE DATOS E INTERPRETACION DE DATOS: <?php echo strtoupper(utf8_encode($value[37])); ?>, <?php echo strtoupper(utf8_encode($value[38])); ?> </span> </td>
                                                    
                                                 </tr>
                                                <tr class="fil">
                                                    <td><span>5.- ASPECTOS ADMINISTRATIVOS</span> </td>
                                                    
                                                </tr>
                                                <tr class="fil">
                                                        <td><span>5.1 ASIGNACION DE RECURSOS : <?php echo strtoupper(utf8_encode($value[40])); ?> </span></td>
                                                        
                                                    </tr>
                                                    <tr class="fil">
                                                        <td><span>5.2 PRESUPUESTO DEL PROYECTO : <?php echo strtoupper(utf8_encode($value[39])); ?></span> </td>
                                                      
                                                    </tr>
                                                    <tr class="fil">
                                                        <td><span>5.3 FINANCIAMIENTO : <?php echo strtoupper(utf8_encode($value[41])); ?> </strong></span> </td>
                                                       
                                                    </tr>
                             <?php } ?>
                        </tbody></table>
     </div> 

<?php 
    $content= ob_get_clean();
    
    $pdf = new HTML2FPDF('P','mm','A4','UTF-8');
    $pdf->UseCSS($opt==true);
    $pdf-> AddPage(); 
    $pdf->WriteHTML($content);
    $pdf->ReadCSS($content);
    $pdf->Output('proyecto.pdf');
?>

