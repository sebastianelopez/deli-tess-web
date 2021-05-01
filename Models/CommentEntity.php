<?php

require_once ('BaseEntity.php');

class CommentEntity extends BaseEntity
{
 
    private $user;    
    private $email; 
    private $comment;
    private $scorage;
    private $product;

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
        return $this->scorage;
    }
    public function getProduct()
    {
        return $this->product;
    }
    
    public function getEmail()
    {
        return $this->email;
    } 
    public function getUser()
    {
        return $this->user;
    } 

    
    public function setComment($comment)
    {
        $this->comment = $comment;
    }
    public function setScorage($scorage)
    {
        $this->scorage = $scorage;
    }
    public function setPost($product)
    {
        $this->product = $product;
    }
    
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setUser($user)
    {
        $this->user = $user;
    }
}
