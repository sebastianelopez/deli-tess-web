<?php

class BaseEntity
{

    protected $id;
    protected $creaationDate;
    protected $modificationDate; 

    public function __construct()
    { 
    }
    /**
     * Defino los Getters
     * 
     */
    public function getId()
    {
        return $this->id;
    }
    public function getCreationDate()
    {
        return $this->creaationDate;
    }
    public function getModificationDate()
    {
        return $this->modificationDate;
    }
  
    
    /**
     * Defino los Setters
     * 
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setCreationDate($creaationDate)
    {
        $this->creaationDate = $creaationDate;
    }
    public function setModification($modificationDate)
    {
        $this->modificationDate = $modificationDate;
    }
   
}  