<?php
	session_start(); 
	include("controller/config.inc.php"); 
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Shopping Ajax</title>
		<link href="style/style.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
		<script>
			$(document).ready(function(){	
				$(".form-item").submit(function(e){
					var form_data = $(this).serialize();
					var button_content = $(this).find('button[type=submit]');
					button_content.html('Adicionando...'); //Loading button text 

					$.ajax({ //make ajax request to add_carrinho.php
						url: "add_carrinho.php",
						type: "POST",
						dataType:"json", //expect json value from server
						data: form_data
					}).done(function(data){ //on Ajax success
						$("#cart-info").html(data.items); //total items in cart-info element
						button_content.html('Adicionar ao Carrinho'); //reset button text to original text
						//alert("Adicionado ao carrinho!"); //alert user
						if($(".shopping-cart-box").css("display") == "block"){ //if cart box is still visible
							$(".cart-box").trigger( "click" ); //trigger click to update the cart box.
						}
					})
					e.preventDefault();
				});

				//Show Items in Cart
				$( ".cart-box").click(function(e) { //when user clicks on cart box
					e.preventDefault(); 
					$(".shopping-cart-box").fadeIn(); //display cart box
					$("#shopping-cart-results").html('<img src="images/ajax-loader.gif">'); //show loading image
					$("#shopping-cart-results" ).load( "add_carrinho.php", {"load_cart":"1"}); //Make ajax request using jQuery Load() & update results
				});
		
				//Close Cart
				$( ".close-shopping-cart-box").click(function(e){ //user click on cart box close link
					e.preventDefault(); 
					$(".shopping-cart-box").fadeOut(); //close cart-box
				});
		
				//Remove items from cart
				$("#shopping-cart-results").on('click', 'a.remove-item', function(e) {
					e.preventDefault(); 
					var pcode = $(this).attr("data-code"); //get product code
					$(this).parent().fadeOut(); //remove item element from box
					$.getJSON( "add_carrinho.php", {"remove_code":pcode} , function(data){ //get Item count from Server
						$("#cart-info").html(data.items); //update Item count in cart-info
						$(".cart-box").trigger( "click" ); //trigger click on cart-box to update the items list
					});
				});
			});
		</script>
	</head>
	<body>
		<div align="center">
			<h3>Shopping Ajax</h3>
		</div>

		<a href="#" class="cart-box" id="cart-info" title="View Cart">
			<?php 
			if(isset($_SESSION["products"])){
				echo count($_SESSION["products"]); 
			}else{
				echo 0; 
			}?>
		</a>

		<div class="shopping-cart-box">
			<a href="#" class="close-shopping-cart-box" >Fechar</a>
			<h3>Carrinho</h3>
			<div id="shopping-cart-results">
			</div>
		</div>

		<?php
		//List products from database
			$results = $mysqli_conn->query("SELECT id, product_name, product_desc, product_code, product_image, product_price FROM products_list");
		//Display fetched records as you please
			$products_list =  '<ul class="products-wrp">';

			while($row = $results->fetch_assoc()) {
// $products_list .= <<<EOT
// <li>
// <form class="form-item">
// 	<h4>{$row["product_name"]}</h4>
// 	<div>
// 		<a class="btn" href="produto.php?id={$row["id"]}" role="button" title="Ver produto">
// 			<img src="images/{$row["product_image"]}">
// 		</a>
// 	</div>
// 	<div>Preço : {$currency} {$row["product_price"]}<div>
// 		<div class="item-box">
// 			// <div>
// 			// 	Cor :
// 			// 	<select name="product_color">
// 			// 		<option value="Red">Red</option>
// 			// 		<option value="Blue">Blue</option>
// 			// 		<option value="Orange">Orange</option>
// 			// 	</select>
// 			// </div>

// 			<div>
// 				Qtde :
// 				<select name="product_qty">
// 					<option value="1">1</option>
// 					<option value="2">2</option>
// 					<option value="3">3</option>
// 					<option value="4">4</option>
// 					<option value="5">5</option>
// 				</select>
// 			</div>

// 			// <div>
// 			// 	Tamanho :
// 			// 	<select name="product_size">
// 			// 		<option value="M">M</option>
// 			// 		<option value="XL">XL</option>
// 			// 		<option value="XXL">XLL</option>
// 			// 	</select>
// 			// </div>

// 			<input name="product_code" type="hidden" value="{$row["product_code"]}">
// 			<input name="product_image" type="hidden" value="{$row["product_image"]}" >
// 			<input name="product_id" type="hidden" value="{$row["id"]}" >
// 			<button type="submit">Adicionar ao Carrinho</button>
// 		</div>
// 	</form>
// </li>
// EOT;
$products_list .= <<<EOT
<li>
<form class="form-item">
	<h4>{$row["product_name"]}</h4>
	<div>
		<a class="btn" href="produto.php?id={$row["id"]}" role="button" title="Ver produto">
			<img src="images/{$row["product_image"]}">
		</a>
	</div>
	<div>Preço : {$currency} {$row["product_price"]}<div>
		<div class="item-box">
			<div>
				Qtde :
				<select name="product_qty">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select>
			</div>

			<input name="product_code" type="hidden" value="{$row["product_code"]}">
			<input name="product_image" type="hidden" value="{$row["product_image"]}" >
			<input name="product_id" type="hidden" value="{$row["id"]}" >
			<button type="submit">Adicionar ao Carrinho</button>
		</div>
	</form>
</li>
EOT;
	}
		$products_list .= '</ul></div>';
		echo $products_list;?>
	</body>
</html>