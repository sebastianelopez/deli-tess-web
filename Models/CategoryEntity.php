<?php

require_once ('BaseEntity.php');

class CategoryEntity extends BaseEntity
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
