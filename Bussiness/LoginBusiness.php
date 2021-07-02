<?php

require_once(__DIR__.'/../DataAccess/UserDAO.php');

class LoginBusiness{

    protected $UserDAO;

    function __construct($con){
        $this->UserDAO = new UserDAO($con);
    }

    function login($datos = array()){
        $user = $this->UserDAO->getOne($datos['user'],'user');  
        if(!empty($user)){
            if(password_verify($datos['pass'],$user->getPassword())){ 
                $_SESSION['user']['id'] = $user->getId();
                $_SESSION['user']['name'] = $user->getNombre();
                $_SESSION['user']['email'] = $user->getEmail();
                $_SESSION['user']['permissions'] = $this->getPermissions($user);
            }
        }else{
            return false;
        }
        return true;
        
    }

    function getPermissions($user){
        $permissions = array();
        foreach($user->getProfiles() as $profile){
            foreach($profile->getPermisos() as $permission){
                $permissions['code'][$permission->getCode()] = $permission->getCode();
                $permissions['module'][$permission->getModule()] = $permission->getModule();
            }
        }
        return $permissions;
    }
    

    function logout(){
        unset($_SESSION['user']);
    }

    function isLoged(){
        if(!empty($_SESSION['user']['id'])){
            return true;
        }
        return false;
    }
    
    function getLoggedUserId(){
        return $_SESSION['user']['id'];
    }
}
?>