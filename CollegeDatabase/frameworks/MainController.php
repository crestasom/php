<?php

class MainController {

    protected $header = "includes/header";
    protected $footer = "includes/footer";

    public function loadView($view = NULL, $data = null) {
        if ($data) {
            foreach ($data as $key => $value) {
                $$key = $value;
            }
        }
        include VIEW_PATH . "$this->header.php";
        include VIEW_PATH . controller . DS . "$view.php";
        include VIEW_PATH . "$this->footer.php";
    }

    public function loadPartialView($view = NULL, $data = array()) {
        //convert array keys into variable
        foreach ($data as $key => $value) {
            $$key = $value;
        }

        include VIEW_PATH . controller . DS . $view . ".php";
    }

    /**
     * to check whether session exists or not
     * @param type $key is session key value
     * @return boolean
     */
    public function isSession($key = NULL) {
        if (!$key)
            return FALSE;
        if (isset($_SESSION[$key]))
            return true;
        return FALSE;
    }

    public function redirect($url = NULL) {
        header("location:" . LINK_URL . $url);
        //echo LINK_URL.$url;
        exit;
    }

    public function isLoggedIn($url = "site/login") {
        if (!$this->isSession(SESSION_KEY)) {
            $this->redirect($url);
        }
    }
    
    //working with flash message
    public function setFlash($type="error",$message=NULL){
        if(!$message)
        {
            return FALSE;
        }
        $_SESSION['Message'][$type]=$message;
    }
    
    public function getFlash(){
        if(!$this->isSession('Message'))
            return FALSE;
        $messages=$_SESSION['Message'];
        unset($_SESSION['Message']);
        return $messages;
    }
    
    public function getModel($modelname=NULL){
        if(!$modelname)
            return FALSE;
        $model= new $modelname();
        $isSearch=false;
        
        
        if(isset($_POST['search'])){
            $isSearch=true;
            //to set the search values in session
            $_SESSION['search_by']=$_POST['searchBy'];
            $_SESSION['search_key']=$_POST['searchKey'];;
        }
        else if(isset($_SESSION['search_by']) and isset ($_GET['page'])){
            $isSearch=true;
        }
        else{
            unset($_SESSION['search_by']);
            unset($_SESSION['search_key']);
        }
        if($isSearch){
            $search_by=$_SESSION['search_by'];
            $search_key=$_SESSION['search_key'];
             $search_key="%".$search_key."%";
           $model->condition="$search_by LIKE :search_key";
           //echo $model->condition;
          // exit;
           $model->params['search_key']=$search_key;
        }
        return $model;
    }

}
