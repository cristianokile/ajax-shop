<?php
	session_start(); //start session
	include_once("controller/config.inc.php"); //include config file
	setlocale(LC_MONETARY,"pt_BR"); 
?>

<?php
	if(isset($_POST["product_code"])){
		foreach($_POST as $key => $value){
			$new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING); //create a new product array 
		}
		//we need to get product name and price from database.
		$statement = $mysqli_conn->prepare("SELECT product_name, product_price FROM products_list WHERE product_code=? LIMIT 1");
		$statement->bind_param('s', $new_product['product_code']);
		$statement->execute();
		$statement->bind_result($product_name, $product_price);

		while($statement->fetch()){ 
			$new_product["product_name"] = $product_name; //fetch product name from database
			$new_product["product_price"] = $product_price;  //fetch product price from database
			if(isset($_SESSION["products"])){  //if session var already exist
				if(isset($_SESSION["products"][$new_product['product_code']])) //check item exist in products array
				{
					unset($_SESSION["products"][$new_product['product_code']]); //unset old item
				}			
			}
			$_SESSION["products"][$new_product['product_code']] = $new_product;	//update products with new item array	
		}
	 	$total_items = count($_SESSION["products"]); //count total items
		die(json_encode(array('items'=>$total_items))); //output json 
	}

	################## list products in cart ###################
	
	if(isset($_POST["load_cart"]) && $_POST["load_cart"]==1){
		if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){ //if we have session variable
			$cart_box = '<ul class="cart-products-loaded">';
			$total = 0;
			foreach($_SESSION["products"] as $product){ //loop though items and prepare html content
				
				//set variables to use them in HTML content below
				$product_image 		= $product["product_image"]; 
				$product_name 		= $product["product_name"]; 
				$product_price 		= $product["product_price"];
				$product_code 		= $product["product_code"];
				$product_qty 		= $product["product_qty"];
				//$product_color 		= $product["product_color"];
				//$product_size 		= $product["product_size"];
				
				// $cart_box .=  "<li> <img style='width:50px; height: 50px' src='images/". $product_image ."'> | $product_name (Qty : $product_qty | $product_color  | $product_size ) &mdash; $currency ".sprintf("%01.2f", ($product_price * $product_qty)). " <a href=\"#\" class=\"remove-item\" data-code=\"$product_code\">&times;</a></li>";
				$cart_box .=  "<li> <img style='width:50px; height: 50px' src='images/". $product_image ."'> | $product_name (Qty : $product_qty ) &mdash; $currency ".sprintf("%01.2f", ($product_price * $product_qty)). " <a href=\"#\" class=\"remove-item\" data-code=\"$product_code\">&times;</a></li>";
				$subtotal = ($product_price * $product_qty);
				$total = ($total + $subtotal);
			}
			$cart_box .= "</ul>";
			$cart_box .= '<div class="cart-products-total">Total : '.$currency.sprintf("%01.2f",$total).' <u><a href="carrinho.php" title="Revisar o Carrinho e Solicitar orçamento">Solicitar orçamento</a></u></div>';
			die($cart_box); //exit and output content
		}else{
			die("Você não possui produtos adicionados"); //we have empty cart
		}
	}

	################# remove item from shopping cart ################
	if(isset($_GET["remove_code"]) && isset($_SESSION["products"]))
	{
		$product_code   = filter_var($_GET["remove_code"], FILTER_SANITIZE_STRING); //get the product code to remove

		if(isset($_SESSION["products"][$product_code]))
		{
			unset($_SESSION["products"][$product_code]);
		}
		
	 	$total_items = count($_SESSION["products"]);
		die(json_encode(array('items'=>$total_items)));
	}