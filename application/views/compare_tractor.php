<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
?>

<?php
$selected = '';
if ($this->session->userdata('tractor_id')) {
    $brand_id = $this->session->userdata('brand_id');
    ?>
    <?php
}
?>
<style>
.headIng{
        margin: 10px 0px 0px;
    color: #148f1a;
    font-size: 22px !important;
}
</style>

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
                        <div class="col-sm-12 col-md-12" style="    margin-bottom: 10px">
                        <div class="col-sm-12 col-md-4">
                            <h1 style="" class="font-upcoming headIng">
                                Compare Tractors in India</h1>
                            <h6 style="font-size:15px;">Please select to compare</h6>
                           
                        
                        </div>
                        <div class="col-sm-12 col-md-8">
<a href="https://goo.gl/edp9Db" target="_blank">
<img src="<?echo $root; ?>web_root/advertisments/sonilika-banner-comapre.gif" class="img-responsive sonalika_ad_desktop">
</a><a href="https://goo.gl/edp9Db" target="_blank">

<img src="<?echo $root; ?>web_root/advertisments/sonilika-banner-comapre-mobile.gif" class="img-responsive sonalika_ad_mobile" style="display: none">
    </a>
                    </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-xs-12" style="padding: 0px 15px;">
                            <div class="col-sm-12 col-md-12 col-xs-12 paddingZ"
                                 style="border:1px solid #e9e9e9;margin-bottom: 40px;">

                                <div class="col-sm-4 <?php echo $class_div; ?> col-xs-12 paddingZ compare_new CompareThird">
                                    <div class="col-sm-12 col-md-12 col-xs-12 comparison-page-l">
                                      <p class="AddTrP">Select Tractor </p>
                                        <div id="add1" class="Tabclass">
                                            <div class="form-group margin-top-20-px-comparioson-page">
                                                <label for="sel1" style="color:#fff;">Brand</label>
                                                <?php

                                                $js51 = 'class="form-control" id="tractor_first" onchange="Get_model_name(1,this.value)"';
                                                echo form_dropdown('tractor_first', $tractor_drop_down, $selected, $js51);
                                                ?>
                                            </div>
                                            <div class="form-group margin-top-20-px-comparioson-page">
                                                <select id="model_name_id1" class="form-control"
                                                        onchange="Get_Image('1');">
                                                    <option>Select Model</option>
                                                </select>
                                            </div>

                                        </div>
										
                                        <div id="result_tractor1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 <?php echo $class_div; ?> col-xs-12 paddingZ compare_new CompareThird">
                                    <div class="col-sm-12 col-md-12 col-xs-12 comparison-page-l">
 <p class="AddTrP">Select Tractor </p>
                                                                           
									  <div id="add2" class="Tabclass">
                                            <div class="form-group margin-top-20-px-comparioson-page">
                                                <label for="sel1" style="color:#fff;">Brand</label>
                                                <?php

                                                $js51 = 'class="form-control" id="tractor_second" onchange="Get_model_name(2,this.value)"';
                                                echo form_dropdown('tractor_second', $tractor_drop_down, '', $js51);
                                                ?>
                                            </div>
                                            <div class="form-group margin-top-20-px-comparioson-page">
                                                <select id="model_name_id2" class="form-control"
                                                        onchange="Get_Image('2');">
                                                    <option>Select Model</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div id="result_tractor2">
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-4 <?php echo $class_div; ?> col-xs-12 paddingZ compare_new CompareThird">
                                    <div class="col-sm-12 col-md-12 col-xs-12 comparison-page-l">
 <p class="AddTrP">Select Tractor </p>
                                                                            
									   <div id="add3" class="">
                                            <div class="form-group margin-top-20-px-comparioson-page">
                                                <label for="sel1" style="color:#fff;">Brand</label>
                                                <?php

                                                $js51 = 'class="form-control" id="tractor_third" onchange="Get_model_name(3,this.value)"';
                                                echo form_dropdown('tractor_third', $tractor_drop_down, '', $js51);
                                                ?>
                                            </div>
                                            <div class="form-group margin-top-20-px-comparioson-page">
                                                <select id="model_name_id3" class="form-control"
                                                        onchange="Get_Image(3);">
                                                    <option value="0">Select Model</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div id="result_tractor3">
                                        </div>

                                    </div>
                                </div>


                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12 CenterBT">
                                <button type="button" style="margin: 10px 0px 0px;" onclick="CommpareTractor();"
                                        class="viewNewsbt">
                                    Compare Now
                                </button>
                            </div>

                            <div class="col-sm-12 col-xs-12 adsDiv">
                                <p class="advertisementLabel">Advertisement</p>
                                <a href="<?php echo farmtracAdLink('75','farmtrac-tractors','compare_tractor'); ?>">
                                    <img src="<?php echo $root; ?>web_root/advertisments/farmtrac_tractor_ad2.gif"
                                         class="img-responsive">
                                </a>
                            </div>

                            <div class="col-sm-12 col-md-12 col-xs-12 ipm" id="compare_result"
                                 style="padding: 20px 15px;">


                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo quickLinksHTML(); ?>

<script>
    var root = '<?php echo $root; ?>';
</script>

<script>
    function CommpareTractor() {
        var Tractor1 = $('#model_name_id1').val();
        var Tractor2 = $('#model_name_id2').val();
        var Tractor3 = $('#model_name_id3').val();
        if (Tractor1 != '0' && Tractor2 != '0' && Tractor3 != '0') {

            window.location.replace(root + "compare-result/" + Tractor1 + "/" + Tractor2 + "/" + Tractor3);
        }
        // if (Tractor3 == '0') {
            // $('#tractor_third').val(62);
            // Get_model_name(3, 62);
            // $.ajax({
                // type: "POST",
                // url: 'Compare_tractor/GetThirdTractor',
                // data: {Tractor_first: Tractor1},
                // success: function (data) {
                    // $('#model_name_id3').val(data);
                    // $('#tab3').click();
                    // Get_Image(3);
                // },
            // });
        // }
        var Tractor3 = $('#model_name_id3').val();

        document.getElementById('LoderImage').style.display = "block";
        $.ajax({
            type: "POST",
            url: 'Compare_tractor/compare_result',
            data: {Tractor_first: Tractor1, Tractor_second: Tractor2, Tractor_third: Tractor3},
            success: function (data) {

                document.getElementById('LoderImage').style.display = "none";
// alert(data);
                $("#compare_result").html(data);
            },
        });
    }
    function Get_Image(tractor_position) {

        if (tractor_position == "1") {
            var Tractor_id = $('#model_name_id1').val();
        } else if (tractor_position == "2") {
            var Tractor_id = $('#model_name_id2').val();
        } else if (tractor_position == "3") {
            var Tractor_id = $('#model_name_id3').val();
        }
        $.ajax({
            type: "POST",
            url: 'Compare_tractor/compare_result_getImage',
            data: {Tractorid: Tractor_id},
            success: function (data) {

                $("#result_tractor" + tractor_position).html(data);
            },
        });
    }
    function Get_model_name(tractor_position, value_brand) {

        $.ajax({
            type: "POST",
            url: 'Compare_tractor/GetModelName',
            data: {id_brand: value_brand},
            success: function (data) {
                $("#model_name_id" + tractor_position).html(data);
            },
        });
    }
</script>
