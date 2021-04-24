<?php

require_once('abstract_entity.php');
require_once('commentary.php');

class Comments extends AbstractEntity {
    protected $comentaryList;
    protected $averallScorage;

    function __construct(){
        parent::__construct();
        $this-> comentaryList = array();
    }

public function getComments(){
    $comments = $this-> $commentaryList->getAll();
}
}