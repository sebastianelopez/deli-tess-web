<!DOCTYPE html>
<html lang="en">

<?php include_once('../presentation/includes/head.php');	?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include_once('includes/sidebar.php'); 
    
    
    
    ?>
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
          <h1 class="h3 mb-2 text-gray-800">Restaurantes</h1>
          
<?php 
include_once('funcs.php');

$RestaurantB = new RestaurantBusiness($con);

if(isset($_POST['restaurantSubmit'])){
  unset($_POST['restaurantSubmit']);
  
  if(!empty($_GET['edit'])){
    $id = $_GET['edit'];
    $RestaurantB->modifyRestaurant($id,$_POST);
  }else{              
    $id = $RestaurantB->createNewRestaurant($_POST);
  }
  
  redirect('restaurantes.php');
}

$id = 0;
if(!empty($_GET['edit'])){
  $id = $_GET['edit'];
  $restaurant = $RestaurantB->getRestaurant($id);
}
     
?>

   
    <form action="" method="post" enctype="multipart/form-data">        
        Nombre:<br><input class="my-2" type="text" name="name" value="<?php echo isset($restaurant)?$restaurant->getName():'' ?>"><br />   
        Estado:<br><select name="State">
              
              <option value="activo" >activo</option>
              <option value="inactivo">inactivo</option>
            
          </select><br />   
          <br><input class="my-2 d-none" type="text" name="activo" value="true"><br />         
          <button type="submit" name="restaurantSubmit" class="btn btn-primary">Enviar</button>     

    </form>



    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>




</body>
<!-- Footer -->
<footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Deli Tess 2020</span>
          </div>
        </div>
      </footer>
 <!-- End of Footer -->

 
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
