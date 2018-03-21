<?php
header("Content-Type: text/html; charset=iso-8859-1 ");
ob_start();
include_once "library/inc.connection.php";
require('fpdf/fpdf.php');
require('library/inc.connection.php');
require('funciones.php');
require('NumerosALetras.php');
/*CONSULTAS*/
if(isset($_POST['t']) && isset($_POST['t1']) && isset($_POST['t2']) && isset($_POST['t3']) && isset($_POST['t4'])){
$matricula = $_POST['t'];
$nombre = $_POST['t1'];
$semestre = $_POST['t2'];
$carrera = $_POST['t3'];
$turno = $_POST['t4'];

$query = "SELECT * FROM alumnos WHERE id='$matricula';";
$go_query = mysqli_query($koneksidb, $query);
$row = mysqli_fetch_array($go_query);

$query_2 = "SELECT * FROM kardex WHERE clave_alumno='$matricula';";
$go_query_2 = mysqli_query($koneksidb, $query_2) or die ("error : ".mysqli_error($koneksidb));
if($row2 = mysqli_fetch_array($go_query_2)){
	$nombre_materia = $row2[nombre_materia];
	$clave_carrera = $row2[clave_carrera];
	$query_3 = "SELECT * FROM materias WHERE nombre_materia='$nombre_materia' AND carrera_clave='$clave_carrera'";
	$go_query_3 = mysqli_query($koneksidb, $query_3) or die ("error : ".mysqli_error($koneksidb));;
		if($row3 = mysqli_fetch_array($go_query_3)){
			$clave_materia = $row3[clave_materia];
		}else{
			echo "error";
		}
}else{
	echo "error";
}




$carrera_imprimir = $row[carrera];
$carrera_imprimir = strtoupper ($carrera_imprimir);
$carrera_imprimir = substr($carrera_imprimir, 0, -2);

$carrera_imprimir = Mayus($carrera_imprimir);
}
/*CONSULTAS*/
$pdf=new FPDF('P','cm','Legal');
$archivo = "prueba.pdf";
$pdf->AddFont('BookAntiqua-Bold','','Book Antiqua.php');
$pdf->AddFont('CalisMTBol','','CALISTB.php');
$pdf->AddFont('Calibri-Bold','','calibrib.php');
$pdf->AddPage('P','Legal');  
$pdf->Image('logo.jpg',0.2,2.3);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,0,'SECRETARÍA DE EDUCACIÓN PÚBLICA',0,1,'C');
$pdf->Cell(0,1,'DIRECCIÓN GENERAL DE EDUCACIÓN SUPERIOR UNIVERSITARIA',0,1,'C');
$pdf->SetFont('BookAntiqua-Bold','',26);
$pdf->SetTextColor(0,0,255);
$pdf->Cell(0,1,'Universidad Alfa y Omega',0,1,'C');
$pdf->SetFont('CalisMTBol','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(0,1,'Av. 27 de febrero 1804, Col. Atasta, Villahermosa, Tab. Tel.(993) 3152896 con cuatro líneas. ',0,1,'C');
$pdf->SetFont('CalisMTBol','',14);
$pdf->Cell(0,0,'SECRETARIA ACADÉMICA',0,1,'C');
$pdf->Cell(0,1,'DIRECCIÓN DE SERVICIOS ESCOLARES',0,1,'C');
$pdf->SetFont('CalisMTBol','',16);
$pdf->Cell(0,0,$carrera_imprimir,0,1,'C');
$pdf->SetFont('Calibri-Bold','',12);
$pdf->Cell(0,1,'Acuerdo 944 814 del 04 de marzo de 1994.',0,1,'C');
$pdf->SetFont('arial','B',12);
$pdf->Cell(0,1,'KARDEX DEL ALUMNO',0,1,'C');
$pdf->SetFont('arial','B',8);
$pdf->SetTextColor(0,0,255);
$pdf->Cell(10, 1, $nombre, 1, 1, 'L');
$pdf->SetXY(11, 7);
$pdf->Cell(3, 1, $matricula, 1, 0, 'L');
$pdf->SetXY(14, 7);
$pdf->Cell(3, 1, $row[fecha_nacimiento], 1, 0, 'L');
$pdf->SetXY(17, 7);
$pdf->Cell(0, 1, "MEXICANA", 1, 0, 'L');
$pdf->Ln(1); 
$pdf->Cell(10, 1, $row[localidad], 1, 1, 'L');
$pdf->SetXY(11, 8);
$pdf->Cell(3, 1, $row[telefono], 1, 0, 'L');
$pdf->SetXY(14, 8);
$pdf->Cell(3, 1, $row[municipio], 1, 0, 'L');
$pdf->SetXY(17, 8);
$pdf->Cell(0, 1, $row[estado], 1, 0, 'L');
$pdf->Ln(2);
$pdf->SetTextColor(0,0,0); 
$pdf->Cell(1.5, 1.5, "CLAVE", 1, 0, 'C');
$pdf->Cell(6.5, 1.5, "ASIGNATURA", 1, 0, 'C');
$pdf->SetFont('arial','B',5);
$pdf->Cell(1.5, 1.5, "SERIACIÓN", 1, 0, 'C');
$pdf->Cell(1, 1.5, "CRED", 1, 0, 'C');
$pdf->Cell(4.5, 0.5, "C A L I F I C A S I O N E S", 1, 0, 'C');
$pdf->Ln(1);
$pdf->SetXY(9.5, 10.5);
$pdf->SetFont('arial','B',6);
$pdf->SetXY(11.5, 10.5);
$pdf->Cell(1.25, 0.5, "ORDINARIA", 1, 0, 'C');
$pdf->Cell(1, 1, "CICLO", 1, 0, 'C');
$pdf->SetFont('arial','B',3.9);
$pdf->Cell(1.25, 0.5, "EXTRAORDINARIA", 1, 0, 'C');
$pdf->SetFont('arial','B',6);
$pdf->Cell(1, 1, "CICLO", 1, 0, 'C');
$pdf->Ln(1);
$pdf->SetXY(11.5, 11);
$pdf->SetFont('arial','B',4);
$pdf->Cell(0.5, 0.5, "NÚM", 1, 0, 'C');
$pdf->Cell(0.75, 0.5, "LETRA", 1, 0, 'C');
$pdf->SetXY(13.750, 11);
$pdf->Cell(0.5, 0.5, "NÚM", 1, 0, 'C');
$pdf->Cell(0.75, 0.5, "LETRA", 1, 0, 'C');
$pdf->SetXY(16, 10);
$pdf->SetFont('arial','B',8);
$pdf->Cell(0, 1.5, "OBSERVACIONES", 1, 0, 'C');

/*etiquetas*/
$pdf->SetTextColor(0,0,255); 
$pdf->SetXY(1,7.2);
$pdf->Write(0,'Nombre del alumno:');
$pdf->SetXY(11,7.2);
$pdf->Write(0,'Matricula:');
$pdf->SetXY(14,7.2);
$pdf->Write(0,'Fecha de nac:');
$pdf->SetXY(17,7.2);
$pdf->Write(0,'Nacionalidad:');
$pdf->SetXY(1,8.2);
$pdf->Write(0,'Domicilio:');
$pdf->SetXY(11,8.2);
$pdf->Write(0,'Telefono:');
$pdf->SetXY(14,8.2);
$pdf->Write(0,'Municipio:');
$pdf->SetXY(17,8.2);
$pdf->Write(0,'Estado:');
/*etiquetas*/

$y = 11.5;

/*datos ciclicos*/
$pdf->SetXY(1, $y);
$pdf->Cell(1.5, 0.5, $clave_materia, 1, 0, 'C');
$pdf->SetFont('arial','B',6);
$pdf->Cell(6.5, 0.5, $row3[nombre_materia], 1, 0, 'C');
$pdf->Cell(1.5, 0.5, "", 1, 0, 'C');
$pdf->Cell(1, 0.5, "", 1, 0, 'C');
$pdf->SetFont('arial','B',6);
$pdf->Cell(0.5, 0.5, $row2[promedio_f], 1, 0, 'C');
$numero1 = (float) $row2[promedio_f];
$pdf->SetFont('arial','B',2);
$pdf->Cell(0.75, 0.5, NumeroALetras::convertir($numero1 , 'PUNTO', 'pesos'), 1, 0, 'C');
$pdf->Cell(1, 0.5, "", 1, 0, 'C');
$pdf->Cell(0.5, 0.5, "", 1, 0, 'C');
$pdf->Cell(0.75, 0.5, "", 1, 0, 'C');
$pdf->Cell(1, 0.5, "", 1, 0, 'C');
$pdf->Cell(0, 0.5, "", 1, 0, 'C');
$pdf->SetXY(1,12);

/*datos ciclicos*/

$pdf->Output($archivo);
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