<?php
include_once "library/inc.sesadmin.php";
include_once "library/inc.library.php";
include_once "library/inc.connection.php";
$id_userS = $_SESSION['ID_USER'];
?>
<h1 class="bnr-title" >Ingrese Datos Para Generar<span> Constancia De Calificciones</span></h1>
              <CENTER><form method="post" class="form-inline" role="form" id="form2" action="">
                        <div class="form-group">
    <label class="sr-only" for="ejemplo_email_2">Carrera</label>
     <select name='t10' class="form-control2" required ><option></option>
<?php
$mySql = "SELECT nombre_carrera FROM carrera  ORDER BY nombre_carrera";

$mySql2 = "SELECT nombre_carrera FROM carrera WHERE categoria_carrera = 'Licenciatura' OR categoria_carrera = 'Especialidad' ORDER BY nombre_carrera";

$mySql3 = "SELECT nombre_carrera FROM carrera WHERE categoria_carrera = 'Maestria' ORDER BY nombre_carrera";

if($id_userS == null){
$myQry = null;
}
else if($id_userS == "1"){
$myQry = mysqli_query($koneksidb, $mySql)  or die ("error : ".mysqli_error($koneksidb));
}
else if($id_userS == "2"){
$myQry = mysqli_query($koneksidb, $mySql2)  or die ("error : ".mysqli_error($koneksidb));
}
else if($id_userS == "3"){
$myQry = mysqli_query($koneksidb, $mySql3)  or die ("error : ".mysqli_error($koneksidb));
}
 while ($myData = mysqli_fetch_array($myQry)) {

?>    
 <?php  echo "<option value='".$myData['nombre_carrera']."'>".ucwords($myData['nombre_carrera'])."</option>"; ?>

<?php
 } 
?>
  </select></div> <div class="form-group">
           <label class="sr-only" for="ejemplo_email_2">Semestre</label>
    <input type="number" name="t11" class="form-control2"
           placeholder="Semestre" required="" id="semestreM"></div> <div class="form-group">
   <label class="sr-only" for="ejemplo_password_2">Materia</label>
   <select name='materia' class="form-control2" id="selectM" required ><option></option>

  </select>
      </div>   
  
  <button type="submit" name="btnSimpan" class="btn btn-success">Cargar</button>
               </form></CENTER>

<?php
if(isset($_POST['btnSimpan'])){
if(empty($_POST['t10']) ){
echo "<meta http-equiv='refresh' content='0; url=?open=constancias'>";
}
else{
$carre = $_POST['t10'];
$semes = $_POST['t11'];
$mat = $_POST['materia'];
$mySql = "SELECT * FROM alumnos where carrera='$carre' and semestre='$semes'";
	$myQry = mysqli_query($koneksidb, $mySql)  or die ("error : ".mysqli_error($koneksidb));
	if (mysqli_num_rows ($myQry) !=0)
{
$compara1 = '-f';
$compara2 = '-e';
$pos = strpos($carre, $compara2);
if($pos === false){
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
	  <td width='85%' align='left'><input name='t1' class='form-control' value='",$carre,"' size='10' maxlength='30' readonly /></td></tr>
	  <tr>
	  	<td><strong>Semestre</strong></td>
	  	<td><strong>:</strong></td>
	  	<td align='left'><input name='t3' class='form-control' type='text' value='",$semes,"' size='30' maxlength='10' readonly required></td>
	  </tr>
	 <tr>
	  	<td><strong>Materia</strong></td>
	  	<td><strong>:</strong></td>
	  	<td align='left'><input name='t4' class='form-control' type='text' value='",$mat,"' size='30' maxlength='50' readonly required></td>
	  </tr>
	   <tr>
	  	<td><strong>Dtr. S. Escolares</strong></td>
	  	<td><strong>:</strong></td>
	  	<td align='left'><input name='t7' class='form-control' type='text' value='C. FRANCISCO MAGAÑA CASTELLANO' size='30' maxlength='50'  readonly></td>
	  </tr>
	   <tr>
	  	<td><strong>Turno</strong></td>
	  	<td><strong>:</strong></td>
	  	<td align='left'><select name='t6' class='form-control2' required ><option>MATUTINO</option><option>VESPERTINO</option><option>NOCTURNO</option></select></td>
	  </tr>
	  <tr>
	  	<td><strong>Maestro</strong></td>
	  	<td><strong>:</strong></td>
	  	<td align='left'>
	 <select name='t5' class='form-control2' required ><option></option>";
$mySql5 = "SELECT nombre_docente FROM docente  ORDER BY nombre_docente";
$myQry5 = mysqli_query($koneksidb, $mySql5)  or die ("error : ".mysqli_error($koneksidb));
 while ($myData = mysqli_fetch_array($myQry5)) {
echo "<option>",$myData['nombre_docente'],"</option>";} 
 echo "</td>
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
}else{
	echo "
<div class='col-md-offset-3 col-md-6'>
<div class='form-group'>
<form action='pdf2.php' method='post' enctype='multipart/form-data' name='frmadd' >
<table class='table table-hover table-striped' width='100%' style='margin-top:0px;'>
	<tr>
	  <thead colspan='3' class='thead-inverse'><h1>Datos Para Generar Constancia</h1></thead>
	</tr>
	  <tr>
	  <td width='10%'><strong>Carrera</strong></td>
	  <td width='1%'><strong>:</strong></td>
	  <td width='85%' align='left'><input name='t1' class='form-control' value='",$carre,"' size='10' maxlength='30' readonly /></td></tr>
	  <tr>
	  	<td><strong>Semestre</strong></td>
	  	<td><strong>:</strong></td>
	  	<td align='left'><input name='t3' class='form-control' type='text' value='",$semes,"' size='30' maxlength='10' readonly required></td>
	  </tr>
	 <tr>
	  	<td><strong>Materia</strong></td>
	  	<td><strong>:</strong></td>
	  	<td align='left'><input name='t4' class='form-control' type='text' value='",$mat,"' size='30' maxlength='50' readonly required></td>
	  </tr>
	   <tr>
	  	<td><strong>Dtr. S. Escolares</strong></td>
	  	<td><strong>:</strong></td>
	  	<td align='left'><input name='t7' class='form-control' type='text' value='LIC. ALEJANDRO DE LA CRUZ ANGULO' size='30' maxlength='50'  readonly></td>
	  </tr>
	   <tr>
	  	<td><strong>Turno</strong></td>
	  	<td><strong>:</strong></td>
	  	<td align='left'><select name='t6' class='form-control2' required ><option>MATUTINO</option><option>VESPERTINO</option><option>NOCTURNO</option></select></td>
	  </tr>
	  <tr>
	  	<td><strong>Maestro</strong></td>
	  	<td><strong>:</strong></td>
	  	<td align='left'>
	 <select name='t5' class='form-control2' required ><option></option>";
$mySql5 = "SELECT nombre_docente FROM docente  ORDER BY nombre_docente";
$myQry5 = mysqli_query($koneksidb, $mySql5)  or die ("error : ".mysqli_error($koneksidb));
 while ($myData = mysqli_fetch_array($myQry5)) {
echo "<option>",$myData['nombre_docente'],"</option>";} 
 echo "</td>
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
}
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

          <script type="text/javascript">
                $(document).ready(function() {
                  $('#form2').change(function(){
                    $.ajax({
                            type: "POST",
                            url: "selector.php",
                            data: $("#form2").serialize(),
                            success: function(data)
                            {
                                $('#selectM').html(data).fadeIn();
                            }
                      });
                    });
                  });
            </script>