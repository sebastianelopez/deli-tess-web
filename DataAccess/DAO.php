<?php

abstract class DAO{

    protected $con;
    protected $table;

    public abstract function getOne($id);
    public abstract function getAll($where = array());

    public function __construct($con)
    {
        $this->con = $con;
        
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