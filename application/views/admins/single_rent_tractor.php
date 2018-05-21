<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

if ($this->session->userdata('admin')) {
    ?>
    <title>Admin || rent tractor </title>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"
         style="padding:0px;min-height:835px;background: #F7F7F7;">
        <!-- main section -->
        <style>
            .l1 {
                color: #065E84;
                font-size: 18px;
                text-align: left;
            }

            .l2 {
                color: black;
                font-size: 18px;
            }
        </style>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding: 30px 15px;background: #fff;">
            <h3>Rent tractor</h3>
            <hr style="  border-top: 3px solid #C5C2C2;">
            <?php
            foreach ($result as $value => $obj) {
            }
            ?>

            <div id="page-wrapper"
                 style="line-height: 35px;float:left;border:2px solid #eee;width:100%;padding: 17px 0px;">

                <div class="col-md-6 col-sm-6" style="border-right:2px solid #ccc">


                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Brand
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php

                                    foreach (shweta_select('name', 'brand', 'id', $obj->brand) as $raa1) echo $raa1->name;

                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Model Name:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <a href="<?php echo $root; ?>rent-tractor/<?php echo newslugend($obj->slug); ?>"
                                       target="_blank">
                                        <?php echo ucfirst($obj->model_name); ?>    </a></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Seller Name:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">

                                    <?php echo ucfirst($obj->name); ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Seller City:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php foreach (shweta_select('name', 'cities', 'id', $obj->city) as $raa) echo ucfirst($raa->name);
                                    ?>            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Seller State:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">

                                    <?php foreach (shweta_select('name', 'states', 'id', $obj->state) as $raa) echo ucfirst($raa->name);
                                    ?>        </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Seller Email-id:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">

                                    <?php echo ucfirst($obj->email); ?>        </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Seller Contact no:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">

                                    <?php echo ucfirst($obj->mobile); ?>        </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Rent per Hour charge* :
                                </div>
                                <div class="col-md-6 col-sm-6 l2">

                                    <?php echo form_open('admins/ListRentTractor/UpdateSinglerent'); ?>
                                    <?php echo form_input(array('type' => 'text', 'name' => 'rentper', 'value' => $obj->rentper, 'placeholder' => 'Rent per Hour charge', 'required' => 'required', 'class' => 'form-control')); ?>
                                    <?php echo form_input(array('type' => 'hidden', 'name' => 'id', 'value' => $obj->id, 'placeholder' => 'Rent per Hour charge', 'required' => 'required', 'class' => 'form-control')); ?>
                                    <?php echo form_input(array('type' => 'submit', 'value' => 'Save', 'class' => '')); ?>

                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">

                                <div class="col-md-12 col-sm-6 l2">
                                    <?php if ($obj->availability_val == "available") { ?>
                                        <a href="<?php echo $root; ?>status-change/<?php echo $obj->id; ?>">Click here
                                            if tractor is Not Available </a>
                                    <?php } else { ?>
                                        <a href="<?php echo $root; ?>status-change-available/<?php echo $obj->id; ?>">Click
                                            here if tractor is Available </a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>


        </div>


    </div>


    <?php
} else {
    header("Location:login");
}
?>