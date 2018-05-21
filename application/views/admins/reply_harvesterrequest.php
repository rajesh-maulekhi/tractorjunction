<?php
if ($this->session->userdata('admin')) {
    ?>
    <title>Admin || Add Area </title>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"
         style="padding:0px;min-height:835px;background: #F7F7F7;">
        <!-- main section -->
        <style>
            .l1 {
                color: #065E84;
                font-size: 18px;
                text-align: left;
            }

            .l2 {
                color: black;
                font-size: 18px;
            }
        </style>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding: 30px 15px;background: #fff;">
            <h3>Harvester Request</h3>
            <hr style="  border-top: 3px solid #C5C2C2;">
            <?php
            $root = "http://" . $_SERVER['HTTP_HOST'];

            $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);


            foreach ($result as $value => $obj) {

                $brand_name = '';
                $Model_name = '';
                $slug = '';
                if ($obj->req_type == "harvester") {
                    foreach (shweta_select('brand,model_name,slug', 'harvester', 'id', $obj->impID) as $raa) {
                        foreach (shweta_select('name', 'brand', 'id', $raa->brand) as $raa1) $brand_name = ucfirst($raa1->name);
                        $Model_name = $raa->model_name;
                        $slug = $raa->slug;
                    }
                } else {
                    foreach (shweta_select('brand,model_name,slug', 'new_implement', 'id', $obj->impID) as $raa) {
                        foreach (shweta_select('name', 'brand', 'id', $raa->brand) as $raa1) $brand_name = ucfirst($raa1->name);
                        $Model_name = $raa->model_name;
                        $slug = $raa->slug;
                    }
                }
                $Name = '';
                $Email = '';
                foreach (shweta_select('username,email', 'user_reg', 'id', $obj->userId) as $raa) {

                    $Name = $raa->username;
                    $Email = $raa->email;
                }
            }
            ?>

            <div id="page-wrapper"
                 style="line-height: 35px;float:left;border:2px solid #eee;width:100%;padding: 17px 0px;">

                <div class="col-md-6 col-sm-6" style="border-right:2px solid #ccc">


                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Request for brand:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php echo $brand_name; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Request for model:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php if ($obj->req_type == "harvester") { ?>
                                    <a target="_blank"
                                       href="<?php echo $root; ?>harvester/<?php echo newslugend($brand_name); ?>-<?php echo newslugend($slug); ?>-combine-harvester"
                                       style="cursor:pointer;color:#2A7842;">
                                        <?php } else { ?>
                                        <a target="_blank"
                                           href="<?php echo $root; ?>implement/<?php echo newslugend($brand_name); ?>-<?php echo newslugend($slug); ?>"
                                           style="cursor:pointer;color:#2A7842;">

                                            <?php } ?>
                                            <?php echo $Model_name; ?>        </a></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Request Date:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php echo ucfirst($obj->date); ?>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-md-6 col-sm-6">

                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Name:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php echo ucfirst($Name); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Email:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php echo ucfirst($Email); ?>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-md-12 col-sm-12">
                    <span class="l1" style="    margin-left: 30px;">Message:</span>
                    <span class="l2">
<?php
if ($obj->status == "0") {
    echo "Reply pending";
} else {
    if ($obj->message == "")
        echo "Message empty";
    else
        echo $obj->message;
}
?>
</span>

                </div>

            </div>


            <div id="page-wrapper1" style=";">
                <div class="row">

                    <?php
                    $att = array('class' => 'form-horizontal form-label-left');
                    echo form_open_multipart('admins/ImplementRequest/ReplyReqHarvester', $att); ?>
                    <div class="form-group" style="    float: left;
    margin-top: 54px;
    width: 100%;">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Message :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_textarea(array('type' => 'text', 'name' => 'message', 'placeholder' => 'Enter message', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                            <?php echo form_input(array('type' => 'hidden', 'name' => 'id_req', 'value' => $obj->id, 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                            <?php echo form_input(array('type' => 'hidden', 'name' => 'userID', 'value' => $obj->userId, 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                            <?php echo form_input(array('type' => 'hidden', 'name' => 'impID', 'value' => $obj->impID, 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                            <?php echo form_input(array('type' => 'hidden', 'name' => 'req_type', 'value' => $obj->req_type, 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>


                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                            <?php echo form_input(array('type' => 'submit', 'id' => 'form_up', 'class' => 'btn btn-default buttoupdate', 'value' => 'Send Mail')); ?>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>

        </div>


    </div>


    <script src="../../js/jquery.min2.js"></script>


    <?php
} else {
    header("Location:login");
}
?>