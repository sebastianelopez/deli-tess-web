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

}