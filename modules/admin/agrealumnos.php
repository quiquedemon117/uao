<?php
include_once "library/inc.sesadmin.php";
include_once "library/inc.library.php";
include_once "library/inc.connection.php";
$pageSql = "SELECT MAX(id) FROM alumnos";
$vali = mysqli_query($koneksidb, $pageSql) or die ("error : ".mysqli_error());
while( $row = mysqli_fetch_array ( $vali ))
{
$valor =$row['MAX(id)'];
}	
$valid = $valor+1;

if(isset($_POST['btnSimpan'])){
$d1	=  $_POST['t1'];	
$d2	=  $_POST['t2'];
$d4	= $_POST['t4'] ;
$d14	= $_POST['t14'] ;
$d3	= $_POST['t3'] ;
$d5	=  $_POST['t5'];	
$d6	=  $_POST['t6'];
$d7	= $_POST['t7'] ;
$d8	= $_POST['t8'] ;
$d9	=  $_POST['t9'];	
$d10	=  $_POST['t10'];
$d11	= $_POST['t11'] ;
$d12	= $_POST['t12'] ;
		$mySql	= "INSERT INTO alumnos VALUES('$d1','$d2','$d4', '$d14','$d3','$d5','$d6','$d7','$d8','$d9','$d10','$d11','$d12')";
		$myQry	= mysqli_query($koneksidb, $mySql)  or die ("Error al agregar : ".mysqli_error());
		if($myQry){				
			// Refresh
			echo "<meta http-equiv='refresh' content='0; url=?open=alumnos'>";
		}
	
 }


?>
<div class="col-md-offset-3 col-md-6">
<div class="form-group">
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" name="frmadd" id="form">
<table class="table table-hover table-condensed" width="100%" style="margin-top:0px;">
	<tr>
	  <thead colspan="3" class="thead-inverse"><h1>Agregar alumnos</h1></thead>
	</tr>
	   <tr>
	  	<td><strong>Carrera</strong></td>
	  	<td><strong>:</strong></td>
	  	<td align="left"><select name='t2' required class="form-control" id="t2"><option></option>
<?php
$mySql2 = "SELECT nombre_carrera FROM carrera  ORDER BY nombre_carrera";
$myQry2 = mysqli_query($koneksidb, $mySql2)  or die ("error : ".mysqli_error($koneksidb));
 while ($myData = mysqli_fetch_array($myQry2)) {

?>    
 <option value='<?php  echo $myData['nombre_carrera']; ?>'><?php  echo ucwords($myData['nombre_carrera']); ?></option>

<?php
 } 
?>
	  	</select></td>
	  </tr>
	  <tr>
	  <td width="10%"><strong>Matricula</strong></td>
	  <td width="1%"><strong>:</strong></td>
	  <td width="85%" align="left"><input name="t1" class="form-control" value="<?php echo $valid;?>" size="10" maxlength="10" readonly / id="t1"></td></tr>
	  <tr>
	  	<td><strong>Nombre</strong></td>
	  	<td><strong>:</strong></td>
	  	<td align="left"><input name="t3" class="form-control" type="text" value="" size="50" maxlength="50" required></td>
	  </tr>
	  <tr>
	  	<td><strong>Semestre</strong></td>
	  	<td><strong>:</strong></td>
	  	<td align="left"><input name="t4" class="form-control" type="text" value="" size="5" maxlength="5" required></td>
	  </tr>
	  <tr>
	  	<td><strong>Status</strong></td>
	  	<td><strong>:</strong></td>
	  	<td align="left"><select name="t14" class="form-control" required ><option></option><option>INSCRITO</option><option>REINSCRITO</option><option>BAJA TEMPORAL</option><option>EGRESADO</option><option>REVALIDADO</option></select></td>
	  </tr>
	  <tr>
	  	<td><strong>Estado</strong></td>
	  	<td><strong>:</strong></td>
	  	<td align="left"><input name="t5" class="form-control" type="text" value="" size="30" maxlength="30" required></td>
	  </tr>
	  <tr>
	  	<td><strong>Municipio</strong></td>
	  	<td><strong>:</strong></td>
	  	<td align="left"><input name="t6" class="form-control" type="text" value="" size="30" maxlength="30" required></td>
	  </tr>
	  <tr>
	  	<td><strong>Localidad</strong></td>
	  	<td><strong>:</strong></td>
	  	<td align="left"><input name="t7" class="form-control" type="text" value="" size="30" maxlength="30" required></td>
	  </tr>
	  <tr>
	  	<td><strong>Codigo Postal</strong></td>
	  	<td><strong>:</strong></td>
	  	<td align="left"><input name="t8" class="form-control" type="number" value="" size="10" maxlength="6" required></td>
	  </tr>
	  <tr>
	  	<td><strong>Correo</strong></td>
	  	<td><strong>:</strong></td>
	  	<td align="left"><input name="t9" class="form-control" type="text" value="" size="50" maxlength="50" required></td>
	  </tr>
	  <tr>
	  	<td><strong>Sexo</strong></td>
	  	<td><strong>:</strong></td>
	  	<td align="left"><select name='t10' class="form-control" required ><option></option><option>M</option><option>F</option></select></td>
	  </tr>
	  <tr>
	  	<td><strong>Telefono</strong></td>
	  	<td><strong>:</strong></td>
	  	<td align="left"><input name="t11" class="form-control" type="number" value="" size="20" maxlength="20" required></td>
	  </tr>
	   <tr>
	  	<td><strong>Procedencia</strong></td>
	  	<td><strong>:</strong></td>
	  	<td align="left"><input name="t12" class="form-control" type="text" value="" size="70" maxlength="70" required></td>
	  </tr>
	<tr><td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td align="left"><button type="submit" class="btn btn-primary form-control" name="btnSimpan" value="Agregar" style="cursor:pointer;"><i class="glyphicon glyphicon-floppy-disk"></i> Agregar</button></td>
    </tr>
</table>
</form>
</div>
</div>

<script  type="text/javascript" charset="utf-8" async defer>
	$(document).ready(function(){
		$('#form').change(function(){
			var s = $('#t1').val();
			var ss = $('#t2').val();

			if(ss == 'licenciatura en administración-e'){
			var cadena = 'AD '+s+' 17/2 COAA 10';
				$('#t1').val(cadena);
			}

			if(ss == 'licenciatura en contaduría publica-e'){
			var cadena2 = 'CP '+s+' 17/2 AOCC 10';
				$('#t1').val(cadena2);
			}

			if(ss == 'licenciatura en ciencias políticas y administración publica-e'){
			var cadena3 = 'CA '+s+' 17/2 CUPD';
				$('#t1').val(cadena3);
			}

			if(ss == 'licenciatura en pedagogía-e'){
			var cadena4 = 'PE '+s+' 17/2 CUJT06';
				$('#t1').val(cadena4);
			}

			if(ss == 'ingeniería en gestión ambiental-e'){
			var cadena4 = 'GA '+s+' 17/2 PAPA';
				$('#t1').val(cadena4);
			}

			if(ss == 'ingeniería petrolera-e'){
			var cadena4 = 'PE '+s+' 17/2 CUJT06';
				$('#t1').val(cadena4);
			}

			if(ss == 'licenciatura en derecho-f'){
			var cadena4 = 'DE '+s+' 17/2 CAMI05';
				$('#t1').val(cadena4);
			}

			if(ss == 'licenciatura en psicología organizacional-f'){
			var cadena4 = 'PO '+s+' 17/2 SOCM';
				$('#t1').val(cadena4);
			}

			if(ss == 'licenciatura en informática administrativa-f'){
			var cadena4 = 'IA '+s+' 17/2 PEUC';
				$('#t1').val(cadena4);
			}

		});
	});
</script>
