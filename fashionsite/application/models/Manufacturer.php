<?php

class Manufacturer extends MainModel {

    public $notShowInTheView=array("password");

    public function __construct() {
        $this->tableName = "manufacturer";
        parent::__construct();
    }

    public function labels() {
        return array(
            'name' => 'Name',
            'url' => 'Url',
            'seoTitle' =>'SEO Title',
            'seoDesc' =>'SEO Description',
            'postDate' =>'Post Date',
            'status' => 'Status'
            
        );
    }

    public function getCatagories(){
        $this->condition="category_id='0'";
        return $this->findAll();
    }
    
    public function  getManuTitle($id=NULL){
        $data=$this->findById($id);
       if($data)
        {
            return $data->title;
        }
        else{
            return FALSE;
        }
    }
    
    public function  getTopManufacturer($limit='4'){
        $this->condition=" status=1 ORDER BY hits DESC LIMIT $limit";
        $data=$this->findAll();
       if($data)
        {
            return $data;
        }
    }
    
}
