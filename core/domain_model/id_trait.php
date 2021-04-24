<?php

    trait IdTrait {
        protected $id;
        protected $updateDate;

        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
            return $this;
        }
    }