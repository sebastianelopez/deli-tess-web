<?php

require_once ('BaseEntity.php');

class UserEntity extends BaseEntity
{
 
    private $name;
    private $email;
    private $permissionLevel; 

    public function __construct()
    { 
        parent::__construct();
    }

    public function getName()
    {
        return $this->name;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPermissionLevel()
    {
        return $this->permissionLevel;
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setPermissionLevel($permissionLevel)
    {
        $this->permissionLevel = $permissionLevel;
    }
}  