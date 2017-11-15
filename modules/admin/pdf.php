<?php 
ob_start();
include_once "library/inc.connection.php";
//$fol= "12345";
$fol= $_POST['t1']; 
$fol2= $_POST['t3']; 
$ge= "0"; 
$iv= "0"; 
  
	$strConsulta3 = "SELECT *  FROM escuela";
	$r=mysqli_query($koneksidb, $strConsulta3) or die ("error : ".mysqli_error());
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
$archivo="Constancia-$dato1.pdf";
//Llamada al script fpdf
 require('fpdf/fpdf.php');
$archivo_de_salida=$archivo;
$pdf=new FPDF(); 
 //crea el objeto 
$pdf->AddPage();  
//añadimos una página. Origen coordenadas, esquina superior izquierda, posición por defeto a 1 cm de los bordes.//logo de la tienda 
//$pdf->Image('../admin.jpg',140,8);
$pdf->Image('logo.jpg',140,8);
// Encabezado de la factura
 $pdf->SetFont('Arial','B',14); 
$pdf->Cell(190, 10, "Constancia", 0, 2, "C");
 $pdf->SetFont('Arial','B',10);
 $pdf->MultiCell(190,5, "Numero de Folio: $id_factura"."\n"."Fecha: $fecha_factura", 0, "C", false);
 $pdf->Ln(2);
// Datos de la tienda
 $pdf->SetFont('Arial','B',12); 
$top_datos=45; 
$pdf->SetXY(40, $top_datos); 
$pdf->Cell(190, 10, "Datos de la Escuela:", 0, 2, "J");
 $pdf->SetFont('Arial','',9); 
$pdf->MultiCell(190, //posición X 
5, //posición Y 
$nombre."\n". 
"Domicilio: ".$domicilio."\n".
 "Modalidad: ".$modalidad."\n".
 "N° de Acuerdo: ".$acuerdo,
 0, // bordes 0 = no | 1 = si  
"J", // texto justificado  
false);
//Salto de línea 
$pdf->Ln(2);
$top_productos = 110;    
 $pdf->SetXY(45, $top_productos);    
 $pdf->Cell(40, 5, 'Nombre', 0, 1, 'C');  
   $pdf->SetXY(80, $top_productos);  
   $pdf->Cell(40, 5, 'Numero', 0, 1, 'C');   
  $pdf->SetXY(115, $top_productos);   
  $pdf->Cell(40, 5, 'Letra', 0, 1, 'C');
 $precio_subtotal = 0; 
// variable para almacenar el subtotal 
$y = 115; 
// variable para la posición top desde la cual se empezarán a agregar los datos 

          

$strConsulta4 = "SELECT * FROM alumnos where carrera='$fol' and semestre='$fol2' ";
$rs9=mysqli_query($koneksidb, $strConsulta4) or die ("error : ".mysqli_error());
	while( $row = mysqli_fetch_array ( $rs9 ))
	 {
          $valor =$row["nombre"];
          $valor2 =$row["id"];
          $valor3 =$row['semestre'];

	
$pdf->SetFont('Arial','',8);  
$pdf->SetXY(45, $y);    
$pdf->Cell(40, 5, $valor, 0, 1, 'C');
$pdf->SetXY(80, $y);  
$pdf->Cell(40, 5, $valor2, 0, 1, 'C'); 
$pdf->SetXY(115, $y); 

if($valor3=='1'){
$valor3='Uno'; 
$pdf->Cell(40, 5, $valor3, 0, 1, 'C');}
else if($valor3=='0'){
$valor3='Cero'; 
$pdf->Cell(40, 5, $valor3, 0, 1, 'C');}
else if($valor3=='2'){
$valor3='Dos'; 
$pdf->Cell(40, 5, $valor3, 0, 1, 'C');}
else if($valor3=='3'){
$valor3='Tres'; 
$pdf->Cell(40, 5, $valor3, 0, 1, 'C');}
 else if($valor3=='4'){
$valor3='Cuatro'; 
$pdf->Cell(40, 5, $valor3, 0, 1, 'C');}
else if($valor3=='5'){
$valor3='Cinco'; 
$pdf->Cell(40, 5, $valor3, 0, 1, 'C');}
 else if($valor3=='6'){
$valor3='Seis'; 
$pdf->Cell(40, 5, $valor3, 0, 1, 'C');}
else if($valor3=='7'){
$valor3='Siete'; 
$pdf->Cell(40, 5, $valor3, 0, 1, 'C');}
else if($valor3=='8'){
$valor3='Ocho'; 
$pdf->Cell(40, 5, $valor3, 0, 1, 'C');}
else if($valor3=='9'){
$valor3='Nueve'; 
$pdf->Cell(40, 5, $valor3, 0, 1, 'C');}
else if($valor3=='10'){
$valor3='Diez'; 
$pdf->Cell(40, 5, $valor3, 0, 1, 'C');}
//Cálculo del subtotal 
	$y = $y + 5;	
}


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