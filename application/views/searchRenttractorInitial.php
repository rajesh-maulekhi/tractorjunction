<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
?>
<style>
    .icon-box1-inner11 {
        width: 166px;
        padding-bottom: 10px;
        font-size: 12px;
        height: 113px;
        float: left;
        box-shadow: 0 0 2px #e0e0e0;
        background: #FFF;
        border: 1px solid #dee3eb;
    }
</style>
<?php
$imgArr = array(
    'tractor_with_chopper.jpg',
    'TRACTOR_WITH_BALE_SPEAR.jpg',
    'TRACTOR_WITH_BALER.jpg',
    'tractor_with_boom_sprayer.jpg',
    'tractor_with_box_blade.jpg',
    'tractor_with_cane_thumper.png',
    'tractor_with_compost_sprea.jpg',
    'tractor_with_cultivator.jpg',
    'tractor_with_disc_plough.jpg',
    'tractor_with_disc_ridger.jpg',
    'Fertilizer_Spreader_best.jpg',
    'tractor_with_disc_forage_mower.png',
    'tractor_with_harrow.jpg',
    'tractor_with_hey_rake.jpg',
    'tractor_with_laser_land.jpg',
    'tractor_with_mud_loader.jpg',
    'tractor_with_mulcher.jpg',
    'tractor_with_paddy_tiller.jpg',
    'tractor_with_planter.jpg',
    'tractor_with_plough.jpg',
    'tractor_with_post_hole_diggers.jpg',
    'tractor_with_potato_harvester.jpg',
    'tractor_with_potato_planter.jpg',
    'tractoer_with_power_harrow.jpg',
    'tractor_with_power_tiller.jpg',
    'tractor_with_ratoon_manager.jpg',
    'tractor_with_ripper.jpg',
    'tractor_with_rotary_tiller.jpg',
    'tractor_with_roto_speed _deel.jpg',
    'tractor_with_speed_cum_fertilizer_drill.jpg',
    'tractor_with_Self_Propelled_Platform.jpg',
    'tractor_with_Shredder.jpg',
    'tractor_with_Sickle_Sword.jpg',
    'tractor_with_Slasher.jpg',
    'tractor_with_sprayer.jpg',
    'tractor_with_Straw_Reaper.jpg',
    'tractor_with_Sub_Soiler.jpg',
    'tractor_with_Sugar_Cane_Loader.jpg',
    'tractor_with_Terracer_Blade.jpg',
    'tractor_with_Thresher.jpg',
    'tractor_with_Trailer.jpg',
    'tractor_with_Transplanter.jpg',
    'tractor_with_Vacuum_Planter.jpg',
    'tractor_with_Water_Bowser.jpg',
    'tractor_with_Water_Tanker.jpeg',
    'tractor_with_Zero _Till.jpeg',
    'tractor_with_chopper.jpg',
    'TRACTOR_WITH_BALE_SPEAR.jpg',
    'TRACTOR_WITH_BALER.jpg',
    'tractor_with_boom_sprayer.jpg',
    'tractor_with_box_blade.jpg',
    'tractor_with_cane_thumper.png',
    'tractor_with_compost_sprea.jpg',
    'tractor_with_cultivator.jpg',
    'tractor_with_disc_plough.jpg',
    'tractor_with_disc_ridger.jpg',
    'Fertilizer_Spreader_best.jpg',
    'tractor_with_disc_forage_mower.png',
    'tractor_with_harrow.jpg',
    'tractor_with_hey_rake.jpg',
    'tractor_with_laser_land.jpg',
    'tractor_with_mud_loader.jpg',
    'tractor_with_mulcher.jpg',
    'tractor_with_paddy_tiller.jpg',
    'tractor_with_planter.jpg',
    'tractor_with_plough.jpg',
    'tractor_with_post_hole_diggers.jpg',
    'tractor_with_potato_harvester.jpg',
    'tractor_with_potato_planter.jpg',
    'tractoer_with_power_harrow.jpg',
    'tractor_with_power_tiller.jpg',
    'tractor_with_ratoon_manager.jpg',
    'tractor_with_ripper.jpg',
    'tractor_with_rotary_tiller.jpg',
    'tractor_with_roto_speed _deel.jpg',
    'tractor_with_speed_cum_fertilizer_drill.jpg',
    'tractor_with_Self_Propelled_Platform.jpg',
    'tractor_with_Shredder.jpg',
    'tractor_with_Sickle_Sword.jpg',
    'tractor_with_Slasher.jpg',
    'tractor_with_sprayer.jpg',
    'tractor_with_Straw_Reaper.jpg',
    'tractor_with_Sub_Soiler.jpg',
    'tractor_with_Sugar_Cane_Loader.jpg',
    'tractor_with_Terracer_Blade.jpg',
    'tractor_with_Thresher.jpg',
    'tractor_with_Trailer.jpg',
    'tractor_with_Transplanter.jpg',
    'tractor_with_Vacuum_Planter.jpg',
    'tractor_with_Water_Bowser.jpg',
    'tractor_with_Water_Tanker.jpeg',
    'tractor_with_Zero _Till.jpeg',
);
?>
<div class="container-fluid paddingz" style="margin-top:50px;">
    <div class="container a3">
        <div class="col-sm-12 col-md-12 paddingZ b1">
            <h3 style="text-align: center;">Categories</h3>
            <h5 class="searchrent">Select Category Of Tractor For Rent Product</h5>
            <div class="col-md-12 col-sm-12 col-xs-12"
                 style="border:1px solid #ddd;margin-bottom:50px;padding-bottom:50px;">
                <a href="<?php echo $root; ?>products/used-tractor-on-rent">
                    <div class="col-md-2 col-sm-6 col-xs-6 paddingZ" style="margin-top: 20px;">
                        <div class="icon-box1-inner11">
                            <img src="<?php echo $root; ?>images/default.png" class="img-responsive img-Rent">
                            <center><span style="color:black;text-align:center">
					Tractor</span>
                            </center>
                        </div>
                    </div>
                </a>
                <?php
                $implArray = array();
                $cond = '';
                $cond = "status='1' order By name ASC";
                $implArray = shweta_select_th('*', 'filed', $cond);
                $ii = 0;
                foreach ($implArray as $implArrayKey => $implArrayValue) { ?>
                    <a href="<?php echo $root; ?>products/<?php echo newslugend("used-tractor-with-" . $implArrayValue->name); ?>-on-rent">
                        <div class="col-md-2 col-sm-6 col-xs-6 paddingZ" style="margin-top: 20px;">
                            <div class="icon-box1-inner11">
                                <img src="<?php echo $root; ?>images/category_images/<?php echo $imgArr[$ii]; ?>"
                                     class="img-responsive img-Rent">
                                <center><span title="<?php echo ucwords($implArrayValue->name); ?>"
                                              style="color:black;text-align:center">
					Tractor with <?php echo substr(ucwords(strtolower($implArrayValue->name)), 0, 13); ?></span>
                                </center>
                            </div>
                        </div>
                    </a>
                    <?php $ii++;
                } ?>
            </div>
        </div>
    </div>
</div>