<?php

require_once(__DIR__.'/../DataAccess/UserDAO.php');

class UserBusiness{

    protected $UserDAO;

    function __construct($con){
        $this->UserDAO = new UserDAO($con);
    }

    public function getUsers(){
        $users = $this->UserDAO->getAll(); 

        return $users;
    }

}