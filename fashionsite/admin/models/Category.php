<?php

class Category extends MainModel {

    public $notShowInTheView = array("password");

    public function __construct() {
        $this->tableName = "category";
        parent::__construct();
    }

    public function labels() {
        return array(
            'category_id' => 'Catagory',
            'title' => 'Title',
            'url' => 'Url',
            'seoTitle' => 'SEO Title',
            'seoDesc' => 'SEO Description',
            'postDate' => 'Post Date',
            'status' => 'Status'
        );
    }

    public function getCatagories() {
        $this->condition=" category_id='0'";
        return $this->findAll();
    }

    public function getCatTitle($id = NULL) {
        $data = $this->findById($id);
        if ($data) {
            return $data->title;
        } else {
            return "Main Catagory";
        }
    }
    
    public function getCatUrl($id = NULL) {
        $data = $this->findById($id);
        if ($data) {
            return $data->url;
        } else {
            return FALSE;
        }
    }

}
