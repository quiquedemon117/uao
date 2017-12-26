<?php 
include_once "library/inc.sesadmin.php"; 
include_once "library/inc.connection.php"; 
include_once "library/inc.library.php";


$carrera=$_SESSION["carrera"]; 
$materia=$_SESSION["materia"];
//$q1 = $koneksidb->query("insert into $carrera values($c[product_id],$materia,$c[q])");
foreach($_SESSION["cart"] as $c){
$mySql	= "INSERT INTO `$carrera` VALUES('$c[product_id]','$materia','$c[q]')";
$myQry	= mysqli_query($koneksidb, $mySql)  or die ("Error al agregar : Alumno Repetido".mysqli_error());
//$q1 = $koneksidb->query("insert INTO licenciatura en administracion VALUES('1','sdf','9')");
}
unset($_SESSION["cart"]);
unset($_SESSION["carrera"]);
unset($_SESSION["semestre"]);
unset($_SESSION["materia"]);


print "<script>alert('Calificacion procesada exitosamente');window.location='?open=calificacion';</script>";
?>