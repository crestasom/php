<?php

class UserController extends MainController {

    public function __construct() {
        
    }

    public function index() {
        $this->isLoggedIn();
        $this->isAdmin();
        $model = $this->getModel("Users");
        $data['model'] = $model;
//var_dump($data['model']);
//exit;
        $this->loadView("index", $data);
    }

    public function create() {
        $this->isLoggedIn();
        $this->isAdmin();

        $model = $this->getModel("Users");

        if (isset($_POST['create'])) {
            $model->attributes = $_POST['Users'];
            $model->attributes['password'] = md5($model->attributes['password']);
            $insert = $model->insert();
            if ($insert === TRUE) {
                $this->setFlash("success", "Users has been successfully created...");
                $this->redirect(controller . "/index");
            } else {
                $this->setFlash("error", "Users can not be created..." . $insert[2]);
            }
        }
        $this->loadView("create");
    }

    public function update($id = NULL) {
        $this->isLoggedIn();
        $this->isAdmin();

        $model = $this->getModel("Users");
        $data['model'] = $model;
        $editData = $model->findById($id);


        if (isset($_POST['update'])) {
            $model->attributes = $_POST['Users'];
            //to update password
            if ($editData->password != $model->attributes['password'])
                $model->attributes['password'] = md5($model->attributes['password']);
            $update = $model->update($id);
            if ($update === TRUE) {
                $this->setFlash("success", "Users has been successfully updated...");
                $this->redirect(controller . "/index");
            } else {
                $this->setFlash("error", "Users can not be updated..." . $update[2]);
            }
        }
        $data['editData'] = $editData;
        $this->loadView("update", $data);
    }

    public function view($id = NULL) {
        $this->isLoggedIn();
        $this->isAdmin();

        $model = $this->getModel("Users");
        $data['model'] = $model;
        $data['viewData'] = $model->findById($id);
        $this->loadView("view", $data);
    }

    public function delete($id = NULL) {
        $this->isLoggedIn();
        $this->isAdmin();

        $model = $this->getModel("Users");
        $model->condition = "where id=$id";
        $delete = $model->deleteById($id);
        if ($delete)
            $this->setFlash("success", "Users has been successfully removed...");
        $this->redirect(controller . "/index");
    }

    public function changePassword($id = NULL) {
        $this->isLoggedIn();
        

        $model = new Users();
        $data['model'] = $model;
        $viewData = $model->findById($id);

        if (isset($_POST['confirm'])) {
            $password = $_POST['Users'];
//            echo '<pre>';
//            print_r($password);
//            print_r($viewData);exit;
//            echo $viewData->password;
//            echo '<br>';
//            echo md5($password['oldPassword']);exit;
//            if ($viewData->password != md5($password['oldPassword'])) {
//                $this->setFlash("error", "Incorrect Password.Please try again...");
//            } else 
            if ($password['newPassword'] != $password['newPassword1']) {
                $this->setFlash("error", "Password doesnot match.Please try again...");
            } else {
                $model->attributes=array('password'=>  md5($password['newPassword']));
                $update=$model->update($id);
                //$sql = "UPDATE user SET password=:password WHERE id=$id";
                //$model->params = array(':password' => md5($password['newPassword']));
                //$update = $model->updateByQuery($sql);

                if ($update) {
                    $this->setFlash("success", "Password has been successfully changed...");
                    $this->redirect(controller . "/index");
                } else {
                    $this->setFlash("error", "Password can not be changed..." . $update[2]);
                }
            }
        }



        $this->loadPartialView("_changePassword", $data);
    }

    public function checkEmail() {
        $return = "false";
        if (isset($_POST['email'])) {
            $model = new Users();
            $model->condition = " email=:email";
            $model->params = array(':email' => $_POST['email']);


            $data = $model->find();

            if ($data) {
                $return = "true";
            }
            echo $return;
        }
    }
    
    public function checkPassword() {
        $return = "false";
        if (isset($_POST['password'])) {
            $username=$_SESSION[SESSION_KEY];
            $model = new Users();
            $model->condition = " username=:username and password=:password";
            $model->params = array(':password' => md5($_POST['password']),':username'=>$username);


            $data = $model->find();

            if ($data) {
                $return = "true";
            }
            echo $return;
        }
    }
    
    
    public function checkCode() {
        $return = "false";
        if (isset($_POST['code'])) {
            $model = new Users();
            $model->condition = " secretKey=:secretKey and id=:id";
            $model->params = array(':secretKey' => $_POST['code'],':id'=>$_POST['id']);
            $data = $model->find();
            if ($data) {
                $return = "true";
            }
            echo $return;
        }
    }
    

    public function forgotPassword() {
        $users = new Users();
        $data = array();
        if (isset($_POST['continue'])) {
            if ($this->isSession('captcha') AND trim(strtolower($_POST['captcha'])) == $_SESSION['captcha']) {
                $email = $_POST['email'];
                $users->attributes['email'] = $email;
                $users->condition = 'email=:email';
                $users->params = array(':email' => $email);
                $find = $users->find();
                if ($find) {
                    $secretKey = rand(1111, 9999);
                    $sql = "UPDATE user SET secretKey=:secretKey WHERE email=:email";
                    $users->params = array(':email' => $email, ':secretKey' => $secretKey);
                    $insert = $users->updateByQuery($sql);
                    $this->sendEmail(array('email' => $email, 'secretKey' => $secretKey));
                    $_SESSION['email']=$email;
                    $this->redirect("user/restorePassword/".$find->id);
                } else {
                    $this->setFlash('error', "Email Id Doesnot Exists.. Please Enter a Registered Email");
                }
            } else {
                $this->setFlash('error', "Invalid Captcha Code.Please Re-Type the Captcha again");
            }
        }



        $this->loadPartialView('_forgotPassword', $data);
    }

    private function sendEmail($attributes = array()) {
        //sending email with html format
        ob_start();
        $this->loadPartialView("_Password", $attributes);
        $message = ob_get_contents();
        ob_clean();
        echo $message;
        $to = $attributes['email'];
        $subject = "Confirmation Code";
        $header = "";
        @ mail($to, $subject, $message, $header);
    }

    public function restorePassword($id=NULL) {
        $model = new Users();
        $data['model'] = $model;

        if (isset($_POST['reset'])) {
            $password = $_POST['Users'];

            if ($password['newPassword'] != $password['newPassword1']) {
                $this->setFlash("error", "Password doesnot match.Please try again...");
            } else {
                $email=$_SESSION['email'];
                $model->attributes=array('password'=>  md5($password['newPassword']));
                $update=$model->update($id);
                //$sql = "UPDATE user SET password=:password WHERE email=:email";
                //$model->params = array(':password' => md5($password['newPassword']),':email'=>$email);
                //$update = $model->updateByQuery($sql);

                if ($update) {
                    $this->setFlash("success", "Password has been successfully resetted...");
                    $this->redirect(controller . "/index");
                } else {
                    $this->setFlash("error", "Password can not be changed..." . $update[2]);
                }
            }
        }



        $this->loadPartialView("_restorePassword",$data);
    }
    
    public function logout() {
        $this->isLoggedIn("member/login");
        session_destroy();
        if (isset($_SESSION['FBID'])) {
            $_SESSION['FBID'] = NULL;
            $_SESSION['FULLNAME'] = NULL;
            $_SESSION['EMAIL'] = NULL;
        }
        $this->redirect("site/index");
    }

}
