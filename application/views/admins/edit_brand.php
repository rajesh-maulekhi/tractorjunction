<?php

if ($this->session->userdata('admin')) {
    ?>
    <title>Admin || Edit Brand </title>
    <?php
    $root = "http://" . $_SERVER['HTTP_HOST'];
    $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
    ?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"
         style="padding:0px;min-height:835px;background: #F7F7F7;">
        <!-- main section -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding:20px 14px;"><a href="view_brand">
                <button type="button" class="btn btn-default buttoupdate" style="">Show brand</button>
            </a>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding: 30px 15px;background: #fff;">
            <h3>Edit Brand</h3>
            <hr style="  border-top: 3px solid #C5C2C2;">
            <?php foreach ($result as $value => $obj) {
            } ?>
            <!--
<img src= "<?php echo $root; ?>upload/<?php echo $obj->image; ?>" style="height: 100px;
    width: 20%;
    
    position: absolute;"/>
-->

            <div id="page-wrapper">
                <div class="row">
                    <?php
                    $att = array('class' => 'form-horizontal form-label-left');
                    echo form_open_multipart('admins/edit_brand_end', $att); ?>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Brand type* :
                        </label>
                        <?php
                        $exp_arr = array();
                        $exp_arr = explode('$$', $obj->type);
                        // echo "**********";
                        // print_r($exp_arr);
                        // die;
                        ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="checkbox" value="tractor"
                                   <?php if (in_array('tractor', $exp_arr)){ ?>checked <?php } ?> name="type[]">
                            Trator
                            <input type="checkbox" value="harvester"
                                   <?php if (in_array('harvester', $exp_arr)){ ?>checked <?php } ?> name="type[]">
                            Harvester
                            <input type="checkbox" value="implements"
                                   <?php if (in_array('implements', $exp_arr)){ ?>checked <?php } ?> name="type[]">
                            Implements
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Brand Name* :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'brand_name', 'value' => $obj->name, 'placeholder' => 'Brand Name', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Brand Image* :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'file', 'name' => 'picture', 'id' => 'picture', 'class' => 'col-md-7 col-xs-12')); ?>
                            <?php echo form_input(array('type' => 'hidden', 'name' => 'image', 'value' => $obj->image, 'class' => 'col-md-7 col-xs-12')); ?>
                            <?php echo form_input(array('type' => 'hidden', 'name' => 'old_slug', 'value' => $obj->slug, 'class' => 'col-md-7 col-xs-12')); ?>
                            <?php echo form_input(array('type' => 'hidden', 'name' => 'model_id', 'value' => $obj->id, 'class' => 'col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
<?php
$meta_tag=array(); 
$seo_tag=$obj->seo_meta;
$meta_tag=unserialize(base64_decode($seo_tag));
// print_r($meta_tag);
?>
					<div class="form-group">
<label class="control-label col-md-4 col-sm-4 col-xs-12">Meta Title :
</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<?php echo form_input(array('type' => 'text', 'name' => 'meta_title', 'value' => $meta_tag['meta_title'], 'class' => 'form-control col-md-7 col-xs-12')); ?>
</div>
</div>                   
<div class="form-group">
<label class="control-label col-md-4 col-sm-4 col-xs-12">Meta Keyword :
</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<?php echo form_input(array('type' => 'text', 'name' => 'meta_keywords', 'value' => $meta_tag['meta_keywords'], 'class' => 'form-control col-md-7 col-xs-12')); ?>
</div>
</div>                   
<div class="form-group">
<label class="control-label col-md-4 col-sm-4 col-xs-12">Meta Description :
</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<?php echo form_input(array('type' => 'text', 'name' => 'meta_description', 'value' => $meta_tag['meta_description'], 'class' => 'form-control col-md-7 col-xs-12')); ?>
</div>
</div> 
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                            <?php echo form_input(array('type' => 'submit', 'id' => 'form_up', 'class' => 'btn btn-default buttoupdate', 'value' => 'Update Brand')); ?>
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