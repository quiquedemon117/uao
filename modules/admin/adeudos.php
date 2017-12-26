<?php
include_once "library/inc.sesadmin.php"; 
include_once "library/inc.connection.php"; 
include_once "library/inc.library.php";    
$Kode = $_GET['Kode'];
$mySql2 = "SELECT nombre FROM alumnos where id='$Kode' ";
  $myQry2 = mysqli_query($koneksidb, $mySql2)  or die ("error : ".mysqli_error($koneksidb)); 
  while ($myData = mysqli_fetch_array($myQry2)) {
   
?>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="table-common">
  <tr>
    <td colspan="2" align="center"><h1><b>DATOS DE ADEUDO</b></h1></td>
  </tr>
  
  <tr>
    <td colspan="2"></td>
  </tr>
  <tr>
    <td colspan="2" align="left"><h2><?php echo $myData['nombre'];} ?></h2></td>
  </tr>
  <tr>
    <td colspan="2">
	<table class="table-list table table-hover table-condensed" width="100%" border="0" cellspacing="1" cellpadding="2">
      <tr class="info">
        <th width="10%" align="left" bgcolor="#CCCCCC"><strong>Numero</strong></th>
        <th width="35%" align="left" bgcolor="#CCCCCC"><strong>Concepto</strong></th>
        <th width="20%" align="left" bgcolor="#CCCCCC"><strong>Fecha</strong></th>
        <td colspan="1" align="center" bgcolor="#CCCCCC"><strong>Herramientas</strong></td>
        </tr>
      <?php	
	$mySql = "SELECT * FROM departamento where id_alumno='$Kode' ORDER BY id_adeudo ";
	$myQry = mysqli_query($koneksidb, $mySql)  or die ("error : ".mysqli_error($koneksidb));
	$nomor = 0; 
	while ($myData = mysqli_fetch_array($myQry)) {
		$nomor++;
		$Kode = $myData['id_adeudo'];
    $Kode2 = $myData['id_alumno'];
	?>
      <tr>
        <td align="left"><?php echo $nomor; ?></td>
        <td align="left"><?php echo $myData['concepto']; ?></td>
        <td align="left"><?php echo $myData['fecha']; ?></td>
        <td width="40" align="center"><a href="?open=eliadeudo&Kode=<?php echo $Kode; ?>&Kode2=<?php echo $Kode2; ?>" target="_self" alt="Delete Data" onclick="return confirm('Seguro que va a eliminar... ?')"><i class="glyphicon glyphicon-trash"></i></a></td>
      </tr>
      <?php } ?>
    </table></td>
  </tr>
</table>
