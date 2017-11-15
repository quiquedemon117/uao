<?php
include_once "library/inc.sesadmin.php"; 
include_once "library/inc.connection.php"; 
include_once "library/inc.library.php";   

?>
  <div class="wrapper">
        <div class="container">
          <div class="row">
            <div class="banner-info text-center wow fadeIn delay-05s">
              <h1 class="bnr-title" >Seleccionar: Carrera, Semestre y Materia</span></h1>
              <CENTER><form method="post" class="form-inline" role="form" action="">
                        <div class="form-group">
    <label class="sr-only" for="ejemplo_email_2">Carrera</label>
     <select name='t10' class="form-control2" required ><option></option>
<?php
$mySql = "SELECT nombre_carrera FROM carrera  ORDER BY nombre_carrera";
$myQry = mysqli_query($koneksidb, $mySql)  or die ("error : ".mysqli_error($koneksidb));
 while ($myData = mysqli_fetch_array($myQry)) {

?>    
 <option><?php  echo $myData['nombre_carrera']; ?></option>

<?php
 } 
?>
  </select>
  </div>
  <div class="form-group">
    <label class="sr-only" for="ejemplo_password_2">Semestre</label>
  <input width="40%" type="number" name="t11" class="form-control2" id="t11" 
           placeholder="Semestre">
  </div>
   <div class="form-group">
    <label class="sr-only" for="ejemplo_password_2">Materia</label>
   <select name='t12' class="form-control2" required ><option></option>
<?php
$mySql2 = "SELECT nombre_materia FROM materias  ORDER BY nombre_materia";
$myQry2 = mysqli_query($koneksidb, $mySql2)  or die ("error : ".mysqli_error($koneksidb));
 while ($myData = mysqli_fetch_array($myQry2)) {

?>    
 <option><?php  echo $myData['nombre_materia']; ?></option>

<?php
 } 
?>
  </select>
  </div>
  <button type="submit" name="btnSimpan" class="btn btn-success">Aceptar</button>
               </form></CENTER><hr>
            </div>
          </div>
        </div>
        </div>

<?php
if(isset($_POST['btnSimpan2'])){
session_start();
if(!empty($_POST)){
  if(isset($_POST["product_id"]) && isset($_POST["q"])){
    // si es el primer producto simplemente lo agregamos
    if(empty($_SESSION["cart"])){
      $_SESSION["cart"]=array( array("product_id"=>$_POST["product_id"],"q"=> $_POST["q"]));
    }else{
      // apartie del segundo producto:
      $cart = $_SESSION["cart"];
      $repeated = false;
      // recorremos el carrito en busqueda de producto repetido
      foreach ($cart as $c) {
        // si el producto esta repetido rompemos el ciclo
        if($c["product_id"]==$_POST["product_id"]){
          $repeated=true;
          break;
        }
      }
      // si el producto es repetido no hacemos nada, simplemente redirigimos
      if($repeated){
        print "<script>alert('Error: Producto Repetido!');</script>";
      }else{
        // si el producto no esta repetido entonces lo agregamos a la variable cart y despues asignamos la variable cart a la variable de sesion
        array_push($cart, array("product_id"=>$_POST["product_id"],"q"=> $_POST["q"]));
        $_SESSION["cart"] = $cart;
      }
    }
    print "<script>window.location='../products.php';</script>";
  }
}

}


if(isset($_POST['btnSimpan'])){
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <a href="./cart.php" class="btn btn-warning">Ver Calificaciones</a>
      <br><br>
<?php
$carre = $_POST['t10'];
$semes = $_POST['t11'];
$products = $koneksidb->query("select * from alumnos where carrera='$carre' and semestre='$semes'");
?>
<table class="table table-bordered">
<thead>
  <th>Matricula</th>
  <th>Nombre</th>
  <th></th>
</thead>
<?php 
/*
* Apartir de aqui hacemos el recorrido de los productos obtenidos y los reflejamos en una tabla.
*/
while($r=$products->fetch_object()):?>
<tr>
  <td><?php echo $r->id;?></td>
  <td><?php echo $r->nombre; ?></td>
  <td style="width:260px;">
  <?php
  $found = false;

  if(isset($_SESSION["cart"])){ foreach ($_SESSION["cart"] as $c) { if($c["product_id"]==$r->id){ $found=true; break; }}}
  ?>
  <?php if($found):?>
    <a href="cart.php" class="btn btn-info">Agregado</a>
  <?php else:?>
  <form class="form-inline" method="post" action="">
  <input type="hidden" name="product_id" value="<?php echo $r->id; ?>">
    <div class="form-group">
      <input type="number" name="q" value="1" style="width:100px;" min="1" class="form-control" placeholder="Cantidad">
    </div>
    <button type="submit" name="btnSimpan2" class="btn btn-success">Calificacion</button>
  </form> 
  <?php endif; ?>
  </td>
</tr>
<?php endwhile; ?>
</table>
<br><br><hr>

    </div>
  </div>
</div>
<?php
}
?>