<?php

require_once(__DIR__.'/DAO.php');
require_once(__DIR__.'/PermissionsDAO.php');
require_once(__DIR__.'/../Models/ProfileEntity.php');

class ProfileDAO extends DAO{

    protected $PermissionsDAO;

    public function __construct($con){
        $this->table = 'profiles';
        parent::__construct($con);
        $this->PermissionsDAO = new PermissionsDAO($con);
    }
    
    public function getAll($where = array()){
        $sql = "SELECT id, name FROM ".$this->table;
        if(!empty($where)){
            $sql .= ' WHERE '.implode(' ',$where);
        } 
        $result = $this->con->query($sql,PDO::FETCH_CLASS,'ProfileEntity');
        return $result;

    }

    public function getAllByUser($userId){
        $sql = "SELECT profiles.id, name  
                FROM profiles
                INNER JOIN user_profile ON user_profile.profile = profiles.id
                WHERE user = ".$userId ;  
        
        $result = $this->con->query($sql,PDO::FETCH_CLASS,'ProfileEntity')->fetchAll();
        foreach($result as $index=>$profile){
            $result[$index]->setPermissions($this->PermissionsDAO->getAllByProfile($profile->getId()));
        }
        return $result;

    }
    
    public function getOne($id){
            $sql = "SELECT name FROM profiles WHERE id = ".$id;
            $result = $this->con->query($sql,PDO::FETCH_CLASS,'ProfileEntity')->fetch();
            $result->setPermissions($this->PermissionsDAO->getAllByProfile($id));

            return $result;
    }

    public function save($data = array()){
        $permissions = $data['permissions'];
        unset($data['permissions']);
        
        $profileId = $this->con->lastInsertId();
        $sql = '';
        foreach($permissions as $permission){
            $sql .= 'INSERT INTO profile_permissions VALUES ('.$profileId.','.$permission.');'; 
        }
        
        return $this->con->exec($sql);
    }

    public function modify($id, $data = array()){
        $permissions = $data['permissions'];
        unset($data['permissions']);
        
        $sql = 'DELETE FROM profile_permissions WHERE profileId = '.$id.';';
        foreach($permissions as $permission){
            $sql .= 'INSERT INTO profile_permissions VALUES ('.$id.','.$permission.');'; 
        }
        
        return $this->con->exec($sql);
        
    }

    public function delete($id){
        $sql = 'SELECT count(1) as cantidad FROM user_profile WHERE profileId = '.$id;
        $cantidad = $this->con->query($sql)->fetch();
        
        if($cantidad['cantidad'] > 0){
            return 0;
        }else{
            $sql = 'DELETE FROM profile_permissions WHERE profileId = '.$id.';';
            
            return $this->con->exec($sql);
        }
    }
} 


?>