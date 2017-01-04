		<footer class="footer-main">
			<aside class="footer-menu container hidden-xs">
				<div class="row">
					<div class="col-md-12 wrap">
						<div class="row">
							<div class="col-md-3 col-xs-12 col-sm-12 center-block text-center-xs">
								<img class="center-block" src="img/rbc-global-business-bottom.png" alt="RBC Global Business">
							</div>
							<div class="col-md-9 col-xs-12 col-sm-12">
								<div class="row">
									<div class="col-md-3 col-sm-3 col-xs-6 hidden-xs">
										<dl>
											<dt>RBC</dt>
											<dd><a href="#">Quem Somos</a></dd>
											<dd><a href="#">Contato</a></dd>
										</dl>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-6 hidden-xs">
										<dl>
											<dt>PRODUTOS</dt>
											<dd><a href="produtos-decoracao.php">Decoração</a></dd>
											<dd><a href="produtos-vasos-de-ceramica.php">Utensílios Domésticos</a></dd>
										</dl>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-6 hidden-xs">
										<dl>
											<dt>LEGAL</dt>
											<dd><a href="#">Termos de Uso</a></dd>
											<dd><a href="#">Trocas e Devoluções</a></dd>
										</dl>
									</div>
									<div class="col-md-3 col-sm-3 hidden-xs">
										<dl>
											<dt>SIGA-NOS</dt>
											<dd>
												<a href="#" title="Facebbok"><i class="flaticon flaticon-social-facebook-circular-button"></i></a>
												<a href="#" title="Instagram"><i class="flaticon flaticon-instagram"></i></a>
											</dd>
										</dl>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</aside>
			<section class="copyright">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<p class="text-center">
								Copyright &copy; <?php echo date('Y') ?> RBC Global Business
							</p>
						</div>
					</div>
				</div>
			</section>
		</footer>

	    <script src="js/bootstrap.min.js"></script>
	    <script src="js/scripts.js"></script>
	    <script>
			$(document).ready(function(){
			
				$('a.dropdown-toggle').click( function(event){
                    event.stopPropagation();
                    $('nav.nav-fullwidth').toggle();
                });
            
                $(document).click( function(){
                    $('nav.nav-fullwidth').hide();
                });
            });
		</script>
  