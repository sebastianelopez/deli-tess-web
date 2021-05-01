<?php

require_once('DAO.php');
require_once('../Models/RestaurantEntity.php');

class RestaurantDAO extends DAO{


    function __construct($con)
    {
        parent::__construct($con);
        $this->table = 'restaurant';
    }

    public function getOne($id){
        $sql = "SELECT id,creationDate,modificationDate,name FROM $this->table WHERE id = $id";
        $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'CategoryEntity')->fetch();
        return $resultado;

    }

    public function getAll($where = array()){
        $sql = "SELECT id,creationDate,modificationDate,name FROM $this->table";
        $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'CategoryEntity')->fetchAll();
        return $resultado;
    }
}

?>