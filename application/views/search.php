<head>
    <?php
    $page_name = "search";
    $root = "http://" . $_SERVER['HTTP_HOST'];
    $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
 
if(isset($ad_var)){
	$page_type=$ad_var;
}else{
	$page_type="";
}
  ?>
</head>
<style>
 
@media only screen and (min-width:320px) and (max-width:768px) {
.side-thing2, .containerFilerrr{display:none;}
.bannerStleye{height: auto !important;}
.contaimer_bb{    padding: 0px 6px!important;}
.singleTract_adMobile {
    margin-top: 13px;    margin-bottom: 11px;
}
.borderTopMob{        border-top: 0px !important;}
.box-wrapper {
    padding: 3px;
}
.contentFti{display:block !important;}
.labbelNewTra{    display: block !important;
    position: absolute;
    text-align: center;
    width: 100%;
    color: #db4c4d;
    font-weight: 700;
    font-size: 20px;
    text-shadow: 1px 2px 3px #ddd;;}
}
.bannerStleye{
	background:rgba(204, 0, 1, 0.7) none repeat scroll 0% 0%;height:105px;
}
.boxshawFilter{
	padding: 5px;
    padding-top: 5px;
    padding-bottom: 5px;
text-align: center;
font-weight: 700;
padding-top: 8px;
padding-bottom: 0px;
box-shadow: 1px 2px 2px #ddd;

}
.selVox{border: 0px;width: 58%;}
.contaimer_bb{padding: 0px 30px;margin-top:-55px;background:transparent;}
.labbelNewTra, .contentFti{display:none;}
</style>
<body>


<div class="container-fluid paddingZ">
    <div class="banner bannerStleye">
        <div class="container">
            <div class="col-sm-12 col-md-12" style="padding:15px 0px;">
                <ul type="none" style="color:#fff">
                    <li style="float:left;padding-right:5px;"><i class="fa fa-home"
                                                                 style="font-size:16px;padding-right:5px;"></i>Home
                    </li>
                    <li style="float:left;padding-right:5px;">/</li>
                    <li style="float:left;padding-right:5px;">New Tractors


                    </li>
                </ul>
            </div>
        </div>
    </div>
	
                    <?php if ($tractor_page == 1) { ?>
<div class="col-md-12 col-sm-12 paddingZ contentFti">
<div class="col-md-6 col-sm-6 col-xs-6 paddingZ boxshawFilter">
<p>
	<i class="fa fa-filter" aria-hidden="true"></i> 
	<select class="selVox" id="brand_id" onchange="filterTractorFunForMObile()">
		<option selected value="">Brand</option>
		<?php $condBrand = "type LIKE '%tractor%'";
		foreach (Select_OrderBy_brand('*', 'brand', $condBrand, 'name', 'ASC') as $res => $obj) { ?>
		<option value="brand:<?php echo $obj->id; ?>"><?php echo ucfirst($obj->name); ?></option>
		<?php } ?>
	</select>
</p>
</div>
<div class="col-md-6 col-sm-6 col-xs-6 paddingZ boxshawFilter">
 
 
<p>
 
	<select class="selVox" id="price_range_id"  onchange="filterTractorFunForMObile()" style="width:100%;padding-left: 12px;">
		<option selected value=""> ₹ Price Range</option>
<?php
foreach (shweta_select('*', 'price_range', '', '') as $res => $obj) {
if ($obj->first == "1") {
?>
<option value="price:<?php echo $obj->first; ?>-<?php echo $obj->second; ?>">
Below <?php echo $obj->second; ?> Lac </option>
<?php
} else {
?>
<option value="price:<?php echo $obj->first; ?>-<?php echo $obj->second; ?>"> <?php echo $obj->first; ?>
Lac - <?php echo $obj->second; ?> Lac</option>
<?php
}
}
?>
	</select>
</p>
 
 
</div>
</div>
					<?php } ?>
    <div class="container contaimer_bb" style="">
        <div class="col-sm-12 col-md-12 col-xs-12 paddingZ">
		<?php 
		$mahindra_ad_show=MahindraAd();
if($page_type == 'brand' && $mahindra_ad_show=='1'){
		?>
<div class="col-sm-12 col-md-12 col-xs-12 paddingZ singleTract_adMobile">

<a target="_blank" href="<?php echo MahindraAdLink('55','mahindra-tractors','search_tractors'); ?>">
	<img class="img-responsive" src="<?php echo $root; ?>web_root/mahindra/brand_mobile.gif" alt="Mahindra Tractor | Tractorjunction" title="Mahindra Tractor | Tractorjunction">
</a>

       
</div>
<?php } ?>	<?php 
		
if($page_type == 'new_tractor'&&  $mahindra_ad_show=='1'){
		?>
<div class="col-sm-12 col-md-12 col-xs-12 paddingZ singleTract_adMobile">

<a target="_blank" href="<?php echo MahindraAdLink('55','mahindra-tractors','search_tractors'); ?>">
	<img class="img-responsive" src="<?php echo $root; ?>web_root/mahindra/new_tractor_mobile.jpg" alt="Mahindra Tractor | Tractorjunction" title="Mahindra Tractor | Tractorjunction">

</a>

       
</div>
<?php } ?>
            <div class="box-wrapper" id="" style="float:left;width:100%">
			
                <div class="col-sm-12 col-md-12 col-xs-12 containerFilerrr" style="padding:14px 0px;background:white">
                    <div class="col-sm-12 col-md-2 col-xs-12">

                        <h1 class="TractorLabel"> Tractors in India</h1>
                    </div>

                    <?php if ($tractor_page == 1) { ?>


                        <div class="col-sm-12 col-md-10 col-xs-12 pull-right">

                            <div class="filter_box">
                                <div class="sort-sortBy pull-right" onclick="showfilterFun('brandUL')"> Brands <span
                                            class="pull-right"><i class="fa fa-arrow-down"
                                                                  aria-hidden="true"></i></span>
                                </div>
                                <ul class="sort-list DispalYnoenBlock" id="brandUL">
                                    <?php $condBrand = "type LIKE '%tractor%'";
                                    foreach (Select_OrderBy_brand('*', 'brand', $condBrand, 'name', 'ASC') as $res => $obj) { ?>
                                        <li><label class="sort-label">

                                                <?php echo form_input(array('type' => 'checkbox', 'value' => 'brand:' . $obj->id, 'class' => 'chbox', 'onchange' => 'filterTractorFun()')); ?>
                                                &nbsp;&nbsp;<?php echo ucfirst($obj->name); ?></label></li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>

                            <div class="filter_box">
                                <div class="sort-sortBy pull-right" onclick="showfilterFun('price_range')"> Price Range
                                    <span class="pull-right"><i class="fa fa-arrow-down" aria-hidden="true"></i></span>
                                </div>
                                <ul class="sort-list DispalYnoenBlock priceCls" id="price_range">
                                    <?php
                                    foreach (shweta_select('*', 'price_range', '', '') as $res => $obj) {
                                        if ($obj->first == "1") {
                                            ?>
                                            <li><label class="sort-label">
                                                    <input onchange="filterTractorFun();" type="checkbox" class="chbox"
                                                           value="price:<?php echo $obj->first; ?>-<?php echo $obj->second; ?>">&nbsp;&nbsp;
                                                    Below <?php echo $obj->second; ?> Lac </label></li>
                                            <?php
                                        } else {
                                            ?>
                                            <li><label class="sort-label"><input onchange="filterTractorFun();"
                                                                                 type="checkbox" class="chbox"
                                                                                 value="price:<?php echo $obj->first; ?>-<?php echo $obj->second; ?>">&nbsp;&nbsp; <?php echo $obj->first; ?>
                                                Lac - <?php echo $obj->second; ?> Lac</label></li>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                            <div class="filter_box">
                                <div class="sort-sortBy pull-right" onclick="showfilterFun('HorsePower')"> HorsePower
                                    <span class="pull-right"><i class="fa fa-arrow-down" aria-hidden="true"></i></span>
                                </div>
                                <ul class="sort-list DispalYnoenBlock hpCls" id="HorsePower">
                                    <?php
                                    foreach (shweta_select('*', 'hp_range', '', '') as $res => $obj) {
                                        if ($obj->first == "1") {
                                            ?>
                                            <li><label class="sort-label"><input onchange="filterTractorFun();"
                                                                                 type="checkbox" class="chbox"
                                                                                 value="hp:<?php echo $obj->first; ?>-<?php echo $obj->second; ?>">&nbsp;&nbsp;Up
                                                    To <?php echo $obj->second; ?> HP</label></li>
                                            <?php
                                        } else {
                                            ?>
                                            <li><label class="sort-label"><input onchange="filterTractorFun();"
                                                                                 type="checkbox" class="chbox"
                                                                                 value="hp:<?php echo $obj->first; ?>-<?php echo $obj->second; ?>">&nbsp;&nbsp;<?php echo $obj->first; ?>
                                                    - <?php echo $obj->second; ?> HP</label></li> <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>


                        </div>

                        <?php
                    }
                    ?>

                </div>
                <div class="ipm borderTopMob" style="float: left;
width: 100%;
background: white;
border-top: 12px solid #f5f5f5;
padding: 10px;">
<p class="labbelNewTra">New Tractors</p>
                    <div class="col-md-12 paddingZ" id="filter_result" style="padding-top:10px;">

                        <?php  echo TractorShowHTML($tractor_result['result'],$page_type); ?>


                    </div>
					<?php if($tractor_page == 1){ ?>
                    <div class="pagination" id="pagination" style="float:right; margin-top: 13px;">
                        <ul class="pagination" style="margin:-4px 0px -23px 0px !important;">
                            <?php echo $tractor_result['links']; ?>
                        </ul>
                    </div>
					<?php } ?>

                </div>

            </div>

        </div>
    </div>
<input type="hidden" value="<?php echo $page_type; ?>" id="page_type">

    <?php echo quickLinksHTML(); ?>


</div>
</div>
</body>
<script type="text/javascript">

    function filterTractorFun() {

        var chkArray = [];
        $(".chbox:checked").each(function () {
            chkArray.push($(this).val());
        });
		var page_type=$("#page_type").val();
		// alert(chkArray);
        document.getElementById('LoderImage').style.display = "block";
        $.ajax({
            type: "POST",
            url: 'Filter_search',
            data: {val: chkArray, page_type1: page_type},
            success: function (data) {

                document.getElementById('LoderImage').style.display = "none";
                document.getElementById('pagination').style.display = "none";
                $("#filter_result").html(data);
            },
        });
    }

    function showfilterFun(divID) {
        $("#" + divID).toggleClass('DispalYnoenBlock')
    }
</script>
<script>
	    function filterTractorFunForMObile() {
var brand_value=$("#brand_id").val();
var price_range=$("#price_range_id").val();
        var chkArray = [];
        // $(".chbox:checked").each(function () {
			if(brand_value !=""){
            chkArray.push(brand_value);
			}if(price_range !=""){
            chkArray.push(price_range);
			}
        // });
	 
		// alert(chkArray);
		// chkArray.replace(',','');
        document.getElementById('LoderImage').style.display = "block";
        $.ajax({
            type: "POST",
            url: 'Filter_search',
            data: {val: chkArray},
            success: function (data) {

                document.getElementById('LoderImage').style.display = "none";
                document.getElementById('pagination').style.display = "none";
                $("#filter_result").html(data);
            },
        });
    }
</script>
