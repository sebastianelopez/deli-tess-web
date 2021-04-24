<?php session_start();

include('funcs.php');

if (isset($_POST['login'])) {
  if ($_POST['pass'] == 'davinci' && $_POST['user'] == 'admin') {
    $_SESSION['usuario_logueado'] = true;
  }
}

if (isset($_GET['logout'])) {
  unset($_SESSION['usuario_logueado']);
}

if(!isset($_SESSION['usuario_logueado'])){
  redirect('login.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <?php include_once('includes/titulo.php') ?>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="css/jquery.timepicker.css">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

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
          <h1 class="h3 mb-2 text-gray-800">Categorias</h1>
          <p class="mb-4">Agregue, borre o modifique las categorias disponibles para los productos.</a>.</p>

        <?php include_once('funcs.php'); ?>
          <!-- Productos -->
        <?php 
          if(isset($_GET['del'])){
            //obtengo archivo
            $datos = file_get_contents('categorias.json');
            //lo convierto en array
            $datosJson=json_decode($datos,true);
            //elimino
            unset($datosJson[$_GET['del']]);
            $fp= fopen('categorias.json','w');
            $datosString=json_encode($datosJson);
            //guardo
            fwrite($fp,$datosString);
            fclose($fp);
            redirect('categorias.php');
          }
        ?>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <a class="m-0 font-weight-bold text-primary" href="categorias_add.php">+ Agregar</a>
              
            </div>
            
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>                      
                      <th>Modificar / Borrar</th>                      
                    </tr>
                  </thead>
                  <tbody> 
                      <?php                   
                        
                        $datos = file_get_contents('categorias.json');
                        $datosJson=json_decode($datos,true);

                        foreach($datosJson as $cat){ ?>
                            <tr>
                              <td><?php echo $cat['id'] ?></td>
                              <td><?php echo $cat['nombre'] ?></td>                              
                              <td><a class="m-0 font-weight-bold text-primary px-2"  href="categorias_add.php?edit=<?php echo $cat['id'] ?>">Modificar</a><a class="m-0 font-weight-bold text-primary" href="categorias.php?del=<?php echo $cat['id'] ?>">Borrar</a></td>                      
                          <!-- productos_add.php?edit=<?php echo $cat['id'] ?> -->
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
