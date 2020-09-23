<?php 
//you  must define if you want the user to load this config file or not 
//you define the config and allow it
//if there isnt aconfig defined dont load this file
//definiing the config file is the key for loading this page

if(!defined('__CONFIG__'))
exit("You dont have aconfig file 10");


//sesssions are always turned on
if(!isset($_SESSION))session_start();
/*the structure 
index will load sinin and register 
--> both will load config and footer
config loads the db*/

//now include the databse connection
include_once "classes/DB.php";
include_once "classes/Filter.php";

$con=DB::getConnection()
?>