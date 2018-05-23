<?php

class Member extends MainModel {

   public $username = NULL;
    public $password = NULL;
    public $notShowInTheView=array("password");

    public function __construct() {
        $this->tableName = "members";
        parent::__construct();
    }

    public function loginCheck() {
        //$this->condition = "username='$this->username' and password=md5('$this->password') and status='1'";
        //$this->condition="username=:username and password=:password and status=:status";
        //$this->params = array(":username" => $this->username, ":password" => md5($this->password), ":status" => '1');
        $login = $this->find();
        //var_dump($login);
        //exit;
        if ($login) {
            return $login;
        }
        return false;
    }

}
