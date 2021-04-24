<?php

require_once('id_trait.php');


    class Commentary {
        protected $scorage;
        protected $reviewText;
        protected $reviewerName;

        use IdTrait;

        public function __construct(){}

    }