<body>
<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
$brand_id=0;
$tractor_id=0;
 if(!empty($result)){
	 foreach($result as $key=>$value){
		$brand_id=$value->brand; 
		$tractor_id=$value->id; 
	 }
	
 }
 // echo "<pre>";
 // print_r($result);
 // die;
?>

  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css'>
 

      <style>
        .star-rating {
  font-family: 'FontAwesome';
 
}
.star-rating > fieldset {
  border: none;
  display: inline-block;
}
.star-rating > fieldset:not(:checked) > input {
  position: absolute;
  top: -9999px;
  clip: rect(0, 0, 0, 0);
}
.star-rating > fieldset:not(:checked) > label {
  float: right;
  width: 1em;
  padding: 0 .05em;
  overflow: hidden;
  white-space: nowrap;
  cursor: pointer;
  font-size: 200%;
  color: #dd4445;
}
.star-rating > fieldset:not(:checked) > label:before {
  content: '\f006  ';
}
.star-rating > fieldset:not(:checked) > label:hover,
.star-rating > fieldset:not(:checked) > label:hover ~ label {
  color: #dd4445;
  text-shadow: 0 0 1px #dd4445;
}
.star-rating > fieldset:not(:checked) > label:hover:before,
.star-rating > fieldset:not(:checked) > label:hover ~ label:before {
  content: '\f005  ';
}
.star-rating > fieldset > input:checked ~ label:before {
  content: '\f005  ';
}
.star-rating > fieldset > label:active {
  position: relative;
  top: 2px;
}
 
    </style>

<style>

.formSStyle{    margin-bottom: 14px;}

</style>
<div class="banner banner1">
    <div class="container">
        <div class="col-sm-12 col-md-12" style="padding:15px 0px;">
            <ul type="none" style="color:#fff">
                <li style="float:left;padding-right:5px;"><i class="fa fa-home"
                                                             style="font-size:16px;padding-right:5px;"></i><a
                            style="color:white;" href="<?php echo $root; ?>">Home</a></li>
                <li style="float:left;padding-right:5px;">/</li>
                <li style="float:left;padding-right:5px;">Rate & Review</li>
            </ul>
        </div>
    </div>
</div>
 

	
<div class="container-fluid paddingz ">
    <div class="container a3 OnRoadPad">
        <div class="col-sm-12 col-md-12 paddingZ b1">

           <div class="col-sm-12 col-md-8 paddingZ pdf OnRR">
                <h4 class="compare_head b2">
                    <i class="fa fa-truck a32"></i>Rate & Review</h4>
                <?php echo form_open('Reviews/SubmitReview'); ?>
                <div class="col-sm-12 col-md-12">
                
				<div class="col-sm-12 col-md-12 formSStyle"  >
                               <?php
							   // echo $brand_id;
							   // die;
					$selected = '';
					$selected = ($brand_id) ? $brand_id : $brand_id;
							   $condBrand = "type LIKE '%tractor%'";
			$query1 =Select_OrderBy_brand('*', 'brand', $condBrand, 'name', 'ASC');
                        $val1[''] = 'Please select Tractor brand';
                        foreach ($query1 as $k1 => $r1) {
                            $val1[$r1->id] = ucfirst($r1->name);
                        }
                        $ab = 'class="form-control"   required="required" onchange="Get_model_name(this.value)"';
                        echo form_dropdown('brand_id', $val1, $selected, $ab);
                        ?>
                    </div>
					<?php if($brand_id !=0){ ?>
					<div class="col-sm-12 col-md-12 formSStyle"   id="brandDiv">
					       <?php 
					$selected = '';
					$selected = ($tractor_id) ? $tractor_id : $tractor_id;
							   $condBrand = "brand='".$brand_id."'";
			$query1 =Select_OrderBy_brand('*', 'tech_specification', $condBrand, 'model_name', 'ASC');
                        $val1[''] = 'Select Model';
                        foreach ($query1 as $k1 => $r1) {
                            $val1[$r1->id] = ucfirst($r1->model_name);
                        }
                        $ab = 'class="form-control" id="brandsVal"  required="required"';
                        echo form_dropdown('model_name', $val1, $selected, $ab);
                        ?>
							</div>
					<?php }else{ ?>
					<div class="col-sm-12 col-md-12 formSStyle" id="brandDiv">
					<select name="model_name" class="form-control" id="brandsVal" required="required" >
					<option value="">Select Model</option>
					
					</select>
					</div>
					<?php } ?> 
                    
                    <div class="col-sm-12 col-md-12 formSStyle">
                        <input class="form-control"  name="name" required="required" placeholder="Name" type="text">
                    </div>   
                    <div class="col-sm-12 col-md-12 formSStyle"  >
                        <input class="form-control" pattern="[789][0-9]{9}" maxlength="10"  onkeypress="return isNumberKey(event)" name="mobile_no_req" required="required" placeholder="Mobile No" type="text">
                    </div>  

                    <div class="col-sm-12 col-md-12 formSStyle RatCss"  >
						
					   <div class="star-rating">
					   <span style="    float: left;
    color: #dd4445;
    font-weight: 700;
    font-size: 20px;
    padding: 5px 0px;">Rate On : </span>
				
  <fieldset style="    float: left;
    padding-left: 25px;">
    <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Outstanding">5 stars</label>
    <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Very Good">4 stars</label>
    <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Good">3 stars</label>
    <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Poor">2 stars</label>
    <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Very Poor">1 star</label>
  </fieldset>
</div>
                  
                    </div>   	
                    <div class="col-sm-12 col-md-12 formSStyle"  >
                    <textarea class="col-sm-12 col-md-12 form-control" name="reviewDes" style="height:100px" placeholder="Write description about tractor"></textarea>
                    </div>   					
					

                    <div class="col-sm-12 col-md-12 b5">
                        <button type="submit" class="btn btn-default slido-btni">Submit</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>


            </div>
			 <div class="col-sm-12 col-md-4 col-xs-12 tra_sing singleAdv OnRoadADD">
                <div class="col-sm-12 col-md-12 col-xs-12 TachSpecADD onROADJHONAD"
                     style="    height: auto;">
<?php echo newsFront(); ?>
               
			   </div>
            </div>
        </div>
    </div>
</div>
 
 
 
 
<script>
var root='<?php echo $root; ?>';
 
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
// alert(value_brand);
        $.ajax({
            type: "POST",
            url: root+'Compare_tractor/GetModelNameOnRoad',
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
            url: root+'Compare_tractor/GetOnRoadPricceAD',
            data: {tractors_id: tractor_id},
            success: function (data) {
				// alert(data);
                $(".onROADJHONAD").html("");
                $(".onROADJHONAD").html(data);
            },
        });
	}
</script>