<?php

class VotingController extends MainController {

    public function __construct() {
    }

    public function index() {
        $model = $this->getModel("Voting");
        $data['model'] = $model;

        $this->loadView("index", $data);
    }

    public function votingNew() {

        $model = $this->getModel("Voting");
        $data = array("model" => $model);

        if (isset($_POST['create'])) {
            $model->attributes = $_POST['Voting'];
            try{
            $insert = $model->insert();
            if ($insert === TRUE) {                             
                $this->setFlash("success", "Thank You for Voting");
                $this->redirect("index.html");
            }else{
            	$this->setFlash("error", "Sorry,You have already voted");
            	$this->redirect("index.html");
            } 
            }catch(PDOException $ex){
            	$this->setFlash("error", "Sorry,You have already voted for this project");
            	$this->redirect("index.html");
            }
        }
        $this->loadView("create", $data);
    }

    

    public function view($id = NULL) {
    	$this->isLoggedIn("login.html");
        $model = $this->getModel("Voting");
        $data['model'] = $model;
        $this->loadView("view", $data);
    }
    
    public function login() {
    	// $this->isLoggedIn();
    	if (isset($_COOKIE['userCookie'])) {
    		$_SESSION[SESSION_KEY] = $_COOKIE['userCookie'];
    		$_SESSION['isadmin']=$_COOKIE['userAdmin'];
    	}
    	if (isset($_SESSION[SESSION_KEY])) {
    		$this->redirect("index.html");
    	} else {
    			if (isset($_POST['login'])) {
    			if ($_POST['login']) {
    				$username = $_POST['username'];
    				$password = $_POST['password'];
    				if ($username=="necadmin" and $password=="projectexibition") {
    					if (isset($_POST['rememberMe'])) {
    						//echo("Remember me");exit;
    						$time = time() + 600;
    						$setcookie=setcookie("userCookie",$model->username, $time);
    						$setcookie=setcookie("userAdmin",$login->isadmin, $time);
    					}
    					$_SESSION[SESSION_KEY] = $username;    
    					$this->redirect("view.html",$data);
    				} else {
    					$this->setFlash("error", "Invalid Username or Password");
    				}
    			}
    		}
    		$this->loadPartialView("login");
    	}
    }


    public function logout() {
    	unset($_SESSION[SESSION_KEY]);
    	setcookie("userCookie", $username, time() - 1);
    	$this->redirect("index.html");
    }
}
