<?php

require_once (__DIR__.'/BaseEntity.php');

class CommentEntity extends BaseEntity
{
 
    private $user;    
    private $email; 
    private $comment;
    private $creationDate;
    private $rank;
    private $Product_id;

    public function __construct()
    {
        parent::__construct(); 
    }

     
    public function getComment()
    {
        return $this->comment;
    }
    public function getScorage()
    {
        return $this->rank;
    }
    public function getProduct()
    {
        return $this->Product_id;
    }
    
    public function getEmail()
    {
        return $this->email;
    } 
    public function getUser()
    {
        return $this->user;
    } 
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    
    public function setComment($comment)
    {
        $this->comment = $comment;
    }
    public function setScorage($rank)
    {
        $this->rank = $rank;
    }
    public function setPost($Product_id)
    {
        $this->Product_id = $Product_id;
    }
    
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setUser($user)
    {
        $this->user = $user;
    }
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }
}
