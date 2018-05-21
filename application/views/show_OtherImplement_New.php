<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
$rr = $r;
?>
<?php if ($this->session->userdata('FilterImplentChkValue')) {
    $filterVal = array();
    $filterVal = ($this->session->userdata('FilterImplentChkValue'));
}
?>
<input type="hidden" id="newBox" value="hello">
<div id="gif_imageMre"
     style="background:rgba(0, 0, 0, 0.55);height:100%;width:100%;display:none;position: fixed;left:0;right: 0;top: 0;z-index: 2;">
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
                <li style="float:left;padding-right:5px;">Implement Search</li>
            </ul>
        </div>
    </div>
</div>
<div class="container" style="padding: 0px 15px;margin-top:-55px;background:transparent;">
    <div class="col-sm-12 col-md-12 paddingZ">
        <div class="col-sm-3 col-md-3 col-xs-12">
            <div class="col-sm-12 col-md-12"
                 style="background:#fff;border:1px solid #e9e9e9;border-radius:3px;padding-bottom:30px;">
                <div class="dotted-border"></div>
                <h4 class="search-head">
                    <i class="fa fa-bank c3"></i>
                    Implements Categories</h4>
                <form class="form-horizontal showotherimplement" role="form">
                    <span style="color: #c5b9b9;">Top Categories</span>
                    <?php
                    $implArray = array();
                    $cond = '';
                    $cond = "status='1' order By name ASC";
                    $implArray = shweta_select_th('*', 'filed', $cond);
                    $count_imp = array();
                    foreach ($implArray as $implArray => $implArray_Value) {
                        $count_imp[$implArray_Value->id] = count(shweta_select('id', 'new_implement', 'implementType', $implArray_Value->id));
                    }
                    arsort(($count_imp));
                    $rr11 = 0;
                    foreach ($count_imp as $implArrayKey => $implArrayValue) {
                        $impName = '';
                        foreach (shweta_select('name', 'filed', 'id', $implArrayKey) as $raa) $impName = ($raa->name);
                        $rr11++;
                        if ($rr11 == 6) {
                            break;
                        }
                        $val = "implementType:" . $implArrayKey;
                        ?>
                        <div class="checkbox">
                            <label><input type="checkbox" <?php if ($rr == $implArrayKey) { ?> checked<?php } ?>
                                          class="chbox" <?php if ($this->session->userdata('FilterImplentChkValue')) {
                                    $filterVal = array();
                                    $filterVal = ($this->session->userdata('FilterImplentChkValue'));
                                    if (in_array($val, $filterVal)) { ?> checked<?php }
                                } ?> onchange="FilterNewImpl()" value="implementType:<?php echo $implArrayKey; ?>">
                                <?php echo ucfirst($impName); ?> (<?php
                                echo $implArrayValue;
                                ?>)
                            </label>
                        </div>
                    <?php } ?>
                </form>
                <form class="form-horizontal scroll_imp" role="form">


                    <?php
                    $implArray = array();
                    $cond = '';
                    $cond = "status='1' order By name ASC";
                    $implArray = shweta_select_th('*', 'filed', $cond);
                    foreach ($implArray as $implArrayKey => $implArrayValue) {
                        $val = "implementType:" . $implArrayValue->id;
                        ?>
                        <div class="checkbox">
                            <label><input type="checkbox" <?php if ($rr == $implArrayValue->id) { ?> checked<?php } ?>
                                          class="chbox" <?php if ($this->session->userdata('FilterImplentChkValue')) {
                                    $filterVal = array();
                                    $filterVal = ($this->session->userdata('FilterImplentChkValue'));
                                    if (in_array($val, $filterVal)) { ?> checked<?php }
                                } ?> onchange="FilterNewImpl()"
                                          value="implementType:<?php echo $implArrayValue->id; ?>">
                                <?php echo ucfirst($implArrayValue->name); ?> (<?php
                                echo count(shweta_select('id', 'new_implement', 'implementType', $implArrayValue->id));
                                ?>)
                            </label>
                        </div>
                    <?php } ?>
                </form>
                <div class="dotted-border"></div>
                <h4 class="search-head">
                    <i class="fa fa-bank c3"></i>
                    Brand</h4>
                <form class="form-horizontal scroll_imps" role="form">
                    <?php
                    $condBrand = "type LIKE '%implements%'";
                    foreach (Select_OrderBy_brand('*', 'brand', $condBrand, 'name', 'ASC') as $res => $obj) {
                        $val = "brand:" . $obj->id;
                        ?>
                        <div class="checkbox">
                            <label><input type="checkbox"
                                          class="chbox" <?php if ($this->session->userdata('FilterImplentChkValue')) {
                                    $filterVal = array();
                                    $filterVal = ($this->session->userdata('FilterImplentChkValue'));
                                    if (in_array($val, $filterVal)) { ?> checked<?php }
                                } ?> onchange="FilterNewImpl()"
                                          value="brand:<?php echo $obj->id; ?>"><?php echo ucfirst($obj->name); ?>
                                (<?php
                                $cc = "brand ='" . $obj->id . "'";
                                echo count(shweta_select_th('id', 'new_implement', $cc));

                                ?>)
                            </label>
                        </div>
                        <?php
                    }
                    ?>
                </form>
                <div class="dotted-border"></div>
                <h4 class="search-head">
                    <i class="fa fa-bank c3"></i>
                    Categories</h4>
                <form class="form-horizontal" role="form">
                    <?php
                    foreach (shweta_order_by_query('*', ' implement_type_cate', 'name', 'ASC') as $res => $obj) {
                        $val = "implement_cate:" . $obj->id;
                        ?>
                        <div class="checkbox">
                            <label><input type="checkbox"
                                          class="chbox" <?php if ($this->session->userdata('FilterImplentChkValue')) {
                                    $filterVal = array();
                                    $filterVal = ($this->session->userdata('FilterImplentChkValue'));
                                    if (in_array($val, $filterVal)) { ?> checked<?php }
                                } ?> onchange="FilterNewImpl()"
                                          value="implement_cate:<?php echo $obj->id; ?>"><?php echo ucfirst($obj->name); ?>
                                (<?php
                                $cc = "implement_cate ='" . $obj->id . "'";
                                echo count(shweta_select_th('id', 'new_implement', $cc));

                                ?>)
                            </label>
                        </div>

                        <?php
                    }
                    ?>

                </form>
            </div>
            <div class="col-sm-12 col-md-12 col-xs-12" style="padding: 0px;margin: 15px 0px;">
                <div style="width:255px;height:600px;float: left;padding: 0px;">
                    <?php echo searchAdd(); ?>
                </div>
            </div>
        </div>
        <input type="hidden" value="<?php echo $rr; ?>" id="implementType">
        <div class="col-sm-9 col-md-9 col-xs-12" style="padding-bottom: 0px;">
            <div class="box-wrapper">
                <div class="col-sm-12 col-md-12 col-xs-12" style="padding:14px 0px;background:white">
                    <div class="col-sm-8 col-md-8 col-xs-12">
                        <h1 style="margin:2px 0px 0px;font-size:15px;">Tractor Implements</h1>
                    </div>
                    <div class="col-sm-4 col-md-4 col-xs-12">
                    </div>
                </div>
                <div class="box1" style="margin-top:62px;">
                    <div class="row">
                        <?php
                        if (!empty($result)){
                        ?>
                        <div class="col-md-12 col-sm-12 col-xs-12 paddingZ" id="filter_result">
                            <?php echo implementTractorDivNew($result, $total, $lastval); ?>
                            <?php
                            }
                            else {
                                ?>
                                <div class="col-md-12 col-sm-12 col-xs-12 paddingZ" id="filter_result">
                                    <h4 style="color:#DB4C4D;text-align:center;">No result found</h4>
                                </div>
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
<?php echo quickLinksHTML(); ?>
</div>
</div>
<script type="text/javascript">
    function FilterNewImpl() {
        var chkArray = [];
        $(".chbox:checked").each(function () {
            chkArray.push($(this).val());
        });
        document.getElementById('LoderImage').style.display = "block";
        var imp = document.getElementById('implementType').value;
        $.ajax({
            type: "POST",
            url: 'ImplementTractor/filterNewImpResult',
            data: {val: chkArray, imp1: imp},
            success: function (data) {
                document.getElementById('LoderImage').style.display = "none";
                $("#filter_result").html(data);
            },
        });
    }
</script>
<script>
    var root5 = '<?php echo $root; ?>';
    function ImplementUrlAjax(ImplementId, BrandName, SlugHar) {
        datavar = 'ImplementId1=' + ImplementId;
        $.ajax({
            type: "POST",
            url: root5 + 'ImplementTractor/SetImplementSession',
            data: datavar,
            success: function (data) {
                window.location.href = root5 + "implement/" + BrandName + "-" + SlugHar;
            },
        });
    }
</script>