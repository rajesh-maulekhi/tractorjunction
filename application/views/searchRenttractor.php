<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
?>
<div id="gif_image" class="search">
    <center>
        <img src="<?php echo $root; ?>images/gif_tractor.gif" alt="Tractor loder image"
             style="margin-top:23%;height:50px;">
    </center>
</div>
<div class="banner" style="background:rgba(204, 0, 1, 0.7) none repeat scroll 0% 0%;height:105px;">
    <div class="container">
        <div class="col-sm-12 col-md-12" style="padding:15px 0px;">
            <ul type="none" style="color:#fff">
                <li style="float:left;padding-right:5px;"><i class="fa fa-home"
                                                             style="font-size:16px;padding-right:5px;"></i>Home
                </li>
                <li style="float:left;padding-right:5px;">/</li>
                <li style="float:left;padding-right:5px;">Rent Search</li>
            </ul>
        </div>
    </div>
</div>
<div class="container c1">
    <div class="col-sm-12 col-md-12 paddingZ">
        <div class="col-sm-3 col-md-3">
            <div class="col-sm-12 col-md-12 c2">
                <?php
                $implArray = array();
                $cond = '';
                $cond = "status='1' order By name ASC";
                $implArray = shweta_select_th('*', 'filed', $cond);
                ?>
                <h4 class="search-head">
                    <i class="fa fa-map-marker c3"></i>
                    Category</h4>
                <form class="form-horizontal" role="form"
                      style="overflow: scroll;overflow-x:hidden;min-height:33px;max-height: 164px;">
                    <div class="checkbox">
                        <label><input type="checkbox" <?php if ($rr == newslugend("tractor")) { ?> checked<?php } ?>
                                      class="chbox" onchange="filterRenttractor()"
                                      value="rent_type:<?php echo newslugend("tractor"); ?>">
                            Tractor
                        </label>
                    </div>
                    <?php foreach ($implArray as $implArrayKey => $implArrayValue) { ?>
                        <div class="checkbox">
                            <label><input type="checkbox"
                                          class="chbox" <?php if ($rr == newslugend("tractor-with-" . $implArrayValue->name)) { ?> checked<?php } ?>
                                          onchange="filterRenttractor()"
                                          value="rent_type:<?php echo newslugend("tractor-with-" . $implArrayValue->name); ?>">
                                <?php echo substr(ucwords(strtolower($implArrayValue->name)), 0, 13); ?>
                            </label>
                        </div>
                    <?php } ?>
                </form>
                <div class="dotted-border"></div>
                <h4 class="search-head">
                    <i class="fa fa-calendar c3"></i>
                    Year of purchase</h4>
                <form class="form-horizontal" role="form" style="height:252px; overflow:scroll;overflow-x: hidden;">
                    <?php
                    $year = '';
                    $year = date('Y') - 20;
                    $year1 = date('Y');
                    for ($year; $year <= $year1; $year++) {
                        ?>
                        <div class="checkbox">
                            <label><input type="checkbox" class="chbox" onchange="filterRenttractor()"
                                          value="yearpurchase:<?php echo $year; ?>"><?php echo $year; ?></label>
                        </div>
                    <?php } ?>
                </form>
                <div class="dotted-border"></div>
                <h4 class="search-head">
                    <i class="fa fa-bank c3"></i>
                    Brand</h4>
                <form class="form-horizontal" role="form" style="height: 300px;overflow: scroll;overflow-x:hidden;">
                    <?php
                    $condBrand = "";
                    foreach (Select_OrderBy_brand('*', 'brand', $condBrand, 'name', 'ASC') as $res => $obj) {
                        ?>
                        <div class="checkbox">
                            <label><input type="checkbox" class="chbox" onchange="filterRenttractor()"
                                          value="brand:<?php echo $obj->id; ?>"><?php echo ucfirst($obj->name); ?>
                            </label>
                        </div>
                        <?php
                    }
                    ?>
                </form>
                <div class="dotted-border"></div>
                <h4 class="search-head">
                    <i class="fa fa-wrench c3"></i>
                    Engine Displacement</h4>
                <form class="form-horizontal" role="form">
                    <?php
                    foreach (shweta_select('*', 'hp_range', '', '') as $res => $obj) {
                        if ($obj->first == "1") {
                            ?>
                            <div class="checkbox">
                                <label><input type="checkbox" class="chbox" onchange="filterRenttractor()"
                                              value="hp:<?php echo $obj->first; ?>-<?php echo $obj->second; ?>">Up
                                    To <?php echo $obj->second; ?> HP </label>
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="checkbox">
                                <label><input type="checkbox" class="chbox" onchange="filterRenttractor()"
                                              value="hp:<?php echo $obj->first; ?>-<?php echo $obj->second; ?>"><?php echo $obj->first; ?>
                                    - <?php echo $obj->second; ?> HP </label>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </form>
            </div>
        </div>
        <!-- SHOW -->
        <div class="col-sm-9 col-md-9 c4">
            <div class="box-wrapper">
                <div class="col-sm-12 col-md-12 c5">
                    <div class="col-sm-8 col-md-8">
                        <p style="margin:5px 0px 0px"><?php echo ucfirst(str_replace('-', ' ', $rr)); ?></p>
                    </div>
                </div>
                <div class="box1 c6">
                    <?php
                    if (!empty($result)) {
                        ?>
                        <div class="row" style="    padding: 20px;" id="filter_result">
                            <?php echo RentTractorDiv($result); ?>
                        </div>
                        <?php
                    } else {
                        ?>
                        <h4 style="color:#DB4C4D;text-align:center;">No Tractor found</h4><?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php echo quickLinksHTML(); ?>
    </div>
</div>
</div>
<script type="text/javascript">
    function filterRenttractor() {
        var chkArray = [];
        $(".chbox:checked").each(function () {
            chkArray.push($(this).val());
        });
        document.getElementById('LoderImage').style.display = "block";
        $.ajax({
            type: "POST",
            url: '../RentTractor/FilterRentTractorResult',
            data: {val: chkArray},
            success: function (data) {

                document.getElementById('LoderImage').style.display = "none";
                $("#filter_result").html(data);
            },
        });
    }
</script>
