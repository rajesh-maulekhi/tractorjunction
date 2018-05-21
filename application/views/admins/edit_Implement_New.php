<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

if ($this->session->userdata('admin')) {
    foreach ($result as $key => $value) {
    }
    ?>
    <title>Admin || Edit implement </title>
    <script type="text/javascript" src="<?php echo $root ?>ckeditor/ckeditor.js"></script>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"
         style="padding:0px;min-height:835px;background: #F7F7F7;">
        <!-- main section -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding:20px 14px;">
            <a href="<?php echo $root; ?>admins/show-implement-list">
                <button type="button" class="btn btn-default buttoupdate" style="">Show Implements</button>
            </a>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding: 30px 15px;background: #fff;">
            <h3>Edit implement</h3>
            <hr style="  border-top: 3px solid #C5C2C2;">


            <div id="page-wrapper">
                <div class="row">

                    <?php
                    $att = array('class' => 'form-horizontal form-label-left');
                    echo form_open_multipart('admins/ImplementTractor/updateImplementNewEnd', $att); ?>


                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Implement Brand* :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                            <?php
                            $selected = '';
                            $selected = ($value->brand) ? $value->brand : $value->brand;
                            $aa = array();
                            $val3a = array();
                            $aa = shweta_order_by_query('*', 'brand', 'name', 'ASC');
                            $val3a[''] = 'Please Select brand';
                            foreach ($aa as $k3 => $r3) {
                                $val3a[$r3->id] = ucfirst($r3->name);
                            }
                            $ab = 'class="form-control" required="required"';
                            echo form_dropdown('brand', $val3a, $selected, $ab);
                            ?>

                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Implement Name :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                            <?php
                            $selected = '';
                            $selected = ($value->implementType) ? $value->implementType : $value->implementType;
                            $query3 = shweta_order_by_query('*', 'filed', 'name', 'ASC');
                            $val3[''] = 'Please Select Implement';
                            foreach ($query3 as $k3 => $r3) {
                                $val3[$r3->id] = ucfirst($r3->name);
                            }
                            $ab = 'class="form-control col-md-7 col-xs-12" required="required" disabled';
                            echo form_dropdown('aa', $val3, $selected, $ab);
                            ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Model Name :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'value' => $value->model_name, 'class' => 'form-control', 'required' => 'required', 'name' => 'name')); ?>
                            <?php echo form_input(array('type' => 'hidden', 'value' => $value->implementType, 'class' => 'form-control', 'required' => 'required', 'name' => 'implementFor')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">image :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'file', 'name' => 'model_image', 'id' => 'picture', 'class' => 'col-md-7 col-xs-12')); ?>
                            <?php echo form_input(array('type' => 'hidden', 'name' => 'oldmodel_image', 'value' => $value->image, 'class' => 'col-md-7 col-xs-12')); ?>
                            <?php echo form_input(array('type' => 'hidden', 'name' => 'idHar', 'value' => $value->id, 'class' => 'col-md-7 col-xs-12')); ?>
                            <?php echo form_input(array('type' => 'hidden', 'name' => 'slug_old', 'value' => $value->slug, 'class' => 'col-md-7 col-xs-12')); ?>
                            <?php echo form_input(array('type' => 'hidden', 'name' => 'specImage', 'value' => $value->specImge, 'class' => 'col-md-7 col-xs-12')); ?>
                        </div>
                        <div class="col-md-1 col-sm-1">
                            <img src="<?php echo $root; ?>images/implementTractor/<?php echo $value->image; ?>" style="    width: 100px;
    height: 50px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Overview* :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
	<textarea name="overview" placeholder="Enter overview" class="form-control ckeditor col-md-7 col-xs-12">
	<?php echo $value->overview; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Specification Image :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'file', 'class' => 'form-control', 'name' => 'model_image2')); ?>
                        </div>
                        <div class="col-md-1 col-sm-1">
                            <img src="<?php echo $root; ?>images/implementTractor/<?php echo $value->specImge; ?>"
                                 style="    width: 100px;
    height: 50px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Tractor Power* :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'value' => $value->tractorPower, 'placeholder' => 'Enter Tractor Power', 'required' => 'required', 'name' => 'tractorpower')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Price :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'value' => $value->price, 'placeholder' => 'Enter Price', 'name' => 'price')); ?>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom:10px">
                        <div class="col-md-4 col-sm-4">
                            <span style="float:right;margin-top:7px;font-weight:bold">Other images (Can uploaded multiple images): </span>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <input type="file" multiple name="userfile[]" class="col-md-7 col-xs-12" size="20"/>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom:10px">
                        <div class="col-md-4 col-sm-4">
                            <span style="float:right;margin-top:7px;font-weight:bold"> </span>
                        </div>
                        <div class="col-md-6  col-sm-6 col-xs-12" style="    padding: 10px;
    border: 1px solid #2F3136;">
                            <p>
                                <a href="<?php echo $root; ?>admins/ImplementTractor/deleteAllimageImplement?id=<?php echo $value->id; ?>"
                                   style="cursor:pointer;">Want to Empty gallery</a></p>

                            <?php
                            if ($value->gallery == "") {
                                echo "gallery empty";
                            } else {
                                ?>

                                <?php
                                $gallery_array = array();
                                $gallery_array = explode('$$', $value->gallery);
                                foreach ($gallery_array as $image) {
                                    if (file_exists("./images/implementTractor/" . $image)) { ?>
                                        <div class="col-md-3 col-sm-3" style="margin-top:10px;">
                                            <img src="<?php echo $root ?>images/implementTractor/<?php echo $image; ?>"
                                                 style="  width:100%;  height: 80px;float:left;border:1px solid #eee;
">
                                            <a href="<?php echo $root; ?>admins/implementTractor/DeleteHarvesterImagesingleImplement?imagename=<?php echo $image; ?>&id=<?php echo $value->id; ?>">Delete</a>
                                        </div>
                                    <?php }
                                } ?>

                            <?php } ?>

                        </div>
                    </div>

                    <?php

                    $fields = array();
                    $fields = shweta_select('*', ' implementvalue', 'ImpId', $value->id);
                    foreach ($fields as $fieldsKey22 => $fieldsValue22) {
                        $featurename2 = array();
                        $featurename_filter2 = array();
                        $featurename2 = explode('$$', $fieldsValue22->impName);
                        $featurename_filter2 = (array_filter($featurename2));


                        $featurename = array();
                        $featurename_filter = array();
                        $featurename = explode('$$', $fieldsValue22->ImpValue);
                        $featurename_filter = (array_filter($featurename));
                    }

                    // echo "<pre>";
                    // print_r($featurename_filter2);


                    $tt = 0;
                    // print_r($featurename_filter);
                    // die;
                    foreach ($featurename_filter2 as $k1) {

                        ?>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12"> <?php echo ucfirst($k1); ?> :
                                <span class="red">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php if (isset($featurename_filter[$tt])) { ?>
                                    <?php echo form_input(array('type' => 'text', 'required' => 'required', 'class' => 'form-control', 'value' => $featurename_filter[$tt], 'name' => 'valueImplement[]')); ?>
                                <?php } else { ?>
                                    <?php echo form_input(array('type' => 'text', 'required' => 'required', 'class' => 'form-control', 'value' => 'N/A', 'name' => 'valueImplement[]')); ?>
                                <?php } ?>
                            </div>
                        </div>

                        <?php
                        $tt++;
                    } ?>


                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                            <?php echo form_input(array('type' => 'submit', 'id' => 'form_up', 'class' => 'btn btn-default buttoupdate', 'value' => 'Update implement')); ?>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>


        </div>


    </div>


    <?php
} else {
    header("Location:" . $root . "admin");
}
?>