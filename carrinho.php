<?php 
	$pageTitle = "RBC Global Business | Carrinho";
	$pageDescription = "";
	session_start(); 
	require('header.php');
?>
<link href="style/style.css" rel="stylesheet" type="text/css">
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
				//Remove items from orcamento
				$("#orcamento").on('click', 'a.remove-item', function(e) {
					e.preventDefault(); 
					var pcode = $(this).attr("data-code"); //get product code
					$(this).parent().fadeOut(); //remove item element from box
					$.getJSON( "carrinho_add.php", {"remove_code":pcode} , function(data){ //get Item count from Server
						$("#cart-info").html(data.items); //update Item count in cart-info
						$(".cart-box").trigger( "click" ); //trigger click on cart-box to update the items list
						$(".lista-body" ).load( "carrinho_add.php", {"load_cart":"1"}); //Make ajax request using jQuery Load() & update results
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
			<div class="container">
				<div class="row">
					<?php 
						include("controller/config.inc.php");
						setlocale(LC_MONETARY,"pt_BR"); 
					?>
					<h2>Solicitar Orçamento</h2>
					
					<article class="col-md-12 col-sm-12 col-xs-12">
						<div class="row">
							<div class="col-md-12 hidden-xs hidden-sm">
								<form class="row" method="GET" action="fechar-pedido.php">
									<ul class="col-md-12 lista-carrinho" id="orcamento">
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
												$cart_box = "";
												$total 			= 0;

												foreach($_SESSION["products"] as $product){ 
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
													//$item_price 		= sprintf("%01.2f",($product_price * $product_qtde));
													
													$cart_box 			.=  "
													<li class='lista-body'>
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
																	<div class='form-group form-group-options center-block'>
																		<div id='" . $product_id . "' class='input-group input-group-option quantity-wrapper'>
																			<span class='input-group-addon input-group-addon-remove quantity-remove btn'>
																				<span class='glyphicon glyphicon-minus'></span>
																			</span>
																			<input id='" . $product_id . "inp' type='text' value='" . $product_qtde . "' name='form-qtde' class='form-control quantity-count text-center' placeholder='1'>
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
																	<a class='remove-item btn btn-lg btn-remove' href='#' data-code='" . $product_code . "'><i class='glyphicon glyphicon-trash' aria-hidden='true'></i></a>
																</div>
															</div>
														</div>
													</li>";
													
													$subtotal 		= ($product_price * $product_qtde); 
													$total 			= ($total + $subtotal); 
												}
												
												$grand_total = $total; //grand total
												/*
												$cart_box .= "<li class=\"view-cart-total\">Total : $currency ".sprintf("%01.2f", $grand_total)."</li>";
												$cart_box .= "</ul>";
												*/
												echo $cart_box;
											}else{
												echo "<br><p class='text-center'>Você não possui produtos adicionados</p>";
											}?>
									</ul>
									<ul class="col-md-12  lista-carrinho">
										<li class="lista-header">
											<div class="row">
												<div class="col-md-12 text-center">Informações para Contato</div>
											</div>
										</li>
										<li class="row lista-body">
											<div class="col-md-12">
												<div class="row">
													<div class="form-group col-md-4">
														<label for="exampleInputName2">Nome</label>
														<input type="text" class="form-control" id="exampleInputName2" name="form-name" placeholder="Nome">
													</div>
													<div class="form-group col-md-4">
														<label for="exampleInputEmail2">Email</label>
														<input type="email" class="form-control" id="exampleInputEmail2" name="form-email" placeholder="seu@email.com.br" required>
													</div>
													<div class="form-group col-md-4">
														<label for="exampleInputEmail2">Telefone</label>
														<input type="text" class="form-control" id="exampleInputTell2" name="form-tel" placeholder="12 0000-0000">
													</div>
												</div>
											</div>
										</li>
									</ul>
									<div class="col-md-12 text-right">
										<a class="btn btn-padrao btn-default pull-left" href="catalogo.php">Voltar para o Catálogo</a>
											<input name="id" type="hidden" value="{$row['id']}">
											<input name="product_name" type="hidden" value="{$row['product_name']}">
											<input name="product_code" type="hidden" value="{$row['product_code']}">
											<input name="product_size" type="hidden" value="{$row['product_size']}">
											<input name="product_cat" type="hidden" value="{$row['product_cat']}">
											<input name="product_image" type="hidden" value="{$row['product_image']}">
											<input name="product_image_hd" type="hidden" value="{$row['product_image_hd']}">
											<input name="product_price" type="hidden" value="{$row['product_price']}">
											<input name="product_stock" type="hidden" value="{$row['product_stock']}">
											<input name="product_qtde" type="hidden" value="{$row['product_stock']}">
											<input class="btn btn-default" type="submit" value="Enviar Orçamento"/>
										<br><br><br>
									</div>
								</form>
							</div>
						</div>
					</article>
				
				</div>
			</div>
		</section>

		<?php require('footer.php') ?>
		<script>
			$(document).ready(function(){
			    //Add
			    $(".quantity-add").click(function(e){
			        //Vars
			        var count = 1;
			        var newcount = 0;
			        
			        //Wert holen + Rechnen
			        var elemID = $(this).parent().attr("id");
			        var countField = $("#"+elemID+'inp');
			        var count = $("#"+elemID+'inp').val();
			        var newcount = parseInt(count) + 1;
			        
			        //Neuen Wert setzen
			        $("#"+elemID+'inp').val(newcount);
			    });

			    //Remove
			    $(".quantity-remove").click(function(e){
			        //Vars
			        var count = 1;
			        var newcount = 0;
			        
			        //Wert holen + Rechnen
			        var elemID = $(this).parent().attr("id");
			        var countField = $("#"+elemID+'inp');
			        var count = $("#"+elemID+'inp').val();
			        var newcount = parseInt(count) - 1;
			        
			        //Neuen Wert setzen
			        $("#"+elemID+'inp').val(newcount);
			        
			    });

			    //Delete
			    $(".quantity-delete").click(function(e){
			        //Vars
			        var count = 1;
			        var newcount = 0;
			        
			        //Wert holen + Rechnen
			        var elemID = $(this).parent().attr("id");
			        var countField = $("#"+elemID+'inp');
			        var count = $("#"+elemID+'inp').val();
			        var newcount = parseInt(count) - 1;
			        
			        //Neuen Wert setzen
			        //$('.item').html('');
			        
			       var row = $( ".row" );
			        $(event.target).closest(row).html('');
			    });
			});
		</script>
	</body>
</html>