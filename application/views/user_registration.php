<body>
<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

$contact_no='';$req_type='';$username='';$email='';$pincode='';$full_address='';$state='';$location='';$mobile_type='';

if ($this->session->userdata('request_type')) {
	
	$req_type=$this->session->userdata('request_type');
}
if ($this->session->userdata('request_contact_no')) {
	$contact_no=$this->session->userdata('request_contact_no');
	$user_reg = $this->Front_model->get_result_check('id,username,email,pincode,full_address,state,location,mobile_type', 'user_reg', 'mobile', $contact_no);
if (!empty($user_reg)) {
	$user_id = '';
	foreach ($user_reg as $key => $value) {
	$user_id = $value->id;
	$username = $value->username;
	$email = $value->email;
	$pincode = $value->pincode;
	$full_address = $value->full_address;
	$location = $value->location;
	$state = $value->state;
	$mobile_type = $value->mobile_type;
	
	}
	}
	}


	
 // }

 if ($this->session->userdata('demo_requRes')) {
	 $data=$this->session->userdata('demo_requRes');
	 $contact_no=$data['contact'];
 }
 if ($this->session->userdata('data_harverterOnroad')) {
	 $data=$this->session->userdata('data_harverterOnroad');
	 $contact_no=$data['contact_no'];
	 $req_type=$data['req_type'];
 }
?>
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
                <?php echo form_open('Search/UserRegOnRoad'); ?>
                <div class="col-sm-12 col-md-12">
                    <h4 class="b3"><u> Information Details</u></h4>
                    <div class="col-sm-6 col-md-6" style="margin-top: 16px;">
                        <input class="form-control" name="name" value="<?php echo $username; ?>" placeholder="Full Name" required="required" type="text">
                    </div>
                    <div class="col-sm-6 col-md-6"  style="margin-top: 16px;">
                        <input class="form-control" name="email" value="<?php echo $email; ?>" placeholder="Email" type="email">
                        <input class="form-control" name="req_type" value="<?php echo $req_type; ?>" type="hidden">
                    </div>

                    <div class="col-sm-6 col-md-6" style="margin-top: 16px;">
                        <input class="form-control" pattern="[6789][0-9]{9}" value="<?php echo $contact_no; ?>" maxlength="10"  onkeypress="return isNumberKey(event)" name="mobile" required="required" placeholder="Mobile No" type="text">
                    </div>

<div class="col-sm-12 col-md-6" style="margin-top: 16px;">
                        <input class="form-control" value="<?php echo $pincode; ?>" maxlength="6" minlength="6" name="pincode"  placeholder="Pin Code" type="text">
                    </div>

                    <div class="col-sm-6 col-md-6" style="margin-top: 16px;">
                        <?php
						 
						  $selected = '';
						 $selected = ($state) ? $state : $state;
                        $query1 = shweta_select('*', 'states', 'country_id', '101');
                        $val1[''] = 'Select State';
                        foreach ($query1 as $k1 => $r1) {
                            $val1[$r1->id] = ucfirst($r1->name);
                        }
                        $ab = 'class="form-control"   required="required" onchange="CityGet(this.value)"';
                        echo form_dropdown('states', $val1, $selected, $ab);
                        ?>
                    </div>
                    <div class="col-sm-6 col-md-6" style="margin-top: 16px;" id="CityVal">
					  <?php
					  if($location !=''){
						  $selected = '';
						 $selected = ($location) ? $location : $location;
                        $query1 = shweta_select('*', 'cities', 'state_id', $state);
                        $val1[''] = 'Select State';
                        foreach ($query1 as $k1 => $r1) {
                            $val1[$r1->id] = ucfirst($r1->name);
                        }
                        $ab = 'class="form-control"   required="required" id="cur_city_id"';
                        echo form_dropdown('city', $val1, $selected, $ab);
					  }else{
                        ?>
                        <select name="city" class="form-control" id="cur_city_id" required="required">
                            <option value="0">Select City</option>
                        </select>
					  <?php } ?>
                    </div>
					
					         <div class="col-sm-12 col-md-12">
<p style="    padding-top: 20px;margin-bottom: 0px">If you agree to share your information with Manufactures/Partners
 click below Button. </p>
</div>
                    <div class="col-sm-12 col-md-12 b5">
                        <button type="submit" class="btn btn-default slido-btni">Register Now</button>
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