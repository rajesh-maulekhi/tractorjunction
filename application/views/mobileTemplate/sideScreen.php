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
.sideScreenmainCont{
     background: #fff;
     padding: 10px 5px;
     padding-top: 18px;
     padding-left: 12px;
    padding-right: 0px;
}
 .sideScreenIconsCss{
    position: absolute;
     margin-top: -2px;
}
 .iconsText{
     font-size: 18px;
     margin-left: 38px;
     font-weight: 700;
}
 .paddingZ{
    padding: 0px;
    margin: 0px;
}
 .lineBreak{
    background: #ddd;
     padding: .5px 0px;
     margin: 0px;
     margin-bottom: 0px;
    width: 84%;
    margin-top: 0px;
     float: right;
}
 .lineBreakText{
    color: #ddd;
     padding: 0px;
     margin: 0px;
     margin-bottom: 0px;
     margin-bottom: 15px;
     font-size: 12px;
}
 .MainIconCont{
    margin: 0 0 30px !important;
}
 .bottonIcon{
    background: #000;
     border-radius: 50%;
     width: 54%;
     color: #fff;
     padding: 5px;
     padding-top: 5px;
     padding-left: 5px;
     padding-top: 9px;
     padding-left: 7px;
     margin-top: 20px;
}
 .bottonIconText{
    font-size: 12px;
     color: #ddd;
     text-align: left;
     padding-left: 5px;
}

      </style>
   </head>
   <body>
      <div class="col-xs-12 paddingZ" style="background: #000000ba;">
         <div class="col-xs-8 sideScreenmainCont">
            <p class=""><i class="material-icons sideScreenIconsCss">home</i> <span class="iconsText">Home</span></p>
            <p class="lineBreak" style="width: 80%"></p>
            <p class="lineBreakText">Tractors</p>
            <p class="MainIconCont"><img src="<?php echo $root; ?>mobileImage/tractorIcon.png"> <span style="margin-left: 10px;" class="iconsText">New Tractor</span>
            <p class="MainIconCont"><img src="<?php echo $root; ?>mobileImage/tractorIcon.png"> <span style="margin-left: 10px;" class="iconsText">Popular Tractor</span>
            <p class="MainIconCont"><img src="<?php echo $root; ?>mobileImage/tractorIcon.png"> <span style="margin-left: 10px;" class="iconsText">Latest Tractor</span>
            <p class="MainIconCont"><img src="<?php echo $root; ?>mobileImage/tractorIcon.png"> <span style="margin-left: 10px;" class="iconsText">Upcomming</span>
            </p>
            <p class="MainIconCont"><img src="<?php echo $root; ?>mobileImage/harvesterIcon.png"> <span style="margin-left: 10px;" class="iconsText">Harverster</span></p>
            <p class="MainIconCont"><img src="<?php echo $root; ?>mobileImage/implementsIcon.png"> <span style="margin-left: 10px;" class="iconsText">Implements</span></p>
            <p class="MainIconCont"><i class="material-icons sideScreenIconsCss">compare</i> <span class="iconsText">Compare Tractors</span></p>
            <p class="lineBreak"></p>
            <p class="lineBreakText">News</p>
            <p class="MainIconCont"><i class="material-icons sideScreenIconsCss">new_releases</i> <span class="iconsText">News & Update</span></p>
            <p class="MainIconCont"><i class="material-icons sideScreenIconsCss">rss_feed</i> <span class="iconsText">Blog</span></p>
            <p class="MainIconCont"><i class="material-icons sideScreenIconsCss">supervised_user_circle</i> <span class="iconsText">Dealears</span></p>
            <p class="lineBreak" style="width: 78%"></p>
            <p class="lineBreakText">Services</p>
            <p class="MainIconCont"><i class="material-icons sideScreenIconsCss">touch_app</i> <span class="iconsText">On Road Price</span></p>
            <p class="MainIconCont"><i class="material-icons sideScreenIconsCss">build</i> <span class="iconsText">Service Center</span></p>
            <p class="MainIconCont"><i class="material-icons sideScreenIconsCss">call</i> <span class="iconsText">Customer Care</span></p>
            <p class="lineBreak" style="width: 100%"></p>
            <div class="col-xs-12 paddingZ" style="">
               <div class="col-xs-4 paddingZ" style="">
                  <p class="bottonIcon"><i class="material-icons">
                     share
                     </i> 
                  </p>
                  <p class="bottonIconText">Share</p>
               </div>
               <div class="col-xs-4 paddingZ" style="">
                  <p class="bottonIcon"><i class="material-icons">
                     rate_review
                     </i> 
                  </p>
                  <p style="padding-left: 0px;" class="bottonIconText">Rate Us</p>
               </div>
               <div class="col-xs-4 paddingZ" style="">
                  <p class="bottonIcon"><i class="material-icons">
                     comment
                     </i> 
                  </p>
                  <p style="padding-left: 0px;" class="bottonIconText">Feedback</p>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>