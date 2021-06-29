<?php

require_once(__DIR__.'/../DataAccess/RestaurantDAO.php');

class RestaurantBusiness{

    protected $RestaurantDAO;

    function __construct($con){
        $this->RestaurantDAO = new RestaurantDAO($con);
    }

    public function getRestaurants(){
        $restaurants = $this->RestaurantDAO->getAll(); 

        return $restaurants;
    }

    public function getRestaurant($id){
        $restaurant = $this->RestaurantDAO->getOne($id); 

        return $restaurant;
    }

    
    public function createNewRestaurant($data){
        $this -> RestaurantDAO -> save($data);
    }

    public function modifyRestaurant($id,$data){
        $this -> RestaurantDAO -> modify($id, $data);
    }


    public function deleteRestaurant($id){
        $this -> RestaurantDAO -> delete($id);
    }

}