<?php

require_once('abstract_entity.php');


    class Commentary extends AbstractEntity {
        protected $scorage;
        protected $reviewText;
        protected $reviewerName;

        public function __construct(){
            parent::__construct();
            
        }

    }