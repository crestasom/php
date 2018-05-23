<?php

class SiteController extends MainController {

    public function index() {
        $this->isLoggedIn();
        $this->loadView("index");
    }

    public function login() {
      // $this->isLoggedIn();
        if(isset($_SESSION[SESSION_KEY])){
            $this->redirect("edge/index");
        }
        else{
            $model = new Users();
            $data = array();


            //for login
            if (isset($_POST['login'])) {
                if ($_POST['login']) { {
                        $model->username = $_POST['username'];
                        $model->password = $_POST['password'];
                    }
                    if ($model->username=='admin' and $model->password=='123') {
                        $_SESSION[SESSION_KEY] = $model->username;
                        $this->redirect("edge/index");
                    } else {
                        $this->setFlash("error", "Invalid Username or Password");
                    }
                }
            }

            $this->loadPartialView("login", $data);
        }
    }

    public function logout() {
        session_destroy();
        $this->redirect("site/login");
    }

}
