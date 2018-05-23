<?php

class Payment extends MainModel {

  
    public function __construct() {
        $this->tableName = "payment";
        parent::__construct();
    }

    
}
