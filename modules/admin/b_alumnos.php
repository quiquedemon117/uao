<?php
include_once "library/inc.sesadmin.php"; 
include_once "library/inc.connection.php"; 
include_once "library/inc.library.php";   
if(empty($_POST['FF']) & empty($_POST['FI']) ){
echo "<meta http-equiv='refresh' content='0; url=?open=alumnos'>";
}
$nombre = $_POST['FF'];
$matricula = $_POST['FI'];
$baris = 20;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql = "SELECT * FROM alumnos where nombre like '".$nombre."%' and id= '".$matricula."%' ";
$pageQry = mysqli_query($koneksidb, $pageSql) or die ("error : ".mysqli_error($koneksidb));
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
        <th width="7%" align="left" bgcolor="#CCCCCC"><strong>Numero</strong></th>
        <th width="7%" align="left" bgcolor="#CCCCCC"><strong>Matricula</strong></th>
        <th width="30%" align="left" bgcolor="#CCCCCC"><strong>Nombre</strong></th>
        <th width="20%" bgcolor="#CCCCCC"><strong>Carrera</strong></th>
        <th width="7%" align="left" bgcolor="#CCCCCC"><strong>Semestre</strong></th>
         <td colspan="3" align="center" bgcolor="#CCCCCC"><strong>Herramientas</strong></td>
        </tr>
      <?php	
	$mySql = "SELECT * FROM alumnos where nombre like '".$nombre."%' and id like '".$matricula."%' ORDER BY nombre ASC LIMIT $hal, $baris ";
	$myQry = mysqli_query($koneksidb, $mySql)  or die ("error : ".mysqli_error($koneksidb));
	$nomor = $hal; 
	while ($myData = mysqli_fetch_array($myQry)) {
		$nomor++;
		$Kode = $myData['id'];
	?>
      <tr>
        <td align="left"><?php echo $nomor; ?></td>
        <td align="left"><?php echo $myData['id']; ?></td>
        <td align="left"><?php echo $myData['nombre']; ?></td>
        <td align="left"><?php echo strtoupper($myData['carrera']); ?></td>
        <td align="left"><?php echo $myData['semestre']; ?></td>
        <td width="30" align="center"><a href="?open=editalumnos&Kode=<?php echo $Kode; ?>" target="_self" title="Editar Dato"><i class="glyphicon glyphicon-pencil"></i></a></td>
        <td width="30" align="center"><a href="?open=elialumnos&Kode=<?php echo $Kode; ?>" target="_self" title="Eliminar Dato" onclick="return confirm('Seguro que va a eliminar los datos del alumno... ?')"><i class="glyphicon glyphicon-remove"></a></td>
        <td width="30" align="center"><a href="?open=adeudos&Kode=<?php echo $Kode; ?>" target="_self" title="Ver Adeudo"><i class="glyphicon glyphicon-folder-open"></i></a></td>
      </tr>
      <?php } ?>
    </table></td>
  </tr>
  <tr class="selKecil">
    <td width="10"><b>Numero de Datos :</b> <?php echo $jumlah; ?> </td>
    <td width="384" align="right"><b>Pagina de :</b>
      <?php
	for ($h = 1; $h <= $maksData; $h++) {
		$list[$h] = $baris * $h - $baris;
		echo " <a href='?open=b_alumnos&hal=$list[$h]'>$h</a> ";
	} 
	?></td>
  </tr>
</table>
</div>
