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
                <li style="float:left;padding-right:5px;">Dealership enquiry</li>
            </ul>
        </div>
    </div>
</div>
<div class="container d1">
    <div class="col-sm-12 col-md-12 paddingZ b1">
        <div class="box-wrapper" style="Padding:0px">
            <div class="box1" style="Padding:0px">
                <div class="row dealer">
                    <img src="images/banner-dealer-enquiry.jpg" alt="Dealearship enquiry banner image tractorjunction"
                         style="width:100%;height:300px"/>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="col-sm-12 col-md-12" style="padding-bottom: 90px;border:1px solid #eee">
        <h2 style="margin:40px 0px 0px;font-size: 1.8em;color:#148f1a;">Tractor <span style="color:#cc0001;">Dealer Enquiry</span>
        </h2>
        <div class="border">
            <div class="border-inner"></div>
        </div>
        <div class="col-sm-12 col-md-12"
             style="padding:25px 15px 30px;background:#fff;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px;">
            <div class="col-sm-7 col-md-7" style="border-right:1px solid #e9e9e9;">
                <h4 style="font-size:1.2em;font-weight:bold;padding: 0px 0px 10px;border-bottom:1px solid;margin-bottom: 20px;color: rgba(212, 21, 22, 0.8);">
                    Why Become a Dealer</h4>
                <h5 style="font-size:1.1em;padding: 0px 0px 10px;margin: 20px 0px 0px;color: rgba(222, 21, 38, 0.9);">
                    Why to take a franchise of Mahindra ? </h5>
                <ul style="line-height:25px">
                    <li>Leader in utility vehicles for over fifty years, since the company builts the first Willys jeeps
                        on Indian soil in 1947
                    </li>
                    <li>Pioneer in the Indian automobile industry</li>
                    <li>Major player in the Indian Two Wheeler industry with a robust presence in all product segments
                    </li>
                </ul>
                <h5 style="font-size:1.1em;padding: 0px 0px 10px;margin: 20px 0px 0px;color: rgba(222, 21, 38, 0.9);">
                    Franchise Facts:</h5>
                <ul style="line-height:25px">
                    <li>Area Required: 3500sqft</li>
                    <li>Investment: Rs. 50lac to Rs. 1Cr.</li>
                </ul>
                <h5 style="font-size:1.1em;padding: 0px 0px 10px;margin: 20px 0px 0px;color: rgba(222, 21, 38, 0.9);">
                    Franchisor Support:</h5>
                <ul style="line-height:25px">
                    <li>Pre and Post opening support</li>
                    <li>Marketing & Advertisement support</li>
                    <li>On-going operational support</li>
                    <li>Products support</li>
                </ul>
                <h5 style="font-size:1.1em;padding: 0px 0px 10px;margin: 20px 0px 0px;color: rgba(222, 21, 38, 0.9);">
                    Franchisee Benefits:</h5>
                <ul style="line-height:25px">
                    <li>Great returns on investment</li>
                    <li>Training & Support</li>
                    <li> you can get benefit from detailed broachers</li>
                </ul>
            </div>
            <div class="col-sm-5 col-md-5">
                <h4 style="font-size:1.2em;font-weight:bold;padding: 0px 0px 10px;border-bottom:1px solid;margin-bottom: 20px;color: rgba(212, 21, 22, 0.8);">
                    Enquiry Form</h4>
                <?php
                echo form_open_multipart('DealershipEnquiry/DealershipEnquiryEnd');
                ?>
                <div class="col-sm-12 col-md-12" style="margin-bottom:25px;margin-top:15px;">
                    <div class="form-group">
                        <?php echo form_input(array('type' => 'text', 'name' => 'name', 'required' => 'required', 'placeholder' => 'Enter Name', 'class' => 'form-control')); ?>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12" style="margin-bottom:25px;">
                    <div class="form-group">
                        <?php echo form_input(array('type' => 'text', 'name' => 'city', 'placeholder' => 'Enter City', 'required' => 'required', 'class' => 'form-control')); ?>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12" style="margin-bottom:25px;">
                    <div class="form-group">
                        <?php
                        $query1 = shweta_select('*', 'states', 'country_id', '101');
                        $val1[''] = 'Please select state';
                        foreach ($query1 as $k1 => $r1) {
                            $val1[$r1->id] = ucfirst($r1->name);
                        }
                        $ab = 'class="form-control" required="required"';
                        echo form_dropdown('state', $val1, '', $ab);
                        ?>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12" style="margin-bottom:25px;">
                    <div class="form-group">
                        <?php echo form_input(array('type' => 'text', 'name' => 'mobile', 'placeholder' => 'Enter Conatct No', 'onkeypress' => 'return isNumberKey(event)', 'placeholder' => 'Mobile Number', 'required' => 'required', 'class' => 'form-control', 'maxlength' => '10', 'minlength' => '10')); ?>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12" style="margin-bottom:25px;">
                    <div class="form-group">
                        <?php echo form_input(array('type' => 'email', 'name' => 'email', 'placeholder' => 'Enter Email-id', 'required' => 'required', 'class' => 'form-control')); ?>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12" style="margin-bottom:25px;">
                    <div class="form-group">
                        <?php
                        $query3 = shweta_order_by_query('*', 'brand', 'name', 'ASC');
                        $val3[''] = 'Select brand';
                        foreach ($query3 as $k3 => $r3) {
                            $val3[$r3->id] = ucfirst($r3->name);
                        }
                        $ab = 'class="form-control" required="required"';
                        echo form_dropdown('brand', $val3, '', $ab);
                        ?>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12" style="margin-bottom:25px;">
                    <div class="form-group">
                        <?php echo form_input(array('type' => 'text', 'name' => 'model', 'placeholder' => 'Enter Enquired Products', 'required' => 'required', 'class' => 'form-control')); ?>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 modal-footer1">
                    <button type="submit" class="btn btn-default modal_compare" style="font-weight:bold;">Send
                        Dealership Request
                    </button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <?php echo quickLinksHTML(); ?>
</div>
</div>
</div>