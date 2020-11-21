<!DOCTYPE php>
<html lang="en">


<?php include_once('includes/head.php'); ?>


<body class="goto-here">
	<?php include_once('includes/barritadearriba.php'); ?>
	<?php include_once('includes/menu.php'); ?>

	<!-- END nav -->

	<div class="hero-wrap hero-bread" style="background-image: url('images/bg_hamburguesa.jpg');">
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-9 ftco-animate text-center">
					<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Inicio</a></span> <span>Productos</span></p>
					<h1 class="mb-0 bread">Productos</h1>
				</div>
			</div>
		</div>
	</div>

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10 mb-5 text-center">

					<ul class="product-category">
						<li><a href="shop.php?cat=&"></span>Todos</a></li>
						<?php

						include('datosDelitess/categorias.php');
						foreach ($categorias as $cat) {
						?>
							<li><a href="shop.php?cat=<?php echo $cat['id'] ?>"><?php echo $cat['nombre'] ?></a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<div class="row justify-content-center">
				<?php include_once('datosDelitess/productos.php');
				foreach ($productos as $prod) {
					if ($prod['activo'] == true) {
						$imprimir = true;

						if (!empty($_GET['cat'])) {
							if ($prod['categorias'] != $_GET['cat']) {
								$imprimir = false;
							}
						}
						if ($imprimir) {
				?>
							<div class="col-md-6 col-lg-3 ftco-animate">
								<div class="product">
									<a data-toggle="modal" href="#myModal" class="img-prod"><img class="img-fluid" src="<?php echo $prod['imagen'] ?>" alt="Colorlib Template">
										<span class="status">30%</span>
										<div class="overlay"></div>
									</a>
									<!-- Modal -->
									<div class="text py-3 pb-4 px-3 text-center">
										<h3><a href="#"><?php echo $prod['nombre'] ?></a></h3>
										<div class="d-flex">
											<div class="pricing">
												<p class="price"><span class="mr-2 price-dc"><?php echo $prod['precio'] ?></span><span class="price-sale">$200.00</span></p>
											</div>
										</div>
										<div class="bottom-area d-flex px-3">
											<div class="m-auto d-flex">
												<a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
													<span><i class="ion-ios-menu"></i></span>
												</a>
												<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
													<span><i class="ion-ios-cart"></i></span>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="modal fade" id="myModal" role="dialog">
								<div class="modal-dialog">
									<!-- EDITANDO DESDE ACAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA -->
									<!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header">
											<h3 class="modal-title"><a href="#"><?php echo $prod['nombre'] ?></a></h3>
											<button type="button" class="close" data-dismiss="modal">&times;</button>

										</div>
										<div class="modal-body">
											<img class="img-fluid" src="<?php echo $prod['imagen'] ?>" alt="item">
											<div class="pricing">
												<p class="price"><span class="mr-2 price-dc"><?php echo $prod['precio'] ?></span><span class="price-sale"></span></p>
											</div>
										</div>
										<div class="modal-footer">

											<form action="comentar.php" method="POST">
											<?php include("com.json")?>
												<input name="comentario"placeholder="Comente aquí"/>
												<input type="submit" value="Publicar" class="mt-4" >
											</form>
											
										</div>
									</div>

								</div>
							</div>
				<?php }
					}
				} ?>
			</div>

	</section>

	<?php include_once('includes/footer.php'); ?>



	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>



	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-migrate-3.0.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/aos.js"></script>
	<script src="js/jquery.animateNumber.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/scrollax.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
	<script src="js/google-map.js"></script>
	<script src="js/main.js"></script>

</body>

</html>