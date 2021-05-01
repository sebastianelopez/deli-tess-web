<?php

require_once('../DataAccess/PostDAO.php');

class PostBusiness{

    protected $PostDao;

    function __construct($con){
        $this->PostDao = new PostDAO($con);
    }

    public function getEntradas($datos = array()){
        $entradas = $this->PostDao->getAll($datos); 

        return $entradas;
    }

    public function getEntrada($id){
        $entradas = $this->PostDao->getOne($id); 

        return $entradas;
    }


}