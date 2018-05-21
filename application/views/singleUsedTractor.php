<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
foreach ($result as $row => $obj) {
}
$tractor_brandImage = '';
$tractor_brand = '';
$city = '';
$state = '';
$hp = '';
foreach (shweta_select('image', 'brand', 'id', $obj->brand) as $raa) $tractor_brandImage = $raa->image;
foreach (shweta_select('name', 'brand', 'id', $obj->brand) as $raa) $tractor_brand = $raa->name;
foreach (shweta_select('name', 'states', 'id', $obj->state) as $raa) $state = $raa->name;
foreach (shweta_select('name', 'cities', 'id', $obj->city) as $raa) $city = $raa->name;
foreach (shweta_select('name', 'hp', 'id', $obj->hp) as $raa) $hp = $raa->name;
?>
<?php if ($this->session->userdata('thyankYou')) {
    ?>
    <div class="singleuse">
    <div style="height:auto;width:400px;border-radius:4px;background-color:white;position: fixed;top:70px;left:430px;text-align:center;padding:20px">
    <img src="<?php echo $root; ?>images/right-click-tractor.png"
         style="height:50px;width:50px;float:right;margin:-30px -30px 0px 0px"/>
    <?php
    $getOrder = shweta_select('*', 'purchaserequest', 'id', $this->session->userdata('thyankYou'));
    foreach ($getOrder as $getOrder => $getOrdervalue) {
        $name = '';
        $email = '';
        $cotact = '';
        $stateid = '';
        $state = '';
        $cityid = '';
        $city = '';
        $brand = '';
        $model = '';
        foreach (shweta_select('name', 'old_tractor', 'id', $getOrdervalue->requestfor) as $raa) $name = ucfirst($raa->name);
        foreach (shweta_select('email', 'old_tractor', 'id', $getOrdervalue->requestfor) as $raa) $email = ucfirst($raa->email);
        foreach (shweta_select('mobile', 'old_tractor', 'id', $getOrdervalue->requestfor) as $raa) $cotact = ucfirst($raa->mobile);
        foreach (shweta_select('state', 'old_tractor', 'id', $getOrdervalue->requestfor) as $raa) $stateid = ucfirst($raa->state);
        foreach (shweta_select('name', 'states', 'id', $stateid) as $raa) $state = ucfirst($raa->name);
        foreach (shweta_select('city', 'old_tractor', 'id', $getOrdervalue->requestfor) as $raa) $cityid = ucfirst($raa->city);
        foreach (shweta_select('name', 'cities', 'id', $cityid) as $raa) $city = ucfirst($raa->name);
        ?>
        <div class="col-md-12 col-sm-12 paddingZ" style="font-size:20px;font-weight:bold;padding-top:10px">
            Thank You! For Contacting <span style="color:rgb(214,51,52);font-size:28px;">Tractorjunction.com </span>
        </div>
        <div class="col-md-12 col-sm-12 paddingZ" style="padding-top:15px;font-size:16px">
            <b>Request Number : <?php echo $getOrdervalue->reqNo; ?></b>
            <p style="padding-top:15px;font-size:12px">Thank you for contacting Tractor Junction!
                You can buy old tractor by manually contacting the seller. Seller details are provided below.
            </p>
        </div>
        <div class="col-md-12 col-sm-12 paddingZ" style="padding-top:2px">
        </div>
        <div class="col-md-12 col-sm-12 paddingZ" style="margin:10px 0px;color:silver">
            <b>Tractor Owner Information </b>
        </div>
        <div class="col-md-12 col-sm-12 paddingZ" style="margin-top:5px ">
            <b>Name : <?php echo $name; ?> </b>
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
            <a href="<?php echo $root; ?>OldTractor/CloseButton" type="button" style="font-size:16px;width:100px"
               class="btn btn-danger">OK</a>
        </div>
        </div>
        </div>
    <?php }
} ?>
<div class="banner" style="background:rgba(204,0,1,0.7) none repeat scroll 0% 0%;height:105px;">
    <div class="container">
        <div class="col-sm-12 col-md-12" style="padding:15px 0px;">
            <ul type="none" style="color:#fff">
                <li style="float:left;padding-right:5px;"><i class="fa fa-home"
                                                             style="font-size:16px;padding-right:5px;"></i>Home
                </li>
                <li style="float:left;padding-right:5px;">/</li>
                <li style="float:left;padding-right:5px;">Old Tractors</li>
                <li style="float:left;padding-right:5px;">/</li>
                <li style="float:left;padding-right:5px;"><?php echo ucfirst($obj->model_name); ?></li>
            </ul>
        </div>
    </div>
</div>
<div class="container d1">
    <div class="col-sm-12 col-md-12 paddingZ b1">
        <div class="box-wrapper">
            <div class="box1">
                <div class="row">
                    <div class="col-sm-4 col-md-4">
                        <img src="<?php echo $root . "images/oldTractor/"; ?><?php echo $obj->image; ?>"
                             alt="<?php echo $tractor_brand; ?> <?php echo $obj->model_name; ?> tractor"
                             class="img-responsive d2" style="border: 1px solid #ddd" />
                    </div>
                    <div class="col-sm-8 col-md-8">
                        <div class="col-md-12 col-sm-12">
                            <h3 class="OldTractorSingle"> <?php echo ucfirst($tractor_brand); ?><?php echo ucfirst($obj->model_name); ?></h3>
                        </div>
                        <div class="col-md-12 col-sm-12 paddingZ">
                            <div class="col-md-5 col-sm-5 d4">
                                <ul type="none" class="d4">
                                    <li><h3 class="d5">
                                            <i class="fa fa-user"> </i> Seller Information</h3></li>
                                    <li><h4 class="d6"><span class="d7">  Name</span>
                                            : <?php echo ucfirst(strtolower($obj->name)); ?></h4></li>
                                    <li><h4 class="d6"><span class="d7">  Number</span> : +91*******</h4></li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-sm-4 paddingZ">
                                <ul type="none" class="d8 cityOldTractor">
                                    <li><h4 class="d6"><span
                                                    class="d7">  City : <?php echo ucfirst(strtolower($city)); ?></span>
                                        </h4></li>
                                    <li><h4 class="d6"><span class="d7"> State  </span>
                                            : <?php echo ucfirst(strtolower($state)); ?></h4></li>
                                </ul>
                            </div>
                            <div class="col-sm-3 col-md-3 paddingZ">
                                <ul type="none" class="d9 cityOldTractor">
                                    <li><h4 class="d6"><span class="d7"> Email : ________.com</span></h4></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 paddingZ">
                            <h3 class="d10 TechSpecOld">
                                <i class="fa fa-get-pocket"> </i> Tractor Information </h3>
                            <div class="col-md-4 col-sm-4 ">
                                <ul type="none" class="d11">
                                    <li><h4 style="font-size:1.0em;">
                                            <i class="fa fa-share-square-o" style="margin-right:11px"></i><span
                                                    class="d7">Condition</span> : Good</h4></li>
                                    <li><h4 style="font-size:1.0em;">
                                            <i class="fa fa-dashboard" style="margin-right:10px"></i><span class="d7">Bhp</span>
                                            : <?php echo $hp; ?></h4></li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-sm-4 paddingZ" style="margin-right:50px">
                                <ul type="none" class="d12">
                                    <?php if ($obj->cc != "") { ?>
                                        <li><h4 class="d6">
                                                <i class="fa fa-bolt" style="margin-right:17px"></i><span
                                                        class="d7">CC</span> : <?php echo $obj->cc; ?> CC</h4></li>
                                    <?php } ?>
                                    <li><h4 class="d6 ExpPriceOld">
                                            <i class="fa fa-dot-circle-o" style="margin-right:12px"></i><span
                                                    class="d7">Expected Price</span> : <?php echo $obj->price; ?> Lac*
                                        </h4></li>
                                </ul>
                            </div>
                            <div class="col-sm-3 col-md-3 paddingZ">
                                <ul type="none" class="d12">

 									<li>
							
									<button data-toggle="modal" data-target="#OldTRractorModel" id="" type="button" style=""
	class="btn btn-info btn-lg singleP_compare singlePgaeBt BtHarvester">
	<i class="fa fa-road" style=""></i> Get Details

	</button>
                 
 
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container d15">
    <div class="col-sm-12 col-md-12 paddingZ a34">
        <div class="col-md-4 col-sm-4">
            <h4 class="d16">
                Overview</h4>
            <div class="d17">
                <p style="text-align:justify">
                    <?php echo ucfirst(strtolower($obj->overview)); ?>
                </p>
                <?php if ($obj->resonrelling != "") { ?>
                    <p style="text-align:justify">
                        <span> <b>Reason for selling: </b></span>
                        <?php echo ucfirst(strtolower($obj->resonrelling)); ?>
                    </p>
                <?php } ?>
            </div>
        </div>
        <div class="col-sm-8 col-md-8">
            <ul class="nav nav-tabs single-nav" id="maincontent" role="tablist">
                <li class="active"><a href="#features" role="tab" data-toggle="tab"
                                      class="hvr-bubble-bottom">Details</a></li>
                <li><a href="#specification" role="tab" data-toggle="tab" class="hvr-bubble-bottom">Tractor
                        Condition</a></li>
            </ul><!--/.nav-tabs.content-tabs -->
            <div class="tab-content">
                <div class="tab-pane fade in active d19" id="features">
                    <div class="panel-group" id="accordion1">
                        <div class="panel panel-default">
                            <button type="button" class="btn btn-info compare_head " data-toggle="collapse"
                                    data-parent="#accordion1" href="#collapse1">Tractor Registration Details
                            </button>
                            <div id="collapse1" class="panel-collapse collapse in">
                                <table class="table table-striped d20">
                                    <tbody>
                                    <?php if ($obj->rto != "") { ?>
                                        <tr>
                                            <th class="widthH">RTO Number</th>
                                            <td class="widthH"><?php echo ucfirst(strtolower($obj->rto)); ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($obj->engin != "") { ?>
                                        <tr>
                                            <th>Engine Number</th>
                                            <td><?php echo ucfirst(strtolower($obj->engin)); ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($obj->chasis != "") { ?>
                                        <tr>
                                            <th>Chassis Number</th>
                                            <td><?php echo ucfirst(strtolower($obj->chasis)); ?></td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <th>Purchase Year</th>
                                        <td><?php echo ucfirst(strtolower($obj->yearpurchase)); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Used Hours</th>
                                        <td><?php echo ucfirst(strtolower($obj->hours)); ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!--/.tab-pane -->

                <div class="tab-pane fade" id="specification" style="padding: 30px 20px 30px;min-height: auto;">
                    <div class="panel-group" id="accordion2">
                        <div class="panel panel-default">
                            <button type="button" class="btn btn-info compare_head " data-toggle="collapse"
                                    data-parent="#accordion2" href="#1collapse">Condition Of Different Parts
                            </button>
                            <div id="1collapse" class="panel-collapse collapse in">
                                <table class="table table-striped d20">
                                    <tbody>
                                    <?php if ($obj->engincond != "") { ?>
                                        <tr>
                                            <th class="widthH">Engine Condition</th>
                                            <td class="widthH">
                                                <?php
                                                foreach (shweta_select('name', 'dropdownvalue', 'id', $obj->engincond) as $raa) echo ucfirst($raa->name);
                                                ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($obj->transcond != "") { ?>
                                        <tr>
                                            <th class="widthH">Transmission Condition</th>
                                            <td class="widthH">    <?php
                                                foreach (shweta_select('name', 'dropdownvalue', 'id', $obj->transcond) as $raa) echo ucfirst($raa->name);
                                                ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($obj->electriccond != "") { ?>
                                        <tr>
                                            <th class="widthH">Electric Condition</th>
                                            <td class="widthH">    <?php
                                                foreach (shweta_select('name', 'dropdownvalue', 'id', $obj->electriccond) as $raa) echo ucfirst($raa->name);
                                                ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($obj->taycond != "") { ?>
                                        <tr>
                                            <th class="widthH">Tyre Condition</th>
                                            <td class="widthH">    <?php
                                                foreach (shweta_select('name', 'dropdownvalue', 'id', $obj->taycond) as $raa) echo ucfirst($raa->name);
                                                ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($obj->stryingcond != "") { ?>
                                        <tr>
                                            <th class="widthH">Strying Condition</th>
                                            <td class="widthH">    <?php
                                                foreach (shweta_select('name', 'dropdownvalue', 'id', $obj->stryingcond) as $raa) echo ucfirst($raa->name);
                                                ?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!--/.tab-pane -->
            </div>
        </div>
        <?php echo quickLinksHTML(); ?>
    </div>
</div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="OldTRractorModel" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Please fill information for more details</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('OldTractor/sendRequest'); ?>
                <div class="col-md-12 col-sm-12" style="margin-top:15px">
                    <div class="col-md-6 col-sm-6" style="text-align:left"> Full Name: <span class="red">*</span>
                        
                            <?php echo form_input(array('type' => 'text', 'name' => 'name', 'placeholder' => 'Full Name', 'required' => 'required', 'class' => 'form-control')); ?>
                        
                    </div>
                    <div class="col-md-6 col-sm-6" style="text-align:left">Email Id : <span class="red">*</span>
                     <?php 
					 $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
					 ?>
                            <?php echo form_input(array('type' => 'hidden', 'name' => 'actual_link', 'value' => $actual_link, 'required' => 'required', 'class' => 'form-control')); ?>
                            <?php echo form_input(array('type' => 'email', 'name' => 'email', 'placeholder' => 'Email id', 'required' => 'required', 'class' => 'form-control')); ?>
                    
                    </div>
                </div>
                <div class="col-md-12 col-sm-12" style="margin-top:15px">
                    <div class="col-md-6 col-sm-6" style="text-align:left"> Contact Number: <span class="red">*</span>
 
                            <?php echo form_input(array('type' => 'text', 'name' => 'contact', 'onkeypress' => 'return isNumberKey(event)', 'placeholder' => 'Mobile Number', 'required' => 'required', 'class' => 'form-control', 'maxlength' => '10', 'minlength' => '10')); ?>
 
                    </div>
                    <div class="col-md-6 col-sm-6" style="text-align:left">Pincode <span class="red">*</span>
                        <?php echo form_input(array('type' => 'text', 'name' => 'pincode', 'onkeypress' => 'return isNumberKey(event)', 'placeholder' => 'Pin Code Number', 'required' => 'required', 'class' => 'form-control', 'maxlength' => '6', 'minlength' => '6')); ?>
                    </div>
                    <span id="loader2" style="display:none"></span>
                </div>
                <div class="col-md-12 col-sm-12" style="margin-top:15px">
                    <div class="col-md-6 col-sm-6" style="text-align:left"> State: <span class="red">*</span>
                      
                            <?php
                            $query1 = shweta_select('*', 'states', 'country_id', '101');
                            $val1[''] = 'Select state';
                            foreach ($query1 as $k1 => $r1) {
                                $val1[$r1->id] = ucfirst($r1->name);
                            }
                            $ab = 'class="form-control" id="country_id_val"  required="required" onchange="CityGet(this.value)"';
                            echo form_dropdown('state', $val1, '', $ab);
                            ?>
                    
                    </div>
                    <div class="col-md-6 col-sm-6" style="text-align:left"> City: <span class="red">*</span>
                        
                            <?php
                            $val1 = array();
                            $val1[''] = 'Select City';
                            $js6 = 'class="form-control" id="cur_city_id" required="required"';
                            echo form_dropdown('city', $val1, '', $js6);
                            ?>
                      
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
                    <div class="col-md-4" style="margin:auto;float: none;color: white;">
                        <?php echo form_input(array('type' => 'submit', 'value' => 'submit', 'class' => 'd14')); ?>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function CityGet(StateName) {
		
        $.ajax({
            type: "POST",
            url: "../Home/StateGet",
            data: {StateID: StateName},
            success: function (data) {
			
                $("#cur_city_id").html(data);
            },
        });
    }
</script>