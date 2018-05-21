<?php

if ($this->session->userdata('admin')) {
    ?>
    <title>Admin || Edit Uses </title>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"
         style="padding:0px;min-height:835px;background: #F7F7F7;">
        <!-- main section -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding:20px 14px;"><a href="view_uses">
                <button type="button" class="btn btn-default buttoupdate" style="">Show Uses Of Tractor</button>
            </a>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding: 30px 15px;background: #fff;">
            <h3>Edit Uses Of Tractor</h3>
            <hr style="  border-top: 3px solid #C5C2C2;">

            <?php
            foreach ($result as $value => $obj) {
            }
            ?>

            <div id="page-wrapper">
                <div class="row">
                    <?php
                    $att = array('class' => 'form-horizontal form-label-left');
                    echo form_open_multipart('admins/edit_uses_end', $att); ?>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Category Name :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'cate_name', 'value' => $obj->cate_name, 'placeholder' => 'Category Name', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                            <?php echo form_input(array('type' => 'hidden', 'name' => 'cate_id', 'value' => $obj->id, 'placeholder' => 'Category Name', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
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


    </div>


    <script src="../../js/jquery.min2.js"></script>


    <?php
} else {
    header("Location:login");
}
?>