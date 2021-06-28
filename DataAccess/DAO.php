<?php

abstract class DAO{

    protected $con;
    protected $table;

    public abstract function getOne($id);
    public abstract function getAll($where = array());
    public abstract function save($data = array());
    public abstract function modify($id, $data = array());
    public abstract function delete($id);

    public function __construct($con)
    {
        $this->con = $con;
    }
}
    
?>