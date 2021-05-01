<?php

require_once ('BaseEntity.php');

class RestaurantEntity extends BaseEntity
{
 
    private $name;    

    public function __construct()
    {
        parent::__construct();

    }
    /**
     * Defino los Getters
     * 
     */
     
    public function getName()
    {
        return $this->name;
    }
    
   
    /**
     * Defino los Setters
     * 
     */
    
    public function setNombre($name)
    {
        $this->name = $name;
    }
    
}
