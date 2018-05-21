<?php

if ($this->session->userdata('admin')) {
    ?>
    <title>Admin || Add Tractor </title>

    <?php
    $root = "http://" . $_SERVER['HTTP_HOST'];

    $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);


    ?>
    <script type="text/javascript" src="<?php echo $root ?>ckeditor/ckeditor.js"></script>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"
         style="padding:0px;min-height:835px;background: #F7F7F7;">
        <!-- main section -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding:20px 14px;"><a
                    href="view_tractor">
                <button type="button" class="btn btn-default buttoupdate" style="">Show Tractor</button>
            </a>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding: 30px 15px;background: #fff;">
            <h3>Add Tractor</h3>
            <hr style="  border-top: 3px solid #C5C2C2;">


            <div id="page-wrapper">
                <div class="row">
                    <?php $att = array('style' => 'padding:30px', 'class' => 'form-horizontal form-label-left', 'onsubmit' => 'return validationAddTractor()', 'id' => 'form');
                    echo form_open_multipart('admins/add_tractor_end', $att);
                    ?>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">
                            Brand :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php

                            $temp = shweta_select('*', 'brand', '', '');
                            $p = "";
                            $brand[0] = 'Please Select';
                            foreach ($temp as $row => $objk) {
                                $brand[$objk->id] = ucfirst($objk->name);
                            }
                            $ab = 'class="form-control col-md-7 col-xs-12"';
                            echo form_dropdown('brand', $brand, '', $ab);
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Model Name :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'model_name', 'id' => 'model_name', 'placeholder' => 'Model Name', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Model Image :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12" style="width: 34%;
    background: #065E84;
    height: 47px;
    padding: 10px;
    margin-left: 17px;
    color: white;">
                            <?php echo form_input(array('type' => 'file', 'name' => 'model_image', 'id' => 'model_image', 'class' => 'col-md-7 col-xs-12', 'style' => 'width:100%')); ?>
                        </div>
                    </div>
                    <br/>
                    <center><h3 style="color:#065E84;" class="mid_hed">Technical Specification</h3></center>
                    <hr style="margin:0px !important;  border-top: 1px solid #C5C2C2;">
                    <div class="head_border">
                        <h4>Engine:</h4>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">No. Of Cylinder
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'cylinder', 'id' => 'cylinder', 'placeholder' => 'No. of Cylinder', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">HP Category :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php
                            $temp2 = shweta_select('*', 'hp', '', '');
                            $p = "";
                            $hp[0] = 'Please Select';
                            foreach ($temp2 as $row => $objk) {
                                $hp[$objk->id] = $objk->name . " HP";
                            }
                            $ab = 'class="form-control col-md-7 col-xs-12"';
                            echo form_dropdown('hp', $hp, '', $ab);
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Capacity CC
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'capacity', 'id' => 'capacity', 'placeholder' => 'Capacity CC', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Engine Rated RPM
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'engine_rated_rpm', 'id' => 'engine_rated_rpm', 'placeholder' => 'Engine Rated RPM', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Cooling
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'cooling', 'id' => 'cooling', 'placeholder' => 'Cooling', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Air Filter
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'engine_air_filter', 'id' => 'engine_air_filter', 'placeholder' => 'Air Filter', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    </fieldset>
                    <div class="head_border"><h4>Transmission:</h4></div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Type
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'transmission_type', 'id' => 'transmission_type', 'placeholder' => 'Transmission type', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Clutch
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'transmission_clutch', 'id' => 'transmission_clutch', 'placeholder' => 'Clutch', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Gear Box
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'transmission_gear_box', 'id' => 'transmission_gear_box', 'placeholder' => 'Gear Box', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Forward Speed (kmph)
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'speed_forward', 'id' => 'speed_forward', 'placeholder' => 'Forward Speed in kmph', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Reverse Speed (kmph)
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'speed_reverse', 'id' => 'speed_reverse', 'placeholder' => 'Reverse Speed in kmph', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="head_border"><h4>Breaks:</h4></div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Break
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'breaks', 'id' => 'breaks', 'placeholder' => 'Break', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="head_border"><h4>Hydraulics:</h4></div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Lifting Capacity
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'hydraulic_lifting_capacity', 'id' => 'hydraulic_lifting_capacity', 'placeholder' => 'Lifting Capacity', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">3 Point Linkage
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'hydraulic_point_linkage', 'id' => 'hydraulic_point_linkage', 'placeholder' => '3 Point Linkage', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="head_border"><h4>Steering:</h4></div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Type
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'steering_type', 'id' => 'steering_type', 'placeholder' => 'Steering Type', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Steering Column
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'steering_column', 'id' => 'steering_column', 'placeholder' => 'Steering Column', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="head_border"><h4>Power Take Off:</h4></div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Type
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'powertakeoff_type', 'id' => 'powertakeoff_type', 'placeholder' => 'Power Take Off Type', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">RPM
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'powertakeoff_rpm', 'id' => 'powertakeoff_rpm', 'placeholder' => 'Power Take Off RPM', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="head_border"><h4>Wheels And Tyres:</h4></div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Wheel Drive
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                            <input type="radio" name="wheel_drive" value="2" checked> 2 Wheel Drive <br>
                            <input type="radio" name="wheel_drive" value="4"> 4 Wheel Drive<br>
                            <input type="radio" name="wheel_drive" value="2 and 4 both"> Both
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Front
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'wheels_tyre_front', 'id' => 'wheels_tyre_front', 'placeholder' => '0.0 * 00', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Rear
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'wheels_tyre_rear', 'id' => 'wheels_tyre_rear', 'placeholder' => '0.0 * 00', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="head_border"><h4>Fuel Tank:</h4></div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Capacity (lit)
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'fuel_tank_capacity', 'id' => 'fuel_tank_capacity', 'placeholder' => 'Capacity in Lit', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="head_border"><h4>Electrical System:</h4></div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Battery
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'battery_info', 'id' => 'battery_info', 'placeholder' => 'Battery', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">ALTERNATOR
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'alternator_info', 'id' => 'alternator_info', 'placeholder' => 'ALTERNATOR', 'class' => 'form-control col-md-7 col-xs-12')); ?>

                        </div>
                    </div>
                    <div class="head_border"><h4>Dimensions and Weight of Tractor:</h4></div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Total Weight (kg)
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'total_weight', 'id' => 'total_weight', 'placeholder' => 'Weight', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Wheel Base (mm)
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'wheel_base', 'id' => 'wheel_base', 'placeholder' => 'Wheel Base', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Overall Length (mm)
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'overall_length', 'id' => 'overall_length', 'placeholder' => 'Overall Length', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Overall width (mm)
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'overall_width', 'id' => 'overall_width', 'placeholder' => 'Overall Width', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Ground Clearance (mm)
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'ground_clearance', 'id' => 'ground_clearance', 'placeholder' => 'Ground Clearance', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Turning Radius With Brakes (mm)
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'turningradius_with_breaks', 'id' => 'turningradius_with_breaks', 'placeholder' => 'Turning Radius With Brakes', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="head_border"><h4>Accessories:</h4></div>
                    <div class="form-group" id="addinput3">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Accessories
                        </label>
                        <div id="Accessoriesitems">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="accessories_name[]" placeholder="Accessories"
                                       class="form-control col-md-7 col-xs-12" id="p_1" maxlength="50" type="text">
                            </div>
                        </div>
                        <a onclick="AddAccessoriesFunction();" style="cursor:pointer;">Add More</a>
                    </div>

                    <div class="head_border"><h4>Options:</h4></div>
                    <div class="form-group" id="addinput3">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Options
                        </label>
                        <div id="Optionsitems">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="options_name[]" placeholder="Options"
                                       class="form-control col-md-7 col-xs-12" id="p_1" maxlength="50" type="text">
                            </div>
                        </div>
                        <a onclick="AddOptionsFunction();" style="cursor:pointer;">Add More</a>
                    </div>

                    <div class="head_border"><h4>Additional Features:</h4></div>
                    <div class="form-group" id="addinput3">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Additional Features
                        </label>
                        <div id="AdditionalFeaturesitems">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="addi_name[]" placeholder="Additional Features"
                                       class="form-control col-md-7 col-xs-12" id="p_1" maxlength="50" type="text">
                            </div>
                        </div>
                        <a onclick="AddAdditionalFunction();" style="cursor:pointer;">Add More</a>
                    </div>


                    <div class="head_border"><h4>Warranty:</h4></div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Warranty (Yr)
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'warranty', 'id' => 'warranty', 'placeholder' => 'Warranty', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="head_border"><h4>Status:</h4></div>


                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Uses Of Tractor
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php foreach (shweta_select('*', 'category_tractor', '', '') as $r => $t) { ?>

                                <?php echo form_input(array('type' => 'checkbox', 'name' => 'uses[]', 'value' => $t->id)); ?>
                                <?php echo form_label(ucfirst($t->cate_name)); ?><br>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Status
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php
                            $status = array(
                                '' => 'Please Select',
                                'launched' => 'Launched',
                                'coming_soon' => 'Coming Soon'
                            );
                            $ab = 'class="form-control col-md-7 col-xs-12 tii" id="status"';
                            echo form_dropdown('status', $status, '', $ab);
                            ?>
                            <div style="display:none;color:red;margin-top: 0px;float:right;" id="user_error"><i
                                        class="fa fa-arrow-up"></i> Please Fill this field...
                            </div>

                        </div>

                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Other Info
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'other_info', 'id' => '', 'placeholder' => 'Other Infotrmation', 'class' => 'form-control')); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Overview
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
			
						
<textarea name="overview" placeholder="Please add overview" class="form-control ckeditor col-md-7 col-xs-12"
          required="">
						
						</textarea>

                        </div>
                    </div>
                    <script>
                    </script>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Price in Lac
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'price', 'id' => 'price', 'placeholder' => 'Price in Lac', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">PTO HP
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'ptohp', 'placeholder' => 'PTO HP', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Fuel Pump
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'fuel_pump', 'placeholder' => 'Fuel pump', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>


                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                            <?php echo form_input(array('type' => 'submit', 'id' => 'form_up', 'class' => 'btn btn-default buttoupdate', 'value' => 'Submit')); ?>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>


            </div>


        </div>



    <?php
} else {
    header("Location:login");
}
?>