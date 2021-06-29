<?php 
	$UserB = new UserBusiness($con);

?>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">DELI TESS</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.php" class="nav-link">Inicio</a></li>	          
              <li class="nav-item"><a href="shop.php" class="nav-link">Tienda</a></li>                 	             	
	          <li class="nav-item"><a href="about.php" class="nav-link">Sobre nosotros</a></li>	          
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contactenos</a></li>
			  <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart"></span>[0]</a></li>
			 
			  <li class="nav-item text-dark"><a href="../../admin/login.php" class="nav-link text-dark">
			  <!-- <?php 
			  		foreach($UserB->getUsers() as $user){	
						  						  			
						($user->getIsLogged() == 0) ?
						"Login"
						:
						"LogOut";			  
					  }
			  ?> -->
			  Login
			  </a></li>
			  
			  
			  </ul>
			</div>
	    </div>	    
	  </nav>

	  