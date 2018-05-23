<?php

class UserController extends MainController {

    public function __construct() {
        $this->isLoggedIn();
    }

    public function index() {
        $model = $this->getModel("Users");
        $data['model'] = $model;
//var_dump($data['model']);
//exit;
        $this->loadView("index", $data);
    }

    public function create() {

        $model = $this->getModel("Users");

        if (isset($_POST['create'])) {
            $model->attributes = $_POST['Users'];
            $model->attributes['password'] = md5($model->attributes['password']);
            $insert = $model->insert();
            if ($insert === TRUE) {
                $this->setFlash("success", "Users has been successfully created...");
                $this->redirect(controller."/index");
            }
            else{
                $this->setFlash("error", "Users can not be created...".$insert[2]);
            }
        }
        $this->loadView("create");
    }

    public function update($id = NULL) {
        $model = $this->getModel("Users");
        $data['model'] = $model;
        $editData = $model->findById($id);
        

        if (isset($_POST['update'])) {
            $model->attributes = $_POST['Users'];
            //to update password
            if($editData->password!=$model->attributes['password'])
             $model->attributes['password'] = md5($model->attributes['password']);
            $update = $model->update($id);
            if ($update === TRUE) {
                $this->setFlash("success", "Users has been successfully updated...");
                $this->redirect( controller."/index");
            } else {
                $this->setFlash("error", "Users can not be updated...".$update[2]);
            }
        }
        $data['editData']=$editData;
        $this->loadView("update", $data);
    }

    public function view($id = NULL) {
        $model = $this->getModel("Users");
        $data['model'] = $model;
        $data['viewData'] = $model->findById($id);
        $this->loadView("view", $data);
    }

    public function delete($id = NULL) {
        $model = $this->getModel("Users");
        $model->condition = "where id=$id";
        $delete = $model->deleteById($id);
        if ($delete)
            $this->setFlash("success", "Users has been successfully removed...");
            $this->redirect(controller . "/index");
    }

}
