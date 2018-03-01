<?php
header("Content-Type: text/html; charset=iso-8859-1 ");  
ob_start();
include_once "library/inc.connection.php";
//$fol= "12345";
$fol = $_POST['t1'];
$rest = substr($fol, 0, -2); 
$fol2= $_POST['t3'];
$fol3= $_POST['t4'];
$fol4= $_POST['t5'];  
$fol5= $_POST['t6']; 
$fol6= $_POST['t7'];
  
$strConsulta3 = "SELECT * FROM escuela";
$r=mysqli_query($koneksidb, $strConsulta3) or die ("error : ".mysqli_error($koneksidb));
$registro=mysqli_fetch_row($r);
$dato1=$registro[0];
$dato2=$registro[1];
$dato3=$registro[2];
$dato4=$registro[3];

$id_factura = "1";
date_default_timezone_set('America/Chihuahua');            
 $fecha_factura = date("d/m/Y");
$nombre = $dato1;
$domicilio =$dato2;
$modalidad =$dato3; 
$acuerdo = $dato4; 

$archivo="$fol-$fol2-$fol3.pdf";
require('fpdf/fpdf.php');
$archivo_de_salida=$archivo;
$pdf=new FPDF(); 
$pdf->AddPage();  
$pdf->Image('logo.jpg',140,15);
$top_datos=35; 
$pdf->SetXY(20, $top_datos); 
//$pdf->Cell(190, 10, "Datos de la Escuela:", 0, 2, "J");
 $pdf->SetFont('Arial','B',11); 
$pdf->MultiCell(190, //posición X 
5, //posición Y 
$nombre."\n". 
"Domicilio: ".$domicilio."\n".
 "Modalidad: ".$modalidad."\n".
 "N de Acuerdo: ".$acuerdo."        Fecha: " .$fecha_factura,
 0, // bordes 0 = no | 1 = si  
"J", // texto justificado  
false);
$top_datos2=45;


//Salto de línea 
//$pdf->Ln(2);
$top_productos = 95;  
$pdf->SetFont('Arial','',11);  
 $pdf->SetXY(20, $top_productos); 
 $pdf->SetFillColor(217,217,217);
 $pdf->Cell(65, 10, 'Nombre', 1, 1, 'C','true');   
 //$pdf->Cell(40, 5, 'Nombre', 0, 1, 'C');  
   $pdf->SetXY(85, 100);
   $pdf->Cell(6, 5, 'P1', 1, 1, 'C','true');  
  // $pdf->Cell(40, 5, 'Numero', 0, 1, 'C');   
  $pdf->SetXY(85, 95); 
  $pdf->Cell(30, 5, utf8_encode('Calificaciones'), 1, 1, 'C','true');
  $pdf->SetXY(91, 100); 
  $pdf->Cell(6, 5, 'P2', 1, 1, 'C','true');
  $pdf->SetXY(97, 100);
  $pdf->Cell(6, 5, 'P3', 1, 1, 'C','true');
  $pdf->SetXY(103, 100);
  $pdf->Cell(6, 5, 'EF', 1, 1, 'C','true');
  $pdf->SetXY(109, 100);
  $pdf->Cell(6, 5, 'PF', 1, 1, 'C','true');     
  //$pdf->Cell(65, 5, 'Letra', 0, 1, 'C');
   $pdf->SetXY(115, $top_productos);  
   $pdf->Cell(75, 10, 'Observaciones', 1, 1, 'C','true');
    $pdf->SetXY(20, 70);    
$pdf->Cell(170, 5, 'RVOE OTORGADO POR LA SECRETARIA DE EDUCACION DE TABASCO', 0, 1, 'C'); 
   $pdf->SetXY(20, 75);    
$pdf->Cell(170, 5, 'CONTROL DE CALIFICACIONES', 1, 1, 'C','true');
  //$pdf->Cell(65, 5, 'Observaciones', 0, 1, 'C');
 $precio_subtotal = 0; 
// variable para almacenar el subtotal 
$y = 105; 
// variable para la posición top desde la cual se empezarán a agregar los datos 

$strConsulta4 = "SELECT * FROM alumnos where carrera='$fol' and semestre='$fol2' order by nombre";
$rs9=mysqli_query($koneksidb, $strConsulta4) or die ("error : ".mysqli_error($koneksidb));
	while($row = mysqli_fetch_array ($rs9))
	 {
          $valor = $row["nombre"];
          $valor2 =$row["id"];
          $valor4=$row["semestre"];

$cal = "SELECT * FROM kardex where clave_alumno='$valor2' and nombre_materia='$fol3' ";
$rt=mysqli_query($koneksidb, $cal) or die ("error : ".mysqli_error($koneksidb));
  while( $rowS = mysqli_fetch_array ( $rt ))
   {
	$valor30 = $rowS["primer_p"];
  $valor40 = $rowS["segundo_p"];
  $valor50 = $rowS["tercer_p"];
  $valor60 = $rowS["examen_f"];
  $valor70 = $rowS["promedio_f"];
$pdf->SetFont('Arial','',7);  
$pdf->SetXY(20, $y);    
$pdf->Cell(65, 5, $valor, 1, 1, 'J');
$pdf->SetXY(85, $y);  
$pdf->Cell(6, 5, $valor30, 1, 1, 'C');
$pdf->SetXY(91, $y);  
$pdf->Cell(6, 5, $valor40, 1, 1, 'C');
$pdf->SetXY(97, $y);  
$pdf->Cell(6, 5, $valor50, 1, 1, 'C');
$pdf->SetXY(103, $y);  
$pdf->Cell(6, 5, $valor60, 1, 1, 'C');
$pdf->SetXY(109, $y);  
$pdf->Cell(6, 5, $valor70, 1, 1, 'C'); 
$pdf->SetXY(20, 80);    
$pdf->Cell(65, 15, "TURNO: $fol5", 1, 1, 'C');
$pdf->SetXY(85, 90);  
$pdf->Cell(20, 5, 'MATERIA:', 1, 1, 'C');
$pdf->SetXY(95, 80);  
$pdf->Cell(10, 5, "$fol2", 1, 1, 'C');
$pdf->SetXY(85, 80);  
$pdf->Cell(10, 5, 'SEM:', 1, 1, 'C');
$pdf->SetXY(85, 85);  
$pdf->Cell(20, 5, 'DOCENTE:', 1, 1, 'C'); 
$pdf->SetXY(105, 85);  
$pdf->Cell(85, 5, "$fol4", 1, 1, 'C'); 
$pdf->SetXY(105, 80);  
$pdf->Cell(85, 5, "$rest", 1, 1, 'C');
$pdf->SetXY(105, 90);  
$pdf->Cell(85, 5, "$fol3", 1, 1, 'C');
$pdf->SetXY(100, $y); 
$pdf->SetXY(115, $y);  
$pdf->Cell(75, 5, '', 1, 1, 'C');
//Cálculo del subtotal 
	$y = $y + 5;	
}}

//FIRMAS
$pdf->SetFont('Arial','B',9);  
$pdf->line(120, 262, 179, 262);
 $pdf->line(40, 262, 99, 262);
   $pdf->SetXY(120, 250);
   $pdf->Cell(57, 5,'Director de Control y servicios Escolares', 0, 0, 'C');
   $pdf->SetXY(40, 262);
  $pdf->Cell(57, 5,"$fol4", 0, 0, 'C');
  $pdf->SetXY(120, 262);
  $pdf->Cell(57, 5,"$fol6", 0, 0, 'C');
   $pdf->SetXY(40, 250);
   $pdf->Cell(57, 5, 'Firma del Catedratico' , 0, 0, 'C');
   $pdf->SetXY(30, 270);    
$pdf->Cell(140, 1, 'ESTE DOCUMENTO NO ES VALIDO SI TIENE TACHADURAS, ENMENDADURAS O ALUMNOS AGREGADOS', 0, 1, 'C'); 

$pdf->Ln(2); 
$pdf->SetFont('Arial','B',10);
$pdf->Output($archivo_de_salida);
header ("Content-Type: application/download"); 
header ("Content-Disposition: attachment; filename=$archivo");
header("Content-Length: " . filesize("$archivo"));
 $fp = fopen($archivo, "r"); 
fpassthru($fp); 
fclose($fp);
//Eliminación del archivo en el servidor
 unlink($archivo); 
ob_end_flush();
?>