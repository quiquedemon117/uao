<?php
include_once "library/inc.connection.php"; 
include_once "library/inc.library.php";
if(!empty($_POST['t10']) || !empty($_POST['t11']) || !empty($_POST['t12'])){
$carre = $_POST['t10'];
$semes = $_POST['t11'];
$mat = $_POST['t12'];
$_SESSION["carrera"]=$carre;
$_SESSION["semestre"]=$semes;
$_SESSION["materia"]=$mat;
$pageSql = "SELECT * FROM alumnos where carrera='$carre' and semestre='$semes'";
$pageQry = mysqli_query($koneksidb, $pageSql) or die ("error : ".mysqli_error());
}
else if(empty($_POST['t10'])){
$pageSql = "SELECT * FROM alumnos where carrera='$carre' and semestre='$semes'";
$pageQry = mysqli_query($koneksidb, $pageSql) or die ("error : ".mysqli_error());
}
?>
<h5 class="text-center"><b>CALIFICACIONES: <br>  <?php echo $mat; ?></b></h5>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered table-condensed">
        <thead class="info">
  <th>Matricula</th>
  <th>Nombre</th>
  <th class="text-center">1P</th>
  <th class="text-center">2P</th>
  <th class="text-center">3P</th>
  <th class="text-center">EF</th>
  <th class="text-center">PF</th>
  <th class="text-center">Calificasión Final</th>
  <th class="text-center">Subir Calificasión</th>
</thead>
<?php
$lord = mysqli_query($koneksidb, "SELECT * FROM kardex");
while ($rows = mysqli_fetch_array($lord)) { ?>
<tr>
  <form action="?open=update_cali" method="post">
  <input type="text" name="oculto" class="hidden" value="<?php echo $rows['clave_alumno']; $id=$rows['clave_alumno'];?>">
  <td><?php echo $rows['clave_alumno']; $id=$rows['clave_alumno'];?></td>
  <td><?php 
  $rs = mysqli_query($koneksidb, "SELECT nombre FROM alumnos WHERE id='$id'"); 
  $lol = mysqli_fetch_array($rs);
  echo $lol['nombre'];?></td>
  <td align="center"><input type="number" class="form-control" name="1p" value="<?php echo $rows['primer_p']; ?>" style="width:60px;"></td>
  <td align="center"><input type="number" class="form-control" name="2p" value="<?php echo $rows['segundo_p']; ?>" style="width:60px;"></td>
  <td align="center"><input type="number" class="form-control" name="3p" value="<?php echo $rows['tercer_p']; ?>" style="width:60px;"></td>
  <td align="center"><input type="number" class="form-control" name="ef" value="<?php echo $rows['examen_f']; ?>" style="width:60px;"></td>
  <td align="center"><input type="number" class="form-control" name="pf" value="<?php echo $rows['promedio_f']; ?>" style="width:60px;"></td>
  <td align="center"><input type="number" class="form-control" name="cf" value="<?php echo $rows['promedio_f']; ?>" style="width:60px;"></td>
  <td align="center"><button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-save"></i></button></td>
      </form>
</tr>
<?php } ?>
      </table>
    </div>
  </div>
</div>
