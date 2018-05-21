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
            <h3>Reply Request</h3>
            <hr style="  border-top: 3px solid #C5C2C2;">
            <?php
            foreach ($result as $value => $key) {
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
                                    <?php foreach (shweta_select('name', 'brand', 'id', $key->brand) as $raa)

                                        echo $bb = $raa->name ?>
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
                                    <?php echo $key->model; ?>                </div>
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
                                    <?php echo ucfirst($key->date); ?>
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
                                    <?php echo ucfirst($key->name); ?>
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
                                    <?php echo ucfirst($key->email); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Contact No:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php if ($key->contact != "")
                                        echo $key->contact;
                                    else
                                        echo "Not filled";
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>


        </div>


        <div id="page-wrapper1" style=";">
            <div class="row">

                <?php
                $att = array('class' => 'form-horizontal form-label-left');
                echo form_open_multipart('admins/Reply_request_end', $att); ?>
                <div class="form-group" style="    float: left;
    margin-top: 54px;
    width: 100%;">
                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Message :
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_textarea(array('type' => 'text', 'name' => 'message', 'placeholder' => 'Enter message', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        <?php echo form_input(array('type' => 'hidden', 'name' => 'brand', 'value' => $bb)); ?>
                        <?php echo form_input(array('type' => 'hidden', 'name' => 'model', 'value' => $key->model)); ?>
                        <?php echo form_input(array('type' => 'hidden', 'name' => 'uname', 'value' => $key->name)); ?>
                        <?php echo form_input(array('type' => 'hidden', 'name' => 'email', 'value' => $key->email)); ?>
                        <?php echo form_input(array('type' => 'hidden', 'name' => 'contact', 'value' => $key->contact)); ?>
                        <?php echo form_input(array('type' => 'hidden', 'name' => 'req_date', 'value' => $key->date)); ?>
                        <?php echo form_input(array('type' => 'hidden', 'name' => 'id', 'value' => $key->id, 'class' => 'form-control col-md-7 col-xs-12')); ?>
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