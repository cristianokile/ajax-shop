		<nav class="navbar navbar-default navbar-custom">
    			<div class="container">
    				<!-- Brand and toggle get grouped for better mobile display -->
    				<div class="row">
	    				<div class="navbar-header col-md-3">
	    					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	    						<span class="sr-only">Toggle navigation</span>
	    						<span class="icon-bar"></span>
	    						<span class="icon-bar"></span>
	    						<span class="icon-bar"></span>
	    					</button>
	    					
	    					<h1 class="h1-logo">
								<a class="navbar-brand" href="index.php" title="Página Inicial">RBC Global Business</a>
							</h1>
	    				</div>

	    				<!-- Collect the nav links, forms, and other content for toggling -->
	    				<div class="navbar-header-right collapse navbar-collapse col-md-9" id="bs-example-navbar-collapse-1">
	    					<ul class="nav navbar-nav navbar-nav-main">
	    						<li><a href="index.php">HOME</a></li>
	    						<li><a href="#">QUEM SOMOS</a></li>
	    						<li class="dropdown">
	    							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">DECORAÇÃO <span class="caret"></span></a>
	    							<ul class="dropdown-menu hidden-sm hidden-md hidden-lg">
										<li><strong>Decoração</strong></li>
										<li><a href="produtos-decoracao.php">Istambul</a></li>
										<li><a href="produtos-decoracao.php">África</a></li>
										<li><a href="#">Iron</a></li>
										<li><a href="#">Dakar</a></li>
										<li><a href="#">Craquele</a></li>
										<li><a href="#">Volcano</a></li>
										<li><a href="#">Panambi</a></li>
										<li><a href="#">Mont Blanc</a></li>
										<li><a href="#">Mont Dior</a></li>
										<li><a href="#">New Life</a></li>
										<li><a href="#">Bella Dona</a></li>
										<li><a href="#">Murano</a></li>
										<li><a href="#">Veneza</a></li>
										<li><a href="#">Chamois</a></li>
										<li><a href="#">Del Vetro</a></li>
										<li><a href="#">Vetreria</a></li>
										<li><a href="#">Safari</a></li>
										<li><a href="#">Iceberg</a></li>
										<li><a href="#">Porta-Retratos</a></li>
										<li><a href="#">Dancing</a></li>
										<li><a href="#">Box Funny</a></li>
										<li><a href="#">Metal Decor</a></li>
										<li><a href="#">Cristal Six Rouge</a></li>
										<li><a href="#">Alaska</a></li>
										<li><a href="#">Mont Catani</a></li>
										<li><a href="#">Quêbec</a></li>
										<li><a href="#">Chantilly</a></li>
										<li><a href="#">Relógios</a></li>
	    								<li role="separator" class="divider"></li>
	    								<li><strong>Utensílios Domésticos</strong></li>
	    								<li><a href="#">Cutelaria</a></li>
										<li><a href="#">Galeteiro e Saleiro</a></li>
										<li><a href="#">Copos, Xícaras e Canecas</a></li>
										<li><a href="#">Cafeteira e Chaleira</a></li>
										<li><a href="#">Itens em Melanina</a></li>
										<li><a href="#">Panela e Frigideira</a></li>
										<li><a href="#">Tábuas</a></li>
										<li><a href="#">Taças</a></li>
										<li><a href="#">Garrafas para Servir</a></li>
										<li><a href="#">Kit para Queijo</a></li>
										<li><a href="#">Potes</a></li>
										<li><a href="#">Jogo Americano</a></li>
										<li><a href="#">Kit Jarra e Copo</a></li>
										<li><a href="#">Suqueira</a></li>
										<li><a href="#">Boleira</a></li>
										<li><a href="#">Enfeites de Metal</a></li>
										<li><a href="#">Prato de Servir</a></li>
										<li><a href="#">Bandeja de Vidro</a></li>
										<li><a href="#">Cestas</a></li>
										<li><a href="#">Cofres</a></li>
										<li><a href="#">Cozinha</a></li>
										<li><a href="#">Vinho</a></li>
										<li><a href="#">Silicone</a></li>
										<li><a href="#">Saladeiras</a></li>
	    							</ul>
	    						</li>
	    						<li><a href="#">CONTATO</a></li>
	    						<li>
	    							<a href="#" class="cart-box" id="cart-info" title="View Cart">
	    								<?php 
	    								if(isset($_SESSION["products"])){
	    									echo count($_SESSION["products"]); 
	    								}else{
	    									echo 0; 
	    								}?>
	    							</a>
	    						</li>
	    					</ul>
	    				</div><!-- /.navbar-collapse -->
	    			</div>
    			</div><!-- /.container-fluid -->
    		</nav>
			<!-- NAV FULLWIDTH -->
			<nav class="nav-fullwidth hidden-xs">
				<div class="container">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-5">
								<div class="row">
									<div class="col-md-12">
										<h3 class="titulo">Decoração</h3>
									</div>
									<div class="col-md-4 col-sm-4">
										<ul>
											<li><a href="produtos-decoracao.php">Ariaú</a></li>
											<li><a href="produtos-decoracao.php">Istambul</a></li>
											<li><a href="produtos-decoracao.php">África</a></li>
											<li><a href="#">Iron</a></li>
											<li><a href="#">Dakar</a></li>
											<li><a href="#">Craquele</a></li>
											<li><a href="#">Volcano</a></li>
											<li><a href="#">Panambi</a></li>
											<li><a href="#">Mont Blanc</a></li>
											<li><a href="#">Mont Dior</a></li>
										</ul>
									</div>
									<div class="col-md-4 col-sm-4">
										<ul>
											<li><a href="#">New Life</a></li>
											<li><a href="#">Bella Dona</a></li>
											<li><a href="#">Murano</a></li>
											<li><a href="#">Veneza</a></li>
											<li><a href="#">Chamois</a></li>
											<li><a href="#">Del Vetro</a></li>
											<li><a href="#">Vetreria</a></li>
											<li><a href="#">Safari</a></li>
											<li><a href="#">Iceberg</a></li>
											<li><a href="#">Porta-Retratos</a></li>
										</ul>
									</div>
									<div class="col-md-4 col-sm-4">
										<ul>
											<li><a href="#">Dancing</a></li>
											<li><a href="#">Box Funny</a></li>
											<li><a href="#">Metal Decor</a></li>
											<li><a href="#">Cristal Six Rouge</a></li>
											<li><a href="#">Alaska</a></li>
											<li><a href="#">Mont Catani</a></li>
											<li><a href="#">Quêbec</a></li>
											<li><a href="#">Chantilly</a></li>
											<li><a href="#">Relógios</a></li>
										</ul>
									</div>
									<div class="col-md-12 col-sm-12">
										<a class="listar-produtos" href="produtos-vasos-de-ceramica.php">Ver todos os produtos <span class="more">></span></a>
									</div>
								</div>
							</div>
							<br class="visible-sm"> 
							<br class="visible-sm"> 
							<div class="col-md-7">
								<div class="row">
									<div class="col-md-12">
										<h3 class="titulo">Utensilios Domésticos</h3>
									</div>
									<div class="col-md-4 col-sm-4">
										<ul>
											<li><a href="#">Cutelaria</a></li>
											<li><a href="#">Galeteiro e Saleiro</a></li>
											<li><a href="#">Copos, Xícaras e Canecas</a></li>
											<li><a href="#">Cafeteira e Chaleira</a></li>
											<li><a href="#">Itens em Melanina</a></li>
											<li><a href="#">Panela e Frigideira</a></li>
											<li><a href="#">Tábuas</a></li>
											<li><a href="#">Taças</a></li>
											<li><a href="#">Garrafas para Servir</a></li>
											<li><a href="#">Kit para Queijo</a></li>
										</ul>
									</div>
									<div class="col-md-4 col-sm-4">
										<ul>
											<li><a href="#">Potes</a></li>
											<li><a href="#">Jogo Americano</a></li>
											<li><a href="#">Kit Jarra e Copo</a></li>
											<li><a href="#">Suqueira</a></li>
											<li><a href="#">Boleira</a></li>
											<li><a href="#">Enfeites de Metal</a></li>
											<li><a href="#">Prato de Servir</a></li>
											<li><a href="#">Bandeja de Vidro</a></li>
											<li><a href="#">Cestas</a></li>
											<li><a href="#">Cofres</a></li>
										</ul>
									</div>
									<div class="col-md-4 col-sm-4">
										<ul>
											<li><strong>Utensílios</strong></li>
											<li><a href="#">Cozinha</a></li>
											<li><a href="#">Vinho</a></li>
											<li><a href="#">Silicone</a></li>
											<li><a href="#">Saladeiras</a></li>
										</ul>
									</div>
									<div class="col-md-12 col-sm-12">
										<a class="listar-produtos" href="produtos-vasos-de-ceramica.php">Ver todos os produtos  <span class="more">></span></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</nav>
			<div class="shopping-cart-box">
				<a href="#" class="close-shopping-cart-box" >Fechar</a>
				<h3>Carrinho</h3>
				<div id="shopping-cart-results">
				</div>
			</div>
			
