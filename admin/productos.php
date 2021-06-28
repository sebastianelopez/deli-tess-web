<!DOCTYPE html>
<html lang="en">
<?php include_once('../presentation/includes/head.php');	?>
<?php session_start();

include('funcs.php');

$UserB = new UserBusiness($con);

  if (isset($_POST['login'])) {    
    foreach ($UserB->getUsers() as $user) {
      if ($_POST['pass'] ==  $user->getPassword() && $_POST['user'] === $user->getEmail()) {
        if($user->getPermissionLevel() == 1){
          $_SESSION['admin_logueado'] = true;
        }else{
          $_SESSION['usuario_logueado'] = true; 
        }        
      }
  }
}

if (isset($_GET['logout'])) {
  unset($_SESSION['admin_logueado']);
}

if(!isset($_SESSION['admin_logueado'])){
  redirect('login.php');
}

if(isset($_SESSION['usuario_logueado'])){
  redirect('../presentation/pages/index.php');
}


?>



<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include_once('includes/sidebar.php'); ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include_once('includes/topbar.php'); ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Productos</h1>
          <p class="mb-4">Agregue, borre o modifique los productos publicados.</a>.</p>

        <?php include_once('funcs.php'); ?>
          <!-- Productos -->
        <?php 
          if(isset($_GET['del'])){
            //obtengo archivo
            $datos = file_get_contents('productos.json');
            //lo convierto en array
            $datosJson=json_decode($datos,true);
            //elimino
            unset($datosJson[$_GET['del']]);
            $fp= fopen('productos.json','w');
            $datosString=json_encode($datosJson);
            //guardo
            fwrite($fp,$datosString);
            fclose($fp);
            redirect('productos.php');
          }
        ?>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <a class="m-0 font-weight-bold text-primary" href="productos_add.php">+ Agregar</a>
              
            </div>
            
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Descripcion</th>
                      <th>Imagen</th>
                      <th>Precio</th>
                      <th>Categoria</th>
                      <th>Restaurante</th>
                      <th>Estado</th>
                      <th>Modificar / Borrar</th>                      
                    </tr>
                  </thead>
                  <tbody> 
                      <?php                   
                        
                        $ProductB = new ProductBusiness($con);

                        foreach ($ProductB->getProducts($_GET) as $product) { ?>
                            <tr>
                              <td><?php echo $product->getId() ?></td>
                              <td><?php echo $product-> getName() ?></td>
                              <td><?php echo $product-> getDescription() ?>.</td>
                              <td><img class="img-fluid" src="<?php echo $product->getImageUrl() ?>" alt=""></a></td>
                              <td><?php echo $product-> getPrice() ?></td>
                              <td><?php echo $product->getCategory()->getName() ?></td>
                              <td><?php echo $product->getRestaurant()->getName() ?></td>
                              <td><?php echo $product->getState() ?></td>
                              <td><a class="m-0 font-weight-bold text-primary px-2"  href="productos_add.php?edit=<?php echo $product->getId() ?>">Modificar</a><a class="m-0 font-weight-bold text-primary" href="productos.php?del=<?php echo $product->getId() ?>">Borrar</a></td>                      
                          <!-- productos_add.php?edit=<?php echo $product->getId() ?> -->
                          </tr>   
                      <?php } ?>  
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
            

      

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.php">Logout</a>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Deli Tess 2020</span>
          </div>
        </div>
  </footer>
  <!-- End of Footer -->
  </div>



</body>
 

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
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
</html>

