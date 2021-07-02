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

    public function getUser($id){
        $user = $this->UserDAO->getOne($id); 

        return $user;
    }

    public function createNewUser($data){
        $this -> UserDAO -> save($data);
    }

    public function modifyUser($id, $data){
        $this -> UserDAO -> modify($id, $data);
    }

    public function deleteUser($id){
        $this -> UserDAO -> delete($id);
    }

}