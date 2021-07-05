<!DOCTYPE php>
<html lang="en">
<?php include_once('../includes/head.php'); ?> 
  <body class="goto-here">
    <?php include_once('../includes/barritadearriba.php');?>
	<?php include_once('../includes/menu.php');
		  include_once('../../Config/path.php');
	?>	
	
    <!-- END nav -->

    <section id="home-section" class="hero">
		  <div class="home-slider owl-carousel">
	      <div class="slider-item" style="background-image: url(../images/bg_hamburguesa.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

	            <div class="col-md-12 ftco-animate text-center">
	              <h1 class="mb-2">Te ofrecemos la comida mas rica &amp; de calidad</h1>
	              <h2 class="subheading mb-4">Los mejores combos &amp; menús</h2>
	              <p><a href="#destacados" class="btn btn-primary">Ver detalles</a></p>
	            </div>

	          </div>
	        </div>
	      </div>

	      <div class="slider-item" style="background-image: url(../images/bg_pizza.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

	            <div class="col-sm-12 ftco-animate text-center">
	              <h1 class="mb-2">No te pierdas nuestras ofertas &amp; rebajas.</h1>
	              <h2 class="subheading mb-4">Lo mejor al mejor precio.</h2>
	              <p><a href="#destacados" class="btn btn-primary">Ver detalles</a></p>
	            </div>

	          </div>
	        </div>
	      </div>
	    </div>
    </section>

    <?php include_once('../includes/decoracionuno.php'); ?>

		<section class="ftco-section ftco-category ftco-no-pt">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-6 order-md-last align-items-stretch d-flex">
								<div class="category-wrap-2 ftco-animate img align-self-stretch d-flex" style="background-image: url(../images/simbolo.png);">
									<div class="text text-center">
										<h2>Productos</h2>
										<p>Gran variedad</p>
										<p><a href="#" class="btn btn-primary">Comprar ahora</a></p>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(../images/categoriahamburguesa.jpg);">
									<div class="text px-3 py-1">
										<h2 class="mb-0"><a href="#">Hamburguesas</a></h2>
									</div>
								</div>
								<div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(../images/categoriavegetales.jpg);">
									<div class="text px-3 py-1">
										<h2 class="mb-0"><a href="#">Vegetales</a></h2>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(../images/categoriabebidas.jpg);">
							<div class="text px-3 py-1">
								<h2 class="mb-0"><a href="#">Bebidas</a></h2>
							</div>		
						</div>
						<div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(../images/categoriapizza.jpg);">
							<div class="text px-3 py-1">
								<h2 class="mb-0"><a href="#">Pizzas</a></h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

    <section class="ftco-section" id="destacados">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<span class="subheading">Nuestros productos</span>
            <h2 class="mb-4" >Productos destacados</h2>
            <p>Estos son los productos con mejor reseña</p>
          </div>
        </div>   		
    	</div>
		<?php 
			

			$ProductB= new ProductBusiness($con);

			foreach ($ProductB->getFeaturedProducts() as $product) {	

		?>
    	<div class="container">
    		<div class="row">
    			
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="detalleproducto.php?detalle=<?php echo $product->getId() ?>" class="img-prod"><img class="img-fluid" src="<?php echo DIR_BASE.$product->getImage() ?>" alt="imagen de producto">
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#"><?php echo $product->getName() ?></a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span><?php echo $product->getPrice() ?></span></p>
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
    	</div>
    </section>		
		

    <?php include_once('../includes/nosotros.php'); ?>

	

    <hr>

				
    <?php include_once('../includes/footer.php'); ?>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


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

