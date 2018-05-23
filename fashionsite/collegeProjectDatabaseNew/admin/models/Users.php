<?php

class Users extends MainModel {

    public $username = NULL;
    public $password = NULL;
    public $notShowInTheView=array("password");

    public function __construct() {
        $this->tableName = "user";
        parent::__construct();
    }

    public function loginCheck() {
        //$this->condition = "username='$this->username' and password=md5('$this->password') and status='1'";
        $this->condition="username=:username and password=:password and status=:status";
        $this->params = array(":username" => $this->username, ":password" => md5($this->password), ":status" => '1');
        $login = $this->find();
       // var_dump($login);
        //exit;
        if ($login) {
            return true;
        }
        return false;
    }

    public function labels() {
        return array(
            'fullname' => 'Full Name',
            'username' => 'Username',
            'email' =>'E-Mail',
            'postDate' =>'Post Date',
            'status' => 'Status'
            
        );
    }

}
