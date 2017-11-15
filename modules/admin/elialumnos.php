<?php
 include_once "library/inc.sesadmin.php";
include_once "library/inc.connection.php";

if(empty($_GET['Kode'])){
	echo "<b>Error de codigo</b>";
}
else {
	$Kode	= $_GET['Kode'];
	
	$mySql = "SELECT * FROM alumnos WHERE id='$Kode'";
	$myQry = mysqli_query($koneksidb, $mySql)  or die ("Error : ".mysqli_error());
	$myData= mysqli_fetch_array($myQry);
	
	if(! $myData['file_gambar']=="") {
		if(file_exists("../img-barang/".$myData['file_gambar'])) {
			unlink("../img-barang/".$myData['file_gambar']); 
		}
	}
	
	$mySql = "DELETE FROM alumnos WHERE id='$Kode'";
	$myQry = mysqli_query($koneksidb, $mySql) or die ("Error".mysql_error());
	if($myQry){
		echo "<meta http-equiv='refresh' content='0; url=?open=alumnos'>";
	}
}
?>