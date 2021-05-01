<?php

require_once(__DIR__.'/../DataAccess/CategoryDAO.php');

class CategoryBusiness{

    protected $CategoryDao;

    function __construct($con){
        $this->CategoryDao = new CategoryDAO($con);
    }

    public function getCategories(){
        $categories = $this->CategoryDao->getAll(); 

        return $categories;
    }

}