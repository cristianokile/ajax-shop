<?php 
$pageTitle = "";
$pageDescription = "";
require('header.php');?>
  	<body>
    	
    	<header class="header-main">
    		<?php require('nav.php') ?>
    		<!-- Carousel -->
			<div class="carousel slide" id="carousel-735882">
				<ol class="carousel-indicators">
					<li class="active img-responsive" data-slide-to="0" data-target="#carousel-735882">
					</li>
				</ol>
				<div class="carousel-inner">
					<div class="item active">
						<img class="center-block img-responsive" alt="Carousel Bootstrap First" src="img/uploads/slides/slide-01.jpg">
						<div class="carousel-caption">
							<h4>
								Produtos da Linha
							</h4>
							<h5>
								Decoração
							</h5>
						</div>
					</div>
				</div> <a class="left carousel-control" href="#carousel-735882" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-735882" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
			</div>
    	</header>

		<section class="destaque-produtos">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6 produtos-linha margin-top-bottom-15">
								<div class="row no-gutter">
									<div class="col-md-4 col-sm-4 produtos-linha-imagem">
										<img class="img-left img-responsive hidden-xs" src="img/uploads/jumbotron/objecto-01.png" alt="Produto 1">
									</div>
									<div class="col-md-8 col-sm-8">
										<div class="text-right text-left-xs produtos-linha-descricao">
											<div class="box-width">
												<small>PRODUTOS DA LINHA</small>
												<h2>
													Decoração
												</h2>
												<p>
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis distinctio libero deleniti recusandae harum corporis impedit.
												</p>
												<p>
													<a class="btn btn btn-large" href="produtos-vasos-de-ceramica.htm">CONHEÇA TODA A LINHA</a>
												</p>
											</div>
											<div class="clearfix hidden"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6  produtos-linha margin-top-bottom-15">
								<div class="row no-gutter">
									<div class="col-md-8 col-sm-8">
										<div class="text-left text-left-xs produtos-linha-descricao">
											<div class="box-width">
												<small>PRODUTOS DA LINHA</small>
												<h2>
													Utilidades Domésticas
												</h2>
												<p>
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis distinctio libero deleniti recusandae harum corporis impedit.
												</p>
												<p>
													<a class="btn btn btn-large" href="produtos-decoracao.htm">CONHEÇA TODA A LINHA</a>
												</p>
												</div>
										</div>
									</div>
									<div class="col-md-4 col-sm-4 produtos-linha-imagem imagem-right">
											<img class="img-right img-responsive hidden-xs" src="img/uploads/jumbotron/objecto-02.png" alt="Produto 2">
										</div>
									</div>
								<div class="clearfix"></div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</section>
		<section class="call-to-action container">
			<div class="row jumbotron">
				<div class="col-md-8 col-sm-12 col-md-offset-2 bg-cinza">
					<div class="jumbotron call-to-action">
						<div class="row">
							<div class="col-md-5 col-sm-6 text-center-xs">
								<h2>
									Como<br class="hidden-xs"> comprar?
								</h2>
							</div>
							<div class="col-md-7 col-sm-6 text-center-sm">
								<p>
									Selecione os produtos e as quantidades <br class="hidden-sm hidden-xs">desejadas e clique em <a href="#">"Enviar Pedido"</a>
								</p>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</section>

		<section class="quem-somos">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12 text-center-xs text-center-sm">
								<h2>Quem Somos</h2>
							</div>
							<div class="col-md-4 col-sm-12 text-center-sm">
								<h3>Empreendedorismo <br class="hidden-md hidden-sm"><span class="color-red">&amp;</span> sua Criação</h3><br class="show-xs">
							</div>
							<div class="col-md-4 col-sm-12 col-xs-12">
								<p>
									A visão de um jovem de 30 anos desencadeou a criação da empresa. de uma de suas viagens aos EUA, Bruno Boselli Carvalho, se deparou com eletroportáteis, que facilitam o preparo dos alimentos - jamais visto de seu país -, além de decorações inventivas. Diante da inovação, idealizou um projeto, onde pudesse atender o consumidor brasileiro com produtos diferenciados, práticos e acessíveis. Foi quando, com o seu idealismo , incentivou seu pai, Renato Carvalho, a se unir a ele de busca de novos produtos, de feiras internacionais. “Ninguém alcança o sucesso sozinho”, resume Carvalho.
								</p>
								<p>
									Ainda pensando na definição coletiva para alçar ao sucesso do novo empreendimento, sentiram a necessidade de estender a sociedade para um terceiro empresário, que tivesse sido líder de mercado e fosse respeitado por colaboradores e clientes, além de ter interesse pelo projeto.
								</p>
							</div>
							<div class="col-md-4 col-sm-12 col-xs-12">
								<p>
									Após pesquisas, chegaram ao Sr. Cury , Nelson C. Cury, que, prontamente, pela larga experiência visualizou uma carência no segmento e uma grande oportunidade inovadora para o mercado.
								</p>
								<p> 
									Sociedade fechada. Com a união dos três sócios, nasce a empresa RBC Global Business, que remete a inicial do nome de cada integrante – Renato, Bruno e Cury -, que, com o mesmo propósito, busca os melhores produtos internacionais para atender ao Brasil. Vale a pena investir! Vale a pena inovar!
								</p>
							</div>
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