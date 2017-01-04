<?php 
	$pageTitle = "RBC Global Business | Carrinho";
	$pageDescription = "";
	session_start(); 
	require('header.php');
?>
<link href="style/style.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
		<script>
			$(document).ready(function(){	
				//Show Items in Cart
				$( ".cart-box").click(function(e) { //when user clicks on cart box
					e.preventDefault(); 
					$(".shopping-cart-box").fadeIn(); //display cart box
					$("#shopping-cart-results").html('<img src="images/ajax-loader.gif">'); //show loading image
					$("#shopping-cart-results" ).load( "carrinho_add.php", {"load_cart":"1"}); //Make ajax request using jQuery Load() & update results
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
					$.getJSON( "carrinho_add.php", {"remove_code":pcode} , function(data){ //get Item count from Server
						$("#cart-info").html(data.items); //update Item count in cart-info
						$(".cart-box").trigger( "click" ); //trigger click on cart-box to update the items list
					});
				});
			});
		</script>
</head>	
	<body>

		<header class="header-main">
			<?php require('nav.php') ?>
			<?php require('carousel-simple.php') ?>
		</header>
		<section class="carrinho">
			<div class="container" style="border-top: 1px solid #ef494f; min-height: 300px">
				<div class="row">
					<?php 
						include("controller/config.inc.php");
						setlocale(LC_MONETARY,"pt_BR"); 
					?>
					<h2>Lista de Desejos</h2>
					
					<article class="col-md-12 col-sm-12 col-xs-12">
						<div class="row">
							<div class="col-md-12 hidden-xs hidden-sm">
								<form class="row" method="GET" action="fechar-pedido.php">
									<ul class="col-md-12 lista-carrinho">
										<li class="lista-header">
											<div class="row">
												<div class="col-md-2 text-center">Imagem</div>
												<div class="col-md-4">Descrição</div>
												<div class="col-md-1 text-center">Categoria</div>
												<div class="col-md-1 text-center">Estoque</div>
												<div class="col-md-1 text-center">Preço</div>
												<div class="col-md-2 text-center">Quantidade Desejada</div>
												<div class="col-md-1 text-center">Remover?</div>
											</div>
										</li>

										<?php
											if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){
												$total 			= 0;

												foreach($_SESSION["products"] as $product){ 
													$product_image 	= $product["product_image"];
													$product_name 	= $product["product_name"];
													$product_qty 	= $product["product_qty"];
													$product_price 	= $product["product_price"];
													$product_code 	= $product["product_code"];
													
													$item_price 	= sprintf("%01.2f",($product_price * $product_qty));
													
													$cart_box 		=  "
													
													<li class='lista-body'>
														<div class='row'>
															<div class='col-md-2 lista-foto text-center'>
																<div class='out center-block'>
																	<div class='in'>
																		<a href='produto.php?codigo=" . $product_code . "'>
																			<img class='img-responsive center-block' src='images/" . $product_image . "' alt='" . $product_name . "' title='" . $product_name . "'>
																		</a>
																	</div>
																</div>
															</div>
														<div class='col-md-4 lista-descricao'>
															<div class='out'>
																<div class='in'>
																	<a href='produto.php?codigo=" . $product_code . " title='" . $product_name . "'>
																		<p>" . $product_name . "</p>
																	</a>
																	<p><strong>Tamanho: </strong> " . $product_code . "</p>
																</div>
															</div>
														</div>
														<div class='col-md-1 lista-categoria text-center'>
															<div class='out center-block'>
																<div class='in'>
																	" . $product_name . "
																</div>
															</div>
														</div>
														<div class='col-md-1 lista-estoque text-center'>
															<div class='out center-block'>
																<div class='in'>
																	" . $product_name . "
																</div>
															</div>
														</div>
														<div class='col-md-1 lista-preco text-center'>
															<div class='out center-block'>
																<div class='in'>
																	" . $item_price . "
																</div>
															</div>
														</div>
														<div class='col-md-2 lista-Itens'>
															<div class='out center-block'>
																<div class='in'>
																	<div class='form-group form-group-options center-block'>
																		<div id='" . $item_price . " class='input-group input-group-option quantity-wrapper'>
																			<span class='input-group-addon input-group-addon-remove quantity-remove btn'>
																				<span class='glyphicon glyphicon-minus'></span>
																			</span>
																			<input id='" . $item_price . "inp' type='text' value='" . $item_price . "' name='form-qtde' class='form-control quantity-count text-center' placeholder='1'>
																			<span class='input-group-addon input-group-addon-remove quantity-add btn'>
																				<span class='glyphicon glyphicon-plus'></span>
																			</span>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class='col-md-1 acao'>
															<div class='out center-block'>
																<div class='in'>
																	<a class='btn btn-lg remove-item' href='#' data-code='$product_code'><i class='glyphicon glyphicon-trash' aria-hidden='true'></i></a>
																</div>
															</div>
														</div>
													</div>";
													
													$subtotal 		= ($product_price * $product_qty); 
													$total 			= ($total + $subtotal); 
												}
												
												$grand_total = $total; //grand total
												
												$cart_box .= "<li class=\"view-cart-total\">Total : $currency ".sprintf("%01.2f", $grand_total)."</li>";
												$cart_box .= "</ul>";
												
												echo $cart_box;
											}else{
												echo "<br><p class='text-center'>Você não possui produtos adicionados</p>";
											}?>
									</ul>
								</form>
							</div>
						</div>
					</article>
				
				</div>
			</div>
		</section>

		<?php require('footer.php') ?>
	</body>
</html>