<!DOCTYPE php>
<html lang="en">

<?php include_once('../includes/head.php');	  

 ?> 

	<body class="goto-here">
		<?php include_once('../includes/barritadearriba.php'); ?>
		<?php include_once('../includes/menu.php'); ?>

		<!-- END nav -->

		<div class="hero-wrap hero-bread" style="background-image: url('../images/bg_hamburguesa.jpg');">
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
							<li> Filtro por categoria </li>
							<li><a href="shop.php?categoria=&"></span>Todos</a></li>
							<?php 

							$CategoryB = new CategoryBusiness($con);
							$RestaurantB = new RestaurantBusiness($con);
							$ProductB = new ProductBusiness($con);

							
							

							
							
							foreach ($ProductB->getProducts($_GET) as $producto) {
								
								
																
							}
							
							foreach ($CategoryB->getCategories() as $category) {
							?>
								<li><a href="shop.php?categoria=<?php echo $category->getId() ?>&restaurante=<?php echo isset($_GET['restaurante'])?$_GET['restaurante']:''?>"><?php echo $category->getName()?></a></li>
							<?php } ?>
							
						</ul>

						<ul class="product-category">
							<li> Filtro por restaurante </li>
							<li><a href="shop.php?categoria=&"></span>Todos</a></li>
							<?php
							

							
							foreach ($RestaurantB->getRestaurants() as $restaurant) {
							?>
								<li><a href="shop.php?restaurante=<?php echo $restaurant->getId() ?>&categoria=<?php echo isset($_GET['categoria'])?$_GET['categoria']:''?>"><?php echo $restaurant->getName() ?></a></li>
								<?php } 
								?>
						</ul>
					</div>
				</div>
				<div class="row justify-content-center">
				 
				<?php 
							
				 
				error_reporting(E_ALL ^ E_NOTICE); 
				foreach ($ProductB->getProducts($_GET) as $product) {					
																			
							
				?>
							<div class="col-md-6 col-lg-3 ftco-animate">
								<div class="product">
									
									<a href="#" class="img-prod"><img class="img-fluid" src="<?php echo $product->getImageUrl() ?>" alt="imagen">
										<div class="overlay"></div>
									</a>
									<div class="text py-3 pb-4 px-3 text-center">
										<h3><a href="#"><?php echo $product-> getName() ?></a></h3>
										<div class="d-flex">
											<p class="text-left"><?php echo $product-> getDescription() ?></p>
											<div class="pricing">
												<p class="price"><span class="price-sale"><?php echo $product-> getPrice() ?></span></p>
											</div>
										</div>
										<div class="bottom-area d-flex px-3">
											<div class="m-auto d-flex">
												<a href="detalleproducto.php?detalle=<?php echo $product->getId() ?>" class="add-to-cart d-flex justify-content-center align-items-center text-center">
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


				<?php 
							}
				
					
				 ?>
				</div>

		</section>

		<?php include_once('../includes/footer.php'); ?>



		<!-- loader -->
		<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
				<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
				<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>


		<script src="../js/jquery.min.js"></script>
		<script src="../js/jquery-migrate-3.0.1.min.js"></script>
		<script src="../js/popper.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/jquery.easing.1.3.js"></script>
		<script src="../js/jquery.waypoints.min.js"></script>
		<script src="../js/jquery.stellar.min.js"></script>
		<script src="../js/owl.carousel.min.js"></script>
		<script src="../js/jquery.magnific-popup.min.js"></script>
		<script src="../js/aos.js"></script>
		<script src="../js/jquery.animateNumber.min.js"></script>
		<script src="../js/bootstrap-datepicker.js"></script>
		<script src="../js/scrollax.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
		<script src="../js/google-map.js"></script>
		<script src="../js/main.js"></script>

	</body>
</html>