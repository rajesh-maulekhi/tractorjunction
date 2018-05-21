<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
?>
<div class="banner" style="background:rgba(204, 0, 1, 0.7) none repeat scroll 0% 0%;height:105px;">
    <div class="container">
        <div class="col-sm-12 col-md-12" style="padding:40px 0px;">
            <ul type="none" style="color:#fff">
                <li style="float:left;padding-right:5px;"><i class="fa fa-home"
                                                             style="font-size:16px;padding-right:5px;"></i>Home
                </li>
                <li style="float:left;padding-right:5px;">/</li>
                <li style="float:left;padding-right:5px;">Add Tractor</li>
                <li style="float:left;padding-right:5px;">/</li>
                <li style="float:left;padding-right:5px;">Tractor Information</li>
            </ul>
        </div>
    </div>
</div>


<?php
if ($this->session->userdata('otpOldTractor')) {
    ?>

    <div class="content-wrapper ">
        <div class="content-wrapper1">
            <div class="heading-wrap headOld">
                <h1>Sell Your Used Tractor</h1>
                <p>It's easy and free to list.</p>
            </div>
            <div class="form-wrapper">
                <span class="subtitle">Enter your otp</span>
                <?php
                $att = 'id="form2"';
                echo form_open_multipart('OldTractor/AddOldTRactorOtpMatch', $att);
                $data = $this->session->userdata('otpOldTractor');
                // print_r($data);
                ?>

                <div class="fields1" style="width: 100%;">
                    <input data-gsf-name="" id="" name="otp" required="required" placeholder="Enter your otp"
                           class="gs_ta gs_ta_witharrow" autocomplete="off" type="text">
                </div>

                <div class="clear"></div>
                <div class="fields21">
                    <button class=" btn btn-default slido-btni11" type="submit" title="">Next</button>
                    <a href="<?php echo $root; ?>OldTractor/ResendOTP">
                        <button class=" btn btn-default slido-btni11 resen" type="button" title="">Resend OTP</button>
                    </a>

                </div>
                <div class="clear"></div>
                <?php echo form_close(); ?>
            </div>
            <div class="clear"></div>
        </div>
    </div>


    <?php
} elseif ($this->session->userdata('mobileUserId')) {
    ?>


    <div class="content-wrapper addOldTrHei" style="">
        <div class="content-wrapper1">
            <div class="heading-wrap headOld">
                <h1>Sell Your Used Tractor</h1>
                <p>It's easy and free to list.</p>
            </div>
            <div class="form-wrapper">
                <span class="subtitle">Enter tractor info</span>


                <div class="col-sm-12 col-md-12 paadrr">
                    <?php
                    $att = 'id="form2" class="paadrr22"';
                    echo form_open_multipart('OldTractor/addOldTractorfinal', $att);
                    $data = $this->session->userdata('mobileUserId');
                    ?>
                    <div class="col-md-12 col-sm-12 paadrr" style="margin-top:15px paadrr">
                        <div class="col-sm-12 col-md-12">
                            <?php
                            if ($data['username'] != '') {
                                ?>
                                <input type="text" class="form-control fortrol" name="name" placeholder="Full Name"
                                       value="<?php echo $data['username']; ?>" required="required">
                                <?php
                            } else { ?>        <input type="text" class="form-control fortrol" name="name"
                                                 placeholder="Full Name" required="required">
                            <?php } ?>
                        </div>
                     
                           
                    </div>
					  <div class="col-md-12 col-sm-12 paadrr" style="margin-top:15px">
<div class="col-sm-12 col-md-6" style="">
<?php
$query1 = shweta_select('*', 'states', 'country_id', '101');
$val1[''] = 'Select State';
foreach ($query1 as $k1 => $r1) {
$val1[$r1->id] = ucfirst($r1->name);
}
$ab = 'class="form-control fortrol" id="country_id_val"  required="required" onchange="CityGet(this.value)"';
echo form_dropdown('state', $val1, '', $ab);
?>
</div>

<div class="col-sm-12 col-md-6" style="">
<select name="city" class="form-control fortrol" id="cur_city_id" required="required">
<option value="0">Select City</option>
</select>
</div>
</div>
                    <div class="col-md-12 col-sm-12 paadrr" style="margin-top:15px">
                        <div class="col-md-6 col-sm-6" style="text-align:left"> 
                            <?php
                            $query3 = Tractorsbrands();
                            $val3[''] = 'Select brand';
                            foreach ($query3 as $k3 => $r3) {
                                $val3[$r3->id] = ucfirst($r3->name);
                            }
                            $ab = 'class="form-control fortrol" required="required"';
                            echo form_dropdown('brand', $val3, '', $ab);
                            ?>
                        </div>
                        <div class="col-md-6 col-sm-6" style="text-align:left">
                            <input type="text" class="form-control fortrol" name="model" placeholder="Model Name"
                                   required="required">
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-sm-12 paadrr" style="margin-top:15px">
                        <div class="col-md-6 col-sm-6" style="text-align:left"> 
                            <?php echo form_input(array('type' => 'file', 'name' => 'model_image', 'required' => 'required', 'class' => 'form-control fortrol')); ?>
                        </div>
  <div class="col-md-6 col-sm-12" style="text-align:left"> 
                          
							     <?php
                            $temp2 = shweta_select('*', 'hp', '', '');
                            $p = "";
                            $hp[0] = 'Please Select HP';
                            foreach ($temp2 as $row => $objk) {
                                $hp[$objk->id] = $objk->name . " HP";
                            }
                            $ab = 'class="form-control fortrol" required="required"';
                            echo form_dropdown('hp', $hp, '', $ab);
                            ?>
                        </div>
                    </div>
<div class="col-md-12 col-sm-12 paadrr" style="margin-top:15px">
                      
                    
                        <div class="col-md-6 col-sm-12" style="text-align:left"> 
                     <input type="text" class="form-control fortrol" name="cc"
                                                 placeholder="CC" required="required">
                        </div>
                     
 
                        <div class="col-md-6 col-sm-12" style="text-align:left"> 
                     <input type="text" class="form-control fortrol" name="price"
                                                 placeholder="Price" onkeypress="return isNumberKey(event)" required="required">
                        </div>
                     
                    </div>
<div class="col-md-12 col-sm-12 paadrr" style="margin-top:15px">
                        <div class="col-md-12 col-sm-12" style="text-align:left"> 	
                     <input type="text" class="form-control fortrol" name="yearpurchase"
                                                 placeholder="Year Of Purchase" onkeypress="return isNumberKey(event)" required="required">
                        </div>
                     
                    </div>
					
<div class="col-md-12 col-sm-12 paadrr" style="margin-top:15px">
                        <div class="col-md-12 col-sm-12" style="text-align:left">
                     <textarea class="form-control fortrol" name="overview"
                                                 placeholder="Overview" required="required"></textarea>
                        </div>
                     
                    </div>
                </div>

                <div class="clear"></div>
                <div class="fields21 ">
                    <button class=" btn btn-default slido-btni22" type="submit" title="">Submit</button>
                </div>
                <div class="clear"></div>
                <?php echo form_close(); ?>
            </div>
            <div class="clear"></div>
        </div>
    </div>


    <?php
} else {

    ?>
    <div class="content-wrapper ">
        <div class="content-wrapper1">
            <div class="heading-wrap headOld">
                <h1>Sell Your Used Tractor</h1>
                <p>It's easy and free to list.</p>
            </div>
            <div class="form-wrapper">
                <span class="subtitle">Enter your mobile no.</span>

                <?php
                $att = 'id="form2"';
                echo form_open_multipart('OldTractor/AddTractorOtherinfoend', $att);
                ?>
                <input id="variantName" name="variantName" type="hidden">
                <div class="fields1">
                    <input data-gsf-name="" id="" name="mobNo" placeholder="Enter your mobile no" required="required"
                           onclick="createGAClickEventTrackingAdWords('Valuation', 'click', 'Year');"
                           class="gs_ta gs_ta_witharrow" autocomplete="off" type="text">
                </div>

                <div class="clear"></div>
                <div class="fields21">
                    <button class=" btn btn-default slido-btni11" type="submit" title="">Next</button>
                </div>
                <div class="clear"></div>
                <?php echo form_close(); ?>
            </div>
            <div class="clear"></div>
        </div>
    </div>


<?php } ?>


<div class="middle-wrap container-fluid" style="">
    <h2>Why trust us?</h2>
    <p>Tractor Junction is India's first tractor online showroom</p>
    <div class="spesification">
        <ul>
            <li class="col-md-4 col-sm-4 col-xs-12">
      <span class="aligned">
        <span class="leftsec"><i class="fa fa-bar-chart FontAddOls"></i></span>
         <span class="rightsec">
           <span class="heads"><?php
               echo countDealears('tech_specification', '');
               ?>+</span>
           <span class="titles">Tractors analysed</span>
         </span>
         </span>
            </li>
            <li class="col-md-4 col-sm-4 col-xs-12"><span class="aligned">
        <span class="leftsec"><i class="fa fa-database FontAddOls"></i></span>
         <span class="rightsec">
           <span class="heads"><?php
               echo countDealears('dealers', '');
               ?>+</span>
           <span class="titles">Tractor Dealers data</span>
         </span>
         </span>
            </li>
            <li class="last  col-md-4 col-sm-4 col-xs-12">
      <span class="aligned">
        <span class="leftsec"><i class="fa fa-exclamation FontAddOls"></i></span>
         <span class="rightsec">
           <span class="heads"><?php
               echo countDealears('old_tractor', '');
               ?>+</span>
           <span class="titles">Tractor Request</span>
         </span>
         </span>
            </li>
        </ul>
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