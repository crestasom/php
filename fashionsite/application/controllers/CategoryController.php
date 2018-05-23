<?php

class CategoryController extends MainController{
    public function index($parameter=NULL)
    {
        $this->loadView("index");
    }
    
    public function view($mainUrl=NULL,$url=NULL)
    {
        $sqls=array();
        $category=new Category();
        $category->condition=" url=:url";
        $category->params=array(":url"=>$mainUrl);
        $cat=$category->find();
        $category->params=array();
        //update hits
        $sql="UPDATE category set hits=hits+1 where url=:url and category_id=:cat_id";
        $category->params=array(':url'=>$url,':cat_id'=>$cat->id);
        $category->updateByQuery($sql);
        
        $category->params=array();
        $category->condition=" status='1' AND url=:url AND category_id=:cat_id ";
        $category->params=array(":url"=>$url,':cat_id'=>$cat->id);
        $data['categoryInfo']=$category->find();
        $data['seoTitle']=$data['categoryInfo']->seoTitle;
        $data['category']=$category;
        $manufacturer=new Manufacturer();
        $data['manufacturer']=$manufacturer;
        $product=new Product();
        $sqls[0]="SELECT count(*) as num"
                . " FROM product p "
                . " LEFT JOIN category c "
                . " on p.category_id=c.id "
                . " WHERE c.url=:url and c.category_id=:c_id";//????
        $sqls[1]="SELECT p.*"
                . " FROM product p "
                . " LEFT JOIN category c "
                . " on p.category_id=c.id "
                . " WHERE c.url=:url and c.category_id=:c_id";//????
        $product->params=array(":url"=>$url,":c_id"=>$cat->id);
        
        //echo $sql;
        //echo '<br>';
        //print_r( $product->params);
        //exit;
        $data['sqls']=$sqls;
        $data['products']=$product;
        $data['mainUrl']=$mainUrl;
        $data['url']=$url;
        //$data['product']=$products;
        //var_dump($products);
        //exit;
        $this->loadView("view",$data);
    }
}