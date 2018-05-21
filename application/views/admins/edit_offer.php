<?php

if ($this->session->userdata('admin')) {
    ?>
    <title>Admin || Edit offer </title>

    <?php
    $root = "http://" . $_SERVER['HTTP_HOST'];
    $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
    ?>
    <script type="text/javascript" src="<?php echo $root ?>ckeditor/ckeditor.js"></script>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"
         style="padding:0px;min-height:835px;background: #F7F7F7;">
        <!-- main section -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding:20px 14px;"><a href="view_offer">
                <button type="button" class="btn btn-default buttoupdate" style="">Show offer</button>
            </a>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding: 30px 15px;background: #fff;">
            <h3>Edit offer</h3>
            <hr style="  border-top: 3px solid #C5C2C2;">
            <?php foreach ($result as $value => $obj) {
            } ?>

            <img src="<?php echo $root; ?>upload/offer/<?php echo $obj->image; ?>" style="height: 100px;
    width: 20%;
    
    position: absolute;"/>


            <div id="page-wrapper">
                <div class="row">
                    <?php
                    $att = array('class' => 'form-horizontal form-label-left');
                    echo form_open_multipart('admins/Edit_offer_end', $att); ?>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Title* :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'title', 'value' => $obj->title, 'placeholder' => 'Title', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Offer Expiry Date* :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="datepicker1" name="endDate" value="<?php echo $obj->exp_date; ?>"
                                   placeholder="Offer Expiry Date" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Description :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
	<textarea name="description" placeholder="Please add description" class="form-control col-md-7 col-xs-12 ckeditor"
              required="">
			<?php echo $obj->description; ?></textarea> <?php echo form_input(array('type' => 'hidden', 'name' => 'model_id', 'value' => $obj->id, 'placeholder' => 'Description', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12"> Image* :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'file', 'name' => 'picture', 'id' => 'picture', 'class' => 'col-md-7 col-xs-12')); ?>
                            <?php echo form_input(array('type' => 'hidden', 'name' => 'image', 'value' => $obj->image, 'class' => 'col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                            <?php echo form_input(array('type' => 'submit', 'id' => 'form_up', 'class' => 'btn btn-default buttoupdate', 'value' => 'Update Offer')); ?>
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