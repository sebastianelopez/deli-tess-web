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
        $sql = "SELECT id, name, State FROM $this->table WHERE id = $id";
        $result = $this->con->query($sql,PDO::FETCH_CLASS,'RestaurantEntity')->fetch();
        
        return $result;
    }

    public function getAll($where = array()){
        $sql = "SELECT id, name, State FROM $this->table";
        $result = $this->con->query($sql,PDO::FETCH_CLASS,'RestaurantEntity')->fetchAll();
        return $result;
    }


    public function save($data = array()){
        $sql = "INSERT INTO restaurant(id,name,State) VALUES ('".$data['id']."','".$data['name']."','".$data['State']."')";
        return $this->con->exec($sql);
    }

    public function modify($id, $data = array()){
        $this->delete($id);
        $this->save($data);
    }

    public function delete($id){
        $sql = "DELETE FROM $this->table WHERE id = $id";        
        return $this->con->exec($sql);
    }
}


?>