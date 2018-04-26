<?php
include_once "library/inc.sesadmin.php"; 
include_once "library/inc.connection.php"; 
include_once "library/inc.library.php"; 

?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
    <h3>Asegurese de agregar calificacion a todos los alumnos antes de dar click en continuar</h3>
      <a href="?open=temporal_k" class="btn btn-warning">Continuar</a>
       <a href="?open=calificacion_kardex" class="btn btn-warning">Cancelar</a>
      <br><br>
<?php

if(!empty($_POST)){
$carre = $_POST['t10'];
$semes = $_POST['t11'];
$mat = $_POST['t12'];
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
  <th>1P</th>
  <th>2P</th>
  <th>3P</th>
  <th>EF</th>
  <th>PF</th>
  <th></th>
</thead>
<?php 
/*
* Apartir de aqui hacemos el recorrido de los productos obtenidos y los reflejamos en una tabla.
*/
$i = 1;
while($r=$products->fetch_object()):?>
<?php $lol = $i++; ?>
<tr>
  <td><?php echo $r->id;?></td>
  <td><?php echo $r->nombre; ?></td>
  <td>
  <?php
  $found = false;

  if(isset($_SESSION["cart2"])){ foreach ($_SESSION["cart2"] as $c) { if($c["product_id2"]==$r->id){ $found=true; break; }}}
  ?>
  <?php if($found):?>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><a href="?open=lista_alumnos" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i></a></td>
   
  <?php else:?>
  
  <form class="form-inline" method="post" action="?open=addtocart_kardex">
    <div class="form-group">
  <input type="hidden" name="product_id2" value="<?php echo $r->id; ?>">
      <input type="number" name="primerp" id="primerp<?php echo $lol; ?>" value="" style="width:60px;" min="0" class="form-control input-sm" placeholder="No." required>
    </div>
  </td>
  <td>
    <div class="form-group">
  <input type="hidden" name="product_id2" value="<?php echo $r->id; ?>">
      <input type="number" name="segundop" id="segundop<?php echo $lol; ?>" value="" style="width:60px;" min="0" class="form-control input-sm" placeholder="No." required>
    </div>
  </td>
  <td>
    <div class="form-group">
  <input type="hidden" name="product_id2" value="<?php echo $r->id; ?>">
      <input type="number" name="tercerp" id="tercerp<?php echo $lol; ?>" value="" style="width:60px;" min="0" class="form-control input-sm" placeholder="No." required>
    </div>
  </td>
  <td>
    <div class="form-group">
  <input type="hidden" name="product_id2" value="<?php echo $r->id; ?>">
      <input type="number" name="examenf" id="examenf<?php echo $lol; ?>" value="" style="width:60px;" min="0" class="form-control input-sm" placeholder="No." required>
    </div>
  </td>
  <td>
    <div class="form-group">
  <input type="hidden" name="product_id2" value="<?php echo $r->id; ?>">
      <input type="number" name="promediof" id="promediof<?php echo $lol; ?>" value="" style="width:70px;" min="0" class="form-control input-sm" placeholder="PF" readonly="readonly">
    </div>
   </td>
   <td>
    <button type="submit" name="subir" class="btn btn-primary"><i class="glyphicon glyphicon-upload"></i></button>
    </td>
  </form>
  <?php endif; ?>
</tr>
<?php
echo '<script type="text/javascript">
$(document).ready(function(){
  $("input[type=number]").keyup(function(){
    var a = parseInt($("#primerp'.$lol.'").val(), 10);
    var b = parseInt($("#segundop'.$lol.'").val(), 10);
    var c = parseInt($("#tercerp'.$lol.'").val(), 10);
    var d = parseInt($("#examenf'.$lol.'").val(), 10);
    var suma = a+b+c+d;
    var promedio = suma/4;

      if(promedio >= 6.5 && promedio <= 7){
        promedio = 7;
      }

      else if(promedio >= 7.5 && promedio <= 8){
        promedio = 8;
      }

      else if(promedio >= 8.5 && promedio <= 9){
        promedio = 9;
      }

      else if(promedio >= 9.5 && promedio <= 10){
        promedio = 10;
      }

    $("#promediof'.$lol.'").val(promedio);
  });

  $("input[type=number]").click(function(){
    var a = parseInt($("#primerp'.$lol.'").val(), 10);
    var b = parseInt($("#segundop'.$lol.'").val(), 10);
    var c = parseInt($("#tercerp'.$lol.'").val(), 10);
    var d = parseInt($("#examenf'.$lol.'").val(), 10);
    var suma = a+b+c+d;
    var promedio = suma/4;

      if(promedio >= 6.5 && promedio <= 7){
        promedio = 7;
      }

      else if(promedio >= 7.5 && promedio <= 8){
        promedio = 8;
      }

      else if(promedio >= 8.5 && promedio <= 9){
        promedio = 9;
      }

      else if(promedio >= 9.5 && promedio <= 10){
        promedio = 10;
      }

    $("#promediof'.$lol.'").val(promedio);
  });
});
</script>';
?>
<?php endwhile; ?>
</table>
<br><br><hr>

    </div>
  </div>
</div>
