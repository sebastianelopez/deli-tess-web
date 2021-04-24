<?php 

require_once('abstract_entity.php');
require_once('comments.php');


    class Product extends AbstractEntity {
        protected $name;
        protected $price;
        protected $imageUrl;
        protected $restaurant;
        protected $description;
        protected Comments $comments;

        public function __construct(){
            parent::__construct();
            $this->$comments = new $Comments;
        }
    }

    

?>