<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
$classMD = $class_div;
foreach ($result_first as $key1 => $first) {
    foreach (shweta_select('name', 'brand', 'id', $first->brand) as $raa) $brandFirst = ucfirst($raa->name);
}
foreach ($result_second as $key1 => $second) {
    foreach (shweta_select('name', 'brand', 'id', $second->brand) as $raa) $brandSecond = ucfirst($raa->name);
}
foreach ($result_third as $key1 => $third) {
    foreach (shweta_select('name', 'brand', 'id', $third->brand) as $raa) $brandThird = ucfirst($raa->name);
}
if(!empty($result_fourth)){
foreach ($result_fourth as $key1 => $fourth) {
    foreach (shweta_select('name', 'brand', 'id', $fourth->brand) as $raa) $brandFourth = ucfirst($raa->name);
}
}

?>
<style>
    .comp_btn1 {
        bottom: 0%;
    }
</style>
<div class="container-fluid paddingZ">
    <div class="top_row">
    </div>
</div>
<div class="banner" style="background:rgba(204, 0, 1, 0.7) none repeat scroll 0% 0%;height:105px;">
    <div class="container">
        <div class="col-sm-12 col-md-12" style="padding:15px 0px;">
            <ul type="none" style="color:#fff">
                <li style="float:left;padding-right:5px;"><i class="fa fa-home"
                                                             style="font-size:16px;padding-right:5px;"></i>Home
                </li>
                <li style="float:left;padding-right:5px;">/</li>
                <li style="float:left;padding-right:5px;">Compare Tractors</li>
            </ul>
        </div>
    </div>
</div>
<div class="container" style="padding: 0px 15px;margin-top:-55px;background:transparent;">
    <div class="col-sm-12 col-md-12 paddingZ padding_0_in_small" style="">
        <div class="col-sm-12 col-md-12 padding_0_in_small">


            <div class="box-wrapper">
                <div class="box1">
                    <div class="row margin_news">
                        <div class="col-sm-12 col-md-12">
                            <h1 style="margin:10px 0px 0px;color:#148f1a;" class="font-upcoming">
                                Compare Tractors in India</h1>
                            <div class="border">
                                <div class="border-inner"></div>
                            </div>
                        </div>


                        <div class="col-sm-12 col-md-12 col-xs-12" style="padding: 0px 15px;">
                            <div class="col-sm-12 col-md-12 col-xs-12 paddingZ"
                                 style="border:1px solid #e9e9e9;margin-bottom: 40px;">
                                <div class="col-sm-4 <?php echo $classMD; ?> col-xs-12 paddingZ"
                                     style="border-bottom:3px solid #DD4445;margin-bottom:10px">
                                    <div class="col-sm-12 col-md-12 col-xs-12 paddingZ"
                                         style="background:#fff;border-right: 1px solid #e9e9e9">
                                        <center style="padding-top: 30px;"><img
                                                    src="<?php echo $root; ?>upload/<?php echo $first->image; ?>"
                                                    class="img-responsive" alt="" style="height:150px"/></center>
                                        <?php if ($first->priceShow != 0) { ?>
                                            <?php if ($first->price != "") { ?>
                                                <a href="#"><span class="comp_btn copm_for_compare"><i
                                                                class="fa fa-rupee"
                                                                style="margin: 0px 0px 3px 5px;"></i>
                                                        <?php
                                                        if ($first->price != "") {
                                                            echo $first->price . " L";
                                                        }
                                                        ?>
											</span>
                                                </a>
                                            <?php }
                                        } ?>
                                        <?php if ($first->hp != "") { ?>
                                            <a href="#"><span class="comp_btn1 copm1_for_compare"><i
                                                            class="fa fa-wrench" style="margin: 0px 0px 3px 5px;"></i>
                                                    <?php
                                                    if ($first->hp != "")
                                                        foreach (shweta_select('name', 'hp', 'id', $first->hp) as $raa) echo ucfirst($raa->name . " HP");
                                                    ?>
											</span>
                                            </a>
                                        <?php } ?>
                                        <div class="col-sm-12 col-md-12 col-xs-12 paddingZ" style="height:180px;">
                                            <ul style="padding:0px 15px;margin-top:20px;line-height: 28px;list-style:none;font-size: 14px;">
                                                <li><span style="color:#DC3F40;font-size:18px;font-weight:bold;">
													<?php
                                                    if ($first->brand != "")
                                                        echo $brandFirst;
                                                    ?>
													</span>
                                                </li>
                                                <li><span style="color:#148f1a;"><b>
													<?php
                                                    if ($first->model_name != "")
                                                        echo ucfirst($first->model_name);
                                                    ?>
													</b></span>
                                                </li>
                                                <?php
                                                if ($first->capacity != "") { ?>
                                                    <li><b>CC :</b>
                                                        <?php
                                                        if ($first->capacity != "")
                                                            echo $first->capacity . " CC";
                                                        ?>
                                                    </li>
                                                <?php } ?>
                                                <?php
                                                if ($first->cylinder != "") { ?>
                                                    <li><b>Cylinder :</b>
                                                        <?php
                                                        if ($first->cylinder != "")
                                                            echo $first->cylinder;
                                                        ?>
                                                    </li>
                                                <?php } ?>
                                                <?php
                                                if ($first->transmission_clutch != "") { ?>
                                                    <li style="    line-height: 16px;"><b>Clutch :</b>
                                                        <span style="    text-transform: uppercase;">
													<?php
                                                    if ($first->transmission_clutch != "")
                                                        echo $first->transmission_clutch;
                                                    ?>
													</span>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 <?php echo $classMD; ?> col-xs-12 paddingZ"
                                     style="border-bottom:3px solid #DD4445;margin-bottom:10px">
                                    <div class="col-sm-12 col-md-12 col-xs-12 paddingZ"
                                         style="background:#fff;border-right: 1px solid #e9e9e9">
                                        <center style="padding-top: 30px;"><img
                                                    src="<?php echo $root; ?>upload/<?php echo $second->image; ?>"
                                                    class="img-responsive" alt="" style="height:150px"/></center>
                                        <?php if ($second->priceShow != 0) { ?>
                                            <?php if ($second->price != "") { ?>
                                                <a href="#"><span class="comp_btn copm_for_compare"><i
                                                                class="fa fa-rupee"
                                                                style="margin: 0px 0px 3px 5px;"></i>
                                                        <?php
                                                        if ($second->price != "") {
                                                            echo $second->price . " L";
                                                        }
                                                        ?>
											</span>
                                                </a>
                                            <?php }
                                        } ?>
                                        <?php if ($second->hp != "") { ?>
                                            <a href="#"><span class="comp_btn1 copm1_for_compare"><i
                                                            class="fa fa-wrench" style="margin: 0px 0px 3px 5px;"></i>
                                                    <?php
                                                    if ($second->hp != "")
                                                        foreach (shweta_select('name', 'hp', 'id', $second->hp) as $raa) echo ucfirst($raa->name . " HP");
                                                    ?>
											</span>
                                            </a>
                                        <?php } ?>
                                        <div class="col-sm-12 col-md-12 col-xs-12 paddingZ" style="height:180px;">
                                            <ul style="padding:0px 15px;margin-top:20px;line-height: 28px;list-style:none;font-size: 14px;">
                                                <li><span style="color:#DC3F40;font-size:18px;font-weight:bold;">
													<?php
                                                    if ($second->brand != "")
                                                        echo $brandSecond;
                                                    ?>
													</span>
                                                </li>
                                                <li><span style="color:#148f1a;"><b>
													<?php
                                                    if ($second->model_name != "")
                                                        echo ucfirst($second->model_name);
                                                    ?>
													</b></span>
                                                </li>
                                                <li><b>CC :</b>
                                                    <?php
                                                    if ($second->capacity != "")
                                                        echo $second->capacity . " CC";
                                                    ?>
                                                </li>
                                                <li><b>Cylinder :</b>
                                                    <?php
                                                    if ($second->cylinder != "")
                                                        echo $second->cylinder;
                                                    ?>
                                                </li>
                                                <li style="    line-height: 16px;"><b>Clutch :</b>
                                                    <span style="    text-transform: uppercase;">
													<?php
                                                    if ($second->transmission_clutch != "")
                                                        echo $second->transmission_clutch;
                                                    ?>
													</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 <?php echo $classMD; ?> col-xs-12 paddingZ"
                                     style="border-bottom:3px solid #DD4445;margin-bottom:10px">
                                    <div class="col-sm-12 col-md-12 paddingZ"
                                         style="background:#fff;border-right: 1px solid #e9e9e9">
                                        <center style="padding-top: 30px;"><img
                                                    src="<?php echo $root; ?>upload/<?php echo $third->image; ?>"
                                                    class="img-responsive" alt="" style="height:150px"/></center>
                                        <?php if ($third->priceShow != 0) { ?>
                                            <?php if ($third->price != "") { ?>
                                                <a href="#"><span class="comp_btn copm_for_compare"><i
                                                                class="fa fa-rupee"
                                                                style="margin: 0px 0px 3px 5px;"></i>
                                                        <?php
                                                        if ($third->price != "") {
                                                            echo $third->price . " L";
                                                        }
                                                        ?>
											</span>
                                                </a>
                                            <?php }
                                        } ?>
                                        <a href="#"><span class="comp_btn1 copm1_for_compare"><i class="fa fa-wrench"
                                                                                                 style="margin: 0px 0px 3px 5px;"></i>
                                                <?php
                                                if ($third->hp != "")
                                                    foreach (shweta_select('name', 'hp', 'id', $third->hp) as $raa) echo ucfirst($raa->name . " HP");
                                                ?>
											</span>
                                        </a>
                                        <div class="col-sm-12 col-md-12 col-xs-12 paddingZ" style="height:180px;">
                                            <ul style="padding:0px 15px;margin-top:20px;line-height: 28px;list-style:none;font-size: 14px;">
                                                <li><span style="color:#DC3F40;font-size:18px;font-weight:bold;">
													<?php
                                                    if ($third->brand != "")
                                                        echo $brandThird;
                                                    ?>
													</span>
                                                </li>
                                                <li><span style="color:#148f1a;"><b>
													<?php
                                                    if ($third->model_name != "")
                                                        echo ucfirst($third->model_name);
                                                    ?>
													</b></span>
                                                </li>
                                                <li><b>CC :</b>
                                                    <?php
                                                    if ($third->capacity != "")
                                                        echo $third->capacity . " CC";
                                                    ?>
                                                </li>
                                                <li><b>Cylinder :</b>
                                                    <?php
                                                    if ($third->cylinder != "")
                                                        echo $third->cylinder;
                                                    ?>
                                                </li>
                                                <li style="    line-height: 16px;"><b>Clutch :</b>
                                                    <span style="    text-transform: uppercase;">
													<?php
                                                    if ($third->transmission_clutch != "")
                                                        echo $third->transmission_clutch;
                                                    ?>
													</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
<?php if(!empty($result_fourth)){ ?>
                                <div class="col-sm-4 <?php echo $classMD; ?> col-xs-12 paddingZ"
                                     style="border-bottom:3px solid #DD4445;margin-bottom:10px">
                                    <div class="col-sm-12 col-md-12 col-xs-12 paddingZ"
                                         style="background:#fff;border-right: 1px solid #e9e9e9">
                                        <center style="padding-top: 30px;"><img
                                                    src="<?php echo $root; ?>upload/<?php echo $fourth->image; ?>"
                                                    class="img-responsive" alt="" style="height:150px"/></center>
                                        <?php if ($fourth->priceShow != 0) { ?>
                                            <?php if ($fourth->price != "") { ?>
                                                <a href="#"><span class="comp_btn copm_for_compare"><i
                                                                class="fa fa-rupee"
                                                                style="margin: 0px 0px 3px 5px;"></i>
                                                        <?php
                                                        if ($fourth->price != "") {
                                                            echo $fourth->price . " L";
                                                        }
                                                        ?>
											</span>
                                                </a>
                                            <?php }
                                        } ?>
                                        <?php if ($fourth->hp != "") { ?>
                                            <a href="#"><span class="comp_btn1 copm1_for_compare"><i
                                                            class="fa fa-wrench" style="margin: 0px 0px 3px 5px;"></i>
                                                    <?php
                                                    if ($fourth->hp != "")
                                                        foreach (shweta_select('name', 'hp', 'id', $fourth->hp) as $raa) echo ucfirst($raa->name . " HP");
                                                    ?>
											</span>
                                            </a>
                                        <?php } ?>
                                        <div class="col-sm-12 col-md-12 col-xs-12 paddingZ" style="height:180px;">
                                            <ul style="padding:0px 15px;margin-top:20px;line-height: 28px;list-style:none;font-size: 14px;">
                                                <li><span style="color:#DC3F40;font-size:18px;font-weight:bold;">
													<?php
                                                    if ($fourth->brand != "")
                                                        echo $brandFourth;
                                                    ?>
													</span>
                                                </li>
                                                <li><span style="color:#148f1a;"><b>
													<?php
                                                    if ($fourth->model_name != "")
                                                        echo ucfirst($fourth->model_name);
                                                    ?>
													</b></span>
                                                </li>
                                                <li><b>CC :</b>
                                                    <?php
                                                    if ($fourth->capacity != "")
                                                        echo $fourth->capacity . " CC";
                                                    ?>
                                                </li>
                                                <li><b>Cylinder :</b>
                                                    <?php
                                                    if ($fourth->cylinder != "")
                                                        echo $fourth->cylinder;
                                                    ?>
                                                </li>
                                                <li style="    line-height: 16px;"><b>Clutch :</b>
                                                    <span style="    text-transform: uppercase;">
													<?php
                                                    if ($fourth->transmission_clutch != "")
                                                        echo $fourth->transmission_clutch;
                                                    ?>
													</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
<?php } ?>
                            </div>
                            <div class="col-sm-12 col-xs-12 adsDiv">
                                <p class="advertisementLabel">Advertisement</p>
                                <a href="<?php echo farmtracAdLink('75','farmtrac-tractors','compare_tractor'); ?>">
                                    <img src="<?php echo $root; ?>web_root/advertisments/farmtrac_tractor_ad2.gif"
                                         class="img-responsive">
                                </a>
                            </div>

                        </div>


                        <div class="col-sm-12 col-md-12 col-xs-12 ipm" style="padding: 0px 15px;">
                            <div class="col-sm-12 col-md-12 col-xs-12" style="padding:0px;border:1px solid #ddd;">
                                <button type="button" class="btn btn-info compare_head " data-toggle="collapse"
                                        data-target="#engine">Engine
                                </button>
                                <div id="engine" class="collapse in">
                                    <table class="table table-striped" style="border-top: 3px solid #DD4445;">
                                        <tbody>
                                        <tr>
                                            <th class="widthH">No. Of Cylinder</th>
                                            <td class="widthH">
                                                <?php
                                                if ($first->cylinder != "")
                                                    echo $first->cylinder;
                                                else
                                                    echo "Not filled";
                                                ?>
                                            </td>
                                            <td class="widthH">
                                                <?php
                                                if ($second->cylinder != "")
                                                    echo $second->cylinder;
                                                else
                                                    echo "Not filled";
                                                ?>
                                            </td>
                                            <td class="widthH">
                                                <?php
                                                if ($third->cylinder != "")
                                                    echo $third->cylinder;
                                                else
                                                    echo "Not filled";
                                                ?>
                                            </td>
<?php  if(!empty($fourth)){ ?>
                                            <td class="widthH">
                                                <?php
                                                if ($fourth->cylinder != "")
                                                    echo $fourth->cylinder;
                                                else
                                                    echo "Not filled";
                                            
                                                ?>
                                            </td>
                                            <?php } ?>


                                        </tr>
                                        <tr>
                                            <th>HP Category</th>
                                            <td class="widthH">
                                                <?php
                                                if ($first->hp != "")
                                                    foreach (shweta_select('name', 'hp', 'id', $first->hp) as $raa) echo ucfirst($raa->name . " HP");
                                                else
                                                    echo "Not Filled";
                                                ?>
                                            </td>
                                            <td class="widthH">
                                                <?php
                                                if ($second->hp != "")
                                                    foreach (shweta_select('name', 'hp', 'id', $second->hp) as $raa) echo ucfirst($raa->name . " HP");
                                                else
                                                    echo "Not Filled";
                                                ?>
                                            </td>
                                            <td class="widthH">
                                                <?php
                                                if ($third->hp != "")
                                                    foreach (shweta_select('name', 'hp', 'id', $third->hp) as $raa) echo ucfirst($raa->name . " HP");
                                                else
                                                    echo "Not Filled";
                                                ?>
                                            </td>

                                            <td class="widthH">
                                                <?php
                                                  if(!empty($fourth)){
                                                if ($fourth->hp != "")
                                                    foreach (shweta_select('name', 'hp', 'id', $fourth->hp) as $raa) echo ucfirst($raa->name . " HP");
                                                else
                                                    echo "Not Filled";
                                            }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Capacity CC</th>
                                            <?php
                                            if (!empty($result_first)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($first->capacity != "")
                                                        echo $first->capacity . " CC";
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_second)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($second->capacity != "")
                                                        echo $second->capacity . " CC";
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_third)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($third->capacity != "")
                                                        echo $third->capacity . " CC";
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_fourth)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($fourth->capacity != "")
                                                        echo $fourth->capacity . " CC";
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <th>Engine Rated RPM</th>
                                            <?php
                                            if (!empty($result_first)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($first->engine_rated_rpm != "")
                                                        echo $first->engine_rated_rpm;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_second)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($second->engine_rated_rpm != "")
                                                        echo $second->engine_rated_rpm;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_third)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($third->engine_rated_rpm != "")
                                                        echo $third->engine_rated_rpm;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_fourth)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($fourth->engine_rated_rpm != "")
                                                        echo $fourth->engine_rated_rpm;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <th>Cooling</th>
                                            <?php
                                            if (!empty($result_first)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($first->cooling != "")
                                                        echo $first->cooling;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_second)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($second->cooling != "")
                                                        echo $second->cooling;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_third)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($third->cooling != "")
                                                        echo $third->cooling;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_fourth)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($fourth->cooling != "")
                                                        echo $fourth->cooling;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <th>Air Filter</th>
                                            <?php
                                            if (!empty($result_first)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($first->engine_air_filter != "")
                                                        echo $first->engine_air_filter;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_second)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($second->engine_air_filter != "")
                                                        echo $second->engine_air_filter;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_third)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($third->engine_air_filter != "")
                                                        echo $third->engine_air_filter;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_fourth)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($fourth->engine_air_filter != "")
                                                        echo $fourth->engine_air_filter;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-xs-12"
                                 style="padding:0px;border:1px solid #ddd;margin-top:5px">
                                <button type="button" class="btn btn-info compare_head " data-toggle="collapse"
                                        data-target="#trans">Transmission
                                </button>
                                <div id="trans" class="collapse in">
                                    <table class="table table-striped" style="border-top: 3px solid #DD4445;">
                                        <tbody>
                                        <tr>
                                            <th class="widthH">Transmission type</th>
                                            <?php
                                            if (!empty($result_first)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($first->transmission_type != "")
                                                        echo $first->transmission_type;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_second)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($second->transmission_type != "")
                                                        echo $second->transmission_type;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_third)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($third->transmission_type != "")
                                                        echo $third->transmission_type;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_fourth)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($fourth->transmission_type != "")
                                                        echo $fourth->transmission_type;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <th class="widthH">Clutch</th>
                                            <?php
                                            if (!empty($result_first)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($first->transmission_clutch != "")
                                                        echo $first->transmission_clutch;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_second)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($second->transmission_clutch != "")
                                                        echo $second->transmission_clutch;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_third)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($third->transmission_clutch != "")
                                                        echo $third->transmission_clutch;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_fourth)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($fourth->transmission_clutch != "")
                                                        echo $fourth->transmission_clutch;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                        <tr>
                                            <th>Alternator</th>
                                            <?php
                                            if (!empty($result_first)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($first->alternator_info != "")
                                                        echo $first->alternator_info;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_second)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($second->alternator_info != "")
                                                        echo $second->alternator_info;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_third)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($third->alternator_info != "")
                                                        echo $third->alternator_info;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_fourth)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($fourth->alternator_info != "")
                                                        echo $fourth->alternator_info;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <th>Battery</th>
                                            <?php
                                            if (!empty($result_first)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($first->battery_info != "")
                                                        echo $first->battery_info;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_second)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($second->battery_info != "")
                                                        echo $second->battery_info;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_third)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($third->battery_info != "")
                                                        echo $third->battery_info;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_fourth)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($fourth->battery_info != "")
                                                        echo $fourth->battery_info;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                        </tr>

                                        <th>Gear Box</th>
                                        <?php
                                        if (!empty($result_first)) { ?>
                                            <td class="widthH">
                                                <?php
                                                if ($first->transmission_gear_box != "")
                                                    echo $first->transmission_gear_box;
                                                else
                                                    echo "Not filled";
                                                ?>
                                            </td>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                        if (!empty($result_second)) { ?>
                                            <td class="widthH">
                                                <?php
                                                if ($second->transmission_gear_box != "")
                                                    echo $second->transmission_gear_box;
                                                else
                                                    echo "Not filled";
                                                ?>
                                            </td>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                        if (!empty($result_third)) { ?>
                                            <td class="widthH">
                                                <?php
                                                if ($third->transmission_gear_box != "")
                                                    echo $third->transmission_gear_box;
                                                else
                                                    echo "Not filled";
                                                ?>
                                            </td>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                        if (!empty($result_fourth)) { ?>
                                            <td class="widthH">
                                                <?php
                                                if ($fourth->transmission_gear_box != "")
                                                    echo $fourth->transmission_gear_box;
                                                else
                                                    echo "Not filled";
                                                ?>
                                            </td>
                                            <?php
                                        }
                                        ?>
                                        </tr>
                                        <tr>
                                            <th>Forward Speed</th>
                                            <?php
                                            if (!empty($result_first)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($first->speed_forward != "")
                                                        echo $first->speed_forward;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_second)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($second->speed_forward != "")
                                                        echo $second->speed_forward;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_third)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($third->speed_forward != "")
                                                        echo $third->speed_forward;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_fourth)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($fourth->speed_forward != "")
                                                        echo $fourth->speed_forward;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <th>Reverse speed</th>
                                            <?php
                                            if (!empty($result_first)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($first->speed_reverse != "")
                                                        echo $first->speed_reverse;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_second)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($second->speed_reverse != "")
                                                        echo $second->speed_reverse;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_third)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($third->speed_reverse != "")
                                                        echo $third->speed_reverse;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_fourth)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($fourth->speed_reverse != "")
                                                        echo $fourth->speed_reverse;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-xs-12"
                                 style="padding:0px;border:1px solid #ddd;margin-top:5px">
                                <button type="button" class="btn btn-info compare_head " data-toggle="collapse"
                                        data-target="#breaks">Brakes
                                </button>
                                <div id="breaks" class="collapse in">
                                    <table class="table table-striped" style="border-top: 3px solid #DD4445;">
                                        <tbody>
                                        <tr>
                                            <th class="widthH">Brake</th>
                                            <?php
                                            if (!empty($result_first)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($first->breaks != "")
                                                        echo $first->breaks;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_second)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($second->breaks != "")
                                                        echo $second->breaks;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_third)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($third->breaks != "")
                                                        echo $third->breaks;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_fourth)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($fourth->breaks != "")
                                                        echo $fourth->breaks;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12" style="padding:0px;border:1px solid #ddd;margin-top:5px">
                                <button type="button" class="btn btn-info compare_head " data-toggle="collapse"
                                        data-target="#hydraulics">Hydraulics
                                </button>
                                <div id="hydraulics" class="collapse in">
                                    <table class="table table-striped" style="border-top: 3px solid #DD4445;">
                                        <tbody>
                                        <tr>
                                            <th class="widthH">Lifting Capacity</th>
                                            <?php
                                            if (!empty($result_first)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($first->hydraulic_lifting_capacity != "")
                                                        echo $first->hydraulic_lifting_capacity;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_second)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($second->hydraulic_lifting_capacity != "")
                                                        echo $second->hydraulic_lifting_capacity;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_third)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($third->hydraulic_lifting_capacity != "")
                                                        echo $third->hydraulic_lifting_capacity;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_fourth)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($fourth->hydraulic_lifting_capacity != "")
                                                        echo $fourth->hydraulic_lifting_capacity;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <th>3 point Linkage</th>
                                            <?php
                                            if (!empty($result_first)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($first->hydraulic_point_linkage != "")
                                                        echo $first->hydraulic_point_linkage;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_second)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($second->hydraulic_point_linkage != "")
                                                        echo $second->hydraulic_point_linkage;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_third)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($third->hydraulic_point_linkage != "")
                                                        echo $third->hydraulic_point_linkage;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_fourth)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($fourth->hydraulic_point_linkage != "")
                                                        echo $fourth->hydraulic_point_linkage;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-xs-12"
                                 style="padding:0px;border:1px solid #ddd;margin-top:5px">
                                <button type="button" class="btn btn-info compare_head " data-toggle="collapse"
                                        data-target="#steering">Steering
                                </button>
                                <div id="steering" class="collapse in">
                                    <table class="table table-striped" style="border-top: 3px solid #DD4445;">
                                        <tbody>
                                        <tr>
                                            <th class="widthH">Type</th>
                                            <?php
                                            if (!empty($result_first)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($first->steering_type != "")
                                                        echo $first->steering_type;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_second)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($second->steering_type != "")
                                                        echo $second->steering_type;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_third)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($third->steering_type != "")
                                                        echo $third->steering_type;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_fourth)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($fourth->steering_type != "")
                                                        echo $fourth->steering_type;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <th class="widthH">Steering Column</th>
                                            <?php
                                            if (!empty($result_first)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($first->steering_column != "")
                                                        echo $first->steering_column;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_second)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($second->steering_column != "")
                                                        echo $second->steering_column;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_third)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($third->steering_column != "")
                                                        echo $third->steering_column;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_fourth)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($fourth->steering_column != "")
                                                        echo $fourth->steering_column;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-xs-12"
                                 style="padding:0px;border:1px solid #ddd;margin-top:5px">
                                <button type="button" class="btn btn-info compare_head " data-toggle="collapse"
                                        data-target="#power">Power Take Off
                                </button>
                                <div id="power" class="collapse in">
                                    <table class="table table-striped" style="border-top: 3px solid #DD4445;">
                                        <tbody>
                                        <tr>
                                            <th class="widthH">Type</th>
                                            <?php
                                            if (!empty($result_first)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($first->powertakeoff_type != "")
                                                        echo $first->powertakeoff_type;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_second)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($second->powertakeoff_type != "")
                                                        echo $second->powertakeoff_type;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_third)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($third->powertakeoff_type != "")
                                                        echo $third->powertakeoff_type;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_fourth)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($fourth->powertakeoff_type != "")
                                                        echo $fourth->powertakeoff_type;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <th class="widthH">RPM</th>
                                            <?php
                                            if (!empty($result_first)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($first->powertakeoff_rpm != "")
                                                        echo $first->powertakeoff_rpm;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_second)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($second->powertakeoff_rpm != "")
                                                        echo $second->powertakeoff_rpm;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_third)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($third->powertakeoff_rpm != "")
                                                        echo $third->powertakeoff_rpm;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_fourth)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($fourth->powertakeoff_rpm != "")
                                                        echo $fourth->powertakeoff_rpm;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-xs-12"
                                 style="padding:0px;border:1px solid #ddd;margin-top:5px">
                                <button type="button" class="btn btn-info compare_head " data-toggle="collapse"
                                        data-target="#wheels">Wheels And Tyres
                                </button>
                                <div id="wheels" class="collapse in">
                                    <table class="table table-striped" style="border-top: 3px solid #DD4445;">
                                        <tbody>
                                        <tr>
                                            <th class="widthH">Wheel drive</th>
                                            <?php
                                            if (!empty($result_first)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($first->wheel_drive != "")
                                                        echo $first->wheel_drive;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_second)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($second->wheel_drive != "")
                                                        echo $second->wheel_drive;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_third)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($third->wheel_drive != "")
                                                        echo $third->wheel_drive;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_fourth)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($fourth->wheel_drive != "")
                                                        echo $fourth->wheel_drive;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <th class="widthH">Front</th>
                                            <?php
                                            if (!empty($result_first)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($first->wheels_tyre_front != "")
                                                        echo $first->wheels_tyre_front;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_second)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($second->wheels_tyre_front != "")
                                                        echo $second->wheels_tyre_front;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_third)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($third->wheels_tyre_front != "")
                                                        echo $third->wheels_tyre_front;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_fourth)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($fourth->wheels_tyre_front != "")
                                                        echo $fourth->wheels_tyre_front;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <th class="widthH">Rear</th>
                                            <?php
                                            if (!empty($result_first)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($first->wheels_tyre_rear != "")
                                                        echo $first->wheels_tyre_rear;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_second)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($second->wheels_tyre_rear != "")
                                                        echo $second->wheels_tyre_rear;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_third)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($third->wheels_tyre_rear != "")
                                                        echo $third->wheels_tyre_rear;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_fourth)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($fourth->wheels_tyre_rear != "")
                                                        echo $fourth->wheels_tyre_rear;
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-xs-12"
                                 style="padding:0px;border:1px solid #ddd;margin-top:5px">
                                <button type="button" class="btn btn-info compare_head " data-toggle="collapse"
                                        data-target="#fuel">Fuel Tank
                                </button>
                                <div id="fuel" class="collapse in">
                                    <table class="table table-striped" style="border-top: 3px solid #DD4445;">
                                        <tbody>
                                        <tr>
                                            <th class="widthH">Capacity</th>
                                            <?php
                                            if (!empty($result_first)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($first->fuel_tank_capacity != "")
                                                        echo $first->fuel_tank_capacity . " Lit";
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_second)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($second->fuel_tank_capacity != "")
                                                        echo $second->fuel_tank_capacity . " Lit";
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_third)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($third->fuel_tank_capacity != "")
                                                        echo $third->fuel_tank_capacity . " Lit";
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_fourth)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($fourth->fuel_tank_capacity != "")
                                                        echo $fourth->fuel_tank_capacity . " Lit";
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-xs-12"
                                 style="padding:0px;border:1px solid #ddd;margin-top:5px">
                                <button type="button" class="btn btn-info compare_head " data-toggle="collapse"
                                        data-target="#dimensions">Dimensions And Weight Of Tractor
                                </button>
                                <div id="dimensions" class="collapse in">
                                    <table class="table table-striped" style="border-top: 3px solid #DD4445;">
                                        <tbody>
                                        <tr>
                                            <th class="widthH">Total Weight</th>
                                            <?php
                                            if (!empty($result_first)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($first->total_weight != "")
                                                        echo $first->total_weight . " kg";
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_second)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($second->total_weight != "")
                                                        echo $second->total_weight . " kg";
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_third)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($third->total_weight != "")
                                                        echo $third->total_weight . " kg";
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_fourth)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($fourth->total_weight != "")
                                                        echo $fourth->total_weight . " kg";
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <th class="widthH">Wheel Base</th>
                                            <?php
                                            if (!empty($result_first)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($first->wheel_base != "")
                                                        echo $first->wheel_base . " mm";
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_second)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($second->wheel_base != "")
                                                        echo $second->wheel_base . " mm";
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_third)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($third->wheel_base != "")
                                                        echo $third->wheel_base . " mm";
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_fourth)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($fourth->wheel_base != "")
                                                        echo $fourth->wheel_base . " mm";
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <th class="widthH">Overall Length</th>
                                            <?php
                                            if (!empty($result_first)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($first->overall_length != "")
                                                        echo $first->overall_length . " mm";
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_second)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($second->overall_length != "")
                                                        echo $second->overall_length . " mm";
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_third)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($third->overall_length != "")
                                                        echo $third->overall_length . " mm";
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_fourth)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($fourth->overall_length != "")
                                                        echo $fourth->overall_length . " mm";
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <th class="widthH">Overall Width</th>
                                            <?php
                                            if (!empty($result_first)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($first->overall_width != "")
                                                        echo $first->overall_width . " mm";
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_second)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($second->overall_width != "")
                                                        echo $second->overall_width . " mm";
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_third)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($third->overall_width != "")
                                                        echo $third->overall_width . " mm";
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_fourth)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($fourth->overall_width != "")
                                                        echo $fourth->overall_width . " mm";
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                        </tr>

                                        <tr>
                                            <th class="widthH">Ground Clearance</th>
                                            <?php
                                            if (!empty($result_first)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($first->ground_clearance != "")
                                                        echo $first->ground_clearance . " mm";
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_second)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($second->ground_clearance != "")
                                                        echo $second->ground_clearance . " mm";
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_third)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($third->ground_clearance != "")
                                                        echo $third->ground_clearance . " mm";
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_fourth)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($fourth->ground_clearance != "")
                                                        echo $fourth->ground_clearance . " mm";
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <th class="widthH">Turning Radius With Brakes</th>
                                            <?php
                                            if (!empty($result_first)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($first->turningradius_with_breaks != "")
                                                        echo $first->turningradius_with_breaks . " mm";
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_second)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($second->turningradius_with_breaks != "")
                                                        echo $second->turningradius_with_breaks . " mm";
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_third)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($third->turningradius_with_breaks != "")
                                                        echo $third->turningradius_with_breaks . " mm";
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_fourth)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($fourth->turningradius_with_breaks != "")
                                                        echo $fourth->turningradius_with_breaks . " mm";
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-xs-12"
                                 style="padding:0px;border:1px solid #ddd;margin-top:5px">
                                <button type="button" class="btn btn-info compare_head " data-toggle="collapse"
                                        data-target="#accessories">Accessories
                                </button>
                                <div id="accessories" class="collapse in">
                                    <table class="table table-striped" style="border-top: 3px solid #DD4445;">
                                        <tbody>
                                        <tr>
                                            <th class="widthH">Accessories</th>
                                            <?php
                                            if (!empty($result_first)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($first->accessories != "") {
                                                        $v = rtrim($first->accessories, '$$');
                                                        $aa[] = explode('$$', $v);
                                                        $rr = "";
                                                        foreach ($aa as $k) {
                                                            foreach ($k as $k1) {
                                                                $rr .= $k1 . " , ";
                                                            }
                                                            echo rtrim($rr, ' , ');
                                                        }
                                                    } else
                                                        echo "Not filled"; ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_second)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($second->accessories != "") {
                                                        $vs = rtrim($second->accessories, '$$');
                                                        $aas[] = explode('$$', $vs);
                                                        $rrs = "";
                                                        foreach ($aas as $ks) {
                                                            foreach ($ks as $k1s) {
                                                                $rrs .= $k1s . " , ";
                                                            }
                                                            echo rtrim($rrs, ' , ');
                                                        }
                                                    } else
                                                        echo "Not filled"; ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_third)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($third->accessories != "") {
                                                        $v12s_third = rtrim($third->accessories, '$$');
                                                        $aa12s_third[] = explode('$$', $v12s_third);
                                                        $rr12s_third = "";
                                                        foreach ($aa12s_third as $k21s_third) {
                                                            foreach ($k21s_third as $k121s_third) {
                                                                $rr12s_third .= $k121s_third . " , ";
                                                            }
                                                            echo rtrim($rr12s_third, ' , ');
                                                        }
                                                    } else
                                                        echo "Not filled"; ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_fourth)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($fourth->accessories != "") {
                                                        $v12s_third = rtrim($fourth->accessories, '$$');
                                                        $aa12s_third[] = explode('$$', $v12s_third);
                                                        $rr12s_third = "";
                                                        foreach ($aa12s_third as $k21s_third) {
                                                            foreach ($k21s_third as $k121s_third) {
                                                                $rr12s_third .= $k121s_third . " , ";
                                                            }
                                                            echo rtrim($rr12s_third, ' , ');
                                                        }
                                                    } else
                                                        echo "Not filled"; ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-xs-12"
                                 style="padding:0px;border:1px solid #ddd;margin-top:5px">
                                <button type="button" class="btn btn-info compare_head " data-toggle="collapse"
                                        data-target="#options">Options
                                </button>
                                <div id="options" class="collapse in">
                                    <table class="table table-striped" style="border-top: 3px solid #DD4445;">
                                        <tbody>
                                        <tr>
                                            <th class="widthH">Options</th>
                                            <?php
                                            if (!empty($result_first)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($first->options != "") {
                                                        $v1 = rtrim($first->options, '$$');
                                                        $aa1[] = explode('$$', $v1);
                                                        $rr1 = "";
                                                        foreach ($aa1 as $k2) {
                                                            foreach ($k2 as $k12) {
                                                                $rr1 .= $k12 . " , ";
                                                            }
                                                            echo rtrim($rr1, ' , ');
                                                        }
                                                    } else
                                                        echo "Not filled"; ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_second)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($second->options != "") {
                                                        $v1s = rtrim($second->options, '$$');
                                                        $aa1s[] = explode('$$', $v1s);
                                                        $rr1s = "";
                                                        foreach ($aa1s as $k2s) {
                                                            foreach ($k2s as $k12s) {
                                                                $rr1s .= $k12s . " , ";
                                                            }
                                                            echo rtrim($rr1s, ' , ');
                                                        }
                                                    } else
                                                        echo "Not filled"; ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_third)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($third->options != "") {
                                                        $v1s_aa = rtrim($third->options, '$$');
                                                        $aa1s_aa[] = explode('$$', $v1s_aa);
                                                        $rr1s_aa = "";
                                                        foreach ($aa1s_aa as $k2s_aa) {
                                                            foreach ($k2s_aa as $k12s_aa) {
                                                                $rr1s_aa .= $k12s_aa . " , ";
                                                            }
                                                            echo rtrim($rr1s_aa, ' , ');
                                                        }
                                                    } else
                                                        echo "Not filled"; ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_fourth)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($fourth->options != "") {
                                                        $v1s_aa = rtrim($fourth->options, '$$');
                                                        $aa1s_aa[] = explode('$$', $v1s_aa);
                                                        $rr1s_aa = "";
                                                        foreach ($aa1s_aa as $k2s_aa) {
                                                            foreach ($k2s_aa as $k12s_aa) {
                                                                $rr1s_aa .= $k12s_aa . " , ";
                                                            }
                                                            echo rtrim($rr1s_aa, ' , ');
                                                        }
                                                    } else
                                                        echo "Not filled"; ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-xs-12"
                                 style="padding:0px;border:1px solid #ddd;margin-top:5px">
                                <button type="button" class="btn btn-info compare_head " data-toggle="collapse"
                                        data-target="#additional">Additional-Features
                                </button>
                                <div id="additional" class="collapse in">
                                    <table class="table table-striped" style="border-top: 3px solid #DD4445;">
                                        <tbody>
                                        <tr>
                                            <th class="widthH">Features</th>
                                            <?php
                                            if (!empty($result_first)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($first->additional_features != "") {
                                                        $v12 = rtrim($first->additional_features, '$$');
                                                        $aa12[] = explode('$$', $v12);
                                                        $rr12 = "";
                                                        foreach ($aa12 as $k21) {
                                                            foreach ($k21 as $k121) {
                                                                $rr12 .= $k121 . " , ";
                                                            }
                                                            echo rtrim($rr12, ' , ');
                                                        }
                                                    } else
                                                        echo "Not filled"; ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_second)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($second->additional_features != "") {
                                                        $v12s = rtrim($second->additional_features, '$$');
                                                        $aa12s[] = explode('$$', $v12s);
                                                        $rr12s = "";
                                                        foreach ($aa12s as $k21s) {
                                                            foreach ($k21s as $k121s) {
                                                                $rr12s .= $k121s . " , ";
                                                            }
                                                            echo rtrim($rr12s, ' , ');
                                                        }
                                                    } else
                                                        echo "Not filled"; ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_third)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($third->additional_features != "") {
                                                        $v12s_ads = rtrim($third->additional_features, '$$');
                                                        $aa12s_ads[] = explode('$$', $v12s_ads);
                                                        $rr12s_ads = "";
                                                        foreach ($aa12s_ads as $k21s_ads) {
                                                            foreach ($k21s_ads as $k121s_ads) {
                                                                $rr12s_ads .= $k121s_ads . " , ";
                                                            }
                                                            echo rtrim($rr12s_ads, ' , ');
                                                        }
                                                    } else
                                                        echo "Not filled"; ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_fourth)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($fourth->additional_features != "") {
                                                        $v12s_ads = rtrim($fourth->additional_features, '$$');
                                                        $aa12s_ads[] = explode('$$', $v12s_ads);
                                                        $rr12s_ads = "";
                                                        foreach ($aa12s_ads as $k21s_ads) {
                                                            foreach ($k21s_ads as $k121s_ads) {
                                                                $rr12s_ads .= $k121s_ads . " , ";
                                                            }
                                                            echo rtrim($rr12s_ads, ' , ');
                                                        }
                                                    } else
                                                        echo "Not filled"; ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-xs-12"
                                 style="padding:0px;border:1px solid #ddd;margin-top:5px">
                                <button type="button" class="btn btn-info compare_head " data-toggle="collapse"
                                        data-target="#warranty">Warranty
                                </button>
                                <div id="warranty" class="collapse in">
                                    <table class="table table-striped" style="border-top: 3px solid #DD4445;">
                                        <tbody>
                                        <tr>
                                            <th class="widthH">Warranty</th>
                                            <?php
                                            if (!empty($result_first)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($first->warranty != "")
                                                        echo $first->warranty . " yr";
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_second)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($second->warranty != "")
                                                        echo $second->warranty . " yr";
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_third)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($third->warranty != "")
                                                        echo $third->warranty . " yr";
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_fourth)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($fourth->warranty != "")
                                                        echo $fourth->warranty . " yr";
                                                    else
                                                        echo "Not filled";
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-xs-12"
                                 style="padding:0px;border:1px solid #ddd;margin-top:5px">
                                <button type="button" class="btn btn-info compare_head " data-toggle="collapse"
                                        data-target="#status">Status
                                </button>
                                <div id="status" class="collapse in">
                                    <table class="table table-striped" style="border-top: 3px solid #DD4445;">
                                        <tbody>
                                        <tr>
                                            <th class="widthH">Status</th>
                                            <?php
                                            if (!empty($result_first)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($first->status != "") {
                                                        if ($first->status == "coming_soon") {
                                                            echo "coming soon";
                                                        } else {
                                                            echo $first->status;
                                                        }
                                                    } else
                                                        echo "Not filled"; ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_second)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($second->status != "") {
                                                        if ($second->status == "coming_soon") {
                                                            echo "coming soon";
                                                        } else {
                                                            echo $second->status;
                                                        }
                                                    } else
                                                        echo "Not filled"; ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_third)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($third->status != "") {
                                                        if ($third->status == "coming_soon") {
                                                            echo "coming soon";
                                                        } else {
                                                            echo $third->status;
                                                        }
                                                    } else
                                                        echo "Not filled"; ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_fourth)) { ?>
                                                <td class="widthH">
                                                    <?php
                                                    if ($fourth->status != "") {
                                                        if ($fourth->status == "coming_soon") {
                                                            echo "coming soon";
                                                        } else {
                                                            echo $fourth->status;
                                                        }
                                                    } else
                                                        echo "Not filled"; ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <th class="widthH">Price</th>
                                            <?php
                                            if (!empty($result_first)) { ?>
                                                <?php if ($first->priceShow != 0) { ?>
                                                    <td class="widthH">
                                                        <?php
                                                        if ($first->price != "")
                                                            echo $first->price . " lac";
                                                        else
                                                            echo "Not filled";
                                                        ?>
                                                    </td>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_second)) { ?>
                                                <?php if ($second->priceShow != 0) { ?>
                                                    <td class="widthH">
                                                        <?php
                                                        if ($second->price != "")
                                                            echo $second->price . " lac";
                                                        else
                                                            echo "Not filled";
                                                        ?>
                                                    </td>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_third)) { ?>
                                                <?php if ($third->priceShow != 0) { ?>
                                                    <td class="widthH">
                                                        <?php
                                                        if ($third->price != "")
                                                            echo $third->price . " lac";
                                                        ?>
                                                    </td>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <?php
                                            if (!empty($result_fourth)) { ?>
                                                <?php if ($fourth->priceShow != 0) { ?>
                                                    <td class="widthH">
                                                        <?php
                                                        if ($fourth->price != "")
                                                            echo $fourth->price . " lac";
                                                        ?>
                                                    </td>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </tr>
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
    </div>
</div>
</div>
</div>


