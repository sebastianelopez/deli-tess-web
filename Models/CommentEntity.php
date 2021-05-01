<?php

require_once ('BaseEntity.php');

class CommentEntity extends BaseEntity
{
 
    private $comment;
    private $rank;
    private $product;
    private $user;    
    private $email; 

    public function __construct()
    {
        parent::__construct(); 
    }
    /**
     * Defino los Getters
     * 
     */
     
    public function getComment()
    {
        return $this->comment;
    }
    public function getRank()
    {
        return $this->rank;
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
    /**
     * Defino los Setters
     * 
     */
    
    public function setComment($comment)
    {
        $this->comment = $comment;
    }
    public function setRank($rank)
    {
        $this->rank = $rank;
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
