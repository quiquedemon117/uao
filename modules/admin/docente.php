<?php
include_once "library/inc.sesadmin.php";   
include_once "library/inc.connection.php";
include_once "library/inc.library.php";  


$baris = 20;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql = "SELECT nombre_docente FROM docente";
$pageQry = mysqli_query($koneksidb, $pageSql) or die ("error : ".mysqli_error());
$jumlah	 = mysqli_num_rows($pageQry);
$maksData= ceil($jumlah/$baris);
?>  
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="table-common">
  <tr>
    <td colspan="2" align="center"><h1><b>DATOS DE ALUMNOS</b></h1></td>
  </tr>
  
  <tr>
    <td colspan="2"></td>
  </tr>
  <tr>
    <td colspan="2">
      <div class="table">
	<table class="table-list table table-hover table-condensed" width="100%" border="0" cellspacing="1" cellpadding="2">
      <tr class="info">
        <th width="5%" align="left" bgcolor="#CCCCCC"><strong>ID</strong></th>
        <th width="85%" align="left" bgcolor="#CCCCCC"><strong>Nombre</strong></th>
        </tr>
      <?php	
	$mySql = "SELECT nombre_docente FROM docente";
	$myQry = mysqli_query($koneksidb, $mySql)  or die ("Error : ".mysqli_error());
	$nomor = $hal; 
	while ($myData = mysqli_fetch_array($myQry)) {
		$nomor++;
		$Kode = $myData['id'];
	?>
      <tr>
        <td align="left"><?php echo $nomor; ?></td>
        <td align="left"><?php echo $myData['nombre_docente']; ?></td>
      </tr>
      <?php } ?>
    </table></td>
  </tr>
  <tr class="selKecil">
    <td width="20"><b>Numero de Datos :</b> <?php echo $jumlah; ?> </td>
    <td width="384" align="right"><b>Pagina de :</b>
      <?php
	for ($h = 1; $h <= $maksData; $h++) {
		$list[$h] = $baris * $h - $baris;
		echo " <a href='?open=alumnos&hal=$list[$h]'>$h</a> ";
	}
	?></td>
  </tr>
</table>
</div>
