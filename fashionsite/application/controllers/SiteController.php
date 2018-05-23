<?php

class SiteController extends MainController {

    public function index($parameter = NULL) {

        $product = new Product();
        $data['product'] = $product;
        $manufacturer = new Manufacturer();
        $data['manufacturer'] = $manufacturer;
        $category = new Category();
        $data['category'] = $category;
        $data['seoTitle'] = "Home | E-Nepal";
        $this->loadView("index", $data);
    }

    public function error() {
        $category = new Category();
        $data['category'] = $category;
        $manu = new Manufacturer();
        $data['manufacturer'] = $manu;
        
        $this->loadViewNoSideBar("error",$data);
    }

    public function search() {

        $manufacturer = new Manufacturer();
        $data['manufacturer'] = $manufacturer;
        $category = new Category();
        $data['category'] = $category;
        if (isset($_POST['searchKey'])) {
            $searchKey = $_POST['searchKey'];
            $data['searchKey'] = $searchKey;
            $data['seoTitle'] = "Search | E-Nepal";

            //echo $searchKey;exit;
            $product = new Product();
            $product->condition = " title like '%$searchKey%' or detail like '$searchKey%'";
            $data['productSearch'] = $product->findAll();
            //echo '<pre>';
            //print_r($data['productSearch']);exit;
            $manufacturer->condition = " title like'%$searchKey%'";
            $data['manuSearch'] = $manufacturer->findAll();
            $category->condition = " title like '%$searchKey'";
            $data['catSearch'] = $category->findAll();
            //echo '<pre>';
            //print_r($data['catSearch']);exit;
            $this->loadViewNoSideBar('_search', $data);
        } else
            $this->loadViewNoSideBar('error',$data);
    }
    public function about(){
        $manufacturer = new Manufacturer();
        $data['manufacturer'] = $manufacturer;
        $category = new Category();
        $data['category'] = $category;
        $data['seoTitle'] = "Home | E-Nepal";
        $about=new About();
        $aboutRecord=$about->find();
        $data['aboutUs']=$aboutRecord->aboutUs;
        $this->loadViewNoSideBar('_about',$data);
    }
    
    public function privacy(){
        $manufacturer = new Manufacturer();
        $data['manufacturer'] = $manufacturer;
        $category = new Category();
        $data['category'] = $category;
        $data['seoTitle'] = "Home | E-Nepal";
        $about=new About();
        $aboutRecord=$about->find();
        $data['aboutUs']=$aboutRecord->privacy;
        $this->loadViewNoSideBar('_about',$data);
    }
    
    public function terms(){
       $manufacturer = new Manufacturer();
        $data['manufacturer'] = $manufacturer;
        $category = new Category();
        $data['category'] = $category;
        $data['seoTitle'] = "Home | E-Nepal";
        $about=new About();
        $aboutRecord=$about->find();
        $data['aboutUs']=$aboutRecord->terms;
        $this->loadViewNoSideBar('_about',$data);
    }

}
