<?php

require_once(__DIR__.'/DAO.php'); 
require_once(__DIR__.'/../Models/PermissionsEntity.php');

class PermissionsDAO extends DAO{

    
    public function __construct($con){
        $this->table = 'permissions';
        parent::__construct($con);
    }

   

    public function getAll($where = array()){
        $sql = "SELECT id, name, code, module FROM ".$this->table;
        if(!empty($where)){
            $sql .= ' WHERE '.implode(' ',$where);
        } 
        $sql.= "ORDER BY module, name ASC" ;
        $result = $this->con->query($sql,PDO::FETCH_CLASS,'PermissionsEntity');
        return $result;
    }

    public function getAllByProfile($profileId){
        $sql = "SELECT permissions.id, name, code, module  
                FROM permissions
                INNER JOIN profile_permissions ON profile_permissions.permission = permissions.id
                WHERE profile = ".$profileId ;   
        
        $result = $this->con->query($sql,PDO::FETCH_CLASS,'PermissionsEntity');
        
        return $result->fetchAll();

    }
    
    public function getOne($id){}
    

    public function save($data = array()){
        $sql = "INSERT INTO permissions(id, name, code, module) VALUES ('".$data['id']."','".$data['name']."','".$data['code']."','".$data['module']."')";
        return $this->con->exec($sql);
    }


    public function modify($id, $data = array()){
        $this->delete($id);
        $this->save($data);
    }

    public function delete($id){
        $sql = "DELETE FROM $this->table WHERE id = $id";
        return $this->con->exec($sql);
    }


} 
    

?>