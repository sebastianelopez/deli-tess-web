<?php

require_once(__DIR__.'/../DataAccess/ProductDAO.php');

class ProductBusiness{

    protected $ProductDAO;
    
    function __construct($con){
        $this->ProductDAO = new ProductDAO($con);
    }

    function saveProduct($datos){ 
        return $this->PostDao->save($datos);
    }

    function modifyProduct($id, $datos){
        $this->PostDao->modify($id, $datos);
    }

    public function deleteProduct($id){
        $this->PostDao->delete($id); 

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