<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tractor Junction</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
      .SplashBackground{
        background: #00000021;
   
        background: url(../mobileImage/logoTractorJunction.png);
    background-repeat: no-repeat;
      }
  </style>
</head>
<body>

<div class="col-sm-12">
  
<h1 class="SplashBackground">
    <img src="../mobileImage/logoTractorJunction.png">
    Tractor Junction
</h1>
</div>
</body>
</html>
