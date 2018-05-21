<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
foreach ($result as $key => $obj) {
}
?>
<link rel="stylesheet" href="<?php echo $root; ?>css/lightbox.css">
<div class="banner" style="background:rgba(204, 0, 1, 0.7) none repeat scroll 0% 0%;height:105px;">
    <div class="container">
        <div class="col-sm-12 col-md-12 col-xs-12" style="padding:15px 0px;">
            <ul type="none" style="color:#fff">
                <li style="float:left;padding-right:5px;"><i class="fa fa-home"
                                                             style="font-size:16px;padding-right:5px;"></i>Home
                </li>
                <li style="float:left;padding-right:5px;">/</li>
                <li style="float:left;padding-right:5px;">Implement details</li>
            </ul>
        </div>
    </div>
</div>
<div class="container d1 margin_imp_over">
    <div class="col-sm-8 col-md-8 col-xs-12 paddingZ b1 ipm" style="padding-right:13px">
        <div class="box-wrapper">
            <div class="box1">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-xs-12 liine_hei" style="line-height: 41px;">
                        <h1 class="d10" style="margin-left:0px;text-align: center;">
                            <i class="fa fa-get-pocket"> </i>
                            <?php
                            $brandName = '';
                            foreach (shweta_select('name', 'brand', 'id', $obj->brand) as $raa) echo $brandName = ucfirst($raa->name); ?>
                            <?php
                            ?> <span style="color:#148F1A"><?php echo ucfirst($obj->model_name); ?></span>
                        </h1>
                        <div class="col-sm-12 col-md-12 col-xs-12 paddingZ padding_singletractor singletractor_style">
                            <div class="col-sm-12 col-md-12 col-xs-12 paddingZ ">
								<span class="d6">
								<i class="fa fa-tag" style="margin-right:12px"></i>
								<span class="d7">Brand Name</span> :
                                    <?php foreach (shweta_select('name', 'brand', 'id', $obj->brand) as $raa) echo ucfirst(strtolower($raa->name)); ?></span>
                            </div>
                            <div class="col-sm-12 col-md-12 col-xs-12 paddingZ">
								<span class="d6">
								<i class="fa fa-cubes" style="margin-right:12px"></i>
								<span class="d7">Model Name</span> : <?php echo ucfirst(strtolower($obj->model_name)); ?></span>
                            </div>
                            <?php if ($obj->implementType != "") { ?>
                                <div class="col-sm-6 col-md-6 col-xs-12 paddingZ">
								<span class="d6">
								<i class="fa fa-tachometer" style="margin-right:12px"></i>
								<span class="d7">Implement Type</span> :
                                    <?php foreach (shweta_select('name', 'filed', 'id', $obj->implementType) as $raa) echo ucfirst($raa->name); ?>
								</span>
                                </div>
                            <?php } ?>
                            <?php if ($obj->implement_cate != "") { ?>
                                <div class="col-sm-6 col-md-6 col-xs-12 paddingZ">
								<span class="d6">
								<i class="fa fa-wrench" style="margin-right:12px"></i>
								<span class="d7">Category</span> :
                                    <?php foreach (shweta_select('name', 'implement_type_cate', 'id', $obj->implement_cate) as $raa) echo ucfirst($raa->name); ?>
								</span>
                                </div>
                            <?php } ?>
                            <?php if ($obj->tractorPower != "") { ?>
                                <div class="col-sm-6 col-md-6 col-xs-12  paddingZ">
								<span class="d6">
								<i class="fa fa-bolt" style="margin-right:12px"></i>
								<span class="d7">Implement Power</span> :
                                    <?php echo ucfirst($obj->tractorPower); ?>
								</span>
                                </div>
                            <?php } ?>
                            <?php if ($obj->price != "") { ?>
                                <div class="col-sm-6 col-md-6 col-xs-12  paddingZ">
								<span class="d6">
								<i class="fa fa-inr" style="margin-right:12px"></i>
								<span class="d7">Implement Price*</span> :
                                    <?php echo ucfirst($obj->price); ?>
								</span>
                                </div>
                            <?php } ?>
							
                        </div>
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
	<?php 
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
OnRoadModelHarverster('on_road_request','implement',$brandName,$obj->model_name,$obj->id,$actual_link); 
OnRoadModelHarverster('demo_request','implement',$brandName,$obj->model_name,$obj->id,$actual_link); 
 
?>
    <div class="col-sm-4 col-md-4 col-xs-12 paddingZ b1">
        <div class="box-wrapper">
            <div class="box11">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-xs-12">
                        <div class="col-sm-12 col-md-12 col-xs-12 ipm">
                            <a class="example-image-link"
                               href="<?php echo $root; ?>images/implementTractor/<?php echo $obj->image; ?>"
                               data-lightbox="example-set">
                                <img src="<?php echo $root; ?>images/implementTractor/<?php echo $obj->image; ?>"
                                     class="img-responsive "
                                     style="width:100%;height:175px;border: 1px solid rgb(238, 238, 238);"
                                     alt="<?php foreach (shweta_select('name', 'brand', 'id', $obj->brand) as $raa) echo ucfirst($raa->name); ?> <?php echo strtolower($obj->model_name); ?> tractor implement"/>
                            </a>
                        </div>
                        <?php
                        if ($obj->gallery != "") {
                            ?>
                            <div class="col-sm-12 col-md-12 col-xs-12" style="margin:10px 0px">
                                <?php
                                $gallery_array = array();
                                $gallery_array = explode('$$', $obj->gallery);
                                foreach ($gallery_array as $image) {

                                    if (file_exists("./images/implementTractor/" . $image)) { ?>
                                        <div class="col-sm-12 col-md-12 col-xs-12">
                                            <a class="example-image-link"
                                               href="<?php echo $root; ?>images/implementTractor/<?php echo $image; ?>"
                                               data-lightbox="example-set">
                                                <img src="<?php echo $root; ?>images/implementTractor/<?php echo $image; ?>"
                                                     alt="<?php foreach (shweta_select('name', 'brand', 'id', $obj->brand) as $raa) echo ucfirst(strtolower($raa->name)); ?> <?php echo $obj->model_name; ?> tractor implement"
                                                     class="img-responsive "
                                                     style="border: 2px solid rgb(238, 238, 238);width:100%;height:60px"/>
                                            </a>
                                        </div>
                                        <?php
                                    }
                                } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <h3 class="d3" style="margin-top:20px">
                    <?php foreach (shweta_select('name', 'brand', 'id', $obj->brand) as $raa) echo ucfirst($raa->name); ?>
                    &nbsp;<?php echo ucfirst($obj->model_name); ?>
                </h3>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="col-sm-12 col-md-12 col-xs-12 paddingZ b1" style="padding-right:13px">
        <div class="box-wrapper">
            <div class="box1">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-xs-12">
                        <div class="col-md-12 col-sm-12 col-xs-12 paddingZ">
                            <?php if ($obj->overview != "") { ?>
                                <h4 style="padding:14px 8px;text-align: justify;">
                                    <b> Overview : &nbsp;</b>
                                    <span class="font_imp" style="line-height:23px;font-size:15px ;">
								<?php echo ucfirst(($obj->overview)); ?>
							</span>
                                </h4>
                            <?php } ?>
                            <div class="col-sm-12 col-xs-12 col-md-12 paddingZ">
                                <?php
                                $spesVal = shweta_select('*', 'implementvalue', 'ImpId ', $obj->id);
                                if (!empty($spesVal)) {
                                    ?>
                                    <div class="col-sm-12 col-md-12 col-xs-12 paddingZ">
                                        <div class="col-sm-12 col-md-12 col-xs-12">
                                            <ul class="nav nav-tabs single-nav" id="maincontent" role="tablist">
                                                <li class="active"><a href="#features" role="tab" data-toggle="tab"
                                                                      class="hvr-bubble-bottom"></a></li>
                                            </ul><!--/.nav-tabs.content-tabs -->
                                            <div class="tab-content">
                                                <div class="tab-pane fade in active d19" id="features">
                                                    <div class="panel-group" id="accordion1">
                                                        <div class="panel panel-default">
                                                            <button type="button" class="btn btn-info compare_head "
                                                                    data-toggle="collapse" data-parent="#accordion1"
                                                                    href="#collapse1">Key Specification
                                                            </button>
                                                            <div id="collapse1" class="panel-collapse collapse in">
                                                                <table class="table table-striped d20">
                                                                    <tbody>
                                                                    <?php
                                                                    foreach ($spesVal as $raa => $bb1) {
                                                                        $featurenameval = array();
                                                                        $ImpName = array();
                                                                        $featurenameval = explode('$$', $bb1->impName);
                                                                        $ImpName = (array_filter($featurenameval));
                                                                        $featurename = array();
                                                                        $ImpValue = array();
                                                                        $featurename_count = "";
                                                                        $featurename = explode('$$', $bb1->ImpValue);
                                                                        $ImpValue = (array_filter($featurename));
                                                                    }
                                                                    $i = 0;
                                                                    foreach ($ImpName as $Name) {
                                                                        if (isset($ImpValue[$i])) {
                                                                            if ($ImpValue[$i] != 'N/A') {
                                                                                if ($Name != 'N/A') {
                                                                                    ?>
                                                                                    <tr>
                                                                                        <th class="widthH"><?php echo ucfirst($Name); ?></th>
                                                                                        <td class="widthH"><?php echo $ImpValue[$i]; ?></td>
                                                                                    </tr>
                                                                                    <?php
                                                                                }
                                                                            }
                                                                        }
                                                                        $i++;
                                                                    }
                                                                    ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!--/.tab-pane -->
                                            </div>

                                        </div>
                                    </div>
                                <?php } ?>
                                <?php if ($obj->specImge != "") { ?>
                                    <div class="col-sm-12 col-md-12 ">
                                        <a class="example-image-link"
                                           href="<?php echo $root; ?>images/implementTractor/<?php echo $obj->specImge; ?>"
                                           data-lightbox="example-set">
                                            <img class="singleotherimplement2" class="example-image img-responsive"
                                                 src="<?php echo $root; ?>images/implementTractor/<?php echo $obj->specImge; ?>"
                                                 alt="tractor specification image"/></a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="container">
    <div class="col-sm-12 col-md-12 col-xs-12" style="margin:30px 0px">
        <h2 style="color:#148f1a;font-size:19px;margin-bottom:-18px;" class="font-upcoming" class="pop_imp">Popular
            <span style="color:#cc0001;"> Tractor Implements</span></h2>
        <div class="border">
            <div class="border-inner"></div>
        </div>
        <div class="col-sm-12 col-md-12" style="padding:0px;">
            <div class="col-item">
                <div class="col-xs-12 col-sm-12 col-md-12 padd0 ipm" style="padding-bottom:20px;padding-top:10px;">
                    <?php
                    $cond = "status=1";
                    $popularImp = resultOrdrByWhere('*', 'new_implement', $cond, 'id', 'RANDOM', 4);
                    foreach ($popularImp as $vv => $cc1) {
                        ?>
                        <?php
                        $b_name = '';
                        foreach (shweta_select('name', 'brand', 'id', $cc1->brand) as $raa) $b_name = ($raa->name); ?>
                        <div class="col-md-3 col-sm-3 col-xs-12 imp_border ipm mar_news">
                            <div class="col-md-12 col-xs-12 col-sm-12 ipm padd0 "
                                 style="border-top:none;border-left:none;box-shadow:0px 0px 2px gray;height: 280px;">
                                <div class="col-xs-12 col-sm-12 col-md-12 ipm paddingZ">
                                    <div class="grid1">
                                        <div class="view view-first">
                                            <div>
                                                <img src="<?php echo $root; ?>images/implementTractor/<?php echo $cc1->image; ?>"
                                                     class="img-responsive"
                                                     alt="<?php echo ucfirst($b_name); ?> <?php echo strtolower($cc1->model_name); ?> tractor harvester"
                                                     style="border-bottom:3px solid #C99702;height: 151px;width:100%">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 " style="padding:0px;">
                                        <div class="col-xs-12 col-sm-12 col-md-12 " style="padding:5px 0px 0px 0px;">
                                            <a href="<?php echo $root; ?>implement/<?php echo newslugend($b_name); ?>-<?php echo newslugend($cc1->slug); ?>">
                                                <h5 style="text-align:center;color:#D63334">
                                                    <b><?php echo ucfirst($b_name); ?></b></h5>
                                            </a>
                                            <h5 style="text-align:center;color:#D63334"><?php echo ucfirst($cc1->model_name); ?> </h5>
                                            <h5 style="text-align:center;color:#D63334"><?php foreach (shweta_select('name', 'implement_type_cate', 'id', $cc1->implement_cate) as $raa) echo ucfirst($raa->name); ?> </h5>
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
<div class="container " style="margin-top:40px;">
    <div class="col-md-12 col-sm-12 col-xs-12 ipm">
        <h4 style="color:#148f1a;font-size:20px;margin-bottom:-18px;" class="font-upcoming">Implements <span
                    style="color:#cc0001;"> Links</span></h4>
        <div class="border">
            <div class="border-inner"></div>
        </div>
        <?php
        foreach (randomSelecxt('*', 'filed', '', 12) as $se => $se1) {
            ?>
            <div class="col-md-3 col-sm-2" style="margin-bottom: 15px;">
                <a style="color:#4d4d4d" href="<?php echo $root . "tractor-implements" ?>/<?php echo $se1->slug; ?>">
                    <button class="imp_but" style="padding:5px"><i
                                class="fa fa-cog"></i> <?php echo ucfirst($se1->name); ?>
                        (<?php
                        echo count(shweta_select('id', 'new_implement', 'implementType', $se1->id));
                        ?>)
                    </button>
                </a>
            </div>
        <?php } ?>
    </div>
    <?php echo quickLinksHTML(); ?>
</div>
<div class="modal fade" id="SendReqModel" role="dialog">
    <div class="modal-dialog" style="width: 50%;margin-top:150px;">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="fa fa-road" style="margin-right:5px;"></i>Interested
                    in <?php echo $brandName; ?> <?php echo $obj->model_name; ?></h4>
            </div>
            <div class="modal-footer">
                <div class="modal-body">
                    <div class="col-sm-12 col-md-12" style="padding:15px;">
                        <p class="text-center" style="font-size:15px;color: rgb(30, 81, 32);">
                            If you have any query or question regarding this product, which you want to ask from us then
                            just
                            send your request to us. We will be more than happy to help you find the appropriate
                            implement for your farm!
                            <br>
                            <br>
                            <span style="color:rgb(219, 76, 76);font-size: 16px;">Click Yes if you want to continue, we might already have the solution for you??</span>
                        </p>
                        <p class="text-center" style="font-size:25px;color:#148F1A;">
                        </p>
                        <button style="float: none;" class="btn btn-info btn-lg singleP_compare"
                                onclick="RequestSentForImplement('<?php echo $obj->id; ?>','<?php echo $brandName; ?>','<?php echo $obj->model_name; ?>');">
                            Yes
                        </button>
                        <button type="button" style="float: none;" class="btn btn-info btn-lg singleP_compare"
                                data-dismiss="modal">No
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo $root; ?>js/lightbox-plus-jquery.min.js"></script>