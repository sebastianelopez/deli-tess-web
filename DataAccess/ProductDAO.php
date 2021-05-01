<?php

require_once('DAO.php');
require_once('CategoryDAO.php');
require_once('UserDAO.php');
require_once('../Models/PostEntity.php');

class ProductDAO extends DAO{

    protected $UserDao;
    protected $CategoryDao;

    function __construct($con)
    {
        parent::__construct($con);
        $this->table = 'product';
        $this->RestaurantDao= new RestaurantDAO($con);
        $this->CategoryDao = new CategoryDAO($con);
    }

    public function getOne($id){
        $sql = "SELECT id,creationDate,modificationDate,name,price,imageUrl,description, category, restaurant FROM $this->table WHERE id = $id";
        $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'ProductEntity')->fetch();
        
        $resultado->setRestaurant($this->RestaurantDAO->getOne($resultado->getName()));
        $resultado->setCategory($this->CategoryDao->getOne($resultado->getCategory()));
        
        return $resultado;

    }

    public function getAll($where = array()){

        $sqlWhereStr = ' WHERE 1=1 ';

        if(!empty($where['autor'])){
            $sqlWhereStr.= ' AND autor = '.$where['autor'];
        }
        if(!empty($where['cat'])){
            $sqlWhereStr .= ' AND categoria = '.$where['cat'];
        }
 
/*
        $sqlWhere = array();

        if(!empty($where['autor'])){
            $sqlWhere[] = ' AND autor = '.$where['autor'];
        }
        if(!empty($where['cat'])){
            $sqlWhere[]= ' AND categoria = '.$where['cat'];
        }
        $sqlWhereStr = '';
        if(!empty($sqlWhere)) $sqlWhereStr = ' WHERE 1=1 '.implode('',$sqlWhere);
*/
        $sql = "SELECT  id,
                        fechaCreacion,
                        fechaModificacion,
                        titulo,
                        entrada,
                        autor,
                        categoria 
                FROM $this->table".$sqlWhereStr;

        $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'PostEntity')->fetchAll();

        foreach($resultado as $index=>$res){
            $resultado[$index]->setAutor($this->UserDao->getOne($res->getAutor()));
            $resultado[$index]->setCategoria($this->CategoryDao->getOne($res->getCategoria()));
        }

        return $resultado;

    }

    
}

?>
