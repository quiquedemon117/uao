<?php
include_once "library/inc.sesadmin.php";
include_once "library/inc.library.php";
include_once "library/inc.connection.php";
?>
<h1 class="bnr-title" >Ingrese<span> Matricula</span></h1>
              <CENTER><form method="post" class="form-inline" role="form" action="">
                        <div class="form-group">
           <label class="sr-only" for="ejemplo_email_2">Matricula</label>
    <input type="text" name="matricula" class="form-control2"
           placeholder="Matricula" required=""></div>   
  <button type="submit" name="btnSimpan" class="btn btn-success">Cargar</button>
               </form></CENTER>

<?php
if(isset($_POST['btnSimpan'])){
$mat = $_POST['matricula'];
$mySql = "SELECT * FROM alumnos where id='$mat'";
	$myQry = mysqli_query($koneksidb, $mySql)  or die ("error : ".mysqli_error($koneksidb));
	if (mysqli_num_rows ($myQry) !=0){
 while ($myData = mysqli_fetch_array($myQry)) {
 	
 echo "
<div class='col-md-offset-3 col-md-6'>
<div class='form-group'>
<form action='pdf_kardex.php' method='post' enctype='multipart/form-data' name='frmadd' >
<table class='table table-hover table-striped' width='100%' style='margin-top:0px;'>
	<tr>
	  <thead colspan='3' class='thead-inverse'><h1>Datos Para Generar Kardex</h1></thead>
	</tr>
	 <tr>
	  <td width='10%'><strong>Matricula</strong></td>
	  <td width='1%'><strong>:</strong></td>
	  <td width='85%' align='left'><input name='t' class='form-control' value='",$myData['id'],"' size='10' maxlength='30' readonly /></td></tr>
	  <tr>
	  <td width='10%'><strong>Nombre</strong></td>
	  <td width='1%'><strong>:</strong></td>
	  <td width='85%' align='left'><input name='t1' class='form-control' value='",$myData['nombre'],"' size='10' maxlength='30' readonly /></td></tr>
	  <tr>
	  	<td><strong>Semestre</strong></td>
	  	<td><strong>:</strong></td>
	  	<td align='left'><input name='t2' class='form-control' type='text' value='",$myData['semestre'],"' size='30' maxlength='10' readonly required></td>
	  </tr>
	 <tr>
	  	<td><strong>Carrera</strong></td>
	  	<td><strong>:</strong></td>
	  	<td align='left'><input name='t3' class='form-control' type='text' value='",$myData['carrera'],"' size='50' maxlength='50' readonly required></td>
	  </tr>
	  <td><strong>Turno</strong></td>
	  	<td><strong>:</strong></td>
	  	<td align='left'><select name='t4' class='form-control2' required ><option>MATUTINO</option><option>VESPERTINO</option><option>NOCTURNO</option></select></td>
	  </tr>
	 <tr><td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td align='left'><input type='submit' class='btn btn-primary form-control' value='Generar Kardex' style='cursor:pointer;'></td>
    </tr>
</table>
</form>
</div>
</div>
";
# <tr>
	  	#<td><strong>Carrera</strong></td>
	  	#<td><strong>:</strong></td>
	  	#<td align='left'><input name='t4' class='form-control' type='text' value='",$myData['id'],"' size='30' maxlength='30' required></td>
	  #</tr>
}}
else
{
		print "<script> swal({
  type: 'error',
  title: 'No hay datos de alumnos',
  showConfirmButton: false,
  timer: 1500
},
function(){
  window.location.href='?open=kardex';
}) </script>";

}} ?>