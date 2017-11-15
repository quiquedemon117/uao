<?php 
ob_start();
include_once "library/inc.connection.php";
//Recibir detalles de factura 
$id_factura = "1";
date_default_timezone_set('America/Chihuahua');            
 $fecha_factura = date("Y/m/d");
//Recibir los datos de la empresa 

//variable que guarda el nombre del archivo PDF 
$archivo="titulacion.pdf";
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
 $pdf->MultiCell(237,7, "día               del   mes   de                              de              se reunieron los", 0, "C", false);
 $pdf->MultiCell(195,7, "miembros del jurado integrados por los señores:", 0, "C", false);
 $pdf->MultiCell(237,7, "", 0, "C", false);
 $pdf->MultiCell(237,7, "", 0, "C", false);
 $pdf->MultiCell(237,7, "", 0, "C", false);
 $pdf->MultiCell(237,7, "Bajo la presidencia del primero y con carácter de secretario el ultimo", 0, "C", false);
 $pdf->MultiCell(237,7, "para proceder a efectuar la evaluación de                                                ", 0, "C", false);
 $pdf->MultiCell(237,7, "                                para obtener el TÍTULO de                                ", 0, "C", false);
 $pdf->MultiCell(237,7, "                                                                    con Reconocimiento de", 0, "C", false);
 $pdf->MultiCell(237,7, "Validez Oficial de la SEP, según Acuerdo N°                                           ", 0, "C", false);
 $pdf->MultiCell(237,7, "                   de fecha                                                      , que sustenta", 0, "C", false);
 $pdf->MultiCell(237,7, "", 0, "C", false);
 $pdf->MultiCell(237,7, "Los miembros del jurado examinaron al sustentante y después de      ", 0, "C", false);
 $pdf->MultiCell(237,7,"deliberar entre sí, resolvieron declararlo(a)                                              ", 0, "C", false);
 $pdf->MultiCell(237,7, "El presidente del jurado le dio a conocer el resultado y procedió a      ", 0, "C", false);
 $pdf->MultiCell(237,7, "tomar la protesta de ley.                                                                             ", 0, "C", false);
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
 $pdf->MultiCell(237,7, "", 0, "C", false);
 $pdf->MultiCell(237,7, "      PRESIDENTE                                       SECRETARIO                    ", 0, "C", false);
 $pdf->MultiCell(237,7, "", 0, "C", false);
 $pdf->MultiCell(237,7, "", 0, "C", false);
 $pdf->MultiCell(237,7, "", 0, "C", false);
 $pdf->MultiCell(237,7, "                                   VOCAL                                             ", 0, "C", false);
 $pdf->MultiCell(237,7, "", 0, "C", false);
 $pdf->MultiCell(237,7, "", 0, "C", false);
 $pdf->MultiCell(237,7, "", 0, "C", false);
 $pdf->MultiCell(237,7, "                                   Vo.Bo                                             ", 0, "C", false);
 $pdf->MultiCell(237,7, "", 0, "C", false);
 $pdf->MultiCell(237,7, "", 0, "C", false);
 $pdf->MultiCell(237,7, "", 0, "C", false);
 $pdf->MultiCell(237,7, "                                   RECTOR                                             ", 0, "C", false);
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