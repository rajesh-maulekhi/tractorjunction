<?php

if ($this->session->userdata('vendor')) {
    ?>
    <title>vendor || password_change </title>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"
         style="padding:0px;min-height:835px;background: #F7F7F7;">
        <!-- main section -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding:20px 14px;">
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding: 30px 15px;background: #fff;">
            <h3>Password Change</h3>
            <hr style="  border-top: 3px solid #C5C2C2;">


            <div id="page-wrapper">
                <div class="row">

                    <?php
                    $att = array('class' => 'form-horizontal form-label-left');
                    echo form_open_multipart('vendor/Home/PassChaneEnd', $att); ?>
					        <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">
                             User Name :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'u_name', 'id' => 'n_id', 'placeholder' => 'User Name', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>      
					<div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">
                            New Password :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'password', 'name' => 'n_pass', 'id' => 'n_id', 'placeholder' => 'New Password', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Old Password :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'password', 'name' => 'o_pass', 'id' => 'old_pass', 'onchange' => 'old_pass_match();', 'placeholder' => 'Old Password', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                   
                        </div>
                    </div>
            


                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                            <?php echo form_input(array('type' => 'submit', 'id' => 'submit_password_bt', 'class' => 'btn btn-default buttoupdate', 'value' => 'Update')); ?>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>


        </div>


    </div>


    <script src="../../js/jquery.min2.js"></script>
 

    <?php
} else {
 
}
?>