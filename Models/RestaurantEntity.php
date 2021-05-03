<?php

require_once (__DIR__.'/BaseEntity.php');

class RestaurantEntity extends BaseEntity
{
 
    private $name;    

    public function __construct()
    {
        parent::__construct();

    }

     
    public function getName()
    {
        return $this->name;
    }
    
   
    
    public function setName($name)
    {
        $this->name = $name;
    }
    
}
