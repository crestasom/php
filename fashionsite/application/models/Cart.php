<?php

class Cart extends MainModel {

  
    public function __construct() {
        $this->tableName = "cart";
        parent::__construct();
    }

    
}
