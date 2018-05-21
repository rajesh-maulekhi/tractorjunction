</head>
<body>
<div class="banner" style="background:rgba(204, 0, 1, 0.7) none repeat scroll 0% 0%;height:105px;">
    <div class="container">
        <div class="col-sm-12 col-md-12" style="padding:15px 0px;">
            <ul type="none" style="color:#fff">
                <li style="float:left;padding-right:5px;"><i class="fa fa-home"
                                                             style="font-size:16px;padding-right:5px;"></i>Home
                </li>
                <li style="float:left;padding-right:5px;">/</li>
                <li style="float:left;padding-right:5px;">EMI Calculator</li>
            </ul>
        </div>
    </div>
</div>
<div class="container" style="padding: 0px 15px;margin-top:-55px;background:transparent;">
    <div class="col-sm-12 col-md-12 paddingZ" style="padding-bottom: 10px;">
        <div class="col-sm-12 col-md-12">
            <div class="col-sm-12 col-md-12"
                 style="background:#fff;border:1px solid #e9e9e9;border-radius:3px;padding-bottom:20px;">
                <h4 class="search-head" style="font-size:1.3em;">
                    <i class="fa fa-credit-card"
                       style="padding-right:6px;color: rgba(212, 21, 22, 0.8); font-size:1.0em;"></i>
                    Tractor Loan EMI Calculator</h4>
                <p style="text-align:justify;margin-bottom:0px">
                    It is very easy to calculate the EMI for your tractor loan. You will get EMI as soon as you enter
                    the required
                    loan amount and the interest rate. Installment in EMI calculator is calculated on reducing balance.
                    As per the rules of financing institutions, processing fee or possible charges may be applicable
                    which
                    are not shown in the EMI we calculate.</p>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="col-sm-12 col-md-12" style="padding-bottom: 90px;">
        <h2 style="margin:30px 0px 0px;font-size: 2.3em;color:#148f1a;">Calculate Your <span
                    style="color:#cc0001;">EMI</span></h2>
        <div class="border">
            <div class="border-inner"></div>
        </div>
        <div class="col-sm-4 col-md-4 paddingL">
            <div class="col-sm-12 col-md-12 paddingZ" style="border: 1px solid #E9E9E9;border-radius: 3px;">
                <div class="col-sm-12 col-md-12 brand_name">
                    <h5 style="font-weight:bold">Choose Your Tractor</h5>
                </div>
                <div class="col-sm-12 col-md-12" style="padding: 0px 21px;">
                    <?php
                    $att = 'class="form-horizontal" style="padding:20px 10px 20px" onsubmit="return loanvalidation();"';
                    echo form_open('tractor-loan-emi-result', $att); ?>
                    <div class="form-group">
                        <label for="maxOption2" class="col-sm-6 col-md-6 control-label"
                               style="color:#4d4d4d;text-align:left;margin-top:3px;">Tractor Price*</label>
                        <div class="col-sm-6 col-md-6" style="margin-top:5px;">
                            <input type="text" onblur="loan_value();" id="tractorprice" class="form-control"
                                   name="tractorprice" required="required" value="<?php if (isset($tractorprice)) {
                                echo $tractorprice;
                            } ?>" placeholder="Tractor Price" style="height:23px;border:1px solid #d7d7d7;">
                        </div>
                        <label for="maxOption2" class="col-sm-6 col-md-6 control-label"
                               style="color:#4d4d4d;text-align:left;margin-top:18px;">Loan Amount*</label>
                        <div class="col-sm-6 col-md-6" style="margin-top:20px;">
                            <input onblur="loan_value();" id="loanamount" type="text" class="form-control"
                                   name="loanamount" required="required" value="<?php if (isset($loanamount)) {
                                echo $loanamount;
                            } ?>" placeholder="Loan Amount" style="height: 23px;border: 1px solid #d7d7d7;">
                        </div>
                        <label for="maxOption2" class="col-sm-6 col-md-6 control-label"
                               style="color:#4d4d4d;text-align:left;margin-top:18px;">Down Payment*</label>
                        <div class="col-sm-6 col-md-6" style="margin-top:20px;">
                            <h3 style="font-size: 17px;margin-top: 4px;"><i class="fa fa-inr"> </i> <span
                                        id="downpayment"><?php if (isset($downpayment)) {
                                        echo $downpayment;
                                    } else {
                                        echo "0";
                                    } ?></span></h3>
                        </div>
                        <label for="maxOption2" class="col-sm-6 col-md-6 control-label"
                               style="color:#4d4d4d;text-align:left;margin-top:18px;">Interest Rate* (%)</label>
                        <div class="col-sm-6 col-md-6" style="margin-top:20px;">
                            <input type="text" class="form-control" name="intrest" placeholder="Interest Rate"
                                   value="<?php if (isset($intrest)) {
                                       echo $intrest;
                                   } ?>" required="required" style="height: 23px;border: 1px solid #d7d7d7;">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12 col-md-12" style="text-align:center;padding-bottom:0px;padding-top:25px">
                            <input type="hidden" class="btn btn-default slido-btni" id="downpayment2" name="downpayment"
                                   style="padding: 10px 30px !important;" value="Calculate your EMI">
                            <input type="submit" class="btn btn-default slido-btni"
                                   style="padding: 10px 30px !important;" value="Calculate your EMI">
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <div class="col-sm-8 col-md-8 paddingR">
            <div class="col-sm-12 col-md-12 paddingZ" style="border: 1px solid #E9E9E9;border-radius: 3px;">
                <div class="col-sm-12 col-md-12 brand_name">
                    <h5 style="font-weight:bold">Your EMI (per month) </h5>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="col-sm-12 col-md-12" style="padding-top: 14px;">
                        <div class="col-sm-4 col-md-2 paddingZ">
                            <h4>Loan Period</h4>
                        </div>
                        <div class="col-sm-4 col-md-2 paddingZ" style="margin: 0px 0px 0px 21px;text-align: right;">
                            <h4 style="font-size: 14px;">12 Months</h4>
                        </div>
                        <div class="col-sm-4 col-md-2 paddingZ" style="margin: 0px 0px 0px 30px;text-align: right;">
                            <h4 style="font-size: 14px;">24 Months</h4>
                        </div>
                        <div class="col-sm-4 col-md-2 paddingZ" style="margin: 0px 0px 0px 30px;text-align: right;">
                            <h4 style="font-size: 14px;">36 Months</h4>
                        </div>
                        <div class="col-sm-4 col-md-2 paddingZ" style="margin: 0px 0px 0px 27px;text-align: right;">
                            <h4 style="font-size: 14px;">48 Months</h4>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 emisection">
                        <div class="permonthprice col-sm-4 col-md-2">EMI
                            <i class="arrowb fa fa-play"></i> <span>per / month</span>
                        </div>
                        <?php
                        if (!empty($month1)) { ?>
                            <div class="amount col-sm-4 col-md-2" id="emibelowtext">
                                <i class="fa fa-rupee"></i>&nbsp;<span
                                        id="emiPerMonth"><?php echo round($month1, 2); ?></span>
                            </div>
                            <div class="amount col-sm-4 col-md-2" id="emibelowtext">
                                <i class="fa fa-rupee"></i>&nbsp;<span
                                        id="emiPerMonth"><?php echo round($month2, 2); ?></span>
                            </div>
                            <div class="amount col-sm-4 col-md-2" id="emibelowtext">
                                <i class="fa fa-rupee"></i>&nbsp;<span
                                        id="emiPerMonth"><?php echo round($month3, 2); ?></span>
                            </div>
                            <div class="amount col-sm-4 col-md-2" id="emibelowtext">
                                <i class="fa fa-rupee"></i>&nbsp;<span
                                        id="emiPerMonth"><?php echo round($month4, 2); ?></span>
                            </div>
                        <?php } else { ?>
                            <div class="amount col-sm-4 col-md-2" id="emibelowtext">
                                <i class="fa fa-rupee"></i>&nbsp;<span id="emiPerMonth">0</span>
                            </div>
                            <div class="amount col-sm-4 col-md-2" id="emibelowtext">
                                <i class="fa fa-rupee"></i>&nbsp;<span id="emiPerMonth">0</span>
                            </div>
                            <div class="amount col-sm-4 col-md-2" id="emibelowtext">
                                <i class="fa fa-rupee"></i>&nbsp;<span id="emiPerMonth">0</span>
                            </div>
                            <div class="amount col-sm-4 col-md-2" id="emibelowtext">
                                <i class="fa fa-rupee"></i>&nbsp;<span id="emiPerMonth">0</span>
                            </div>
                        <?php } ?>
                        <div class="emitext">Calculated on Ex-showroom Price</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
