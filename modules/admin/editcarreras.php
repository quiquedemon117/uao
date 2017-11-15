<?php
include_once "library/inc.sesadmin.php";

if(isset($_POST['btnSimpan'])){	
	$id	= $_POST['tid'];
	$carrera	= $_POST['t1'];
  $nombre = $_POST['t2'];
  $semestre = $_POST['t3'];
  $status = $_POST['t4'];
  $estado = $_POST['t5'];
		

		$mySql	= "UPDATE carrera SET
					nombre_carrera = '$carrera', modalidad_carrera = '$semestre' , categoria_carrera = '$status' , tipo_modulos = '$nombre',  num_modulos = '$estado' WHERE clave_carrera = '$id'";
		$myQry	= mysqli_query($koneksidb, $mySql)  or die ("error : ".mysqli_error());
		if($myQry){
			// Refresh
			echo "<meta http-equiv='refresh' content='0; url=?open=carreras'>";
		}
	}	

$Kode	= $_GET['Kode'];
$mySql = "SELECT * FROM carrera WHERE clave_carrera='$Kode'";
$myQry 	= mysqli_query($koneksidb, $mySql)  or die ("Error : ".mysqli_error());
$myData 	= mysqli_fetch_array($myQry);

	
?>
<div class="col-md-offset-3 col-md-6">
<div class="form-group">
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" name="frmadd" >
<table class="table table-hover table-striped" width="100%" style="margin-top:0px;">
    <tr>
      <th colspan="3" class="thead-inverse">EDITAR CARRERA</th>
    </tr>
    <tr>
      <td><strong>Clave </strong></td>
      <td><strong>:</strong></td>
      <td align="left"><input class="form-control" name="tid" value="<?php echo $myData['clave_carrera']; ?>" size="15" readonly maxlength="15" /></td>
    </tr>
     <tr>
      <td><strong>Nombre </strong></td>
      <td><strong>:</strong></td>
      <td align="left"><input class="form-control" name="t1" value="<?php echo $myData['nombre_carrera']; ?>" size="100" maxlength="100" /></td>
    </tr> 
    <tr>
      <td><strong>Modalidad </strong></td>
      <td><strong>:</strong></td>
      <td align="left"><input class="form-control" name="t2" value="<?php echo $myData['modalidad_carrera']; ?>" size="50" maxlength="50" /></td>
    </tr>
     <tr>
      <td><strong>Categoria </strong></td>
      <td><strong>:</strong></td>
      <td align="left"><input class="form-control" name="t3" value="<?php echo $myData['categoria_carrera']; ?>" size="30" maxlength="30" /></td>
    </tr> 
     <tr>
      <td><strong>Tipo </strong></td>
      <td><strong>:</strong></td>
      <td align="left"><input class="form-control" name="t4" value="<?php echo $myData['tipo_modulos']; ?>" size="20" maxlength="20" /></td>
    </tr>  
    <tr>
      <td><strong>Modulos </strong></td>
      <td><strong>:</strong></td>
      <td align="left"><input class="form-control" name="t5" value="<?php echo $myData['num_modulos']; ?>" size="20"  maxlength="20" /></td>
    </tr> 
    
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input class="btn btn-primary form-control" name="btnSimpan" type="submit" style="cursor:pointer;" value="GUARDAR" /></td>
    </tr>
  </table>
</form>
</div></div>
