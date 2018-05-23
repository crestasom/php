<?php

class VersionController extends MainController {

    public function __construct() {
       
    }

    public function updateVersion() {
         $this->isLoggedIn();
        $message = $_POST['message'];
        $version = new Version();
        $version->attributes = array('message' => $message);
        $version->insert();


        $this->setFlash("success", "Version Updated Successfully");
        $this->redirect("edge/index");
    }
    
    public function checkNew() {
        $version=new Version();
        $sql="select id from version order by id desc";
        $verRecord=$version->findByQuery($sql);
        //print_r($verRecord);
        $data = array('dbVersion' => $verRecord->id);
        echo json_encode($data);
    }

}
