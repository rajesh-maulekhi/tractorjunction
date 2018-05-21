<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);


$bradId = '';
$brandName = '';
$data1 = array();
if (isset($_GET['brand_name'])) {
    $bradId = $_GET['brand_name'];

}
?>

<div class="banner" style="background:rgba(204, 0, 1, 0.7) none repeat scroll 0% 0%;height:105px;">
    <div class="container">
        <div class="col-sm-12 col-md-12" style="padding:15px 0px;">
            <ul type="none" style="color:#fff">
                <li style="float:left;padding-right:5px;"><i class="fa fa-home"
                                                             style="font-size:16px;padding-right:5px;"></i>Home
                </li>
                <li style="float:left;padding-right:5px;">/</li>
                <li style="float:left;padding-right:5px;">Customer Care</li>
            </ul>
        </div>
    </div>
</div>
<div class="container d1">
    <div class="col-sm-12 col-md-12 paddingZ b1">
        <div class="box-wrapper">
            <div class="box1" style="padding-top: 0;
padding-bottom: 0;">
                <div class="row g1">
                    <img src="images/customer.jpg" alt="Tractor_customer_care banner image tractorjunction"
                         style="width:100%;height:300px"/>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="col-sm-12 col-md-12" style="padding-bottom: 90px;border:1px solid #eee">
        <div class="col-md-9 col-sm-9">
            <h2 style="margin:40px 0px 0px;font-size:2.3em;color:#148f1a;">Tractor <span style="color:#cc0001;"> Customer Care</span>
            </h2>
        </div>
        <?php
        $result = array();
        $result = shweta_select('*', 'customercare', '', '');
        ?>
        <?php if (!empty($result)) { ?>
            <div class="col-sm-3 col-md-3" style="padding:40px 35px 0px 0px;width:240px">
                <div class="dis">
                    <?php //echo form_open('tractor-customer-care'); ?>

                    <form action="<?php echo $root; ?>tractor-customer-care" method="GET">
                        <?php $cc[''] = 'Nothing selected';
                        foreach (shweta_order_by_query('brand', ' customercare', '', '') as $r => $t) {
                            $tractor_brand = '';
                            foreach (shweta_select('name', 'brand', 'id', $t->brand) as $raa) $tractor_brand = $raa->name;
                            $cc[$t->brand] = ucfirst($tractor_brand);
                        }
                        $js5 = 'class="serca" id="maxOption2"  data-max-options="1"style="width:150px;border:none;border-right:2px solid #eee" required="required"';
                        echo form_dropdown('brand_name', $cc, '', $js5);
                        ?>
                        <button type="submit" class="btns"><i class="fa fa-search"></i></button>
                        <?php echo form_close(); ?>
                </div>
            </div>
        <?php } ?>
        <div class="border" style="margin:80px 0px 0px;">
            <div class="border-inner"></div>
        </div>
        <div class="col-md-12 col-sm-12" style="margin-top:20px">
            <?php

            $result = array();
            if ($bradId != '') {
                $result = shweta_select('*', 'customercare', 'brand', $bradId);
            } else {
                $result = shweta_select('*', 'customercare', '', '');

            }

            ?>
            <?php
            $i = 1;
            if (!empty($result)){
            foreach ($result as $key => $value){
            $tractor_brandImage = '';
            $tractor_brand = '';
            foreach (shweta_select('image', 'brand', 'id', $value->brand) as $raa) $tractor_brandImage = $raa->image;
            foreach (shweta_select('name', 'brand', 'id', $value->brand) as $raa) $tractor_brand = $raa->name;
            $contactNo_exp = array();
            $contactNo_exp_2 = array();
            $contactNo_exp = explode('$$', $value->contactno);
            $contactNo_exp_2 = (array_filter($contactNo_exp));
            ?>
            <div class="col-md-6 col-sm-6" style="margin-bottom: 10px;">
                <div class="col-md-12 col-sm-12"
                     style="text-align:center;border:2px solid #eee;padding:10px;border-radius:4px;height: 106px;">
                    <div class="col-md-3 col-sm-3">
                        <img src="<?php echo $root . "upload/"; ?><?php echo $tractor_brandImage; ?>" style="width: 100%;
height: 50px;"/>
                    </div>
                    <div class="col-md-5 col-sm-5">
                        <span style="font-size:14px;color:#DB4C4D;font-weight:bold"><?php echo ucwords($tractor_brand); ?>
                            Customer Care</span>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <span style="font-size:14px;color:#DB4C4D;font-weight:bold">Toll Free Number</span><br>
                        <span style="font-size:14px;font-weight:bold">
				<?php
                foreach ($contactNo_exp_2 as $contactNo_exp_2) {
                    echo $contactNo_exp_2;
                    echo "<br>";
                }
                ?>
							</span>
                    </div>
                </div>
            </div>
            <?php if ($i % 2 == 0){ ?>
        </div>
        <div class="col-md-12 col-sm-12">
            <?php } ?>
            <?php $i++;
            }
            } else { ?>
                <h4 style="color:#DB4C4D;text-align:center;">No Contact found</h4>
            <?php } ?>
        </div>
    </div>
    <?php echo quickLinksHTML(); ?>
</div>
</div>
</div>
