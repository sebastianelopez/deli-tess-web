<?php

require_once(__DIR__.'/DAO.php');
require_once(__DIR__.'/ProfileDAO.php');
require_once(__DIR__.'/../Models/UserEntity.php');

class UserDAO extends DAO{

    protected $ProfileDAO;

    function __construct($con)
    {
        parent::__construct($con);
        $this->table = 'user';
        $this->ProfileDAO= new ProfileDAO($con);
    }

    public function getOne($data,$by = 'id'){
        $sql = "SELECT id,name,email,user,password FROM $this->table WHERE $by = '$data'";
        $result = $this->con->query($sql,PDO::FETCH_CLASS,'UserEntity')->fetch();
        if($result){
            $result->setProfiles($this->ProfileDAO->getAllByUser($result->getId()));
        }else{
            $result = new UserEntity();
        }

        return $result;
    }

    public function getAll($where = array()){
        $sql = "SELECT id, name,email,user, password FROM $this->table";
        $result = $this->con->query($sql,PDO::FETCH_CLASS,'UserEntity')->fetchAll();
        
        foreach($result as $index=>$user){
            $result[$index]->setProfiles($this->ProfileDAO->getAllByUser($user->getId()));
        }
        return $result;
    }

    public function save($data = array()){
        
        $profiles = $data['profiles'];
        unset($data['profiles']);
                
        $sql = "INSERT INTO user(name,email,user,password) VALUES('".$data['name']."', '".$data['email']."', '".$data['user']."', '".$data['pass']."');";
        echo $sql;
        $this->con->exec($sql);

        $id = $this->con->lastInsertId(); 
        
        foreach($profiles as $profile){
            
            $sql .= 'INSERT INTO user_profile(user,profile) VALUES('.$id.','.$profile.');';
        }

        $this->con->exec($sql);

        return;
    }


    public function modify($id, $data = array()){
        $profiles = $data['profiles'];
        unset($data['profiles']);
        
        $sql = 'DELETE FROM user_profile WHERE user = '.$id.';';
        
        foreach($profiles as $profile){
            $sql .= 'INSERT INTO user_profile VALUES('.$id.','.$profile.');';
        }
        
        return $this->con->exec($sql);
    }

    public function delete($id){
        $sql = 'DELETE FROM user_profile WHERE user = '.$id.';';
        $this->con->exec($sql);
        return ;

    }

    
}

?>