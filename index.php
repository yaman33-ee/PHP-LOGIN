<?php  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- UIkit CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.7/dist/css/uikit.min.css" />

  <title>Document</title>
</head>
<body>
  
<div class="uk-section uk-container ">
<div class="uk-grid uk-child-width-1-3@s uk-child-width-1-1" uk-grid="">

<!-- the form-->
<form class="uk-form-stacked" js-login>

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


   <div class="uk-margin">
   <button class="uk-button uk-button-default" type="submit">Login</button>
   </div>
    
    </div><!--end the form-->

</div><!--end uk-grid--->
</div><!-- end uk section-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

  <!-- UIkit JS -->
<script src="https://cdn.jsdelivr.net/npm/uikit@3.5.7/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.5.7/dist/js/uikit-icons.min.js"></script>
</body>
</html>