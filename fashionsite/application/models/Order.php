<?php

class Order extends MainModel {

  
    public function __construct() {
        $this->tableName = "orders";
        parent::__construct();
    }

    
}
