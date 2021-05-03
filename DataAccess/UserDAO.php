<?php

require_once('DAO.php');
require_once(__DIR__.'/../Models/UserEntity.php');

class UserDAO extends DAO{

    function __construct($con)
    {
        parent::__construct($con);
        $this->table = 'user';
    }

    public function getOne($id){
        $sql = "SELECT id,creationDate,modificationDate,name,email,permissionLevel FROM $this->table WHERE id = $id";
        $result = $this->con->query($sql,PDO::FETCH_CLASS,'UserEntity')->fetch();
        return $result;

    }

    public function getAll($where = array()){
        $sql = "SELECT id,creationDate,modificationDate,name,email,permissionLevel FROM $this->table";
        $result = $this->con->query($sql,PDO::FETCH_CLASS,'UserEntity')->fetchAll();
        return $result;
    }

    
}

?>