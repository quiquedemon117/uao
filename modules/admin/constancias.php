<?php
include_once "library/inc.sesadmin.php";
include_once "library/inc.library.php";
include_once "library/inc.connection.php";
?>
<h1 class="bnr-title" >Ingrese Datos Para Generar<span> Constancia De Calificciones</span></h1>
              <CENTER><form method="post" class="form-inline" role="form" action="">
                        <div class="form-group">
    <label class="sr-only" for="ejemplo_email_2">Carrera</label>
    <select name='carrera' required class="form-control" required=""><option></option><option>Ing. Sistemas Computacionales</option><option>Licenciatura en Administracion</option><option>Licenciatura en Ciencias Politcas</option><option>Licenciatura en Contaduria Publica</option><option>Maestria en Derecho Fiscal</option><option>Licenciatura Pedagogia</option></select>
           <label class="sr-only" for="ejemplo_email_2">Semestre</label>
    <input type="number" name="semestre" class="form-control"
           placeholder="Semestre" required="">
  </div>
  <button type="submit" name="btnSimpan" class="btn btn-success">Cargar</button>
               </form></CENTER>

<?php
if(isset($_POST['btnSimpan'])){
if(empty($_POST['carrera']) ){
echo "<meta http-equiv='refresh' content='0; url=?open=constancias'>";
}
else{
$carre = $_POST['carrera'];
$semes = $_POST['semestre'];
$mySql = "SELECT * FROM alumnos where carrera='$carre' and semestre='$semes'";
	$myQry = mysqli_query($koneksidb, $mySql)  or die ("error : ".mysqli_error($koneksidb));
	if (mysqli_num_rows ($myQry) !=0)
{
		
 echo "
<div class='col-md-offset-3 col-md-6'>
<div class='form-group'>
<form action='pdf.php' method='post' enctype='multipart/form-data' name='frmadd' >
<table class='table table-hover table-striped' width='100%' style='margin-top:0px;'>
	<tr>
	  <thead colspan='3' class='thead-inverse'><h1>Datos Para Generar Constancia</h1></thead>
	</tr>
	  <tr>
	  <td width='10%'><strong>Carrera</strong></td>
	  <td width='1%'><strong>:</strong></td>
	  <td width='85%' align='left'><input name='t1' class='form-control' value='",$carre,"' size='10' maxlength='10' readonly /></td></tr>
	  <tr>
	  	<td><strong>Semestre</strong></td>
	  	<td><strong>:</strong></td>
	  	<td align='left'><input name='t3' class='form-control' type='text' value='",$semes,"' size='30' maxlength='30' required></td>
	  </tr>
	 
	<tr><td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td align='left'><input type='submit' class='btn btn-primary form-control' value='Generar Constancia' style='cursor:pointer;'></td>
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
}
else
{
		print "<script> swal({
  type: 'error',
  title: 'No hay datos de alumnos',
  showConfirmButton: false,
  timer: 1500
},
function(){
  window.location.href='?open=constancias';
}) </script>";
}
}} ?>