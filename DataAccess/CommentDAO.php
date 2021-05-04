<?php

require_once(__DIR__.'/DAO.php');
require_once(__DIR__.'/../Models/CommentEntity.php');

class CommentDAO extends DAO{


    function __construct($con)
    {
        parent::__construct($con);
        $this->table = 'comment';
    }

    public function getOne($id){
        $sql = "SELECT id, creationDate, comment,rank, Product_id, user FROM $this->table WHERE id = $id";
        $result = $this->con->query($sql,PDO::FETCH_CLASS,'CommentEntity')->fetch();
        return $result;

    }

    public function getAll($where = array()){
        $sql = "SELECT id, creationDate, comment,rank, Product_id, user  FROM $this->table";
        $result = $this->con->query($sql,PDO::FETCH_CLASS,'CommentEntity')->fetchAll();
        return $result;
    }
}

?>