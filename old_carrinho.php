<?php
	session_start(); //start session
	include("controller/config.inc.php");
	setlocale(LC_MONETARY,"pt_BR"); 
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Revisar e Solicitar Orçamento</title>
		<link href="style/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<h3 style="text-align:center">Revisar e Solicitar Orçamento</h3>
		<?php
		if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){
			$total 			= 0;
			// $list_tax 		= '';
			$cart_box 		= '<ul class="view-cart">';

			foreach($_SESSION["products"] as $product){ //Print each item, quantity and price.
				$product_image 	= $product["product_image"];
				$product_name 	= $product["product_name"];
				$product_qty 	= $product["product_qty"];
				$product_price 	= $product["product_price"];
				$product_code 	= $product["product_code"];
				//$product_color 	= $product["product_color"];
				//$product_size 	= $product["product_size"];
				
				$item_price 	= sprintf("%01.2f",($product_price * $product_qty));  // price x qty = total item price
				
				// $cart_box 		.=  "
				// <li><a class='btn' href='produto.php?id=$product_id' role='button' title='Ver produto'>
				// <img style='width:50px; height: 50px' src='images/". $product_image ."'> | $product_code &ndash;  $product_name (Qtde : $product_qty | $product_color | $product_size) </a><span> $currency. $item_price </span></li>";
				$cart_box 		.=  "
				<li><img style='width:50px; height: 50px' src='images/". $product_image ."'> | $product_code &ndash;  $product_name (Qtde : $product_qty )<span> $currency. $item_price </span></li>";

				
				$subtotal 		= ($product_price * $product_qty); //Multiply item quantity * price
				$total 			= ($total + $subtotal); //Add up to total price
			}
			
			// $grand_total = $total + $shipping_cost; //grand total
			 $grand_total = $total; //grand total
			
			// foreach($taxes as $key => $value){ //list and calculate all taxes in array
			// 		$tax_amount 	= round($total * ($value / 100));
			// 		$tax_item[$key] = $tax_amount;
			// 		$grand_total 	= $grand_total + $tax_amount; 
			// }
			
			// foreach($tax_item as $key => $value){ //taxes List
			// 	$list_tax .= $key. ' '. $currency. sprintf("%01.2f", $value).'<br />';
			// }
			
			// $shipping_cost = ($shipping_cost)?'Frete : '.$currency. sprintf("%01.2f", $shipping_cost).'<br />':'';
			
			//Print Shipping, VAT and Total
			// $cart_box .= "<li class=\"view-cart-total\">$shipping_cost  $list_tax <hr>Total : $currency ".sprintf("%01.2f", $grand_total)."</li>";
			$cart_box .= "<li class=\"view-cart-total\">Total : $currency ".sprintf("%01.2f", $grand_total)."</li>";
			$cart_box .= "</ul>";
			
			echo $cart_box;
		}else{
			echo "Você não possui produtos adicionados";
		}?>
	</body>
</html>