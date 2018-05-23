<?php

class Pages extends MainModel {

    public $notShowInTheView=array("password");

    public function __construct() {
        $this->tableName = 'pages';
        parent::__construct();
    }

    
    public function labels() {
        return array(
            'title' => 'Title',
            'url' => 'URL',
            'seoTitle' =>'SEO-Title',
            'seoDesc' =>'SEO-Description',
            'postdate'=>'Date',
            'status' => 'Status',
            'hits'=>'Hits'
        );
    }

}
