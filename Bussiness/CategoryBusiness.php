<?php

require_once(__DIR__.'/../DataAccess/CategoryDAO.php');

class CategoryBusiness{

    protected $CategoryDao;

    function __construct($con){
        $this->CategoryDAO = new CategoryDAO($con);
    }

    public function getCategories(){
        $categories = $this->CategoryDAO->getAll(); 

        return $categories;
    }

    public function getCategory($id){
        $category = $this->CategoryDAO->getOne($id); 

        return $category;
    }

    public function createNewCategory($data){
        $this -> CategoryDAO -> save($data);
    }

    public function modifyCategory($id, $data){
        $this -> CategoryDAO -> modify($id, $data);
    }


    public function deleteCategory($id){
        $this -> CategoryDAO -> delete($id);
    }

}