<?php $root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
$brand_name = '';
$HP = '';

foreach ($result as $key => $value) {

    foreach (SelectQuery('name', 'hp', 'id', $value->hp) as $ke => $val) $HP = ($val->name);
    foreach (SelectQuery('name', 'brand', 'id', $value->brand) as $raa) $brand_name = ucfirst(($raa->name));
}
?>
<link rel="stylesheet" href="<?php echo $root; ?>web_root/front_web_root/lightbox.css">
<div class="container-fluid paddingZ font_a">
    <div class="banner" style="background:rgba(204, 0, 1, 0.7) none repeat scroll 0% 0%;height:105px;">
        <div class="container">
            <div class="col-sm-12 col-md-12 col-xs-12" style="padding:15px 0px;">
                <ul type="none" style="color:#fff">
                    <li style="float:left;padding-right:5px;"><i class="fa fa-home"
                                                                 style="font-size:16px;padding-right:5px;"></i><a href="<?php echo $root; ?>">Home</a>
                    </li>
                    <li style="float:left;padding-right:5px;">/</li>
                    <li style="float:left;padding-right:5px;">New Tractors</li>
                    <li style="float:left;padding-right:5px;">/</li>
                    <li style="float:left;padding-right:5px;">
                        <?php echo $brand_name; ?>
                        <?php echo ucfirst($value->model_name); ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="container single-page-margin-top paddingZ"
         style="padding: 0px 15px;margin-top:-55px;background:transparent;padding: 0px !important;">
        <div class="col-sm-12 col-md-12 col-xs-12 paddingZ" style="padding-bottom: 10px;">
        </div>
        </div>
    <div class="container single-page-margin-top paddingZ"
         style="padding: 0px 15px;margin-top:-55px;background:transparent;padding: 0px !important;">
         <?php 
                    $mahindra_ad_show=MahindraAd();
if($mahindra_ad_show=='1'){
         ?>
<div class="col-sm-12 col-md-12 col-xs-12 paddingZ singleTract_adMobile">
<a target="_blank" href="<?php echo MahindraAdLink('55','mahindra-tractors','single_tractor'); ?>">
    <img class="img-responsive" src="<?php echo $root; ?>web_root/mahindra/Single_Tractor_Mobile.jpg" alt="Mahindra Tractor | Tractorjunction" title="Mahindra Tractor | Tractorjunction">
</a>

       
</div>
<?php } ?>
    <div class="col-sm-12 col-md-12 col-xs-12 paddingZ" style="padding-bottom: 10px;">
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
                                     <?php if ($value->priceShow != "0" && $value->price !="") { ?>
                                        <li><h4 style="font-size:1.1em;"><span style="font-weight:bold;">Price</span>
                                                : &nbsp;<i class="fa fa-inr"></i> <?php
                                                echo (($value->price)); 
                                                ?> Lac*</h4></li>
                                    <?php } ?>







                                </ul>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            
            
            <?php 
            $mahindra_ad_show=MahindraAd();
if($mahindra_ad_show=='1'){
            ?>
            <div class="col-sm-3 col-md-3 col-xs-12 tra_sing singleAdv" style="padding-left: 0px;    padding-right: 0px;">
                <div class="col-sm-12 col-md-12 col-xs-12"
                     style="padding-right: 0;background:#fff;border:1px solid #e9e9e9;border-radius:3px;padding-bottom:20px;height: 325px;padding-left: 0;">
        <p class="advertisementLabel">Advertisement</p>
        

<?php 

if($HP <= '30'){
    ?>
    <a target="_blank" href="<?php echo MahindraAdLinkNew('55','mahindra-tractors','single_tractor','30'); ?>">
    <img style="margin-top: 33px;" class="img-responsive" src="<?php echo $root; ?>web_root/mahindra/Single_Tractor_upto_30_HP.gif" alt="Mahindra Tractor | Tractorjunction" title="Mahindra Tractor | Tractorjunction">
</a>    <?php 
}else if($HP >= '31' && $HP < '44'){
    ?>
    <a target="_blank" href="<?php echo MahindraAdLinkNew('55','mahindra-tractors','single_tractor','45'); ?>">
    <img style="margin-top: 33px;" class="img-responsive" src="<?php echo $root; ?>web_root/mahindra/Single_Tractor_30_45_HP.gif" alt="Mahindra Tractor | Tractorjunction" title="Mahindra Tractor | Tractorjunction">
    </a><?php 
}else if($HP >= '45' && $HP < '49'){
    ?>
    <a target="_blank" href="<?php echo MahindraAdLinkNew('55','mahindra-tractors','single_tractor','50'); ?>">
    <img style="margin-top: 33px;" class="img-responsive" src="<?php echo $root; ?>web_root/mahindra/Single_Tractor_45_49_HP.jpg" alt="Mahindra Tractor | Tractorjunction" title="Mahindra Tractor | Tractorjunction">
    </a><?php 
}else if($HP >= '49'){
    ?>
    <a target="_blank" href="<?php echo MahindraAdLinkNew('55','mahindra-tractors','single_tractor','50'); ?>">
    <img style="margin-top: 33px;" class="img-responsive" src="<?php echo $root; ?>web_root/mahindra/Single_Tractor_49_above.jpg" alt="Mahindra Tractor | Tractorjunction" title="Mahindra Tractor | Tractorjunction">
    </a><?php 
}

?>

               
               </div>
            </div>
<?php }else{ ?>

            <div class="col-sm-3 col-md-3 col-xs-12 tra_sing singleAdv">
                <div class="col-sm-12 col-md-12 col-xs-12"
                     style="background:#fff;border:1px solid #e9e9e9;border-radius:3px;padding-bottom:20px;height: 325px;padding-left: 0;">
        <p class="advertisementLabel">Advertisement</p>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- single page ad -->
<ins class="adsbygoogle"
     style="display:inline-block;width:260px;height:300px"
     data-ad-client="ca-pub-4027828216747405"
     data-ad-slot="6561249177"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
               
               </div>
            </div>
        
<?php } ?>
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

        <div class="col-sm-12 col-xs-12 adsDiv " style="margin-bottom: 20px;">
            <p class="advertisementLabel">Advertisement</p>
            <a href="<?php echo powertracAdLink('76','powertrac-tractors','single_tractor'); ?>">
                <img src="<?php echo $root; ?>web_root/advertisments/powertech_tractor_add3.gif" class="img-responsive">
            </a>
        </div>


        <div class="container paddingZ" style="margin-bottom: 20px;">
            <div class="col-sm-12 col-md-9 paddingZ" style="padding-bottom: 10px;">


                <div class="col-sm-12 col-md-12 col-xs-12 ipm" style="">
                    <ul class="nav nav-tabs single-nav" id="maincontent" role="tablist">
                        <li class="active"><a href="#overview" role="tab"  style="text-transform: uppercase;" data-toggle="tab" class="hvr-bubble-bottom">OVERVIEW</a>
                        </li>
                        <li><a href="#details" role="tab" data-toggle="tab" style="text-transform: uppercase;" class="hvr-bubble-bottom">FEATURES &
                                SPECIFICATION</a></li>
                        <li><a href="#Dealear" role="tab" data-toggle="tab" style="text-transform: uppercase;"  class="hvr-bubble-bottom">
                                DEALER TRACTOR</a></li>
                        <li class="PopularTTabSngle"><a href="#popular_tab" role="tab" data-toggle="tab"  style="text-transform: uppercase;" class="hvr-bubble-bottom">
                                POPULAR TRACTOR</a></li>
                     
                        <li class="PopularTTabSngle"><a href="#Latest_tab" role="tab" data-toggle="tab" style="text-transform: uppercase;"  class="hvr-bubble-bottom">
                                LATEST TRACTOR</a></li>
 
                    </ul><!--/.nav-tabs.content-tabs -->
                    <div class="tab-content ">

                        <div class="tab-pane fade padding_singletractor" id="popular_tab"
                             style="padding: 36px 20px 23px">
                            <ul style="line-height: 29px;">
                                <?php
                                $pop_brand = '';
                                foreach ($popular_tractor as $popular_tractorkey => $popular_tractorvalue) {
                                    foreach (SelectQuery('name', 'brand', 'id', $popular_tractorvalue->brand) as $raa) $pop_brand = ucfirst(($raa->name));
                                    ?>
                                    <li>
                                        <a style="color: #D63334;" target="_blank"
                                           href="<?php echo $root; ?>product/<?php echo $popular_tractorvalue->id; ?>/<?php echo newslugend($pop_brand) . "-tractor"; ?>-<?php echo newslugend($popular_tractorvalue->model_name); ?>">
                                            <?php echo ucfirst($pop_brand); ?>
                                            <?php echo ucfirst($popular_tractorvalue->model_name); ?></a></li>

                                    <?php
                                }
                                ?>

                            </ul>

                        </div>
                        <div class="tab-pane fade padding_singletractor" id="Latest_tab"
                             style="padding: 36px 20px 23px">
                            <ul style="line-height: 29px;">
                                <?php
                                $pop_brand = '';
                                foreach ($latest_tractor as $popular_tractorkey => $popular_tractorvalue) {
                                    foreach (SelectQuery('name', 'brand', 'id', $popular_tractorvalue->brand) as $raa) $pop_brand = ucfirst(($raa->name));
                                    ?>
                                    <li>
                                        <a style="color: #D63334;" target="_blank"
                                           href="<?php echo $root; ?>product/<?php echo $popular_tractorvalue->id; ?>/<?php echo newslugend($pop_brand) . "-tractor"; ?>-<?php echo newslugend($popular_tractorvalue->model_name); ?>">
                                            <?php echo ucfirst($pop_brand); ?>
                                            <?php echo ucfirst($popular_tractorvalue->model_name); ?></a></li>

                                    <?php
                                }
                                ?>

                            </ul>

                        </div>
                        <div class="tab-pane fade padding_singletractor" id="Dealear" style="padding: 36px 20px 23px">


                            <div class="col-sm-6 col-md-6" style="margin-top: 16px;">
                                <?php
                                $query1 = shweta_select('*', 'states', 'country_id', '101');
                                $val1[''] = 'Please select state';
                                foreach ($query1 as $k1 => $r1) {
                                    $val1[$r1->id] = ucfirst($r1->name);
                                }
                                $ab = 'class="form-control"   required="required" onchange="CityGet(this.value)"';
                                echo form_dropdown('states', $val1, '', $ab);
                                ?>
                            </div>
                            <div class="col-sm-6 col-md-6" style="margin-top: 16px;" id="CityVal">
                                <select name="city" class="form-control" id="cur_city_id" required="required"
                                        onchange="GetDealer(this.value,'<?php echo $value->brand; ?>');">
                                    <option value="0">Select City</option>
                                </select>
                            </div>


                            <div class="col-md-12" id="dealersResult" style="margin-top: 16px;"></div>
                            <div class="col-md-12" id="" style="margin-top: 16px;">
                                <p style="font-size: 19px;
text-align: center;
line-height: 37px;">Note: If you want to any other information related to any tractor you can touch with us
                                    <br>
                                    <i class="fa fa-home" style="color:#DB4C4C;font-size:20px;">&nbsp;</i>Tractor
                                    Junction,

                                    44, First Floor,
                                    Azad Nagar Ward No 43 ,
                                    Alwar (Raj.)-301001
                                    <br><i class="fa fa-phone" style="color:#DB4C4C;font-size:20px;">&nbsp;</i>
                                    9414057796
                                </p>
                            </div>
                            <div class="col-md-12" style="margin: auto;
float: left;
text-align: center">
                                <a href="<?php echo $root; ?>find-tractor-dealers">
                                    <button type="button" class="btn btn-info btn-lg singleP_compare singlePgaeBt"
                                            style="margin: auto;
float: none;
margin-top: 26px;">More Dealers
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="tab-pane fade in active padding_singletractor" id="overview"
                             style="padding: 20px 20px 0px;">
                            <p class="font_singletractor" style="font-size:15px;">
                                <?php
                                if ($value->overview != "") {
                                    echo ucfirst($value->overview);
                                } else {

                                    echo ucfirst($value->model_name); ?> Tractor has the comfort and convenience features to keep you smiling
                                    even during the longest days; the engine power and hydraulic capacity to take on
                                    hard-to-handle chores and the quality of engineering, assembly, and components
                                    are very good.
                                <?php } ?>
                            </p> <?php
                            if ($value->cylinder != "" || $value->cylinder != "" || $value->capacity != "" || $value->fuel_tank_capacity != "" || $value->warranty != "") {
                                ?>
                                <p class="MainSpec" style="font-size: 15px;margin-top:20px;">Main specification
                                    of <?php echo ucfirst($value->model_name) ?> are below
                                </p>
                                <?php
                            }
                            ?>
                            <ul class="singletractor_style padding_singletractor"
                                style="line-height:34px;margin-top:25px;">
                                <?php
                                if ($value->cylinder != "") { ?>
                                    <li>No. Of Cylinder are <?php echo $value->cylinder; ?></li>
                                <?php }

                                if ($value->engine_air_filter != "") { ?>
                                    <li>Air Filter are <?php echo $value->engine_air_filter; ?></li>
                                <?php }
                                if ($value->capacity != "") { ?>

                                    <li>Capacity CC are <?php echo $value->capacity; ?></li>
                                <?php }
                                if ($value->fuel_tank_capacity != "") { ?>

                                    <li>Fuel Tank capacity are <?php echo $value->fuel_tank_capacity . " lit"; ?></li>
                                <?php }
                                if ($value->warranty != "") { ?>

                                    <li>Warranty are <?php echo $value->warranty . " Yr"; ?></li>
                                <?php } ?>
                            </ul>

                            <div class="col-md-12 col-sm-12 col-xs-12 paddingZ">
                                <div class="panel-group" id="accordion1">
                                    <div class="panel panel-default">
                                        <button type="button" class="btn btn-info compare_head " data-toggle="collapse"
                                                data-parent="#accordion_one1" href="#collapse155">Tractor Specifications
                                        </button>
                                        <div id="collapse155" class="panel-collapse collapse in">
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
                                                <?php } ?>    <?php if ($value->fuel_tank_capacity != "") { ?>
                                                    <tr>
                                                        <th class="widthH">Capacity</th>
                                                        <td class="widthH"><?php
                                                            echo $value->fuel_tank_capacity . " lit";
                                                            ?></td>
                                                    </tr>
                                                <?php } ?>    <?php if ($value->wheel_drive != "") { ?>
                                                    <tr>
                                                        <th class="widthH">Wheel drive</th>
                                                        <td class="widthH"><?php
                                                            echo $value->wheel_drive . " WD";
                                                            ?></td>
                                                    </tr>
                                                <?php } ?>        <?php if ($value->fuel_pump != "") { ?>
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
                                    <div class="col-md-12" style="margin: auto;
float: none;margin-bottom:20px ;
text-align: center">
                                        <a href="<?php echo $root; ?>tractor-features-and-specifications/<?php echo $value->id ?>">
                                            <button type="button"
                                                    class="btn btn-info btn-lg singleP_compare singlePgaeBt" style="margin: auto;
float: none;
margin-top: 26px;">View Full Features & Specifications
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>


                        </div><!--/.tab-pane -->
                        <div class="tab-pane fade ipm" id="details" style="padding: 20px 20px 30px;">
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

                            </div>
                            <div class="col-md-12" style="margin: auto;
float: none;
text-align: center">
                                <a href="<?php echo $root; ?>tractor-features-and-specifications/<?php echo $value->id ?>">
                                    <button type="button" class="btn btn-info btn-lg singleP_compare singlePgaeBt"
                                            style="margin: auto;
float: none;
margin-top: 26px;">View Full Features & Specifications
                                    </button>
                                </a>
                            </div>
                        </div><!--/.tab-pane -->
                    </div>
                </div>

            
            

            </div>


 

            <div class="col-sm-12 col-md-3 col-xs-12 reviewMainCont">
                <div class="col-xs-12 col-sm-12 col-md-12 paddingZ rat-n-review">
                    <h3 class="reviwTagLine">Ratings &amp; Reviews</h3>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 singProDivR ReviewStartRating">
                    <div class="col-xs-12 col-sm-12 col-md-12 paddingZ">
                        <div class="col-xs-12 col-sm-12 col-md-12 paddingZ">
                            <h1 class="ReviewMainEating"><?php echo $AVGRating; ?>    <i class="fa fa-star" style="color:#000;"></i></h1>
                            <h4 class="allRatingH4">
<?php
    for($x=1;$x<=$AVGRating;$x++) {
        echo '<i class="fa fa-star RatimgColor"></i>';
    }
 
    while ($x<=5) {
        echo '<i class="fa fa-star-o RatimgColor"></i>';
        $x++;
    }
?>
 



                            </h4>
                            <h6 class="basedOnRatimg">Based on <?php echo $basedON; ?> reviews</h6>
                            <div class="col-xs-12 col-sm-12 col-md-12 paddingZ basedRatimgDv">
                              
                                   <?php
                                   $id_enc=base64_encode(serialize($value->id));
                                   $tractorr_name= newslug_end($brand_name.'-'.$value->model_name);
                                   ?>
                                   <h3 style="    margin: 0px;
    text-align: center;
    margin-bottom: 15px;
    margin-top: 10px;">
                                    <a style="color:#fff" href="<?php echo $root; ?>user-reviews/<?php echo $id_enc; ?>/<?php echo $tractorr_name; ?>" 
                                    class="RateUsButton"><i class="fa fa-pencil-square-o fa-fw pulse2"></i> Write Review</a>
                                    <a style="color:#fff;    background: #148f1a;" href="<?php echo $root; ?>reviews/<?php echo $id_enc; ?>/<?php echo $tractorr_name; ?>" 
                                    class="RateUsButton"><i class="fa fa-star-o fa-fw pulse2"></i> Show Review </a>
                                    </h3>
                              
                            </div>
                        </div>
                    </div>
   </div>
            </div>
         
            
            
        </div>
<!--
        <div class="col-sm-12 col-xs-12 adsDiv " style="margin-bottom: 20px;">
            <p class="advertisementLabel">Advertisement</p>
            <a href="<?php echo new_hollandAdLink('62','new-holland-tractors','single_tractor'); ?>">
                <img src="<?php echo $root; ?>web_root/advertisments/new_holland_ad4.jpg" class="img-responsive">
            </a>
        </div>
        -->

<p class="Disclaimer">
<b>Disclaimer</b>:-
  The information / features / prices are as on the date those are shared by <?php echo ucfirst($brand_name)?> and 
  for the current features, variants and prices the customer requires to visit the nearest  <?php echo ucfirst($brand_name)?> dealer.

</p>


        <div class="container">
            <div class="col-md-12 col-sm-12 col-xs-12 compareDemoBox">
   <a href="<?php echo massyAdLink('74','massey-ferguson','single_tractor'); ?>">
            <img src="<?php echo $root; ?>web_root/advertisments/messay_tractor_ad_2.jpg" class="img-responsive">
         </div>
        </div>

        
    </div>


</div>



<script src="<?php echo $root; ?>web_root/front_web_root/lightbox-plus-jquery.min.js"></script>
<script>
    function CityGet(StateName) {
        $.ajax({
            type: "POST",
            url: "../../Home/StateGet",
            data: {StateID: StateName},
            success: function (data) {
                $("#cur_city_id").html(data);
            },
        });
    }
    function GetDealer(cityValue, BrandValue) {
        $.ajax({
            type: "POST",
            url: "../../Search/DealearGet",
            data: {city_Value: cityValue, Brand_Value: BrandValue},
            success: function (data) {
                $("#dealersResult").html(data);
            },
        });
    }
</script>