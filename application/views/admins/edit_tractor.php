<?php
$root = "http://" . $_SERVER['HTTP_HOST'];

$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

if ($this->session->userdata('admin')) {
    ?>
    <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>

    <title>Admin || Add Tractor </title>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"
         style="padding:0px;min-height:835px;background: #F7F7F7;">
        <!-- main section -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding:20px 14px;">
            <a href="view_tractor">
                <button type="button" class="btn btn-default buttoupdate" style="">Show tractor</button>
            </a>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding: 30px 15px;background: #fff;">
            <h3>Add Tractor</h3>
            <hr style="  border-top: 3px solid #C5C2C2;">


            <?php
            foreach ($result as $row => $obj) {
            }
            ?>

            <img src="<?php echo $root; ?>upload/<?php echo $obj->image; ?>" style="height: 100px;
    width: 20%;
    
    position: absolute;"/>


            <div id="page-wrapper">
                <div class="row">
                    <?php $att = array('style' => 'padding:30px', 'class' => 'form-horizontal form-label-left', 'onsubmit' => 'return validation()', 'id' => 'form');
                    echo form_open_multipart('admins/edit_tractor_end', $att);
                    ?>
                    <?php echo form_input(array('type' => 'hidden', 'name' => 'model_id', 'id' => 'model_id', 'value' => $obj->id, 'placeholder' => 'Name')); ?>
                    <?php echo form_input(array('type' => 'hidden', 'name' => 'model_img', 'id' => '', 'value' => $obj->image, 'placeholder' => 'Name')); ?>

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
                            $var_br = shweta_select('*', 'brand', 'id', $obj->brand);
                            foreach ($var_br as $v => $ss) {
                                $var_br = $ss->id;
                            }
                            echo form_dropdown('brand', $brand, $var_br, $ab);
                            ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Model Name :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'model_name', 'id' => 'model_name', 'value' => $obj->model_name, 'required' => 'required', 'placeholder' => 'Name', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Model Image :
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12" style="width: 24%;
    background: #139ED9;
    height: 47px;
    padding: 10px;
    margin-left: 17px;
    color: white;">
                            <?php echo form_input(array('type' => 'file', 'name' => 'model_image', 'id' => 'model_image', 'class' => 'col-md-7 col-xs-12', 'style' => 'width:100%')); ?>
                        </div>
                    </div>
                    <br/>
                    <center><h3 style="color:#139ED9;" class="mid_hed">Technical Specification</h3></center>
                    <hr style="margin:0px !important;  border-top: 1px solid #C5C2C2;">
                    <div class="head_border">
                        <h4>Engine:</h4>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">No. Of Cylinder
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'cylinder', 'id' => 'cylinder', 'value' => $obj->cylinder, 'placeholder' => 'No. of Cylinder', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">HP Category :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php
                            $temp2 = shweta_select('*', 'hp', '', '');
                            $p2 = "";
                            $hp[0] = 'Please Select';
                            foreach ($temp2 as $row => $objk) {
                                $hp[$objk->id] = $objk->name;
                            }
                            $ab = 'class="form-control col-md-7 col-xs-12"';
                            $var_br2 = shweta_select('*', 'hp', 'id', $obj->hp);
                            foreach ($var_br2 as $v => $ss) {
                                $var_br2 = $ss->id;
                            }
                            echo form_dropdown('hp', $hp, $var_br2, $ab);
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Capacity CC
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'capacity', 'id' => 'capacity', 'value' => $obj->capacity, 'placeholder' => 'Capacity CC', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Engine Rated RPM
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'engine_rated_rpm', 'id' => 'engine_rated_rpm', 'value' => $obj->engine_rated_rpm, 'placeholder' => 'Engine Rated RPM', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Cooling
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'cooling', 'id' => 'cooling', 'value' => $obj->cooling, 'placeholder' => 'Cooling', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Air Filter
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'engine_air_filter', 'id' => 'engine_air_filter', 'value' => $obj->engine_air_filter, 'placeholder' => 'Air Filter', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    </fieldset>
                    <div class="head_border"><h4>Transmission:</h4></div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Type
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'transmission_type', 'value' => $obj->transmission_type, 'placeholder' => 'Transmission type', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Clutch
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'transmission_clutch', 'id' => 'transmission_clutch', 'value' => $obj->transmission_clutch, 'placeholder' => 'Clutch', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Gear Box
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'transmission_gear_box', 'id' => 'transmission_gear_box', 'value' => $obj->transmission_gear_box, 'placeholder' => 'Gear Box', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Forward Speed (kmph)
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'speed_forward', 'id' => 'speed_forward', 'value' => $obj->speed_forward, 'placeholder' => 'Forward Speed', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Reverse Speed (kmph)
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'speed_reverse', 'id' => 'speed_reverse', 'value' => $obj->speed_reverse, 'placeholder' => 'Reverse Speed', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="head_border"><h4>Breaks:</h4></div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Break
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'breaks', 'id' => 'breaks', 'value' => $obj->breaks, 'placeholder' => 'Break', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="head_border"><h4>Hydraulics:</h4></div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Lifting Capacity
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'hydraulic_lifting_capacity', 'id' => 'hydraulic_lifting_capacity', 'value' => $obj->hydraulic_lifting_capacity, 'placeholder' => 'Lifting Capacity', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">3 Point Linkage
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'hydraulic_point_linkage', 'id' => 'hydraulic_point_linkage', 'value' => $obj->hydraulic_point_linkage, 'placeholder' => '3 Point Linkage', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="head_border"><h4>Steering:</h4></div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Type
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'steering_type', 'id' => 'steering_type', 'value' => $obj->steering_type, 'placeholder' => 'Steering Type', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Steering Column
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'steering_column', 'id' => 'steering_column', 'value' => $obj->steering_column, 'placeholder' => 'Steering Column', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="head_border"><h4>Power Take Off:</h4></div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Type
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'powertakeoff_type', 'id' => 'powertakeoff_type', 'value' => $obj->powertakeoff_type, 'placeholder' => 'Power Take Off Type', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">RPM
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'powertakeoff_rpm', 'id' => 'powertakeoff_rpm', 'value' => $obj->powertakeoff_rpm, 'placeholder' => 'Power Take Off RPM', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="head_border"><h4>Wheels And Tyres:</h4></div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Wheel Drive
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                            <input type="radio" name="wheel_drive"
                                   value="2" <?php if ($obj->wheel_drive == "2") { ?> checked <?php } ?>> 2 Wheel Drive
                            <br>
                            <input type="radio" name="wheel_drive"
                                   value="4" <?php if ($obj->wheel_drive == "4") { ?> checked <?php } ?>> 4 Wheel
                            Drive<br>
                            <input type="radio"
                                   name="wheel_drive" <?php if ($obj->wheel_drive == "2 and 4 both") { ?> checked <?php } ?>
                                   value="2 and 4 both"> Both
                            <?php
                            if ($obj->wheel_drive == "") {
                                ?>
                                <input type="hidden" name="wheel_drive" value="">

                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Front
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'wheels_tyre_front', 'id' => 'wheels_tyre_front', 'value' => $obj->wheels_tyre_front, 'placeholder' => 'Front', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Rear
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'wheels_tyre_rear', 'id' => 'wheels_tyre_rear', 'value' => $obj->wheels_tyre_rear, 'placeholder' => 'Rear', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="head_border"><h4>Fuel Tank:</h4></div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Capacity (lit)
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'fuel_tank_capacity', 'id' => 'fuel_tank_capacity', 'value' => $obj->fuel_tank_capacity, 'placeholder' => 'Capacity', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="head_border"><h4>Electrical System:</h4></div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Battery
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'battery_info', 'id' => 'battery_info', 'value' => $obj->battery_info, 'placeholder' => 'Battery', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">ALTERNATOR
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'alternator_info', 'id' => 'alternator_info', 'value' => $obj->alternator_info, 'placeholder' => 'ALTERNATOR', 'class' => 'form-control col-md-7 col-xs-12')); ?>

                        </div>
                    </div>
                    <div class="head_border"><h4>Dimensions and Weight of Tractor:</h4></div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Total Weight (kg)
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'total_weight', 'id' => 'total_weight', 'value' => $obj->total_weight, 'placeholder' => 'Weight', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Wheel Base (mm)
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'wheel_base', 'id' => 'wheel_base', 'value' => $obj->wheel_base, 'placeholder' => 'Wheel Base', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Overall Length (mm)
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'overall_length', 'id' => 'overall_length', 'value' => $obj->overall_length, 'placeholder' => 'Overall Length', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Overall width (mm)
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'overall_width', 'id' => 'overall_width', 'value' => $obj->overall_width, 'placeholder' => 'Overall Width', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Ground Clearance (mm)
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'ground_clearance', 'id' => 'ground_clearance', 'value' => $obj->ground_clearance, 'placeholder' => 'Ground Clearance', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Turning Radius With Brakes (mm)
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'turningradius_with_breaks', 'id' => 'turningradius_with_breaks', 'value' => $obj->turningradius_with_breaks, 'placeholder' => 'Turning Radius With Brakes', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>


                    <div class="head_border"><h4>Accessories:</h4></div>
                    <?php
                    $ab = explode('$$', $obj->accessories);
                    $ab_filter = (array_filter($ab));
                    $a = count($ab_filter);
                    $i = 1;
                    foreach ($ab_filter as $value) {
                        ?>
                        <div class="form-group" id="box_id_<?php echo $i; ?>">
                            <label class="control-label col-md-4 col-sm-4col-xs-12" id="l2<?php echo $value; ?>">Accessories <?php echo $i; ?>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php echo form_input(array('type' => 'text', 'name' => 'accessories_name[]', 'id' => 'accessories_id_' . $i, 'value' => $value, 'placeholder' => 'Accessories', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                            </div>
                            <?php
                            if ($i != 1) {
                                ?>
                                <a id="remNew" onclick="remove_ass('<?php echo $i; ?>')">Remove</a>
                            <?php } ?>
                        </div>
                        <?php
                        $i++;
                    } ?>
                    <div id="addinput3">
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4col-xs-12">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <a href="" id="addNew3">Add More</a>
                            <input type="hidden" name="i-value1" id="i-value1">

                        </div>
                    </div>


                    <div class="head_border"><h4>Options:</h4></div>
                    <?php
                    $ab_o = explode('$$', $obj->options);
                    $ab_filter_o = (array_filter($ab_o));
                    $a_o = count($ab_filter_o);
                    $i = 1;
                    foreach ($ab_filter_o as $value_o) {
                        ?>
                        <div class="form-group" id="box_id_options<?php echo $i; ?>">
                            <label class="control-label col-md-4 col-sm-4col-xs-12" id="l2<?php echo $value_o; ?>">Options <?php echo $i; ?>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php echo form_input(array('type' => 'text', 'name' => 'options_name[]', 'id' => 'options_id_' . $i, 'value' => $value_o, 'placeholder' => 'Options', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                            </div>
                            <?php
                            if ($i != 1) {
                                ?>
                                <a id="remNew" onclick="remove_options('<?php echo $i; ?>')">Remove</a>
                            <?php } ?>
                        </div>
                        <?php
                        $i++;
                    } ?>
                    <div id="addinput2">
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4col-xs-12">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <a href="" id="addNew2">Add More</a>

                        </div>
                    </div>


                    <div class="head_border"><h4>Additional Features:</h4></div>
                    <?php
                    $ab_ad = explode('$$', $obj->additional_features);
                    $ab_filter_ad = (array_filter($ab_ad));
                    $a_addi = count($ab_filter_ad);
                    $i = 1;
                    foreach ($ab_filter_ad as $value_ad) {
                        ?>
                        <div class="form-group" id="box_id_addi<?php echo $i; ?>">
                            <label class="control-label col-md-4 col-sm-4col-xs-12" id="l2<?php echo $value_ad; ?>">Additional
                                Features <?php echo $i; ?>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php echo form_input(array('type' => 'text', 'name' => 'addi_name[]', 'id' => 'addi_id_' . $i, 'value' => $value_ad, 'placeholder' => 'additional_features', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                            </div>
                            <?php
                            if ($i != 1) {
                                ?>
                                <a id="remNew" onclick="remove_addi('<?php echo $i; ?>')">Remove</a>
                            <?php } ?>
                        </div>
                        <?php
                        $i++;
                    } ?>
                    <div id="addinput1">
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4col-xs-12">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <a href="" id="addNew1">Add More</a>

                        </div>
                    </div>


                    <div class="head_border"><h4>Warranty:</h4></div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Warranty (Yr)
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'warranty', 'id' => 'warranty', 'value' => $obj->warranty, 'placeholder' => 'Warranty', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="head_border"><h4>Status:</h4></div>


                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Uses Of Tractor
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                            <?php
                            $tt = explode(',', $obj->uses_tractor);

                            foreach (shweta_select('*', 'category_tractor', '', '') as $r => $t) {
                                $rr = "";
                                if (in_array($t->id, $tt)) {
                                    $rr = TRUE;
                                } else {
                                    $rr = FALSE;
                                }

                                echo form_checkbox('uses[]', $t->id, $rr);
                                echo form_label(ucfirst($t->cate_name)); ?><br>
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
                            $ab = 'class="form-control col-md-7 col-xs-12 tii"';
                            $status_var = $obj->status;
                            echo form_dropdown('status', $status, $status_var, $ab);
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

                            <?php echo form_input(array('type' => 'text', 'name' => 'other_info', 'value' => $obj->other_info, 'id' => '', 'placeholder' => 'Other Infotrmation', 'class' => 'form-control')); ?>


                        </div>

                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Overview
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
<textarea name="overview" placeholder="Please add overview" class="form-control col-md-7 col-xs-12" required="">
					<?php echo $obj->overview; ?>	
						</textarea>

                        </div>
                    </div>
                    <script>
                        function validation() {

                            var a = document.getElementById('status').value;
                            if (a == "") {
                                document.getElementById('user_error').style.display = "block";
                                var temp = false;
                            }
                            if (a != "") {
                                document.getElementById('user_error').style.display = "none";
                                var temp = false;
                            }
                            if (a != "") {
                                var temp = true;
                            }

                            if (temp == true) {
                                document.getElementById('form').submit;
                            }
                            return temp;


                        }
                    </script>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Price in Lac
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'price', 'id' => 'price', 'value' => $obj->price, 'placeholder' => 'Price', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">PTO HP
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'value' => $obj->ptohp, 'name' => 'ptohp', 'placeholder' => 'PTO HP', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Fuel Pump
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'value' => $obj->fuel_pump, 'name' => 'fuel_pump', 'placeholder' => 'Fuel pump', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                            <?php echo form_input(array('type' => 'hidden', 'value' => $obj->slug, 'name' => 'old_slug', 'placeholder' => 'Fuel pump', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>


                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                            <?php echo form_input(array('type' => 'submit', 'id' => 'form_up', 'class' => 'btn btn-default buttoupdate', 'value' => 'Update')); ?>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>


            </div>


        </div>


        <script src="../../js/jquery.min2.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                var i = $('#addinput3 p').size() + <?php echo $a;?> +1;
                $("#addNew3").click(function () {
                    var addDiv = $('#addinput3');
                    $('<div class="form-group" id = "box_id_' + i + '"><label class="control-label col-md-4 col-sm-4 col-xs-12"></label><div id="tt3" class="col-md-6 col-sm-6 col-xs-12"><input type="text" id="accessories_id_' + i + '" class="form-control col-md-6 col-xs-12" name="accessories_name[]" /></div><a id="remNew" onclick="remove_ass(' + i + ')">Remove</a></div>').appendTo(addDiv);
                    i = i + 1;
                    $('#i-value1').val(i - 1);
                    return false;
                });
            });

            function remove_ass(id) {
                $("#accessories_id_" + id).prop("disabled", true);
                $('#box_id_' + id).hide();
            };
        </script>


        <script type="text/javascript">
            $(document).ready(function () {
                var i = $('#addinput2 p').size() + <?php echo $a_o;?> +1;
                $("#addNew2").click(function () {
                    var addDiv = $('#addinput2');
                    $('<div class="form-group" id = "box_id_options' + i + '"><label class="control-label col-md-4 col-sm-4 col-xs-12"></label><div id="tt3" class="col-md-6 col-sm-6 col-xs-12"><input type="text" id="options_id_' + i + '" class="form-control col-md-6 col-xs-12" name="options_name[]" /></div><a id="remNew" onclick="remove_options(' + i + ')">Remove</a></div>').appendTo(addDiv);
                    i = i + 1;
                    return false;
                });
            });

            function remove_options(id) {
                $("#options_id_" + id).prop("disabled", true);
                $('#box_id_options' + id).hide();
            };
        </script>

        <script type="text/javascript">
            $(document).ready(function () {
                var i = $('#addinput1 p').size() + <?php echo $a_addi;?> +1;
                $("#addNew1").click(function () {
                    var addDiv = $('#addinput1');
                    $('<div class="form-group" id = "box_id_addi' + i + '"><label class="control-label col-md-4 col-sm-4 col-xs-12"></label><div id="tt3" class="col-md-6 col-sm-6 col-xs-12"><input type="text" id="addi_id_' + i + '" class="form-control col-md-6 col-xs-12" name="addi_name[]" /></div><a id="remNew" onclick="remove_addi(' + i + ')">Remove</a></div>').appendTo(addDiv);
                    i = i + 1;
                    return false;
                });
            });

            function remove_addi(id) {
                $("#addi_id_" + id).prop("disabled", true);
                $('#box_id_addi' + id).hide();
            };
        </script>


        <script>
            $(function () {
                $("#datepicker").datepicker({
                    changeMonth: true,
                    changeYear: true,
                    yearRange: "1700:2099"
                });
            });
        </script>
        <script type="text/javascript">
            bkLib.onDomLoaded(function () {
                nicEditors.allTextAreas()
            }); // convert all text areas to rich text editor on that page

            bkLib.onDomLoaded(function () {
                new nicEditor().panelInstance('area1');
            }); // convert text area with id area1 to rich text editor.

            bkLib.onDomLoaded(function () {
                new nicEditor({fullPanel: true}).panelInstance('area2');
            }); // convert text area with id area2 to rich text editor with full panel.
        </script>
        <script type="text/javascript">
            //<![CDATA[
            bkLib.onDomLoaded(function () {
                new nicEditor({maxHeight: 200}).panelInstance('area');
                new nicEditor({fullPanel: true, maxHeight: 200}).panelInstance('area1');
            });
            //]]>
        </script>


    <?php
} else {
    header("Location:login");
}
?>