<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

if ($this->session->userdata('admin')) {
    ?>
    <title>Admin || Add implement </title>
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
            <h3>Add implement</h3>
            <hr style="  border-top: 3px solid #C5C2C2;">


            <div id="page-wrapper">
                <div class="row">

                    <?php
                    $att = array('class' => 'form-horizontal form-label-left');
                    echo form_open_multipart('admins/ImplementTractor/addImplementNewEnd', $att); ?>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Implement Brand* :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                            <?php
                            $aa = array();
                            $val3a = array();
                            $aa = shweta_order_by_query('*', 'brand', 'name', 'ASC');
                            $val3a[''] = 'Please Select brand';
                            foreach ($aa as $k3 => $r3) {
                                $val3a[$r3->id] = ucfirst($r3->name);
                            }
                            $ab = 'class="form-control" required="required"';
                            echo form_dropdown('brand', $val3a, '', $ab);
                            ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Implement Name* :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                            <?php
                            $query3 = shweta_order_by_query('*', 'filed', 'name', 'ASC');
                            $val3[''] = 'Please Select Implement';
                            foreach ($query3 as $k3 => $r3) {
                                $val3[$r3->id] = ucfirst($r3->name);
                            }
                            $ab = 'class="form-control col-md-7 col-xs-12" required="required" onchange="getFieldsName(this.value);"';
                            echo form_dropdown('implementFor', $val3, '', $ab);
                            ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Model Name* :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'Enter Model Name', 'required' => 'required', 'name' => 'name')); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">image* :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'file', 'class' => 'form-control', 'required' => 'required', 'name' => 'model_image')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Overview* :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
	<textarea name="overview" placeholder="Enter overview" class="form-control ckeditor col-md-7 col-xs-12">
	</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Specification Image :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'file', 'class' => 'form-control', 'name' => 'model_image2')); ?>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom:10px">
                        <div class="col-md-4 col-sm-4">
                            <span style="float:right;margin-top:7px;font-weight:bold">Other images (Can uploaded multiple images): </span>
                        </div>
                        <input type="file" multiple name="userfile[]" size="20"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Tractor Power* :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'Enter Tractor Power', 'required' => 'required', 'name' => 'tractorpower')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Price :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'Enter Price', 'name' => 'price')); ?>
                        </div>
                    </div>


                    <div id="result">
                    </div>


                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                            <?php echo form_input(array('type' => 'submit', 'id' => 'form_up', 'class' => 'btn btn-default buttoupdate', 'value' => 'Add implement')); ?>
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