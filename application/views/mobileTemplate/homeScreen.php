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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
         rel="stylesheet">
<style type="text/css">
.HOmeScreenBanner{background: linear-gradient(to bottom, rgba(0, 0, 0, .4), rgba(0, 0, 0, .6)), url(<?php echo $root; ?>mobileImage/homeBanner.png);
height: 400px;}
.menuDivCss{color: #fff;
padding-top: 12px}
.menuIconCss{    font-size: 30px;}
.serchBIxHome{border: none;
padding: 10px 7px;
border-radius: 3px;
margin-top: 7%;}
.SearchIcon{color: #000;

position: absolute;

right: 21px;

top: 22.5%;}
.AdvanceSearch{color: #fff;

float: right;

padding: 5px 1px;

text-decoration: underline;}
      </style>
   </head>
   <body>
      <div class="col-xs-12 paddingZ HOmeScreenBanner">
      <p class="menuDivCss"><i class="material-icons menuIconCss">menu</i></p>
      <p><input type="text" placeholder="search your right tractor" class="col-xs-12 serchBIxHome"><i class="SearchIcon material-icons">
search
</i></p>
<p class="AdvanceSearch">Advance Search</p>
      </div>
   </body>
</html>