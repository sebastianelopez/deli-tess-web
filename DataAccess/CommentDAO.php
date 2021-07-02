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
        $sql = "SELECT id, comment, rank, creationDate, product_id, user, product FROM $this->table WHERE id = $id";
        $result = $this->con->query($sql,PDO::FETCH_CLASS,'CommentEntity')->fetch();
        return $result;
    }

    public function getAll($where = array()){
        $sql = "SELECT id, comment, rank, creationDate, product_id, user, product FROM $this->table";
        $result = $this->con->query($sql,PDO::FETCH_CLASS,'CommentEntity')->fetchAll();
        return $result;
    }


    public function save($data = array()){
        $sql = "INSERT INTO comment(comment,rank, product_id, user, creationDate, product) VALUES ('".$data['comment']."','".$data['rank']."', '".$data['productId']."', '".$data['user']."', NOW(), '".$data['product']."')";
        
        return $this->con->exec($sql);
    }


    public function modify($id, $data = array()){   
    }

    public function delete($id){
        $sql = "DELETE FROM $this->table WHERE id = $id";
        return $this->con->exec($sql);
    }
}

?>