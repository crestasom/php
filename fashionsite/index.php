<?php
//error_reporting(E_ALL);
session_start();


//define the root directory
define("ROOT",__DIR__);

//define the directory seperator
define("DS",DIRECTORY_SEPARATOR);

//define the view path
define("VIEW_PATH",ROOT.DS."application".DS."views".DS);

//define main url
define("MAIN_URL","/php/fashionsite/");

//define link url
//define("LINK_URL", MAIN_URL."index.php?url=");

//define link url with htaccess
define("LINK_URL", MAIN_URL."");

//define public url
define("PUBLIC_URL",MAIN_URL."/public/");

//define session key
define("SESSION_KEY","memKey");

//define the image url
define("IMAGE_URL",MAIN_URL."/uploads/files/");

//include the config file
include "config".DS."main.php";



