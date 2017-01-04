<?php 
$pageTitle = "RBC Global Business | Carrinho";
$pageDescription = "";
session_start(); 
require('header.php');?>
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
				require 'controller/connect.php';
				require 'controller/item.php';
				
				if(isset($_GET['qtde'])) {
					$qtde = $_GET['qtde'];
				};

				if(isset($_GET['id'])) {
					$result = mysqli_query($con, 'SELECT * FROM produtos WHERE id='.$_GET['id']);
					$produtos = mysqli_fetch_object($result);
					$item = new Item();

					$item->imagem  		= $produtos->produto_img;
					$item->id  			= $produtos->id;
					$item->codigo  		= $produtos->produto_cod;
					$item->nome  		= $produtos->produto_nome;
					$item->tamanho  	= $produtos->produto_tam;
					$item->categoria  	= $produtos->produto_cat;
					$item->quantidade  	= $qtde;
					$item->estoque  	= $produtos->produto_qtde;
					$item->preco  		= $produtos->produto_preco;
					$item->num_item = 1;

					// Checa se o produto existe no carrinho
					$index = -1;
					$cart = unserialize(serialize($_SESSION['cart']));
					for ($i=0; $i < count($cart); $i++) 
						if ($cart[$i]->id==$_GET['id']) 
						{
							$index = $i;
							break;
						}
						if($index==-1){
							$_SESSION['cart'][] = $item;
						}
						else{
							$cart[$index]->num_item++;
							$_SESSION['cart'] = $cart;
						}
					
				}
					// Apaga o Produto no carrinho
					if(isset($_GET['index'])){
						$cart = unserialize (serialize($_SESSION['cart']));
						unset($cart[$_GET['index']]);
						$cart = array_values($cart);
						$_SESSION['cart'] = $cart;
					}
				?>

					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12 text-center">
								<h2>Lista de Desejos</h2>
							</div>
							<article class="col-md-12 col-sm-12 col-xs-12">

								<?php $cart = unserialize(serialize($_SESSION['cart']));
								$s = 0; 
								$index = 0;
								$vazio = count($cart); 

								if ($vazio != 0){?>
								
								<div class="row">
									<!-- Visible Desk -->
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

												<?php for ($i=0; $i < count($cart); $i++) {  
												$s += $cart[$i]->preco * $cart[$i]->num_item;?>

												<li class="lista-body">
													<div class="row">
														<div class="col-md-2 lista-foto text-center">
														<div class="out center-block">
															<div class="in">
																<a href="produto.php?id=<?php echo $cart[$i]->id;?>">
																	<img class="img-responsive center-block" src="<?php echo $cart[$i]->imagem;?>" alt="<?php echo $cart[$i]->nome;?>" title="<?php echo $cart[$i]->nome;?>">
																</a>
															</div>
														</div>
														</div>
														<div class="col-md-4 lista-descricao">
															<div class="out">
																<div class="in">
																	<a href="produto.php?id=<?php echo $cart[$i]->id;?>">
																		<p><?php echo $cart[$i]->nome;?></p>
																	</a>
																	<p><strong>Tamanho: </strong> <?php echo $cart[$i]->tamanho;?></p>
																</div>
															</div>
														</div>
														<div class="col-md-1 lista-categoria text-center">
															<div class="out center-block">
																<div class="in">
																	<?php echo $cart[$i]->categoria;?>
																</div>
															</div>
														</div>
														<div class="col-md-1 lista-estoque text-center">
															<div class="out center-block">
																<div class="in">
																	<?php echo $cart[$i]->estoque;?>
																</div>
															</div>
														</div>
														<div class="col-md-1 lista-preco text-center">
															<div class="out center-block">
																<div class="in">
																	<?php echo $cart[$i]->preco;?>
																</div>
															</div>
														</div>
														<div class="col-md-2 lista-Itens">
															<div class="out center-block">
																<div class="in">
																	<div class="form-group form-group-options center-block">
																		<div id="<?php echo $index;?>" class="input-group input-group-option quantity-wrapper">
																			<span class="input-group-addon input-group-addon-remove quantity-remove btn">
																				<span class="glyphicon glyphicon-minus"></span>
																			</span>
																			<input id="<?php echo $index;?>inp" type="text" value="<?php echo $cart[$i]->quantidade;?>" name="form-qtde" class="form-control quantity-count text-center" placeholder="1">
																			<span class="input-group-addon input-group-addon-remove quantity-add btn">
																				<span class="glyphicon glyphicon-plus"></span>
																			</span>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-md-1 acao">
															<div class="out center-block">
																<div class="in">
																	<a class="btn btn-lg btn-remove" href="carrinho.php?index=<?php echo $index; ?>"><i class="glyphicon glyphicon-trash" aria-hidden="true"></i></a>
																</div>
															</div>
														</div>
													</div>
												</li>
												<?php $index++; } ?>
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
																<input type="text" class="form-control" id="exampleInputName2" name="form-name" placeholder="Jane Doe">
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
												<input class="btn btn-default" type="submit" value="Enviar Orçamento"/>
												<br><br><br>
											</div>
										</form>	
									</div>
									<!-- Visible Mobile -->
									<div class="col-xs-12 visible-xs visible-sm">
										<div class="row">
											<ul class="col-md-12 lista-carrinho">
												<li class="lista-header">
													<div class="row">
														<div class="col-md-2 text-center">Produtos</div>
													</div>
												</li>

												<?php for ($i=0; $i < count($cart); $i++) {  
												$s += $cart[$i]->preco * $cart[$i]->num_item;?>

												<li class="lista-body">
													<div class="row">
														<div class="col-xs-12 lista-foto text-center">
															<div class="row">
															<div class="col-xs-5">
																<div class="out center-block">
																	<div class="in">
																		<a href="produto.php?id=<?php echo $cart[$i]->id;?>">
																		<img class="img-responsive center-block" src="<?php echo $cart[$i]->imagem;?>" alt="<?php echo $cart[$i]->nome;?>" title="<?php echo $cart[$i]->nome;?>">
																		</a>
																	</div>
																</div>
															</div>
															<div class="col-xs-7">
																<div class="out center-block">
																	<div class="in">
																		<a href="produto.php?id=<?php echo $cart[$i]->id;?>">
																			<p><?php echo $cart[$i]->nome;?></p>
																		</a>
																		<p><strong>Tamanho: </strong> <?php echo $cart[$i]->tamanho;?></p>
																		<?php echo $cart[$i]->categoria;?>
																		<?php echo $cart[$i]->quantidade;?>
																		<?php echo $cart[$i]->preco;?>
																		<div class="form-group form-group-options center-block">
																			<div id="<?php echo $index;?>" class="input-group input-group-option quantity-wrapper">
																				<span class="input-group-addon input-group-addon-remove quantity-remove btn">
																					<span class="glyphicon glyphicon-minus"></span>
																				</span>
																				<input id="<?php echo $index;?>inp" type="text" value="1" name="option[]" class="form-control quantity-count text-center" placeholder="1">
																				<span class="input-group-addon input-group-addon-remove quantity-add btn">
																					<span class="glyphicon glyphicon-plus"></span>
																				</span>
																			</div>
																		</div>
																		<a class="btn btn-remove" href="carrinho.php?index=<?php echo $index; ?>">REMOVER</a>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</li>
												<?php $index++; } ?>
											</ul>
										</div>
									</div>
								</div>
							</article>
							<?php } else { ?>
							</article>
								<div class="col-md-12 lista-preco text-center">
									<h4>Você ainda não possui produtos adicionados!</h4>
									<br><br>
									<div class="col-md-3">
										<a class="btn btn-default pull-left" href="catalogo.php">Voltar para o Catálogo</a>
									<br><br><br>
									</div>
								</div>
							<?php };?>
							
						</div>
					</div>
				</div>
			</div>
		</section>

		<?php 
		$scripts_footer="";
		require('footer.php') ?>
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