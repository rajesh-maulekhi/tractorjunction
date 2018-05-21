<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

if ($this->session->userdata('admin')) {
    foreach ($result as $key => $obj) {
    }
    ?>
    <title>Admin || edit Service Center </title>

    <script type="text/javascript" src="<?php echo $root ?>ckeditor/ckeditor.js"></script>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"
         style="padding:0px;min-height:835px;background: #F7F7F7;">
        <!-- main section -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding:20px 14px;"><a
                    href="<?php echo $root; ?>admins/show-service-center">
                <button type="button" class="btn btn-default buttoupdate" style="">Show Service Center</button>
            </a>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding: 30px 15px;background: #fff;">
            <h3>Service Center</h3>
            <hr style="  border-top: 3px solid #C5C2C2;">


            <div id="page-wrapper">
                <div class="row">

                    <?php
                    $att = array('class' => 'form-horizontal form-label-left');
                    echo form_open_multipart('admins/ServiceCenter/editServiceCenterEnd', $att); ?>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Service Center Name :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'name', 'value' => $obj->name, 'id' => 'brand_name', 'placeholder' => 'Service Center Name', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                            <?php echo form_input(array('type' => 'hidden', 'name' => 'id_val', 'value' => $obj->id, 'id' => 'brand_name', 'placeholder' => 'Service Center Name', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Service Center For brand :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php
                            $selected = '';
                            $selected = ($obj->brand) ? $obj->brand : $obj->brand;
                            $query3 = shweta_order_by_query('*', 'brand', 'name', 'ASC');
                            $val3[''] = 'Please Select brand';
                            foreach ($query3 as $k3 => $r3) {
                                $val3[$r3->id] = ucfirst($r3->name);
                            }
                            $ab = 'class="form-control col-md-7 col-xs-12" required="required"';
                            echo form_dropdown('brand', $val3, $selected, $ab);
                            ?>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Service Center State :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php

                            $selected = '';
                            $selected = ($obj->state) ? $obj->state : $obj->state;
                            $query1 = shweta_select('*', 'states', 'country_id', '101');
                            $val1[''] = 'please select state';
                            foreach ($query1 as $k1 => $r1) {
                                $val1[$r1->id] = ucfirst($r1->name);
                            }
                            $ab = 'class="form-control col-md-7 col-xs-12" id="country_id_val"  required="required" onchange="state_get()"';
                            echo form_dropdown('state', $val1, $selected, $ab);
                            ?>


                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Service Center City :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php

                            $selected = '';
                            $selected = ($obj->city) ? $obj->city : $obj->city;
                            $query2 = shweta_select('*', 'cities', 'state_id', $obj->state);
                            $val2[''] = 'please select state';
                            foreach ($query2 as $k2 => $r2) {
                                $val2[$r2->id] = ucfirst($r2->name);
                            }
                            $js6 = 'class="form-control" id="cur_city_id"';
                            echo form_dropdown('city', $val2, $selected, $js6);
                            ?>

                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Service Center Address :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						<textarea name="address" placeholder="Please add adress" class="form-control ckeditor"
                                  required="">
						<?php echo $obj->address; ?>
						</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Service Center contact no :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'mobile', 'value' => $obj->mobile, 'placeholder' => 'Service contact No', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
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


    </div>


    <?php
} else {
    header("Location:" . $root . "admin");
}
?>