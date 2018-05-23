<?php

function load() {
    $url = isset($_GET['url']) ? $_GET['url'] : "site/index";
    $controller = "site"; //default controller
    $method = "index"; //default method
    $parameter1 = NULL; //default parameter
    $urls = explode("/", $url);
    if (isset($urls[0]) and ! empty($urls[0])) {
        $controller = $urls[0];
    }

    if (isset($urls[1]) and ! empty($urls[1])) {
        $method = $urls[1];
    }

    if (isset($urls[2]) and ! empty($urls[2])) {
        $parameter1 = $urls[2];
    }

    if (isset($urls[3]) and ! empty($urls[3])) {
        $parameter2 = $urls[3];
    }
    define("controller", $controller);
    $controller.="Controller";
    $controllername = ucfirst($controller);
    //echo $controllername."  ".$method;exit;
    if (class_exists($controllername, true)) {
        $object = new $controllername();
        
        if(method_exists($object, $method)){
        if (isset($urls[3]) and ! empty($urls[3])) {
            $object->$method($parameter1, $parameter2);
        } else {
            //try{
            $object->$method($parameter1);
            //}catch (BadMethodCallException $ex){
            //header("location:" . LINK_URL . "site/error");}
        }
        }else{
            header("location:" . LINK_URL . "site/error");
        }
        
    }else{
        header("location:" . LINK_URL . "site/error");
        //echo 'controller doesnot exists!!';
    }
}
load();

function __autoload($className) {
    if (file_exists(ROOT . DS . "application" . DS . "controllers" . DS . $className . ".php"))
        include_once(ROOT . DS . "application" . DS . "controllers" . DS . $className . ".php");
    if (file_exists(ROOT . DS . "frameworks" . DS . $className . ".php"))
        include_once(ROOT . DS . "frameworks" . DS . $className . ".php");
    if (file_exists(ROOT . DS . "config" . DS . $className . ".php"))
        include_once(ROOT . DS . "config" . DS . $className . ".php");
    if (file_exists(ROOT . DS . "application" . DS . "models" . DS . $className . ".php"))
        include_once(ROOT . DS . "application" . DS . "models" . DS . $className . ".php");
}
