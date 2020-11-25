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
									<?php 
										if(isset($_POST['detalle'])){
										//obtengo archivo
										$datos = file_get_contents('admin/productos.json');
										//lo convierto en array
										$datosJson=json_decode($datos,true);
										foreach ($datosJson as $prod) {	
											if ($prod['id'] == $_GET['detalle']) {
												$imprimir = true;								
											}
											if ($imprimir) {
									?>	
							<div class="col-md-6 col-lg-3 ftco-animate">
								<div class="product">									
									<a href="#" class="img-prod"><img class="img-fluid" src="admin/img/<?php echo $prod['imagen'] ?>" alt="imagen">
										<div class="overlay"></div>
									</a>
									<div class="text py-3 pb-4 px-3 text-center">																	
										<h3><a href="#"><?php echo $prod['nombre'] ?></a></h3>
										<div class="d-flex">
											<p class="text-left"><?php echo $prod['descripcion'] ?></p>
											<div class="pricing">
												<p class="price"><span class="price-sale"><?php $prod['precio'] ?></span></p>
											</div>
										</div>
										<div class="bottom-area d-flex px-3">
											<div class="m-auto d-flex">
												<a href="shop.php" class="add-to-cart d-flex justify-content-center align-items-center text-center">Volver								
												</a>												
											</div>
											<?php 
											}
										}									
									}
											?>
										</div>
									</div>
								</div>
							</div>
							<?php 
                            include_once('funcs.php');
							
							$datos = file_get_contents('admin/productos.json');
                            //lo convierto en array
                            $datosJson=json_decode($datos,true);                            
                                if(isset($_POST['detalle'])){                        
                                         //agrego
										 $id= $_GET['detalle'];
										 $id2=date('Ymdhis');					                                  
									
									
                                    $datosJson[$id]= array('id'=>$id2,'nombre'=>$_POST['nombre'],'mensaje'=>$_POST['mensaje']);
                                    $fp= fopen('com.json','w');
                                    $datosString=json_encode($datosJson);     
                                    
                                    //guardo
                                    fwrite($fp,$datosString);
                                    fclose($fp);
                                    redirect('detalleproducto.php');
                            
                                    
                                }
                         ?>	

						<div class="modal-content px-5 py-3">							
						      
						
							Comentarios:<?php
											if(isset($_POST['detalle'])){
																	
										?>
										<p class="my-2"><?php echo $prod['comentario'['id']]?>
										 <?php echo $prod['comentario'['nombreusuario']]?>: 
										 <?php echo $prod['comentario'['mensaje']]?></p><br />										 
										 <?php 
											}
										
										?>
						<form action="" method="post" enctype="multipart/form-data">			
							Nombre:<br><input class="my-2" type="text" name="nombreusuario" value=""><br />							
							Mensaje:<br><input class="my-2" type="text" name="mensaje" value=""><br />
							<br>            
									<input class="my-2"type="submit" name="detalle">        
						</form>
					</div>
				
				 
				</div>
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