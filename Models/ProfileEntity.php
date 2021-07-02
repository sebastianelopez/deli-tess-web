<?php

require_once(__DIR__.'/BaseEntity.php');

class ProfileEntity extends BaseEntity{

    protected $name;
    protected $permissions;
 
    public function __construct(){
        $this->permissions = array();
        parent::__construct();
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getPermissions(){
        return $this->permissions;
    }

    public function setPermissions($permissions){
        $this->permissions = $permissions;
    }
  

}


?>