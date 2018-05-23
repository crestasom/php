<?php

class CategoryController extends MainController {

    public function __construct() {
        $this->isLoggedIn();
        $this->isAdmin();
    }

    public function index() {
        $model = $this->getModel("Category");
        $data['model'] = $model;
//var_dump($data['model']);
//exit;
        $this->loadView("index", $data);
    }

    public function create() {

        $model = $this->getModel("Category");
        $data = array("model" => $model);



        if (isset($_POST['create'])) {
            $model->attributes = $_POST['Category'];
           /* if ($model->attributes['category_id'] != 0) {
                $catUrl = strtolower($model->getCatUrl($model->attributes['category_id']));
                $model->attributes['url'] = $catUrl ."/". $model->attributes['url'];
            }*/
            $insert = $model->insert();
            if ($insert === TRUE) {
                $this->setFlash("success", "Category has been successfully created...");
                $this->redirect(controller . "/index");
            } else {
                $this->setFlash("error", "Category can not be created..." . $insert[2]);
            }
        }
        $this->loadView("create", $data);
    }

    public function update($id = NULL) {
        $model = $this->getModel("Category");
        $data['model'] = $model;
        $editData = $model->findById($id);


        if (isset($_POST['update'])) {
            $model->attributes = $_POST['Category'];
            //to update password
            //if($editData->password!=$model->attributes['password'])
            //$model->attributes['password'] = md5($model->attributes['password']);
            $update = $model->update($id);
            if ($update === TRUE) {
                $this->setFlash("success", "Category has been successfully updated...");
                $this->redirect(controller . "/index");
            } else {
                $this->setFlash("error", "Category can not be updated..." . $update[2]);
            }
        }
        $data['editData'] = $editData;
        $this->loadView("update", $data);
    }

    public function view($id = NULL) {
        $model = $this->getModel("Category");
        $data['model'] = $model;
        $data['viewData'] = $model->findById($id);
        $this->loadView("view", $data);
    }

    public function delete($id = NULL) {
        $model = $this->getModel("Category");
        $model->condition = "where id=$id";
        $delete = $model->deleteById($id);
        if ($delete)
            $this->setFlash("success", "Category has been successfully removed...");
        $this->redirect(controller . "/index");
    }

}
