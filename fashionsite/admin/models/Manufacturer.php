<?php

class Manufacturer extends MainModel {

    public $notShowInTheView = array("password");

    public function __construct() {
        $this->tableName = "manufacturer";
        parent::__construct();
    }

    public function labels() {
        return array(
            'title' => 'Name',
            'url' => 'Url',
            'seoTitle' => 'SEO Title',
            'seoDesc' => 'SEO Description',
            'postDate' => 'Post Date',
            'status' => 'Status'
        );
    }

    public function getCatagories() {
        $this->condition = "category_id='0'";
        return $this->findAll();
    }


}
