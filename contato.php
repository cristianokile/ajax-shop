<?php 
	$pageTitle = "RBC Global Business | Carrinho";
	$pageDescription = "";
	session_start(); 
	require('header.php');
?>
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
					window.location.reload();
					e.preventDefault(); 
					var pcode = $(this).attr("data-code"); //get product code
					$(this).parent().fadeOut(); //remove item element from box
					$.getJSON( "carrinho_add.php", {"remove_code":pcode} , function(data){ //get Item count from Server
						$("#cart-info").html(data.items); //update Item count in cart-info
						$(".cart-box").trigger( "click" ); //trigger click on cart-box to update the items list
						$(".lista-body").load( "carrinho_add.php", {"load_cart":"1"}); //Make ajax request using jQuery Load() & update results
					});
				});
				//Remove items from orcamento
				$("#orcamento").on('click', 'a.remove-item', function(e) {
					window.location.reload();
					e.preventDefault(); 
					var pcode = $(this).attr("data-code"); //get product code
					$(this).parent().fadeOut(); //remove item element from box
					$.getJSON( "carrinho_add.php", {"remove_code":pcode} , function(data){ //get Item count from Server
						$("#cart-info").html(data.items); //update Item count in cart-info
						$(".cart-box").trigger( "click" ); //trigger click on cart-box to update the items list
						$(".lista-body").load( "carrinho_add.php", {"load_cart":"1"}); //Make ajax request using jQuery Load() & update results
					});
				});
			});
		</script>
		<script src="js/jquery.maskedinput.js"></script>
</head>	
	<body>

		<header class="header-main">
			<?php require('nav.php') ?>
			<?php require('carousel-simple.php') ?>
		</header>
		<div class="container divider"></div>
		<section class="carrinho">
			<div class="container">
				<div class="row">
					<?php 
						include("controller/config.inc.php");
						setlocale(LC_MONETARY,"pt_BR"); 
					?>
					<h2>Contato</h2>
					<p class='text-center'>Caso tenha alguma dúvida, entre em contato<br>
					conosco preenchendo o formulário abaixo:</p>
					
					<article class="col-md-12 col-sm-12 col-xs-12">
						<div class="row">
							<div class="col-md-offset-2 col-md-8">
								<form class="form-material row">
									<div class="group col-md-12">
										<input type="text" name="contato-nome" required>
										<span class="highlight"></span>
										<span class="bar"></span>
										<label>Nome</label>
									</div>
									<div class="group col-md-6">
										<input type="tel" name="contato-nome" required>
										<span class="highlight"></span>
										<span class="bar"></span>
										<label>Telefone</label>
									</div>
									<div class="group col-md-6">
										<input type="text" name="contato-nome" required>
										<span class="highlight"></span>
										<span class="bar"></span>
										<label>E-mail</label>
									</div>
									<div class="group col-md-12">      
										<textarea onkeyup="this.setAttribute('value', this.value);" value="" id="mensagem" name="message" cols="30" rows="4"></textarea>
										<span class="highlight"></span>
										<span class="bar"></span>
										<label>Mensagem</label>
									</div>
									<div class="col-md-12 text-center">
										<button class="btn btn-lg btn-add btn-block-xs" type="submit">ENVIAR</button>
										<br>
									</div>
									<div class="col-md-12 text-center bloco-endereco">
										<h3 class="color-red">RBC Global Business</h3>
										<p>Rua Bandeira Paulista, 662 - cj.86 - Itaim Bibi, São Paulo - SP</p>
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
			    //Máscara de Telefone
			    $("input.telefone"){
			        .mask("(99) 9999-9999?9")
			        .focusout(function (event) {  
			            var target, phone, element;  
			            target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
			            phone = target.value.replace(/\D/g, '');
			            element = $(target);  
			            element.unmask();  
			            if(phone.length > 10) {  
			                element.mask("(99) 99999-999?9");  
			            } else {  
			                element.mask("(99) 9999-9999?9");  
			            }  
			        });
				};
		</script>
	</body>
</html>