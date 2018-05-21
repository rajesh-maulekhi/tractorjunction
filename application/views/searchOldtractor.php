<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
?>
<div id="gif_image" class="searchold">
    <center>
        <img src="<?php echo $root; ?>images/gif_tractor.gif" alt="Tractor loder image"
             style="margin-top:23%;height:50px;">
    </center>
</div>
<div class="banner" class="searchold1">
    <div class="container">
        <div class="col-sm-12 col-md-12" style="padding:15px 0px;">
            <ul type="none" style="color:#fff">
                <li style="float:left;padding-right:5px;"><i class="fa fa-home"
                                                             style="font-size:16px;padding-right:5px;"></i>Home
                </li>
                <li style="float:left;padding-right:5px;">/</li>
                <li style="float:left;padding-right:5px;">Used Tractors</li>
            </ul>
        </div>
    </div>
</div>
<div class="container c1">
    <div class="col-sm-12 col-md-12 paddingZ">
        <div class="col-sm-3 col-md-3">
            <div class="col-sm-12 col-md-12 c2">
                <?php
                $locResulr = array();
                $con = "status='1'";
                $locResulr = shweta_select_thdistinct('state', 'old_tractor', $con);
                if (!empty($locResulr)) {
                    ?>
                    <h4 class="search-head">
                        <i class="fa fa-map-marker c3"></i>
                        Location</h4>
                    <form class="form-horizontal" role="form"
                          style="overflow:scroll;overflow-x: hidden;min-height: 33px;max-height:164px;">
                        <?php
                        foreach ($locResulr as $k1 => $k3) {
                            ?>
                            <div class="checkbox">
                                <label><input type="checkbox" class="chbox" onchange="filterOldtractor()"
                                              value="state:<?php echo $k3->state; ?>">
                                    <?php foreach (shweta_select('name', 'states', 'id', $k3->state) as $raa) echo ucfirst($raa->name);
                                    ?>
                                </label>
                            </div>
                        <?php } ?>
                    </form>
                    <div class="dotted-border"></div>
                <?php } ?>
                <h4 class="search-head">
                    <i class="fa fa-calendar c3"></i>
                    Year of purchase</h4>
                <form class="form-horizontal" role="form" style="height: 252px;overflow:scroll;overflow-x: hidden;">
                    <?php
                    $year = '';
                    $year = date('Y') - 20;
                    $year1 = date('Y');
                    for ($year; $year <= $year1; $year++) {
                        ?>
                        <div class="checkbox">
                            <label><input type="checkbox" class="chbox" onchange="filterOldtractor()"
                                          value="yearpurchase:<?php echo $year; ?>"><?php echo $year; ?></label>
                        </div>
                    <?php } ?>
                </form>
                <div class="dotted-border"></div>
                <h4 class="search-head">
                    <i class="fa fa-bank c3"></i>
                    Brand</h4>
                <form class="form-horizontal" role="form" style="height:300px;overflow: scroll;overflow-x:hidden;">
                    <table class="search-table">
                        <tbody style="">
                        <?php
                        $condBrand = "type LIKE '%tractor%'";
                        foreach (Select_OrderBy_brand('*', 'brand', $condBrand, 'name', 'ASC') as $res => $obj) {
                            ?>
                            <tr>
                                <td>
                                    <div class="checkbox">
                                        <label><input type="checkbox" class="chbox" onchange="filterOldtractor()"
                                                      value="brand:<?php echo $obj->id; ?>"><?php echo ucfirst($obj->name); ?>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </form>

            </div>
        </div>
        <!-- SHOW -->
        <div class="col-sm-9 col-md-9">
            <div class="box-wrapper">
                <div class="col-sm-12 col-md-12 c5">
                    <div class="col-sm-8 col-md-8">
                        <p style="margin:5px 0px 0px">All Tractors</p>
                    </div>
                </div>
                <div class="box1 c6">
                    <div class="row" id="resut_here">
                        <?php
                        $result = array();
                        $condition = "status='1'";
                        $result = shweta_pagination_query_new_orderby('old_tractor', '15', 'used-tractors-for-sell', $condition, 'id', 'DESC');
                        if (!empty($result['result'])) {
                            ?>
                            <div class="col-sm-12 col-md-12">
                                <?php echo oldTractorDiv($result['result']); ?>
                            </div>
                            <div class="pagination" style="float:right; margin-top: 13px;">
                                <ul class="pagination" style="margin:-4px 10px -23px 0px !important;">
                                    <?php echo $result['links']; ?>
                                </ul>
                            </div>
                            <?php
                        } else {
                            ?>
                            <h4 style="color:#DB4C4D;text-align:center;">No Tractor found</h4>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php echo quickLinksHTML(); ?>
    </div>
</div>
</div>
<script>
    function filterOldtractor() {
        var chkArray = [];
        $(".chbox:checked").each(function () {
            chkArray.push($(this).val());
        });
// alert(chkArray);
        document.getElementById('gif_image').style.display = "block";
        $.ajax({
            type: "POST",
            url: './OldTractor/FilteroldTractorResult',
            data: {val: chkArray},
            success: function (data) {
                // alert
                document.getElementById('gif_image').style.display = "none";
                $("#resut_here").html(data);
            },
        });
    }
</script>