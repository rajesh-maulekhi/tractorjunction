<?php

if ($this->session->userdata('admin')) {
    ?>
    <title>Admin || Edit Slider </title>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"
         style="padding:0px;min-height:835px;background: #F7F7F7;">
        <!-- main section -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding:20px 14px;"><a
                    href="view_slider">
                <button type="button" class="btn btn-default buttoupdate" style="">Show Slider</button>
            </a>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding: 30px 15px;background: #fff;">
            <h3>Edit Slider</h3>
            <hr style="  border-top: 3px solid #C5C2C2;">


            <?php
            $root = "http://" . $_SERVER['HTTP_HOST'];

            $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);


            foreach ($result as $value => $obj) {
            }
            ?>
            <img src="<?php echo $root; ?>upload/<?php echo $obj->image; ?>" style="height: 100px;
    width: 20%;
    
    position: absolute;"/>

            <div id="page-wrapper">
                <div class="row">
                    <?php $att = array('class' => 'form-horizontal form-label-left');
                    echo form_open_multipart('admins/edit_slider_end', $att); ?>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Image :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'file', 'name' => 'picture', 'id' => 'picture', 'placeholder' => 'Upload your photo', 'class' => 'col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Slider Caption :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'slider_caption', 'value' => $obj->slider_caption, 'placeholder' => 'Slider Caption', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                            <?php echo form_input(array('type' => 'hidden', 'name' => 'slider_id', 'value' => $obj->id, 'placeholder' => 'Slider Caption', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                            <?php echo form_input(array('type' => 'hidden', 'name' => 'slider_image', 'value' => $obj->image, 'placeholder' => 'Slider Caption', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Slider Sub-Caption :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'slider_sub_caption', 'value' => $obj->slider_sub_caption, 'placeholder' => 'Slider Sub Caption', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Read More Link :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'read_link', 'value' => $obj->read_link, 'placeholder' => 'Read More Link', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                            <?php echo form_input(array('type' => 'submit', 'name' => 'go', 'value' => 'Update', 'id' => 'submit', 'class' => 'btn btn-default buttoupdate')); ?>
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