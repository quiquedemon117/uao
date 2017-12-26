<?php
if(!empty($_POST['carrera']) ){
$carre = $_POST['carrera'];
$semes = $_POST['semestre'];
$mat = $_POST['materia'];
$_SESSION["carrera"]=$carre;
$_SESSION["semestre"]=$semes;
$_SESSION["materia"]=$mat;
$pageSql = "SELECT * FROM alumnos where carrera='$carre' and semestre='$semes'";
$pageQry = mysqli_query($koneksidb, $pageSql) or die ("error : ".mysqli_error());
}
else if(empty($_POST['carrera']) ){
$carre = $_SESSION['carrera'];
$semes = $_SESSION['semestre'];
$mat = $_SESSION['materia']; 
$pageSql = "SELECT * FROM alumnos where carrera='$carre' and semestre='$semes'";
$pageQry = mysqli_query($koneksidb, $pageSql) or die ("error : ".mysqli_error());
}
?>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="table-common">
  <tr>
    <td colspan="2" align="left"><h2><b>CALIFICACIONES:  <?php echo $mat; ?></b></h2></td>
  </tr>
  
  <tr>
    <td colspan="2"></td>
  </tr>
  <tr>
    <td colspan="2">
    <form method="post" class="form-inline" role="form" action="?open=cali">
  <table class="table-list table table-hover table-condensed" width="100%" border="0" cellspacing="1" cellpadding="2">
      <tr class="info">
        <th width="10%" align="center" bgcolor="#CCCCCC"><strong>Id</strong></th>
        <th width="50%" bgcolor="#CCCCCC"><strong>Nombre</strong></th>
        <th width="10%" bgcolor="#CCCCCC"><strong>Calificacion</strong></th>
        <td colspan="1" align="center" bgcolor="#CCCCCC"><strong>Actualizar calificacion</strong></td>
        </tr>
      <?php 
 while( $row = mysqli_fetch_array ( $pageQry ))
   {
          $valor =$row["id"];
          $valor2 =$row["nombre"];
  $mySql3 = "SELECT * FROM `$carre` where clave_alumno='$valor' and nombre_materia='$mat'";
  $myQry3 = mysqli_query($koneksidb, $mySql3)  or die ("Error : ".mysqli_error());
  while ($myData = mysqli_fetch_array($myQry3)) {
    $valor3=$myData['calificacion'];
  ?>
      <tr>
        <td align="left" ><input name='rs2' value='<?php echo $myData['clave_alumno']; ?>'></td>
        <td align="left" ><?php echo $valor2; ?></td>
        <td align="left" ><input name='rs' value='<?php echo $valor3; ?>'></td>
        <td width="44" align="center"><button type="submit" name="btnSimpan2" class="btn btn-success">ACTUALIZAR</button></td>
      </tr>
      <?php }} ?>
    </table></form> </td>
  </tr>
</table>    