<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
padding: 8px 0px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #333333;
  color: #f2f2f2;
}

.active {
  background-color: #333333;
  color: #333333;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}
</style>
</head>
<body>

<div class="topnav" id="myTopnav" style="    height: 51px;">
  <a href="#home" style="    display: none;">Home</a>
  <a href="#news">News</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>
  <a href="#" id="menuIcon" style="    font-size: 0px;
    float: left;
    padding-left: 16px;
" class="icon" onclick="myFunction()"><i class="material-icons" style="
    font-size: 38px;">menu</i></a>
   <a style="display: block;
    color: #fff;
    font-size: 23px;
    padding: 12px 22px;">Tractor junction</a>
    <a id="searchIcon" onclick="showsearchBar();" style="    display: block;
    float: right;"><i class="material-icons" style="    font-size: 26px;
    padding: 5px 13px 0px 0px;">search</i></a>
</div>



<div class="topnav" id="myTopnav2" style="    height: 51px;display: none">
  <a href="#home" style="    display: none;">Home</a>
 
  <a href="#" onclick="backButton();" style="    font-size: 0px;
    float: left;
    padding-left: 6px;
" class="icon" onclick="myFunction()"><i class="material-icons" style="
    font-size: 38px;"><i class="material-icons" style="    font-size: 37px;
">keyboard_arrow_left</i></i></a>

     <a id="textField" style="display: none;    margin-left: 2px;
    width: 366px;"><input style="    height: 34px;
    width: 100%;
    background: #333333;
    border: none;    color: white;
    font-size: 21px;
    padding-left: 9px;" type="text" name=""></a>
    
</div>


<script>

function showsearchBar(){
	
	document.getElementById('myTopnav').style.display="none";
	document.getElementById('menuIcon').style.display="none";
	document.getElementById('searchIcon').style.display="none";
	document.getElementById('myTopnav2').style.display="block";
	document.getElementById('textField').style.display="block";
	// alert("end");
}
function backButton(){
	
	document.getElementById('myTopnav').style.display="block";
	document.getElementById('menuIcon').style.display="block";
	document.getElementById('searchIcon').style.display="block";
	document.getElementById('myTopnav2').style.display="none";
	document.getElementById('textField').style.display="none";
	// alert("end");
}
</script>

</body>
</html>

