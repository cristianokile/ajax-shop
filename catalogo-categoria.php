<?php
	$pageTitle = "RBC Global Business | Catalogo";
	$pageDescription = "";
	session_start(); 
	require('header.php');
?>
	<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
	<script>
		$(document).ready(function(){	
			$(".form-item").submit(function(e){
				var form_data = $(this).serialize();
				var button_content = $(this).find('button[type=submit]');
				button_content.html('Adicionando...'); //Loading button text 

				$.ajax({ //make ajax request to carrinho_add.php
					url: "carrinho_add.php",
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
		<div class="container divider"></div>
		<!-- <section class="breadcrumb">
			<div class="row">
				<div class="col-md-12 text-center">
					<nav>
						<div class="container">
							<div class="bc-wrap">
								<div class="content">

								<?php 
								include("controller/config.inc.php");  

								if(isset($_GET['cat'])) {
								$categoria = $_GET['cat'];
								$resultnavs = $mysqli_conn->query("SELECT * FROM products_list WHERE product_type = '" . $categoria . "'"); 
								$products_breadcrumb = "";
								
								while($row = $resultnavs->fetch_assoc()) { 
								$products_breadcrumb .= <<<EOT
									<a href="index.php">INÍCIO</a>
									<span class="next">&rsaquo;</span>
									<span>{$row['product_cat']}</span>
									<span class="next">&rsaquo;</span>
									<span>{$row['product_subcat']}</span>
									<span class="active">
										{$row['product_type']}
									</span><br>
EOT;
	}
	}
	echo $products_breadcrumb; ?>
								</div>
							</div>
						</div>
					</nav>
				</div>
			</div>
		</section> -->
		<section class="produtos">
			<div class="container">
				<div class="row">
					<?php require("controller/config.inc.php"); ?>
					<div class="col-md-12">
						<div class="row">
							<?php 
							$categoria = $_GET['cat'];

							$results = $mysqli_conn->query("SELECT id, product_name, product_code, product_size, product_cat, product_subcat, product_type, product_image, product_image_hd, product_stock, product_price FROM products_list WHERE product_type = '" . $categoria . "'"); ?>
							<?php if($results->num_rows === 0){ ?>
							<form class="form-item">
        						<article class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        							<div class="row">
			        					<div class="col-md-12 text-center">
											<h2>Você buscou por "<?php echo $categoria; ?>"</h2>
										</div>
										<p>Não foram encontrados produtos cadastrados nesta categoria!</p>
									</div>
								</article>
							</form>
    						<?php } else {?>
								<?php $products_list = "";?>
								<div class="col-md-12 text-center">
									<h2><?php echo $categoria; ?></h2>
								</div>
								<form class="form-item">
								<?php while($row = $results->fetch_assoc()) { 
									$products_list .= <<<EOT
										<article class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
											<div class="produto-imagem">
												<img class="img-responsive" src="{$row['product_image']}" alt="{$row['product_name']}" title="{$row['product_name']}">
											</div>
											<h3 class="produto-codigo">{$row['product_code']}</h3>
											<h4 class="produto-titulo">{$row['product_name']}</h4>
											<h5 class="produto-info">{$row['product_size']}</h5>
											<a class="btn" href="produto.php?produto={$row['product_name']}&id={$row['id']}" role="button">VER PRODUTO</a>
										</article>
EOT;
		}
		echo $products_list;
	?>							</form>
						<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</section>

		<?php 
		$scripts_footer="";
		require('footer.php') ?>

	</body>
</html>