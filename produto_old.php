<?php 
$pageTitle = "RBC Global Business | Produto";
$pageDescription = "";
session_start(); 
require('header.php');?>
<script type="text/javascript" src="js/fancy-js/jquery.fancybox.js"></script>
<link rel="stylesheet" type="text/css" href="css/fancy-css/jquery.fancybox.css" media="screen" />
</head>	
	<body>
    	<header class="header-main">	
	    	<?php require('nav.php') ?>
			<?php require('carousel-simple.php') ?>
		</header>	

		</header>
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
			<div class="container">
				<div class="row">

					<?php 
					require 'controller/connect.php';
					require 'controller/item.php';

					if(isset($_GET['id'])) {
						$result = mysqli_query($con, 'SELECT * FROM produtos WHERE id='.$_GET['id']);
						$produtos = mysqli_fetch_object($result);
						$item = new Item();

						$item->imagem  		= $produtos->produto_img;
						$item->imagem_hd  	= $produtos->produto_img_hd;
						$item->id  			= $produtos->id;
						$item->codigo  		= $produtos->produto_cod;
						$item->nome  		= $produtos->produto_nome;
						$item->tamanho  	= $produtos->produto_tam;
						$item->categoria  	= $produtos->produto_cat;
						$item->qtde  		= $produtos->produto_qtde;
						$item->preco  		= $produtos->produto_preco;
						$item->num_item = 1;

					}?>

					<div class="col-md-12">
						<div class="row">
							<form method="GET" action="carrinho.php">
							<article class="col-md-12 col-sm-12 col-xs-12 text-center">
								<h2 class="produto-codigo"><?php echo $item->codigo;?></h2>
								<h3 class="produto-titulo"><?php echo $item->nome;?></h3>
								<h4 class="produto-info"><?php echo $item->tamanho;?></h4>
								<div class="produto-imagem">
									<img class="img-responsive center-block" src="<?php echo $item->imagem;?>" alt="<?php echo $item->nome;?>" title="<?php echo $item->nome;?>">
								</div>
								<a class="fancybox-effects-a" href="<?php echo $item->imagem_hd;?>" title="<?php echo $item->nome;?>"></a>
								<h5 class="produto-info"><strong>Quantidade desejada:</strong></h5>
								<div class="form-group form-group-options center-block">
									<div id="<?php echo $item->id;?>" class="input-group input-group-option quantity-wrapper">
										<span class="input-group-addon input-group-addon-remove quantity-remove btn">
											<span class="glyphicon glyphicon-minus"></span>
										</span>
										<input id="<?php echo $item->id;?>inp" type="text" value="1" name="qtde" class="form-control quantity-count text-center" placeholder="1">
										<span class="input-group-addon input-group-addon-remove quantity-add btn">
											<span class="glyphicon glyphicon-plus"></span>
										</span>
									</div>
								</div>
								<input type="submit" value="ADICIONAR AO PEDIDO" class="btn btn-add" />
								<input name="id" type="hidden" value="<?php echo $item->id;?>" class="btn btn-add" />
							</article>
						</div>
					</div>

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
