<?php
//load the config file
define('__CONFIG__', true);
// Require the config
/*it is now up in the root (the inc file)*/
/*config is loaded then the db is loaded*/
require_once "../inc/config.php"; 
//config loads the filter s




//only if the request_method is post 
if($_SERVER["REQUEST_METHOD"]=='POST'){
  //always return in json format instead of plain text
  header('Content-type:application/json');

  $return=[];

  //filter and format this email 
  $email=Filter::String($_POST["email"]);
  
  //check if there is a user
  //search for a user in the the users table where it is email is identical to the one we inserted  from the post and then  return ht id if you found amacth
  /*LIMIT 1 ; once you find the match return it directlly... stop searching*/
  $finduser=$con->prepare("SELECT user_id from users where email=LOWER(:email) LIMIT 1");
  //define :email is equal to $email
  $finduser->bindParam(':email',$email,PDO::PARAM_STR);
  $finduser->execute();

//finr_user is the result of that query ..lets check
if($finduser->rowCount()==1){
  //user does exist  return an error  to the main.js in data
  $return['error']='Email Already exist';
  //if u want to use it in the future
  $return['loggd_in']=false;
}
//else add the user
else{
  //ENCRYPT THE PASSWORD
  $password=password_hash($_POST['password'],PASSWORD_DEFAULT);
  //lower it when inserting it to the db
$add_user=$con->prepare("INSERT INTO users(email,password) values( LOWER(:email),:password)");
//define :email is equal to $email
//define :password is equal to $password
$add_user->bindParam(':email',$email,PDO::PARAM_STR);
$add_user->bindParam(':password',$password,PDO::PARAM_STR);
  $add_user->execute();

  //get the id of that user that you just inserted
  $user_id=$con->lastInsertId();

  //for authectication purposses
  $_SESSION['user_id']=(int)$user_id;

    //as atest if it is well 
  $return['redirect']='dashboard.php?message=You Logged in succesfully';
  //if u want to use it in the future
  $return['loggd_in']=true;
}


 
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