<?php

require_once(__DIR__.'/DAO.php');
require_once(__DIR__.'/../Models/RestaurantEntity.php');

class RestaurantDAO extends DAO{


    function __construct($con)
    {
        parent::__construct($con);
        $this->table = 'restaurant';
    }

    public function getOne($id){
        $sql = "SELECT id, name FROM $this->table WHERE id = $id";
        $result = $this->con->query($sql,PDO::FETCH_CLASS,'RestaurantEntity')->fetch();
        
        return $result;

    }

    public function getAll($where = array()){
        $sql = "SELECT id, name FROM $this->table";
        $result = $this->con->query($sql,PDO::FETCH_CLASS,'RestaurantEntity')->fetchAll();
        return $result;
    }
}

?>