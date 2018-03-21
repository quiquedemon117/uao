<?php
include_once "library/inc.connection.php";
include_once "library/inc.library.php";
$kari_contador = $_SESSION['nf'];
$kari = intval($kari_contador);

$array_variables = array();
for ($i = 1; $i <= $kari; $i++)
{
	$id[$i] = $_POST["product_id".$i];
	$carre[$i] = $_POST["carrera".$i];
	$materia[$i] = $_POST["materia".$i];
	$cal[$i] = $_POST["q".$i];
}


if(isset($id) && isset($cal)){
	for ($z = 1; $z <= $kari; $z++){

	$sql[$z] = "INSERT INTO `$carre[1]`(`clave_alumno`, `nombre_materia`, `calificacion`) VALUES ";

		$sql[$z].="('".$id[$z]."','".$materia[$z]."','".$cal[$z]."');";

		echo "<br>";

	if(mysqli_query($koneksidb, $sql[$z])){
		unset($kari_contador);
	}else{
		echo "El alumno con matricula: ".$id[$z]."ya tiene calificasion vaya a la opcion de <a href='?open=edit_calificacion'>Editar calificasion</a>";
		unset($kari_contador);
	}
	}
}
/*if(isset()){
	echo "jajajaja que mamada";
	$_SESSION["carrera"]=$carre;

		for($=0; $i<=count($kari_contador); $i++){
			$id = $_POST['product_id'.$i++];
			$id = $_POST['p'.$i++];
	}

	$Sql = "INSERT INTO $carre VALUES ()";

	$query = mysqli_query($koneksidb, $Sql);

	if($query == true){
		echo "<script> swal({
  type: 'success',
  title: 'Los datos se actualizaron correctamente',
  showConfirmButton: false,
  timer: 1500
},
function(){
  window.location.href='?open=edit_calificacion';
}) </script>";
	}else{
		echo "<script>
		alert('Algo salio mal intente de nuevo...'); 
		window.location.href='?open=modificar_cali'
		</script>";
	}

}else{
	echo "Los campos no pueden estar vacios";
	/*sleep(5);*/
/*	header("Location: http:?open=modificar_cali");
}*/

?>