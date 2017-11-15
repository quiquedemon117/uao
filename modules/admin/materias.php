<?php
include_once "library/inc.sesadmin.php";   
include_once "library/inc.connection.php";
include_once "library/inc.library.php";  


$baris = 20;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql = "SELECT * FROM materias";
$pageQry = mysqli_query($koneksidb, $pageSql) or die ("error : ".mysqli_error());
$jumlah	 = mysqli_num_rows($pageQry);
$maksData= ceil($jumlah/$baris);
?>  
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="table-common">
  <tr>
    <td colspan="2" align="center"><h1><b>DATOS DE MATERIAS</b></h1></td>
  </tr>
  
  <tr>
    <td colspan="2"></td>
  </tr>
  <tr>
    <td colspan="2">
      <div class="table">
	<table class="table-list table table-hover table-condensed" width="100%" border="0" cellspacing="1" cellpadding="2">
      <tr class="info">
        <th width="6%" align="left" bgcolor="#CCCCCC"><strong>Numero</strong></th>
         <th width="15%" align="left" bgcolor="#CCCCCC"><strong>Clave</strong></th>
        <th width="55%" align="left" bgcolor="#CCCCCC"><strong>Nombre</strong></th>
        <th width="15%" align="left" bgcolor="#CCCCCC"><strong>Plan</strong></th>
        <th width="10%" align="left" bgcolor="#CCCCCC"><strong>Creditos</strong></th>
        <td colspan="1" align="center" bgcolor="#CCCCCC"><strong>Herramientas</strong></td>
        </tr>
      <?php	
	$mySql = "SELECT * FROM materias ORDER BY nombre_materia ASC LIMIT $hal, $baris";
	$myQry = mysqli_query($koneksidb, $mySql)  or die ("Error : ".mysqli_error());
	$nomor = $hal; 
	while ($myData = mysqli_fetch_array($myQry)) {
		$nomor++;
		$Kode = $myData['clave_materia'];
	?>
      <tr>
        <td align="left"><?php echo $nomor; ?></td>
        <td align="left"><?php echo $myData['clave_materia']; ?></td>
        <td align="left"><?php echo $myData['nombre_materia']; ?></td>
        <td align="left"><?php echo $myData['plan']; ?></td> 
        <td align="left"><?php echo $myData['creditos']; ?></td>
        <td width="44" align="center"><a href="?open=editmaterias&Kode=<?php echo $Kode; ?>" target="_self" alt="Edit Data">Editar</a></td>
       
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
		echo " <a href='?open=materias&hal=$list[$h]'>$h</a> ";
	}
	?></td>
  </tr>
</table>
</div>
