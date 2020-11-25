<?php 
    $comentario = $_POST['comentario'];
    $guardar= fopen("com.json","a");
    fwrite($guardar,"<p>$comentario</p>");
    fclose($guardar);
    include("shop.php");
?>