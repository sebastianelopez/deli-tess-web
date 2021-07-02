<?php

require_once (__DIR__.'/BaseEntity.php');

class UserEntity extends BaseEntity
{
 
    private $name;
    private $email;    
    private $password;
    private $user;
    private $profiles;    

    public function __construct()
    { 
        parent::__construct();
        $this->profiles = array();
    }

    public function getName()
    {
        return $this->name;
    }
    public function getEmail()
    {
        return $this->email;
    }
    
    public function getUser()
    {
        return $this->user;
    }
    public function getPassword()
    {
        return $this->password;
    }
    
    public function getProfiles()
    {
        return $this->profiles;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    
    public function setUser($user)
    {
        $this->user = $user;    
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setProfiles($profiles)
    {
        $this->profiles = $profiles;
    }

    public function gotProfile($id){       
        var_dump($this->getProfiles()); 
        foreach($this->getProfiles() as $profile){
            if($profile->getId() == $id){
                return true;
            }
        }
        return false;
    }
}  