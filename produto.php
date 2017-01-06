<?php 
$pageTitle = "RBC Global Business | Produto";
$pageDescription = "";
session_start(); 
require('header.php');
?>	
<script type="text/javascript" src="js/fancy-js/jquery.fancybox.js"></script>
<link rel="stylesheet" type="text/css" href="css/fancy-css/jquery.fancybox.css" media="screen" />
<link href="style/style.css" rel="stylesheet" type="text/css">	
<script>
			$(document).ready(function(){	
				$(".form-item").submit(function(e){
					var form_data = $(this).serialize();
					var button_content = $(this).find('button[type=submit]');
					button_content.html('ADICIONANDO...'); //Loading button text 

					$.ajax({ //make ajax request to carrinho_add.php
						url: "carrinho_add.php",
						type: "POST",
						dataType:"json", //expect json value from server
						data: form_data
					}).done(function(data){ //on Ajax success
						$("#cart-info").html(data.items); //total items in cart-info element
						button_content.html('ADICIONAR AO ORÇAMENTO'); //reset button text to original text
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
		<section class="breadcrumb">
			<div class="row">
				<div class="col-md-12 text-center">
					<nav>
						<div class="container">
							<div class="bc-wrap">
								<div class="content">
									<a href="#">INÍCIO</a>
									<span class="next">&rsaquo;</span>
									<a href="#">DECORAÇÃO</a>
									<span class="next">&rsaquo;</span>
									<a href="#">ARIAÚ</a>
									<span class="next">&rsaquo;</span>
									<span class="active">VASO DE CERÂMICA</span>
								</div>
							</div>
						</div>
					</nav>
				</div>
			</div>
		</section>

		<section class="produto" id="produto-01">
			<div class="container" >
				<div class="row">

				<?php 
					include("controller/config.inc.php");  
					
					//List products from database
					if(isset($_GET['id'])) {
						$produto = $_GET['id'];
						$results = $mysqli_conn->query("SELECT id, product_name, product_code, product_size, product_cat, product_image, product_image_hd, product_stock, product_price FROM products_list WHERE id =" . $produto); ?>
							<?php $products_list = "";?>

							<?php while($row = $results->fetch_assoc()) { 
								$products_list .= <<<EOT
								<div class="col-md-12">
									<form class="form-item">
										<article class="col-md-12 col-sm-12 col-xs-12 text-center">
											<h2 class="produto-codigo">{$row['product_code']}</h2>
											<h3 class="produto-titulo">{$row['product_name']}</h3>
											<h4 class="produto-info">{$row['product_size']}</h4>
											<div class="produto-imagem">
												<img class="img-responsive center-block" src="{$row['product_image']}" alt="{$row['product_name']}" title="{$row['product_name']}">
											</div>
											<a class="fancybox-effects-a" href="{$row['product_image']}" title="{$row['product_name']}"></a>
											<h5 class="produto-info"><strong>Quantidade desejada:</strong></h5>
											<div class="form-group form-group-options center-block">
												<div id="{$row['id']}" class="input-group input-group-option quantity-wrapper">
													<span class="input-group-addon input-group-addon-remove quantity-remove btn">
														<span class="glyphicon glyphicon-minus"></span>
													</span>
													<input id="{$row['id']}inp" type="text" value="1" name="product_qtde" class="form-control quantity-count text-center" placeholder="1">
													<span class="input-group-addon input-group-addon-remove quantity-add btn">
														<span class="glyphicon glyphicon-plus"></span>
													</span>
												</div>
											</div>
											<input name="id" type="hidden" value="{$row['id']}">
											<input name="product_name" type="hidden" value="{$row['product_name']}">
											<input name="product_code" type="hidden" value="{$row['product_code']}">
											<input name="product_size" type="hidden" value="{$row['product_size']}">
											<input name="product_cat" type="hidden" value="{$row['product_cat']}">
											<input name="product_image" type="hidden" value="{$row['product_image']}">
											<input name="product_image_hd" type="hidden" value="{$row['product_image_hd']}">
											<input name="product_price" type="hidden" value="{$row['product_price']}">
											<input name="product_stock" type="hidden" value="{$row['product_stock']}">
											<button class="btn btn-add" type="submit">ADICIONAR AO ORÇAMENTO</button>
										</article>
									</form>
EOT;
	}
	echo $products_list;
					} else { ?>
						<div class="col-md-12">
							<div class="row">
								<form class="form-item">
									<article class="col-md-12 col-sm-12 col-xs-12 text-center">
										<h2>Não foi selecionado nenhum produto para ser exibido</h2>
									</article>
								</form>
							</div>
						</div>
					<?php }	?>
				</div>
			</div>
		</section>
		<?php require('footer.php') ?>
		<script>
			$(document).ready(function(){
		        $('.fancybox').fancybox();
				// Change title type, overlay closing speed
					$(".fancybox-effects-a").fancybox({
						helpers: {
							title : {
								type : 'outside'
							},
							overlay : {
								speedOut : 0
							}
						}
					});
		        });
		</script>
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