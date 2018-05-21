<?php
$att = "style='margin-bottom: 0px;padding: 7px 0px !important;'";
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
?>
<style>
@media only screen and (min-width:320px) and (max-width:768px) {
    .container{padding: 0px !important;}
    .border{padding: 0px !important;

margin: 0px !important;

    margin-top: 0px;
    margin-bottom: 0px;

margin-top: 12px !important;

margin-bottom: 12px !important;}
.tractorByBrand{
    margin-bottom: 0px !important;

padding-top: 0px !important;

margin-top: 0px !important;
}
.marginZeroMob{margin: 0px !important;}
.oldTractorHome{display: none !important;}
#footer-wrap {
    padding: 0px !important;padding-left: 15px !important;
}
.navbar-toggle{margin-right: 28px !important;}
.navbar-nav {
   padding-left: 22px;

}
}
</style>

<div class="col-md-12 col-sm-12 col-xs-12 HomeSlA1">
<div class="container paddingL">
<div class="col-md-8 col-sm-12 col-xs-12 PaddingZRes marfTOP">
<p class="TractorDhkoText">
<span class="DhekoText">Dekho</span>
<span class="YpourText">Your</span>
<br> 
<span class="DhjoTrc">Tractor</span>
</p>
<p class="BtMAR MatTopBt">
<a class="HomePgaeButton TractVTRes" href="<?php echo $root; ?>tractors">TRACTORS</a>
<a class="HomePgaeButton HreVBT TractVTRes FloatRightRs" href="<?php echo $root; ?>tractors">HARVESTERS</a>
</p>
</div>
<div class="col-md-4 col-sm-12 col-xs-12 SearcBBx PaddingZRes MarTopZ">
<div class="SearchBoxHomePage">
<h1 class="SearchRightTractror">Search the Right <span class="RedColor">Tractor</span></h1>
<?php echo form_open('tractor-models'); ?>
<select name="hp_name" class="form-control SelectHpCls">
<option style="color:black" value="0">Select HP</option>
<?php
                            foreach (shweta_select('*', 'hp_range', '', '') as $res => $obj) {
                                if ($obj->first == "1") {
                                    ?>
<option style="color:black" value="hp:<?php echo $obj->first; ?>-<?php echo $obj->second; ?>">
UpTo <?php echo $obj->second; ?> HP
</option>
<?php } else { ?>
<option style="color:black" value="hp:<?php echo $obj->first; ?>-<?php echo $obj->second; ?>"><?php echo $obj->first; ?>
HP - <?php echo $obj->second; ?> HP
</option>
<?php }
                            }
                            ?>
</select>
<?php
                        $condBrand = "type LIKE '%tractor%'";
                        $cc[0] = 'Select Brand';
                        foreach (Select_OrderBy_brand('*', 'brand', $condBrand, 'name', 'ASC') as $r => $t) {
                            $cc[$t->id] = ucfirst($t->name);
                        }
                        $js5 = 'class="form-control SelectHpCls"';
                        echo form_dropdown('brand_name', $cc, '', $js5);
                        ?>
<div class="ButttonCL">                     
                        <button type="submit" class="HomePgaeButton SearcBT"><i class="fa fa-search"></i> Search</button>
</div>
<?php    echo form_close(); ?>
</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12 GrowingGreenText">
<p class="GrowingGreenText">Growing green fields and a green environment</p>
<p class="BtMAR">
<a class="HomePgaeButton" href="<?php echo $root; ?>tractor-implements">Implements</a>
<a class="HomePgaeButton" href="<?php echo $root; ?>tractor-news">News & Updates</a>
<a class="HomePgaeButton" href="<?php echo $root; ?>tractor-customer-care">Customer Care</a>
</p>
</div>
</div>
</div>





<div class="col-sm-12 col-xs-12 adsDiv ads1">
<p class="advertisementLabel">Advertisement</p>
<a href="<?php echo $root; ?>search-tractor/75/farmtrac">
<img src="<?php echo $root; ?>web_root/advertisments/farmtrac_tractor_ad1.jpg" alt="Farmtrac tractor" class="img-responsive">
</a>
</div>
<div class="container-fluid paddingZ">
<div class="container" style="margin-bottom:20px">
<div class="col-sm-12 col-md-12 col-xs-12" style="margin-top:3%">
<h4 style="color:#148f1a;font-size:19px;margin-bottom:-18px" class="font-upcoming max_mar headingHomeMob">Upcoming <span style="color:#cc0001">Tractors</span> in 2018</h4>
<div class="border">
<div class="border-inner"></div>
</div>
<ul class="nav nav-tabs" id="maincontent" role="tablist">
<li class="active"><a href="#popular" role="tab" data-toggle="tab">POPULAR</a></li>
<li><a href="#latest" role="tab" data-toggle="tab">LATEST</a></li>
<li><a href="#upcoming" role="tab" data-toggle="tab">UPCOMING</a></li>
</ul>
<?php 
 
$jhon_dheer_D=array(
'jd_ad_home_1','jd_ad_home_2','jd_ad_home_3',
);
$jhon_dheer_single_D = array_rand($jhon_dheer_D);
$jhon_dheer_value_image_D = $jhon_dheer_D[$jhon_dheer_single_D];
// echo $jhon_dheer_value_image_D;
// die;
?>
<div class="tab-content">
<div class="popularTab tab-pane fade in active padding_0_in_small bor" id="popular">
<?php echo POPLatUpHTMLHOme($populorTractor,$jhon_dheer_value_image_D); ?>



<div class="col-md-12 col-sm-12 col-xs-12 CenterBT" style="margin:30px 0 0">
    <a href="<?php echo $root; ?>popular-tractors" class="viewNewsbt">
        View more Popular Tractor
    </a>
</div>


</div>
<div class="popularTab tab-pane fade padding_0_in_small" id="latest">
<?php echo POPLatUpHTMLHOme($latestTractor,$jhon_dheer_value_image_D); ?>


<div class="col-md-12 col-sm-12 col-xs-12 CenterBT" style="margin:30px 0 0">
    <a href="<?php echo $root; ?>latest-tractors" class="viewNewsbt">
        View more Latest Tractor
    </a>
</div>


</div>
<div class="popularTab tab-pane fade padding_0_in_small" id="upcoming">
<?php echo POPLatUpHTMLHOme($UpcomingTractor,$jhon_dheer_value_image_D); ?>


<div class="col-md-12 col-sm-12 col-xs-12 CenterBT" style="margin:30px 0 0">
    <a href="<?php echo $root; ?>upcoming-tractors" class="viewNewsbt">
        View more Upcoming Tractor
    </a>
</div>



</div>
</div>
</div>
</div>



    <div class="container">
        <div class="col-sm-12 col-md-12 col-xs-12" style="margin:0px 0">
            <h2 style="color:#148f1a;font-size:19px;margin-bottom:-18px" class="font-upcoming pop_imp tractorByBrand">
                Tractors <span style="color:#cc0001"> By Brand</span></h2>
            <div class="border">
                <div class="border-inner"></div>
            </div>
            <div class="col-sm-12 col-md-12 col-xs-12" style="padding:0px">
                <div class="col-item">
                    <div class="col-xs-12 col-sm-12 col-md-12 padd0 ipm" style="padding:10px 0px;">
                        <?php
                        $tractorBrand=array();
                        $tractorBrand[]=array(
                        'brand_name'=>'Mahindra',
                        'url'=>$root.'search-tractor/55/mahindra',
                        'image_url'=>$root.'web_root/tractor_brand/mahindra.png'
                        ); 
                        $tractorBrand[]=array(
                        'brand_name'=>'Farmtrac Tractor',
                        'url'=>$root.'search-tractor/75/farmtrac',
                        'image_url'=>$root.'web_root/tractor_brand/farmtrac.png'
                        ); 
                        $tractorBrand[]=array(
                        'brand_name'=>'Massey Ferguson',
                        'url'=>$root.'search-tractor/74/massey-ferguson',
                        'image_url'=>$root.'web_root/tractor_brand/massey-ferguson-logo.jpg'
                        ); 
                        $tractorBrand[]=array(
                        'brand_name'=>'John Deere',
                        'url'=>$root.'search-tractor/59/john-deere',
                        'image_url'=>$root.'web_root/tractor_brand/jhon_deer.png'
                        ); 
                        $tractorBrand[]=array(
                        'brand_name'=>'Sonalika ',
                        'url'=>$root.'search-tractor/57/sonalika',
                        'image_url'=>$root.'web_root/tractor_brand/sonalika.png'
                        ); 
                       
  $tractorBrand[]=array(
                        'brand_name'=>'Powertrac ',
                        'url'=>$root.'search-tractor/76/powertrac',
                        'image_url'=>$root.'web_root/tractor_brand/powertrac.gif'
                        ); 

                        $tractorBrand[]=array(
                        'brand_name'=>'Force ',
                        'url'=>$root.'search-tractor/66/force',
                        'image_url'=>$root.'web_root/tractor_brand/force.png'
                        ); 
                       

                        $tractorBrand[]=array(
                        'brand_name'=>'Swaraj ',
                        'url'=>$root.'search-tractor/58/swaraj',
                        'image_url'=>$root.'web_root/tractor_brand/SwarajLogo.png'
                        ); 
                        $tractorBrand[]=array(
                        'brand_name'=>'Eicher ',
                        'url'=>$root.'search-tractor/56/eicher',
                        'image_url'=>$root.'web_root/tractor_brand/eicher.png'
                        ); 
                        $tractorBrand[]=array(
                        'brand_name'=>'Kubota ',
                        'url'=>$root.'search-tractor/63/kubota',
                        'image_url'=>$root.'web_root/tractor_brand/kubota.png'
                        ); 
                       
 $tractorBrand[]=array(
                        'brand_name'=>'New Holland',
                        'url'=>$root.'search-tractor/62/new-holland',
                        'image_url'=>$root.'web_root/tractor_brand/new_halland.png'
                        ); 

                        $tractorBrand[]=array(
                        'brand_name'=>'VST Shakti',
                        'url'=>$root.'search-tractor/71/vst-shakti',
                        'image_url'=>$root.'web_root/tractor_brand/vst-shakti.jpg'
                        ); 
                        foreach ($tractorBrand as $value) {
                            ?>
                            <div class="col-sm-4 col-md-2 col-xs-4 tractbrandsHome">
<a target="_blank" href="<?php echo $value['url']; ?>">
                                <p class="BrandIgMar">
<img onerror="imgError(this)" src="<?php echo $value['image_url']; ?>" alt="<?php echo $value['brand_name']; ?>" title="<?php echo $value['brand_name']; ?>" class="img-responsive">
                                </p>   <p style="color: #dd4445;
    font-weight: 700;    margin-top: 0px;
    padding: 0px;"  class=""> <?php echo $value['brand_name']; ?></p>
                                </a></div>
                    <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
   
<div class="col-sm-12 col-xs-12 adsDiv ads1">
<p class="advertisementLabel">Advertisement</p>
<?php 
$jhon_dheer=array(
'jd_ad_home_mobile_1.jpg','jd_ad_home_mobile_2.png','jd_ad_home_mobile_3.png'
);
 
$jhon_dheer_single = array_rand($jhon_dheer);
$jhon_dheer_value_image = $jhon_dheer[$jhon_dheer_single];
?>
<a href="<?php echo $root; ?>search-tractor/59/john-deere" target="_blank">
<img src="<?php echo $root; ?>web_root/jhon_dheer/<?php echo $jhon_dheer_value_image; ?>" alt="Jhon Dheer tractor" class="img-responsive">
</a>
</div>


<div class="container">
<div class="col-sm-12 col-md-12 col-xs-12 marginZeroMob" style="margin:30px 0;    margin-top: 5px;">
<h2 style="color:#148f1a;font-size:19px;margin-bottom:-18px" class="font-upcoming pop_imp tractorByBrand">
Popular <span style="color:#cc0001"> Tractor Implements</span></h2>
<div class="border">
<div class="border-inner"></div>
</div>
<div class="col-sm-12 col-md-12 col-xs-12" style="padding:0px">
<div class="col-item">
<div class="col-xs-12 col-sm-12 col-md-12 padd0 ipm" style="padding:10px 0px;">
<?php
                        foreach ($new_implement as $key => $value) {
                            $BrandName = '';
                            $implement_cate = '';
                            foreach (SelectQuery('name', 'brand', 'id', $value->brand) as $ke => $val) $BrandName = ($val->name);
                            foreach (shweta_select('name', 'implement_type_cate', 'id', $value->implement_cate) as $raa) $implement_cate = ucfirst($raa->name);
                            ?>
<div class="col-md-3 col-sm-3 col-xs-12 imp_border ipm bo paddingZ">
<div class="col-md-12 col-xs-12 col-sm-12 padd0 ipm" style="border-top:0;border-left:none;box-shadow:0 0 2px gray;padding:0">
<div class="col-xs-12 col-sm-12 col-md-12 ipm" style="padding:0px">
<div class="grid1">
<div class="view view-first">
<div>
<img onerror="imgError(this)" src="<?php echo $root; ?>images/implementTractor/<?php echo $value->image; ?>" class="PopularTrctorIMG" alt="<?php echo $BrandName; ?> <?php echo $implement_cate; ?> <?php echo $value->model_name; ?>">
</div>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12" style="padding:0;padding-bottom:22px;padding-top:14px">
<div class="col-xs-12 col-sm-12 col-md-12" style="padding:5px 0 0 0">
<a class="onlyUnderlImneAtag" href="<?php echo $root; ?>implement/<?php echo newslugend($BrandName); ?>-<?php echo newslugend($value->slug); ?>">
<h5 style="text-align:center;color:#D63334">
<b><?php echo ucwords($BrandName); ?></b></h5>
</a>
<h5 style="text-align:center;color:#D63334"><?php echo $implement_cate; ?> </h5>
<h6 style="text-align:center;color:#148F1A"><?php //echo ucfirst($value->model_name); ?>
    <?php 
  echo substr((strip_tags($value->model_name)), 0, 30);
    ?>

</h6>
</div>
</div>
</div>
</div>
</div>
<?php } ?>

<div class="col-md-12 col-sm-12 col-xs-12 CenterBT marginZeroMob" style="margin:30px 0 0">
    <a href="<?php echo $root; ?>tractor-implements" class="viewNewsbt">
        View more Tractor Implements
    </a>
</div>


</div>
</div>
</div>
</div>
</div>


    <div class="container">
        <div class="col-sm-12 col-md-12 col-xs-12" style="    margin-top: 10px;
    margin-bottom: 21px;">

            <div class="col-sm-12 col-md-12 col-xs-12" style="padding:0px">
                <div class="col-item">
                    <div class="col-xs-12 col-sm-12 col-md-12 padd0 ipm" style="padding:10px 0px;">
                    <div class="col-xs-12 col-sm-12 col-md-4 palnningBut" style="    padding: 10px;
   ">
                        <p style="    color: #fff;
    text-align: center;
    font-size: 18px;
    text-shadow: 0px 1px 2px #ddd;
    padding-top: 14px;">Planning To Buy a New Tractor?</p>
                        <p style="    color: #ddd;
    text-align: left;
    padding-left: 19px;">Fast and easy to search; Get personalized tractor recommendations
                            sorted on various tractor selection options.</p>
                        <p class="marfTOPBt" style="    margin-top: 0px;
    float: right;">
                            <a style="    color: white;" class="HomePgaeButton" href="<?php echo $root; ?>tractors">New Tractors</a></p>
                    </div>
                        <div class="col-xs-12 col-sm-12 col-md-8 messyAdHome">
                        <a href="<?php echo massyAdLink('74','massey-ferguson','home'); ?>">
    <img src="<?php echo $root; ?>web_root/advertisments/massy_tractor_ad1.jpg" class="img-responsive">
    </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="container oldTractorHome">
<div class="col-sm-12 col-md-12 col-xs-12" style="">
<h2 style="color:#148f1a;font-size:20px;margin-bottom:-18px" class="tractorByBrand font-upcoming">Used <span style="color:#cc0001"> Tractors for Sell</span></h2>
<div class="border">
<div class="border-inner"></div>
</div>
<div class="col-sm-12 col-md-12 col-xs-12 ipm paddingZ" style="margin:0 0">



<?php
                foreach ($old_tractor as $key => $value) {
                    $BrandName = '';
                    $state_name = '';
                    foreach (SelectQuery('name', 'brand', 'id', $value->brand) as $ke => $val) $BrandName = ($val->name);
                    foreach (SelectQuery('name', 'states', 'id', $value->state) as $ke => $val) $state_name = ($val->name);

                    ?>
<div class="co-md-4 col-sm-4  prod-div max_mar OldTractorHome">
    <img onerror="imgError(this);" src="<?php echo $root; ?>images/oldTractor/<?php echo $value->image; ?>" alt="<?php echo $BrandName; ?> <?php echo ucfirst($value->model_name); ?> Tractor" class="ImgOldTr">
    <a class="onlyUnderlImneAtag" href="<?php echo $root; ?>used-tractor/<?php echo newslugend($BrandName); ?>-<?php echo newslugend($value->slug); ?>">
    <h5 title="<?php echo ucwords($BrandName); ?>   <?php echo ucfirst($value->model_name); ?> " style="text-align:center;color:#D63334;    color: #D63334;
    white-space: nowrap;
    width: 224px;
    overflow: hidden;
    text-overflow: ellipsis;
    text-align: center;">
    <b>
    <?php echo ucwords($BrandName); ?>          </b>
    <span style="color:#148F1A">    <?php echo ucfirst($value->model_name); ?> </span></h5>
    </a>
    <ul style="font-size:12px;line-height:20px" class="ULOldTra">
                <li class="colo" title="<?php echo ucwords($value->name); ?>" style=" white-space: nowrap;
    width: 100%;
    overflow: hidden;
    text-overflow: ellipsis;">
            <i class="fa fa-user" aria-hidden="true"></i> <?php echo ucwords($value->name); ?> Agriculture Equipment Company
            </li>
                <li class="colo"> 
            <i class="fa fa-map-marker" aria-hidden="true"></i>  <?php echo $state_name; ?> 
            </li><li class="colo"> 
            <i class="fa fa-calendar-check-o" aria-hidden="true"></i> <?php echo date("d M , Y", strtotime($value->date)); ?> 
            </li>
            


                </ul>
    </div>
                <?php } ?>



</div>
<!--
<div class="col-sm-4 col-md-4 col-xs-12 Adversiment HomePageHolldTrAd">
<div class="col-sm-12 col-xs-12 adsDiv" style="border:0 none">
<p class="advertisementLabel">Advertisement</p>
<a href="<?php echo new_hollandAdLink('62','new-holland-tractors','home'); ?>">
<img src="<?php echo $root; ?>web_root/advertisments/new_holland_tractor_ad2.jpg" alt="New holland" class="img-responsive HollandTraAd">
</a>
</div>
</div>
-->
<div class="col-md-12 col-sm-12 col-xs-12 CenterBT marginZeroMob" style="margin:30px 0 0">
    <a href="<?php echo $root; ?>used-tractors-for-sell" class="viewNewsbt">
View more Tractors for Rent / Sell
    </a>
</div>




</div>
</div>
<div class="col-md-12 col-xs-12 col-sm-12 PaddingZRes marginZeroMob" style="margin-top:30px">
<div class="container">
<div class="col-md-12 col-sm-12 col-xs-12 marginZeroMob" style="margin:30px 0">
<h2 style="color:#148f1a;font-size:20px;margin-bottom:-18px" class="font-upcoming tractorByBrand"> Compare <span style="color:#cc0001"> Tractors </span></h2>
<div class="border">
<div class="border-inner"></div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12 ipm paddingZ">
<?php foreach ($compare_data as $compare_datavalue) { ?>
<div class="col-md-4 col-xs-12 col-sm-4 signleComp paddingZ">
<div class="col-md-12 col-xs-12 col-sm-12 paddingZ" style="height:200px;padding:10px;padding-bottom:0">
<span class="WDClass">
<?php echo $compare_datavalue['First_hp']; ?> HP
</span>
<img src="<?php echo $root; ?>upload/<?php echo $compare_datavalue['first_tractor_image']; ?>" alt="<?php echo $compare_datavalue['first_tractor']; ?>" class="img-responsive width100 height100">
</div>
<div class="col-md-12 col-xs-12 col-sm-12 paddingZ DIVER" style="background:#DD4445">
<p class="CompTe"><?php echo $compare_datavalue['first_tractor']; ?></p>
<p class="CompTe2 paddingZ">VS</p>
<p class="CompTe"><?php echo $compare_datavalue['second_tractor']; ?></p>
</div>
<div class="col-md-12 col-xs-12 col-sm-12 paddingZ" style="height:200px;padding:10px;padding-top:0">
<span class="WDClass" style="top:10px">
<?php echo $compare_datavalue['second_hp']; ?> HP
</span>
<img src="<?php echo $root; ?>upload/<?php echo $compare_datavalue['second_tractor_image']; ?>" style="margin-top:5px" alt="<?php echo $compare_datavalue['second_tractor']; ?>" class="img-responsive width100 height100">
</div>
</div>
<?php } ?>
</div>
</div>
</div>
</div>


<div class="container">
<div class="col-md-12 col-sm-12 col-xs-12 newsTabMainHome" style="margin:30px 0">
<h2 style="color:#148f1a;font-size:20px;margin-bottom:-18px" class="tractorByBrand font-upcoming newsRes">Tractor
News<span style="color:#cc0001"> / Agriculture News</span></h2>
<div class="border">
<div class="border-inner"></div>
</div>
<ul class="nav nav-tabs">
<li class="active"><a data-toggle="tab" href="#menuu" style="font-size:14px;padding:10px 15px">Tractor
News</a></li>
<li><a data-toggle="tab" href="#menuu1" style="font-size:14px;padding:10px">Agriculture News</a>
</li>
</ul>
<div class="tab-content">

<div id="menuu" class="tractor_tab tab-pane fade in active paddingZ phn_pad newsTabHome">
<?php foreach ($newsTractor_single as $newsTractor_singleKey => $newsTractor_singleValue) { ?>
<div class="col-md-6 col-sm-6 col-xs-12 paddingZ tractornes newsSingleHOmePer" style="">
<a href="<?php echo $root; ?>tractor-news/<?php echo newslugend($newsTractor_singleValue->title); ?>/<?php echo $newsTractor_singleValue->id; ?>">
<img onerror="imgError(this)" src="<?php echo $root ?>images/news/<?php echo $newsTractor_singleValue->image; ?>" alt="<?php echo ucfirst(strip_tags($newsTractor_singleValue->title)); ?>" class="img-responsive img_home_news width100 height100" style="">
<div class="text_overflow" title="<?php echo ucfirst(strip_tags($newsTractor_singleValue->title)); ?>">
<?php
// echo $newsTractor_singleValue->title;
                                    if (strlen($newsTractor_singleValue->title) > 50) {
                                        echo substr((strip_tags($newsTractor_singleValue->title)), 0, 50) . "...";
                                    } else {
                                        echo (strip_tags($newsTractor_singleValue->title));
                                    }
                                    ?></div>
</a>
</div>
<?php } ?>
<div class="col-md-6 col-sm-6 col-xs-12 ipm">
<?php foreach ($newsTractor_group as $newsTractor_singleKey => $newsTractor_singleValue) { ?>
<div class="col-md-12 col-sm-12 col-xs-12 ipcc singleNewsHome" style="border:1px solid #ddd;padding-left:0">
<div class="col-md-4 col-sm-4 col-xs-12 ipm paddingZ newsSmall" style="padding:0px">
<img onerror="imgError(this)" src="<?php echo $root ?>images/news/<?php echo $newsTractor_singleValue->image; ?>" alt="<?php echo ucfirst(strip_tags($newsTractor_singleValue->title)); ?>" class="width100 height100">
</div>
<div class="col-md-8 col-sm-8 col-xs-12 paddingZ titleNewsHOme" style="padding-left:18px;text-align:left;padding-top:10px">
<a href="<?php echo $root; ?>tractor-news/<?php echo newslugend($newsTractor_singleValue->title); ?>/<?php echo $newsTractor_singleValue->id; ?>" class="text_fom" style="line-height:31px"><b>
<?php
 // echo strip_tags($newsTractor_singleValue->title);
                                            if (strlen($newsTractor_singleValue->title) > 60) {
                                                echo substr((strip_tags($newsTractor_singleValue->title)), 0, 60) . "...";
                                            } else {
                                                echo (strip_tags($newsTractor_singleValue->title));
                                            }
                                            ?> </b></a>
<p style="margin-top:9px">
<?php
                                        // if (strlen($newsTractor_singleValue->description) > 60) {
                                        //     echo substr((strip_tags($newsTractor_singleValue->description)), 0, 60) . "...";
                                        // } else {
                                        //     echo (strip_tags($newsTractor_singleValue->description));
                                        // }
                                        ?>
</p>
</div>
</div>
<?php } ?>
</div>
</div>
<div id="menuu1" class="tab-pane fade phn_pad newsTabHome">
<?php foreach ($newsagriculture_single as $newsTractor_singleKey => $newsTractor_singleValue) { ?>
<div class="col-md-6 col-sm-6 col-xs-12 paddingZ tractornes newsSingleHOmePer" style="">
<a href="<?php echo $root; ?>tractor-news/<?php echo newslugend($newsTractor_singleValue->title); ?>/<?php echo $newsTractor_singleValue->id; ?>">
<img onerror="imgError(this)" src="<?php echo $root ?>images/news/<?php echo $newsTractor_singleValue->image; ?>" alt="<?php echo ucfirst(strip_tags($newsTractor_singleValue->title)); ?>" class="img-responsive img_home_news width100 height100" style="">
<div class="text_overflow" title="<?php echo ucfirst(strip_tags($newsTractor_singleValue->title)); ?>">
<?php
echo ((strip_tags($newsTractor_singleValue->title))) ;

                                    // if (strlen($newsTractor_singleValue->title) > 50) {
                                    //     echo substr((strip_tags($newsTractor_singleValue->title)), 0, 50) . "...";
                                    // } else {
                                    //     echo (strip_tags($newsTractor_singleValue->title));
                                    // }
                                    ?></div>
</a>
</div>
<?php } ?>
<div class="col-md-6 col-sm-6 col-xs-12 ipm">
<?php foreach ($newsagriculture_group as $newsTractor_singleKey => $newsTractor_singleValue) { ?>
<div class="col-md-12 col-sm-12 col-xs-12 ipcc singleNewsHome" style="border:1px solid #ddd;padding-left:0">
<div class="col-md-4 col-sm-4 col-xs-12 ipm paddingZ newsSmall" style="padding:0px">
<img onerror="imgError(this)" src="<?php echo $root ?>images/news/<?php echo $newsTractor_singleValue->image; ?>" alt="<?php echo ucfirst(strip_tags($newsTractor_singleValue->title)); ?>" class="width100 height100">
</div>
<div class="col-md-8 col-sm-8 col-xs-12 paddingZ titleNewsHOme" style="padding-left:18px;text-align:left;padding-top:10px">
<a href="<?php echo $root; ?>tractor-news/<?php echo newslugend($newsTractor_singleValue->title); ?>/<?php echo $newsTractor_singleValue->id; ?>" class="text_fom" style="line-height:31px"><b>
<?php
echo strip_tags($newsTractor_singleValue->title);
// if (strlen($newsTractor_singleValue->title) > 60) {
// echo substr($newsTractor_singleValue->title, 0, 60);
// } else {
// echo (($newsTractor_singleValue->title));
// }
                                            ?> </b></a>
<p style="margin-top:9px">
<?php
                                        // if (strlen($newsTractor_singleValue->description) > 60) {
                                        //     echo substr((strip_tags($newsTractor_singleValue->description)), 0, 60) . "...";
                                        // } else {
                                        //     echo (strip_tags($newsTractor_singleValue->description));
                                        // }
                                        ?>
</p>
</div>
</div>
<?php } ?>
</div>
</div>
</div>
</div>



<div class="col-md-12 col-sm-12 col-xs-12 CenterBT viewNewsbtMain" style="margin:30px 0 0">
    <a href="<?php echo $root; ?>tractor-news" class="viewNewsbt">
View more latest news
    </a>
</div>



</div>
<section id="portfolio">
<div class="container">
<div class="col-sm-12 col-md-12 col-xs-12 padding_0_in_small paddingZ" style="margin:20px 0 40px 0">
<div class="col-sm-12 col-md-12 col-xs-12">

<h2 style="color:#148f1a;font-size:20px;margin-bottom:-18px" class="tractorByBrand font-upcoming newsRes">Tools
 & <span style="color:#cc0001"> Services</span></h2>
<div class="border">
<div class="border-inner"></div>
</div>


<div class="box-wrapper">
<div class="box" id="ServicesFon">
<div class="row text-center">
<a href="<?php echo $root . "tractor-service-centers"; ?>">
<div class="col-md-3 col-sm-6">
<div class="row services-item sans-shadow text-center">
<i class="fa fa-gears fa-3x"></i>
<h3>Service centers</h3>
</div>
</div>
</a>
<div class="col-md-3 col-sm-6"><a href="<?php echo $root . "find-tractor-dealers"; ?>">
<div class="row services-item sans-shadow text-center"><i class="fa fa-map-marker fa-3x"></i>
<h3>Dealer Locator</h3></div>
</a>
</div>
<div class="col-md-3 col-sm-6">
<a href="<?php echo $root . "special-tractor-offers"; ?>">
<div class="row services-item sans-shadow text-center">
<i class="fa fa-bullhorn fa-3x"></i>
<h3>Offer</h3>
</div>
</a>
</div>
<div class="col-md-3 col-sm-6">
<a href="<?php echo $root . "compare" ?>">
<div class="row services-item sans-shadow text-center">
<i class="fa fa-balance-scale fa-3x"></i>
<h3>Compare</h3>
</div>
</a>
</div>
<div class="col-md-3 col-sm-6">
<a href="<?php echo $root . "tractor-customer-care" ?>">
<div class="row services-item sans-shadow text-center">
<i class="fa fa-user-secret fa-3x"></i>
<h3>Customer care</h3>
</div>
</a>
</div>
<div class="col-md-3 col-sm-6">
<a href="<?php echo $root . "tractor-loan-emi-calculator" ?>">
<div class="row services-item sans-shadow text-center">
<i class="fa fa-inr fa-3x"></i>
<h3>Loans</h3></div>
</a>
</div>
<div class="col-md-3 col-sm-6">
<a href="<?php echo $root . "about-us" ?>">
<div class="row services-item sans-shadow text-center">
<i class="fa fa-user fa-3x"></i>
<h3>About Us</h3></div>
</a>
</div>
<div class="col-md-3 col-sm-6">
<a href="<?php echo $root . "contact-us" ?>">
<div class="row services-item sans-shadow text-center">
<i class="fa fa-phone fa-3x"></i>
<h3>Contact Us</h3></div>
</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
<div class="col-md-12 directoryDiv">
<div class="container brandDir">
<p class="HeadingFont"> Brands : </p>
<p class="SunGeadFontt">
<?php foreach ($TractorBrand as $key => $value) { ?>
<a target="_blank" href="<?php echo $root; ?>search-tractor/<?php echo ucfirst($value->id); ?>/<?php echo newslugend($value->name); ?>"><?php echo ucwords($value->name); ?></a> /
<?php } ?>
</p>
<p class="HeadingFont">New Tractor : </p>
<p class="SunGeadFontt">
<?php foreach ($Tract_res as $key => $value) { ?>
<a target="_blank" href="<?php echo $root; ?>product/<?php echo $value->tractor_id; ?>/<?php echo newslugend($value->name) . "-tractor"; ?>-<?php echo shweta_nameslug($value->model_name); ?>" class="">
<?php echo ucwords($value->name); ?> <?php echo ucfirst($value->model_name); ?></a> /
<?php } ?>
</p>
<p class="HeadingFont">Top Implements : </p>
<p class="SunGeadFontt">
<?php
            $implArray = array();
            $cond = '';
            $cond = "status='1' order By name ASC";
            $implArray = shweta_select_th('*', 'filed', $cond);
            $count_imp = array();
            foreach ($implArray as $implArray => $implArray_Value) {
                $count_imp[$implArray_Value->id] = count(shweta_select('id', 'new_implement', 'implementType', $implArray_Value->id));
            }
            arsort($count_imp);
            $rr11 = 0;
            foreach ($count_imp as $implArrayKey => $implArrayValue) {
                $impName = '';
                foreach (shweta_select('name', 'filed', 'id', $implArrayKey) as $raa) $impName = ($raa->name);
                $slugImp = '';
                foreach (shweta_select('slug', 'filed', 'id', $implArrayKey) as $raa) $slugImp = ($raa->slug);
                $rr11++;
                if ($rr11 == 6) {
                    break;
                }
                ?>
<a target="_blank" href="<?php echo $root . "tractor-implements" ?>/<?php echo $slugImp; ?>">
<?php echo ucfirst($impName); ?>
/
</a>
<?php } ?>
</p>
<p class="HeadingFont">Tractor Junction Services : </p>
<p class="SunGeadFontt">
<a target="_blank" href="<?php echo $root; ?>tractors">New Tractor</a> /
<a target="_blank" href="<?php echo $root; ?>popular-tractors">Popular Tractor</a> /
<a target="_blank" href="<?php echo $root; ?>latest-tractors">Latest Tractor</a> /
<a target="_blank" href="<?php echo $root; ?>upcoming-tractors">Upcoming Tractor</a> /
<a target="_blank" href="<?php echo $root; ?>tractor-finance">Finance</a> /
<a target="_blank" href="<?php echo $root; ?>tractor-insurance">Insurance</a> /
<a target="_blank" href="<?php echo $root; ?>special-tractor-offers">Tractor offers</a> /
<a target="_blank" href="<?php echo $root; ?>tractor-dealership-enquiry">Tractor dealership enquiry</a> /
<a target="_blank" href="<?php echo $root; ?>tractor-news">Tractor news</a> /
<a target="_blank" href="<?php echo $root; ?>compare-tractors">Compare</a> /
<a target="_blank" href="<?php echo $root; ?>contact-us">Contact Us</a>
</p>
</div>
</div>