<?php

class ProductController extends MainController {

    public function index($parameter = NULL) {
        $this->loadView("index");
    }

    public function view($url = NULL) {

        try {
            $data['category']=new Category();
            $data['manufacturer']=new Manufacturer();
            $product = new Product();
            
            $product->params=array();
        //update hits
        $sql="UPDATE product set hits=hits+1 where url=:url";
        $product->params=array(':url'=>$url);
        $product->updateByQuery($sql);
            
            $product->condition = " status='1' AND url=:url ";
            $product->params = array(":url" => $url);
            $productData = $product->find();
            $stock=new Stock();
            $stock->condition=" product_id=:id and quantity > 0";
            $stock->params=array(':id'=>$productData->id);
            $stockItem=$stock->findAll();
            if ($productData) {
                
                $data['product'] = $productData;
                $data['productModel']=$product;
                $data['seoTitle']=$productData->seoTitle;
                $data['stockData']=$stockItem;
                $data['images']=  explode(",", $productData->image);
                //print_r($productData->image);exit;
                //print_r($data['images']);exit;
            } else {
                throw new Exception("Invalid Product Request");
            }
        } catch (Exception $ex) {
            $data['error']=$ex->getMessage();
            $this->loadView("../site/error",$data);
        }

        $this->loadView("view", $data);
    }

}
