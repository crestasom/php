<?php

class Stock extends MainModel {

    public function __construct() {
        $this->tableName = "stock";
        parent::__construct();
    }

    public function labels() {
        return array(
            'category_id'=>'Catagory',
            'manufacturer_id'=>'Manufacturer',
            'title' => 'Title',
            'price'=>'Price',
            'unit'=>'Unit',
            'postDate' =>'Post Date',
            'status' => 'Status'
            
        );
    }

    public function getLatest($limit=3){
        
        $this->condition=" status=1 ORDER BY id DESC LIMIT $limit";
        //var_dump($this->findAll());
        //exit;
        return $this->findAll();
        
    }
    
    public function getRelated($id=null,$cat_id=NULL) {
       // echo $id;
        //exit;
        $this->condition=" status=1 and id!=$id AND category_id=$cat_id ORDER BY RAND() LIMIT 3";
        //$this->condition=" status=1 and id!=:id AND category_id=:cat_id ORDER BY RAND() LIMIT 3";
        $this->params=array(":cat_id"=>$cat_id,":id"=>$id);
        return $this->findAll();
        
    }
    
    public function  getCatTitle($id=NULL){
        $category=new Category();
        $data=$category->findById($id);
       if($data)
        {
            return $data->title;
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
            return $data->name;
        }
    }
    
    public function  getTopProducts($limit='4'){
        $this->condition=" status=1 ORDER BY hits DESC LIMIT $limit";
        $data=$this->findAll();
       if($data)
        {
            return $data;
        }
    }
    
}
