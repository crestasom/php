<?php

class StockController extends MainController {

    public function __construct() {
        $this->isLoggedIn();
    }

    
    public function update($id = NULL) {
        $model = new Stock();
        $data['model'] = $model;
        $product=new Product();
        $productItem=$product->findById($id);
        $model->condition=" product_id=:id";
        $model->params=array(':id'=>$id);
        $editData = $model->findAll();
        
        $data['name']=$productItem->title;
        //print_r($editData);exit;

        if (isset($_POST['update'])) {
            $ids=$_POST['id'];
            $quantity=$_POST['quantity'];
            foreach($ids as $key=>$value){
                $model->attributes=array();
                $model->attributes=array('quantity'=>$quantity[$value],'entryDate'=>date("Y/m/d"));
                $update=$model->update($value);
            }
            if ($update === TRUE) {
                $this->setFlash("success", "Stock of Product has been successfully updated...");
                $this->redirect("product/index");
            } else {
                $this->setFlash("error", "Stock can not be updated..." . $update[2]);
            }
        }
        $data['editData'] = $editData;
        $this->loadView("update", $data);
    }

    public function view($id = NULL) {
        $model = new Stock();
        $data['model'] = $model;
        $product=new Product();
        $productInfo=$product->findById($id);
        $data['name']=$productInfo->title;
        $model->condition=" product_id=:id";
        $model->params=array('id'=>$id);
        $data['viewData'] = $model->findAll();
        //echo '<pre>';
          //      print_r($data['viewData']);exit;
        $this->loadView("view", $data);
    }


}
