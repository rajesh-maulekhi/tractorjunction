<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
foreach ($result as $row => $obj) {
}
$tractor_brandImage = '';
$tractor_brand = '';
$state = '';
$city = '';
$hp = '';
foreach (shweta_select('image', 'brand', 'id', $obj->brand) as $raa) $tractor_brandImage = $raa->image;
foreach (shweta_select('name', 'brand', 'id', $obj->brand) as $raa) $tractor_brand = $raa->name;
foreach (shweta_select('name', 'states', 'id', $obj->state) as $raa) $state = $raa->name;
foreach (shweta_select('name', 'cities', 'id', $obj->city) as $raa) $city = $raa->name;
foreach (shweta_select('name', 'hp', 'id', $obj->hp) as $raa) $hp = $raa->name;
?>
<?php if ($this->session->userdata('thyankYou')) {
    ?>
    <div class="singlerent">
    <div class="singlerent2">
    <img src="<?php echo $root; ?>images/right-click-tractor.png"
         style="height:50px;width:50px;float:right;margin:-30px -30px 0px 0px"/>
    <?php
    $getOrder = shweta_select('*', 'purchaserequest', 'id', $this->session->userdata('thyankYou'));
    foreach ($getOrder as $getOrder => $getOrdervalue) {
        $name = '';
        $lname = '';
        $email = '';
        $cotact = '';
        $stateid = '';
        $state = '';
        $cityid = '';
        $city = '';
        $brand = '';
        $model = '';
        foreach (shweta_select('name', 'rent_tractor', 'id', $getOrdervalue->requestfor) as $raa) $name = ucfirst($raa->name);
        foreach (shweta_select('email', 'rent_tractor', 'id', $getOrdervalue->requestfor) as $raa) $email = ucfirst($raa->email);
        foreach (shweta_select('mobile', 'rent_tractor', 'id', $getOrdervalue->requestfor) as $raa) $cotact = ucfirst($raa->mobile);
        foreach (shweta_select('state', 'rent_tractor', 'id', $getOrdervalue->requestfor) as $raa) $stateid = ucfirst($raa->state);
        foreach (shweta_select('name', 'states', 'id', $stateid) as $raa) $state = ucfirst($raa->name);
        foreach (shweta_select('city', 'rent_tractor', 'id', $getOrdervalue->requestfor) as $raa) $cityid = ucfirst($raa->city);
        foreach (shweta_select('name', 'cities', 'id', $cityid) as $raa) $city = ucfirst($raa->name);
        ?>
        <div class="col-md-12 col-sm-12 paddingZ" style="font-size:20px;font-weight:bold;padding-top:10px">
            Thank You! For Contacting <span style="color:rgb(214,51,52);font-size:28px;">Tractorjunction.com </span>
        </div>
        <div class="col-md-12 col-sm-12 paddingZ" style="padding-top:15px;font-size:16px">
            <b>Request Number : <?php echo $getOrdervalue->reqNo; ?></b>
            <p style="padding-top:15px;font-size:12px">Thank you for contacting Tractor Junction!
                Below are the details of dealer you requested. By contacting them you can take tractor on rent.
            </p>
        </div>
        <div class="col-md-12 col-sm-12 paddingZ" style="padding-top:2px">
        </div>
        <div class="col-md-12 col-sm-12 paddingZ" style="margin:10px 0px;color:silver">
            <b>Tractor Owner Information </b>
        </div>
        <div class="col-md-12 col-sm-12 paddingZ" style="margin-top:5px ">
            <b>Name : <?php echo $name; ?>   </b>
        </div>
        <div class="col-md-12 col-sm-12 paddingZ" style="margin-top:5px ">
            <b>Email ID : </b> <?php echo $email; ?>
        </div>
        <div class="col-md-12 col-sm-12 paddingZ" style="margin-top:5px ">
            <b>Contact Number : </b> <?php echo $cotact; ?>
        </div>
        <div class="col-md-12 col-sm-12 paddingZ" style="margin-top:5px ">
            <b>Address : </b> <?php echo $state; ?> , <?php echo $city; ?>
        </div>
        <div class="col-md-12 col-sm-12 paddingZ" style="margin-top:5px ">
            <b>Brand :</b> <?php echo ucfirst($tractor_brand); ?> <br>
            <b>model :</b> <?php echo ucfirst($obj->model_name); ?>
        </div>
        <div class="col-md-12 col-sm-12 paddingZ" style="margin-top:25px ">
            <a href="<?php echo $root; ?>RentTractor/CloseButton" type="button" style="font-size:16px;width:100px"
               class="btn btn-danger">OK</a>
        </div>
        </div>
        </div>
    <?php }
} ?>
<div class="banner" style="background:rgba(204, 0, 1, 0.7) none repeat scroll 0% 0%;height:105px;">
    <div class="container">
        <div class="col-sm-12 col-md-12" style="padding:15px 0px;">
            <ul type="none" style="color:#fff">
                <li style="float:left;padding-right:5px;"><i class="fa fa-home"
                                                             style="font-size:16px;padding-right:5px;"></i>Home
                </li>
                <li style="float:left;padding-right:5px;">/</li>
                <li style="float:left;padding-right:5px;">Rent Tractors</li>
                <li style="float:left;padding-right:5px;">/</li>
                <li style="float:left;padding-right:5px;"><?php echo ucfirst(strtolower($obj->model_name)); ?></li>
            </ul>
        </div>
    </div>
</div>
<div class="container d1">
    <div class="col-sm-12 col-md-8 paddingZ b1" style="padding-right:13px">
        <div class="box-wrapper">
            <div class="box1">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="col-md-12 col-sm-12 paddingZ">
                            <h4 style="text-align:right;color: rgb(219, 76, 77);font-size: 14px;">
                                <span>Posted: <?php echo date("d-M-Y", strtotime($obj->date)); ?></span></h4>
                            <div class="col-md-5 col-sm-5 d4">
                                <h3 class="d5">
                                    <i class="fa fa-user"> </i> Owner Information
                                </h3>
                                <ul type="none" class="d4">
                                    <li><h4 class="d6"><span class="d7">  Name</span>
                                            : <?php echo ucfirst(strtolower($obj->name)); ?></h4></li>
                                    <li><h4 class="d6"><span class="d7">  Number</span> : +91**********</h4></li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-sm-4 paddingZ">
                                <ul type="none" class="d8">
                                    <li><h4 class="d6"><span class="d7">  State : <?php echo $state; ?></span></h4></li>
                                    <li><h4 class="d6"><span class="d7"> City  </span> : <?php echo $city; ?></h4></li>
                                </ul>
                            </div>
                            <div class="col-sm-3 col-md-3 paddingZ">
                                <ul type="none" class="d9">
                                    <li><h4 class="d6"><span class="d7"> Email : _________</span></h4></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 paddingZ">
                            <h3 class="d5">
                                <i class="fa fa-get-pocket"> </i> Tractor Information
                            </h3>
                            <div class="col-md-4 col-sm-4 ">
                                <ul type="none" class="d11">
                                    <li><span class="d6">
									<span class="d7">Type</span> : <b><?php echo ucfirst(str_replace('-', ' ', $obj->rent_type)); ?></b></span>
                                    </li>
                                    <br>
                                    <li><span class="d6">
									<span class="d7">Brand</span> : <?php echo ucfirst(strtolower($tractor_brand)); ?></span>
                                    </li>
                                    <br>
                                    <li><span style="font-size:1.0em;">
									<span class="d7">Bhp</span> : <?php echo ucfirst(strtolower($hp)); ?> HP</span></li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-sm-4 paddingZ" style="margin-right:50px">
                                <ul type="none" class="d12">
                                    <li><span class="d6">
									<span class="d7">Modal </span> : <?php echo ucfirst(strtolower($obj->model_name)); ?></span>
                                    </li>
                                    <br>
                                    <li><span class="d6">
									<span class="d7">Purchase year</span> : <?php echo ucfirst(strtolower($obj->yearpurchase)); ?></span>
                                    </li>
                                    <br>
                                </ul>
                            </div>
                            <div class="col-sm-3 col-md-3 paddingZ">
                                <ul type="none" class="d12">
                                    <li><h4 class="d13">
                                            <span class="d7"> By-</span> <?php echo ucfirst(strtolower($obj->name)); ?>
                                        </h4></li>

                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4 col-md-4 paddingZ huh" style="float:left;padding: 0px 0px 10px;margin-top:52px;">
        <?php echo homeFront(); ?>
    </div>
</div>
<div class="container d15">
    <div class="col-sm-12 col-md-12 paddingZ a34">
        <div class="col-md-4 col-sm-4">
            <h4 class="d16">
                Fare Details</h4>
            <div class="d17">
                <p style="text-align:justify"> Rent details:-
                </p>
                <ul class="paddingZ d18">
                    <li>Per Hour charge :- <?php echo $obj->rentper; ?> <i class="fa fa-inr"></i></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-8 col-md-8">
            <ul class="nav nav-tabs single-nav" id="maincontent" role="tablist">
                <li class="active"><a href="#overview" role="tab" data-toggle="tab"
                                      class="hvr-bubble-bottom">OVERVIEW</a></li>
            </ul><!--/.nav-tabs.content-tabs -->
            <div class="tab-content">
                <div class="tab-pane fade in active d19" id="overview">
                    <p style="text-align:justify">
                        <?php echo ucfirst(strtolower($obj->overview)); ?></p>
                </div><!--/.tab-pane -->
            </div>
        </div>
        <?php echo quickLinksHTML(); ?>
    </div>
</div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="RentTRractorModel" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Please fill information for more details</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('RentTractor/sendRequest'); ?>
                <div class="col-md-12 col-sm-12" style="margin-top:15px">
                    <div class="col-md-6 col-sm-6" style="text-align:left"> Full Name: <span class="red">*</span>
                        <?php
                        if ($this->session->userdata('review_id')) {
                            foreach (shweta_select('username', 'user_reg', 'id', $this->session->userdata('review_id')) as $raa) $userName = ($raa->username);
                            ?>
                            <?php echo form_input(array('type' => 'text', 'name' => 'name', 'value' => $userName, 'placeholder' => 'Full Name', 'required' => 'required', 'class' => 'form-control')); ?>
                            <?php
                        } else {
                            ?>
                            <?php echo form_input(array('type' => 'text', 'name' => 'name', 'placeholder' => 'Full Name', 'required' => 'required', 'class' => 'form-control')); ?>
                        <?php } ?>
                    </div>
                    <div class="col-md-6 col-sm-6" style="text-align:left">Email Id : <span class="red">*</span>
                        <?php
                        if ($this->session->userdata('review_id')) {
                            foreach (shweta_select('email', 'user_reg', 'id', $this->session->userdata('review_id')) as $raa) $email = ($raa->email);
                            ?>
                            <?php echo form_input(array('type' => 'email', 'name' => 'email', 'value' => $email, 'placeholder' => 'Email id', 'required' => 'required', 'class' => 'form-control')); ?>

                            <?php
                        } else {
                            ?><?php echo form_input(array('type' => 'email', 'name' => 'email', 'placeholder' => 'Email id', 'required' => 'required', 'class' => 'form-control')); ?>

                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12" style="margin-top:15px">
                    <div class="col-md-6 col-sm-6" style="text-align:left"> Contact Number: <span class="red">*</span>
                        <?php
                        if ($this->session->userdata('review_id')) {
                            foreach (shweta_select('mobile', 'user_reg', 'id', $this->session->userdata('review_id')) as $raa) $mobile = ($raa->mobile);
                            ?>
                            <?php echo form_input(array('type' => 'text', 'name' => 'contact', 'value' => $mobile, 'onkeypress' => 'return isNumberKey(event)', 'placeholder' => 'Mobile Number', 'required' => 'required', 'class' => 'form-control', 'maxlength' => '10', 'minlength' => '10')); ?>
                            <?php
                        } else {
                            ?>
                            <?php echo form_input(array('type' => 'text', 'name' => 'contact', 'onkeypress' => 'return isNumberKey(event)', 'placeholder' => 'Mobile Number', 'required' => 'required', 'class' => 'form-control', 'maxlength' => '10', 'minlength' => '10')); ?>
                        <?php } ?>
                    </div>
                    <div class="col-md-6 col-sm-6" style="text-align:left">Pincode <span class="red">*</span>
                        <?php echo form_input(array('type' => 'text', 'name' => 'pincode', 'onkeypress' => 'return isNumberKey(event)', 'placeholder' => 'Pin Code Number', 'required' => 'required', 'class' => 'form-control', 'maxlength' => '6', 'minlength' => '6')); ?>
                    </div>
                    <span id="loader2" style="display:none"></span>
                </div>
                <div class="col-md-12 col-sm-12" style="margin-top:15px">
                    <div class="col-md-6 col-sm-6" style="text-align:left"> State: <span class="red">*</span>
                        <?php
                        if ($this->session->userdata('review_id')) {
                            foreach (shweta_select('state', 'user_reg', 'id', $this->session->userdata('review_id')) as $raa) $state = ($raa->state);
                            ?>
                            <?php
                            $selected = '';
                            $selected = ($state) ? $state : $state;
                            $query1 = shweta_select('*', 'states', 'country_id', '101');
                            $val1[''] = 'Select state';
                            foreach ($query1 as $k1 => $r1) {
                                $val1[$r1->id] = ucfirst($r1->name);
                            }
                            $ab = 'class="form-control" id="country_id_val"  required="required" onchange="state_get()"';
                            echo form_dropdown('state', $val1, $selected, $ab);
                            ?>
                            <?php
                        } else {
                            ?>
                            <?php
                            $query1 = shweta_select('*', 'states', 'country_id', '101');
                            $val1[''] = 'Select state';
                            foreach ($query1 as $k1 => $r1) {
                                $val1[$r1->id] = ucfirst($r1->name);
                            }
                            $ab = 'class="form-control" id="country_id_val"  required="required" onchange="state_get()"';
                            echo form_dropdown('state', $val1, '', $ab);
                            ?>
                        <?php } ?>
                    </div>
                    <div class="col-md-6 col-sm-6" style="text-align:left"> City: <span class="red">*</span>
                        <?php
                        if ($this->session->userdata('review_id')) {
                            foreach (shweta_select('location', 'user_reg', 'id', $this->session->userdata('review_id')) as $raa) $city = ($raa->location);
                            ?>
                            <?php
                            $selected = '';
                            $selected = ($city) ? $city : $city;
                            $a1 = array();
                            $a1 = shweta_select('*', 'cities', 'state_id', $state);
                            $a2[''] = 'Please Select city';
                            foreach ($a1 as $k311 => $r311) {
                                $a2[$r311->id] = ucfirst($r311->name);
                            }
                            $js6 = 'class="form-control" id="cur_city_id" required="required"';
                            echo form_dropdown('city', $a2, $selected, $js6)
                            ?>
                            <?php
                        } else {
                            ?>
                            <?php
                            $val1 = array();
                            $val1[''] = 'Select City';
                            $js6 = 'class="form-control" id="cur_city_id" required="required"';
                            echo form_dropdown('city', $val1, '', $js6);
                            ?>
                        <?php } ?>
                    </div>
                </div>
                <?php echo form_input(array('type' => 'hidden', 'name' => 'id_tractor', 'value' => $obj->id, 'class' => 'form-control')); ?>
                <div class="col-md-12 col-sm-12" style="margin-top:15px">
                    <div class="col-md-12 col-sm-12" style="text-align:left">Address <span class="red">*</span>
                        <textarea cols="" rows="" class="form-control" name="address" placeholder="Address"
                                  required="required"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-12">
                    <div class="col-md-4" style="margin: auto;float: none;color: white;">
                        <?php echo form_input(array('type' => 'submit', 'value' => 'submit', 'class' => 'd14')); ?>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>