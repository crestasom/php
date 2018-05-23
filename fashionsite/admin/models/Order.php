<?php

class Order extends MainModel {


    public function __construct() {
        $this->tableName = "delivery";
        parent::__construct();
    }

    public function labels() {
        return array(
            'contactName'=>'Customer',
            'status'=>'Status',
            'postDate' => 'OrderDate'  
        );
    }

    public function getOrderStatus($status=NULL){
        
        if ($status) {
            return '<span class="label label-success">Delivered</label>';
        } else {
            return '<span class="label label-danger">Pending</label>';
        }
    }
    
    public function  getProductDetail($id=NULL){
        $stock=new Stock();
        $stockData=$stock->findById($id);
        $detail=array();
        $detail['size']=$stockData->size;
        $product=new Product();
        $productData=$product->findById($stockData->product_id);
        $detail['price']=$productData->price;
        $detail['title']=$productData->title;
        return $detail;
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
