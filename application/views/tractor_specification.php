<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
?>
<?php
foreach ($result as $key => $value) {
    foreach (SelectQuery('name', 'hp', 'id', $value->hp) as $ke => $val) $HP = ($val->name);
    foreach (SelectQuery('name', 'brand', 'id', $value->brand) as $raa) $brand_name = ucfirst(($raa->name));
}
?>
    <div
            class="banner" style="background:rgba(204, 0, 1, 0.7) none repeat scroll 0% 0%;height:105px;">
        <div class="container">
            <div class="col-sm-12 col-md-12" style="padding:15px 0px;">
                <ul type="none" style="color:#fff">
                    <li style="float:left;padding-right:5px;"><i class="fa fa-home"
                                                                 style="font-size:16px;padding-right:5px;"></i><a
                                style="color:white;" href="<?php echo $root; ?>">Home</a></li>
                    <li style="float:left;padding-right:5px;">/</li>
                    <li style="float:left;padding-right:5px;">Tractor Specifications</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container single-page-margin-top paddingZ"
         style="padding: 0px 15px;margin-top:-55px;background:transparent;padding: 0px !important;">
      <div class="col-sm-12 col-md-12 col-xs-12 paddingZ" style="padding-bottom: 10px;">
	              <div class="col-sm-12 col-md-3 col-xs-12 tra_sing Jhon_dheerMob">
	              <?php echo footeradd(); ?>
	              <!--
                <div class="col-sm-12 col-md-12 col-xs-12 TachSpecADD"
                     style="">
 
<a href="<?php echo jhon_dheerAdLink('59','john-deere','tractor_specifications'); ?>">
	<?php 

if($HP <= '37'){
	?>
	<img class="img-responsive Jhon_dheerMob" src="<?php echo $root; ?>web_root/jhon_dheer/0_37_hp_M.jpg" alt="Jhon Dheer Tractor | Tractorjunction" title="Jhon Dheer Tractor | Tractorjunction">
	<?php 
}else if($HP >= '38' && $HP < '40'){
	?>
	<img class="img-responsive Jhon_dheerMob" src="<?php echo $root; ?>web_root/jhon_dheer/38_40_hp_M.jpg" alt="Jhon Dheer Tractor | Tractorjunction" title="Jhon Dheer Tractor | Tractorjunction">
		<?php 
}else if($HP >= '41' && $HP < '44'){
	?>
	<img class="img-responsive Jhon_dheerMob" src="<?php echo $root; ?>web_root/jhon_dheer/41_44_hp_M.jpg" alt="Jhon Dheer Tractor | Tractorjunction" title="Jhon Dheer Tractor | Tractorjunction">
		<?php 
}else if($HP >= '44'){
	?>
	<img class="img-responsive Jhon_dheerMob" src="<?php echo $root; ?>web_root/jhon_dheer/45_hp_M.jpg" alt="Jhon Dheer Tractor | Tractorjunction" title="Jhon Dheer Tractor | Tractorjunction">
		<?php 
}

?>
	
	
</a>
               
			   </div>

-->

            </div>
            <div class="col-sm-9 col-md-9 col-xs-12 ipm">
                <div class="box-wrapper">
                    <div class="box1" style="padding:30px;">
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-xs-12">
                                <a class="example-image-link"
                                   href="<?php echo $root . "upload/" ?><?php echo $value->image; ?>"
                                   alt="<?php echo $brand_name; ?> <?php echo $value->model_name; ?> tractor"
                                   data-lightbox="example-set">
                                    <img style="    height: 243px;width: 100%;border: 1px solid #DB4C4D;"
                                         class="example-image img-responsive"
                                         src="<?php echo $root . "upload/" ?><?php echo $value->image; ?>"
                                         alt="<?php echo $brand_name; ?> <?php echo $value->model_name; ?> tractor"/></a>

                            </div>
                            <div class="col-sm-6 col-md-6 col-xs-12">

                                <ul class="singleIUL" type="none">
                                    <li class=""><h1 class="font-upcoming singleBrand">
                                            <?php echo $brand_name; ?> Tractor
                                        </h1>
                                    </li>
                                    <li>
                                        <h4 style="color:#cc0001;font-size:1.4em;"><?php echo ucfirst($value->model_name); ?></h4>
                                    </li>
               <li class="GetOnRoadPriceBTNew">
                                                  <button data-toggle="modal" data-target="#OnRoadPriceModel" id="" type="button" style="margin: auto;
float: none;"
                        class="btn btn-info btn-lg singleP_compare singlePgaeBt">
                    <i class="fa fa-road" style=""></i> Get On Road Price
                </button>
  </li>
                                </ul>
                                <div class="dotted-border"></div>
                                <ul style="padding:0px 15px;margin-top:24px" type="none">

                                    <?php if ($value->cylinder != "") { ?>
                                        <li><h4 style="font-size:1.1em;"><span
                                                        style="font-weight:bold;">No. Of Cylinder</span> : <?php
                                                echo $value->cylinder;
                                                ?></h4></li>
                                    <?php } ?>
								<?php if ($value->hp != "") { ?>
                                        <li><h4 style="font-size:1.1em;"><span
                                                        style="font-weight:bold;">Horsepower</span>
                                                : <?php echo $HP . " HP"; ?></h4></li>
                                    <?php } ?>
                                    <?php if ($value->capacity != "") { ?>
                                        <li><h4 style="font-size:1.1em;"><span style="font-weight:bold;">Engine</span>
                                                : <?php
                                                echo $value->capacity . " CC";
                                                ?></h4></li>
                                    <?php } ?>
                                    <?php if ($value->transmission_gear_box != "") { ?>
                                        <li><h4 style="font-size:1.1em;"><span style="font-weight:bold;">Gear Box</span>
                                                : <?php
                                                echo $value->transmission_gear_box;
                                                ?></h4></li>
                                    <?php } ?>

                                    <?php if ($value->breaks != "") { ?>
                                        <li><h4 style="font-size:1.1em;"><span
                                                        style="font-weight:bold;">Break</span> : <?php
                                                echo ucfirst($value->breaks);
                                                ?></h4></li>
                                    <?php } ?>
                                    <?php if ($value->warranty != "") { ?>
                                        <li><h4 style="font-size:1.1em;"><span style="font-weight:bold;">Warranty</span>
                                                : <?php
                                                echo ucwords(strtolower($value->warranty . " Yr"));
                                                ?></h4></li>
                                    <?php } ?>







                                </ul>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-md-3 col-xs-12 tra_sing singleAdv">
                <div class="col-sm-12 col-md-12 col-xs-12 TachSpecADD"
                     style="">
                     <!--
 
<a href="<?php echo jhon_dheerAdLink('59','john-deere','tractor_specifications'); ?>">
	<?php 

if($HP <= '37'){
	?>
	<img class="img-responsive Jhon_dheerDesk" src="<?php echo $root; ?>web_root/jhon_dheer/0_37_hp_D.jpg" alt="Jhon Dheer Tractor | Tractorjunction" title="Jhon Dheer Tractor | Tractorjunction">
	<?php 
}else if($HP >= '38' && $HP < '40'){
	?>
	<img class="img-responsive Jhon_dheerDesk" src="<?php echo $root; ?>web_root/jhon_dheer/38_40_hp_D.jpg" alt="Jhon Dheer Tractor | Tractorjunction" title="Jhon Dheer Tractor | Tractorjunction">
		<?php 
}else if($HP >= '41' && $HP < '44'){
	?>
	<img class="img-responsive Jhon_dheerDesk" src="<?php echo $root; ?>web_root/jhon_dheer/41_44_hp_D.jpg" alt="Jhon Dheer Tractor | Tractorjunction" title="Jhon Dheer Tractor | Tractorjunction">
		<?php 
}else if($HP >= '44'){
	?>
	<img class="img-responsive Jhon_dheerDesk" src="<?php echo $root; ?>web_root/jhon_dheer/45_hp_D.jpg" alt="Jhon Dheer Tractor | Tractorjunction" title="Jhon Dheer Tractor | Tractorjunction">
		<?php 
}

?>
	
	
</a>
-->
 <?php echo newsFront(); ?>
               
			   </div>
            </div>
        </div>
		 <div class="container">
            <div class="col-md-12 col-sm-12 col-xs-12 compareDemoBox">
                <a href="<?php echo $root; ?>compare-tractors">
                    <button type="button" style="" class="btn btn-info btn-lg singleP_compare singlePgaeBt">
                        <i class="fa fa-balance-scale" style=""></i> Compare
                    </button>
                </a>

                <button type="button" data-toggle="modal" data-target="#DemoRequestModel"
                        class="btn btn-info btn-lg singleP_compare singlePgaeBt">
                    <i class="fa fa-user-secret" style=""></i> Demo Request
                </button>

                <?php

                OnRoadModel($brand_name, $value->model_name, 'Demo Request', $value->brand, $value->id, 'demoReq', 'DemoRequestModel'); ?>

                <button data-toggle="modal" data-target="#OnRoadPriceModel" id="GetOnRoadPriceBT" type="button" style=""
                        class="btn btn-info btn-lg singleP_compare singlePgaeBt">
                    <i class="fa fa-road" style=""></i> Get On Road Price
                </button>

                <?php

                OnRoadModel($brand_name, $value->model_name, 'On Road Price', $value->brand, $value->id, 'onroad', 'OnRoadPriceModel'); ?>
            </div>
        </div>


    <div class="container">
        <div class="col-md-12 col-sm-12" style="margin-top:15px">
            <h4 style="color:#148f1a;font-size: 20px;margin-bottom: -18px;" class="font-upcoming">
                <a style="color: #148F1A"
                   href="<?php echo $root; ?>product/<?php echo $value->id; ?>/<?php echo newslugend($brand_name) . "-tractor"; ?>-<?php echo shweta_nameslug($value->model_name); ?>"
                   class="">
                    <?php echo $title; ?>
                </a>
            </h4>
            <div class="border">
                <div class="border-inner"></div>
            </div>
            <div>


                <div class="panel-group" id="accordion1">
                    <div class="panel panel-default">
                        <button type="button" class="btn btn-info compare_head " data-toggle="collapse"
                                data-parent="#accordion1" href="#collapse1">Engine
                        </button>
                        <div id="collapse1" class="panel-collapse collapse in">
                            <table class="table table-striped" style="border-top: 3px solid #DD4445;">
                                <tbody>
                                <?php if ($value->cylinder != "") { ?>
                                    <tr>
                                        <th class="widthH">No. Of Cylinder</th>
                                        <td class="widthH">
                                            <?php
                                            echo $value->cylinder;
                                            ?></td>
                                    </tr>
                                <?php } ?>
                                <?php if ($value->hp != "") { ?>
                                    <tr>
                                        <th>HP Category</th>
                                        <td><?php
                                            foreach (shweta_select('name', 'hp', 'id', $value->hp) as $raa) echo $raa->name . " HP";
                                            ?></td>
                                    </tr>
                                <?php } ?>
                                <?php if ($value->capacity != "") { ?>
                                    <tr>
                                        <th>Capacity CC</th>
                                        <td><?php
                                            echo $value->capacity . " CC";
                                            ?></td>
                                    </tr>
                                <?php } ?>
                                <?php if ($value->engine_rated_rpm != "") { ?>
                                    <tr>
                                        <th style="text-transform: uppercase;">Engine Rated RPM</th>
                                        <td><?php
                                            echo $value->engine_rated_rpm;
                                            ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <?php if ($value->cooling != "") { ?>
                                    <tr>
                                        <th>Cooling</th>
                                        <td><?php
                                            echo ucfirst($value->cooling);
                                            ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <?php if ($value->engine_air_filter != "") { ?>
                                    <tr>
                                        <th>Air Filter</th>
                                        <td><?php
                                            echo ucfirst($value->engine_air_filter);
                                            ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <button type="button" class="btn btn-info compare_head " data-toggle="collapse"
                                data-parent="#accordion1" href="#collapse2">Transmission
                        </button>
                        <div id="collapse2" class="panel-collapse collapse in">
                            <table class="table table-striped" style="border-top: 3px solid #DD4445;">
                                <tbody>
                                <?php if ($value->transmission_type != "") { ?>
                                    <tr>
                                        <th class="widthH">Type</th>
                                        <td class="widthH"><?php
                                            echo ucfirst($value->transmission_type);
                                            ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <?php if ($value->transmission_clutch != "") { ?>
                                    <tr>
                                        <th class="widthH">Clutch</th>
                                        <td class="widthH"><?php
                                            echo ucfirst($value->transmission_clutch);
                                            ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <?php if ($value->transmission_gear_box != "") { ?>
                                    <tr>
                                        <th>Gear Box</th>
                                        <td><?php
                                            echo ucfirst($value->transmission_gear_box);
                                            ?></td>
                                    </tr>
                                <?php } ?>
                                <?php if ($value->battery_info != "") { ?>
                                    <tr>
                                        <th>Battery</th>
                                        <td><?php
                                            echo ucfirst($value->battery_info);
                                            ?></td>
                                    </tr>
                                <?php } ?>
                                <?php if ($value->alternator_info != "") { ?>
                                    <tr>
                                        <th>Alternator</th>
                                        <td><?php
                                            echo ucfirst($value->alternator_info);
                                            ?></td>
                                    </tr>
                                <?php } ?>
                                <?php if ($value->speed_forward != "") { ?>
                                    <tr>
                                        <th>Forward Speed</th>
                                        <td><?php
                                            echo $value->speed_forward . " kmph";
                                            ?></td>
                                    </tr>
                                <?php } ?>
                                <?php if ($value->speed_reverse != "") { ?>
                                    <tr>
                                        <th>Reverse speed</th>
                                        <td><?php
                                            echo $value->speed_reverse . " kmph";
                                            ?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <button type="button" class="btn btn-info compare_head " data-toggle="collapse"
                                data-parent="#accordion1" href="#collapse3">Brakes
                        </button>
                        <div id="collapse3" class="panel-collapse collapse in">
                            <table class="table table-striped" style="border-top: 3px solid #DD4445;">
                                <tbody>
                                <?php if ($value->breaks != "") { ?>
                                    <tr>
                                        <th class="widthH">Brake</th>
                                        <td class="widthH"><?php
                                            echo ucfirst($value->breaks);
                                            ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <button type="button" class="btn btn-info compare_head " data-toggle="collapse"
                                data-parent="#accordion1" href="#collapse4">Steering
                        </button>
                        <div id="collapse4" class="panel-collapse collapse in">
                            <table class="table table-striped" style="border-top: 3px solid #DD4445;">
                                <tbody>
                                <?php if ($value->steering_type != "") { ?>
                                    <tr>
                                        <th class="widthH">Type</th>
                                        <td class="widthH"><?php
                                            echo ucfirst($value->steering_type);
                                            ?></td>
                                    </tr>
                                <?php } ?>
                                <?php if ($value->steering_column != "") { ?>
                                    <tr>
                                        <th class="widthH">Steering Column</th>
                                        <td class="widthH" style="text-transform: capitalize;"><?php
                                            echo $value->steering_column;
                                            ?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <button type="button" class="btn btn-info compare_head " data-toggle="collapse"
                                data-parent="#accordion1" href="#collapse5">Power Take Off
                        </button>
                        <div id="collapse5" class="panel-collapse collapse in">
                            <table class="table table-striped" style="border-top: 3px solid #DD4445;">
                                <tbody>
                                <?php if ($value->powertakeoff_type != "") { ?>
                                    <tr>
                                        <th class="widthH">Type</th>
                                        <td class="widthH"><?php
                                            echo ucfirst($value->powertakeoff_type);
                                            ?></td>
                                    </tr>
                                <?php } ?>
                                <?php if ($value->powertakeoff_rpm != "") { ?>
                                    <tr>
                                        <th class="widthH">RPM</th>
                                        <td class="widthH"><?php
                                            echo $value->powertakeoff_rpm;
                                            ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <button type="button" class="btn btn-info compare_head " data-toggle="collapse"
                                data-parent="#accordion1" href="#collapse6">Fuel Tank
                        </button>
                        <div id="collapse6" class="panel-collapse collapse in">
                            <table class="table table-striped" style="border-top: 3px solid #DD4445;">
                                <tbody>
                                <?php if ($value->fuel_tank_capacity != "") { ?>
                                    <tr>
                                        <th class="widthH">Capacity</th>
                                        <td class="widthH"><?php
                                            echo $value->fuel_tank_capacity . " lit";
                                            ?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="panel-group" id="accordion2">
                    <div class="panel panel-default">
                        <button type="button" class="btn btn-info compare_head " data-toggle="collapse"
                                data-parent="#accordion2" href="#1collapse">Dimensions And Weight Of Tractor
                        </button>
                        <div id="1collapse" class="panel-collapse collapse in">
                            <table class="table table-striped" style="border-top: 3px solid #DD4445;">
                                <tbody>
                                <?php if ($value->total_weight != "") { ?>
                                    <tr>
                                        <th class="widthH">Total Weight</th>
                                        <td class="widthH"><?php
                                            echo $value->total_weight . " KG";
                                            ?></td>
                                    </tr>
                                <?php } ?>
                                <?php if ($value->wheel_base != "") { ?>
                                    <tr>
                                        <th class="widthH">Wheel Base</th>
                                        <td class="widthH"><?php
                                            echo $value->wheel_base . " MM";
                                            ?></td>
                                    </tr>
                                <?php } ?>
                                <?php if ($value->overall_length != "") { ?>
                                    <tr>
                                        <th class="widthH">Overall Length</th>
                                        <td class="widthH"><?php
                                            echo $value->overall_length . " MM";
                                            ?></td>
                                    </tr>
                                <?php } ?>
                                <?php if ($value->overall_width != "") { ?>
                                    <tr>
                                        <th class="widthH">Overall Width</th>
                                        <td class="widthH"><?php
                                            echo $value->overall_width . " MM";
                                            ?></td>
                                    </tr>
                                <?php } ?>
                                <?php if ($value->ground_clearance != "") { ?>
                                    <tr>
                                        <th class="widthH">Ground Clearance</th>
                                        <td class="widthH"><?php
                                            echo $value->ground_clearance . " MM";
                                            ?></td>
                                    </tr>
                                <?php } ?>
                                <?php if ($value->turningradius_with_breaks != "") { ?>
                                    <tr>
                                        <th class="widthH">Turning Radius With Brakes</th>
                                        <td class="widthH"><?php
                                            echo $value->turningradius_with_breaks . " MM";
                                            ?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <button type="button" class="btn btn-info compare_head " data-toggle="collapse"
                                data-parent="#accordion2" href="#2collapse">Hydraulics
                        </button>
                        <div id="2collapse" class="panel-collapse collapse in">
                            <table class="table table-striped" style="border-top: 3px solid #DD4445;">
                                <tbody>
                                <?php if ($value->hydraulic_lifting_capacity != "") { ?>
                                    <tr>
                                        <th class="widthH">Lifting Capacity</th>
                                        <td class="widthH"><?php
                                            echo $value->hydraulic_lifting_capacity;
                                            ?></td>
                                    </tr>
                                <?php } ?>
                                <?php if ($value->hydraulic_point_linkage != "") { ?>
                                    <tr>
                                        <th>3 point Linkage</th>
                                        <td><?php
                                            echo $value->hydraulic_point_linkage;
                                            ?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <button type="button" class="btn btn-info compare_head " data-toggle="collapse"
                                data-parent="#accordion2" href="#3collapse">Wheels And Tyres
                        </button>
                        <div id="3collapse" class="panel-collapse collapse in">
                            <table class="table table-striped" style="border-top: 3px solid #DD4445;">
                                <tbody>
                                <?php if ($value->wheel_drive != "") { ?>
                                    <tr>
                                        <th class="widthH">Wheel drive</th>
                                        <td class="widthH"><?php
                                            echo $value->wheel_drive;
                                            ?></td>
                                    </tr>
                                <?php } ?>
                                <?php if ($value->wheels_tyre_front != "") { ?>
                                    <tr>
                                        <th class="widthH">Front</th>
                                        <td class="widthH"><?php
                                            echo $value->wheels_tyre_front;
                                            ?></td>
                                    </tr>
                                <?php } ?>
                                <?php if ($value->wheels_tyre_rear != "") { ?>
                                    <tr>
                                        <th class="widthH">Rear</th>
                                        <td class="widthH"><?php
                                            echo $value->wheels_tyre_rear;
                                            ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <button type="button" class="btn btn-info compare_head " data-toggle="collapse"
                                data-parent="#accordion2" href="#4collapse">Accessories
                        </button>
                        <div id="4collapse" class="panel-collapse collapse in">
                            <table class="table table-striped" style="border-top: 3px solid #DD4445;">
                                <tbody>
                                <?php if ($value->accessories != "") { ?>
                                    <tr>
                                        <th class="widthH">Accessories</th>
                                        <td class="widthH"><?php
                                            $aa = array();
                                            $v = rtrim($value->accessories, '$$');
                                            $aa[] = explode('$$', $v);
                                            $rr = "";
                                            foreach ($aa as $k) {
                                                foreach ($k as $k1) {
                                                    $rr .= $k1 . " , ";
                                                }
                                                echo rtrim($rr, ' , ');
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <button type="button" class="btn btn-info compare_head " data-toggle="collapse"
                                data-parent="#accordion2" href="#5collapse">Options
                        </button>
                        <div id="5collapse" class="panel-collapse collapse in">
                            <?php if ($value->options != "") { ?>
                                <table class="table table-striped" style="border-top: 3px solid #DD4445;">
                                    <tbody>
                                    <tr>
                                        <th class="widthH">Options</th>
                                        <td class="widthH"><?php
                                            $aa1 = array();
                                            $v1 = rtrim($value->options, '$$');
                                            $aa1[] = explode('$$', $v1);
                                            $rr1 = "";
                                            foreach ($aa1 as $k2) {
                                                foreach ($k2 as $k12) {
                                                    $rr1 .= $k12 . " , ";
                                                }
                                                echo rtrim($rr1, ' , ');
                                            }
                                            ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <button type="button" class="btn btn-info compare_head " data-toggle="collapse"
                                data-parent="#accordion2" href="#6collapse">Additional-Features
                        </button>
                        <div id="6collapse" class="panel-collapse collapse in">
                            <?php if ($value->additional_features != "") { ?>

                                <table class="table table-striped" style="border-top: 3px solid #DD4445;">
                                    <tbody>


                                    <tr>
                                        <th class="widthH">Features</th>
                                        <td class="widthH"><?php
                                            $aa12 = array();

                                            $v12 = rtrim($value->additional_features, '$$');
                                            $aa12[] = explode('$$', $v12);
                                            $rr12 = "";
                                            foreach ($aa12 as $k21) {
                                                foreach ($k21 as $k121) {
                                                    $rr12 .= $k121 . " , ";
                                                }
                                                echo rtrim($rr12, ' , ');
                                            }
                                            ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <button type="button" class="btn btn-info compare_head " data-toggle="collapse"
                                data-parent="#accordion2" href="#7collapse">Warranty
                        </button>
                        <div id="7collapse" class="panel-collapse collapse in">
                            <?php if ($value->warranty != "") { ?>
                                <table class="table table-striped" style="border-top: 3px solid #DD4445;">
                                    <tbody>
                                    <tr>
                                        <th class="widthH">Warranty</th>
                                        <td class="widthH"><?php
                                            echo $value->warranty . " yr";
                                            ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <button type="button" class="btn btn-info compare_head " data-toggle="collapse"
                                data-parent="#accordion2" href="#8collapse">Status
                        </button>
                        <div id="8collapse" class="panel-collapse collapse in">
                            <table class="table table-striped" style="border-top: 3px solid #DD4445;">
                                <tbody>
                                <?php if ($value->status != "") { ?>
                                    <tr>
                                        <th class="widthH">Status</th>
                                        <td class="widthH">
                                            <?php
                                            if ($value->status == "coming_soon") {
                                                echo "coming soon";
                                            } else {
                                                echo $value->status;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <?php if ($value->priceShow != 0) { ?>
                                    <?php if ($value->price != "") { ?>
                                        <tr>
                                            <th class="widthH">Price</th>
                                            <td class="widthH"><?php
                                                echo $value->price . " lac";
                                                ?>
                                            </td>
                                        </tr>
                                    <?php }
                                } ?>
                                <?php if ($value->ptohp != "") { ?>
                                    <tr>
                                        <th class="widthH">PTO HP</th>
                                        <td class="widthH"><?php
                                            echo $value->ptohp;
                                            ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <?php if ($value->fuel_pump != "") { ?>
                                    <tr>
                                        <th class="widthH">Fuel Pump</th>
                                        <td class="widthH"><?php
                                            echo $value->fuel_pump;
                                            ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
    </div>


<?php echo quickLinksHTML(); ?>