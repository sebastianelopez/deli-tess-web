<?php
 
class PermissionsEntity {

    protected $id;
    protected $name;
    protected $code;
    protected $module;

     
    public function getId(){
        return $this->id;
    } 

    public function setId($id){
        $this->id = $id;
    }
 
    
    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getCode(){
        return $this->code;
    }

    public function setCode($code){
        $this->code = $code;
    }

    public function getModule(){
        return $this->module;
    }

    public function setModule($module){
        $this->module = $module;
    }
}


?>