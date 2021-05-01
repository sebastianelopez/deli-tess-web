<?php

class BaseEntity
{

    protected $id;
    protected $creationDate;
    protected $modificationDate; 

    public function __construct(){ 
    }
   
    public function getId()
    {
        return $this->id;
    }
    public function getCreationDate()
    {
        return $this->creationDate;
    }
    public function getModificationDate()
    {
        return $this->modificationDate;
    }
  

    public function setId($id)
    {
        $this->id = $id;
    }
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }
    public function setModification($modificationDate)
    {
        $this->modificationDate = $modificationDate;
    }
   
}  