<?php
if(isset($_GET['open'])) {
	switch($_GET['open']){
		case '' :
			if(!file_exists ("main.php")) die ("Empty Main Page!");
			include "main.php"; break;

		case 'Login' :
			if(!file_exists ("login.php")) die ("Sorry Empty Page!");
			include "login.php"; break;
		case 'Login-Validasi' :
			if(!file_exists ("login_validasi.php")) die ("Sorry Empty Page!");
			include "login_validasi.php"; break;

		case 'Logout' :
			if(!file_exists ("login_out.php")) die ("Sorry Empty Page!");
			include "login_out.php"; break;

		case 'inicio' :
			if(!file_exists ("main.php")) die ("Sorry Empty Page!");
			include "main.php";	 break;

		# DATA PASSWORD
		case 'Password-Admin' :
			if(!file_exists ("password_admin.php")) die ("Sorry Empty Page!");
			include "password_admin.php"; break;

        
		# Datos
		case 'constancias':
			if(!file_exists ("constancias.php")) die ("Sorry Empty Page!");
			include "constancias.php"; break;
		case 'bitacoras':
			if(!file_exists ("bitacoras.php")) die ("Sorry Empty Page!");
			include "bitacoras.php"; break;
		case 'kardex':
			if(!file_exists ("kardex.php")) die ("Sorry Empty Page!");
			include "kardex.php"; break;



# Datos de ALUMNOS
		case 'alumnos':
			if(!file_exists ("alumnos.php")) die ("Sorry Empty Page!");
			include "alumnos.php"; break;
		case 'b_alumnos':
			if(!file_exists ("b_alumnos.php")) die ("Sorry Empty Page!");
			include "b_alumnos.php"; break;
		case 'agrealumnos':
			if(!file_exists ("agrealumnos.php")) die ("Sorry Empty Page!");
			include "agrealumnos.php"; break;
		case 'elialumnos':
			if(!file_exists ("elialumnos.php")) die ("Sorry Empty Page!");
			include "elialumnos.php"; break;
		case 'editalumnos':
			if(!file_exists ("editalumnos.php")) die ("Sorry Empty Page!");
			include "editalumnos.php"; break;
		case 'calificacion':
			if(!file_exists ("calificacion.php")) die ("Sorry Empty Page!");
			include "calificacion.php"; break;


# Datos de departamento
		case 'adeudos':
			if(!file_exists ("adeudos.php")) die ("Sorry Empty Page!");
			include "adeudos.php"; break;
		case 'eliadeudo':
			if(!file_exists ("eliadeudo.php")) die ("Sorry Empty Page!");
			include "eliadeudo.php"; break;
		case 'nuevo_Ad':
			if(!file_exists ("nuevo_Ad.php")) die ("Sorry Empty Page!");
			include "nuevo_Ad.php"; break;
		case 'pdf':
			if(!file_exists ("pdf.php")) die ("Sorry Empty Page!");
			include "pdf.php"; break;
		case 'titulacion':
			if(!file_exists ("titulacion.php")) die ("Sorry Empty Page!");
			include "titulacion.php"; break;


# tablas
		case 'carreras':
			if(!file_exists ("carreras.php")) die ("Sorry Empty Page!");
			include "carreras.php"; break;
		case 'editcarreras':
			if(!file_exists ("editcarreras.php")) die ("Sorry Empty Page!");
			include "editcarreras.php"; break;
		case 'materias':
			if(!file_exists ("materias.php")) die ("Sorry Empty Page!");
			include "materias.php"; break;
		case 'editmaterias':
			if(!file_exists ("editmaterias.php")) die ("Sorry Empty Page!");
			include "editmaterias.php"; break;	
		case 'kardex':

		default:
			if(!file_exists ("main.php")) die ("Empty Main Page!");
			include "main.php";	 break;
	}
}
else {
	if(!file_exists ("main.php")) die ("Empty Main Page!");
			include "main.php";	 //break;
}
?>