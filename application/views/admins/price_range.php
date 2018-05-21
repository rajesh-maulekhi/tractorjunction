<?php

if ($this->session->userdata('admin')) {
    ?>
    <title>Admin || Add price Range </title>
    <head>
        <style>
            .a1 {
                float: none;
                margin: auto;
                width: 44%;
                margin-left: 58px;
                margin-top: 20px;
                height: 54px;
            }
        </style>
    </head>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"
         style="padding:0px;min-height:835px;background: #F7F7F7;">
        <!-- main section -->

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding: 30px 15px;background: #fff;">
            <h3>Add Price Range </h3>
            <div class="meas" id="info-message">

                <?php
                $this->load->library('session');
                echo $this->session->userdata('range');
                $this->session->unset_userdata('range');
                ?>
            </div>

            <hr style="  border-top: 3px solid #C5C2C2;">

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-md-10 col-sm-10" style="margin: auto;
    float: none;
    font-size: 25px;
    color: #065E84;
    text-transform: uppercase;
    text-align: center;">
                        <div class="col-md-6 col-sm-6 col-xs-12" style="border-right: 2px solid black;">
                            min Price range in (Lac)
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            max price range in (Lac)
                        </div>

                    </div>
                    <?php
                    echo form_open('admins/price_range/price_range_insert');
                    foreach (shweta_select('*', 'price_range', '', '') as $result => $obj) {
                        ?>

                        <div class="col-md-10 col-sm-10" style="margin:auto;float:none;">
                            <div class="col-md-6 col-sm-6 col-xs-12"
                                 style="margin-bottom:20px;border-right: 2px solid black;">
                                <?php echo form_input(array('type' => 'text', 'name' => 'first' . $obj->id, 'value' => $obj->first, 'placeholder' => 'min range', 'required' => 'required', 'class' => 'form-control', 'onkeypress' => 'return isNumberKey(event)', 'maxlength' => '3', 'minlength' => '1')); ?>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12" style="margin-bottom:20px">
                                <?php echo form_input(array('type' => 'text', 'name' => 'second' . $obj->id, 'value' => $obj->second, 'placeholder' => 'max range', 'required' => 'required', 'class' => 'form-control', 'onkeypress' => 'return isNumberKey(event)', 'maxlength' => '3', 'minlength' => '1')); ?>
                            </div>
                        </div>


                    <?php } ?>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                            <?php echo form_input(array('type' => 'submit', 'id' => 'form_up', 'class' => 'a1 btn btn-default buttoupdate', 'value' => 'Update')); ?>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="../../js/jquery.min2.js"></script>

    <script>
        function isNumberKey(evt) {  <!--Function to accept only numeric values-->
            //var e = evt || window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode
            if (charCode != 46 && charCode > 31
                && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
    </script>

    <?php
} else {
    header("Location:login");
}
?>

