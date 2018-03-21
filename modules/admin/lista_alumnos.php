<?php
include_once "library/inc.sesadmin.php"; 
include_once "library/inc.connection.php"; 
include_once "library/inc.library.php"; 

?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
    <h3>Asegurese de agregar calificacion a todos los alumnos antes de dar click en continuar</h3>
      <a href="?open=temporal" class="btn btn-warning">Continuar</a>
       <a href="?open=calificacion" class="btn btn-warning">Cancelar</a>
      <br><br>
<?php

if(!empty($_POST)){
$carre = $_POST['t10'];
$semes = $_POST['t11'];
$mat = $_POST['t12'];
$cont = 0;
$_SESSION["carrera"]=$carre;
$_SESSION["semestre"]=$semes;
$_SESSION["materia"]=$mat;

if($semes == "1"){
$products = $koneksidb->query("select * from alumnos where carrera='$carre' and semestre='$semes' and estatus='INSCRITO'");
}else{
$products = $koneksidb->query("select * from alumnos where carrera='$carre' and semestre='$semes' and estatus='REINSCRITO'");
}

$products2 = $koneksidb->query("select * from alumnos where carrera='$carre' and semestre='$semes'");
if (mysqli_num_rows ($products2) !=0)
{
while ($myData = mysqli_fetch_array($products2)) {
$valor1=$myData['id'];
}
$repetidos = mysqli_query($koneksidb, "SELECT * FROM `$carre` WHERE clave_alumno='$valor1' AND nombre_materia='$mat'"); 
if (mysqli_num_rows ($repetidos) !=0)
{
	
	print "<script> swal({
  type: 'success',
  title: 'Alumnos Ya Agregados',
  showConfirmButton: false,
  timer: 1500
},
function(){
  window.location.href='?open=calificacion';
}) </script>";
}}else{
print "<script> swal({
  type: 'error',
  title: 'No hay datos de alumnos',
  showConfirmButton: false,
  timer: 1500
},
function(){
  window.location.href='?open=calificacion';
}) </script>";

}

}
if(empty($_POST)){
$carre=$_SESSION["carrera"];
$semes=$_SESSION["semestre"]; 
if($semes == "1"){
$products = $koneksidb->query("select * from alumnos where carrera='$carre' and semestre='$semes' and estatus='INSCRITO'");
}else{
$products = $koneksidb->query("select * from alumnos where carrera='$carre' and semestre='$semes' and estatus='REINSCRITO'");
}

}


?>
<table class="table table-bordered table-condensed">
<thead>
  <th>Matricula</th>
  <th>Nombre</th>
  <th class="text-center">Calificacion</th>
</thead>
<?php 
/*
* Apartir de aqui hacemos el recorrido de los productos obtenidos y los reflejamos en una tabla.
*/
$i = 1;
while($r=$products->fetch_object()):?>
<?php $_SESSION['nf'] = $products->num_rows; ?>
<tr>
  <td><?php echo $r->id;?></td>
  <td><?php echo $r->nombre;?></td>
  <td align="center" style="width:260px;">
  <?php
  $found = false;

  if(isset($_SESSION["cart"])){ foreach ($_SESSION["cart"] as $c) { if($c["product_id"]==$r->id){ $found=true; break; }}}
  ?>
  <?php if($found):?>
    <a href="?open=lista_alumnos" class="btn btn-success"><i class="glyphicon glyphicon-saved"></i></a>
  <?php else:?>
  <form class="form-inline" method="post" action="?open=add_cali">
  <input type="hidden" name="product_id<?php echo $i; ?>" value="<?php echo $r->id; ?>">
  <input type="hidden" name="carrera<?php echo $i; ?>" value="<?php echo $r->carrera; ?>">
  <input type="hidden" name="materia<?php echo $i; ?>" value="<?php echo $_SESSION["materia"]; ?>">
    <div class="form-group">
      <input type="number" name="q<?php echo $i++; ?>" value="" style="width:80px;" min="1" class="form-control input-sm" placeholder="" required>
    </div>
  <?php endif; ?>
  </td>
</tr>
<?php endwhile;?>
</table>
    <button type="submit"  class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Guardar</button>
  </form> 
<br><br><hr>
    </div>
  </div>
</div>
