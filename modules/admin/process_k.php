<?php 
$carreras=$_SESSION["carrera"]; 
$materias=$_SESSION["materia"];
//$q1 = $koneksidb->query("insert into $carrera values($c[product_id],$materia,$c[q])");
$lol = mysqli_query($koneksidb ,"SELECT clave_carrera FROM carrera WHERE nombre_carrera = '$carreras'");
$row = mysqli_fetch_array($lol);
foreach($_SESSION["cart2"] as $c2){
$mySqls	= "INSERT INTO kardex VALUES('$row[0]', '$c2[product_id2]','$materias','$c2[primerp]' ,'$c2[segundop]' ,'$c2[tercerp]' ,'$c2[examenf]' ,'$c2[promediof]')";
$myQrys	= mysqli_query($koneksidb, $mySqls)  or die ("Error al agregar : Alumno Repetido <br>".mysqli_error($koneksidb));
//$q1 = $koneksidb->query("insert INTO licenciatura en administracion VALUES('1','sdf','9')");
}
unset($_SESSION["cart"]);
unset($_SESSION["carrera"]);
unset($_SESSION["semestre"]);
unset($_SESSION["materia"]);


print "<script>alert('Calificacion procesada exitosamente');window.location='?open=calificacion';</script>";
?>