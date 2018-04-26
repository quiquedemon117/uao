<?php
include_once "library/inc.connection.php"; 
$tipo = $_POST['tipo'];
$carrera = $_POST['t10'];
$semestre = $_POST['t11'];
$consul2 = "SELECT clave_carrera FROM carrera WHERE nombre_carrera='".$carrera."'";
$lol = mysqli_query($koneksidb, $consul2) or die ('error1:'. mysqli_error($koneksidb));
$kari = mysqli_fetch_array($lol) or die ("error2: ".mysqli_error($koneksidb));
$buena = $kari['clave_carrera'];

$mySql = "SELECT nombre_materia, clave_materia FROM materias WHERE (semestre_cuatrimestre='".$semestre."' AND carrera_clave = '".$buena."')";
echo "<select>";
$myQry = mysqli_query($koneksidb, $mySql)  or die ("error3: ".mysqli_error($koneksidb));
 while ($myData = mysqli_fetch_array($myQry)) {

?>    
 <?php  echo "<option value='".$myData['nombre_materia']."'>".$myData['nombre_materia']." -- (".$myData['clave_materia'].")"."</option>"; ?>

<?php
 }
 echo "</select>";
?>
