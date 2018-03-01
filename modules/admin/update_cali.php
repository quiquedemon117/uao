<?php
include_once "library/inc.connection.php";
include_once "library/inc.library.php";  
if(isset($_POST["1p"]) && isset($_POST["2p"]) && isset($_POST["3p"]) && isset($_POST["ef"]) && isset($_POST["pf"]) && isset($_POST["cf"])){
	$id = $_POST['oculto'];
	$primerp = $_POST['1p'];
	$segundop = $_POST['2p'];
	$tercerp = $_POST['3p'];
	$ef = $_POST['ef'];
	$pf = $_POST['pf'];
	$cf = $_POST['cf'];

	$Sql = "UPDATE kardex SET primer_p='".$primerp."', segundo_p='".$segundop."', tercer_p='".$tercerp."', examen_f='".$ef."', promedio_f='".$pf."' WHERE clave_alumno='".$id."'";

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
*/}

?>