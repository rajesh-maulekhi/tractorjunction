<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
?>
<div class="banner" style="background:rgba(204, 0, 1, 0.7) none repeat scroll 0% 0%;height:105px;">
    <div class="container">
        <div class="col-sm-12 col-md-12" style="padding:15px 0px;">
            <ul type="none" style="color:#fff">
                <li style="float:left;padding-right:5px;"><i class="fa fa-home"
                                                             style="font-size:16px;padding-right:5px;"></i>Home
                </li>
                <li style="float:left;padding-right:5px;">/</li>
                <li style="float:left;padding-right:5px;">Harvester Search</li>
            </ul>
        </div>
    </div>
</div>
<div class="container" style="padding: 0px 15px;margin-top:-55px;background:transparent;">
    <div class="col-sm-12 col-md-12 col-xs-12 paddingZ">
        <div class="col-sm-3 col-md-3 col-xs-12">
            <div class="col-sm-12 col-md-12 col-xs-12"
                 style="background:#fff;border:1px solid #e9e9e9;border-radius:3px;padding-bottom:30px;">
                <div class="dotted-border"></div>
                <h4 class="search-head">
                    <i class="fa fa-bank c3"></i>
                    Brand</h4>
                <div class="dotted-border"></div>
                <form class="form-horizontal" role="form" style="">
                    <?php
                    $condBrand = "type LIKE '%harvester%'";
                    foreach (Select_OrderBy_brand('*', 'brand', $condBrand, 'name', 'ASC') as $res => $obj) {
                        ?>
                        <div class="checkbox">
                            <label><input type="checkbox" class="chbox" onchange="filterHarvestertractor()"
                                          value="brand:<?php echo $obj->id; ?>"><?php echo ucfirst($obj->name); ?>
                                (<?php
                                echo count(shweta_select('id', 'harvester', 'brand', $obj->id));

                                ?>)
                            </label>
                        </div>
                        <?php
                    }
                    ?>
                </form>
                <br>
                <h4 class="search-head">
                    <i class="fa fa-wrench c3"></i>
                    Cutting Width</h4>
                <div class="dotted-border"></div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" class="chbox" onchange="filterHarvestertractor()" value="cutterbar:1-10">1
                        to 10</label>
                </div>
                <br>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" class="chbox" onchange="filterHarvestertractor()"
                               value="cutterbar:10-20">10 to 20</label>
                </div>
                <br>
                <br>
                <h4 class="search-head" style="margin-top:10px;">
                    <i class="fa fa-plug c3"></i>
                    Power Source</h4>
                <div class="dotted-border"></div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" class="chbox" onchange="filterHarvestertractor()"
                               value="power_Source:self">Self Propelled
                        (<?php
                        echo count(shweta_select('id', 'harvester', 'power_Source', 'self'));

                        ?>)
                    </label>
                </div>
                <br>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" class="chbox" onchange="filterHarvestertractor()"
                               value="power_Source:mounted">Tractor Mounted
                        (<?php
                        echo count(shweta_select('id', 'harvester', 'power_Source', 'mounted'));
                        ?>)
                    </label>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-xs-12" style="padding: 0px;margin: 15px 0px;">
                <div style="width:255px;height:600px;float: left;padding: 0px;">
                    <?php echo searchAdd(); ?>
                </div>
            </div>
        </div>

        <div class="col-sm-9 col-md-9 col-xs-12" style="">
            <div class="box-wrapper">
                <div class="col-sm-12 col-md-12 col-xs-12" style="padding:14px 0px;background:white">
                    <div class="col-sm-8 col-md-8 col-xs-12">
                        <h1 style="margin:2px 0px 0px;font-size:15px;">Tractor Combine Harvesters
                            <span style="color:#cfc2c2;margin-left: 13px;">Total Harvesters <?php echo count($SearchOldTractor); ?></span>
                        </h1>
                    </div>
                </div>
                <div class="box1" style="margin-top:62px;">
                    <div class="row">
                        <?php
                        if (!empty($SearchOldTractor)){
                        ?>
                        <div class="col-md-12 col-sm-12 col-xs-12 paddingZ" id="filter_result">
                            <?php echo implementTractorDiv($SearchOldTractor); ?>
                            <?php
                            }
                            else {
                                ?>
                                <h4 style="color:#DB4C4D;text-align:center;">No result found</h4>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <?php echo quickLinksHTML(); ?>
</div>
<script type="text/javascript">
    function filterHarvestertractor() {
        var chkArray = [];
        $(".chbox:checked").each(function () {
            chkArray.push($(this).val());
        });
        document.getElementById('LoderImage').style.display = "block";
        $.ajax({
            type: "POST",
            url: 'ImplementTractor/filterHarvestertractorResult',
            data: {val: chkArray},
            success: function (data) {
                document.getElementById('LoderImage').style.display = "none";
                $("#filter_result").html(data);
            },
        });
    }
</script>
<script>
    var root5 = '<?php echo $root; ?>';
    function HarvesterUrlAjax(HarverterId, BrandName, SlugHar) {

        datavar = 'HarvesterId=' + HarverterId;
        $.ajax({
            type: "POST",
            url: 'ImplementTractor/SetHarveserSession',
            data: datavar,
            success: function (data) {
// alert(data);
                window.location.href = root5 + "harvester/" + BrandName + "-" + SlugHar + "-combine-harvester";
            },
        });
    }
</script>