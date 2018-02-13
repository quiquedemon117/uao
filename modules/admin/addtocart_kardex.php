<?php
if(!empty($_POST)){
	if(isset($_POST["product_id2"]) && isset($_POST["primerp"]) && isset($_POST["segundop"]) && isset($_POST["tercerp"]) && isset($_POST["examenf"])){
		// si es el primer producto simplemente lo agregamos
		if(empty($_SESSION["cart2"])){
			$_SESSION["cart2"]=array( array("product_id2"=>$_POST["product_id2"],"primerp"=> $_POST["primerp"], "segundop"=> $_POST["segundop"], "tercerp"=> $_POST["tercerp"], "examenf"=> $_POST["examenf"], "promediof"=> $_POST["promediof"]));
		}else{
			// apartie del segundo producto:
			$cart2 = $_SESSION["cart2"];
			$repeated = false;
			// recorremos el carrito en busqueda de producto repetido
			foreach ($cart2 as $c) {
				// si el producto esta repetido rompemos el ciclo
				if($c["product_id2"]==$_POST["product_id2"]){
					$repeated=true;
					break;
				}
			}
			// si el producto es repetido no hacemos nada, simplemente redirigimos
			if($repeated){
				print "<script>alert('Error: Producto Repetido!');</script>";
			}else{
				// si el producto no esta repetido entonces lo agregamos a la variable cart2 y despues asignamos la variable cart2 a la variable de sesion
				array_push($cart2,array("product_id2"=>$_POST["product_id2"],"primerp"=> $_POST["primerp"], "segundop"=> $_POST["segundop"], "tercerp"=> $_POST["tercerp"], "examenf"=> $_POST["examenf"], "promediof"=> $_POST["promediof"]));
				$_SESSION["cart2"] = $cart2;
			}
		}
		print "<script>window.location='?open=lista_alumnos_kardex';</script>";
	}
}

?>

