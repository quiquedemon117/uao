<?php
if(!empty($_SESSION["cart"])){
	$cart  = $_SESSION["cart"];
	if(count($cart)==1){ unset($_SESSION["cart"]); }
	else{
		$newcart = array();
		foreach($cart as $c){
			if($c["product_id"]!=$_GET["id"]){
				$newcart[] = $c;
			}
		}
		$_SESSION["cart"] = $newcart;
	}
}
print "<script>window.location='?open=temporal';</script>";

?>
<?php
if(!empty($_SESSION["cart2"])){
	$cart  = $_SESSION["cart2"];
	if(count($cart)==1){ unset($_SESSION["cart2"]); }
	else{
		$newcart = array();
		foreach($cart as $c){
			if($c["product_id"]!=$_GET["id"]){
				$newcart[] = $c;
			}
		}
		$_SESSION["cart2"] = $newcart;
	}
}
print "<script>window.location='?open=temporal_k';</script>";

?>

