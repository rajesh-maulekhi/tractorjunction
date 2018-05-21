<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

if ($this->session->userdata('admin')) {
    foreach ($result as $key => $value) {
    }
    ?>
    <title>Admin || edit Customer Care </title>
    <script type="text/javascript" src="<?php echo $root ?>ckeditor/ckeditor.js"></script>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"
         style="padding:0px;min-height:835px;background: #F7F7F7;">
        <!-- main section -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding:20px 14px;"><a
                    href="<?php echo $root; ?>admins/show-customer-care">
                <button type="button" class="btn btn-default buttoupdate" style="">Show Customer Care</button>
            </a>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding: 30px 15px;background: #fff;">
            <h3>Edit Customer Care</h3>
            <hr style="  border-top: 3px solid #C5C2C2;">


            <div id="page-wrapper">
                <div class="row">

                    <?php
                    $att = array('class' => 'form-horizontal form-label-left');
                    echo form_open_multipart('admins/CustomerCare/editCustomerCareEnd', $att); ?>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Select Brand :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php
                            $selected = '';
                            $selected = ($value->brand) ? $value->brand : $value->brand;

                            $query3 = shweta_order_by_query('*', 'brand', 'name', 'ASC');
                            $val3[''] = 'Please Select brand';
                            foreach ($query3 as $k3 => $r3) {
                                $val3[$r3->id] = ucfirst($r3->name);
                            }
                            $ab = 'class="form-control col-md-7 col-xs-12" required="required"';
                            echo form_dropdown('brand', $val3, $selected, $ab);
                            ?>

                        </div>
                    </div>


                    <?php echo form_input(array('type' => 'hidden', 'name' => 'id_val', 'value' => $value->id, 'id' => 'brand_name', 'placeholder' => 'Service Center Name', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>

                    <div class="form-group heig">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Customer Care Contact No : </label>

                        <?php
                        $featurename = array();
                        $featurename_filter = array();
                        $featurename_count = "";

                        $featurename = explode('$$', $value->contactno);
                        $featurename_filter = (array_filter($featurename));
                        $featurename_count = count($featurename_filter);


                        $i = 0;
                        $ii = 0;
                        foreach ($featurename_filter as $featurename_filter) {
                            ?>
                            <label class="control-label col-md-4 col-sm-4 col-xs-12"></label>
                            <div>
                                <div class="col-md-6 col-sm-6 col-xs-12" style="margin-top:20px;">
                                    <input id="p_'<?php echo $ii; ?>'" placeholder="Customer Care Contact No"
                                           value="<?php echo $featurename_filter; ?>"
                                           class="form-control col-md-7 col-xs-12" name="contactNo[]">
                                </div>

                                <button class="delete remove-text-field" onclick="DeleteCustomerCareNOFunction();"
                                        id="p_'<?php echo $ii; ?>'" style="float:left;margin-top:20px;">Delete
                                </button>
                            </div>
                            <?php
                            $i++;
                            $ii++;
                        } ?>
                    </div>
                    <div class="form-group heig">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12"> </label>

                        <div id="AddCustomerCareNOFunctionitems">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="contactNo[]" placeholder="Customer Care Contact No"
                                       class="form-control col-md-7 col-xs-12" id="p_1" maxlength="50" type="text">
                            </div>

                        </div>
                        <a onclick="AddCustomerCareNOFunction();" style="cursor:pointer;">Add More</a>

                    </div>


                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                            <?php echo form_input(array('type' => 'submit', 'id' => 'form_up', 'class' => 'btn btn-default buttoupdate', 'value' => 'Add Customer Care')); ?>
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