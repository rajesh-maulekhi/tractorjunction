<?php

if ($this->session->userdata('admin')) {
    ?>
    <?php
    $root = "http://" . $_SERVER['HTTP_HOST'];
    $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
    ?>
    <title>Admin || Add Admin </title>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"
         style="padding:0px;min-height:835px;background: #F7F7F7;">
        <!-- main section -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding:20px 14px;"><a
                    href="<?php echo $root; ?>admins/show-semi-admin">
                <button type="button" class="btn btn-default buttoupdate" style="">Show Admin</button>
            </a>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding: 30px 15px;background: #fff;">
            <h3>Add Admin</h3>
            <hr style="  border-top: 3px solid #C5C2C2;">


            <div id="page-wrapper">
                <div class="row">

                    <?php
                    $att = array('class' => 'form-horizontal form-label-left');
                    echo form_open('admins/SemiAdmin/AddAdminEnd', $att); ?>


                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Admin Name* :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'name', 'id' => 'hp_name', 'placeholder' => ' Name', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Admin Email* :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'email', 'name' => 'email', 'id' => 'hp_name', 'placeholder' => 'email', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Admin Password* :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'password', 'name' => 'password', 'id' => 'hp_name', 'placeholder' => 'Password', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Admin Mobile No* :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'mobile', 'id' => 'hp_name', 'placeholder' => 'mobile', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">State* :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php
                            $query1 = shweta_select('*', 'states', 'country_id', '101');
                            $val1[''] = 'please select state';
                            foreach ($query1 as $k1 => $r1) {
                                $val1[$r1->id] = ucfirst($r1->name);
                            }
                            $ab = 'class="form-control col-md-7 col-xs-12" id="country_id_val"  required="required" onchange="state_get()"';
                            echo form_dropdown('states', $val1, '', $ab);
                            ?>


                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">City* :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php
                            $js6 = 'class="form-control" id="cur_city_id"';
                            echo form_dropdown('location', '', '', $js6);
                            ?>

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