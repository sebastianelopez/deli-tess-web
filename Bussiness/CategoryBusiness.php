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

    public function createNewCategory($data){
        $this -> CommentDAO -> save($data);
    }

    public function modifyCategory($data, $id){
        $this -> CommentDAO -> modify($id, $data);
    }


    public function deleteCategory($id){
        $this -> CommentDAO -> delete($id);
    }

}