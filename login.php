<?php  
//allow the config (without the file will not be drfined)
define("__CONFIG__",true);
//this will load the config file to here 
require_once "inc/config.php"  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- UIkit CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.7/dist/css/uikit.min.css" />

  <title>Login Page</title>
</head>
<body>
  
<div class="uk-section uk-container ">
<div class="uk-grid uk-child-width-1-3@s uk-child-width-1-1" uk-grid="">

<!-- the form-->
<form class="uk-form-stacked login-js" >
    <h2>Login </h2>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-stacked-text">Email</label>
        <div class="uk-form-controls">
            <input class="uk-input" id="form-stacked-text" type="email" placeholder="Enter Email..." required="required">
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label" for="form-stacked-text">Password</label>
        <div class="uk-form-controls">
            <input class="uk-input" id="form-stacked-text" type="password" placeholder="Enter Password..."
            required="required">
        </div>
    </div>
    <!--rhe error div-->
    <div class="uk-margin uk-alert uk-alert-danger js-error" style="display:none"></div>


    <p>You dont have an account
    <a href="register.php">SIGN UP NOW </a></p>
   <div class="uk-margin">
   <button class="uk-button uk-button-default" type="submit">Login</button>
   </div>
   
    </div><!--end the form-->

</div><!--end uk-grid--->
</div><!-- end uk section-->



<?php 
/*no config required*/
require_once "inc/footer.php"; ?>
  
</body>
</html>