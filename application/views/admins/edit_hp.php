<?php

if ($this->session->userdata('admin')) {
    ?>
    <title>Admin || Edit HP </title>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"
         style="padding:0px;min-height:835px;background: #F7F7F7;">
        <!-- main section -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding:20px 14px;"><a href="view_hp">
                <button type="button" class="btn btn-default buttoupdate" style="">Show HP</button>
            </a>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding: 30px 15px;background: #fff;">
            <h3>Edit HP</h3>
            <hr style="  border-top: 3px solid #C5C2C2;">


            <div id="page-wrapper">
                <div class="row">

                    <?php
                    foreach ($result as $value => $obj) {
                        $att = array('class' => 'form-horizontal form-label-left');
                        echo form_open('admins/edit_hp_end', $att); ?>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12">HP* :
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php echo form_input(array('type' => 'text', 'name' => 'hp_name', 'id' => 'hp_name', 'value' => $obj->name, 'placeholder' => 'hp Name', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                                <?php echo form_input(array('type' => 'hidden', 'name' => 'hp_id', 'id' => 'hp_name', 'value' => $obj->id, 'placeholder' => 'hp Name', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Description :
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php echo form_input(array('type' => 'text', 'name' => 'hp_description', 'id' => 'hp_description', 'value' => $obj->description, 'placeholder' => 'Description', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                                <?php echo form_input(array('type' => 'submit', 'id' => 'form_up', 'class' => 'btn btn-default buttoupdate', 'value' => 'Update')); ?>
                            </div>
                        </div>
                        <?php echo form_close();
                    }
                    ?>
                </div>
            </div>


        </div>


    </div>


    <?php
} else {
    header("Location:login");
}
?>