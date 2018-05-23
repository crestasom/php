<?php

class Product extends MainModel {

    public $notShowInTheView=array("password");

    public function __construct() {
        $this->tableName = "product";
        parent::__construct();
    }

    public function labels() {
        return array(
            'category_id'=>'Catagory',
            'manufacturer_id'=>'Manufacturer',
            'title' => 'Title',
            'price'=>'Price',
            'postDate' =>'Post Date',
            'status' => 'Status'
            
        );
    }

    public function getCategories(){
        
        $category=new Category();
        $category->condition=' category_id!=0';
        return $category->findAll();
    }
    
    public function  getCatTitle($id=NULL){
        $category=new Category();
        $data=$category->findById($id);
       if($data)
        {
            return $data->title;
        }
    }
    
    public function  getCatTitleFull($id=NULL){
        $category=new Category();
        $data=$category->findById($id);
        $catid=$data->category_id;
        $catName=$this->getCatTitle($catid);
       if($data)
        {
            return $catName." ".$data->title;
        }
    }
    
    public function getManufacturer(){
        $Manufacturer=new Manufacturer();
        return $Manufacturer->findAll();
    }
    
    public function  getManuTitle($id=NULL){
         $Manufacturer=new Manufacturer();
        $data=$Manufacturer->findById($id);
       if($data)
        {
            return $data->title;
        }
    }
    
}
