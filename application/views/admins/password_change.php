<?php

if ($this->session->userdata('admin')) {
    ?>
    <title>Admin || password_change </title>

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
                    $att = array('class' => 'form-horizontal form-label-left', 'onsubmit' => 'return pass_match()');
                    echo form_open_multipart('admins/Password_change_end', $att); ?>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Old Password :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'password', 'name' => 'o_pass', 'id' => 'old_pass', 'onchange' => 'old_pass_match();', 'placeholder' => 'Old Password', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                            <?php echo form_input(array('type' => 'hidden', 'id' => 'user_id_val', 'name' => 'user_id', 'value' => $this->session->userdata('admin'))); ?>
                            <p style="color:red;display:none" id="errora">Password Not match...</p>
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
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">
                            Confirm Password :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'password', 'name' => 'c_pass', 'id' => 'c_id', 'placeholder' => 'Confirm Password', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>


                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                            <?php echo form_input(array('type' => 'submit', 'id' => 'submit_password_bt', 'class' => 'btn btn-default buttoupdate', 'value' => 'Change Password')); ?>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>


        </div>


    </div>


    <script src="../../js/jquery.min2.js"></script>
    <script>
        function old_pass_match() {
            var old = document.getElementById('old_pass').value;
            var u_id = document.getElementById('user_id_val').value;

            datavar = 'old_password=' + old + '& user_id=' + u_id;

            $.ajax({
                type: "POST",
                url: '../admins/Old_pass_match_ajax',
                data: datavar,
                success: function (data) {
                    if (data == "no") {

                        $('#submit_password_bt').attr('disabled', 'disabled');

                        document.getElementById('errora').style.display = "block";
                    }
                    else {
                        $('#submit_password_bt').attr('disabled', false);
                        document.getElementById('errora').style.display = "none";
                    }

                },
                error: function () {
                    alert("error occur");
                }
            });

        }
        function pass_match() {

            var n_pass = document.getElementById('n_id').value;
            var c_pass = document.getElementById('c_id').value;
// alert(n_pass);
// alert(c_pass);
            if (n_pass != c_pass) {
                alert("New Password and confirm password not equal");
                temp = false;
            }
            if (n_pass == c_pass) {
                // alert("New Password and confirm password not equal");
                temp = true;
            }

            return temp;
        }
    </script>


    <?php
} else {
    header("Location:login");
}
?>