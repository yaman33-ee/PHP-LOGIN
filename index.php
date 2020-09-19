
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- UIkit CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.7/dist/css/uikit.min.css" />

  <title>Home</title>
</head>
<body>
  
<div class="uk-section uk-container ">

<?php  echo "hello world ,Today is ... ";
/*prints the date of the current day*/
echo date("Y m d");


?>
<p>   <a href="register.php">Register</a>
<a href="login.php">Login</a>
</p>
</div><!-- end uk section-->



<?php 
/*no config required*/
require_once "inc/footer.php"; ?>
  
</body>
</html>