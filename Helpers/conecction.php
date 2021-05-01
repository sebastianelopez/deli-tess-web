<?php

require_once('./../Config/db.php');

try{
    $con = new PDO("mysql:host=$dbHost;dbname=$dbName;port=$dbPort",$dbUser,$dbPass);
}catch(PDOException $error){
    echo $error->getMessage();
    die();
}

?>