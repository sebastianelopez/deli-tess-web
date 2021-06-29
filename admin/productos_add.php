<!DOCTYPE html>
<html lang="en">

<?php include_once('../presentation/includes/head.php');  ?>

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
          <h1 class="h3 mb-2 text-gray-800">Productos</h1>

          <?php
          include_once('funcs.php');


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


          //obtengo archivo
          $CategoryB = new CategoryBusiness($con);
          $RestaurantB = new RestaurantBusiness($con);
          $ProductB = new ProductBusiness($con);

          if(isset($_POST['productSubmit'])){
            unset($_POST['productSubmit']);
            
            if(!empty($_GET['edit'])){
              $id = $_GET['edit'];
              $ProductB->modifyProduct($id,$_POST);
            }else{              
              $id = $ProductB->addNewProduct($_POST);
            }
            

            //////////////////////////////////////////////
            

              $target_dir = __DIR__ . "/../uploads/";
              $target_file = $target_dir . basename($_FILES["image"]["name"]);
              
              $uploadOk = 1;
              $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
              
              // Check if image file is a actual image or fake image
              
                $check = getimagesize($_FILES["image"]["tmp_name"]);
                if($check !== false) {
                 // die ("File is an image - " . $check["mime"] . "");
                  $uploadOk = 1;
                } else {
                  die ("El archivo no es una imagen.");
                }
              
              
              // Check if file already exists
              if (file_exists($target_file)) {
                die ("Lo siento, es archivo ya fue cargado.");
              }
              
              // Check file size
              if ($_FILES["image"]["size"] > 500000) {
                die ("Lo siento, tu archivo es muy grande.");
              }
              
              // Allow certain file formats
              if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
              && $imageFileType != "gif" ) {
                die ("Lo siento, solo se permiten archivos JPG, JPEG, PNG & GIF.");
              }
              
              // Check if $uploadOk is set to 0 by an error
              if ($uploadOk == 0) {
                die ("Lo siento, tu archivo no fue cargado.");
              // if everything is ok, try to upload file
              } else {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                  //die ("The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.");
                } else {
                  die ("Lo siento, hubo un error cargando tu archivo.");
                }             
                
              }

              if(!empty($_FILES['image'])){
                $ProductB->getImageUrl($target_file);
              }
            
             //redirect('productos.php');
          }
          
          $id = 0;
          if(!empty($_GET['edit'])){
            $id = $_GET['edit'];
            $product = $ProductB->getProduct($id);
          }

          
          ?>


          <form action="" method="post" enctype="multipart/form-data">
            ID:<br><input class="my-2" type="text" name="id" value="<?php echo isset($product) ? $product->getId() : '' ?>"><br />
            Nombre:<br><input class="my-2" type="text" name="name" value="<?php echo isset($product) ? $product->getName() : '' ?>"><br />
            Descripcion:<br><input class="my-2" type="text" name="description" value="<?php echo isset($product) ? $product->getDescription() : '' ?>"><br />
            Imagen:<br><input class="my-2" type="file" name="image" id="image" >
                   
            Precio:<br><input class="my-2" type="text" name="price" value="<?php echo isset($product) ? $product->getPrice() : '' ?>"><br />
            Categoria:<select name="idCategory">
              <?php
                foreach ($CategoryB->getCategories() as $cat) {
                ?>
                  <option value="<?php echo $cat->getId() ?>"><?php echo $cat->getName() ?></option>
                <?php
                }
              ?>
            </select>

            Restaurante:<select name="idRestaurant">
              <?php
              foreach ($RestaurantB->getRestaurants() as $rest) {
              ?>
                <option value="<?php echo $rest->getId() ?>"><?php echo $rest->getName() ?></option>
              <?php
              }
              ?>
            </select>
            Estado:<select name="State">
              
                <option value="activo">activo</option>
                <option value="inactivo">inactivo</option>
              
            </select>
            <br><input class="my-2 d-none" type="text" name="activo" value="true"><br />
            <button type="submit" name="productSubmit" class="btn btn-primary">Enviar</button>


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