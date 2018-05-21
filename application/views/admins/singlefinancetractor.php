<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

if ($this->session->userdata('admin')) {
    ?>
    <title>Admin || Single finance tractor </title>

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
            <h3>Finance Tractor</h3>
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
                                    Type Of Finance:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php
                                    if ($obj->type == "new")
                                        echo "New Tractor";
                                    else
                                        echo "Used Tractor";


                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Profession:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php
                                    if ($obj->profession == "govt")
                                        echo "Government Employee";
                                    elseif ($obj->profession == "private")
                                        echo "Private Employee";
                                    elseif ($obj->profession == "business")
                                        echo "Business";
                                    elseif ($obj->profession == "retired")
                                        echo "Retired";
                                    elseif ($obj->profession == "notworking")
                                        echo "Not working";

                                    ?>            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    State:
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
                                    <?php foreach (shweta_select('name', 'cities', 'id', $obj->city) as $raa) echo ucfirst($raa->name);
                                    ?>        </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Bank:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php foreach (shweta_select('name', 'bank', 'id', $obj->bank) as $raa) echo ucfirst($raa->name);
                                    ?>            </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 col-sm-6">

                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Residencial Type:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php echo ucfirst($obj->residencial); ?>            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Full Name:
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
                                    Address:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php echo $obj->address; ?>            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Birth year:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php echo $obj->dob; ?>            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Finance Amount:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php echo $obj->financeamt; ?>            </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if ($obj->status == 1) {
                        ?>
                        <a title="click to don't want to reply"
                           href="<?php echo $root; ?>admins/ListFinanceTractor/inactive/<?php echo $obj->id; ?>/0">
                            <button type="button" style="background:#DD4445;color:#eee;" class="ap btn btn-default"><i
                                        class="fa fa-times"></i></button>
                        </a>

                        <?php
                    } else {
                        ?>
                        <a title="click to reply confirmed"
                           href="<?php echo $root; ?>admins/ListFinanceTractor/inactive/<?php echo $obj->id; ?>/1">
                            <button type="button" style="background:#148F1A;color:#eee;" class="ap btn btn-default"><i
                                        class="fa fa-check"></i></button>
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