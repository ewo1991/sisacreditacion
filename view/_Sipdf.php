<?php 
include '../lib/fpdf/html2fpdf.php';?>

          
     
            <?php $uni="";
                  $c=0;  
                    $descripunidad="";
                            foreach ($rows as $key => $value)
                               {    $competencia=$value[11];
                                    $metodologia=$value[10];
                                    $objetivo=$value[12];
                                    $sumilla=$value[9];
                                    $Creditos=$value[13];
                                    $DescripcionCurso=$value[14];
                                    $Ciclo=$value[15];
                                    $DescripcionEscuela=$value[16];
                                    $DescripcionFacultad=$value[17];
                                    $AñoySemestre=$value[18];
                                    $DuracionCurso=$value[19];
                                    $NombreProfesor=$value[20];
                                    $Email=$value[21];
                                    $DescripcionBibliografia=$value[22];
                                    
                                    $idunidad=$value[1];
                                    $unidadt=$value[8];
                                  
                          
                        if($descripunidad!=$value[0])
                        {
                                $descripunidad=$value[0];
                                      $uni=$uni. "
                                        <tr><td></td>
                                        <td  colspan='5'><b>".$descripunidad."</b></td></tr>";
                        }
                        if($c==0)
                        {
                                        $uni=$uni."<tr>
                                                <td align='center'><b>Semana:</b></td>
                                                <td align='center'><b>Contenido</b></td>
                                                <td align='center'><b>Concepto</b></td>
                                                <td align='center'><b>Procedimiento</b></td>
                                                <td align='center'><b>Actitudinal</b></td>
                                                <td align='center'><b>Competencia</b></td>";
                                        $uni=$uni."</tr>";
                                        $c=$c+1;
                        }             
                                      $uni=$uni."<tr>";
                                      $uni=$uni."<td align='center'>".$value[2]."</td>";
                                      $uni=$uni."<td align='justify'>".$value[3]."</td>";
                                      $uni=$uni."<td align='justify'>".$value[4]."</td>";
                                      $uni=$uni."<td align='justify'>".$value[5]."</td>";
                                      $uni=$uni."<td align='justify'>".$value[6]."</td>";
                                      $uni=$uni."<td align='justify'>".$value[7]."</td>";
//                                      
//                                      
                                      $uni=$uni."</tr>";
                                        
                                     
                                        
                                      
                               }
                            
            ?> 




<?php

$text="<table>
			<tr>  
                                
				<td colspan='6' align='center'><b>SILABO DE ".$DescripcionCurso."</b></td>
				
			</tr>
			<tr>
				<td align='center'>I.</td>
				<td colspan='5' align='left'><b>Generalidades:</b></td>				
			</tr>
			<tr>
				<td align='center'>1.1.</td>
				<td align='left'> Facultad</td>
				<td align='center'>:</td>
				<td colspan='3'>".$DescripcionFacultad."</td>
			</tr>
			<tr>
				<td align='center'>1.2.</td>
				<td align='left'> Escuela Academica</td>
				<td align='center'>:</td>
				<td colspan='3'>".$DescripcionEscuela."</td>
			
			</tr>
			<tr>
				<td align='center'>1.3.</td>
				<td align='left'>Ciclo</td>
				<td align='center'>:</td>
				<td colspan='3'>".$Ciclo."</td>
				
			</tr>
			<tr>
				<td align='center'>1.4.</td>
				<td align='left'>Año Academico</td>
				<td align='center'>:</td>
				<td colspan='3'>2013</td>
				
			</tr>
			<tr>

				<td align='center'>1.5.</td>
				<td align='left'>Semestre Academico</td>
				<td align='center'>:</td>
				<td colspan='3'>".$AñoySemestre."</td>
			
			</tr>
			<tr>
			
				<td align='center'>1.6.</td>
				<td align='left'> Duracion Del Curso</td>
				<td align='center'>:</td>
				<td colspan='3'>".$DuracionCurso."</td>
	
			</tr>
			<tr>

				<td align='center'>1.7.</td>
				<td align='left'>Extension Horaria</td>
				<td align='center'>:</td>
				<td colspan='3'>02 horas semanales</td>

			</tr>
			<tr>
			
				<td align='center'>1.8.</td>
				<td align='left'>Condicion</td>
				<td align='center'>:</td>
				<td colspan='3'>Obligatoria</td>

			</tr>
			<tr>
				<td align='center'>1.9.</td>
				<td align='left'>Pre-Requisitos</td>
				<td align='center'>:</td>
				<td colspan='3'>Ninguna</td>

			</tr>
			<tr>

				<td align='center'>1.10.</td>
				<td align='left'>Creditos</td>
				<td align='center'>:</td>
				<td colspan='3'>".$Creditos."</td>

			</tr>
			<tr>

				<td align='center'>1.11.</td>
				<td align='left'>Docente Responsable</td>
				<td align='center'>:</td>
				<td colspan='3'>".$NombreProfesor."</td>
			
			</tr>
			<tr>
				<td align='center'>1.12.</td>
				<td align='left'>Correo Electronico</td>
				<td align='center'>:</td>
				<td colspan='3'>".$Email."</td>

			</tr>
			<tr>
				<td align='center'>II.</td> 
				<td colspan='5' align='left'><b>Sumilla</b></td>
				
			</tr>
			<tr>
				<td></td>
				<td colspan='5' align='justify'>
					".$sumilla."
				</td>
				
			</tr>
			<tr>
				<td align='center'>III.</td>
				<td colspan='5' align='left'><b>Objetivos</b></td>
				
			</tr>
			<tr>
                                <td></td>
				<td colspan='5' align='justify'>
					".$objetivo."
				</td>
			</tr>
			<tr>
				<td align='center'>IV.</td>
				<td colspan='5' align='left'><b>Contenido Analítico</b></td>
				
			</tr>
    
			".$uni."
 
			<tr>
				<td align='center'>V.</td>
				<td  colspan='5'align='left'><b>Metodologia</b></td>
				
			</tr>
			<tr>
                                <td></td>
				<td colspan='5' align='justify'>
					 ".$metodologia."
				</td>
				
			</tr>
			<tr>
				<td align='center'>VI.</td>
				<td colspan='5' align='left'><b>Bibliografia</b></td>
				
			</tr>
                        <tr>
				<td></td>
				<td colspan='5'>
                                        ".$DescripcionBibliografia."
                                    
                                </td>
				
			</tr>
       
		</table>";

$pdf = new HTML2FPDF('P', 'mm', 'A4','utf-8');

$pdf->AddPage();

  
$pdf->UseCSS($opt==true); 
$pdf->WriteHTML($text);

$pdf->ReadCSS($text);

$pdf->Output('curso.pdf');
?>
     