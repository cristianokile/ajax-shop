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
				$product_id 		= $product["id"];
				$product_name 		= $product["product_name"];
				$product_code 		= $product["product_code"];
				$product_size 		= $product["product_size"];
				$product_cat 		= $product["product_cat"];
				$product_image 		= $product["product_image"];
				$product_image_hd	= $product["product_image_hd"];
				$product_price 		= $product["product_price"];
				$product_stock 		= $product["product_stock"];
				$product_qtde		= $product["product_qtde"];
				
				$cart_box .=  
				"<li class='lista-body'>
					<div class='row'>
						<div class='col-md-2 lista-foto text-center'>
							<div class='out center-block'>
								<div class='in'>
									<a href='produto.php?id=" . $product_id . "'>
										<img class='img-responsive center-block' src='" . $product_image . "' alt='" . $product_name . "' title='" . $product_name . "'>
									</a>
								</div>
							</div>
						</div>
					<div class='col-md-4 lista-descricao'>
						<div class='out'>
							<div class='in'>
								<a href='produto.php?id=" . $product_id . "' title= ". $product_name . ">
									<p>" . $product_name . "</p>
								</a>
								<p><strong>Tamanho: </strong> " . $product_size . "</p>
							</div>
						</div>
					</div>
					<div class='col-md-1 lista-categoria text-center'>
						<div class='out center-block'>
							<div class='in'>
								" . $product_cat . "
							</div>
						</div>
					</div>
					<div class='col-md-1 lista-estoque text-center'>
						<div class='out center-block'>
							<div class='in'>
								" . $product_stock . "
							</div>
						</div>
					</div>
					<div class='col-md-1 lista-preco text-center'>
						<div class='out center-block'>
							<div class='in'>
								" . $product_price . "
							</div>
						</div>
					</div>
					<div class='col-md-2 lista-Itens'>
						<div class='out center-block'>
							<div class='in'>
								" . $product_qtde . "
							</div>
						</div>
					</div>
					<div class='col-md-1 acao'>
						<div class='out center-block'>
							<div class='in'>
								<a class='btn btn-lg remove-item' href='#' data-code='" . $product_code . "'><i class='glyphicon glyphicon-trash' aria-hidden='true'></i></a>
							</div>
						</div>
					</div>
				</li>";
				$subtotal = ($product_price);
				$total = ($total + $subtotal);
			}
			$cart_box .= "</ul>";
			$cart_box .= '<div class="cart-products-total">Total : '.$currency.sprintf("%01.2f",$total).' <u><a href="carrinho.php" title="Revisar o Carrinho e Solicitar orçamento">Solicitar orçamento</a></u></div>';
			die($cart_box); //exit and output content
		}else{
			die("<br><p class='text-center'>Você não possui produtos adicionados</p>"); //we have empty cart
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