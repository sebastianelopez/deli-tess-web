<?php

require_once(__DIR__.'/../DataAccess/ProductDAO.php');

class ProductBusiness{

    protected $ProductDAO;
    
    function __construct($con){
        $this->ProductDAO = new ProductDAO($con);
        $this->CommentB = new CommentBusiness($con);
    }
    
    public function getProducts($data = array()){
        $products = $this->ProductDAO->getAll($data);       
        
        return $products;
    }

    public function getProduct($id){
        $product = $this->ProductDAO->getOne($id); 

        return $product;
    }

    public function getFeaturedProducts(){
        $existingProducts=[];

        foreach ($this->CommentB->getComments() as $comment) {
            if($comment->getScorage() == 5){

                $product = $this->ProductDAO->getOne($comment->getProduct()); 

                if(!in_array($product, $existingProducts)){
                    array_push($existingProducts,$product);
                }
            }        
        }
        return $existingProducts;
    }

    public function addNewProduct($data){
       return $this->ProductDAO->save($data);
    }

    public function modifyProduct($id, $data){
        $this -> ProductDAO -> modify($id, $data);
    }

    public function deleteProduct($id){
        $this -> ProductDAO -> delete($id);
    }   

    public function getImageUrl($url){
        $this->ProductDAO->getImageUrl($url);        
    }
    


}