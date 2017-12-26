<?php 
ob_start();
include_once "library/inc.connection.php";
$presidente = $_POST["presi"];
$secretario = $_POST["secre"];
$vocal = $_POST["vocal"];
$rector = $_POST["rector"];
$declarado = $_POST["declarado"];
$acuerdo = $_POST["cacuerdo"];
$evaluacion = $_POST["evaluacion"];
$titulo = $_POST["titulo"];

if($evaluacion="EXAMEN GENERAL DE CONOCIMIENTOS"){
$evaluacion1="EXAMEN GENERAL DE";
$evaluacion2="CONOCIMIENTOS";
}
if($titulo="LICENCIADO EN ADMINISTRACION"){
$titulo1="LICENCIADO EN";
$titulo2="ADMINISTRACION";
}

$strConsulta3 = "SELECT nombre  FROM alumnos";
   $r=mysqli_query($koneksidb, $strConsulta3) or die ("error : ".mysqli_error());
        $registro=mysqli_fetch_row($r);
$nombre_al=$registro[0];
//Recibir detalles de factura 
$id_factura = "1";
date_default_timezone_set('America/Chihuahua');            
 $fecha_factura = date("Y/m/d");
//Recibir los datos de la empresa 

//variable que guarda el nombre del archivo PDF 
$archivo="titulacion-$nombre_al.pdf";
//Llamada al script fpdf
 require('fpdf/fpdf.php');
$archivo_de_salida=$archivo;
$pdf=new FPDF(); 
 //crea el objeto 
$pdf->AddPage();  
//añadimos una página. Origen coordenadas, esquina superior izquierda, posición por defeto a 1 cm de los bordes.//logo de la tienda 
//$pdf->Image('../admin.jpg',140,8);
//$pdf->Image('formato.jpg',0,8);
// Encabezado de la factura
 $pdf->SetFont('Times','B',16); 
 $pdf->SetTextColor(36, 64, 97);
$pdf->Cell(230, 20, "ACTA DE TITULACION", 0, 2, "C");
 $pdf->SetFont('Times','',13);
 $pdf->MultiCell(237,7, "En  la  ciudad  de  Villahermosa, Tabasco   a  las                   horas  del", 0, "C", false);
 $pdf->MultiCell(237,7, utf8_encode("día               del   mes   de                              de              se reunieron los"), 0, "C", false);
 $pdf->MultiCell(195,7, utf8_encode("miembros del jurado integrados por los señores:"), 0, "C", false);
 $pdf->MultiCell(237,7, "", 0, "C", false);
 $pdf->MultiCell(237,7, "", 0, "C", false);
 $pdf->MultiCell(237,7, "", 0, "C", false);
 $pdf->MultiCell(235,7, utf8_encode("Bajo la presidencia del primero y con carácter de secretario el ultimo"), 0, "C", false);
 $pdf->MultiCell(239,7, utf8_encode("para proceder a efectuar la evaluación de                                                "), 0, "C", false);
 $pdf->MultiCell(237,7, utf8_encode("                                para obtener el TÍTULO de                                "), 0, "C", false);
 $pdf->MultiCell(237,7, "                                                                    con Reconocimiento de", 0, "C", false);
 $pdf->MultiCell(239,7, utf8_encode("Validez Oficial de la SEP, según Acuerdo N°                                           "), 0, "C", false);
 $pdf->MultiCell(237,7, "                   de fecha                                                      , que sustenta", 0, "C", false);
 $pdf->MultiCell(237,7, "", 0, "C", false);
 $pdf->MultiCell(237,7, utf8_encode("Los miembros del jurado examinaron al sustentante y después de       "), 0, "C", false);
 $pdf->MultiCell(239,7,utf8_encode("deliberar entre sí, resolvieron declararlo(a)                                             "), 0, "C", false);
 $pdf->MultiCell(237,7, utf8_encode("El presidente del jurado le dio a conocer el resultado y procedió a      "), 0, "C", false);
 $pdf->MultiCell(239,7, "tomar la protesta de ley.                                                                          ", 0, "C", false);
 $pdf->line(155, 36, 173, 36);
 $pdf->line(70, 43, 85, 43);
 $pdf->line(111, 43, 143, 43);
 $pdf->line(150, 43, 164, 43);
 $pdf->line(64, 57, 193, 57);
 $pdf->line(64, 64, 193, 64);
 $pdf->line(64, 71, 193, 71);
 $pdf->line(140, 85, 193, 85);
 $pdf->line(64, 92, 100, 92);
 $pdf->line(155, 92, 193, 92);
 $pdf->line(64, 99, 145, 99);
 $pdf->line(146, 106, 193, 106);
 $pdf->line(64, 113, 87, 113);
 $pdf->line(106, 113, 164, 113);
 $pdf->line(64, 120, 193, 120);
 $pdf->line(144, 134, 193, 134);
 $pdf->line(134, 169, 193, 169);
 $pdf->line(54, 169, 113, 169);
 $pdf->line(96, 197, 154, 197);
 $pdf->line(96, 225, 154, 225);
 $pdf->MultiCell(237,7, "", 0, "C", false);
 $pdf->MultiCell(237,7, "      PRESIDENTE                                             SECRETARIO                    ", 0, "C", false);
 $pdf->MultiCell(237,7, "", 0, "C", false);
 $pdf->MultiCell(237,7, "", 0, "C", false);
 $pdf->MultiCell(237,7, "", 0, "C", false);
 $pdf->MultiCell(237,7, "                                     VOCAL                                             ", 0, "C", false);
 $pdf->MultiCell(237,7, "", 0, "C", false);
 $pdf->MultiCell(237,7, "", 0, "C", false);
 $pdf->MultiCell(237,7, "", 0, "C", false);
 $pdf->MultiCell(237,7, "                                   Vo.Bo                                             ", 0, "C", false);
 $pdf->MultiCell(237,7, "", 0, "C", false);
 $pdf->MultiCell(237,7, "                                   RECTOR                                             ", 0, "C", false);

//contenedores
 $pdf->SetFont('Times','',11);
 $pdf->SetXY(156, 31);
   $pdf->Cell(15, 5, '8:00', 0, 0, 'C');
   $pdf->SetXY(70, 38);
   $pdf->Cell(15, 5, '17', 0, 0, 'C');
    $pdf->SetXY(111, 38);
   $pdf->Cell(32, 5, 'ENERO', 0, 0, 'C');
    $pdf->SetXY(150, 38);
   $pdf->Cell(14, 5, '2017', 0, 0, 'C');
$pdf->SetXY(65, 52);
   $pdf->Cell(125, 5, "$presidente", 0, 0, 'J');
   $pdf->SetXY(65, 59);
   $pdf->Cell(125, 5, "$vocal", 0, 0, 'J');
   $pdf->SetXY(65, 66);
   $pdf->Cell(125, 5, "$secretario", 0, 0, 'J');
   $pdf->SetXY(140, 80);
   $pdf->Cell(52, 5, "$evaluacion1", 0, 0, 'C');
   $pdf->SetXY(65, 87);
   $pdf->Cell(35, 5, "$evaluacion2", 0, 0, 'C');
   $pdf->SetXY(155, 87);
   $pdf->Cell(37, 5, "$titulo1", 0, 0, 'C');
   $pdf->SetXY(65, 94);
   $pdf->Cell(80, 5, "$titulo2", 0, 0, 'C');
 $pdf->SetXY(147, 101);
   $pdf->Cell(45, 5, "$acuerdo", 0, 0, 'C');
   $pdf->SetXY(18, 112);
   $pdf->Cell(20, 5, 'FOTOGRAFIA', 0, 0, 'C');
   $pdf->SetXY(65, 108);
   $pdf->Cell(20, 5, '', 0, 0, 'C');
   $pdf->SetXY(105, 108);
   $pdf->Cell(58, 5, '8:00 de marzo de 1994', 0, 0, 'C');
   $pdf->SetXY(65, 115);
   $pdf->Cell(125, 5, "$nombre_al", 0, 0, 'C');
   $pdf->SetXY(142, 129);
   $pdf->Cell(50, 5, "$declarado", 0, 0, 'C');
   $pdf->SetXY(135, 171);
   $pdf->Cell(57, 5, "$secretario", 0, 0, 'C');
   $pdf->SetXY(55, 171);
   $pdf->Cell(57, 5, "$presidente", 0, 0, 'C');
   $pdf->SetXY(97, 199);
   $pdf->Cell(57, 5, "$vocal", 0, 0, 'C');
   $pdf->SetXY(97, 220);
   $pdf->Cell(57, 5, "$rector", 0, 0, 'C');

 $pdf->Ln(2);  
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