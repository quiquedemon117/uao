<?php
if(isset($_SESSION['nf'])){
	$nf = $_SESSION['nf'];
	if(!empty($_POST)){
		for ($i=0; $i<=count($nf); $i++){
		if(isset($_POST["product_id"]) && isset($_POST["primerp"]) && isset($_POST["segundop"]) && isset($_POST["tercerp"]) && isset($_POST["examenf"])){
		// si es el primer producto simplemente lo agregamos
		if(empty($_SESSION["cart"])){
			$_SESSION["cart"]=array( array("product_id"=>$_POST["product_id"],"primerp"=> $_POST["primerp"], "segundop"=> $_POST["segundop"], "tercerp"=> $_POST["tercerp"], "examenf"=> $_POST["examenf"], "promediof"=> $_POST["promediof"]));
		}else{
			// apartie del segundo producto:
			$cart = $_SESSION["cart"];
			$repeated = false;
			// recorremos el carrito en busqueda de producto repetido
			foreach ($cart as $c) {
				// si el producto esta repetido rompemos el ciclo
				if($c["product_id"]==$_POST["product_id"]){
					$repeated=true;
					break;
				}
			}
			// si el producto es repetido no hacemos nada, simplemente redirigimos
			if($repeated){
				print "<script>alert('Error: Producto Repetido!');</script>";
			}else{
				// si el producto no esta repetido entonces lo agregamos a la variable cart y despues asignamos la variable cart a la variable de sesion
				array_push($cart,array("product_id"=>$_POST["product_id"],"primerp"=> $_POST["primerp"], "segundop"=> $_POST["segundop"], "tercerp"=> $_POST["tercerp"], "examenf"=> $_POST["examenf"], "promediof"=> $_POST["promediof"]));
				$_SESSION["cart"] = $cart;
			}
		}
		print "<script>window.location='?open=lista_alumnos_kardex';</script>";
		}
	  }
   }
}else{
	echo "Algo anda mal en el sistema";
}

?>

