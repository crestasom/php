<?php

class ManufacturerController extends MainController{
    public function index($parameter=NULL)
    {
        $this->loadView("index");
    }
    
    public function view($url=NULL)
    {
        $sqls=array();
        $manufacturer=new Manufacturer();
        $manufacturer->condition=" status='1' AND url=:url ";
        $category=new Category();
        $data['category']=$category;
        
        $manufacturer->params=array();
        //update hits
        $sql="UPDATE manufacturer set hits=hits+1 where url=:url";
        $manufacturer->params=array(':url'=>$url);
        $manufacturer->updateByQuery($sql);
        
        $data['manufacturer']=$manufacturer;
        $manufacturer->params=array(":url"=>$url);
        $data['manufacturerInfo']=$manufacturer->find();
        $data['seoTitle']=$data['manufacturerInfo']->seoTitle;
        $product=new Product();
        $sqls[0]="SELECT count(*) as num "
                . "FROM product p "
                . "LEFT JOIN manufacturer c "
                . "on p.manufacturer_id=c.id "
                . "WHERE c.url=:url";//????
        $sqls[1]="SELECT p.*"
                . "FROM product p "
                . "LEFT JOIN manufacturer c "
                . "on p.manufacturer_id=c.id "
                . "WHERE c.url=:url";//????
        $product->params=array(":url"=>$url);
        
        //$data['manufacturers']=$products;
        $data['sqls']=$sqls;
        $data['products']=$product;
        $data['url']=$url;
        //var_dump($products);
        //exit;
        $this->loadView("view",$data);
    }
}