<?php 

require_once('id_trait.php');
require_once('comment_collection.php');

    class Product  {
        protected $name;
        protected $price;
        protected $imageUrl;
        protected $restaurant;
        protected $description;
        protected CommentCollection $comments;

        use IdTrait;

        public function __construct(CommentCollection $commentCollection ){
            $this-> comments = $commentCollection;
        }
    }
?>