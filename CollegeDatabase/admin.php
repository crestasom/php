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
define("MAIN_URL",'/php/CollegeDatabase/');

//define link url
define("LINK_URL",MAIN_URL."admin.php?url=");

//define the public url
define("PUBLIC_URL",MAIN_URL."public/admin/");

//define the session key
define("SESSION_KEY","adminLogin");

define("IDS", "ids");

//$_SESSION[IDS]="asdf";

//include the config file
include "config/backend.php";
