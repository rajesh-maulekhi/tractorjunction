<?php

if ($this->session->userdata('admin')) {
    ?>
    <title>Admin || Add Brand </title>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"
         style="padding:0px;min-height:835px;background: #F7F7F7;">
        <!-- main section -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding:20px 14px;"><a href="view_brand">
                <button type="button" class="btn btn-default buttoupdate" style="">Show brand</button>
            </a>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding: 30px 15px;background: #fff;">
            <h3>Add Brand</h3>
            <hr style="  border-top: 3px solid #C5C2C2;">


            <div id="page-wrapper">
                <div class="row">
                    <?php
                    $att = array('class' => 'form-horizontal form-label-left');
                    echo form_open_multipart('admins/Add_brand_end', $att); ?>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Brand type* :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="checkbox" value="tractor" name="type[]">
                            Trator
                            <input type="checkbox" value="harvester" name="type[]">
                            Harvester
                            <input type="checkbox" value="implements" name="type[]">
                            Implements
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Brand Name* :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'brand_name', 'id' => 'brand_name', 'placeholder' => 'Brand Name', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Description :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						<textarea class="form-control" name="brand_description">
						</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Brand Image* :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'file', 'name' => 'picture', 'id' => 'picture', 'class' => 'col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
<div class="form-group">
<label class="control-label col-md-4 col-sm-4 col-xs-12">Meta Title :
</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<?php echo form_input(array('type' => 'text', 'name' => 'meta_title', 'class' => 'form-control col-md-7 col-xs-12')); ?>
</div>
</div>                   
<div class="form-group">
<label class="control-label col-md-4 col-sm-4 col-xs-12">Meta Keyword :
</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<?php echo form_input(array('type' => 'text', 'name' => 'meta_keywords', 'class' => 'form-control col-md-7 col-xs-12')); ?>
</div>
</div>                   
<div class="form-group">
<label class="control-label col-md-4 col-sm-4 col-xs-12">Meta Description :
</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<?php echo form_input(array('type' => 'text', 'name' => 'meta_description', 'class' => 'form-control col-md-7 col-xs-12')); ?>
</div>
</div>                   

				   <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                            <?php echo form_input(array('type' => 'submit', 'id' => 'form_up', 'class' => 'btn btn-default buttoupdate', 'value' => 'Add Brand')); ?>
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