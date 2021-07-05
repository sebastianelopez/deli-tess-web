<?php

require_once(__DIR__.'/DAO.php');
require_once(__DIR__.'/CategoryDAO.php');
require_once(__DIR__.'/RestaurantDAO.php');
require_once(__DIR__.'/UserDAO.php');
require_once(__DIR__.'/../Models/ProductEntity.php');

class ProductDAO extends DAO{

    protected $CategoryDAO;
    protected $RestaurantDAO;
    protected $imageUrl;

    function __construct($con)
    {
        parent::__construct($con);
        $this->table = 'product';
        $this->RestaurantDAO= new RestaurantDAO($con);
        $this->CategoryDAO = new CategoryDAO($con);
        $this->imageUrl;
    }

    public function getOne($id){
        $sql = "SELECT id, name, image, price, description, idCategory, idRestaurant, State FROM $this->table WHERE id = $id";
        $result = $this->con->query($sql,PDO::FETCH_CLASS,'ProductEntity')->fetch();
        
        if($result){
            $result->setRestaurant($this->RestaurantDAO->getOne($result->getRestaurant()));
             $result->setCategory($this->CategoryDAO->getOne($result->getCategory()));
            
        }else{
            $result = new ProductEntity();
        }
        
        
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
                id, name, image, price, description, idCategory, idRestaurant, State
                FROM $this->table".$sqlWhereStr;
        
        $result = $this->con->query($sql,PDO::FETCH_CLASS,'ProductEntity')->fetchAll();

        foreach($result as $index=>$res){
            $result[$index]->setRestaurant($this->RestaurantDAO->getOne($res->getRestaurant()));
            $result[$index]->setCategory($this->CategoryDAO->getOne($res->getCategory()));
        }
        
        return $result;
    }

    public function save($data = array()){
        $image=$this->imageUrl;
        if($image){
            $sql = "INSERT INTO product(name, image,description,price, idCategory, idRestaurant, State) VALUES ('".$data['name']."', '".$image."' ,'".$data['description']."', '".$data['price']."', '".$data['idCategory']."', '".$data['idRestaurant']."', '".$data['State']."')";
        }else{
            $sql = "INSERT INTO product(name, description,price, idCategory, idRestaurant, State) VALUES ('".$data['name']."', '".$data['description']."', '".$data['price']."', '".$data['idCategory']."', '".$data['idRestaurant']."', '".$data['State']."')";
        }
        
            
        return $this->con->exec($sql);
    }


    public function modify($id, $data = array()){
      $image=$this->imageUrl;               

      
            if($image){
                $sql="UPDATE product SET name='".$data['name']."', image='".$image."', description ='".$data['description']."',price= '".$data['price']."', idCategory= '".$data['idCategory']."', idRestaurant= '".$data['idRestaurant']."', State= '".$data['State']."' WHERE id = $id";                
            }else{
                $sql="UPDATE product SET name='".$data['name']."', description ='".$data['description']."',price= '".$data['price']."', idCategory= '".$data['idCategory']."', idRestaurant= '".$data['idRestaurant']."', State= '".$data['State']."' WHERE id = $id";                
            }      
                       
        return $this->con->exec($sql);
    }

    public function delete($id){
        $sql = "DELETE FROM $this->table WHERE id = $id";        
        return $this->con->exec($sql);
    }

    public function getImageUrl($data){
         $this->imageUrl=$data;
    }
    
}

?>
