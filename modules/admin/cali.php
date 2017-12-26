<?php
if(isset($_POST['btnSimpan2'])){
$cal = $_POST['rs'];
$id2 = $_POST['rs2'];
$carre2=$_SESSION['carrera'];
$mat2=$_SESSION['materia'];

    $mySql  = "UPDATE `$carre2` SET
          calificacion  = '$cal' WHERE clave_alumno = '$id2' and nombre_materia='$mat2'";
    $myQry  = mysqli_query($koneksidb ,$mySql)  or die ("Query salah : ".mysqli_error());
    if($myQry){
      // Refresh
      echo "<meta http-equiv='refresh' content='0; url=?open=act_cali'>";
    }

}
?>	