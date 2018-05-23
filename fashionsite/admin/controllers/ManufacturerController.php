<?php

class ManufacturerController extends MainController {

    public function __construct() {
        $this->isAdmin();
        $this->isLoggedIn();
    }

    public function index() {
        $model = $this->getModel("Manufacturer");
        $data['model'] = $model;
        //echo'<pre>';
        //print_r($data['model']);
        //exit;
        $this->loadView("index", $data);
    }

    public function create() {

        $model = $this->getModel("Manufacturer");
        $data=array("model"=>$model);


        if (isset($_POST['create'])) {
            $model->attributes = $_POST['Manufacturer'];
            $insert = $model->insert();
            if ($insert === TRUE) {
                $this->setFlash("success", "Manufacturer has been successfully created...");
                $this->redirect(controller."/index");
            }
            else{
                $this->setFlash("error", "Manufacturer can not be created...".$insert[2]);
            }
        }
        $this->loadView("create",$data);
    }

    public function update($id = NULL) {
        $model = $this->getModel("Manufacturer");
        $data['model'] = $model;
        $editData = $model->findById($id);
        

        if (isset($_POST['update'])) {
            $model->attributes = $_POST['Manufacturer'];
            //to update password
            //if($editData->password!=$model->attributes['password'])
             //$model->attributes['password'] = md5($model->attributes['password']);
            $update = $model->update($id);
            if ($update === TRUE) {
                $this->setFlash("success", "Manufacturer has been successfully updated...");
                $this->redirect( controller."/index");
            } else {
                $this->setFlash("error", "Manufacturer can not be updated...".$update[2]);
            }
        }
        $data['editData']=$editData;
        $this->loadView("update", $data);
    }

    public function view($id = NULL) {
        $model = $this->getModel("Manufacturer");
        $data['model'] = $model;
        $data['viewData'] = $model->findById($id);
        $this->loadView("view", $data);
    }

    public function delete($id = NULL) {
        $model = $this->getModel("Manufacturer");
        $model->condition = "where id=$id";
        $delete = $model->deleteById($id);
        if ($delete)
            $this->setFlash("success", "Manufacturer has been successfully removed...");
            $this->redirect(controller . "/index");
    }

}
