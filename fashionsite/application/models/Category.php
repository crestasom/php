<?php

class Category extends MainModel {

    public $notShowInTheView=array("password");

    public function __construct() {
        $this->tableName = "category";
        parent::__construct();
    }

    public function labels() {
        return array(
            'category_id'=>'Catagory',
            'title' => 'Title',
            'url' => 'Url',
            'seoTitle' =>'SEO Title',
            'seoDesc' =>'SEO Description',
            'postDate' =>'Post Date',
            'status' => 'Status'
            
        );
    }

    public function getCategories(){
        $this->condition=" category_id='0'";
        return $this->findAll();
    }
    
    public function  getCatTitle($id=NULL){
        $data=$this->findById($id);
       if($data)
        {
            return $data->title;
        }
        else{
            return "Main Category";
        }
    }
    public function getSubCategories($id=NULL){
        $this->condition=" category_id=$id and status='1'";
        $data=  $this->findAll();
        return $data;
        
    }
    public function  getCatUrl($id=NULL){
        $data=$this->findById($id);
       if($data)
        {
            return $data->url;
        }
        else{
            return FALSE;
        }
    }
    
    public function  getCatTitleFull($id=NULL){
        $data=$this->findById($id);
        $catid=$data->category_id;
        $catName=$this->getCatTitle($catid);
       if($data)
        {
            return $catName."-".$data->title;
        }
    }
    
    public function  getTopCateories($limit='4'){
        $this->condition=" status=1 and category_id!='0' ORDER BY hits DESC LIMIT $limit";
        $data=$this->findAll();
       if($data)
        {
            return $data;
        }
    }
}
