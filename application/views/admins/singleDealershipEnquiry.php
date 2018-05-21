<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

if ($this->session->userdata('admin')) {
    ?>
    <title>Admin || Single Dealership Enquiry </title>

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
            <h3>Single Dealership Enquiry</h3>
            <hr style="  border-top: 3px solid #C5C2C2;">
            <?php
            foreach ($result as $value => $obj) {
            }
            ?>

            <div id="page-wrapper"
                 style="line-height: 35px;float:left;border:2px solid #eee;width:100%;padding: 17px 0px;">

                <div class="col-md-6 col-sm-6" style="border-right:2px solid #ccc">


                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Customer Name:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php echo ucfirst($obj->name); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Customer Email-id:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php echo $obj->email; ?>            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Customer Contact no:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php echo $obj->mobile; ?>            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Request for brand:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php foreach (shweta_select('name', 'brand', 'id', $obj->brand) as $raa) echo ucfirst($raa->name);

                                    ?>        </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 col-sm-6">

                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Enquired Products:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php echo $obj->model; ?>            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    State :
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php foreach (shweta_select('name', 'states', 'id', $obj->state) as $raa) echo ucfirst($raa->name);

                                    ?>        </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    City:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php echo ucfirst($obj->city); ?>        </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Request Date :
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php echo date("d-M-Y", strtotime($obj->date)); ?>        </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if ($obj->status == 1) {
                        ?>
                        <a title="click to don't want to reply"
                           href="<?php echo $root; ?>admins/ListDealershipEnquiry/inactive/<?php echo $obj->id; ?>/0">
                            <button type="button" style="background:#DD4445;color:#eee;" class="ap btn btn-default"><i
                                        class="fa fa-times"></i> Click to don't want to reply
                            </button>
                        </a>

                        <?php
                    } else {
                        ?>
                        <a title="click to reply confirmed"
                           href="<?php echo $root; ?>admins/ListDealershipEnquiry/inactive/<?php echo $obj->id; ?>/1">
                            <button type="button" style="background:#148F1A;color:#eee;" class="ap btn btn-default"><i
                                        class="fa fa-check"></i> Click to reply confirmed
                            </button>
                        </a>

                        <?php
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