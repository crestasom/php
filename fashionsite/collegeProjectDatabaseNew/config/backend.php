<?php


function load(){
    $url=isset($_GET['url'])?$_GET['url']:"edge/index";
    $controller="site";//default controller
    $method="index";//default method
    $parameter=NULL;
    $urls=  explode("/", $url);
    if(isset($urls[0]) and !empty($urls[0]))
        $controller=$urls[0];
    if(isset($urls[1]) and !empty($urls[1]))
        $method=$urls[1];
    if(isset($urls[2]) and !empty($urls[2]))
        $parameter=$urls[2];
    //define the controller constant
    
    define("controller",$controller);
    $controller.="Controller";
    $controllerName=  ucfirst($controller);
    $object= new $controllerName();
    $object->$method($parameter);
    
 
    
}
load();

function __autoload($className){
    if(file_exists(ROOT.DS."admin".DS."controllers".DS.$className.".php"))
        include_once ROOT.DS."admin".DS."controllers".DS.$className.".php";
    
    if(file_exists(ROOT.DS."frameworks".DS.$className.".php"))
        include_once ROOT.DS."frameworks".DS.$className.".php";
    
    if(file_exists(ROOT.DS."config".DS.$className.".php"))
        include_once ROOT.DS."config".DS.$className.".php";
    
    if(file_exists(ROOT.DS."admin".DS."models".DS.$className.".php"))
        include_once ROOT.DS."admin".DS."models".DS.$className.".php";
    
    
}