<?php

require_once(__DIR__.'/../DataAccess/ProductDAO.php');

class ProductBusiness{

    protected $ProductDao;
    
    function __construct($con){
        $this->PostDao = new ProductDAO($con);
    }

    public function getproductos($data = array()){
        $productos = $this->ProductDao->getAll($data); 

        return $productos;
    }

    public function getProducto($id){
        $producto = $this->ProductDao->getOne($id); 

        return $producto;
    }


}