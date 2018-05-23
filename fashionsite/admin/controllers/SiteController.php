<?php

class SiteController extends MainController {

    public function index() {
        $this->isLoggedIn();
        $this->redirect("order/index");
        //$this->loadView("index");
    }

    public function login() {
        // $this->isLoggedIn();
        if (isset($_COOKIE['userCookie'])) {
            $_SESSION[SESSION_KEY] = $_COOKIE['userCookie'];
            $_SESSION['isadmin']=$_COOKIE['userAdmin'];
        }
        if (isset($_SESSION[SESSION_KEY])) {
            $this->redirect("order/index");
        } else {
            $model = new Users();
            $data = array();


            //for login
            if (isset($_POST['login'])) {
                if ($_POST['login']) {
                    $model->username = $_POST['username'];
                    $model->password = $_POST['password'];
                    $login=$model->loginCheck();
                    if ($login) {
                        if (isset($_POST['rememberMe'])) {
						//echo("Remember me");exit;
                            $time = time() + 600;
                            $setcookie=setcookie("userCookie",$model->username, $time);
                            $setcookie=setcookie("userAdmin",$login->isadmin, $time);
                        }
                        $_SESSION[SESSION_KEY] = $model->username;
                        $_SESSION['memId']=$login->id;
                        $_SESSION['isadmin']=$login->isadmin;
                        
                        $model->params=array();
                        //updating server address
                        $model->attributes=array('lastLoginIp'=>$_SERVER[SERVER_ADDR]);
                        //print_r($model->attributes);
                        $model->update($login->id);
                        
                        
                        $this->redirect("order/index",$data);
                    } else {
                        $this->setFlash("error", "Invalid Username or Password");
                    }
                }
            }

            $this->loadPartialView("login", $data);
        }
    }

    public function logout() {
        unset($_SESSION[SESSION_KEY]);
        setcookie("userCookie", $username, time() - 1);
        $this->redirect("site/login");
    }
    
    public function error(){
        $this->loadView("error");
       
    }

}
