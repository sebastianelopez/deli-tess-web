<?php

require_once(__DIR__.'/DAO.php');
require_once(__DIR__.'/../Models/CategoryEntity.php');

class CategoryDAO extends DAO{


    function __construct($con)
    {
        parent::__construct($con);
        $this->table = 'category';
    }

    public function getOne($id){
        $sql = "SELECT id, name FROM $this->table WHERE id = $id";
        $result = $this->con->query($sql,PDO::FETCH_CLASS,'CategoryEntity')->fetch();
        return $result;
    }

    public function getAll($where = array()){
        $sql = "SELECT id, name FROM $this->table";
        $result = $this->con->query($sql,PDO::FETCH_CLASS,'CategoryEntity')->fetchAll();
        return $result;
    }

    public function save($data = array()){
        $sql = "INSERT INTO user(id,name,email) VALUES ('".$data['name']."','".$data['email']."')";
        return $this->con->exec($sql);
    }

    public function modify($id, $data = array()){
        $sql = "UPDATE user SET name = '".$data['name']."', email ='".$data['email']."', modificationDate = NOW() WHERE id = ".$id;
        echo $sql;
        return $this->con->exec($sql);
    }

    public function delete($id){
        $sql = "DELETE FROM $this->table WHERE id = $id";
        return $this->con->exec($sql);
    }
}

?>