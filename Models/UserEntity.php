<?php

require_once (__DIR__.'/BaseEntity.php');

class UserEntity extends BaseEntity
{
 
    private $name;
    private $email;
    private $permissionLevel; 
    private $password;
    private $isLogged;

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
    public function getIsLogged()
    {
        return $this->isLogged;
    }
    public function getPermissionLevel()
    {
        return $this->permissionLevel;
    }
    public function getPassword()
    {
        return $this->password;
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setIsLogged($isLogged)
    {
        $this->isLogged = $isLogged;
    }
    public function setPermissionLevel($permissionLevel)
    {
        $this->permissionLevel = $permissionLevel;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
}  