<?php

class OrderController extends MainController {

    public function __construct() {
        $this->isLoggedIn();
    }
    public function index() {
        $model = $this->getModel("Order");
        $data['model'] = $model;
        $this->loadView("index", $data);
    } 
    public function error(){
        $this->loadView("error");
        
       
    }
    
    public function view($id = NULL) {
        $model = $this->getModel("Order");
        $data['model'] = $model;
        $viewData=$model->findById($id);;
        $data['viewData'] = $viewData;
        $payment=new Payment();
        $data['paymentDetail']=$payment->findById($viewData->payment_id);
        $order=new Order();
        $orderids=  explode(",", $viewData->order_ids);
        $sql ="select * from orders where id=$orderids[0]";
        foreach($orderids as $id){
            $sql.=" or id=$id";
        }
        //echo $sql;exit;
        $data['orderDetail']=$order->findAllByQuery($sql);
        $this->loadViewNoSideBar("view", $data);
    }
    
    public  function changeStatus($id=null){
       $delivery=new Order();
       $delivery->attributes['status']='1';
       $delivery->update($id);
       $this->setFlash("success", "Delivery Info has been updated");
       $this->redirect('order/index');
    }

}
