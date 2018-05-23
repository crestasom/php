<?php
/**

 * this is back end of website
 */
session_start();
error_reporting(E_ALL);

//define root
define("ROOT",  dirname(__FILE__));


//define the directory seperator
define("DS",  DIRECTORY_SEPARATOR);

//define the view path
define("VIEW_PATH",ROOT.DS."admin".DS."views".DS);

//define the main url
define("MAIN_URL",'/php/projectVoting/');

//define link url
define("LINK_URL",MAIN_URL);

//define the public url
define("PUBLIC_URL",MAIN_URL."public/admin/");

//define the session key
define("SESSION_KEY","adminLogin");

//define the image url
define("IMAGE_URL","uploads/files/");

//include the config file
include "config/backend.php";
