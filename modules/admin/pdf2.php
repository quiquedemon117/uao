<?php
header("Content-Type: text/html; charset=iso-8859-1 ");  
ob_start();
include_once "library/inc.connection.php";
//$fol= "12345";
$fol= $_POST['t1']; 
$fol2= $_POST['t3'];
$fol3= $_POST['t4'];
$fol4= $_POST['t5'];  
$fol5= $_POST['t6']; 
$fol6= $_POST['t7']; 
  
	$strConsulta3 = "SELECT *  FROM escuela";
	$r=mysqli_query($koneksidb, $strConsulta3) or die ("error : ".mysqli_error($koneksidb));
        $registro=mysqli_fetch_row($r);
$dato1=$registro[0];
$dato2=$registro[1];
$dato3=$registro[2];
$dato4=$registro[3];


//Recibir detalles de factura 
$id_factura = "1";
date_default_timezone_set('America/Chihuahua');            
 $fecha_factura = date("Y/m/d");
//Recibir los datos de la empresa 
$nombre = $dato1;
 $domicilio =$dato2;
 $modalidad =$dato3; 
$acuerdo = $dato4; 

//Recibir los datos de los productos 
$iva = $iv;
 $gastos_de_envio = $ge; 
//variable que guarda el nombre del archivo PDF 
$archivo="$fol-$fol2-$fol3.pdf";
//Llamada al script fpdf
 require('fpdf/fpdf.php');
$archivo_de_salida=$archivo;
$pdf=new FPDF(); 
 //crea el objeto 
$pdf->AddPage();  
//añadimos una página. Origen coordenadas, esquina superior izquierda, posición por defeto a 1 cm de los bordes.//logo de la tienda 
//$pdf->Image('../admin.jpg',140,8);
$pdf->Image('logo.jpg',140,15);
// Encabezado de la factura
// $pdf->SetFont('Arial','B',14); 
//$pdf->Cell(190, 10, "Constancia", 0, 2, "C");
 //$pdf->SetFont('Arial','B',10);
 //$pdf->MultiCell(190,5, "Numero de Folio: $id_factura"."\n"."Fecha: $fecha_factura", 0, "C", false);
 //$pdf->Ln(2);
// Datos de la tienda
$top_datos=35; 
$pdf->SetXY(20, $top_datos); 
//$pdf->Cell(190, 10, "Datos de la Escuela:", 0, 2, "J");
 $pdf->SetFont('Arial','',11); 
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
   $pdf->Cell(15, 5, 'Numero', 1, 1, 'C','true');  
  // $pdf->Cell(40, 5, 'Numero', 0, 1, 'C');   
    $pdf->SetXY(85, 95); 
  $pdf->Cell(30, 5, utf8_encode('Calificacion Final'), 1, 1, 'C','true');
  $pdf->SetXY(100, 100); 
  $pdf->Cell(15, 5, 'Letra', 1, 1, 'C','true');  
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
	while( $row = mysqli_fetch_array ( $rs9 ))
	 {
          $valor =$row["nombre"];
          $valor2 =$row["id"];
          $valor4=$row["semestre"];

$cal = "SELECT calificacion FROM `$fol` where clave_alumno='$valor2' and nombre_materia='$fol3' ";
$rt=mysqli_query($koneksidb, $cal) or die ("error : ".mysqli_error($koneksidb));
  while( $row = mysqli_fetch_array ( $rt ))
   {
	$valor3 =$row["calificacion"];
$pdf->SetFont('Arial','',8);  
$pdf->SetXY(20, $y);    
$pdf->Cell(65, 5, $valor, 1, 1, 'J');
$pdf->SetXY(85, $y);  
$pdf->Cell(15, 5, $valor3, 1, 1, 'C'); 
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
$pdf->Cell(85, 5, "$fol", 1, 1, 'C');
$pdf->SetXY(105, 90);  
$pdf->Cell(85, 5, "$fol3", 1, 1, 'C');
$pdf->SetXY(100, $y); 


if($valor3=='1'){
$valor3='Uno'; 
$pdf->Cell(15, 5, $valor3, 1, 1, 'C');}
else if($valor3=='0'){
$valor3='Cero'; 
$pdf->Cell(15, 5, $valor3, 1, 1, 'C');}
else if($valor3=='2'){
$valor3='Dos'; 
$pdf->Cell(15, 5, $valor3, 1, 1, 'C');}
else if($valor3=='3'){
$valor3='Tres'; 
$pdf->Cell(15, 5, $valor3, 1, 1, 'C');}
 else if($valor3=='4'){
$valor3='Cuatro'; 
$pdf->Cell(15, 5, $valor3, 1, 1, 'C');}
else if($valor3=='5'){
$valor3='Cinco'; 
$pdf->Cell(15, 5, $valor3, 1, 1, 'C');}
 else if($valor3=='6'){
$valor3='Seis'; 
$pdf->Cell(15, 5, $valor3, 1, 1, 'C');}
else if($valor3=='7'){
$valor3='Siete'; 
$pdf->Cell(15, 5, $valor3, 1, 1, 'C');}
else if($valor3=='8'){
$valor3='Ocho'; 
$pdf->Cell(15, 5, $valor3, 1, 1, 'C');}
else if($valor3=='9'){
$valor3='Nueve'; 
$pdf->Cell(15, 5, $valor3, 1, 1, 'C');}
else if($valor3=='10'){
$valor3='Diez'; 
$pdf->Cell(15, 5, $valor3, 1, 1, 'C');}
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