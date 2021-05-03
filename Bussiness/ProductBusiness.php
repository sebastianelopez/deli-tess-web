<?php

require_once(__DIR__.'/../DataAccess/ProductDAO.php');

class ProductBusiness{

    protected $ProductDAO;
    
    function __construct($con){
        $this->ProductDAO = new ProductDAO($con);
    }

    public function getProducts($data = array()){
        $products = $this->ProductDAO->getAll($data);       
        

        return $products;
    }

    public function getProduct($id){
        $product = $this->ProductDAO->getOne($id); 

        return $product;
    }


}