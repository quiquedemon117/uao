<?php
include_once "library/inc.sesadmin.php";
include_once "library/inc.library.php";
include_once "library/inc.connection.php";

if(isset($_POST['btnSimpan'])){
$docente	=  $_POST['docente'];	

		$mySql	= "INSERT INTO docente (nombre_docente) VALUES('$docente')";
		$myQry	= mysqli_query($koneksidb, $mySql)  or die ("Error al agregar : ".mysqli_error());
		if($myQry){				
			// Refresh
			echo "<script> swal({
  type: 'success',
  title: 'Los datos se registraron correctamente',
  showConfirmButton: false,
  timer: 1500
},
function(){
  window.location.href='?open=verdocentes';
}) </script>";
		}
	
 }


?>
<div class="col-md-offset-3 col-md-6">
<div class="form-group">
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" name="frmadd" >
<table class="table table-hover table-condensed" width="100%" style="margin-top:0px;">
	<tr>
	  <thead colspan="3" class="thead-inverse"><h1>Agregar Docente</h1></thead>
	</tr>
	  	<td><strong>Nombre</strong></td>
	  	<td><strong>:</strong></td>
	  	<td align="left"><input name="docente" class="form-control" type="text" value="" size="50" maxlength="250" required></td>
	  </tr>
	<tr><td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td align="left"><button type="submit" class="btn btn-primary form-control" name="btnSimpan" value="Agregar" style="cursor:pointer;"><i class="glyphicon glyphicon-floppy-disk"></i> Agregar</button></td>
    </tr>
</table>
</form>
</div>
</div>
