<body>
<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
 
?>
<div class="banner banner1">
    <div class="container">
        <div class="col-sm-12 col-md-12" style="padding:15px 0px;">
            <ul type="none" style="color:#fff">
                <li style="float:left;padding-right:5px;"><i class="fa fa-home"
                                                             style="font-size:16px;padding-right:5px;"></i><a
                            style="color:white;" href="<?php echo $root; ?>">Home</a></li>
                <li style="float:left;padding-right:5px;">/</li>
                <li style="float:left;padding-right:5px;">Tractor On Road Price</li>
            </ul>
        </div>
    </div>
</div>
 
	<div class="container Jhon_dheerMob" style="    margin-top: -50px;">
 <?php 
 //jhon deer mobile
$jhon_dheer_D=array(
'jhon_dheer_ad_on_road_request_mobile_1.png','jhon_dheer_ad_on_road_request_mobile_2.png','jhon_dheer_ad_on_road_request_mobile_3.png',
);
$jhon_dheer_single_D = array_rand($jhon_dheer_D);
$jhon_dheer_value_image_D = $jhon_dheer_D[$jhon_dheer_single_D];
// echo $jhon_dheer_value_image_D;
// die;
?>
	<div class="col-sm-12 col-md-12 col-xs-12 paddingZ singleTract_adMobile OnRoad2 onROADJHONAD">

<a href="<?php echo jhon_dheerAdLink('59','john-deere','on_road_price'); ?>">
 	<img class="img-responsive Jhon_dheerMob" src="<?php echo $root; ?>web_root/jhon_dheer/<?php echo $jhon_dheer_value_image_D; ?>" alt="Jhon Dheer Tractor | Tractorjunction" title="Jhon Dheer Tractor | Tractorjunction">
 </a>
    
        <?php //echo footeradd(); ?>
</div>
    </div> 
	
<div class="container-fluid paddingz ">
    <div class="container a3 OnRoadPad">
        <div class="col-sm-12 col-md-12 paddingZ b1">

           <div class="col-sm-12 col-md-8 paddingZ pdf OnRR">
                <h4 class="compare_head b2">
                    <i class="fa fa-truck a32"></i>Your Tractor Information</h4>
                <?php echo form_open('Search/OnRoadRequest_submit'); ?>
                <div class="col-sm-12 col-md-12">
                    <h4 class="b3"><u> Information Details</u></h4>
				<div class="col-sm-6 col-md-6" style="">
                               <?php $condBrand = "type LIKE '%tractor%'";
			$query1 =Select_OrderBy_brand('*', 'brand', $condBrand, 'name', 'ASC');
                        $val1[''] = 'Please select Tractor brand';
                        foreach ($query1 as $k1 => $r1) {
                            $val1[$r1->id] = ucfirst($r1->name);
                        }
                        $ab = 'class="form-control"   required="required" onchange="Get_model_name(this.value)"';
                        echo form_dropdown('brand_id', $val1, '', $ab);
                        ?>
                    </div>
					<div class="col-sm-6 col-md-6" style="" id="brandDiv">
					<select name="model_name" class="form-control" id="brandsVal" required="required" >
					<option value="0">Select Model</option>
					</select>
					</div>
                        <input class="form-control" name="req_type" value="onroad" required="required" type="hidden">
                    
                    <div class="col-sm-6 col-md-12" style="margin-top: 16px;">
                        <input class="form-control" pattern="[789][0-9]{9}" maxlength="10"  onkeypress="return isNumberKey(event)" name="mobile_no_req" required="required" placeholder="Mobile No" type="text">
                    </div>   
					

                    <div class="col-sm-12 col-md-12 b5">
                        <button type="submit" class="btn btn-default slido-btni">Get Price</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>


            </div>
			 <div class="col-sm-12 col-md-4 col-xs-12 tra_sing singleAdv OnRoadADD">
                <div class="col-sm-12 col-md-12 col-xs-12 TachSpecADD onROADJHONAD"
                     style="    height: auto;">
                      <?php 
 //jhon deer desktop
$jhon_dheer_D=array();
$jhon_dheer_D=array(
'jhon_dheer_ad_on_road_request_desktop_1.png','jhon_dheer_ad_on_road_request_desktop_2.png','jhon_dheer_ad_on_road_request_desktop_3.png',
);
$jhon_dheer_single_D = array_rand($jhon_dheer_D);
$jhon_dheer_value_image_D = $jhon_dheer_D[$jhon_dheer_single_D];
// echo $jhon_dheer_value_image_D;
// die;
?>
<a href="<?php echo jhon_dheerAdLink('59','john-deere','on_road_price'); ?>">
 	<img class="img-responsive Jhon_dheerDesk" src="<?php echo $root; ?>web_root/jhon_dheer/<?php echo $jhon_dheer_value_image_D; ?>" alt="Jhon Dheer Tractor | Tractorjunction" title="Jhon Dheer Tractor | Tractorjunction">
 </a>
 
  <?php //echo newsFront(); ?>
               
			   </div>
            </div>
        </div>
    </div>
</div>
<?php 

$mahindra_ad_show=MahindraAd();
if($mahindra_ad_show=='1'){

?>
	<div class="container" style="    margin-top: -50px;">
    <div class="col-sm-12 col-xs-12 adsDiv singleAdv">
        <p class="advertisementLabel">Advertisement</p>

<a target="_blank" href="<?php echo MahindraAdLink('55','mahindra-tractors','on_road_price'); ?>">
    	<img class="img-responsive" src="<?php echo $root; ?>web_root/mahindra/on_road_desktop.gif" alt="Mahindra Tractor | Tractorjunction" title="Mahindra Tractor | Tractorjunction">
</a>
	</div>
	<div class="col-sm-12 col-md-12 col-xs-12 paddingZ singleTract_adMobile OnRoad2">
	
<a target="_blank" href="<?php echo MahindraAdLink('55','mahindra-tractors','on_road_price'); ?>">
	<img class="img-responsive" src="<?php echo $root; ?>web_root/mahindra/on_road_mobile.gif" alt="Mahindra Tractor | Tractorjunction" title="Mahindra Tractor | Tractorjunction">

</a>
       
</div>
    </div>
<?php } ?>
<script>
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
	function Get_model_name(value_brand) {

        $.ajax({
            type: "POST",
            url: 'Compare_tractor/GetModelNameOnRoad',
            data: {id_brand: value_brand},
            success: function (data) {
				// alert(data);
                $("#brandsVal").html(data);
            },
        });
    }
	function GetAD(tractor_id){
    $.ajax({
            type: "POST",
            url: 'Compare_tractor/GetOnRoadPricceAD',
            data: {tractors_id: tractor_id},
            success: function (data) {
				// alert(data);
                $(".onROADJHONAD").html("");
                $(".onROADJHONAD").html(data);
            },
        });
	}
</script>