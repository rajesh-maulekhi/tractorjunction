<?php 
$root = "http://".$_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
if($this->session->userdata('user_id_login')){

foreach($result as $key=>$value){ } ?>
<style>
.nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover {
    background-color: #148F1A;
	color: white;
  
}

.nav-tabs > li{
float:none}
.nav-tabs > li>a{
background:none;
color:black;
border:1px solid #eee
}
.nav-tabs > li>a:hover{
background:none;
color:white;
background: rgba(212, 21, 22, 0.7);
border: 1px solid transparent;
}
.tab-content > .tab-pane{
width:100%;
border:1px solid #eee}
.imgss{
height:110px;width:110px;border:5px solid #eee;border-radius:10%;float:right;margin-right:50px;margin-top:-55px;position:relative}
.aaoo{
height:120px;width:120px;font-family:FontAwesome;position:absolute;content:"";
right:50px;background:transparent;z-index:1;top:-53px;color:black;font-size:18px;opacity:0.1
}
.aaoo:hover{
height:120px;width:120px;font-family:FontAwesome;position:absolute;content:"";
right:50px;background:transparent;z-index:1;top:-53px;color:#eee;font-size:20px;opacity:1
}
</style>
<div id="ShowEditProfilebox" class="search1">
<?php echo form_open('Login/update_profile'); ?>
	<div class="EditProfileBox">
		<div class="col-md-12 col-sm-12" style="margin-top:15px">
			<div class="col-md-6 col-sm-12"style="text-align:left"> Name :
				<?php echo form_input(array('type' => 'text', 'name' => 'username', 'value' => $value->username, 'required'=>'required','class' => 'form-control')); ?>
			</div>
			<div class="col-md-6 col-sm-12"style="text-align:left"> Email :
				<input style=""type="text" name="email" class="form-control" value="<?php echo $value->email; ?>">
			</div>
		</div>
		<div class="col-md-12 col-sm-12" style="margin-top:15px">
			<div class="col-md-6 col-sm-12"style="text-align:left"> state :
				<?php
				$selected='';
				$selected = ($value->state) ? $value->state :  $value->state; 
				$query311=array();
				$query311 = shweta_select('*','states','country_id','101');
				$val311['']='Please Select state';					
				foreach($query311 as $k311=>$r311){
				$val311[$r311->id] = ucfirst($r311->name);		
				}		
				$ab='class="form-control" id="country_id_val_pro"  required="required" onchange="CityGet(this.value)"';
				echo form_dropdown('states', $val311,$selected,$ab);
				?>	
			</div>
			<div class="col-md-6 col-sm-12"style="text-align:left"> Mobile Number :
			<?php echo form_input(array('type' => 'text', 'name' => 'mobile','readonly' => 'readonly', 'value' => $value->mobile, 'required'=>'required','class' => 'form-control')); ?>
			</div>
		</div>
		<div class="col-md-12 col-sm-12" style="margin-top:15px">
		
			<div class="col-md-6 col-sm-12"style="text-align:left"> Location :
				<?php
				$selected='';
				$selected = ($value->location) ? $value->location :  $value->location; 
				$a1=array();
				$a1 = shweta_select('*','cities','state_id',$value->state);
				$a2['']='Please Select city';					
				foreach($a1 as $k311=>$r311){
				$a2[$r311->id] = ucfirst($r311->name);		
				}		
				$js6 = 'class="form-control" id="cur_city_id" required="required"';
				echo form_dropdown('location', $a2,$selected,$js6);
				?>	
			</div>
		</div>
		<div class="col-md-12 col-sm-12" style="margin-top:15px">
			<div class="col-md-8 col-sm-12"style="text-align:left"> 
				<button type="submit" class="btn btn-danger">Save Change</button>
				<a onclick="HideEditProfile();" style="cursor:pointer;" class="btn btn-danger">Cancel</a>
			</div>
		</div>
		<?php echo form_close(); ?>
	</div>
</div>
<div class="banner profileBanner" style="background:rgba(204, 0, 1, 0.7) none repeat scroll 0% 0%;height:105px;">
	<div class="container">
		<div class="col-sm-12 col-md-12 adBloKBlog" style="padding:15px 0px;">
			<ul type="none" style="color:#fff">
				<li style="float:left;padding-right:5px;"><i class="fa fa-home" style="font-size:16px;padding-right:5px;"></i>Home</li>
				<li style="float:left;padding-right:5px;">/</li>
				<li style="float:left;padding-right:5px;">My Account</li>
			</ul>
		</div>
	</div>
</div>
<div class="container d1" >
	<div class="col-sm-12 col-md-12 paddingZ b1 aao">

	<h3 class="HIUser">Hi...<?php echo ucwords($value->username); ?></span> </h3>
	<div class="box-wrapper">
		<div class="box1">
			<div class="row ">
				<h2></h2>
					<div class="col-md-3" >
						<ul class="nav nav-tabs">
							<li ><a data-toggle="tab" style="color:white;background:#E15B5B;"href="#"><h4 >My Account</h4></a></li>
							<li class="active"><a data-toggle="tab" href="#dash">Dash Board</a></li>
							<li><a data-toggle="tab" href="#home">My Profile</a></li>
							<li><a data-toggle="tab" href="#tractorOnRoad">Tractor On Road Price</a></li>
							<li><a data-toggle="tab" href="#tractorDemo">Tractor Demo Requests</a></li>
							<li><a  href="<?php echo $root; ?>Login/Logout">Logout</a></li>
						</ul>
					</div>
				<div class="col-md-9">
					<div class="tab-content">
						<div id="dash" class="adBloKBlog tab-pane fade in active">
							<h3>Overview / Dash Board</h3>
							<div class="col-md-12 col-sm-12" style="margin-top:5px">
								<div class="col-md-4 col-sm-4 "style="color:white;"> 
									<div class="col-md-12 col-sm-12 paddingZ"style="background-color:skyblue;">
										<h3 style="font-weight: bold;padding-left:15px"><?php 
											$cond='';
											$cond="contact_no ='".$value->mobile."'";
											echo countResultAllNo('onroadprice',$cond);
											?> 
										</h3>
									</div>
									<div class="col-md-12 col-sm-12 paddingZ"style="background-color:skyblue">
										<h4 style="font-weight: bold;padding-left:15px"> Tractor On Road Price Request</h4>
									</div>
									<a data-toggle="tab" href="#tractorOnRoad"><div class="col-md-12 col-sm-12 paddingZ"style="text-align:center;background-color:#00ADD8;font-size:16px">More Info <i class="fa fa-arrow-circle-right"></i></div>
									</a> 
								</div>
								<div class="col-md-4 col-sm-4 "style="color:white;"> 
									<div class="col-md-12 col-sm-12 paddingZ"style="background-color:#F39C12;">
										<h3 style="font-weight: bold;padding-left:15px"><?php 
										$cond='';
										$cond="contact ='".$value->mobile."'";
										echo countResultAllNo('demo_request',$cond);
										?> </h3>
									</div>
									<div class="col-md-12 col-sm-12 paddingZ"style="background-color:#F39C12">
									<h4 style="font-weight: bold;padding-left:15px">Tractor Demo Requests</h4></div>
									<a data-toggle="tab" href="#tractorDemo"><div class="col-md-12 col-sm-12 paddingZ"style="text-align:center;background-color:#DB8D10;font-size:16px">More Info <i class="fa fa-arrow-circle-right"></i></div>
								</a>
								</div>
							</div>
						</div>
						<div id="home" class="tab-pane fade ">
							<h3 class="headingprofile">My Profile</h3>
							<div class="col-md-12 col-sm-12 col-xs-12 paddingZeioPx">
							
							<div class="col-md-12 col-sm-12 paddingZeioPx" style="margin-top:15px">
								<div class="col-md-6 col-sm-12 paddingZeioPx"style="text-align:left"> Name : <span class="red"><b>
								<?php echo ucfirst($value->username); ?></b></span>
								</div>
								<div class="col-md-6 col-sm-12 paddingZeioPx"style="text-align:left"> Email : <span class="red"><b><?php echo $value->email; ?></b></span>
								</div>
							</div>
							<div class="col-md-12 col-sm-12 paddingZeioPx" style="margin-top:15px">
								<div class="col-md-6 col-sm-12 paddingZeioPx"style="text-align:left"> Location: <span class="red"><b>
									<?php foreach(shweta_select('name','cities','id',$value->location) as $raa) echo ucfirst($raa->name) ; ?></b></span>
								</div>
								<div class="col-md-6 col-sm-12 paddingZeioPx"style="text-align:left"> Mobile : <span class="red"><b><?php echo $value->mobile; ?></b></span>
								</div>
							</div>
							<div class="col-md-12 col-sm-12 paddingZeioPx" style="margin-top:15px">
								<div class="col-md-6 col-sm-12 paddingZeioPx"style="text-align:left">State: <span class="red"><b><?php foreach(shweta_select('name','states','id',$value->state) as $raa) echo ucfirst($raa->name) ; ?></b></span>
								</div>
							</div>
							<div class="col-md-12 col-sm-12 paddingZeioPx" style="margin-top:15px">
								<div class="col-md-4 col-sm-12 paddingZeioPx"style="text-align:left"> 
									<button class="btn btn-danger" onclick="ShowEditProfile()" style="cursor:pointer"><i style="font-size:14px"class="fa fa-pencil"> Edit</button></i>
								</div>
							</div>
							</div>
						</div>
						<!-- Modal of edit profile -->
						<!-- Modal end -->
						
						<div id="tractorOnRoad" class="tab-pane fade">
							<h3 class="headingprofile">Tractor On Road Requests</h3>
							<div class="col-sm-12 col-md-12">
								<?php 
								$tractor_brand='';
								$resultReqTractor=array();
							
								$resultReqTractor=resultOrdrBy('*','onroadprice','contact_no',$value->mobile,'date_','DESC');
								
								if(!empty($resultReqTractor)){
								foreach($resultReqTractor as $requests=>$requestValue){
$tractor_brand='';$tractor_image='';$tractorId='';
foreach(shweta_select('name','brand','id',$requestValue->brand) as $raa) $tractor_brand= $raa->name;
$cond="brand='".$requestValue->brand."' and model_name='".$requestValue->model."'";
foreach(shweta_select_th('image,id','tech_specification',$cond) as $raa)
{ $tractor_image= $raa->image; $tractorId= $raa->id;}
if($tractor_image !=''){
	$tractor_image=$root.'upload/'.$tractor_image;
}else{
	$tractor_image=$root.'images/'.'default-image.jpg';
}

?>
								<div class="col-sm-12 col-md-12 prod-div c7" >
									<div class="col-sm-3 col-md-3 paddingZ">
										<img src="<?php echo $tractor_image; ?>" alt="<?php echo ucfirst($tractor_brand); ?> <?php echo ucfirst($requestValue->model); ?>"  class="img-responsive c8" style="height:57px;width:100px;" >
									</div>
									<div class="col-sm-9 col-md-9 paddingZ">
										<div class="col-md-12 col-sm-12 paddingZ c9">
<a href="<?php echo $root; ?>product/<?php echo $tractorId; ?>/<?php echo newslugend($tractor_brand)."-tractor"; ?>-<?php echo shweta_nameslug($requestValue->model); ?>" target="_blank"><span class="c10"><?php echo ucfirst($tractor_brand); ?><span style="color:#DB4C4D">
								<?php echo ucfirst($requestValue->model); ?>
											</span></span></a></br>	
											<span class="c11"><i class="fa fa-calendar" aria-hidden="true"></i>  Date : 
											<?php echo date('d M , Y',strtotime($requestValue->date_)); ?>
											</span></br>	
										</div>	
									</div>
								</div>
								<?php 
								} }
								else{
								?>
								<h4 style="color:#DB4C4D;text-align:center;">No Result found</h4>
								<?php 
								}
								?>
							</div>
						</div>
						<div id="tractorDemo" class="tab-pane fade">
							<h3 class="headingprofile">Tractor Demo Requests</h3>
							<div class="col-sm-12 col-md-12">
								<?php 
								$tractor_brand='';
								$resultReqTractor=array();
							
								$resultReqTractor=resultOrdrBy('*','demo_request','contact',$value->mobile,'date','DESC');
								
								if(!empty($resultReqTractor)){
								foreach($resultReqTractor as $requests=>$requestValue){
$tractor_brand='';$tractor_image='';$tractorId='';
foreach(shweta_select('name','brand','id',$requestValue->brand) as $raa) $tractor_brand= $raa->name;
$cond="brand='".$requestValue->brand."' and model_name='".$requestValue->model."'";
foreach(shweta_select_th('image,id','tech_specification',$cond) as $raa)
{ $tractor_image= $raa->image; $tractorId= $raa->id;}
if($tractor_image !=''){
	$tractor_image=$root.'upload/'.$tractor_image;
}else{
	$tractor_image=$root.'images/'.'default-image.jpg';
}

?>
								<div class="col-sm-12 col-md-12 prod-div c7" >
									<div class="col-sm-3 col-md-3 paddingZ">
										<img src="<?php echo $tractor_image; ?>" alt="<?php echo ucfirst($tractor_brand); ?> <?php echo ucfirst($requestValue->model); ?>"  class="img-responsive c8" style="height:57px;width:100px;" >
									</div>
									<div class="col-sm-9 col-md-9 paddingZ">
										<div class="col-md-12 col-sm-12 paddingZ c9">
<a href="<?php echo $root; ?>product/<?php echo $tractorId; ?>/<?php echo newslugend($tractor_brand)."-tractor"; ?>-<?php echo shweta_nameslug($requestValue->model); ?>" target="_blank"><span class="c10"><?php echo ucfirst($tractor_brand); ?><span style="color:#DB4C4D">
								<?php echo ucfirst($requestValue->model); ?>
											</span></span></a></br>	
											<span class="c11"><i class="fa fa-calendar" aria-hidden="true"></i>  Date : 
											<?php echo date('d M , Y',strtotime($requestValue->date)); ?>
											</span></br>	
										</div>	
									</div>
								</div>
								<?php 
								} }
								else{
								?>
								<h4 style="color:#DB4C4D;text-align:center;">No Result found</h4>
								<?php 
								}
								?>
							</div>
						</div>
						
							
							
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
} 
else{
header("Location:".$root);	
}
?>
<script>

function ShowEditProfile(){
document.getElementById('ShowEditProfilebox').style.display="block";
}
  function CityGet(StateName) {
		
        $.ajax({
            type: "POST",
            url: "Home/StateGet",
            data: {StateID: StateName},
            success: function (data) {
			
                $("#cur_city_id").html(data);
            },
        });
    }
	function HideEditProfile(){
		document.getElementById('ShowEditProfilebox').style.display="none";
	}
</script>