<?php
$my['host']	= "localhost";
$my['user']	= "root";
$my['pass']	= "";
$my['dbs']	= "control-ayo";

$koneksidb	= mysqli_connect($my['host'], $my['user'], $my['pass'], $my['dbs']) or die ("Base de Datos no encontrada, porfavor ponganse en contacto con el administrador del sistema!");
$acentos = $koneksidb->query("SET NAMES 'utf8'");
if (! $koneksidb) {
  echo "Fallo en la Conexion !";
}
// memilih database pda server
/*mysqli_select_db($my['dbs'])
	 or die ("Base de Datos no encontrada, porfavor ponganse en contacto con el administrador del sistema!");*/
?>