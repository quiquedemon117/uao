<?php
include_once "library/inc.library.php";
include_once "library/inc.connection.php";

	$d1	=  $_POST['t1'];	
	$d2	=  $_POST['t2'];
	$consult = "SELECT id FROM alumnos WHERE id='$d1'";
	$result = mysqli_query($koneksidb, $consult);

	if(mysqli_num_rows($result)>0){
		$mySql	= "INSERT INTO departamento VALUES(UUID(),'$d1','$d2',Now())";
		$myQry	= mysqli_query($koneksidb, $mySql)  or die ("Error al agregar : ".mysqli_error($koneksidb));
				if($myQry){				
					// Refresh
					echo "<meta http-equiv='refresh' content='0; url=?open=adeudos&Kode=",$d1,"'>";
				}
 		}else{
 			echo "<script> alert('La matricula no existe') </script>";
 		}
?>