<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

if ($this->session->userdata('admin')) {
    foreach ($result as $key => $value) {
    }
    // echo "<pre>";
    // print_r($result);
    // die;
    ?>
    <title>Admin || Edit Filed Title </title>
    <script type="text/javascript" src="<?php echo $root ?>ckeditor/ckeditor.js"></script>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"
         style="padding:0px;min-height:835px;background: #F7F7F7;">
        <!-- main section -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding:20px 14px;"><a
                    href="<?php echo $root; ?>admins/show-field-title">
                <button type="button" class="btn btn-default buttoupdate" style="">Show Filed</button>
            </a>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding: 30px 15px;background: #fff;">
            <h3>Edit Filed Title</h3>
            <hr style="  border-top: 3px solid #C5C2C2;">


            <div id="page-wrapper">
                <div class="row">

                    <?php
                    $att = array('class' => 'form-horizontal form-label-left');
                    echo form_open_multipart('admins/ImplementTractor/editFiledEnd', $att); ?>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12"> Category Type* :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                            <?php
                            // echo $value->implement_cate;
                            // die;
                            $selected = '';
                            $selected = ($value->implement_cate) ? $value->implement_cate : $value->implement_cate;
                            $aa = shweta_order_by_query('*', 'implement_type_cate', 'name', 'ASC');
                            $val3a[''] = 'Please Select Implement Category';
                            foreach ($aa as $k3 => $r3) {
                                $val3a[$r3->id] = ucfirst($r3->name);
                            }
                            $ab = 'class="form-control" required="required"';
                            echo form_dropdown('implement_cate', $val3a, $selected, $ab);
                            ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Name :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'name', 'value' => $value->name, 'id' => 'brand_name', 'placeholder' => 'Enter Name', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                            <?php echo form_input(array('type' => 'hidden', 'name' => 'id', 'value' => $value->id, 'id' => 'brand_name', 'placeholder' => 'Enter Name', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                            <?php echo form_input(array('type' => 'hidden', 'name' => 'slug_old', 'value' => $value->slug, 'id' => 'brand_name', 'placeholder' => 'Enter Name', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                            <?php echo form_input(array('type' => 'submit', 'id' => 'form_up', 'class' => 'btn btn-default buttoupdate', 'value' => 'Update Filed title')); ?>
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