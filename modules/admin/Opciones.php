<?php
if(isset($_GET['open'])) {
	switch($_GET['open']){
		case '' :
			if(!file_exists ("main.php")) die ("¡Página principal vacía!");
			include "main.php"; break;

		case 'Login' :
			if(!file_exists ("login.php")) die ("¡Lo siento pagina vacia!");
			include "login.php"; break;
		case 'Login-Validasi' :
			if(!file_exists ("login_validasi.php")) die ("¡Lo siento pagina vacia!");
			include "login_validasi.php"; break;

		case 'Logout' :
			if(!file_exists ("login_out.php")) die ("¡Lo siento pagina vacia!");
			include "login_out.php"; break;

		case 'inicio' :
			if(!file_exists ("main.php")) die ("¡Lo siento pagina vacia!");
			include "main.php";	 break;

		# DATA PASSWORD
		case 'Password-Admin' :
			if(!file_exists ("password_admin.php")) die ("¡Lo siento pagina vacia!");
			include "password_admin.php"; break;

        
		# Datos
		case 'constancias':
			if(!file_exists ("constancias.php")) die ("¡Lo siento pagina vacia!");
			include "constancias.php"; break;
		case 'bitacoras':
			if(!file_exists ("bitacoras.php")) die ("¡Lo siento pagina vacia!");
			include "bitacoras.php"; break;
		case 'kardex':
			if(!file_exists ("kardex.php")) die ("¡Lo siento pagina vacia!");
			include "kardex.php"; break;
		case 'doc_kardex':
			if(!file_exists ("doc_kardex.php")) die ("¡Lo siento pagina vacia!");
			include "doc_kardex.php"; break;



# Datos de ALUMNOS
		case 'alumnos':
			if(!file_exists ("alumnos.php")) die ("¡Lo siento pagina vacia!");
			include "alumnos.php"; break;
		case 'b_alumnos':
			if(!file_exists ("b_alumnos.php")) die ("¡Lo siento pagina vacia!");
			include "b_alumnos.php"; break;
		case 'agrealumnos':
			if(!file_exists ("agrealumnos.php")) die ("¡Lo siento pagina vacia!");
			include "agrealumnos.php"; break;
		case 'elialumnos':
			if(!file_exists ("elialumnos.php")) die ("¡Lo siento pagina vacia!");
			include "elialumnos.php"; break;
		case 'editalumnos':
			if(!file_exists ("editalumnos.php")) die ("¡Lo siento pagina vacia!");
			include "editalumnos.php"; break;
		case 'calificacion':
			if(!file_exists ("calificacion.php")) die ("¡Lo siento pagina vacia!");
			include "calificacion.php"; break;
		case 'calificacion_kardex':
			if(!file_exists ("calificacion_kardex.php")) die ("¡Lo siento pagina vacia!");
			include "calificacion_kardex.php"; break;
		case 'edit_calificacion':
			if(!file_exists ("editcalificacion.php")) die ("¡Lo siento pagina vacia!");
			include "editcalificacion.php"; break;


# Datos de carrito
		case 'lista_alumnos':
			if(!file_exists ("lista_alumnos_kardex.php")) die ("¡Lo siento pagina vacia!");
			include "lista_alumnos.php"; break;
		case 'lista_alumnos_kardex':
			if(!file_exists ("lista_alumnos_kardex.php")) die ("¡Lo siento pagina vacia!");
			include "lista_alumnos_kardex.php"; break;
		case 'addtocart':
			if(!file_exists ("addtocart.php")) die ("¡Lo siento pagina vacia!");
			include "addtocart.php"; break;
		case 'addtocart_kardex':
			if(!file_exists ("addtocart_kardex.php")) die ("¡Lo siento pagina vacia!");
			include "addtocart_kardex.php"; break;
		case 'temporal':
			if(!file_exists ("temporal.php")) die ("¡Lo siento pagina vacia!");
			include "temporal.php"; break;
		case 'temporal_k':
			if(!file_exists ("temporal_k.php")) die ("¡Lo siento pagina vacia!");
			include "temporal_k.php"; break;
		case 'delfromcart':
			if(!file_exists ("delfromcart.php")) die ("¡Lo siento pagina vacia!");
			include "delfromcart.php"; break;
		case 'process':
			if(!file_exists ("process.php")) die ("¡Lo siento pagina vacia!");
			include "process.php"; break;
		case 'process_k':
			if(!file_exists ("process_k.php")) die ("¡Lo siento pagina vacia!");
			include "process_k.php"; break;



# Datos de departamento
		case 'adeudos':
			if(!file_exists ("adeudos.php")) die ("¡Lo siento pagina vacia!");
			include "adeudos.php"; break;
		case 'eliadeudo':
			if(!file_exists ("eliadeudo.php")) die ("¡Lo siento pagina vacia!");
			include "eliadeudo.php"; break;
		case 'nuevo_Ad':
			if(!file_exists ("nuevo_Ad.php")) die ("¡Lo siento pagina vacia!");
			include "nuevo_Ad.php"; break;
		case 'pdf':
			if(!file_exists ("pdf.php")) die ("¡Lo siento pagina vacia!");
			include "pdf.php"; break;
		case 'titulacion':
			if(!file_exists ("titulacion.php")) die ("¡Lo siento pagina vacia!");
			include "titulacion.php"; break;
		case 'docentes':
			if(!file_exists ("agredocente.php")) die ("¡Lo siento pagina vacia!");
			include "agredocente.php"; break;
		case 'verdocentes':
			if(!file_exists ("docente.php")) die ("¡Lo siento pagina vacia!");
			include "docente.php"; break;


# tablas
		case 'carreras':
			if(!file_exists ("carreras.php")) die ("¡Lo siento pagina vacia!");
			include "carreras.php"; break;
		case 'editcarreras':
			if(!file_exists ("editcarreras.php")) die ("¡Lo siento pagina vacia!");
			include "editcarreras.php"; break;
		case 'materias':
			if(!file_exists ("materias.php")) die ("¡Lo siento pagina vacia!");
			include "materias.php"; break;
		case 'editmaterias':
			if(!file_exists ("editmaterias.php")) die ("¡Lo siento pagina vacia!");
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