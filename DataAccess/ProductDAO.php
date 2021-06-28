<?php

require_once(__DIR__.'/DAO.php');
require_once(__DIR__.'/CategoryDAO.php');
require_once(__DIR__.'/RestaurantDAO.php');
require_once(__DIR__.'/UserDAO.php');
require_once(__DIR__.'/../Models/ProductEntity.php');

class ProductDAO extends DAO{

    protected $CategoryDAO;
    protected $RestaurantDAO;

    function __construct($con)
    {
        parent::__construct($con);
        $this->table = 'product';
        $this->RestaurantDAO= new RestaurantDAO($con);
        $this->CategoryDAO = new CategoryDAO($con);
    }

    public function getOne($id){
        $sql = "SELECT id, name, price, imageUrl,description, idCategory, idRestaurant FROM $this->table WHERE id = $id";
        $result = $this->con->query($sql,PDO::FETCH_CLASS,'ProductEntity')->fetch();
        
        $result->setRestaurant($this->RestaurantDAO->getOne($result->getRestaurant()));
        $result->setCategory($this->CategoryDAO->getOne($result->getCategory()));
        
        return $result;

    }

    public function getAll($where = array()){
        $sqlWhereStr = ' WHERE 1=1 ';
        if(!empty($where['restaurante'])){
            $sqlWhereStr.= ' AND idRestaurant = '.$where['restaurante'];
        }
        if(!empty($where['categoria'])){
            $sqlWhereStr .= ' AND idCategory = '.$where['categoria'];
        }

        $sql = "SELECT  
                id, name, price, imageUrl, description, idCategory, idRestaurant
                FROM $this->table".$sqlWhereStr;
        
        $result = $this->con->query($sql,PDO::FETCH_CLASS,'ProductEntity')->fetchAll();

        foreach($result as $index=>$res){
            $result[$index]->setRestaurant($this->RestaurantDAO->getOne($res->getRestaurant()));
            $result[$index]->setCategory($this->CategoryDAO->getOne($res->getCategory()));
        }
        
        return $result;

    }

    public function save($data = array()){
        $sql = "INSERT INTO product(description,imageUrl,name,price) VALUES ('".$data['name']."','".$data['imageUrl']."'), '".$data['description']."'), '".$data['price']."'), creationDate = NOW()";
        return $this->con->exec($sql);
    }


    public function modify($id, $data = array()){
        $sql = "UPDATE product SET name = '".$data['name']."', description = '".$data['description']."', imageUrl = '".$data['imageUrl']."', price ='".$data['price']."', modificationDate = NOW() WHERE id = ".$id;
        echo $sql;
        return $this->con->exec($sql);
    }

    public function delete($id){
        $sql = "DELETE FROM $this->table WHERE id = $id";
        return $this->con->exec($sql);
    }
}

?>
