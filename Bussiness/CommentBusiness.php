<?php

require_once(__DIR__.'/../DataAccess/CommentDAO.php');

class CommentBusiness{

    protected $CommentDAO;
    
    function __construct($con){
        $this->CommentDAO = new CommentDAO($con);
    }

    public function getComments($data = array()){
        $comments = $this->CommentDAO->getAll($data);       
        

        return $comments;
    }

    public function getComment($id){
        $comment = $this->CommentDAO->getOne($id); 

        return $comment;
    }
    


}