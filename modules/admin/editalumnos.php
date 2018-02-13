<?php
include_once "library/inc.sesadmin.php";

if(isset($_POST['btnSimpan'])){	
	$id	= $_POST['tid'];
	$carrera	= $_POST['t1'];
  $nombre = $_POST['t2'];
  $semestre = $_POST['t3'];
  $status = $_POST['t11'];
  $estado = $_POST['t4'];
  $municipio = $_POST['t5'];
  $localidad = $_POST['t6'];
  $cp = $_POST['t7'];
  $correo = $_POST['t8'];
  $sexo = $_POST['t9'];
  $telefono = $_POST['t10'];
  $Procedencia = $_POST['t19'];
		

		$mySql	= "UPDATE alumnos SET
					carrera = '$carrera', semestre = '$semestre' , estatus = '$status' , nombre = '$nombre',  estado = '$estado', municipio = '$municipio', localidad = '$localidad', cp = '$cp',  correo = '$correo', sexo = '$sexo', telefono = '$telefono', procedencia = '$procedencia' WHERE id = '$id'";
		$myQry	= mysqli_query($koneksidb, $mySql)  or die ("error : ".mysqli_error());
		if($myQry){
			// Refresh
			echo "<meta http-equiv='refresh' content='0; url=?open=alumnos'>";
		}
	}	

$Kode	= $_GET['Kode'];
$mySql = "SELECT id, nombre, carrera, semestre, estatus, estado, municipio, localidad, cp, correo, sexo, telefono, procedencia FROM alumnos WHERE id='$Kode'";
$myQry 	= mysqli_query($koneksidb, $mySql)  or die ("Error : ".mysqli_error());
$myData 	= mysqli_fetch_array($myQry);

	
?>
<div class="col-md-offset-3 col-md-6">
<div class="form-group">
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" name="frmadd" >
<table class="table table-hover table-striped" width="100%" style="margin-top:0px;">
    <tr>
      <th colspan="3" class="thead-inverse">EDITAR ALUMNO</th>
    </tr>
    <tr>
      <td><strong>Matricula </strong></td>
      <td><strong>:</strong></td>
      <td align="left"><input class="form-control" name="tid" value="<?php echo $myData['id']; ?>" size="15" maxlength="15" /></td>
    </tr>
     <tr>
      <td><strong>Nombre </strong></td>
      <td><strong>:</strong></td>
      <td align="left"><input class="form-control" name="t2" value="<?php echo $myData['nombre']; ?>" size="180" maxlength="100" /></td>
    </tr> 
    <tr>
      <td><strong>Carrera </strong></td>
      <td><strong>:</strong></td>
      <td align="left"><select class="form-control">
        <?php
        $querys = mysqli_query($koneksidb, "SELECT nombre_carrera FROM carrera") or die ("Error : ".mysqli_error());
        while ($valores = mysqli_fetch_array($querys)) {
        echo '<option value="'.$valores['nombre_carrera'].'">'.$valores['nombre_carrera'].'</option>';
}
        ?>
      </select></td>
    </tr>
     <tr>
      <td><strong>Semestre </strong></td>
      <td><strong>:</strong></td>
      <td align="left"><input class="form-control" name="t3" value="<?php echo $myData['semestre']; ?>" size="5" maxlength="5" /></td>
    </tr> 
     <tr>
      <td><strong>Status </strong></td>
      <td><strong>:</strong></td>
      <td align="left"><select class="form-control" name="t11" required ><option><?php echo $myData['estatus']; ?></option><option>INSCRITO</option><option>REINSCRITO</option><option>BAJA TEMPORAL</option><option>EGRESADO</option><option>REVALIDADO</option></select></td>
    </tr>  
    <tr>
      <td><strong>Estado </strong></td>
      <td><strong>:</strong></td>
      <td align="left"><input class="form-control" name="t4" value="<?php echo $myData['estado']; ?>" size="20"  maxlength="20" /></td>
    </tr> 
    <tr>
      <td><strong>Municipio </strong></td>
      <td><strong>:</strong></td>
      <td align="left"><input class="form-control" name="t5" value="<?php echo $myData['municipio']; ?>" size="20" maxlength="20" /></td>
    </tr> 
      <tr>
      <td><strong>Localidad </strong></td>
      <td><strong>:</strong></td>
      <td align="left"><input class="form-control" name="t6" value="<?php echo $myData['localidad']; ?>" size="20" maxlength="20" /></td>
    </tr>
    <tr>
      <td><strong>Codigo Postal </strong></td>
      <td><strong>:</strong></td>
      <td align="left"><input class="form-control" name="t7" value="<?php echo $myData['cp']; ?>" size="6" maxlength="6" /></td>
    </tr>
    <tr>
      <td><strong>Correo </strong></td>
      <td><strong>:</strong></td>
      <td align="left"><input class="form-control" name="t8" value="<?php echo $myData['correo']; ?>" size="50" maxlength="50" /></td>
    </tr>
    <tr>
      <td><strong>Sexo </strong></td>
      <td><strong>:</strong></td>
      <td align="left"><input class="form-control" name="t9" value="<?php echo $myData['sexo']; ?>" size="5" maxlength="1" /></td>
    </tr>
    <tr>
      <td><strong>Telefono </strong></td>
      <td><strong>:</strong></td>
      <td align="left"><input class="form-control" name="t10" value="<?php echo $myData['telefono']; ?>" size="15" maxlength="10" /></td>
    </tr>
    <tr>
      <td><strong>Procedencia </strong></td>
      <td><strong>:</strong></td>
      <td align="left"><input class="form-control" name="t19" value="<?php echo $myData['procedencia']; ?>" size="100" maxlength="100" /></td>
    </tr> 
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input class="btn btn-primary form-control" name="btnSimpan" type="submit" style="cursor:pointer;" value="GUARDAR" /></td>
    </tr>
  </table>
</form>
</div></div>
