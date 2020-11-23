<?php 
include_once('funcs.php');

//obtengo archivo
$datos = file_get_contents('productos.json');
//lo convierto en array
$datosJson=json_decode($datos,true);

    if(isset($_POST['add'])){

        if(isset($_GET['edit'])){
            $id= $_GET['edit'];
        }else{
            //agrego
            $id=date('Ymdhis');
        }        
        
        $datosJson[$id]= array('id'=>$id,'nombre'=>$_POST['nombre'],'descripcion'=>$_POST['descripcion'],'imagen'=>$_POST['imagen'],'precio'=>$_POST['precio']);
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
                <h3>Agregar</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
    <form action="" method="post">
        Nombre:<br><input class="my-2" type="text" name="nombre" value="<?php echo isset($dato)?$dato['nombre']:'' ?>"><br />
        Descripcion:<br><input class="my-2" type="text" name="descripcion" value="<?php echo isset($dato)?$dato['descripcion']:'' ?>"><br />
        Imagen:<br><input class="my-2" type="text" name="imagen" value="<?php echo isset($dato)?$dato['imagen']:'' ?>"><br />
        Precio:<br><input class="my-2" type="text" name="precio" value="<?php echo isset($dato)?$dato['precio']:'' ?>"><br />            
                <input class="my-2"type="submit" name="add">        
    </form>
</div>