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
	    						<li><a href="catalogo.php">QUEM SOMOS</a></li>
	    						<li class="dropdown">
	    							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">DECORAÇÃO <span class="caret"></span></a>
	    							<ul class="dropdown-menu hidden-sm hidden-md hidden-lg">
										<li><strong>Decoração</strong></li>
										<li><a href="catalogo.php">Ariaú</a></li>
										<li><a href="">África</a></li>
										<li><a href="catalogo.php">Iron</a></li>
										<li><a href="catalogo.php">Dakar</a></li>
										<li><a href="catalogo.php">Craquele</a></li>
										<li><a href="catalogo.php">Volcano</a></li>
										<li><a href="catalogo.php">Panambi</a></li>
										<li><a href="catalogo.php">Mont Blanc</a></li>
										<li><a href="catalogo.php">Mont Dior</a></li>
										<li><a href="catalogo.php">New Life</a></li>
										<li><a href="catalogo.php">Bella Dona</a></li>
										<li><a href="catalogo.php">Murano</a></li>
										<li><a href="catalogo.php">Veneza</a></li>
										<li><a href="catalogo.php">Chamois</a></li>
										<li><a href="catalogo.php">Del Vetro</a></li>
										<li><a href="catalogo.php">Vetreria</a></li>
										<li><a href="catalogo.php">Safari</a></li>
										<li><a href="catalogo.php">Iceberg</a></li>
										<li><a href="catalogo.php">Porta-Retratos</a></li>
										<li><a href="catalogo.php">Dancing</a></li>
										<li><a href="catalogo.php">Box Funny</a></li>
										<li><a href="catalogo.php">Metal Decor</a></li>
										<li><a href="catalogo.php">Cristal Six Rouge</a></li>
										<li><a href="catalogo.php">Alaska</a></li>
										<li><a href="catalogo.php">Mont Catani</a></li>
										<li><a href="catalogo.php">Quêbec</a></li>
										<li><a href="catalogo.php">Chantilly</a></li>
										<li><a href="catalogo.php">Relógios</a></li>
	    								<li role="separator" class="divider"></li>
	    								<li><strong>Utensílios Domésticos</strong></li>
	    								<li><a href="catalogo.php">Cutelaria</a></li>
										<li><a href="catalogo.php">Galeteiro e Saleiro</a></li>
										<li><a href="catalogo.php">Copos, Xícaras e Canecas</a></li>
										<li><a href="catalogo.php">Cafeteira e Chaleira</a></li>
										<li><a href="catalogo.php">Itens em Melanina</a></li>
										<li><a href="catalogo.php">Panela e Frigideira</a></li>
										<li><a href="catalogo.php">Tábuas</a></li>
										<li><a href="catalogo.php">Taças</a></li>
										<li><a href="catalogo.php">Garrafas para Servir</a></li>
										<li><a href="catalogo.php">Kit para Queijo</a></li>
										<li><a href="catalogo.php">Potes</a></li>
										<li><a href="catalogo.php">Jogo Americano</a></li>
										<li><a href="catalogo.php">Kit Jarra e Copo</a></li>
										<li><a href="catalogo.php">Suqueira</a></li>
										<li><a href="catalogo.php">Boleira</a></li>
										<li><a href="catalogo.php">Enfeites de Metal</a></li>
										<li><a href="catalogo.php">Prato de Servir</a></li>
										<li><a href="catalogo.php">Bandeja de Vidro</a></li>
										<li><a href="catalogo.php">Cestas</a></li>
										<li><a href="catalogo.php">Cofres</a></li>
										<li><a href="catalogo.php">Cozinha</a></li>
										<li><a href="catalogo.php">Vinho</a></li>
										<li><a href="catalogo.php">Silicone</a></li>
										<li><a href="catalogo.php">Saladeiras</a></li>
	    							</ul>
	    						</li>
	    						<li><a href="catalogo.php">CONTATO</a></li>
	    					</ul>
	    				</div><!-- /.navbar-collapse -->
	    				<div style="position: relative;" class="hidden-xs">
	    					<a href="#" class="cart-box" id="cart-info" title="View Cart">
	    						<?php 
	    						if(isset($_SESSION["products"])){
	    							echo count($_SESSION["products"]); 
	    						}else{
	    							echo 0; 
	    						}?>
	    					</a>
    						<div class="shopping-cart-box">
    							<a href="#" class="close-shopping-cart-box" >Fechar</a>
    							<h3>Orçamento</h3>
    							<div id="shopping-cart-results">
    							</div>
    						</div>
	    				</div>
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
											<li><a href="catalogo.php">Ariaú</a></li>
											<li><a href="produtos-decoracao.php">Istambul</a></li>
											<li><a href="produtos-decoracao.php">África</a></li>
											<li><a href="catalogo.php">Iron</a></li>
											<li><a href="catalogo.php">Dakar</a></li>
											<li><a href="catalogo.php">Craquele</a></li>
											<li><a href="catalogo.php">Volcano</a></li>
											<li><a href="catalogo.php">Panambi</a></li>
											<li><a href="catalogo.php">Mont Blanc</a></li>
											<li><a href="catalogo.php">Mont Dior</a></li>
										</ul>
									</div>
									<div class="col-md-4 col-sm-4">
										<ul>
											<li><a href="catalogo.php">New Life</a></li>
											<li><a href="catalogo.php">Bella Dona</a></li>
											<li><a href="catalogo.php">Murano</a></li>
											<li><a href="catalogo.php">Veneza</a></li>
											<li><a href="catalogo.php">Chamois</a></li>
											<li><a href="catalogo.php">Del Vetro</a></li>
											<li><a href="catalogo.php">Vetreria</a></li>
											<li><a href="catalogo.php">Safari</a></li>
											<li><a href="catalogo.php">Iceberg</a></li>
											<li><a href="catalogo.php">Porta-Retratos</a></li>
										</ul>
									</div>
									<div class="col-md-4 col-sm-4">
										<ul>
											<li><a href="catalogo.php">Dancing</a></li>
											<li><a href="catalogo.php">Box Funny</a></li>
											<li><a href="catalogo.php">Metal Decor</a></li>
											<li><a href="catalogo.php">Cristal Six Rouge</a></li>
											<li><a href="catalogo.php">Alaska</a></li>
											<li><a href="catalogo.php">Mont Catani</a></li>
											<li><a href="catalogo.php">Quêbec</a></li>
											<li><a href="catalogo.php">Chantilly</a></li>
											<li><a href="catalogo.php">Relógios</a></li>
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
											<li><a href="catalogo.php">Cutelaria</a></li>
											<li><a href="catalogo.php">Galeteiro e Saleiro</a></li>
											<li><a href="catalogo.php">Copos, Xícaras e Canecas</a></li>
											<li><a href="catalogo.php">Cafeteira e Chaleira</a></li>
											<li><a href="catalogo.php">Itens em Melanina</a></li>
											<li><a href="catalogo.php">Panela e Frigideira</a></li>
											<li><a href="catalogo.php">Tábuas</a></li>
											<li><a href="catalogo.php">Taças</a></li>
											<li><a href="catalogo.php">Garrafas para Servir</a></li>
											<li><a href="catalogo.php">Kit para Queijo</a></li>
										</ul>
									</div>
									<div class="col-md-4 col-sm-4">
										<ul>
											<li><a href="catalogo.php">Potes</a></li>
											<li><a href="catalogo.php">Jogo Americano</a></li>
											<li><a href="catalogo.php">Kit Jarra e Copo</a></li>
											<li><a href="catalogo.php">Suqueira</a></li>
											<li><a href="catalogo.php">Boleira</a></li>
											<li><a href="catalogo.php">Enfeites de Metal</a></li>
											<li><a href="catalogo.php">Prato de Servir</a></li>
											<li><a href="catalogo.php">Bandeja de Vidro</a></li>
											<li><a href="catalogo.php">Cestas</a></li>
											<li><a href="catalogo.php">Cofres</a></li>
										</ul>
									</div>
									<div class="col-md-4 col-sm-4">
										<ul>
											<li><strong>Utensílios</strong></li>
											<li><a href="catalogo.php">Cozinha</a></li>
											<li><a href="catalogo.php">Vinho</a></li>
											<li><a href="catalogo.php">Silicone</a></li>
											<li><a href="catalogo.php">Saladeiras</a></li>
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
			
			
			
