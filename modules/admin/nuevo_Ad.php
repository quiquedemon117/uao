<?php
include_once "library/inc.sesadmin.php";
include_once "library/inc.library.php";
include_once "library/inc.connection.php";

if(isset($_POST['btnSimpan'])){
	$d1	=  $_POST['t1'];	
$d2	=  $_POST['t2'];
		$mySql	= "INSERT INTO departamento VALUES(UUID(),'$d1','$d2',Now())";
		$myQry	= mysqli_query($koneksidb, $mySql)  or die ("Error al agregar : ".mysqli_error());
		if($myQry){				
			// Refresh
			echo "<meta http-equiv='refresh' content='0; url=?open=adeudos&Kode=",$d1,"'>";
		}
	
 }


?>
<div class="col-md-offset-3 col-md-6">
<div class="form-group">
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" name="frmadd" >
<table class="table table-hover table-condensed" width="100%" style="margin-top:0px;">
	<tr>
	  <thead colspan="3" class="thead-inverse"><h1>Nuevo Adeudo</h1></thead>
	</tr>
	  <tr>
	  <td width="10%"><strong>Matricula</strong></td>
	  <td width="1%"><strong>:</strong></td>
	  <td width="85%" align="left"><input name="t1" class="form-control" size="10" maxlength="10" required/></td></tr>
	  <tr>
	  	<td><strong>Concepto</strong></td>
	  	<td><strong>:</strong></td>
	  	<td align="left"><input name="t2" class="form-control" type="text" value="" size="30" maxlength="30" required></td>
	  </tr>
	  
	<tr><td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td align="left"><input type="submit" class="btn btn-primary form-control" name="btnSimpan" value="Agregar" style="cursor:pointer;"></td>
    </tr>
</table>
</form>
</div>
</div>
