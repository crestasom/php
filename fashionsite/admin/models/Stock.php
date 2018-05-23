<?php

class Stock extends MainModel {

    public $notShowInTheView=array("password");

    public function __construct() {
        $this->tableName = "stock";
        parent::__construct();
    }
    
     public function labels() {
        return array(
            'size'=>'Size',
            'quantity'=>'Quantity',
            'entryDate' =>'Last Updated',
            'postDate' => 'Post Date'
            
        );
    }
    
}
