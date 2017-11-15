<?php
include("class/pDraw.class.php");
include("class/pImage.class.php");
include("class/pPie.class.php");
include("class/pData.class.php");
include_once "library/inc.sesadmin.php";
include_once "library/inc.connection.php"; 

$consulta="SELECT DISTINCT(carrera) FROM alumnos where estatus='REINSCRITO' order by carrera ";
$r=mysqli_query($koneksidb,$consulta);
$jum  = mysqli_num_rows($r);
$datos=array();
while ($myData = mysqli_fetch_array($r)) {
$datos[]=$myData['carrera'];
 } 
 $h=0;
  $datos2=array();
 for($i=1; $i<=count($datos); $i++){
  $val=$datos[$h];
$consulta3="SELECT count(carrera) FROM alumnos where carrera='$val' and estatus='REINSCRITO'";
$r3=mysqli_query($koneksidb,$consulta3);
 while ($myData = mysqli_fetch_array($r3)) {
$datos2[]=$myData['count(carrera)'];
$h=$h+1;
}
}



?>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="table-common">
  <tr>
    <td colspan="2" align="center"><h1><b>DATOS DE ALUMNOS POR CARRERA</b></h1></td>
  </tr>
  
  <tr>
    <td colspan="2"></td>
  </tr>
  <tr>
    <td colspan="2">
	<table class="table-list" width="62%" border="0" cellspacing="1" cellpadding="2">
      <tr>
        <th width="40%" align="left" bgcolor="#CCCCCC"><strong>Carrera</strong></th>
        <th width="20%" align="center" bgcolor="#CCCCCC"><strong>Alumnos Reinscritos</strong></th>
        </tr>
	<?php	
	$h=0;
 for($i=1; $i<=count($datos); $i++){
	?>
      <tr>
        <td align="left"><?php echo $datos[$h]; ?></td>
        <td align="left"><?php echo $datos2[$h]; ?></td>
      </tr>
    <?php $h=$h+1; }  ?>
    </table>
<?php
$tabla=new pData();

$tabla->addPoints(array_values($datos2),"serie");
$tabla->setSerieDescription("serie","Sexo");

$tabla->addPoints(array_values($datos),"etiquetas");
$tabla->setAbscissa("etiquetas");

$imagen=new pImage(600,400,$tabla, TRUE);

$pastel=new pPie($imagen,$tabla);

$pastel->draw3DPie(250,140,array("Radius"=>100,"DrawLabels"=>TRUE,"LabelStacked"=>TRUE,"Border"=>TRUE));

$imagen->Render("graficapastel.png");


echo ("<img src=\"graficapastel.png\">");
?>
