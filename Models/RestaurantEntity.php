<?php

require_once (__DIR__.'/BaseEntity.php');

class RestaurantEntity extends BaseEntity
{
 
    private $name;    
    private $State;

    public function __construct()
    {
        parent::__construct();

    }

     
    public function getName()
    {
        return $this->name;
    }

    public function getState()
    {
        return $this->State;
    }
    
   
    
    public function setName($name)
    {
        $this->name = $name;
    }

    public function setState($State)
    {
        $this->State = $State;
    }
    
}
