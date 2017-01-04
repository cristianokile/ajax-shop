<?php 
$pageTitle = "";
$pageDescription = "";
session_start(); 
require('header.php');?>
</head>	
	<body>
		<header class="header-main">
			<?php require('nav.php') ?>
			<?php require('carousel.php') ?>
		</header>

		<section class="produtos">
			<div class="container">
				<div class="row">
					
					<?php 
					require 'controller/connect.php';?>

					<div class="col-md-12">
						<div class="row">
							<?php $result = mysqli_query($con, 'SELECT * FROM produtos'); ?>
							<div class="col-md-12 text-center">
								<h2>Ariaú</h2>
							</div>
							<?php while($produtos = mysqli_fetch_object($result)) { ?>
								<article class="col-md-4 col-sm-6 col-xs-12">
									<div class="produto-imagem">
										<img class="img-responsive" src="<?php echo $produtos->produto_img; ?>" alt="<?php echo $produtos->produto_nome; ?>" title="<?php echo $produtos->produto_nome; ?>">
									</div>
									<h3 class="produto-codigo"><?php echo $produtos->produto_cod; ?></h3>
									<h4 class="produto-titulo"><?php echo $produtos->produto_nome; ?></h4>
									<h5 class="produto-info"><?php echo $produtos->produto_tam; ?></h5>
									<a class="btn" href="produto.php?id=<?php echo $produtos->id; ?>" role="button">VER PRODUTO</a>
								</article>
							<?php }?>
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