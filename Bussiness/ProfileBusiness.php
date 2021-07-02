<?php

require_once(__DIR__.'/../DataAccess/ProfileDAO.php');

class ProfileBusiness{

    protected $ProfileDAO;

    function __construct($con){
        $this->ProfileDAO = new ProfileDAO($con);
    }

    public function getProfiles(){
        $users = $this->ProfileDAO->getAll(); 

        return $users;
    }

    

}