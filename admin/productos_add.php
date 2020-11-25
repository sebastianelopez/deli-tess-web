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
    <?php include_once('includes/sidebar.php'); 
    
    function pathUrl($dir = __DIR__){

      $root = "";
      $dir = str_replace('\\', '/', realpath($dir));
    
      //HTTPS or HTTP
      $root .= !empty($_SERVER['HTTPS']) ? 'https' : 'http';
    
      //HOST
      $root .= '://' . $_SERVER['HTTP_HOST'];
    
      //ALIAS
      if(!empty($_SERVER['CONTEXT_PREFIX'])) {
          $root .= $_SERVER['CONTEXT_PREFIX'];
          $root .= substr($dir, strlen($_SERVER[ 'CONTEXT_DOCUMENT_ROOT' ]));
      } else {
          $root .= substr($dir, strlen($_SERVER[ 'DOCUMENT_ROOT' ]));
      }
    
      $root .= '/';
    
      return $root;
    }
    
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
          <h1 class="h3 mb-2 text-gray-800">Productos</h1>
          
<?php 
include_once('funcs.php');

//obtengo archivo
$datos = file_get_contents('productos.json');
//lo convierto en array
$datosJson=json_decode($datos,true);

    if(isset($_POST['add'])){

      $target_dir = __DIR__ . "/../uploads/";
      $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      
      // Check if image file is a actual image or fake image
      
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
         // die ("File is an image - " . $check["mime"] . "");
          $uploadOk = 1;
        } else {
          die ("File is not an image.");
        }
      
      
      // Check if file already exists
      if (file_exists($target_file)) {
        die ("Sorry, file already exists.");
      }
      
      // Check file size
      if ($_FILES["fileToUpload"]["size"] > 500000) {
        die ("Sorry, your file is too large.");
      }
      
      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
        die ("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
      }
      
      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        die ("Sorry, your file was not uploaded");
      // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          //die ("The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.");
        } else {
          die ("Sorry, there was an error uploading your file");
        }
      }
      

      //PARA LLAMR LA RUTA DE LA IMG
      
        if(isset($_GET['edit'])){
            $id= $_GET['edit'];
        }else{
            //agrego
            $id=date('Ymdhis');
        }        
        
        $datosJson[$id]= array('id'=>$id,'nombre'=>$_POST['nombre'],'descripcion'=>$_POST['descripcion'],'imagen'=>pathUrl(__DIR__. "/../") . "uploads/" . basename($_FILES["fileToUpload"]["name"]),'precio'=>$_POST['precio'],'activo'=>$_POST['activo']);
        $fp= fopen('productos.json','w');
        $datosString=json_encode($datosJson);     
        
        //guardo
        fwrite($fp,$datosString);
        fclose($fp);
        redirect('productos.php');
    }

    if(isset($_GET['edit'])){
        $dato=$datosJson[$_GET['edit']];
    }
     
?>


<div class="modal-content px-5 py-3">
            <div class="modal-header">                
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

   
    <form action="productos_add.php" method="post" enctype="multipart/form-data">
        Nombre:<br><input class="my-2" type="text" name="nombre" value="<?php echo isset($dato)?$dato['nombre']:'' ?>"><br />
        Descripcion:<br><input class="my-2" type="text" name="descripcion" value="<?php echo isset($dato)?$dato['descripcion']:'' ?>"><br />
        Imagen:<br><input class="my-2" type="file" name="fileToUpload" id="fileToUpload"><br />
        Precio:<br><input class="my-2" type="text" name="precio" value="<?php echo isset($dato)?$dato['precio']:'' ?>"><br />
        <br><input class="my-2 d-none" type="text" name="activo" value="true"><br />            
                <input class="my-2"type="submit" name="add">     

       
    </form>
</div>


    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!--
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
  </div>

  -->


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
