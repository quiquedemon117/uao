<?php
include_once "library/inc.sesadmin.php"; 
include_once "library/inc.connection.php"; 
include_once "library/inc.library.php";
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<a href="?open=lista_alumnos" class="btn btn-default">Seguir Agregando</a>
			<br><br>
<?php
$carre=$_SESSION["carrera"];
$semes=$_SESSION["semestre"];
$products = $koneksidb->query("select * from alumnos where carrera='$carre' and semestre='$semes'");

if(isset($_SESSION["cart"]) && !empty($_SESSION["cart"])):
?>
<table class="table table-bordered">
<thead>
	<th>Matricla</th>
	<th>Nombre</th>
	<th>Calificacion</th>
	<th></th>
</thead>
<?php 
/*
* Apartir de aqui hacemos el recorrido de los productos obtenidos y los reflejamos en una tabla.
*/
foreach($_SESSION["cart"] as $c):
$products = $koneksidb->query("select * from alumnos where id=$c[product_id]");
$r = $products->fetch_object();
	?>
<tr>
<th><?php echo $r->id;?></th>
	<td><?php echo $r->nombre;?></td>
	<td><?php echo $c["q"]; ?></td>
	<td style="width:260px;">
	<?php
	$found = false;
	foreach ($_SESSION["cart"] as $c) { if($c["product_id"]==$r->id){ $found=true; break; }}
	?>
		<a href="?open=delfromcart&id=<?php echo $c["product_id"];?>" class="btn btn-danger">Eliminar</a>
	</td>
</tr>
<?php endforeach; ?>
</table>

<form class="form-horizontal" method="post" action="?open=process">
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Agregar Calificacion Al Sistema </button>
       <a href="?open=calificacion" class="btn btn-warning">Cancelar Todo</a>
    </div>
  </div>
</form>


<?php else:?>
	<p class="alert alert-warning">No hay calificaciones agregadas aun.</p>
<?php endif;?>
<br><br><hr>

		</div>
	</div>
</div>
</body>
</html>