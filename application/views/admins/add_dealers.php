<?php

if ($this->session->userdata('admin')) {
    ?>

    <title>Admin || Add Dealers </title>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"
         style="padding:0px;min-height:835px;background: #F7F7F7;">
        <!-- main section -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding:20px 14px;"><a
                    href="view_dealers">
                <button type="button" class="btn btn-default buttoupdate" style="">Show Dealers</button>
            </a>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding: 30px 15px;background: #fff;">
            <h3>Add Dealers</h3>
            <hr style="  border-top: 3px solid #C5C2C2;">


            <div id="page-wrapper">
                <div class="row">
                    <?php
                    $att = array('class' => 'form-horizontal form-label-left');
                    echo form_open_multipart('admins/add_dealers_end', $att); ?>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">State Name :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php
                            $query1 = shweta_select('*', 'states', 'country_id', '101');
                            $val1[0] = 'please select';
                            foreach ($query1 as $k1 => $r1) {
                                $val1[$r1->id] = ucfirst($r1->name);
                            }
                            $ab = 'class="form-control col-md-7 col-xs-12" id="country_id_val" onchange="state_get()"';
                            echo form_dropdown('state', $val1, '', $ab);
                            ?>


                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">City Name:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php
                            $js6 = 'class="form-control" id="cur_city_id"';
                            echo form_dropdown('city', '', '', $js6);
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Name:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'name', 'id' => 'brand_name', 'placeholder' => 'Name', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12"> Authorize For
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php
                            $query3 = shweta_order_by_query('*', 'brand', 'name', 'ASC');
                            $val3[0] = 'Please Select';
                            foreach ($query3 as $k3 => $r3) {
                                $val3[$r3->id] = ucfirst($r3->name);
                            }
                            $ab = 'class="form-control col-md-7 col-xs-12"';
                            echo form_dropdown('authorize', $val3, '', $ab);
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Address :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_textarea(array('name' => 'address', 'placeholder' => 'Address', 'required' => 'required', 'style' => 'height:100px', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Contact :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'contact', 'id' => 'brand_name', 'placeholder' => 'contact', 'required' => 'required', 'maxlength' => '10', 'minlength' => '10', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Pin :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'pin', 'id' => 'brand_name', 'placeholder' => 'Pin', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12', 'maxlength' => '6', 'minlength' => '6',)); ?>
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
    header("Location:login");
}
?>