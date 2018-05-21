<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
?>
<?php echo footeradd(); ?>
<div id="LoderImage" class="gifG" style="z-index:99999999999"><img src="<?php echo $root; ?>images/gif_tractor.gif"
                                                                   alt="loder image" class="gifimage"></div>

<div class="container">
</div>




<!-- Modal -->
<div class="modal fade" id="LoginModelWindow" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tractor Junction Login / Sign up</h4>
            </div>
	<div class="modal-body">
		<div class="col-md-12 col-sm-12 MarTDiv" id="loginDIV">
			<h3 class="LoginTexxt1">Get access your tractor requests and profile</h3>
			<div class="col-md-12 col-sm-12 cennterClass"> 
				<input type="text" class="LoginInutBox"  onkeypress="return isNumberKeyLogin(event);" id="mobileNoLogin" maxlength="10" placeholder="Enter Mobile NO">
			</div>
			<div class="col-md-12 col-sm-12 ButtnCenMar"> 
				<input type="button" id="LoginButton" value="Next" class="NextBTLogin" onclick="LoginClick();">
			</div>
		</div>
	</div>
    
	<div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>









<script src="<?php echo $root; ?>web_root/admin_web_root/jquery.min.js"></script>

<script src="<?php echo $root; ?>web_root/admin_web_root/autocomplete-jquery-ui.min.js"></script>
<script>
var root5='<?php echo $root; ?>';
    $(document).ready(function () {
        $("#mainSearchBox").autocomplete({
            source: root5+'Search/SearchMainAjax',
			 minLength: 1,
			  select: function(event, ui) { 
			 
    $("#mainSearchBox").val(ui.item.value);
    $("#searchform").click();
  } 
        }).keydown(function (e) {
            if (e.keyCode === 13) {
                var valueSearch = document.getElementById("mainSearchBox").value;
            }
        });
    });
	function LoginClick(){
		
		var mobileNO= $("#mobileNoLogin").val();
		if(mobileNO !="" && mobileNO.length>=10){
			document.getElementById('LoderImage').style.display="block";
		       $.ajax({
            type: "POST",
            url: root5+"Login/Loginstep_one",
            data: {mobileNO1: mobileNO},
            success: function (data) {
				document.getElementById('LoderImage').style.display="none";
				 $("#loginDIV").html(data);
            },
        });
		}else{
			alert('Please enter valid mobile no');
		}
	}
	function ResendOTP(mobileNO){
		document.getElementById('LoderImage').style.display="block";
		       $.ajax({
            type: "POST",
            url: root5+"Login/Loginstep_one",
            data: {mobileNO1: mobileNO},
            success: function (data) {
				document.getElementById('LoderImage').style.display="none";
		 $("#loginDIV").html(data);
            },
        });
	}
	function DoneCllick(){
		document.getElementById('LoderImage').style.display="block";
		var OTPLogin= $("#OTPLogin").val();
		var user_id= $("#user_id").val();
		if(OTPLogin !="" && OTPLogin.length>=4){
		       $.ajax({
            type: "POST",
            url: root5+"Login/OTPMatch",
            data: {OTPLogin1: OTPLogin, user_id1: user_id},
            success: function (data) {
				document.getElementById('LoderImage').style.display="none";
				 if(data ==""){

					 location.reload();
				 }else{
					 alert(data);
				 }
            },
        });
		}else{
			alert('Please enter valid OTP');
		}
	}
</script>
<script src="<?php echo $root; ?>web_root/admin_web_root/bootstrap.min.js"></script>


<footer id="footer-wrap" style="margin-top: 0px;background: #151313;">
    <div class="container">
        <div class="col-md-12 col-sm-12 col-xs-12 padw360" style="margin-top:20px;margin-bottom: 30px;">
            <div class="col-sm-6 col-md-3 col-xs-12 padw360 like_tractor" style="line-height:25px">
                <h4>Like Us<img src="<?php echo $root; ?>images/heading-bg-footer.gif" alt="Footer image"></h4>
                <div id="fb-root"></div>
                <script>(function (d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) return;
                        js = d.createElement(s);
                        js.id = id;
                        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=797743527029693";
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>
                <div class="fb-page" data-href="https://www.facebook.com/tractorjunction/?fref=ts" data-tabs="timeline"
                     data-width="250" data-height="120" data-small-header="false" data-adapt-container-width="true"
                     data-hide-cover="false" data-show-facepile="true">
                    <blockquote cite="https://www.facebook.com/tractorjunction/?fref=ts" class="fb-xfbml-parse-ignore">
                        <a href="https://www.facebook.com/tractorjunction/?fref=ts">Tractorjunction.com</a></blockquote>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-xs-12 padw360" style="line-height:25px">
                <h4>Menu<img src="<?php echo $root; ?>images/heading-bg-footer.gif" alt="Footer image"></h4>
                <ul class="pencil" style="list-style: outside none none;padding: 0px;">
                    <li><i class="fa fa-pencil" style="color:white"></i>
                        <span><a href="<?php echo $root . "compare-tractors" ?>">Compare</a></span>
                    </li>
                    <li><i class="fa fa-pencil" style="color:white"></i>
                        <span><a href="<?php echo $root . "special-tractor-offers" ?>">Offers</a></span>
                    </li>
                    <li><i class="fa fa-pencil" style="color:white"></i>
                        <span>
			<a href="<?php echo $root . "career" ?>">Careers</a>
			</span>
                    </li>
                    <li><i class="fa fa-pencil" style="color:white"></i>
                        <span>
			<a href="<?php echo $root . "advertise-with-us" ?>">Advertise with us</a>
			</span>
                    </li>
                    <li><i class="fa fa-pencil" style="color:white"></i>
                        <span>
			<a href="<?php echo $root . "contact-us" ?>">Contact Us</a>
			</span>
                    </li>
              
                </ul>
            </div>
            <div class="col-sm-6 col-md-3 col-xs-12 padw360" style="line-height:25px">
                <h4> Quick Links<img src="<?php echo $root; ?>images/heading-bg-footer.gif" alt="Footer image"></h4>
                <ul class="arrows" style="list-style: outside none none;padding: 0px;">
                    <li><i class="fa fa-long-arrow-right" style="color:white"></i>
                        <span><a href="<?php echo $root . "about-us" ?>">About Us</a></span>
                    </li>
                    <li><i class="fa fa-long-arrow-right" style="color:white"></i>
                        <span><a href="<?php echo $root . "privacy-policy" ?>">Privacy Policy</a></span>
                    </li>
                    <li><i class="fa fa-long-arrow-right" style="color:white"></i>
                        <span><a href="<?php echo $root . "tractor-customer-care" ?>">Customer Care</a></span>
                    </li>
                    <li><i class="fa fa-long-arrow-right" style="color:white"></i>
                        <span><a href="<?php echo $root . "tractor-service-centers" ?>">Service Centers</a></span>
                    </li>
                    <li><i class="fa fa-long-arrow-right" style="color:white"></i>
                        <span>
			<a href="<?php echo $root . "find-tractor-dealers" ?>">Find tractor dealers</a>
		</span>
                    </li>
                    <li><i class="fa fa-long-arrow-right" style="color:white"></i>
                        <span>
			<a href="<?php echo $root . "guest-post" ?>">Guest Post</a>
		</span>
                    </li>
                </ul>
            </div>
            <div class="col-sm-6 col-md-3 col-xs-12 padw360" style="line-height:25px;">
                <div class="col-md-12 col-sm-12 col-xs-12 padw360">
                    <h4 style="margin-bottom:0px;padding-left:8px;">Join Us<img
                                src="<?php echo $root; ?>images/heading-bg-footer.gif" alt="Footer image"></h4>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 padw360" style="margin-top: 20px;">
                    <div class="itemmG" style="background:#3B5998">
                        <a title="Facebook" href="https://www.facebook.com/tractorjunction/" class="linkmF"
                           target="_blank">
                            <i class="fa fa-facebook" style="padding: 7px 18px;font-size:18px;color:#fff;"></i></a>
                    </div>
                    <div class="itemmT">
                        <a title="Twitter" href="https://twitter.com/tractorjunction" class="linkmT" target="_blank"
                           style="top:-2px;left:-11px;">
                            <i class="fa fa-twitter" style="padding:7px 16px;font-size:18px;color:#fff;"></i></a>
                    </div>
                    <div class="itemmG">
                        <a title="Google" href="https://plus.google.com/u/0/111375983648287404977?hl=en" class="linkmG"
                           target="_blank">
                            <i class="fa fa-google-plus" style="padding: 8px 17px;font-size:16px;color:#fff;"></i></a>
                    </div>
                    <div class="itemmF">
                        <a title="Instagram" href="https://www.instagram.com/tractor_junction/" class="linkmF"
                           target="_blank">
                            <i class="fa fa-instagram" style="padding: 7px 18px;font-size:16px;color:#fff;"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12"
             style="padding: 13px 0px;background:rgba(0, 0, 0, 0.35) none repeat scroll 0% 0%">
            <span class="float-l fl1 AllRightS" style="margin-left:38px;margin-top: 10px;">&copy; 2016 TractorJunction All Rights Reserved</span>
            <div class="float-r social">
                <span class="float-l fl2 pull-right AllRightS2" style="margin-right:20px;margin-top: 10px;">Design & Developed By @TractorJunction</span>
            </div>
        </div>
    </div>
</footer>

<!-- script start-->

<script type="text/javascript">
    function imgError(image) {
        image.onerror = "";
        image.src = "./images/default-image.jpg";
        return true;
    }
    function cancelbdamessagebox() {
        document.getElementById('bdamessagebox').style.display = "none";
    }
	function isNumberKey(evt){  <!--Function to accept only numeric values-->

var charCode = (evt.which) ? evt.which : evt.keyCode
if (charCode != 46 && charCode > 31 
&& (charCode < 48 || charCode > 57))
return false;
return true;
}
	function isNumberKeyLogin(evt){  <!--Function to accept only numeric values-->
 if (evt.keyCode === 13) {
	 LoginClick();
 }
var charCode = (evt.which) ? evt.which : evt.keyCode
if (charCode != 46 && charCode > 31 
&& (charCode < 48 || charCode > 57))
return false;
return true;
}

fid='';ffee='';
FB.init({appId: "151660625397165", status: true, cookie: true});

function BlogShareFB() {

// calling the API ...
var obj = {
method: 'feed',
redirect_uri:'https://www.facebook.com/cryswashington?fref=ts',
link: window.location.href,
picture: $('#image_url_share').val(),
name: $('#name_url_share').val(),
caption: 'tractorjunction.com',
description: $('#id_des_share').val()
};
function callback(response) {
if(response['post_id']){
// document.getElementById("message-box2").style.display="block"; 
// var timePeriodInMs = 3000;
// setTimeout(function() 
// { 
// document.getElementById("message-box2").style.display = "none"; 
// }, 
// timePeriodInMs);
}

}
FB.ui(obj, callback);
}

</script>