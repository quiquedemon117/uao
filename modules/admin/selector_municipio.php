<?php
include_once "library/inc.connection.php"; 

$estado = $_POST['t5'];

$val = mysqli_query($koneksidb, "SELECT id FROM estados WHERE estado = '$estado'");

$id_estado = mysqli_fetch_array($val);

$kari = $id_estado['id'];

$query = "SELECT municipio FROM municipios WHERE estado_id = '$kari'";

$consulta = mysqli_query($koneksidb, $query);

while ($myData = mysqli_fetch_array($consulta)) {


 echo "<option value='".$myData['municipio']."'>".$myData['municipio']."</option>";


 }



?>
