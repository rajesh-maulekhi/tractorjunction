<?php

if ($this->session->userdata('admin')) {
    $root = "http://" . $_SERVER['HTTP_HOST'];

    $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);


    ?>

    <title>Admin || Add offer </title>
    <script type="text/javascript" src="<?php echo $root ?>ckeditor/ckeditor.js"></script>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"
         style="padding:0px;min-height:835px;background: #F7F7F7;">
        <!-- main section -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding:20px 14px;"><a href="view_offer">
                <button type="button" class="btn btn-default buttoupdate" style="">Show offer</button>
            </a>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding: 30px 15px;background: #fff;">
            <h3>Add offer</h3>
            <hr style="  border-top: 3px solid #C5C2C2;">


            <div id="page-wrapper">
                <div class="row">
                    <?php $att = array('class' => 'form-horizontal form-label-left');
                    echo form_open_multipart('admins/add_offer_end', $att); ?>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Image* :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'file', 'name' => 'picture', 'id' => 'picture', 'placeholder' => 'Upload your photo', 'class' => 'col-md-7 col-xs-12', 'required' => 'required',)); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Title* :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'title', 'id' => 'slider_caption', 'placeholder' => 'Offer title', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Offer Expiry Date* :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="datepicker1" name="endDate" placeholder="Offer Expiry Date"
                                   class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Description* :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
<textarea name="des" placeholder="Please add description" class="form-control col-md-7 col-xs-12 ckeditor" required="">
			</textarea>
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                            <?php echo form_input(array('type' => 'submit', 'name' => 'go', 'value' => 'Upload', 'id' => 'submit', 'class' => 'btn btn-default buttoupdate')); ?>
                        </div>
                    </div>
                    <?php echo form_close(); ?>

                </div>
            </div>

        </div>


    </div>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <script>
        $(function () {
            $("#datepicker").datepicker();
        });
        $(function () {
            $("#datepicker1").datepicker();
        });
    </script>


    <?php
} else {
    header("Location:login");
}
?>