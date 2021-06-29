<?php

require_once (__DIR__.'/BaseEntity.php');
require_once (__DIR__.'/CategoryEntity.php');
require_once (__DIR__.'/RestaurantEntity.php');

class ProductEntity extends BaseEntity
{
    
    private $name;
    private $price;
    private $comment;
    private $image;
    private $description;
    private $idCategory;
    private $idRestaurant;
    private $State;
    

    public function __construct()
    {
        parent::__construct();

        $this->comment = array();
    }

     
    public function getName()
    {
        return $this->name;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getImage()
    {
        return $this->image;
    }
    public function getRestaurant()
    {
        return $this->idRestaurant;
    }
    public function getCategory()
    {
        return $this->idCategory;
    }
    public function getComments()
    {
        return $this->comment;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getState()
    {
        return $this->State;
    }


    
    public function setName($name)
    {
        $this->name = $name;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function setImage($image)
    {
        $this->image = $image;
    }
    public function setRestaurant($idRestaurant)
    {
        $this->idRestaurant = $idRestaurant;
    }
    public function setCategory($idCategory)
    {
        $this->idCategory = $idCategory;
    }
    public function setComments($comment)
    {
        $this->comment = $comment;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function setState($State)
    {
        $this->State = $State;
    }
}
