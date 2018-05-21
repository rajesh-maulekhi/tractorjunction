<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
foreach ($result as $key => $obj) {
    $id = $obj->id;
    ?>
    <link rel="stylesheet" href="<?php echo $root; ?>web_root/front_web_root/lightbox.css">
    <div class="banner" style="background:rgba(204, 0, 1, 0.7) none repeat scroll 0% 0%;height:105px;">
        <div class="container">
            <div class="col-sm-12 col-md-12 col-xs-12" style="padding:15px 0px;">
                <ul type="none" style="color:#fff">
                    <li style="float:left;padding-right:5px;"><i class="fa fa-home"
                                                                 style="font-size:16px;padding-right:5px;"></i>Home
                    </li>
                    <li style="float:left;padding-right:5px;">/</li>
                    <li style="float:left;padding-right:5px;">Harvester details</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container d1 margin_imp_over">
        <div class="col-sm-8 col-md-7 col-xs-12 paddingZ b1 ipm" style="padding-right:13px">
            <div class="box-wrapper">
                <div class="box1">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <div class="col-md-12 col-sm-12 col-xs-12 paddingZ">
                                <h1 class="d10" style="margin-left:0px;text-align: center;margin-bottom: 26px;">
                                    <i class="fa fa-get-pocket"> </i>
                                    <?php foreach (shweta_select('name', 'brand', 'id', $obj->brand) as $raa) echo ucfirst(strtolower($raa->name)); ?>
                                    Combine Harvester
                                    <?php echo ucfirst(strtolower($obj->model_name)); ?>
                                </h1>
                                <div class="col-sm-12 col-md-12 col-xs-12 paddingZ bo">
                                    <div class="col-sm-12 col-md-12 col-xs-12 paddingZ">
                                        <div class="col-sm-12 col-md-12 col-xs-12 paddingZ padding_singletractor singletractor_style"
                                             style="line-height: 36px;">
                                            <div class="col-sm-6 col-md-6 paddingZ">
											<span class="d6">
											<i class="fa fa-tag" style="margin-right:12px"></i>
											<span class="d7">Brand Name</span> : <?php
                                                $brandName = '';
                                                foreach (shweta_select('name', 'brand', 'id', $obj->brand) as $raa) echo $brandName = ucfirst(strtolower($raa->name)); ?></span>
                                            </div>
                                            <div class="col-sm-6 col-md-6 paddingZ">
											<span class="d6">
											<i class="fa fa-cubes" style="margin-right:12px"></i>
											<span class="d7">Model Name</span> : <?php echo ucfirst(strtolower($obj->model_name)); ?></span>
                                            </div>
                                            <?php if ($obj->enginemodel != "") { ?>
                                                <div class="col-sm-6 col-md-6 paddingZ">
											<span class="d6">
											<i class="fa fa-wrench" style="margin-right:12px"></i>
											<span class="d7">Type</span> : <?php echo ucfirst(strtolower($obj->enginemodel)); ?></span>
                                                </div>
                                            <?php } ?>
                                            <?php if ($obj->epower != "") { ?>
                                                <div class="col-sm-6 col-md-6 paddingZ">
											<span class="d6">
											<i class="fa fa-bolt" style="margin-right:12px"></i>
											<span class="d7">Power</span> : <?php echo ucfirst(strtolower($obj->epower)); ?></span>
                                                </div>
                                            <?php } ?>
                                            <?php if ($obj->cutterbar != "") { ?>
                                                <div class="col-sm-6 col-md-6 paddingZ">
											<span class="d6">
											<i class="fa fa-tachometer" style="margin-right:12px"></i>
											<span class="d7">Cutter Bar – Width</span> : <?php echo ucfirst(strtolower($obj->cutterbar)); ?></span>
                                                </div>
                                            <?php } ?>
                                            <?php if ($obj->engtype != "") { ?>
                                                <div class="col-sm-6 col-md-6 paddingZ">
											<span class="d6">
											<i class="fa fa-cogs" style="margin-right:12px"></i>
											<span class="d7">Engine Type</span> : <?php echo ucfirst(strtolower($obj->engtype)); ?></span>
                                                </div>
                                            <?php } ?>
                                            <?php if ($obj->hprice != "") { ?>
                                                <div class="col-sm-6 col-md-6 paddingZ">
											<span class="d6">
											<i class="fa fa-inr" style="margin-right:12px"></i>
											<span class="d7">Price</span> : <?php echo ucfirst(strtolower($obj->hprice)); ?></span>
                                                </div>
                                            <?php } ?>
                                            <?php if ($obj->cutterbar != "") { ?>
                                                <div class="col-sm-6 col-md-6 paddingZ">
											<span class="d6">
												<i class="fa fa-plug" style="margin-right:12px"></i>
												<span class="d7">Power Source</span> :
                                                <?php
                                                if ($obj->power_Source == "self") {
                                                    echo "Self Propelled";

                                                } else {
                                                    echo "Tractor Mounted";
                                                }
                                                ?>
											</span>
                                                </div>
                                            <?php } ?>
                                            <?php if ($obj->crop != "") { ?>
                                                <div class="col-sm-6 col-md-12 paddingZ">
											<span class="d6">
											<i class="fa fa-gavel" style="margin-right:12px"></i>
											<span class="d7">Crop</span> : <?php echo ucfirst(strtolower($obj->crop)); ?></span>
                                                </div>
                                            <?php } ?>
		<button data-toggle="modal" data-target="#demo_request" id="" type="button" style=""
	class="btn btn-info btn-lg singleP_compare singlePgaeBt BtHarvester">
	<i class="fa fa-road" style=""></i> Demo Request

	</button>
	<button data-toggle="modal" data-target="#on_road_request" id="" type="button" style=""
	class="btn btn-info btn-lg singleP_compare singlePgaeBt BtHarvester">
	<i class="fa fa-road" style=""></i> Get On Road Price

	</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php 
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
OnRoadModelHarverster('on_road_request','harvester',$brandName,$obj->model_name,$obj->id,$actual_link); 
OnRoadModelHarverster('demo_request','harvester',$brandName,$obj->model_name,$obj->id,$actual_link); 
 
?>
        <div class="col-sm-4 col-md-5 col-xs-12 paddingZ b1">
            <div class="box-wrapper">
                <div class="box11 ">
                    <div class="row">
                        <?php
                        if ($obj->gallery != "") {
                            ?>
                            <div class="col-sm-12 col-md-12 col-xs-12">
                                <div class="col-sm-8 col-md-8 col-xs-12 paddingZ" style="margin:5px 0px 10px">
                                    <a class="example-image-link"
                                       href="<?php echo $root; ?>images/implementTractor/<?php echo $obj->image; ?>"
                                       data-lightbox="example-set">

                                        <img src="<?php echo $root; ?>images/implementTractor/<?php echo $obj->image; ?>"
                                             alt="<?php foreach (shweta_select('name', 'brand', 'id', $obj->brand) as $raa) echo ucfirst(strtolower($raa->name)); ?> <?php echo $obj->model_name; ?> tractor harvester"
                                             class="img-responsive "
                                             style="border: 1px solid rgb(238, 238, 238);width:100%;height:170px"/>
                                    </a>
                                </div>
                                <div class="col-sm-4 col-md-4 col-xs-12 paddingZ">
                                    <?php
                                    $gallery_array = array();
                                    $gallery_array = explode('$$', $obj->gallery);
                                    $i = 0;
                                    foreach ($gallery_array as $image) {
                                        if ($i == 3) {
                                            break;
                                        }
                                        if (file_exists("./images/implementTractor/" . $image)) { ?>
                                            <div class="col-sm-12 col-md-12 col-xs-12">
                                                <a class="example-image-link"
                                                   href="<?php echo $root; ?>images/implementTractor/<?php echo $image; ?>"
                                                   data-lightbox="example-set">
                                                    <img src="<?php echo $root; ?>images/implementTractor/<?php echo $image; ?>"
                                                         alt="<?php foreach (shweta_select('name', 'brand', 'id', $obj->brand) as $raa) echo ucfirst(strtolower($raa->name)); ?> <?php echo $obj->model_name; ?> tractor harvester"
                                                         class="img-responsive "
                                                         style="box-shadow: 0px 0px 1px red;border: 2px solid rgb(238, 238, 238);width:100%;height:60px;margin-bottom:5px"/>
                                                </a>
                                            </div>
                                            <?php
                                            $i++;
                                        }
                                    } ?>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="col-sm-12 col-md-12 col-xs-12">
                                <a class="example-image-link"
                                   href="<?php echo $root; ?>images/implementTractor/<?php echo $obj->image; ?>"
                                   data-lightbox="example-set">
                                    <img src="<?php echo $root; ?>images/implementTractor/<?php echo $obj->image; ?>"
                                         alt="<?php foreach (shweta_select('name', 'brand', 'id', $obj->brand) as $raa) echo ucfirst(strtolower($raa->name)); ?> <?php echo $obj->model_name; ?> tractor harvester"
                                         class="img-responsive "
                                         style="border: 1px solid rgb(238, 238, 238);width:100%;height:185px"/>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                    <h3 class="d3" style="margin-top:10px">
                        <?php foreach (shweta_select('name', 'brand', 'id', $obj->brand) as $raa) echo ucfirst(strtolower($raa->name)); ?>
                        <?php echo ucfirst($obj->model_name); ?>
                    </h3>
                </div>
            </div>

        </div>
        <div class="col-xs-12 col-md-12 col-sm-12">
        </div>
    </div>
    <div class="container d15">
        <div class="col-sm-12 col-md-12 paddingZ a34">
            <div class="col-sm-8 col-md-12">
                <ul class="nav nav-tabs single-nav" id="maincontent" role="tablist">
                    <li class="active"><a href="#features" role="tab" data-toggle="tab" class="hvr-bubble-bottom">OVERVIEW</a>
                    </li>
                    <li><a href="#specification" role="tab" data-toggle="tab"
                           class="hvr-bubble-bottom">SPECIFICATION</a></li>
                </ul><!--/.nav-tabs.content-tabs -->
                <div class="tab-content">
                    <div class="tab-pane fade in active d19 ipm" id="features">
                        <?php if ($obj->overview != "") { ?>
                            <h4 style="padding: 14px 8px;text-align: justify;">
                                <b> Overview : &nbsp;</b>
                                <span class="padding_singletractor font_a" style="line-height: 23px;font-size:15px ;">
						<?php echo ucfirst(($obj->overview)); ?>
						</span>
                            </h4>
                        <?php } ?>
                        <?php
                        if ($obj->specImge != "") { ?>
                            <div class="col-sm-12 col-md-12 col-xs-12 ipm">
                                <a class="example-image-link"
                                   href="<?php echo $root; ?>images/implementTractor/<?php echo $obj->specImge; ?>"
                                   data-lightbox="example-set">
                                    <?php if ($obj->image != "" && file_exists("./images/implementTractor/" . $obj->image)){ ?>
                                    <img style="width: 100%; margin-top:13px;" class="example-image img-responsive"
                                         src="<?php echo $root; ?>images/implementTractor/<?php echo $obj->specImge; ?>"
                                         alt="tractor specification image"/></a>
                                <?php } else { ?>
                                    <img style="width: 100%; margin-top:13px;" class="example-image img-responsive"
                                         src="<?php echo $root; ?>images/implementTractor/default-image.png"
                                         alt="tractor specification image"/></a>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                    <!--/.tab-pane -->
                    <div class="tab-pane fade ipm" id="specification" style="padding: 30px 20px 30px;min-height: auto;">
                        <div class="panel-group" id="accordion1">
                            <div class="panel panel-default">
                                <button type="button" class="btn btn-info compare_head " data-toggle="collapse"
                                        data-parent="#accordion1" href="#collapse1">Key Specification
                                </button>
                                <div id="collapse1" class="panel-collapse collapse in">
                                    <table class="table table-striped d20">
                                        <tbody>
                                        <?php if ($obj->type != "") { ?>
                                            <tr>
                                                <th class="widthH">Type</th>
                                                <td class="widthH"><?php echo $obj->type; ?></td>
                                            </tr>
                                        <?php } ?>
                                        <?php if ($obj->crop != "") { ?>
                                            <tr>
                                                <th>Crop</th>
                                                <td><?php echo $obj->crop; ?></td>
                                            </tr>
                                        <?php } ?>
                                        <?php if ($obj->hprice != "") { ?>
                                            <tr>
                                                <th>Price (In Rs)</th>
                                                <td><?php echo $obj->hprice; ?></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <button type="button" class="btn btn-info compare_head " data-toggle="collapse"
                                        data-parent="#accordion1" href="#collapse2">Working Dimensions
                                </button>
                                <div id="collapse2" class="panel-collapse collapse in">
                                    <table class="table table-striped d20">
                                        <tbody>
                                        <?php if ($obj->length != "") { ?>
                                            <tr>
                                                <th class="widthH">Length(mm)</th>
                                                <td class="widthH"><?php echo $obj->length; ?></td>
                                            </tr>
                                        <?php } ?>
                                        <?php if ($obj->width != "") { ?>
                                            <tr>
                                                <th>Width(mm)</th>
                                                <td><?php echo $obj->width; ?></td>
                                            </tr>
                                        <?php } ?>
                                        <?php if ($obj->height != "") { ?>
                                            <tr>
                                                <th>Height(mm)</th>
                                                <td><?php echo $obj->height; ?></td>
                                            </tr>
                                        <?php } ?>
                                        <?php if ($obj->groundclear != "") { ?>
                                            <tr>
                                                <th>Ground Clearance (mm)</th>
                                                <td><?php echo $obj->groundclear; ?></td>
                                            </tr>
                                        <?php } ?>
                                        <?php if ($obj->weight != "") { ?>
                                            <tr>
                                                <th>Weight (kg)</th>
                                                <td><?php echo $obj->weight; ?></td>
                                            </tr>
                                        <?php } ?>
                                        <?php if ($obj->beltlength != "") { ?>
                                            <tr>
                                                <th>Crawler/Belt Length (mm)</th>
                                                <td><?php echo $obj->beltlength; ?></td>
                                            </tr>
                                        <?php } ?>
                                        <?php if ($obj->wheelbase != "") { ?>
                                            <tr>
                                                <th>Wheel Base</th>
                                                <td><?php echo $obj->wheelbase; ?></td>
                                            </tr>
                                        <?php } ?>
                                        <?php if ($obj->rollers != "") { ?>
                                            <tr>
                                                <th>No. of Rollers (each side)</th>
                                                <td><?php echo $obj->rollers; ?></td>
                                            </tr>
                                        <?php } ?>
                                        <?php if ($obj->grouser != "") { ?>
                                            <tr>
                                                <th>No. of Grouser (each side)</th>
                                                <td><?php echo $obj->grouser; ?></td>

                                            </tr>
                                        <?php } ?>
                                        <?php if ($obj->hgrouser != "") { ?>
                                            <tr>
                                                <th>Height of Grouser (mm)</th>
                                                <td><?php echo $obj->hgrouser; ?></td>
                                            </tr>
                                        <?php } ?>
                                        <?php if ($obj->area != "") { ?>
                                            <tr>
                                                <th>Ground Contact Area (sqm)</th>
                                                <td><?php echo $obj->area; ?></td>
                                            </tr>
                                        <?php } ?>
                                        <?php if ($obj->cutCaacity != "") { ?>
                                            <tr>
                                                <th>Cutting Capacity</th>
                                                <td><?php echo $obj->cutCaacity; ?></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="panel panel-default">
                                    <button type="button" class="btn btn-info compare_head " data-toggle="collapse"
                                            data-parent="#accordion1" href="#collapse3">Transport Dimensions
                                    </button>
                                    <div id="collapse3" class="panel-collapse collapse in">
                                        <table class="table table-striped d20">
                                            <tbody>
                                            <?php if ($obj->tlength != "") { ?>
                                                <tr>
                                                    <th class="widthH">Length(mm)</th>
                                                    <td class="widthH"><?php echo $obj->tlength; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <?php if ($obj->twidth != "") { ?>
                                                <tr>
                                                    <th>Width(mm)</th>
                                                    <td><?php echo $obj->twidth; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <?php if ($obj->theight != "") { ?>
                                                <tr>
                                                    <th>Height(mm)</th>
                                                    <td><?php echo $obj->theight; ?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <button type="button" class="btn btn-info compare_head " data-toggle="collapse"
                                            data-parent="#accordion1" href="#collapse4">Tyres
                                    </button>
                                    <div id="collapse4" class="panel-collapse collapse in">
                                        <table class="table table-striped d20">
                                            <tbody>
                                            <?php if ($obj->tyarFront != "") { ?>
                                                <tr>
                                                    <th class="widthH">Front</th>
                                                    <td class="widthH"><?php echo $obj->tyarFront; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <?php if ($obj->tyarRear != "") { ?>
                                                <tr>
                                                    <th>Rear</th>
                                                    <td><?php echo $obj->tyarRear; ?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <button type="button" class="btn btn-info compare_head " data-toggle="collapse"
                                            data-parent="#accordion1" href="#collapse5">Engine
                                    </button>
                                    <div id="collapse5" class="panel-collapse collapse in">
                                        <table class="table table-striped d20">
                                            <tbody>
                                            <?php if ($obj->enginemodel != "") { ?>
                                                <tr>
                                                    <th class="widthH">Engine Modal</th>
                                                    <td class="widthH"><?php echo $obj->enginemodel; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <?php if ($obj->coolingsystem != "") { ?>
                                                <tr>
                                                    <th class="widthH">Cooling System</th>
                                                    <td class="widthH"><?php echo $obj->coolingsystem; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <?php if ($obj->engtype != "") { ?>
                                                <tr>
                                                    <th class="widthH">No of cylinder</th>
                                                    <td class="widthH"><?php echo $obj->engtype; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <?php if ($obj->epower != "") { ?>
                                                <tr>
                                                    <th class="widthH">Power</th>
                                                    <td class="widthH"><?php echo $obj->epower; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <?php if ($obj->rpm != "") { ?>
                                                <tr>
                                                    <th class="widthH">Rated RPM</th>
                                                    <td class="widthH"><?php echo $obj->rpm; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <?php if ($obj->drytpe != "") { ?>
                                                <tr>
                                                    <th class="widthH">Pre-Cleaner & Air Cleaner Dry Types</th>
                                                    <td class="widthH"><?php echo $obj->drytpe; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <?php if ($obj->fuelcapacity != "") { ?>
                                                <tr>
                                                    <th class="widthH">Fuel Tank Capacity (l)</th>
                                                    <td class="widthH"><?php echo $obj->fuelcapacity; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <?php if ($obj->transtype != "") { ?>
                                                <tr>
                                                    <th class="widthH">Transmission Type</th>
                                                    <td class="widthH"><?php echo $obj->transtype; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <?php if ($obj->typeClutch != "") { ?>
                                                <tr>
                                                    <th class="widthH"> Type of Clutch</th>
                                                    <td class="widthH"><?php echo $obj->typeClutch; ?></td>
                                                </tr>
                                            <?php } ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <button type="button" class="btn btn-info compare_head " data-toggle="collapse"
                                            data-parent="#accordion1" href="#collapse6">Straw Walker
                                    </button>
                                    <div id="collapse6" class="panel-collapse collapse in">
                                        <table class="table table-striped d20">
                                            <tbody>
                                            <?php if ($obj->sNOWalker != "") { ?>
                                                <tr>
                                                    <th class="widthH"> NO of Straw Walker</th>
                                                    <td class="widthH"><?php echo $obj->sNOWalker; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <?php if ($obj->sNOStpesWalker != "") { ?>
                                                <tr>
                                                    <th> No of steps</th>
                                                    <td><?php echo $obj->sNOStpesWalker; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <?php if ($obj->lengthWalker != "") { ?>
                                                <tr>
                                                    <th> Length(mm)</th>
                                                    <td><?php echo $obj->lengthWalker; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <?php if ($obj->widthWalker != "") { ?>
                                                <tr>
                                                    <th> Width(mm)</th>
                                                    <td><?php echo $obj->widthWalker; ?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <button type="button" class="btn btn-info compare_head " data-toggle="collapse"
                                            data-parent="#accordion1" href="#collapse7">ELECTRICAL SYSTEM
                                    </button>
                                    <div id="collapse7" class="panel-collapse collapse in">
                                        <table class="table table-striped d20">
                                            <tbody>
                                            <?php if ($obj->batteries != "") { ?>
                                                <tr>
                                                    <th class="widthH">No. of Batteries</th>
                                                    <td class="widthH"><?php echo $obj->batteries; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <?php if ($obj->outputbattery != "") { ?>
                                                <tr>
                                                    <th>Battery Output</th>
                                                    <td><?php echo $obj->outputbattery; ?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <button type="button" class="btn btn-info compare_head " data-toggle="collapse"
                                            data-parent="#accordion1" href="#collapse8">HARVESTING
                                    </button>
                                    <div id="collapse8" class="panel-collapse collapse in">
                                        <table class="table table-striped d20">
                                            <tbody>
                                            <?php if ($obj->cutterbar != "") { ?>
                                                <tr>
                                                    <th class="widthH">Cutter Bar – Effective Width</th>
                                                    <td class="widthH"><?php echo $obj->cutterbar; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <?php if ($obj->cutterheight != "") { ?>
                                                <tr>
                                                    <th class="widthH">Cutting Height Range (mm)</th>
                                                    <td class="widthH"><?php echo $obj->cutterheight; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <?php if ($obj->reeldrive != "") { ?>
                                                <tr>
                                                    <th class="widthH">Reel Drive</th>
                                                    <td class="widthH"><?php echo $obj->reeldrive; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <?php if ($obj->reelheight != "") { ?>
                                                <tr>
                                                    <th class="widthH">Reel Height Adjustment</th>
                                                    <td class="widthH"><?php echo $obj->reelheight; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <?php if ($obj->feeder != "") { ?>
                                                <tr>
                                                    <th class="widthH">Feeder Housing</th>
                                                    <td class="widthH"><?php echo $obj->feeder; ?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <button type="button" class="btn btn-info compare_head " data-toggle="collapse"
                                            data-parent="#accordion1" href="#collapse9">THRESHING & SEPARATING
                                    </button>
                                    <div id="collapse9" class="panel-collapse collapse in">
                                        <table class="table table-striped d20">
                                            <tbody>
                                            <?php if ($obj->thershingdiameter != "") { ?>
                                                <tr>
                                                    <th class="widthH">Threshing Cylinder Diameter (mm)</th>
                                                    <td class="widthH"><?php echo $obj->thershingdiameter; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <?php if ($obj->thershingwidth != "") { ?>
                                                <tr>
                                                    <th class="widthH">Threshing Width</th>
                                                    <td class="widthH"><?php echo $obj->thershingwidth; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <?php if ($obj->thershinglength != "") { ?>
                                                <tr>
                                                    <th class="widthH">Threshing Cylinder Length (mm)</th>
                                                    <td class="widthH"><?php echo $obj->thershinglength; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <?php if ($obj->thershingsystem != "") { ?>
                                                <tr>
                                                    <th class="widthH">Threshing System</th>
                                                    <td class="widthH"><?php echo $obj->thershingsystem; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <?php if ($obj->revolution != "") { ?>
                                                <tr>
                                                    <th class="widthH">Revolutions (RPM)</th>
                                                    <td class="widthH"><?php echo $obj->revolution; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <?php if ($obj->speedadjustment != "") { ?>
                                                <tr>
                                                    <th class="widthH">Speed Adjustment</th>
                                                    <td class="widthH"><?php echo $obj->speedadjustment; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <?php if ($obj->concavewidth != "") { ?>
                                                <tr>
                                                    <th class="widthH">Concave Width (mm)</th>
                                                    <td class="widthH"><?php echo $obj->concavewidth; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <?php if ($obj->concaveclear != "") { ?>
                                                <tr>
                                                    <th class="widthH">Concave Clearance</th>
                                                    <td class="widthH"><?php echo $obj->concaveclear; ?></td>

                                                </tr>
                                            <?php } ?>
                                            <?php if ($obj->separatingdiameter != "") { ?>
                                                <tr>
                                                    <th class="widthH">Separating Cylinder Diameter (mm)</th>
                                                    <td class="widthH"><?php echo $obj->separatingdiameter; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <?php if ($obj->cylinderlength != "") { ?>
                                                <tr>
                                                    <th class="widthH">Separating Cylinder Length (mm)</th>
                                                    <td class="widthH"><?php echo $obj->cylinderlength; ?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <button type="button" class="btn btn-info compare_head " data-toggle="collapse"
                                            data-parent="#accordion1" href="#collapse10">CLEANING
                                    </button>
                                    <div id="collapse10" class="panel-collapse collapse in">
                                        <table class="table table-striped d20">
                                            <tbody>
                                            <?php if ($obj->cleningtype != "") { ?>
                                                <tr>
                                                    <th class="widthH">Cleaning Type</th>
                                                    <td class="widthH"><?php echo $obj->cleningtype; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <?php if ($obj->cleaningarea != "") { ?>
                                                <tr>
                                                    <th class="widthH">Cleaning Area (sq. mt)</th>
                                                    <td class="widthH"><?php echo $obj->cleaningarea; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <?php if ($obj->uppersieve != "") { ?>
                                                <tr>
                                                    <th class="widthH">Upper Sieve Area (sq. mt)</th>
                                                    <td class="widthH"><?php echo $obj->uppersieve; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <?php if ($obj->lowersieve != "") { ?>
                                                <tr>
                                                    <th class="widthH">Lower Sieve Area (sq. mt)</th>
                                                    <td class="widthH"><?php echo $obj->lowersieve; ?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <button type="button" class="btn btn-info compare_head " data-toggle="collapse"
                                            data-parent="#accordion1" href="#collapse11">STORAGE
                                    </button>
                                    <div id="collapse11" class="panel-collapse collapse in">
                                        <table class="table table-striped d20">
                                            <tbody>
                                            <?php if ($obj->graintank != "") { ?>
                                                <tr>
                                                    <th class="widthH">Grain Tank Capacity</th>
                                                    <td class="widthH"><?php echo $obj->graintank; ?></td>
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
            </div>
        </div>
        <div class="container">
            <div class="col-sm-12 col-md-12 col-xs-12 " style="margin:30px 0px">
                <h2 style="color:#148f1a;    ; font-size: 20px;margin-bottom: -18px;" class="font-upcoming"
                    class="pop_imp">Popular <span style="color:#cc0001;"> Harvester</span></h2>
                <div class="border">
                    <div class="border-inner"></div>
                </div>
                <div class="col-sm-12 col-md-12" style="padding:0px;">
                    <div class="col-item">
                        <div class="col-xs-12 col-sm-12 col-md-12 padd0 ipm"
                             style="padding-bottom:20px;padding-top:10px;">
                            <?php
                            $cond = "status=1";
                            $popularImp = resultOrdrByWhere('*', 'harvester', $cond, 'id', 'RANDOM', 4);
                            foreach ($popularImp as $vv => $cc1) {
                                ?>
                                <?php
                                $b_name = '';
                                foreach (shweta_select('name', 'brand', 'id', $cc1->brand) as $raa) $b_name = ($raa->name); ?>
                                <div class="col-md-3 col-sm-3 col-xs-12 imp_border ipm mar_news">
                                    <div class="col-md-12 col-xs-12 col-sm-12 padd0"
                                         style="border-top:none;border-left:none;box-shadow:0px 0px 2px gray;">
                                        <div class="col-xs-12 col-sm-12 col-md-12 ipm paddingZ">
                                            <div class="grid1 ipm">
                                                <div class="view view-first ipm">
                                                    <div>
                                                        <?php if ($cc1->image != "" && file_exists("./images/implementTractor/" . $cc1->image)) { ?>
                                                            <img src="<?php echo $root; ?>images/implementTractor/<?php echo $cc1->image; ?>"
                                                                 class="img-responsive"
                                                                 alt="<?php echo ucfirst($b_name); ?> <?php echo strtolower($cc1->model_name); ?> tractor harvester"
                                                                 style="border-bottom:3px solid #C99702;height: 151px;width:100%">
                                                        <?php } else { ?>
                                                            <img src="<?php echo $root; ?>images/default-image.png"
                                                                 class="img-responsive"
                                                                 alt="<?php echo ucfirst($b_name); ?> <?php echo strtolower($cc1->model_name); ?> tractor harvester"
                                                                 style="border-bottom:3px solid #C99702;height: 151px;width:100%">
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 " style="padding:0px;">
                                                <div class="col-xs-12 col-sm-12 col-md-12 "
                                                     style="padding:5px 0px 0px 0px;">
                                                    <a href="<?php echo $root; ?>harvester/<?php echo newslugend($b_name); ?>-<?php echo newslugend($cc1->slug); ?>-combine-harvester"
                                                       style="cursor:pointer;color:#2A7842;">
                                                        <h5 style="text-align:center;color:#D63334">
                                                            <b><?php echo ucfirst($b_name); ?></b></h5>
                                                    </a>
                                                    <h5 style="text-align:center;color:#D63334"><?php echo ucfirst($cc1->model_name); ?> </h5>
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo quickLinksHTML(); ?>
    </div>
    <div id="aa">
    </div>
<?php } ?>
<script src="<?php echo $root; ?>web_root/front_web_root/lightbox-plus-jquery.min.js"></script>

<script type="text/javascript">
    function RequestSentForHarvester(ImplementID, BrandName, ModelName) {
        datavar = 'impID=' + ImplementID + '&r_brand=' + BrandName + '&r_model=' + ModelName + '&req_type=harvester';
        document.getElementById('LoderImage').style.display = "block";
        $.ajax({
            type: "POST",
            url: '../ImplementTractor/ImplementReq',
            data: datavar,
            success: function (data) {
                document.getElementById('LoderImage').style.display = "none";
                location.reload();
            },
        });
    }
</script>