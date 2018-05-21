<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

if ($this->session->userdata('admin')) {
    ?>
    <title>Admin || Single insurance tractor </title>

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
            <h3>Insurance Tractor</h3>
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
                                    Type Of Policy:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php

                                    if ($obj->type == "new")
                                        echo "Buy New Tractor Insurance";
                                    else
                                        echo "Renew Tractor Insurance";
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Vehicle Registered City(RTO):
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php echo $obj->regno; ?>            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Insurance Company:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php foreach (shweta_select('name', 'insurance_company', 'id', $obj->insurance_company) as $raa) echo ucfirst($raa->name);
                                    ?>            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Brand:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php foreach (shweta_select('name', 'brand', 'id', $obj->brand) as $raa) echo ucfirst($raa->name);
                                    ?>            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Model:
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
                                    Registration Month-Year:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php echo $obj->regmnth; ?> -<?php echo $obj->regyear; ?>            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">

                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Previous Insurance Company :
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php
                                    if ($obj->precompany != "")
                                        echo $obj->precompany;
                                    else
                                        echo "Not filled";

                                    ?>            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Claims Made In Previous Policy:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php echo $obj->claims; ?>            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">

                                    Name:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php echo $obj->name; ?>            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Email ID:
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
                                    Phone Number:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php echo $obj->mobile; ?>            </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if ($obj->status == 1) {
                        ?>
                        <a title="click to don't want to reply"
                           href="<?php echo $root; ?>admins/ListInsuranceTractor/inactive/<?php echo $obj->id; ?>/0">
                            <button type="button" style="background:#DD4445;color:#eee;" class="ap btn btn-default"><i
                                        class="fa fa-times"></i> Click to Reply Rending
                            </button>
                        </a>

                        <?php
                    } else {
                        ?>
                        <a title="click to reply confirmed"
                           href="<?php echo $root; ?>admins/ListInsuranceTractor/inactive/<?php echo $obj->id; ?>/1">
                            <button type="button" style="background:#148F1A;color:#eee;" class="ap btn btn-default"><i
                                        class="fa fa-check"></i> click to replied
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