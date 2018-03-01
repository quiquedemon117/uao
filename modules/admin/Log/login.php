<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../../../css/sweetalert.css">
<script src="../../../js/sweetalert.min.js" type="text/javascript"></script>
</head>
</html>
<?php
if(isset($_POST['txtUsername'])){
	session_start();
require('../library/inc.connection.php');
$usuario1= $_POST['txtUsername'];
$clave1= $_POST['txtPassword'];
$rs = mysqli_query($koneksidb, "SELECT * FROM usuarios WHERE Nombre='$usuario1' AND Password='$clave1'"); 
$_SESSION['SES_ADMIN'] = $usuario1;
if (mysqli_num_rows ($rs) !=0) {
$qr = mysqli_query($koneksidb, "SELECT id FROM usuarios WHERE Nombre='$usuario1' AND Password='$clave1'");
$row = mysqli_fetch_array($qr);
$_SESSION['ID_USER'] = $row['id'];
	print "<script> swal({
  type: 'success',
  title: 'Bienvenido',
  showConfirmButton: false,
  timer: 1500
},
function(){
  window.location.href='../principal.php';
}) </script>";
}
else
{
		print "<script> swal({
  type: 'error',
  title: 'El usuario y/o contraseña no coinciden',
  showConfirmButton: false,
  timer: 1500
},
function(){
  window.location.href='../../../index.html';
}) </script>";
}

mysqli_free_result($rs);}
?>
 
