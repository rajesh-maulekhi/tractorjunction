<?php

if ($this->session->userdata('admin')) {
    ?>
    <title>Admin || Edit Seo Meta Tag </title>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"
         style="padding:0px;min-height:835px;background: #F7F7F7;">
        <!-- main section -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding:20px 14px;">
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding: 30px 15px;background: #fff;">
            <h3>Edit  Seo Meta Tag </h3>
            <hr style="  border-top: 3px solid #C5C2C2;">

            <?php
            foreach ($result as $value => $obj) {
				$meta_title=unserialize(base64_decode($obj->meta_title));
				$meta_keywords=unserialize(base64_decode($obj->meta_keywords));
				$meta_description=unserialize(base64_decode($obj->meta_description));
            }

            ?>

            <div id="page-wrapper">
                <div class="row">
                    <?php
                    $att = array('class' => 'form-horizontal form-label-left');
                    echo form_open_multipart('admins/SEO_meta/TagEditEnd', $att); ?>
                  
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Title:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'meta_title', 'value' => $meta_title, 'placeholder' => 'meta_title', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">meta_keywords:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'meta_keywords', 'value' => $meta_keywords, 'placeholder' => 'meta_keywords', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">meta_description:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'meta_description', 'value' => $meta_description, 'placeholder' => 'meta_description', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                            <?php echo form_input(array('type' => 'hidden', 'name' => 'page_name', 'value' => $page_name, 'placeholder' => 'meta_description', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
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


    <?php
} else {
    header("Location:login");
}
?>