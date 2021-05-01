<?php

require_once ('BaseEntity.php');
require_once ('CategoryEntity.php');
require_once ('RestaurantEntity.php');

class ProductEntity extends BaseEntity
{
    
    private $name;
    private $price;
    private $comments;
    private $imageUrl;
    private $description;
    private CategoryEntity $category;
    private RestaurantEntity $restaurant;
    

    public function __construct()
    {
        parent::__construct();

        $this->comments = array();
    }

     
    public function getName()
    {
        return $this->name;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getImageUrl()
    {
        return $this->imageUrl;
    }
    public function getRestaurant()
    {
        return $this->restaurant;
    }
    public function getCategory()
    {
        return $this->category;
    }
    public function getComments()
    {
        return $this->comments;
    }
    public function getDescription()
    {
        return $this->description;
    }


    
    public function setName($name)
    {
        $this->name = $name;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;
    }
    public function setRestaurant($restaurant)
    {
        $this->restaurant = $restaurant;
    }
    public function setCategory($category)
    {
        $this->category = $category;
    }
    public function setComments($comments)
    {
        $this->comments = $comments;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }
}
