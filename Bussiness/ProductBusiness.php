<?php

require_once('../DataAccess/ProductDAO.php');

class PostBusiness{

    protected $ProductDao;

    function __construct($con){
        $this->PostDao = new ProductDAO($con);
    }

    public function getEntradas($data = array()){
        $entradas = $this->ProductDao->getAll($data); 

        return $entradas;
    }

    public function getEntrada($id){
        $entradas = $this->ProductDao->getOne($id); 

        return $entradas;
    }


}