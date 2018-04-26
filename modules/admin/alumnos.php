<?php
include_once "library/inc.sesadmin.php";   
include_once "library/inc.connection.php";
include_once "library/inc.library.php";  


$baris = 20;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$carre = isset($_GET['c']);
$semes = isset($_GET['s']);
$order = isset($_GET['z']);
$pageSql = "SELECT * FROM alumnos";
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
        <th width="6%" align="left" bgcolor="#CCCCCC"><strong>Numero</strong></th>
         <th width="7%" align="left" bgcolor="#CCCCCC"><strong>Matricula</strong></th>
        <th width="35%" align="left" bgcolor="#CCCCCC"><strong><a href="?open=alumnos">Nombre</a></strong></th>
        <th width="35%" align="left" bgcolor="#CCCCCC"><strong><a href="?open=alumnos&c=1">Carrera</a></strong></th>
        <th width="7%" align="left" bgcolor="#CCCCCC"><strong> <a href="?open=alumnos&s=1">Semestre</a></strong></th>
        <th width="7%" bgcolor="#CCCCCC"><strong>Dirección</strong></th>
        <td colspan="3" align="center" bgcolor="#CCCCCC"><strong>Herramientas</strong></td>
        </tr>
      <?php	
	$mySql = "SELECT * FROM alumnos ORDER BY nombre ASC LIMIT $hal, $baris";
  $mySql2 = "SELECT * FROM alumnos ORDER BY carrera ASC LIMIT $hal, $baris";
  $mySql3 = "SELECT * FROM alumnos ORDER BY semestre ASC LIMIT $hal, $baris";

  if($carre == ""){
    $myQry = mysqli_query($koneksidb, $mySql)  or die ("Error : ".mysqli_error());
    $order = "";
  }

  if($carre == "1"){
    $myQry = mysqli_query($koneksidb, $mySql2)  or die ("Error : ".mysqli_error());
    $order = "&c=1";
  }

  if($semes == "1"){
    $myQry = mysqli_query($koneksidb, $mySql3)  or die ("Error : ".mysqli_error());
    $order = "&s=1";
  }

	$nomor = $hal; 
	while ($myData = mysqli_fetch_array($myQry)) {
		$nomor++;
		$Kode = $myData['id'];
	?>
      <tr>
        <td align="left"><?php echo $nomor; ?></td>
        <td align="left"><?php echo $myData['id']; ?></td>
        <td align="left"><?php echo $myData['nombre']; ?></td>
        <td align="left"><?php echo ucwords($myData['carrera']); ?></td> 
        <td align="left"><?php echo $myData['semestre']; ?></td>
        <td align="left"><?php echo $myData['estado']; ?></td>
        <td align="center"><a href="?open=editalumnos&Kode=<?php echo $Kode; ?>" target="_self" title="Editar Dato"><i class="glyphicon glyphicon-pencil"></i></a></td>
        <td align="center"><a href="?open=adeudos&Kode=<?php echo $Kode; ?>" title="Adeudos"><i class="glyphicon glyphicon-folder-open"></i></a></td>
        <td align="center"><a id="editar" href="?open=elialumnos&Kode=<?php echo $Kode; ?>" target="_self" title="Borrar Dato" onclick="return confirm('Seguro que va a eliminar los datos del alumno... ?')"><i class="glyphicon glyphicon-trash"></i></a></td>
      </tr>
      <?php } ?>
    </table></td>
  </tr>
  <tr class="selKecil">
    <td width="20"><b>Numero de Datos :</b> <?php echo $jumlah; ?> </td>
    <td width="384" align="right"><b>Pagina de :</b>
      <nav aria-label="Page navigation example">
  <ul class="pagination">
      <?php
  for ($h = 1; $h <= $maksData; $h++) {
    $list[$h] = $baris * $h - $baris;
    ?>
    <?php
		echo "<a href='?open=alumnos$order&hal=$list[$h]'>$h</a><label>,</label>";
	}
	?>
  </ul>
</nav>
    </td>
  </tr>
</table>
</div>