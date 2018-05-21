<body>
<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

?>
	 <style>
				 .label_userReg{
					     color: #db4c4d;
    font-size: 15px;
    margin-bottom: 6px;
    font-weight: 600;
				 }
				 </style>
<div class="banner banner1">
    <div class="container">
        <div class="col-sm-12 col-md-12" style="padding:15px 0px;">
            <ul type="none" style="color:#fff">
                <li style="float:left;padding-right:5px;"><i class="fa fa-home"
                                                             style="font-size:16px;padding-right:5px;"></i><a
                            style="color:white;" href="<?php echo $root; ?>">Home</a></li>
                <li style="float:left;padding-right:5px;">/</li>
                <li style="float:left;padding-right:5px;">Registration</li>
            </ul>
        </div>
    </div>
</div>

<div class="container-fluid paddingz ">
    <div class="container a3">
        <div class="col-sm-12 col-md-12 paddingZ b1">
            <div class="col-md-2 col-sm-2 b6" style="margin-left:46px">
            </div>
            <div class="col-sm-7 col-md-7 paddingZ pdf">
                <h4 class="compare_head b2">
                    <i class="fa fa-truck a32"></i>Your Tractor Information</h4>
                <?php echo form_open('Search/UserRegOnRoad_final'); ?>
                <div class="col-sm-12 col-md-12">
                    <h4 class="b3"><u> Information Details</u></h4>
                    <div class="col-sm-6 col-md-6" style="margin-top: 16px;">
					 			 <label class="label_userReg">Land Size</label>
								 <input type="text"  class="form-control" name="land_size" placeholder="eg. 5 acre">

				 </div> 
				 <div class="col-sm-6 col-md-6" style="margin-top: 16px;">
				 			 <label class="label_userReg">Soil Information</label>
<select class="form-control" name="soil_information">                 
<option value="">Select Soil Information </option>
<option value="soft">Soft    </option>
<option value="medium">Medium  </option>
<option value="hard">Hard</option>
</select>                 
				 </div>
				 <div class="col-sm-6 col-md-6" style="margin-top: 16px;">
				 <label class="label_userReg">Do you have old Tractor?</label>
<select name="old_tractor" class="form-control" required>                 
<option value="">Please Select </option>
<option value="yes">Yes    </option>
<option value="no">No </option> 
</select>                 
				 </div>
			<?php $mobile_type=''; ?>
				 <div class="col-sm-6 col-md-6" style="margin-top: 16px;">
				 <label class="label_userReg">Do you have Own Implement?</label>
<select name="old_implement" class="form-control">                 
<option value="">Please Select </option>
<option value="yes">Yes    </option>
<option value="no">No </option> 
</select>                 
				 </div>
					                     <div class="col-sm-6 col-md-6" style="margin-top: 16px;">
				 <label class="label_userReg">Type of mobile Phone</label>

										 <select class="form-control" required="" name="mobile_type">
						<option value="">Type of mobile Phone</option>
						<option value="smartphone"  <?php if($mobile_type =="smartphone"){ ?>selected<?php } ?>>Smartphone</option>
						<option value="feature_phone" <?php if($mobile_type =="feature_phone"){ ?>selected<?php } ?>>Feature phone</option>
						</select>
					</div>

                    <div class="col-sm-12 col-md-6" style="margin-top: 16px;">
					 <label class="label_userReg">Village Name</label>
					 <input type="text" name="full_address" class="form-control" placeholder="Village Name">					</div>
					         <div class="col-sm-12 col-md-12">
<p style="    padding-top: 20px;margin-bottom: 0px">If you agree to share your information with Manufactures/Partners
 click below Button. </p>
</div>
                    <div class="col-sm-12 col-md-12 b5">
                        <button type="submit" class="btn btn-default slido-btni">Finish</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>


            </div>
        </div>
    </div>
</div>
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
</script>