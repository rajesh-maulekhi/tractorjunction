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
                <li style="float:left;padding-right:5px;">Insurance</li>
            </ul>
        </div>
    </div>
</div>
<div class="container d1">
    <div class="col-sm-12 col-md-12 paddingZ b1">
        <div class="box-wrapper">
            <div class="">
                <img src="images/insurance-banner.jpg" alt="Tractor insurance banner image tractorjunction"
                     class="img-responsive financeImageBanner"/>
            </div>
        </div>
    </div>
</div>
<div class="container d15">
    <div class="col-sm-12 col-md-12 col-xs-12 ipm paddingZ a34">
        <div class="col-sm-8 col-md-8 col-xs-12">
            <ul class="nav nav-tabs single-nav" id="maincontent" role="tablist">
                <li class="active"><a href="#finance" role="tab" data-toggle="tab" class="hvr-bubble-bottom">Finance</a>
                </li>
                <li><a href="#specification" role="tab" data-toggle="tab" class="hvr-bubble-bottom">Instruction</a></li>
            </ul><!--/.nav-tabs.content-tabs -->
            <div class="tab-content">
                <div class="tab-pane fade in active d19" id="finance">
                    <div class="panel-group" id="accordion1">
                        <div class="panel panel-default">
                            <div class="col-sm-12 col-md-12 col-xs-12 ipm">
                                <h4 class="b3" style="color:#DD4445"><u>Apply Form</u></h4>
                                <?php
                                $att = 'class="form-horizontal form_insu" style="text-align:right"';
                                echo form_open_multipart('Insurance/InsuranceEnd', $att);
                                ?>
                                <div class="col-sm-12 col-md-12 col-xs-12 ipm a36">
                                    <div class="col-sm-2 col-md-2 huh"></div>
                                    <div class="col-sm-3 col-md-3 col-xs-12 ipm paddingZ">Type Of Policy :<span
                                                class="red">*</span></div>
                                    <div class="col-sm-5 col-md-5 col-xs-12 ipm" style="text-align:left">
                                        <input type="radio" name="type" value="new"><span style="font-size:0.9em">  Buy New Tractor Insurance Policy </span><br>
                                        <input type="radio" name="type" checked value="used"><span
                                                style="font-size:0.9em">  Renew Tractor Insurance Policy</span><br>
                                    </div>
                                    <div class="col-sm-2 col-md-2 huh"></div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-xs-12 ipm a36">
                                    <div class="col-sm-3 col-md-5 col-xs-12 paddingZ"> Vehicle Registered City(RTO):
                                        <span class="red">*</span>
                                    </div>
                                    <div class="col-sm-5 col-md-5 col-xs-12">
                                        <input type="text" class="form-control" name="regno"
                                               placeholder="Vehicle Registered City(RTO)" required="required">
                                    </div>
                                    <div class="col-sm-2 col-md-2 huh"></div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-xs-12 ipm a36">
                                    <div class="col-sm-2 col-md-2 huh "></div>
                                    <div class="col-sm-3 col-md-3 col-xs-12 paddingZ"> Insurance Company :<span
                                                class="red">*</span></div>
                                    <div class="col-sm-5 col-md-5 col-xs-12">
                                        <?php
                                        $query3 = array();
                                        $val3 = array();
                                        $query3 = shweta_order_by_query('*', 'insurance_company', 'name', 'ASC');
                                        $val3[''] = 'Select Insurance Company';
                                        foreach ($query3 as $k3 => $r3) {
                                            $val3[$r3->id] = ucfirst($r3->name);
                                        }
                                        $ab = 'class="form-control" required="required"';
                                        echo form_dropdown('insurance_company', $val3, '', $ab);
                                        ?>
                                    </div>
                                    <div class="col-sm-2 col-md-2 huh"></div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-xs-12 ipm a36">
                                    <div class="col-sm-2 col-md-2 huh"></div>
                                    <div class="col-sm-3 col-md-3 col-xs-12 paddingZ"> Brand :<span class="red">*</span>
                                    </div>
                                    <div class="col-sm-5 col-md-5 col-xs-12">
                                        <?php
                                        $query3 = array();
                                        $val3 = array();
                                        $query3 = shweta_order_by_query('*', 'brand', 'name', 'ASC');
                                        $val3[''] = 'Select brand';
                                        foreach ($query3 as $k3 => $r3) {
                                            $val3[$r3->id] = ucfirst($r3->name);
                                        }
                                        $ab = 'class="form-control" required="required"';
                                        echo form_dropdown('brand', $val3, '', $ab);
                                        ?>
                                    </div>
                                    <div class="col-sm-2 col-md-2 huh"></div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-xs-12 ipm a36">
                                    <div class="col-sm-2 col-md-2 huh"></div>
                                    <div class="col-sm-3 col-md-3 col-xs-12 paddingZ"> Model :<span class="red">*</span>
                                    </div>
                                    <div class="col-sm-5 col-md-5 col-xs-12">
                                        <input type="text" class="form-control" name="model"
                                               placeholder="Enter Model Name" required="required">
                                    </div>
                                    <div class="col-sm-2 col-md-2 huh"></div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-xs-12 ipm a36">
                                    <div class="col-sm-2 col-md-1 huh"></div>
                                    <div class="col-sm-4 col-md-4 col-xs-12 paddingZ"> Registration Month-Year :<span
                                                class="red">*</span></div>
                                    <div class="col-sm-4 col-md-3 col-xs-12">
                                        <select name="regmnth" class="form-control" required="required">
                                            <option value="">Month</option>
                                            <option value="Jan">Jan</option>
                                            <option value="Feb">Feb</option>
                                            <option value="Mar">Mar</option>
                                            <option value="April">April</option>
                                            <option value="May">May</option>
                                            <option value="June">June</option>
                                            <option value="July">July</option>
                                            <option value="Aug">Aug</option>
                                            <option value="Sept">Sept</option>
                                            <option value="Oct">Oct</option>
                                            <option value="Nov">Nov</option>
                                            <option value="Dec">Dec</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4 col-md-2 col-xs-12">
                                        <select name="regyear" class="form-control" required="required">
                                            <option value="">Year</option>
                                            <?php
                                            $year = '';
                                            $year = date('Y') - 15;
                                            $year1 = date('Y');
                                            for ($year; $year <= $year1; $year++) {
                                                ?>
                                                <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-2 col-md-2 huh"></div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-xs-12 ipm a36">
                                    <div class="col-sm-2 col-md-1 huh"></div>
                                    <div class="col-sm-3 col-md-4 col-xs-12 ff paddingZ ">Previous Insurance Company :
                                    </div>
                                    <div class="col-sm-5 col-md-5 col-xs-12">
                                        <input type="text" class="form-control" name="precompany"
                                               placeholder="Enter Previous Insurance Company">
                                    </div>
                                    <div class="col-sm-2 col-md-2 huh"></div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-xs-12 ipm a36">
                                    <div class="col-sm-3 col-md-5 col-xs-12 paddingZ">Claims Made In Previous
                                        Policy:<span class="red">*</span></div>
                                    <div class="col-sm-5 col-md-4 col-xs-12" style="text-align:left">
                                        <input type="radio" name="claims" value="yes"><span style="font-size:0.9em">  Yes </span><br>
                                        <input type="radio" name="claims" checked value="no"><span
                                                style="font-size:0.9em">  No</span><br>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-xs-12 ipm a36">
                                    <div class="col-sm-2 col-md-2 huh"></div>
                                    <div class="col-sm-3 col-md-3 col-xs-12 paddingZ">Name :<span class="red">*</span>
                                    </div>
                                    <div class="col-sm-5 col-md-5 col-xs-12">
                                        <input type="text" class="form-control" name="name" placeholder="Enter Name"
                                               required="required">
                                    </div>
                                    <div class="col-sm-2 col-md-2 huh"></div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-xs-12 ipm a36">
                                    <div class="col-sm-2 col-md-2 huh "></div>
                                    <div class="col-sm-3 col-md-3 col-xs-12 paddingZ">Email ID :<span
                                                class="red">*</span></div>
                                    <div class="col-sm-5 col-md-5 col-xs-12">
                                        <input type="email" class="form-control" name="email"
                                               placeholder="Enter Email ID" required="required">
                                    </div>
                                    <div class="col-sm-2 col-md-2 huh"></div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-xs-12 ipm a36">
                                    <div class="col-sm-2 col-md-2 huh"></div>
                                    <div class="col-sm-3 col-md-3 col-xs-12 paddingZ">Phone Number :<span
                                                class="red">*</span></div>
                                    <div class="col-sm-5 col-md-5 col-xs-12">
                                        <input type="text" class="form-control" name="mobile" required="required"
                                               placeholder="Enter Phone Number">
                                    </div>
                                    <div class="col-sm-2 col-md-2 huh"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12 col-md-12 col-xs-12 ipm b5">
                                        <button type="submit" class="btn btn-default slido-btni">Apply for Insurance
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
                                Insurance Documentation & Eligibility</h4>
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
            <h4 class="d16">Insurance Scheme</h4>
            <?php
            $finance_result = array();
            $finance_result = shweta_order_by_Table('*', 'scheme', 'type', 'insurance','order_by','DESC');
            if (!empty($finance_result)) {
                foreach ($finance_result as $key => $value) {
                    ?>
                    <div class="col-md-12 col-sm-12 col-xs-12 d17 tra_sing">
                        <p style="    color: rgba(212, 21, 22, .8);
    font-weight: 700;
    text-align: center;
    text-decoration: underline;"><?php echo ucfirst($value->title); ?></p>
                        <img src="<?php echo $root; ?>images/scheme/<?php echo $value->image; ?>"
                             style="height:50px;width:150px;"/>
                        <br>
						      <p style="text-align:justify;font-size:14px;"><?php $des= substr(ucwords(strtolower($value->description)), 0, 54) . "..."; 
						echo strip_tags($des);
						?>
                        </p>
							<p>
                        <a href="<?php echo $root; ?>scheme/<?php echo $value->id; ?>/finance-scheme"
                           style="cursor: pointer;
    font-size: 14px;
    background: #DD4445;
    color: white;
    padding: 4px 24px;
    text-transform: capitalize;
    float: right;">read more</a>
                    </p>
                    </div>
                    <div id="InsuranceSchemeDiv_<?php echo $value->id; ?>" class="insurance">
                        <div class="model_readmore insurance1">
                            <i style="font-size: 22px;text-align: right;float: right;cursor:pointer"
                               onclick="CloseOrderInsuranceSchemeShowDiv('<?php echo $value->id; ?>')"
                               class="fa fa-close"></i>
                            <h3 style="text-align: center;padding: 10px;color: rgb(219, 76, 77);"><?php echo ucfirst($value->title); ?>
                            </h3>
                            <div style="max-height:400px;overflow-y: scroll;">
                                <p style="text-align: justify;
					padding: 0px 35px;">
                                    <?php echo ucfirst($value->description); ?>
                                </p>
                            </div>
                        </div>
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
</body>