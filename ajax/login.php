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

  //filter and format this email and get the password
  $email=Filter::String($_POST["email"]);
  $password=$_POST['password'];
  //check if there is a user
  //search for a user in the the users table where it is email is identical to the one we inserted  from the post and then  return the id  and password if you found amacth
  /*LIMIT 1 ; once you find the match return it directlly... stop searching*/
  $finduser=$con->prepare("SELECT user_id,password from users where email=LOWER(:email) LIMIT 1");
  //define :email is equal to $email
  $finduser->bindParam(':email',$email,PDO::PARAM_STR);
  $finduser->execute();

//find_user is the result of that query ..lets check
if($finduser->rowCount()==1){

  //if the user exist try and sign him in
  //create an array with the user_id and the password
  $User = $finduser->fetch(PDO::FETCH_ASSOC);
  //always cast the info 
  $user_id = (int) $User['user_id'];
  $hash = (string) $User['password'];
  if(password_verify($password,$hash))
  {
    //user is signed in direct to whatever page u like
    $return['redirect']='dashboard.php';
    //like atoken that u are  signed in and keeps u signed in every page
    $_SESSION['user_id']=$user_id;

  }
  else{
    //wrong email or password 
    $return['error']=" Wrong Email/Password  combo";
  }
  
  //if u want to use it in the future
  $return['loggd_in']=false;
}
//else send the user to the register page so he could sign up
else{
  $return['error']="You do not have an account. <a href='register.php'>Create one now?</a>";
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