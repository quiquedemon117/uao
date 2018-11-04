<?php
session_start();
sleep(3);
if(isset($_POST['txtUsername']) && isset($_POST['txtPassword'])){
require('../library/inc.connection.php');
$usuario1= $_POST['txtUsername'];
$clave1= $_POST['txtPassword'];
$rs = mysqli_query($koneksidb, "SELECT * FROM usuarios WHERE Nombre='$usuario1' AND Password='$clave1'"); 
$_SESSION['SESADMIN'] = $usuario1;
if (mysqli_num_rows ($rs) !=0) {
$qr = mysqli_query($koneksidb, "SELECT * FROM usuarios WHERE Nombre='$usuario1' AND Password='$clave1'");
$row = mysqli_fetch_array($qr);
    if($_SESSION['IDUSER'] = $row['id'] && $_SESSION['NAMEUSER'] = $row['Nombre']){
    	print "<script> swal({
      type: 'success',
      title: 'Bienvenido ".$_SESSION['NAMEUSER']."',
      showConfirmButton: false,
      timer: 1500
    },
    function(){
      window.location.href='modules/admin/principal.php';
    }) </script>";}
    }
else{
		print "<script> swal({
  type: 'error',
  title: 'El usuario y/o contraseña son incorrectos',
  showConfirmButton: false,
  timer: 3000
},
function(){
  window.location.href='index.php';
}) </script>";
}

mysqli_free_result($rs);}
?>
 
