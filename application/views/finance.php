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
                <li style="float:left;padding-right:5px;">Finance</li>
            </ul>
        </div>
    </div>
</div>
<div class="container d1">
    <div class="col-sm-12 col-md-12 paddingZ b1">
        <div class="box-wrapper">
            <div class="">
                <img src="<?php echo $root; ?>images/loan-banner.jpg" alt="loan banner tractorjunction"
                     class="img-responsive financeImageBanner" style="">
            </div>
        </div>
    </div>
</div>
<div class="container d15">
    <div class="col-sm-12 col-md-12 col-xs-12 paddingZ a34">
        <div class="col-sm-8 col-md-8 col-xs-12">
            <ul class="nav nav-tabs single-nav" id="maincontent" role="tablist">
                <li class="active"><a href="#finance" role="tab" data-toggle="tab" class="hvr-bubble-bottom">Finance</a>
                </li>
            </ul><!--/.nav-tabs.content-tabs -->
            <div class="tab-content">
                <div class="tab-pane fade in active d19" id="finance">
                    <div class="panel-group" id="accordion1">
                        <div class="panel panel-default">
                            <div class="col-sm-12 col-md-12 col-xs-12 ipm">
                                <h4 class="b3" style="color:#DD4445"><u>Apply Finance</u></h4>
                                <?php
                                echo form_open_multipart('Finance/FinanceEnd');
                                ?>
                                <div class="col-sm-12 col-md-12 col-xs-12 ipm a36">
                                    <div class="col-sm-2 col-md-2 huh "></div>
                                    <div class="col-sm-3 col-md-3 col-xs-12 paddingZ">Type Of Finance :<span
                                                class="red">*</span></div>
                                    <div class="col-sm-5 col-md-5 col-xs-12 " style="text-align:left">
                                        <input type="radio" name="type" checked value="new"><span
                                                style="font-size:0.9em">  New Tractor Finance</span><br>
                                        <input type="radio" name="type" value="used"><span style="font-size:0.9em">  Used Tractor Finance</span><br>
                                    </div>
                                    <div class="col-sm-2 col-md-2 col-xs-12"></div>
                                </div>
       <div class="col-sm-12 col-md-12 col-xs-12 ipm a36">
                                    <div class="col-sm-2 col-md-2 huh "></div>
                                    <div class="col-sm-3 col-md-3 col-xs-12 paddingZ">Full Name :<span
                                                class="red">*</span></div>
                                    <div class="col-sm-5 col-md-5  col-xs-12">
                                        <input type="text" class="form-control" name="name" placeholder="Enter Name"
                                               required="required">
                                    </div>
                                    <div class="col-sm-2 col-md-2 huh "></div>
                                </div>
                                       <div class="col-sm-12 col-md-12 col-xs-12 ipm a36">
                                    <div class="col-sm-2 col-md-2 huh "></div>
                                    <div class="col-sm-3 col-md-3 col-xs-12 paddingZ">Email :<span
                                                class="red">*</span></div>
                                    <div class="col-sm-5 col-md-5  col-xs-12">
                                        <input type="text" class="form-control" name="email" placeholder="Enter Email"
                                               required="required">
                                    </div>
                                    <div class="col-sm-2 col-md-2 huh "></div>
                                </div>
                                       <div class="col-sm-12 col-md-12 col-xs-12 ipm a36">
                                    <div class="col-sm-2 col-md-2 huh "></div>
                                    <div class="col-sm-3 col-md-3 col-xs-12 paddingZ">Contact No :<span
                                                class="red">*</span></div>
                                    <div class="col-sm-5 col-md-5  col-xs-12">
                                        <input type="text" class="form-control" name="contact" placeholder="Enter Contact No"
                                               required="required">
                                    </div>
                                    <div class="col-sm-2 col-md-2 huh "></div>
                                </div>
                                   <div class="col-sm-12 col-md-12 col-xs-12 ipm a36">
                                    <div class="col-sm-2 col-md-2 huh"></div>
                                    <div class="col-sm-3 col-md-3 col-xs-12 paddingZ">Select State :<span
                                                class="red">*</span></div>
                                    <div class="col-sm-5 col-md-5 col-xs-12">
                                        <?php
                                        $query1 = shweta_select('*', 'states', 'country_id', '101');
                                        $val1[''] = 'Please select state';
                                        foreach ($query1 as $k1 => $r1) {
                                            $val1[$r1->id] = ucfirst($r1->name);
                                        }
                                        $ab = 'class="form-control" id="country_id_val"  required="required" onchange="CityGet(this.value)"';
                                        echo form_dropdown('state', $val1, '', $ab);
                                        ?>
                                    </div>
                                    <div class="col-sm-2 col-md-2 huh"></div>
                                </div>
                                     <div class="col-sm-12 col-md-12 col-xs-12 ipm a36">
                                    <div class="col-sm-2 col-md-2 huh"></div>
                                    <div class="col-sm-3 col-md-3 col-xs-12 paddingZ">Select City :<span
                                                class="red">*</span></div>
                                    <div class="col-sm-5 col-md-5 col-xs-12">
                                        <?php
                                        $val1 = array();
                                        $val1[''] = 'Please select City';
                                        $js6 = 'class="form-control" id="cur_city_id" required="required"';
                                        echo form_dropdown('city', $val1, '', $js6);
                                        ?>
                                    </div>
                                    <div class="col-sm-2 col-md-2 huh"></div>
                                </div>

                                      <div class="col-sm-12 col-md-12 col-xs-12 ipm a36">
                                    <div class="col-sm-2 col-md-2 huh "></div>
                                    <div class="col-sm-3 col-md-3 col-xs-12 paddingZ">Finance Amount : <span
                                                class="red">*</span></div>
                                    <div class="col-sm-5 col-md-5  col-xs-12">
                                        <input type="text" class="form-control" name="financeamt" placeholder="Enter Finance Amount"
                                               required="required">
                                    </div>
                                    <div class="col-sm-2 col-md-2 huh "></div>
                                </div>
     <div class="col-sm-12 col-md-12 col-xs-12 ipm a36">
                                    <div class="col-sm-2 col-md-2 huh"></div>
                                    <div class="col-sm-3 col-md-3 col-xs-12 paddingZ">Address :<span
                                                class="red">*</span></div>
                                    <div class="col-sm-5 col-md-5 col-xs-12 ">
                                        <textarea rows="5" cols="24" maxlength="50" class="form-control" name="address"
                                                  placeholder="Enter text here..." required="required"></textarea>
                                    </div>
                                    <div class="col-sm-2 col-md-2 huh"></div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12 col-md-12 col-xs-12 ipm b5">
                                        <button type="submit" class="btn btn-default slido-btni">Apply for Finance
                                        </button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div><!--/.tab-pane -->
                <div class="tab-pane fade ipm" id="specification" style="padding: 30px 20px 30px;min-height: auto;">
                    <div class="panel-group" id="accordion2">
                        <div class="panel panel-default">
                            <h4 class="d16">
                                Finance Documentation & Eligibility</h4>
                            <div class="d17">
                                <p style="text-align:justify">The 5075E comes equipped with a 2.9 Liter (179 cu in)
                                    engine producing 75 horsepower @ 2,400 rpm.
                                </p>
                                <ul class="paddingZ d18">
                                    <li>No. Of Cylinder are 3</li>
                                    <li>Air Filter are DRY AIR CLEANER</li>
                                    <li>Capacity CC are 2400</li>
                                    <li>Fuel Tank capacity are 47 lit</li>
                                    <li>Warranty are 2100 HOURS OR 2 Yr</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div><!--/.tab-pane -->
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12 max_mar">
            <h4 class="d16">Finance Scheme</h4>
            <?php
            $finance_result = array();
            $finance_result = shweta_order_by_Table('*', 'scheme', 'type', 'finance','order_by','DESC');
            if (!empty($finance_result)) {
                foreach ($finance_result as $key => $value) {
                    ?>
                    <div class="col-md-6 col-sm-12 d17 tra_sing" style="    min-height: 120px;">
                   <a href="<?php echo $root; ?>scheme/<?php echo $value->id; ?>/finance-scheme" target="_blank">
                        <img src="<?php echo $root; ?>images/scheme/<?php echo $value->image; ?>"
                             class="img-responsive"/>
                             </a>
                   </div>

            
                <?php }
            } else { ?>
                <div class="col-md-12 col-sm-12 d17">
                    <h5 style="text-align:center;color:#E15B5B">No Scheme Found</h5>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php echo quickLinksHTML(); ?>
</div>
</div>
</div>
</div>
<script>
    function CityGet(StateName) {
        $.ajax({
            type: "POST",
            url: "Home/StateGet",
            data: {StateID: StateName},
            success: function (data) {
                $("#cur_city_id").html(data);
            },
        });
    }
</script>