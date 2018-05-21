<?php
?>
<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
?>
<div class="container-fluid paddingZ">
    <div class="container" style="margin-top: 72px;">
        <div class="col-sm-12 col-md-12 col-xs-12" style="margin:50px 0px">
            <div class="col-sm-12 col-md-12 col-xs-12 ipm marDearSear">
                <div class="col-sm-6 col-md-6 col-xs-12 ipm " style="">
					<span class="font_dealar"
                          style="font-size: 38px;color: #000000;font-family: 'myriad_prosemibold' !important;font-weight: bold;">
						FIND A TRACTOR <br><span class="font_dealar1" style="font-size:43px;color:#DC3343">
						DEALER NEAR YOU.</span>
					</span>
                    <h3 style="margin-top:-19px;margin-bottom:36px;font-size: 15px;line-height: 22px;">
                        <br>
                        Where ever you are, you'll always find our dealership or service network. Find the one that's
                        nearest to you.
                    </h3>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12 ipm" style="height:180px;margin-bottom:56px;">
				<?php 
									$mahindra_ad_show=MahindraAd();
if($mahindra_ad_show=='1'){
				?>
<a target="_blank" href="<?php echo MahindraAdLink('55','mahindra-tractors','find_dealer'); ?>">
                    <img src="<?php echo $root; ?>web_root/mahindra/Single_Tractor_Mobile.jpg" style="height: 206px;width: 103%;">
                </a>
<?php }else{ ?>
          <img src="http://www.rosstractor.com/Images/banner_used.jpg" style="height: 206px;width: 103%;">
<?php }?>
				</div>
            </div>
            <div class="col-sm-12 col-md-12 col-xs-12 paddingZ margin_news"
                 style="margin: 0px;box-shadow: 0px 0px 9px rgba(0, 0, 0, 0.17);margin: 0px 15px;border-radius: 5px;margin: 0px;">
                <h4 class="compare_head"
                    style="font-size:1.3em;margin-top: 0px;margin-bottom: 30px;border-bottom: 3px solid #DD4445;">
                    <i class="fa fa-location-arrow" style="padding-right:6px;"></i>Locate Your Tractor Dealer - By City
                </h4>
                <div class="col-sm-12 col-md-12 col-xs-12" style="padding-bottom:30px;">
                    <?php
                    $att = 'style="margin:0px"';
                    echo form_open('find-tractor-dealers', $att); ?>
                    <div class="col-sm-3 col-md-3 col-xs-12 LocatDiv">
                        <?php
						$condBrand = "type LIKE '%tractor%'";
                        $query3 = Select_OrderBy_brand('*', 'brand', $condBrand, 'name', 'ASC');
                        $val3[''] = 'Please Select brand';
                        foreach ($query3 as $k3 => $r3) {
                            $val3[$r3->id] = ucfirst($r3->name);
                        }
                        $ab = 'class="form-control" required="required"';
                        echo form_dropdown('brand', $val3, '', $ab);
                        ?>
                    </div>
                    <div class="col-sm-5 col-md-7 col-xs-12">
					 
                        <?php echo form_input(array('type' => 'text', 'id' => 'search_box', 'autocomplete' => 'off', 'name' => 'pincode', 'placeholder' => 'City / Pin code', 'class' => 'form-control', 'style' => 'height:37px;border-radius:0px')); ?>
                    </div>
                    <div class="col-sm-2 col-md-2 col-xs-12 mar_res" style="text-align:center;">
                        <?php echo form_input(array('type' => 'submit', 'id' => 'submit', 'class' => ' btn btn-default slido-btni', 'style' => '    padding: 10px 26px!important;', 'value' => 'Find Your Dealer')); ?>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col-sm-12 col-md-12 col-xs-12" style="margin-bottom:50px">
            <div class="col-sm-12 col-md-12 col-xs-12 paddingZ"
                 style="box-shadow: 0px 0px 9px rgba(0, 0, 0, 0.17);border-radius: 5px;">
                <div class="col-sm-12 col-md-12 col-xs-12 ipm">
                    
					<h2 style="color:#148f1a;font-size:20px;margin-bottom:-18px" class="font-upcoming newsRes">Dealers In
 <span style="color:#cc0001"> 					<?php if (isset($search)) {
                                echo $search;
                            } else {
                                echo "India";
                            }
                            ?>
</span></h2>
<div class="border">
<div class="border-inner"></div>
</div>

					
                    <?php
                    if (isset($data)) {
                        if (!empty($data)) {
                            ?>
                            <div class="col-sm-12 col-md-12 col-xs-12 paddingZ ipm"
                                 style="height: 519px;overflow-y: scroll;padding: 10px;">
                                <?php
                                foreach ($data as $key => $value1) {
                                    ?>
                                    <div class="col-sm-12 col-md-12 col-xs-12  pad_left" style="margin-bottom: 15px;">
                                        <div class="col-sm-12 col-md-12 col-xs-12 ipm paddingZ padding_0_in_small">
                                            <div class="box-wrapper ipm">
                                                <div class="box ipm">
                                                    <div class="row ipm">
                                                        <div class="col-sm-12 col-md-12 col-xs-12 ipm padding_0_in_small ipm"
                                                             style="padding: 10px 20px;">
                                                            <div class="col-sm-3 col-md-3 col-xs-6">
                                                                <ul type="none" class="paddingZ"
                                                                    style="line-height: 25px;margin-bottom: 0px;">
                                                                    <li>Name :</li>
                                                                    <li>Contact No. :</li>
                                                                    <li>Authorization:</li>
                                                                    <li>Address :</li>
                                                                    <li>State :</li>
                                                                    <li>City :</li>
                                                                    <li>Pin Code :</li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-sm-9 col-md-9 col-xs-6">
                                                                <ul type="none" class="paddingZ"
                                                                    style="line-height: 25px;margin-bottom: 0px;">
                                                                    <li><?php
                                                                        if ($value1->name_de != "")
                                                                            echo ucfirst($value1->name_de);
                                                                        else
                                                                            echo "Not Filled";
                                                                        ?></li>
                                                                    <li><?php
                                                                        if ($value1->contact != "")
                                                                            echo $value1->contact;
                                                                        else
                                                                            echo "Not Filled";
                                                                        ?></li>
                                                                    <li><?php
                                                                        if ($value1->authorize != 0)
                                                                            foreach (shweta_select('name', 'brand', 'id', $value1->authorize) as $raa1) echo $raa1->name;
                                                                        else
                                                                            echo "Not Filled";
                                                                        ?></li>
                                                                    <li><?php
                                                                        if ($value1->address != "")
                                                                            echo $value1->address;
                                                                        else
                                                                            echo "Not Filled";
                                                                        ?></li>
                                                                    <li><?php
                                                                        if ($value1->state != 0)
                                                                            foreach (shweta_select('name', 'states', 'id', $value1->state) as $raa) echo ucfirst($raa->name);
                                                                        else
                                                                            echo "Not Filled";
                                                                        ?></li>
                                                                    <li><?php
                                                                        if ($value1->city != 0)
                                                                            foreach (shweta_select('name', 'cities', 'id', $value1->city) as $raa) echo ucfirst($raa->name);
                                                                        else
                                                                            echo "Not Filled*";
                                                                        ?></li>
                                                                    <li><?php
                                                                        if ($value1->pin != "")
                                                                            echo $value1->pin;
                                                                        else
                                                                            echo "Not Filled";
                                                                        ?></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <?php
                        } else {
                            ?>
                            <h3 class="dealers">
                                No Dealers Found.
                            </h3>
                            <?php
                        }
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="col-md-12 col-sm-12">
            <div class="col-md-12 col-sm-12"
                 style="box-shadow: 0px 0px 9px rgba(0, 0, 0, 0.17);border-radius: 5px;margin-bottom:50px">
                <h2 style="margin:40px 0px 0px;font-size: 24px;color:#148f1a;">Tractor Dealers <span
                            style="color:#cc0001;">By State</span></h2>
                <div class="border">
                    <div class="border-inner"></div>
                </div>
                <div class="ol-md-12 col-sm-12">
                    <?php
                    $all_state = shweta_select('*', 'states', 'country_id', '101');
                    $count_state = array();
                    foreach ($all_state as $all_state => $all_stateValue) {
                        $count_state[$all_stateValue->id] = count(shweta_select('*', 'dealers', 'state', $all_stateValue->id));
                    }
                    array_filter($count_state);
                    arsort(($count_state));
                    $rr = 0;
                    foreach ($count_state as $find_dearKey => $find_dearValue) {
                        $rr++;
                        if ($rr == 7) {
                            break;
                        }
                        ?>
                        <div class="col-md-3 col-sm-3" style="margin-bottom:10px;">
                            <table class="table table-hover" style="border:1px solid #eee;">
                                <thead>
                                <tr style="background-color:#D63334;text-align:center;font-size:16px;color:white;font-weight:bold">
                                    <td><?php
                                        foreach (shweta_select('name', 'states', 'id', $find_dearKey) as $raa) echo ucfirst($raa->name);
                                        ?></td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td style="padding-right:10px!important">Mahindra Dealers<span
                                                style="float:right;background-color:#D63334;color:white;border-radius:50%;padding:5px">
						<?php
                        $cond = "authorize='55' and state='" . $find_dearKey . "'";
                        echo countDealears("dealers", $cond); ?>
						</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-right:10px!important"> Farmtrac Dealers
                                        <span style="float:right;background-color:#D63334;color:white;border-radius:50%;padding:5px">		<?php
                                            $cond = "authorize='75' and state='" . $find_dearKey . "'";
                                            echo countDealears("dealers", $cond); ?></span></td>
                                </tr>
                                <tr>
                                    <td style="padding-right:10px!important">Massey ferguson Dealers
                                        <span style="float:right;background-color:#D63334;color:white;border-radius:50%;padding:5px">		<?php
                                            $cond = "authorize='74' and state='" . $find_dearKey . "'";
                                            echo countDealears("dealers", $cond); ?></span></td>
                                </tr>
                                <tr>
                                    <td style="padding-right:10px!important">John deere Dealers
                                        <span style="float:right;background-color:#D63334;color:white;border-radius:50%;padding:5px">		<?php
                                            $cond = "authorize='59' and state='" . $find_dearKey . "'";
                                            echo countDealears("dealers", $cond); ?></span></td>
                                </tr>
                                <tr>
                                    <td style="padding-right:10px!important">Powertrac Dealers
                                        <span style="float:right;background-color:#D63334;color:white;border-radius:50%;padding:5px">		<?php
                                            $cond = "authorize='76' and state='" . $find_dearKey . "'";
                                            echo countDealears("dealers", $cond); ?></span></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    <?php }
                    $find_dearKey = '32';
                    ?>
                    <div class="col-md-3 col-sm-3" style="margin-bottom:10px;">
                        <table class="table table-hover" style="border:1px solid #eee;">
                            <thead>
                            <tr style="background-color:#D63334;text-align:center;font-size:16px;color:white;font-weight:bold">
                                <td><?php
                                    foreach (shweta_select('name', 'states', 'id', $find_dearKey) as $raa) echo ucfirst($raa->name);
                                    ?></td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td style="padding-right:10px!important">Mahindra Dealers<span
                                            style="float:right;background-color:#D63334;color:white;border-radius:50%;padding:5px">
							<?php
                            $cond = "authorize='55' and state='" . $find_dearKey . "'";
                            echo countDealears("dealers", $cond); ?>
							</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-right:10px!important"> Farmtrac Dealers
                                    <span style="float:right;background-color:#D63334;color:white;border-radius:50%;padding:5px">		<?php
                                        $cond = "authorize='75' and state='" . $find_dearKey . "'";
                                        echo countDealears("dealers", $cond); ?></span></td>
                            </tr>
                            <tr>
                                <td style="padding-right:10px!important">Massey ferguson Dealers
                                    <span style="float:right;background-color:#D63334;color:white;border-radius:50%;padding:5px">		<?php
                                        $cond = "authorize='74' and state='" . $find_dearKey . "'";
                                        echo countDealears("dealers", $cond); ?></span></td>
                            </tr>
                            <tr>
                                <td style="padding-right:10px!important">John deere Dealers
                                    <span style="float:right;background-color:#D63334;color:white;border-radius:50%;padding:5px">		<?php
                                        $cond = "authorize='59' and state='" . $find_dearKey . "'";
                                        echo countDealears("dealers", $cond); ?></span></td>
                            </tr>
                            <tr>
                                <td style="padding-right:10px!important">Powertrac Dealers
                                    <span style="float:right;background-color:#D63334;color:white;border-radius:50%;padding:5px">		<?php
                                        $cond = "authorize='76' and state='" . $find_dearKey . "'";
                                        echo countDealears("dealers", $cond); ?></span></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <?php
                    $find_dearKey = '13';
                    ?>
                    <div class="col-md-3 col-sm-3" style="margin-bottom:10px;">
                        <table class="table table-hover" style="border:1px solid #eee;">
                            <thead>
                            <tr style="background-color:#D63334;text-align:center;font-size:16px;color:white;font-weight:bold">
                                <td><?php
                                    foreach (shweta_select('name', 'states', 'id', $find_dearKey) as $raa) echo ucfirst($raa->name);
                                    ?></td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td style="padding-right:10px!important">Mahindra Dealers<span
                                            style="float:right;background-color:#D63334;color:white;border-radius:50%;padding:5px">
							<?php
                            $cond = "authorize='55' and state='" . $find_dearKey . "'";
                            echo countDealears("dealers", $cond); ?>
							</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-right:10px!important"> Farmtrac Dealers
                                    <span style="float:right;background-color:#D63334;color:white;border-radius:50%;padding:5px">		<?php
                                        $cond = "authorize='75' and state='" . $find_dearKey . "'";
                                        echo countDealears("dealers", $cond); ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-right:10px!important">Massey ferguson Dealers
                                    <span style="float:right;background-color:#D63334;color:white;border-radius:50%;padding:5px">		<?php
                                        $cond = "authorize='74' and state='" . $find_dearKey . "'";
                                        echo countDealears("dealers", $cond); ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-right:10px!important">John deere Dealers
                                    <span style="float:right;background-color:#D63334;color:white;border-radius:50%;padding:5px">		<?php
                                        $cond = "authorize='59' and state='" . $find_dearKey . "'";
                                        echo countDealears("dealers", $cond); ?></span></td>
                            </tr>
                            <tr>
                                <td style="padding-right:10px!important">Powertrac Dealers
                                    <span style="float:right;background-color:#D63334;color:white;border-radius:50%;padding:5px">		<?php
                                        $cond = "authorize='76' and state='" . $find_dearKey . "'";
                                        echo countDealears("dealers", $cond); ?></span></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo quickLinksHTML(); ?>
</div>
