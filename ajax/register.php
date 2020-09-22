<?php
//load the config file
define('__CONFIG__', true);
// Require the config
/*it is now up in the root (the inc file)*/
require_once "../inc/config.php"; 




//only if the request_method is post 
if($_SERVER["REQUEST_METHOD"]=='POST'){
  //always return in json format instead of plain text
  header('Content-type:application/json');

  $return=[];




  //this is away of telling the browser where to move after everything here is done 
  $return['redirect']='index.php?this.was.redirected';
  //json encode for arrays 
  //JSON_PRETTY_PRINT GIVES LINES BETWEEN ELEMENTS
  echo json_encode($return,JSON_PRETTY_PRINT);
  //like return --any code under it is not excuted
  exit();
}
//if the request is through aget or some other way 
//get is basically just calling the page == clicking the link
else{
  exit('test');
}
 ?>