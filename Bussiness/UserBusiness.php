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

    public function createNewUser($data){
        $this -> UserDAO -> save($data);
    }

    public function modifyUser($data, $id){
        $this -> UserDAO -> modify($id, $data);
    }


    public function deleteUser($id){
        $this -> UserDAO -> delete($id);
    }

}