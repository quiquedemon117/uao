<?php

include_once "library/inc.connection.php";
include_once "library/inc.sesadmin.php";  

$consulta="SELECT DISTINCT(carrera) FROM alumnos order by carrera ";
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
$consulta3="SELECT count(carrera) FROM alumnos where carrera='$val'";
$r3=mysqli_query($koneksidb,$consulta3);
 while ($myData = mysqli_fetch_array($r3)) {
$datos2[]=$myData['count(carrera)'];
$h=$h+1;
}
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
</head>
<body>
  <table width="100%" border="0" cellpadding="2" cellspacing="1" class="table-common">
  <tr>
    <td colspan="2" align="center"><h1><b>DATOS DE ALUMNOS POR CARRERA</b></h1></td>
  </tr>
  
  <tr>
    <td colspan="2"></td>
  </tr>
  <tr>
    <td colspan="2">
  <table class="table-list table table-hover table-condensed" width="62%" border="0" cellspacing="1" cellpadding="2">
      <tr class="info">
        <th width="40%" align="left" bgcolor="#CCCCCC"><strong>Carrera</strong></th>
        <th width="20%" align="center" bgcolor="#CCCCCC"><strong>Cantidad de Alumnos</strong></th>
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

<div id="container" style="min-width: 310px; height: 600px; max-width: 800px; margin: 0 auto"></div>
</body>

<script type="text/javascript">

// Build the chart
Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },credits: {
      enabled: false
  },
    title: {
        text: 'Porcentaje de alumnos inscritos por carrera'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [
            <?php

        $h=0;
 for($i=1; $i<=count($datos); $i++){
    ?>
        {name: <?php echo "'".$datos[$h]."'"; ?>,
        y: <?php echo $datos2[$h]; ?>},
    <?php $h=$h+1; }  ?>
        ]
    }]
});
    </script>
</html>

