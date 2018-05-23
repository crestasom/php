<?php

class ProductController extends MainController {

    public function __construct() {
        $this->isLoggedIn();
    }

    public function index() {
        $model = $this->getModel("Product");
        $data['model'] = $model;
//var_dump($data['model']);
//exit;
        if (isset($_GET['category'])) {
            $_SESSION['category'] = $_GET['category'];
        } elseif (isset($_GET['manufacturer'])) {
            $_SESSION['manufacturer'] = $_GET['manufacturer'];
        }
        $this->loadView("index", $data);
    }

    public function create() {

        $model = $this->getModel("Product");
        $data = array("model" => $model);

        if (isset($_POST['create'])) {
            $model->attributes = $_POST['Product'];
            $imagename = array();
            $tmpimg = array();
            //for image
            //echo '<pre>';
            //print_r($_FILES['photos']['tmp_name']);exit;
            $tmpimg = $_FILES['photos']['name'];
            //print_r($tmpimg);exit;
            /* foreach ($tmpimg as $name => $value) {
              //   $imagename[] = preg_replace('/[^a-zA-Z0-9]+/', '-', $value);
              $imagename=$value;

              } */
            foreach ($tmpimg as $name => $value) {
                $newname = 'uploads/files/product/' . basename($value);
                //echo $newname;             echo ' ';
                //echo $_FILES['photos']['tmp_name'][$name];
                $copied = copy($_FILES['photos']['tmp_name'][$name], $newname);
            }//exit;
            $image = implode(",", $tmpimg);
            //echo $image;exit;

            $model->attributes['image'] = $image;
            $insert = $model->insert();
            if ($insert === TRUE) {

                //update stock
                $productid = $model->pdoObject->lastInsertId();
                $stock = new Stock();
                $sizes = explode(',', $_POST['size']);
                foreach ($sizes as $key => $value) {
                    $stock->attributes = array('product_id' => $productid, 'size' => $value, 'entryDate' => date());
                    $stock->insert();
                }
                $this->setFlash("success", "Product has been successfully created...");
                $this->redirect(controller . "/index");
            } else {
                $this->setFlash("error", "Product can not be created..." . $insert[2]);
            }
        }
        $this->loadView("create", $data);
    }

    public function update($id = NULL) {
        $model = $this->getModel("Product");
        $data['model'] = $model;
        $editData = $model->findById($id);
        $stock = new Stock();
        $stock->condition = " product_id=:id";
        $stock->params = array(':id' => $id);
        $stockItem = $stock->findAll();
        //echo '<pre>';
        //       print_r($stockItem);exit;
        $sizes = array();
        if ($stockItem) {
            foreach ($stockItem as $row) {
                $sizes[] = $row->size;
            }
            //print_r($sizes);exit;
            $editData->size = implode(",", $sizes);
        } else {
            $editData->size = '';
        }
//        echo '<pre>';
//        print_r($editData);
//        exit;

        if (isset($_POST['update'])) {
            //echo '<pre>';
            //print_r($_POST);
            //exit;
            $model->attributes = $_POST['Product'];
            //to update password
            //if($editData->password!=$model->attributes['password'])
            //$model->attributes['password'] = md5($model->attributes['password']);
            $update = $model->update($id);
            if ($update === TRUE) {
                $stock->attributes = array();
                $stock->attributes['size'] = $this->setFlash("success", "Product has been successfully updated...");
                $this->redirect(controller . "/index");
            } else {
                $this->setFlash("error", "Product can not be updated..." . $update[2]);
            }
        }
        $data['editData'] = $editData;
        $this->loadView("update", $data);
    }

    public function view($id = NULL) {
        $model = $this->getModel("Product");
        $data['model'] = $model;
        $data['viewData'] = $model->findById($id);
        $this->loadView("view", $data);
    }

    public function delete($id = NULL) {
        $model = $this->getModel("Product");
        $model->condition = "where id=$id";
        $delete = $model->deleteById($id);
        if ($delete)
            $this->setFlash("success", "Product has been successfully removed...");
        $this->redirect(controller . "/index");
    }

    public function listProduct() {

        $data = array();
        if (!$this->isSession(SESSION_KEY)) {
            $data['error'] = "Please Login to continue.";
            echo json_encode($data);
            exit;
        }

        try {
            $searchBy = $_POST['searchBy'];
            $searchKey = $_POST['searchKey'];
            $product = new Product();
            $product->condition = " %$searchBy%=%$searchKey%";
            $productList = $product->findAllByPagination();
            ob_start();
            $this->loadPartialView("_datalist", array('pagination' => $productList));
            $data['products'] = ob_get_contents();
            $data['model'] = $product;
            ob_clean();

            //$data['success'] = "Items Removed Successfully";
            //$data['cartList'] = $cartList;
            //$data['cartCount'] = Functions::countCart();
            //$data['cartAmt'] = Functions::getCartAmount();
        } catch (PDOException $ex) {
            $data['error'] = $ex->getMessage();
        }
        $data['cartItems'] = Functions::countCart();
        echo json_encode($data);
    }

}
